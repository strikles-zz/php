<?php

class ReportingController extends BaseController
{

    // constructor
    public function __construct()
    {
        // add styles
        Asset::add('vendor-style', 'css/vendor.min.css', array(), '1.0', 'screen');
        Asset::add('eenvoud-style', 'css/style.min.css', array(), '1.0', 'screen');

        // // add scripts in footer
        Asset::add('vendor-scripts', 'js/vendor.min.js', ['jquery'], '1.0', false);
        Asset::add('eenvoud-scripts', 'js/scripts.min.js', ['jquery'], '1.0', false);
    }

    public function getJSON() {
        return View::make('reporting.json');
    }

    /**
     * [getIndex description]
     * @return [type] [description]
     */
    public function getIndex()
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
            wp_redirect(get_bloginfo('url') . '/reporting');
        }
        elseif(!is_user_logged_in() && !$token)
        {
            return View::make('survey.error', array('error' => 'Error: Failed to log you in'));
        }
        else
        {
            if(!isset($_SESSION['token']))
            {
                return View::make('survey.error', array('error' => 'You need a token to access reporting'));
            }

            $survey_pod = pods ('survey', SurveyModel::getByAuthToken($_SESSION['token'])['ID']);
            if(!$survey_pod)
            {
                return View::make('survey.error', array('error' => 'Could not match your token'));
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

                $evaluation      = $survey_pod->field('evaluation');
                $evaluation_pod  = pods('evaluation', $evaluation['ID']);
                $evaluation_type = $evaluation_pod->field('180_360');

                $relation        = $evaluation_pod->field('relation');
                $relation_pod    = pods('relation', $relation['ID']);

                $company         = $relation_pod->field('company');
                $company_pod     = pods('company', $company['ID']);

                $logo = $company_pod->field('logo');

                return View::make('reporting.index', ['evaluation' => $evaluation['ID'], 'company_logo' => ($logo ? $logo['guid'] : false)]);
            }
        }
    }

    /**
     * [getLogin description]
     * @return [type] [description]
     */
    public function getLogin()
    {
        return View::make('reporting.login');
    }

    /**
     * [postLogin description]
     * @return [type] [description]
     */
    public function postLogin()
    {
        return View::make('reporting.login');
    }
}
