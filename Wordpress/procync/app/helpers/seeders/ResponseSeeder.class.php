<?php

if (file_exists(LS_RPC_PATH)) {
    require_once LS_RPC_PATH;
} else {
    die(print_r(LS_RPC_PATH, true));
}

class ResponseSeeder
{
    /**
     * [getQuestionIDs description]
     * @param  [type] $limesurvey_id [description]
     * @param  [type] &$questions    [description]
     * @return [type]                [description]
     */
    public static function getQuestionIDs($limesurvey_id, &$questions)
    {
        $question_ids = [];
        foreach ($questions as $key => $q)
        {
            $g_id = $q['g']['id']['gid'];
            $q_id = $q['q']['id']['qid'];
            $question_id = $limesurvey_id.'X'.$g_id.'X'.$q_id;

            $question_ids[] = $question_id;
        }

        return $question_ids;
    }

    /**
     * [mt_randf - generate a random float between min and max]
     * @param  [type] $min [description]
     * @param  [type] $max [description]
     * @return [type]      [description]
     */
    public static function mt_randf($min, $max)
    {
        return $min + abs($max - $min) * mt_rand(0, mt_getrandmax())/mt_getrandmax();
    }

    public static function purebell($min, $max, $std_deviation, $step=1)
    {
        $rand1 = (float)mt_rand()/(float)mt_getrandmax();
        $rand2 = (float)mt_rand()/(float)mt_getrandmax();

        $gaussian_number = sqrt(-2 * log($rand1)) * cos(2 * M_PI * $rand2);
        $mean = ($max + $min) / 2;

        $random_number = ($gaussian_number * $std_deviation) + $mean;

        if($random_number < $min || $random_number > $max) {
            $random_number = self::purebell($min, $max,$std_deviation);
        }

        return $random_number;
    }

    /**
     * [generateAnswers - generate some normally distributed random answers for a given survey]
     * @param  [array] $question_ids [description]
     * @return [array]               [description]
     */
    public static function generateAnswers($question_ids)
    {
        $answers = [];
        foreach ($question_ids as $key => $question_id)
        {
            $answers[$question_id] = self::purebell(5.0, 10.0, 1.0);
        }

        return $answers;
    }

    /**
     * [run - do all the seedings]
     * @return [json] [AjaxResponse]
     */
    public static function run() {

        // this function should do:
        // get the relationship
        // get all related user
        // fill in all surveys
        // output summary with Reponse::output

        $evaluation_id  = (int)$_POST['evaluation_id'];
        $relation_users = EvaluationModel::users($evaluation_id);

        AjaxResponse::stream([
            'message' => 'Initiating seeding',
            'status'  => 'OK',
            'log'     => true
        ]);

        foreach ($relation_users as $key => $user_id)
        {
            if(!is_numeric($relation_users[$key]))
            {
                error_log('Invalid user - '.json_encode($relation_users[$key]));
            }

            // company / agency
            $user_type = UserModel::userType($user_id);

            $evaluation_pod = pods('evaluation', $evaluation_id);
            $relation       = $evaluation_pod->field('relation');
            $relation_pod   = pods('relation', $relation['ID']);
            $relation_type  = $evaluation_pod->field('180_360');
            $relation_steps = EvaluationModel::getSteps($relation_type);

            foreach ($relation_steps as $relation_step)
            {
                // get the user
                $user = UserModel::findByID($user_id);

                // get survey id
                $limesurvey_id  = EvaluationModel::surveyID($evaluation_id, $relation_step);
                $questions_type = ($relation_step === '360' ? 'company' : 'agency');
                $filename       = $questions_type.'_'.$limesurvey_id.'_questions.json';

                $all_questions  = json_decode(file_get_contents(CABSPATH.'cache/'.$filename), true);
                $user_role      = $user->roles[0];
                $questions      = null;

                if(!array_key_exists($user_role, $all_questions))
                {
                    // status response
                    AjaxResponse::stream([
                        'message' => 'ERROR: invalid role (could not load questions for user): '.$user_id.' '.$relation_step,
                        'status'  => 'failure',
                        'error'   => true,
                        'log'     => true
                    ], false);

                    continue;
                }

                // pich the right user role
                $questions        = $all_questions[$user_role];
                // get question ids
                $question_ids     = self::getQuestionIDs($limesurvey_id, $questions);
                // generate some random values for each question
                $question_answers = self::generateAnswers($question_ids);

                if(!count($question_answers))
                {
                    // status response
                    AjaxResponse::stream([
                        'message' => 'ERROR: could not generate answers processing user: '.$user_id.' '.$relation_step,
                        'status'  => 'failure',
                        'error'   => true,
                        'log'     => true
                    ], false);

                    continue;
                }

                $user_token = LimesurveyModel::getTokenByRelation($limesurvey_id, $user->user_email, $evaluation_id);
                if(!$user_token)
                {
                    // status response
                    AjaxResponse::stream([
                        'message' => 'ERROR: could not match token for : '.$user_id,
                        'status'  => 'failure',
                        'error'   => true,
                        'log'     => true
                    ], false);

                    continue;
                }

                $res = array_merge($question_answers, ['token' => $user_token->tid]);

                // instanciate a new client
                $myJSONRPCClient = new jsonRPCClient(LS_BASEURL);
                // receive session key
                $sessionKey      = $myJSONRPCClient->get_session_key(LS_USER, LS_PASSWORD);
                // save values
                $success_status  = $myJSONRPCClient->add_response($sessionKey, $limesurvey_id, $res);
                // set participant status
                $participant_status = $myJSONRPCClient->set_participant_properties($sessionKey, $limesurvey_id, $user_token->tid, ['completed' => 'Y', 'usesleft' => 0]);

                // release session key
                $myJSONRPCClient->release_session_key($sessionKey);

                // status response
                AjaxResponse::stream([
                    'message' => 'processing user: '.$user_id.' '.$relation_step,
                    'status'  => 'OK',
                    'log'     => true
                ], false);
            }
        }
    }
}
