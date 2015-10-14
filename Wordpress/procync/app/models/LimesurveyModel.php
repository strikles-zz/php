<?php

// require jsonRPCClient.php
if (file_exists(LS_RPC_PATH)) {
    require_once LS_RPC_PATH;
} else {
    die(print_r(LS_RPC_PATH, true));
}

function microtime_float()
{
  list($usec, $sec) = explode(" ", microtime());
  return ((float)$usec + (float)$sec);
}


/**
 * CLASS LimesurveyModel
 * refers to Limesurvey, and interacts with LimeSurvey tables
 */
class LimesurveyModel
{
    /**
     * [getGroups - acquire question groups belonging to a given survey]
     * @param  [type]   $limesurvey_id  [description]
     * @return [array]              [questionaire groups]
     */
    public static function getGroups($limesurvey_id, $user_role)
    {
        // timer start
        $start = microtime_float();

        $myJSONRPCClient = new jsonRPCClient(LS_BASEURL);
        $sessionKey      = $myJSONRPCClient->get_session_key(LS_USER, LS_PASSWORD);

        // fetch groups
        $groups = $myJSONRPCClient->list_groups($sessionKey, $limesurvey_id);
        error_log('getGroups '.json_encode($groups));

        // ret aggregate
        $ret = [];

        // iterate through group questions to get total count
        foreach ($groups as $key => $g)
        {
            // get group questions
            $group_questions = $myJSONRPCClient->list_questions($sessionKey, $limesurvey_id, $g['id']['gid']);
            $total_questions = 0;

            // filter for role relevance
            foreach ($group_questions as $key => $q)
            {
                // ignore junk
                if(empty($q['question']) || $q['title'] === 'SQ001')
                    continue;

                // get properties
                $q_properties = $myJSONRPCClient->get_question_properties($sessionKey, $q['id']['qid'], ['relevance']);
                // question is mandatory for all
                if($q_properties['relevance'] === '1' || $q_properties['relevance'] === 1)
                {
                    $total_questions++;
                }
                // question is relevant for user role
                else
                {
                    $relevant_roles = [];
                    preg_match_all('|"([A-Z]{2})|', stripslashes($q_properties['relevance']), $relevant_roles);
                    if(in_array($user_role, $relevant_roles[1]))
                    {
                        $total_questions++;
                    }
                }
            }

            $group_order = $myJSONRPCClient->get_group_properties($sessionKey, $g['id']['gid'], ['group_order']);

            $ret[] = [
                'group' => $g,
                'order' => isset($group_order['group_order']) ? $group_order['group_order'] : false,
                'num_questions' => $total_questions
            ];
        }

        usort($ret, function($a, $b) {
            return $a['order'] - $b['order'];
        });

        $myJSONRPCClient->release_session_key($sessionKey);
        $time_elapsed = microtime_float() - $start;

        return $ret;
    }


    /**
     * [getRoleFromLimesurveyRelevanceAttribute description]
     * @param  [type] $limesurvey_relevance_attribute [description]
     * @return [type]                                 [description]
     */
    private static function getRoleFromLimesurveyRelevanceAttribute($limesurvey_relevance_attribute)
    {
        preg_match_all('|"([A-Z]{2})|', stripslashes($limesurvey_relevance_attribute), $relevant_roles);
        if ($relevant_roles && count($relevant_roles > 0))
        {
            return $relevant_roles[1];
        }

        return false;
    }

