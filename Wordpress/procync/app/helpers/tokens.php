<?php

// defines
define('LS_RPC_PATH', CABSPATH.'limesurvey/application/libraries/jsonRPCClient.php');
define('LS_BASEURL', WP_HOME.'/limesurvey/index.php/admin/remotecontrol');  // adjust this one to your actual LimeSurvey URL
define('LS_USER', 'dd' );
define('LS_PASSWORD', 'YRaHVmpRVjjf' );

if (file_exists(LS_RPC_PATH)) {
    require_once LS_RPC_PATH;
} else {
    die(print_r(LS_RPC_PATH, true));
}

/**
 * [generate survey tokens and auth token for invitation auto-login]
 * @param  [type] $user        [description]
 * @param  [type] $evaluation_id [description]
 * @return [type]              [description]
 */
function generateTokens($user, $evaluation_id)
{
    error_log('got this far 1');
    // is relationship 180 or 360 ?
    $evaluation_pod = pods('evaluation', $evaluation_id);
    $relation_pod   = pods('relation', $evaluation_pod->field('relation')['ID']);
    $relation_type  = $evaluation_pod->field('180_360');
    $relation_steps = EvaluationModel::getSteps($relation_type);

    error_log('got this far 2 '.json_encode($relation_steps));

    // survey meta info
    $survey_args = [
        'user'          => $user->ID,
        'evaluation'    => $evaluation_id,
        'user_type'     => get_field('company_or_agency', 'user_'.$user->ID),
        'token_180'     => false,
        'token_360'     => false,
        'survey_id_180' => false,
        'survey_id_360' => false,
        'auth_token'    => randomstring(16)
    ];

    // get survey metadata pod
    $survey = SurveyModel::getByUserAndRelation($user->ID, $evaluation_id);
    error_log('got this far 3 '.json_encode($survey));

    // for each relation step
    foreach ($relation_steps as $key => $relation_step)
    {
        error_log('got this far 4');
        $limesurvey_id  = EvaluationModel::surveyID($evaluation_id, $relation_step);

        error_log('got this far 4a '.$limesurvey_id);
        if(empty($limesurvey_id) || !$limesurvey_id)
        {
            error_log('Error: generateTokens '.$limesurvey_id.'-'.$evaluation_id.'-'.$relation_step);
            return;
        }

        $ls_token = LimesurveyModel::getTokenByRelation($limesurvey_id, $user->user_email, $evaluation_id, false);
        error_log('got this far 4b');

        // create a new limesuvey survey token if one doesn't exist
        if($ls_token)
        {
            error_log('A token already exists '.LS_USER.' - '.LS_PASSWORD);
            continue;
        }

        error_log('got this far 4z ');

        //limesurvey token
        $limesurvey_token = [

            (object)[
                'email'       => $user->user_email,
                'firstname'   => $user->first_name,
                'lastname'    => $user->last_name,
                'attribute_1' => $user->roles[0],
                'attribute_2' => $evaluation_id
            ]
        ];

        error_log('got this far 4b2 '.json_encode($limesurvey_token));

        // instantiate a new client
        $myJSONRPCClient = new jsonRPCClient(LS_BASEURL);
        error_log('got this far 4b3 '.json_encode($myJSONRPCClient));
        error_log('Le base url '.LS_BASEURL);

        // receive session key
        $sessionKey      = $myJSONRPCClient->get_session_key(LS_USER, LS_PASSWORD);
        error_log('got this far 4b4 '.json_encode($sessionKey));

        // create limesurvey token
        $success_status = $myJSONRPCClient->add_participants($sessionKey, $limesurvey_id, $limesurvey_token);
        error_log('got this far 4b5 '.json_encode($success_status));

        // release session key
        $myJSONRPCClient->release_session_key($sessionKey);
        error_log('got this far 4c ');

        // check status
        if (isset($success_status['error'])) {
            error_log('Error: '.$success_status['error']);
        }

        $token_str = isset($success_status[0]['token']) ? $success_status[0]['token'] : "";
        if(empty($token_str))
        {
            error_log('generateTokens() - Token str is empty');
            continue;
        }

        // update survey meta
        $survey_args['user']     = $user->ID;
        $survey_args['token_'.$relation_step]     = $token_str;
        $survey_args['survey_id_'.$relation_step] = $limesurvey_id;

        // this will add/update the survey meta pod using pods save
        SurveyModel::save($user->ID, $evaluation_id, $survey_args);
        error_log('got this far 4');
    }

    error_log('got this far 5');
}

/**
 * [userSave - callback for generating limesurvey tokens and survey meta info when a user is created]
 * @param  [int]    $user_id [the user id of the created user]
 * @return [type]
 */
function userSave($user_id)
{
    $user = UserModel::findByID($user_id);

    error_log('>>> got this far 1');
    if($user)
    {
        $relevant_roles = LimesurveyModel::relevantUserRoles();
        if(!in_array($user->roles[0], $relevant_roles))
        {
            return;
        }

        error_log('>>> got this far 2');

        if(!array_key_exists('acf', $_POST)) {
            error_log('No acf data posted');
            return;
        }

        // new relations the user is to be associated with
        $posted_evaluations       = $_POST["acf"]["field_555eec0761d79"];
        $new_user_evaluations     = (!empty($posted_evaluations) ? $posted_evaluations : []);
        $raw_old_user_evaluations = UserModel::getRelations($user_id);
        $old_user_evaluations     = [];

        error_log('>>> got this far 3');

        // push old user relation ID's to array to easily get stale relation bellow using array_diff
        if(!empty($raw_old_user_evaluations))
        {
            foreach ($raw_old_user_evaluations as $key => $raw_old_relation)
            {
                $old_user_evaluations[] = (string)$raw_old_relation->ID;
            }
        }

        // clean-up stale user surveys
        $stale_evaluations = (count($new_user_evaluations) ? array_diff($old_user_evaluations, $new_user_evaluations) : $old_user_evaluations);
        foreach ($stale_evaluations as $key => $stale_relation)
        {
            $stale_survey_post = SurveyModel::getByUserAndRelation($user_id, $stale_relation);
            if($stale_survey_post)
            {
                $stale_survey_pod = pods('survey', $stale_survey_post['ID']);

                // only if no invitation was sent
                $invite_was_sent  = $stale_survey_pod->field('invitation_send');
                $delete_condition = (DEBUG ? true : ($invite_was_sent !== "1" && $invite_was_sent !== 1));
                if($delete_condition)
                {
                    $stale_survey_pod->delete();
                }
            }
        }

        error_log('>>> got this far 4');

        // generate tokens for new relations if required
        foreach ($new_user_evaluations as $nkey => $nur_id)
        {
            error_log('>>> got this far 4a '.$nur_id);
            generateTokens($user, $nur_id);
        }
    }
}

// create token on user register
add_action('edit_user_profile_update', 'userSave');
add_action( 'user_register', 'userSave', 10, 1 );
