<?php

/**
 * get all responses for a given survey along with required metadata
 * - used for get responses on step 2 of reporting (after selecting a relation and a step)
 * also categorized by agency or company
 * @param evaluation_id
 * @param step
 */
Ajax::run('getHistoricalResponses', 'both', function()
{
    if (file_exists(LS_RPC_PATH)) {
        require_once LS_RPC_PATH;
    } else {
        die(print_r(LS_RPC_PATH, true));
    }

    // get all evaluations for a given relation
    $relation_id   = array_key_exists('relation_id', $_REQUEST) ? (int) $_REQUEST['relation_id'] : null;
    $relation_step = array_key_exists('step', $_REQUEST) ? (int) $_REQUEST['step'] : null;
    $evaluation_id = array_key_exists('evaluation_id', $_REQUEST) ? (int) $_REQUEST['evaluation_id'] : null;

    $evaluations = [];
    if($relation_id) {
        $evaluations   = RelationModel::evaluations($relation_id);
    }
    elseif($evaluation_id) {
        $evaluations[] = pods('evaluation', $evaluation_id);
    }

    // instanciate a new client
    $myJSONRPCClient  = new jsonRPCClient(LS_BASEURL);
    // receive session key
    $sessionKey       = $myJSONRPCClient->get_session_key(LS_USER, LS_PASSWORD);

    // calculate averages for current evaluation
    $response = [];
    foreach ($evaluations as $key => $evaluation)
    {
        $limesurvey_id = EvaluationModel::surveyID($evaluation->ID, $relation_step);
        $type          = ($relation_step === '360' ? 'company' : 'agency');

        // questions
        $questions_filename = $type.'_'.$limesurvey_id.'_questions.json';
        $survey_questions   = json_decode(file_get_contents(CABSPATH.'cache/'.$questions_filename), true);

        $group_q = [
            'OP' => [],
            'OM' => [],
            'TM' => []
        ];

        foreach ($survey_questions as $rolekey => $rolevalue)
        {
            foreach ($rolevalue as $sqkey => $sqvalue)
            {
                if(!array_key_exists($sqvalue['g']['id']['gid'], $group_q[$rolekey]))
                {
                    $group_q[$rolekey][$sqvalue['g']['id']['gid']] = ['name' => $sqvalue['g']['group_name'], 'gid' => $sqvalue['g']['id']['gid'], 'questions' => [], 'question_benchmarks' => [], 'questions_txt' => []];
                }

                $group_q[$rolekey][$sqvalue['g']['id']['gid']]['questions'][]                                 = $sqvalue['q']['title'];
                $group_q[$rolekey][$sqvalue['g']['id']['gid']]['question_benchmarks'][$sqvalue['q']['title']] = (float)$sqvalue['q']['benchmark'];
                $group_q[$rolekey][$sqvalue['g']['id']['gid']]['questions_txt'][]                             = $sqvalue['q']['question'];
            }
        }

        $evaluation_pod = pods('evaluation', $evaluation->ID);

        $role_questions_counter = [

            'period' => [
                'year' => $evaluation_pod->field('period_year'),
                'quarter' => $evaluation_pod->field('period_quarter'),
                'date' => (int)$evaluation_pod->field('period_year').$evaluation_pod->field('period_quarter')
            ],

            'data' => [
                'OP'     => ['cumulative_question_scores' => [], 'tot' => 0],
                'OM'     => ['cumulative_question_scores' => [], 'tot' => 0],
                'TM'     => ['cumulative_question_scores' => [], 'tot' => 0]
            ],

            'agency_data' => [
                'OP'     => ['cumulative_question_scores' => [], 'tot' => 0],
                'OM'     => ['cumulative_question_scores' => [], 'tot' => 0],
                'TM'     => ['cumulative_question_scores' => [], 'tot' => 0]
            ],

            'company_data' => [
                'OP'     => ['cumulative_question_scores' => [], 'tot' => 0],
                'OM'     => ['cumulative_question_scores' => [], 'tot' => 0],
                'TM'     => ['cumulative_question_scores' => [], 'tot' => 0]
            ],

            'groups' => $group_q
        ];

        // setup response structure
        $relevant_roles = LimesurveyModel::relevantUserRoles();
        foreach ($relevant_roles as $rrkey => $curr_role)
        {
            $role_questions = $survey_questions[$curr_role];
            foreach ($role_questions as $rqkey => $question)
            {
                $role_questions_counter['data'][$curr_role]['cumulative_question_scores'][$question['q']['title']]         = 0.0;
                $role_questions_counter['agency_data'][$curr_role]['cumulative_question_scores'][$question['q']['title']]  = 0.0;
                $role_questions_counter['company_data'][$curr_role]['cumulative_question_scores'][$question['q']['title']] = 0.0;
            }
        }

        // get responses
        $all_responses = $myJSONRPCClient->export_responses($sessionKey, $limesurvey_id, 'json');


        // error {status: No Data, could not get max id."}
        if(is_array($all_responses)) {
            error_log('No responses '.json_encode($all_responses));
            continue;
        }

        $parsed_responses = json_decode(base64_decode($all_responses));

        // acquire values
        foreach ($parsed_responses->responses as $key => $resp)
        {
            foreach($resp as $key => $val)
            {
                $curr_response_data = $resp->$key;
                $curr_token         = $curr_response_data->token;

                // token
                $token = LimesurveyModel::getTokenByID($limesurvey_id, $curr_token);
                if(!$token)
                {
                    continue;
                }

                $email               = $token->email;
                $user                = UserModel::getByEmail($email);
                // user got deleted
                if(!$user)
                {
                    continue;
                }

                $user_type           = UserModel::userType($user->ID);
                $curr_role           = $user->roles[0];

                if(!array_key_exists($curr_role, $survey_questions)) {
                    continue;
                }

                $curr_role_questions = $survey_questions[$curr_role];

                foreach ($curr_role_questions as $crqkey => $crquestion)
                {
                    $role_questions_counter['data'][$curr_role]['cumulative_question_scores'][$crquestion['q']['title']] += (float)$curr_response_data->$crquestion['q']['title'];
                    if('company' === $user_type)
                    {
                        $role_questions_counter['company_data'][$curr_role]['cumulative_question_scores'][$crquestion['q']['title']] += (float)$curr_response_data->$crquestion['q']['title'];
                    }
                    if('agency' === $user_type)
                    {
                        $role_questions_counter['agency_data'][$curr_role]['cumulative_question_scores'][$crquestion['q']['title']] += (float)$curr_response_data->$crquestion['q']['title'];
                    }
                }

                $role_questions_counter['data'][$curr_role]['tot']++;
                if('company' === $user_type)
                {
                    $role_questions_counter['company_data'][$curr_role]['tot']++;
                }
                if('agency' === $user_type)
                {
                    $role_questions_counter['agency_data'][$curr_role]['tot']++;
                }
            }
        }

        // compute averages
        foreach ($role_questions_counter['data'] as $role_key => $role_value)
        {
            foreach ($role_value['cumulative_question_scores'] as $qkey => $qvalue)
            {
                $role_questions_counter['data'][$role_key]['cumulative_question_scores'][$qkey] = ($qvalue > 0 ? $qvalue / $role_value['tot'] : 0);
            }
        }
        foreach ($role_questions_counter['company_data'] as $crole_key => $crole_value)
        {
            foreach ($crole_value['cumulative_question_scores'] as $cqkey => $cqvalue)
            {
                $role_questions_counter['company_data'][$crole_key]['cumulative_question_scores'][$cqkey] = ($cqvalue > 0 ? $cqvalue / $crole_value['tot'] : 0);
            }
        }
        foreach ($role_questions_counter['agency_data'] as $arole_key => $arole_value)
        {
            foreach ($arole_value['cumulative_question_scores'] as $aqkey => $aqvalue)
            {
                $role_questions_counter['agency_data'][$arole_key]['cumulative_question_scores'][$aqkey] = ($aqvalue > 0 ? $aqvalue / $arole_value['tot'] : 0);
            }
        }

        $response[] = $role_questions_counter;
    }

    // release the session key
    $myJSONRPCClient->release_session_key($sessionKey);

    if(count($response) > 0)
    {
        usort($response, function($a, $b) {
            return $a['period']['date'] - $b['period']['date'];
        });
    }

    // response output
    header("Content-Type: application/json");
    echo json_encode($response);
    exit;
});