    /**
     * [getQuestions - acquire questions belonging to a given survey]
     * @param  [int]    $limesurvey_id  [the limesurvey id]
     * @param  [string] $user_role  [role name]
     * @return [array]              [the filtered questionaire for a given user role]
     */
    public static function getQuestions($limesurvey_id, $user_role, $groups)
    {
        $start = microtime_float();

        $myJSONRPCClient = new jsonRPCClient(LS_BASEURL);
        $sessionKey      = $myJSONRPCClient->get_session_key(LS_USER, LS_PASSWORD);

        // get survey questions
        $questions_out = [];
        foreach ($groups as $group)
        {
            // get group questions
            $group_id            = $group['group']['id']['gid'];
            $questions           = $myJSONRPCClient->list_questions($sessionKey, $limesurvey_id, $group_id);
            $group_questions_out = [];

            foreach($questions as $question)
            {
                $question_id = $question['id']['qid'];
                $question_properties = $myJSONRPCClient->get_question_properties($sessionKey, $question_id, ['relevance', 'help', 'question_order']);

                $question_out               = $question;
                $raw_question   = explode('|', strip_tags($question_out['question']));
                if(count($raw_question) !== 2)
                {
                    throw new Exception('Error: wrong number of parameters when extracting question info '.count($raw_question));
                }

                $question_out['question']   = $raw_question[0];
                $question_out['benchmark']  = $raw_question[1];
                $question_out['help']  = (double)$question_properties['help'];
                $question_out['order']      = isset($question_properties['question_order']) ? $question_properties['question_order'] : false;
                $question_out['relevance']  = self::getRoleFromLimesurveyRelevanceAttribute($question_properties['relevance']);

                $group_questions_out[] = [
                    'q'     => $question_out,
                    'g'     => $group['group'],
                    'q_num' => 0
                ];
            }

            usort($group_questions_out, function($a, $b) {
                return $a['q']['order'] - $b['q']['order'];
            });

            $question_number = 1;
            foreach($group_questions_out as $key => $curr_question_out)
            {
                $group_questions_out[$key]['q_num'] = $question_number;
                $question_number++;
            }

            $questions_out = array_merge($questions_out, $group_questions_out);
        }

        $myJSONRPCClient->release_session_key($sessionKey);

        $time_elapsed = microtime_float() - $start;

        $roles = ['OP', 'OM', 'TM'];
        $questions_by_role = [];
        foreach ($roles as $role)
        {
            foreach($questions_out as $question)
            {
                if (in_array($role, $question['q']['relevance'])) {
                    $questions_by_role[$role][] = $question;
                }
            }
        }

        return $questions_by_role;
    }

    /**
     * [generateGroupsJsonCache - generate groups json cache files for a given survey]
     * @param  [type] $limesurvey_id [description]
     * @param  [type] $type          [description]
     * @return [type]                [description]
     */
    public static function generateGroupsJsonCache($limesurvey_id, $type)
    {
        $groups = null;
        $groups_filename = CABSPATH.'cache/'.$type.'_'.$limesurvey_id.'_groups.json';
        if(!file_exists($groups_filename))
        {
            $groups = [
                 'OP' => self::getGroups($limesurvey_id, 'OP'),
                 'OM' => self::getGroups($limesurvey_id, 'OM'),
                 'TM' => self::getGroups($limesurvey_id, 'TM')
            ];

            $fp = fopen($groups_filename, 'w');
            fwrite($fp, json_encode($groups));
            fclose($fp);
        }

        error_log('generateGroupsJsonCache '.json_encode($groups));
        return $groups['OP'];
    }

    /**
     * [generateQuestionsJsonCache - generate groups json cache files for a given survey]
     * @param  [type] $limesurvey_id [description]
     * @param  [type] $type          [description]
     * @return [type]                [description]
     */
    public static function generateQuestionsJsonCache($limesurvey_id, $type, $groups)
    {
        error_log('generateQuestionsJsonCache '.$limesurvey_id.' : '.json_encode($groups));
        $questions_filename = CABSPATH.'cache/'.$type.'_'.$limesurvey_id.'_questions.json';
        if(!file_exists($questions_filename))
        {
            $questions = self::getQuestions($limesurvey_id, 'OP', $groups);
            $fp        = fopen($questions_filename, 'w');
            fwrite($fp, json_encode($questions));
            fclose($fp);
        }
    }

    /**
     * [generateJsonCache - generate json questionaire objects for faster loading]
     * @return [null]
     */
    public static function generateJsonCaches($limesurvey_id, $type)
    {
        error_log('generateJsonCaches survey id '.$limesurvey_id);
        if(!empty($limesurvey_id))
        {
            $groups = self::generateGroupsJsonCache($limesurvey_id, $type);
            error_log('generateJsonCaches groups '.json_encode($groups));
            self::generateQuestionsJsonCache($limesurvey_id, $type, $groups);
        }
    }

