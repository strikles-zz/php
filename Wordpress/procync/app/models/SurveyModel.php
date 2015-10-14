<?php

/**
 * CLASS SurveyModel
 * refers to survey Pods
 */
class SurveyModel
{
    /**
     * Returns the first found survey (or false) that are linked to both the user_id as the evaluation_id
     * @param  integer  $user_id        user_id of a WordPress user
     * @param  integer  $evaluation_id    post_id of a Relation POD
     * @return integer or false         returns the first matching Survey POD or false if none were found
     */
    public static function getByUserAndRelation($user_id, $evaluation_id)
    {
        $surveys = pods('survey', [
            'limit'     => -1,
            'where'     => 'user.ID = ' . $user_id . ' AND evaluation.ID = ' . $evaluation_id
        ]);

        return $surveys->total() ? $surveys->fetch() : false;
    }

    /**
     * Returns the first found survey (or false) that matches the auth_token
     * @param  string   $auth_token     auth_token is a meta field of the Survey POD
     * @return integer or boolean       returns the first matching Survey POD or false if none were found
     */
    public static function getByAuthToken($auth_token)
    {
        if(empty($auth_token))
        {
            return false;
        }

        $surveys = pods('survey', [
            'limit'     => 1,
            'where'     => 'auth_token.meta_value = "' . $auth_token . '"'
        ]);

        return $surveys->total() ? $surveys->fetch() : false;
    }

    /**
     * Saves (inserts or updates) a Survey POD. This function is also triggered indirectly, for instance when saving a user to check
     * the relations and add necessary Survey POD and information to LimeSurvey. See LimesurveyModel.php
     * @param  integer  $user_id        user_id of a WordPress user
     * @param  integer  $evaluation_id    [description]
     * @param  string   $token_180      [description]
     * @param  integer  $limesurvey_id_180 [description]
     * @param  string   $token_360      Optional:
     * @param  integer  $limesurvey_id_360 Optional:
     * @return boolean                  true on succesfull insert or update, false on error
     */
    public static function save($user_id, $evaluation_id, $survey_args)
    {
        $evaluation_pod = pods('evaluation', $evaluation_id);
        if (!$evaluation_pod->exists())
        {
            error_log('Relationship not found during save of Survey');
        }

        $user = UserModel::findByID($user_id);
        if($user)
        {
            // check if a token already exists;
            $existing_surveys = self::getByUserAndRelation($user_id, $evaluation_id);
            if ($existing_surveys === false)
            {
                $survey_pod = pods('survey');
                $extra_args = [
                    'post_title'    => $evaluation_pod->field('name') . ' (' . $user->data->user_nicename . ')',
                    'post_status'   => 'publish'
                ];

                $args = array_merge($survey_args, $extra_args);
                $survey_pod->save($args);
            }
        }
    }
}