Ajax::run('getRelation', 'both', function()
{
    $evaluation_id   = array_key_exists('evaluation_id', $_REQUEST) ? (int) $_REQUEST['evaluation_id'] : null;

    $ret = [];

    if($evaluation_id)
    {
        $evaluation_pod = pods('evaluation', (int)$evaluation_id);
        $relation = $evaluation_pod->field('relation');
        $relation_pod = pods('relation', $relation['ID']);

        if(!$relation_pod)
        {
            return;
        }

        $ret[] = [
            'company'        => $relation_pod->field('company'),
            'agency'         => $relation_pod->field('agency'),
            'brand'          => $relation_pod->field('brand'),
            'country'        => $relation_pod->field('country'),
            'period_year'    => $relation_pod->field('period_year'),
            'period_quarter' => $relation_pod->field('period_quarter'),
            '180_360'        => $evaluation_pod->field('180_360'),
            'post'           => $relation
        ];
    }

    header("Content-Type: application/json");
    echo json_encode($ret);
    exit;
});


/**
 * get all existing relations
 * used for the 1st reporting step
 */
Ajax::run('getRelations', 'both', function()
{
    $current_user = wp_get_current_user();
    $ret = [];

    // need to get the evaluations a user is associated with
    // in order to get the corresponding unique relations
    $unique_relation_ids = [];

    if(0 !== $current_user->ID)
    {
        $evaluations = null;
        if('administrator' === $current_user->roles[0])
        {
            $evaluations = get_posts([
                'post_type' => 'evaluation',
                'posts_per_page' => -1
            ]);
        }
        else
        {
            $evaluations = UserModel::getRelations($current_user->ID);
        }

        foreach ($evaluations as $key => $evaluation)
        {
            $evaluation_pod = pods('evaluation', (int)$evaluation->ID);
            $relation = $evaluation_pod->field('relation');
            if(!$relation)
            {
                continue;
            }

            if(!in_array($relation['ID'], $unique_relation_ids))
            {
                $relation_pod = pods('relation', $relation['ID']);
                if(!$relation_pod)
                {
                    continue;
                }

                $ret[] = [
                    'company'        => $relation_pod->field('company'),
                    'agency'         => $relation_pod->field('agency'),
                    'brand'          => $relation_pod->field('brand'),
                    'country'        => $relation_pod->field('country'),
                    'period_year'    => $relation_pod->field('period_year'),
                    'period_quarter' => $relation_pod->field('period_quarter'),
                    '180_360'        => $evaluation_pod->field('180_360'),
                    'post'           => $relation
                ];

                $unique_relation_ids[] = $relation['ID'];
            }
        }
    }

    // response output
    header("Content-Type: application/json");
    echo json_encode($ret);
    exit;
});