    /**
     * Creates new limesurveys for each step of a new relation i.e. (step1 = 180, step2 = 360)
     * This is called when a new relation is created
     * @param  [type] $post_id [description]
     * @return [type]          [description]
     */
    public static function createSurveys($post_id)
    {
        // get relationship args
        $evaluation_pod = pods('evaluation', $post_id);
        $relation_pod   = pods('relation', $evaluation_pod->field('relation')['ID']);
        $relation_type  = $evaluation_pod->field('180_360');

        $relation_args = (object)[
            'evaluation_pod' => $evaluation_pod,
            'relation_pod'   => $relation_pod
        ];

        // for each stage of the relationship generate a new limesurvey
        $relation_steps = EvaluationModel::getSteps($relation_type);
        foreach ($relation_steps as $key => $relation_step)
        {
            self::create($post_id, $relation_args, $relation_step);
        }
    }

    public static function getSurveyName($relation_args, $relation_step)
    {
        $survey_name  = "";

        $year = $relation_args->evaluation_pod->field('period_year');
        $quarter = $relation_args->evaluation_pod->field('period_quarter');

        $agency_name  = $relation_args->relation_pod->display('agency');
        $company_name = $relation_args->relation_pod->display('company');
        $brand_name   = $relation_args->relation_pod->display('brand');
        $country      = $relation_args->relation_pod->display('country');

        if($relation_step === '180')
        {
            $survey_name = $company_name.'-'.$agency_name.'-'.$brand_name.'-'.$country.'-180'.'-'.$year.'-Q'.$quarter;
        }
        else
        {
            $survey_name = $agency_name.'-'.$company_name.'-'.$brand_name.'-'.$country.'-360'.'-'.$year.'-Q'.$quarter;
        }

        return $survey_name;
    }


    public static function activate_survey($sessionKey, $limesurvey_id, $relation_args, $myJSONRPCClient)
    {

        if(!$limesurvey_id)
        {
            error_log('Invalid survey id');
            return false;
        }

        $activate_survey = $relation_args->evaluation_pod->field('activate');
        error_log('>>> Activate Survey '.json_encode($activate_survey));

        // activate survey + tokens
        if($activate_survey === "1")
        {
            // check if survey is active, and if not activate it
            $survey_active = $myJSONRPCClient->get_survey_properties($sessionKey, $limesurvey_id, ['active']);
            error_log('Survey activation status '.json_encode($survey_active));

            if($survey_active['active'] === "N")
            {
                $activate_success_status = $myJSONRPCClient->activate_survey($sessionKey, $limesurvey_id);
                $activate_tokens_status  = $myJSONRPCClient->activate_tokens($sessionKey, $limesurvey_id, ['user_role', 'relationship_id']);

                return ['activate_status' => json_encode($activate_success_status), 'tokens_status' => json_encode($activate_tokens_status)];
            }
            else {
                error_log('Survey is already active');
            }
        }
    }

