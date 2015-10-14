<?php

$cb = function ($fn) {
    return $fn;
};

class LimesurveyController extends BaseController
{
    // constructor
    public function __construct()
    {
        //wp_dequeue_script('jquery');

        // add styles
        Asset::add('vendor-style', 'css/vendor.min.css', array(), '1.0', 'screen');
        Asset::add('eenvoud-style', 'css/style.min.css', array(), '1.0', 'screen');

        // add scripts in footer
        Asset::add('vendor-scripts', 'js/vendor.min.js', array('jquery'), '1.0', false);
        Asset::add('eenvoud-scripts', 'js/scripts.min.js', array('jquery'), '1.0', false);
    }

    /**
     * [index - build index view]
     * @return [view] [display the questionaire]
     */
    public function getQuestionaire()
    {
        $exploded_url = parseUrl();
        $token = (count($exploded_url) === 2 ? $exploded_url[1] : false);

        // not logged in
        if (is_user_logged_in() && $token)
        {
            wp_logout();
            $url = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}/{$_SERVER['REQUEST_URI']}";
            $_SESSION['token'] = null;
            wp_redirect($url);
        }
        elseif (!is_user_logged_in() && $token)
        {
            $exploded_url = parseUrl();
            if(count($exploded_url) < 2)
            {
                return View::make('survey.error', array('error' => 'You need a token to participate in this survey'));
            }

            $token = $exploded_url[1];
            if (!$token)
            {
                return View::make('survey.error', array('error' => 'You need a token to participate in this survey'));
            }

            // get corresponding survey
            $survey = SurveyModel::getByAuthToken($token);
            if (!$survey)
            {
                return View::make('survey.error', array('error' => 'Could not find a matching survey for your token'));
            }

            // check if survey is complete
            $user = get_post_meta($survey['ID'], 'user', true);
            if (!$user)
            {
                return View::make('survey.error', array('error' => 'Could not match your token to a user'));
            }

            // login the user
            wp_set_current_user($user['ID'], $user['user_login']);
            wp_set_auth_cookie($user['ID']);
            do_action('wp_login', $user['user_login']);

            $_SESSION['token'] = $token;
            wp_redirect(get_bloginfo('url') . '/survey');
        }
        elseif(!is_user_logged_in() && !$token)
        {
            return View::make('survey.error', array('error' => 'Error: Failed to log you in'));
        }
        else
        {
            if(!isset($_SESSION['token']))
            {
                return View::make('survey.error', array('error' => 'You need a token to participate in this survey'));
            }

            $survey_pod = pods ('survey', SurveyModel::getByAuthToken($_SESSION['token'])['ID']);
            if(!$survey_pod)
            {
                return View::make('survey.error', array('error' => 'Could not find a matching survey for your token'));
            }
            else
            {
                // check for relevant user roles
                $current_user = wp_get_current_user();
                $user_role    = $current_user->roles[0];
                $roles        = LimesurveyModel::relevantUserRoles();

                // relevant user roles
                $user_survey_role_match = in_array($user_role, $roles) ? $user_role : null;
                if(!$user_survey_role_match)
                {
                    return View::make('survey.error', array('error' => 'We have no survey for your role '.$user_role));
                }

                $evaluation            = $survey_pod->field('evaluation');
                $evaluation_pod        = pods('evaluation', $evaluation['ID']);
                $relation              = $evaluation_pod->field('relation');
                $relation_pod          = pods('relation', $relation['ID']);
                $relation_type         = $evaluation_pod->display('180_360');

                $user_type             = UserModel::userType($current_user->ID);

                // check for valid tokens for all possible steps
                $relation_steps = EvaluationModel::getSteps($relation_type);
                $valid_steps    = ['180' => false, '360' => false];
                foreach($relation_steps as $key => $step)
                {
                    $limesurvey_id      = EvaluationModel::surveyID($evaluation['ID'], $step);
                    $curr_survey_token  = LimesurveyModel::getTokenByRelation($limesurvey_id, $current_user->user_email, $evaluation['ID']);
                    $valid_steps[$step] = ($curr_survey_token ? true : false);
                }

                if(!$valid_steps['180'] && !$valid_steps['360'])
                {
                    return View::make('survey.error', array('error' => 'You have already completed this survey'));
                }

                return View::make('survey.main', [
                    'page-title'        => 'Procync',
                    'user'              => $current_user,
                    'user_role'         => $user_role,
                    'user_type'         => $user_type,
                    'user_relationship' => $evaluation['ID'], // broken
                    'relationship_type' => $relation_type, // broken
                    'company_or_agency' => get_user_meta($current_user->ID, 'company_or_agency', true),
                    'agency_surveyid'   => EvaluationModel::surveyID($evaluation['ID'], '180'),
                    'company_surveyid'  => EvaluationModel::surveyID($evaluation['ID'], '360'),
                    'agency_name'       => $relation_pod->display('agency'),
                    'company_name'      => $relation_pod->display('company'),
                    'brand_name'        => $relation_pod->display('brand'),
                    'doStep180'         => $valid_steps['180'], // broken
                    'doStep360'         => $valid_steps['360']  // broken
                ]);
            }
        }
    }
}

?>
