<?php

/**
 * delete user tokens
 * @param survey_id
 */
Ajax::run('deleteTokens', 'both', function()
{
    $limesurvey_id = $_POST['limesurvey_id'];

    global $wpdb;
    $res = $wpdb->get_results("DELETE FROM lime_tokens_".$limesurvey_id, OBJECT);

    // response output
    header("Content-Type: application/json");
    echo json_encode(count($res));
    exit;
});

/**
 * delete all responses for a given survey
 * @param survey_id
 */
Ajax::run('deleteResponses', 'both', function()
{
    $survey_id = $_POST['survey_id'];
    global $wpdb;

    $survey_pod  = pods('survey', $survey_id);
    $survey_user = $survey_pod->field('user');
    $res = [];

    if($survey_user)
    {
        $limesurvey_id_180 = $survey_pod->field('survey_id_180');
        if(!empty($limesurvey_id_180))
        {
            $user_tokens_180 = LimesurveyModel::allUserTokens($limesurvey_id_180, $survey_user['user_email']);
            if(!empty($user_tokens_180))
            {
                foreach ($user_tokens_180 as $key_180 => $token_180)
                {
                    $query_str_180 = "DELETE FROM lime_survey_".$limesurvey_id_180." WHERE token=".$token_180->tid;
                    error_log('$query_str_180 = '.json_encode($query_str_180));
                    $res[] = $wpdb->query($query_str_180);
                }
            }
        }

        $limesurvey_id_360 = $survey_pod->field('survey_id_360');
        if(!empty($limesurvey_id_360))
        {
            $user_tokens_360 = LimesurveyModel::allUserTokens($limesurvey_id_360, $survey_user['user_email']);
            if(!empty($user_tokens_360))
            {
                foreach ($user_tokens_360 as $key_360 => $token_360)
                {
                    $query_str_360 = "DELETE FROM lime_survey_".$limesurvey_id_360." WHERE token=".$token_360->tid;
                    error_log('$query_str_360 = '.json_encode($query_str_360));
                    $res[] = $wpdb->query($query_str_360);
                }
            }
        }
    }

    header("Content-Type: application/json");
    echo json_encode($res);
    exit;
});

/**
 * save posted questionaire answers
 * @param survey_id
 * @param relationship
 * @param step
 */
Ajax::run('postAnswers', 'both', function()
{
    // require jsonRPCClient.php
    if (file_exists(LS_RPC_PATH)) {
        require_once LS_RPC_PATH;
    } else {
        die(print_r(LS_RPC_PATH, true));
    }

    if(!is_user_logged_in())
    {
        header("Content-Type: application/json");
        echo json_encode(['status' => 'ERROR', 'message' => 'You are not logged in !']);
        exit;
    }
    else
    {
        //current user
        $current_user  = wp_get_current_user();

        // posted values
        $limesurvey_id = $_POST['limesurvey_id'];
        $evaluation_id = $_POST['evaluation_id'];
        $relation_step = $_POST['step'];

        // response
        $user_token = LimesurveyModel::getTokenByRelation($limesurvey_id, $current_user->user_email, $evaluation_id);
        $status_response = null;

        if(!$user_token)
        {
            header("Content-Type: application/json");
            echo json_encode(['status' => 'ERROR', 'message' => 'No matching user token found !']);
            exit;
        }
        else
        {
            $extra_response_attrs = ['token' => $user_token->tid];
            $response             = array_merge($_POST, $extra_response_attrs);

            // instanciate a new client
            $myJSONRPCClient = new jsonRPCClient(LS_BASEURL);
            // receive session key
            $sessionKey      = $myJSONRPCClient->get_session_key(LS_USER, LS_PASSWORD);
            // save response
            $success_status  = $myJSONRPCClient->add_response($sessionKey, $limesurvey_id, $response);
            // reset token properties (completed = Y; usesleft = 0)
            if($success_status)
            {
                $evaluation_pod = pods('evaluation', $evaluation_id);
                $relation       = $evaluation_pod->field('relation');
                $relation_pod   = pods('relation', $relation['ID']);

                // survey completed
                $survey_completed = false;
                $evaluation_type = $evaluation_pod->field('180_360');
                $survey_post = SurveyModel::getByUserAndRelation($current_user->ID, $evaluation_id);
                $survey_pod = pods('survey', $survey_post['ID']);

                error_log('survey completed sanity check '.json_encode($evaluation_type).' - '.json_encode($relation_step));
                if((int)$evaluation_type === 180 && (int)$relation_step === 180)
                {
                    error_log('survey completed sanity check pass');
                    $survey_completed = true;
                }
                else
                {
                    $response_180 = $survey_pod->field('response_180');
                    $response_360 = $survey_pod->field('response_360');

                    if((int)$evaluation_type === 360 && (int)$relation_step === 180 && !empty($response_360))
                    {
                        $survey_completed === true;
                    }

                    if((int)$evaluation_type === 360 && (int)$relation_step === 360 && !empty($response_180))
                    {
                        $survey_completed === true;
                    }
                }

                if($survey_completed === true)
                {
                    error_log('>>> setting survey completed to true');
                    $myJSONRPCClient->set_participant_properties($sessionKey, $limesurvey_id, $user_token->tid, ['completed' => 'Y', 'usesleft' => 0]);
                    $survey_args['completed']                = 1;
                    $survey_args['completed_date']           = date_i18n('d-M-Y G:i', time());
                }

                // response
                $survey_args['response_'.$relation_step] = json_encode($_POST);

                // save
                $survey_pod->save($survey_args);
                $posted_answers = $_POST;

                // release the session key
                $myJSONRPCClient->release_session_key($sessionKey);

                $durations = [
                    'TM' => 5,
                    'OM' => 10,
                    'OP' => 20
                ];

                $details = [
                    'role'              => $current_user->roles[0],
                    'company_or_agency' => get_user_meta($current_user->ID, 'company_or_agency', true),
                    'company'           => $relation_pod->display('company'),
                    'agency'            => $relation_pod->display('agency'),
                    'brand'             => $relation_pod->display('brand'),
                    'country'           => $relation_pod->display('country'),
                    'duration'          => isset($durations[$current_user->roles[0]]) ? $durations[$current_user->roles[0]] : 20,
                    'expiration'        => "11th September"
                ];

                $details['source_company'] = $details['company_or_agency'] == 'company' ? $details['company'] : $details['agency'];
                $details['target_company'] = $details['company_or_agency'] == 'company' ? $details['agency'] : $details['company'];

                // send notification Email
                $email = new Emailer();
                $email->headers[] = 'Cc: Jasper Kums <jasper@eenvoudmedia.nl>' . "\r\n";
                $status_response  = ['status' => 'OK', 'message' => json_encode($success_status)];

                try
                {
                    $email->compose([
                        'template'   => 'surveycompleted',
                        'pre_header' => '',
                        'title'      => 'Thank you for your input',
                        'name'       => $current_user->display_name,
                        'date'       => date_i18n('j M Y'),
                        'details'    => $details
                    ]);

                    $result = $email->send([
                        'subject' => 'Thank you for your input '.$current_user->display_name.' '.time(),
                        'to' => $current_user->user_email
                    ]);

                    $survey_title = 'Survey submission - '.$survey_post['ID'].' - '.html_entity_decode(get_the_title((int)$survey_post['ID']));
                    mail( 'info@eenvoudmedia.nl', $survey_title, json_encode($_POST));

                } catch (Exception $e) {

                    // Something went wrong sending the e-mail, return error and error message
                    header('Content-Type: application/json');
                    print_r(json_encode([
                        'error' => 'error',
                        'message' => $e->getMessage()
                    ]));
                }
            }

            // response output
            header("Content-Type: application/json");
            echo json_encode($status_response);
            exit;
        }
    }
});