    /**
     * creates a single new limesurvey
     * @param  [type] $post_id       [description]
     * @param  [type] $relation_args [description]
     * @param  [type] $relation_step [description]
     * @return [type]                [description]
     */
    public static function create($post_id, $relation_args, $relation_step)
    {
        // require jsonRPCClient.php
        if (file_exists(LS_RPC_PATH)) {
            require_once LS_RPC_PATH;
        } else {
            die(print_r(LS_RPC_PATH, true));
        }

        // create a new client
        $myJSONRPCClient = new jsonRPCClient(LS_BASEURL);
        // get session key
        $sessionKey = $myJSONRPCClient->get_session_key(LS_USER, LS_PASSWORD);

        // check survey metadata
        $limesurveyid_field_name = 'survey_id_'.$relation_step;
        $limesurvey_id           = $relation_args->evaluation_pod->field($limesurveyid_field_name);

        // check there isn't another relation with the same core relation and periods(year/quarter) to do

        // check survey id
        $survey_exists = (!empty($limesurvey_id) && is_numeric($limesurvey_id));

        // if not create one
        if($survey_exists)
        {
            error_log('>>> activating existig survey');
            self::activate_survey($sessionKey, $limesurvey_id, $relation_args, $myJSONRPCClient);
            $myJSONRPCClient->release_session_key($sessionKey);

            return;
        }

        // generate base64 string from import file
        $import_file = $relation_step.'.lss';
        $import_data = base64_encode(file_get_contents(CABSPATH.'cache/'.$import_file));
        $survey_name = self::getSurveyName($relation_args, $relation_step);

        // import data
        $import_success_status = $myJSONRPCClient->import_survey($sessionKey, $import_data, 'lss', $survey_name);
        if(is_array($import_success_status))
        {
            throw new Exception('Failed to import the survey '.json_encode($import_success_status));
        }
        else
        {
            // save the newly created  survey id to the relation pod
            $new_survey_id = $import_success_status;
            update_post_meta($post_id, $limesurveyid_field_name, $new_survey_id);

            // activate survey if required
            self::activate_survey($sessionKey, $new_survey_id, $relation_args, $myJSONRPCClient);

            // generate corresponding cache
            self::generateJsonCaches($new_survey_id, ($relation_step === '180' ? 'agency' : 'company'));
        }

        // release key
        $myJSONRPCClient->release_session_key($sessionKey);
    }

    /**
     * get all limesurvey tokens directly from the lime_token table using raw queries
     * @param  [type] $limesurvey_id [description]
     * @return [type]                [description]
     */
    public static function allTokens($limesurvey_id)
    {
        // check if one exists in the db
        global $wpdb;
        $res = $wpdb->get_results("SELECT * FROM lime_tokens_".$limesurvey_id." WHERE email='".$email."'", OBJECT);

        return $res;
    }

    public static function allUserTokens($limesurvey_id, $user_email)
    {
        // check if one exists in the db
        global $wpdb;
        $res = $wpdb->get_results("SELECT * FROM lime_tokens_".$limesurvey_id." WHERE email LIKE '%".$user_email."%'", OBJECT);

        return $res;
    }

    /**
     * used to get a user token for a given relationship the user is associated with
     * @param  [type] $limesurvey_id        [description]
     * @param  [type] $email                [description]
     * @param  [type] $relationship_id      [description]
     * @return [type]                       [description]
     */
    public static function getTokenByRelation($limesurvey_id, $email, $relationship_id, $check_completed = true)
    {
        global $wpdb;

        $table_name = "lime_tokens_".$limesurvey_id;
        $sanity_check = "SHOW TABLES LIKE '".$table_name."'";
        $sanity_res = $wpdb->get_results($sanity_check, OBJECT);

        if(!count($sanity_res))
        {
            error_log('Table does not exist');
            return ['error' => 'Table does not exist'];
        }

        $query_str = "SELECT * FROM ".$table_name." WHERE email='".$email."' AND attribute_2='".$relationship_id."' ".($check_completed ? "AND completed='N'" : "")." LIMIT 1";
        $res = $wpdb->get_results($query_str, OBJECT);

        return count($res) ? $res[0] : null;
    }

    /**
     * [getTokenByID - return a limesurvey token object]
     * @param  [type] $limesurvey_id [description]
     * @param  [type] $token_id      [description]
     * @return [type]                [description]
     */
    public static function getTokenByID($limesurvey_id, $token_id)
    {
        global $wpdb;
        $res = $wpdb->get_results("SELECT * FROM lime_tokens_".$limesurvey_id." WHERE tid='".$token_id."' LIMIT 1", OBJECT);

        return count($res) ? $res[0] : null;
    }

    /**
     * [relevantUserRoles - relevant survey user roles]
     * @return [type] [description]
     */
    public static function relevantUserRoles()
    {
        $roles = [
            'OP', //'Operations',
            'OM', //'Operational Manager',
            'TM'  //'Top manager'
        ];

        return $roles;
    }

}