/**
 * get groups for a given survey
 * @param survey_id
 * @param userRole
 * @param step
 */
Ajax::run('getGroups', 'both', function()
{
    $limesurvey_id = $_POST['limesurvey_id'];
    $type          = ($_POST['step'] === '360' ? 'company' : 'agency');
    $filename      = $type.'_'.$limesurvey_id.'_groups.json';
    $groups        = json_decode(file_get_contents(CABSPATH.'cache/'.$filename), true);
    $user_role     = $_POST['userRole'];

    // response output
    header("Content-Type: application/json");
    echo json_encode($groups[$user_role]);
    exit;
});

/**
 * get questions for a given survey
 * @param survey_id
 * @param userRole
 * @param step
 */
Ajax::run('getQuestions', 'both', function()
{
    $limesurvey_id = $_POST['limesurvey_id'];
    $type          = ($_POST['step'] === '360' ? 'company' : 'agency');
    $filename      = $type.'_'.$limesurvey_id.'_questions.json';
    $questions     = json_decode(file_get_contents(CABSPATH.'cache/'.$filename), true);
    $user_role     = $_POST['userRole'];

    // response output
    header("Content-Type: application/json");
    echo json_encode($questions[$user_role]);
    exit;
});

/**
 *
 */
Ajax::run('genRelationSurveys', 'both', function()
{
    $evaluation_id  = $_REQUEST['evaluation_id'];
    $evaluation_pod = pods('evaluation', $evaluation_id);

    $relation       = $evaluation_pod->field('relation');
    $relation_pod   = pods('relation', $relation['ID']);
    $relation_type  = $evaluation_pod->field('180_360');
    $relation_steps = EvaluationModel::getSteps($relation_type);
    $survey_ids     = [];

    foreach ($relation_steps as $key => $curr_step)
    {
        $questions_type = ($curr_step === '360' ? 'company' : 'agency');
        $limesurvey_id  = EvaluationModel::surveyID($evaluation_id, $curr_step);
        $survey_ids[]   = $limesurvey_id;

        $groups = LimesurveyModel::generateGroupsJsonCache($limesurvey_id, $questions_type);
        LimesurveyModel::generateQuestionsJsonCache($limesurvey_id, $questions_type, $groups);
    }

    // response output
    header("Content-Type: application/json");
    echo json_encode($survey_ids);
    exit;
});
