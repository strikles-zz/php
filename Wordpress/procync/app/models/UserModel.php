<?php

class UserModel {

    /**
     * Return all users
     *
     * @return array
     */
    public static function all()
    {
        $query = new WP_User_Query(array());
        $res = $query->get_results();

        return $res;
    }

    /**
     * [getByRole - get all users with a given role]
     * @param  [type] $user_role [description]
     * @return [type]            [description]
     */
    public static function getByRole($user_role)
    {
        $query = new WP_User_Query(array('role' => $user_role));
        $res = $query->get_results();

        return count($res) ? $res[0] : null;
    }

    /**
     * [getByEmail - get all users with a given email]
     * @param  [type] $user_role [description]
     * @return [type]            [description]
     */
    public static function getByEmail($user_email)
    {
        $query = new WP_User_Query(array('search' => $user_email));
        $res = $query->get_results();

        return count($res) ? $res[0] : null;
    }

    /**
     * [findByID - get user object given a user_id]
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    public static function findByID($user_id)
    {
        $query = new WP_User_Query(array('include' => $user_id));
        $res = $query->get_results();

        return count($res) ? $res[0] : null;
    }

    /**
     * [userType - is user a company or agency user]
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    public static function userType($user_id)
    {
        $user_rel = get_field('company_or_agency', 'user_'.$user_id);

        return $user_rel;
    }

    /**
     * [getRelations  - get all the relations a given user is associated with]
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    public static function getRelations($user_id)
    {
        $user_relations = get_field('evaluations', 'user_'.$user_id);

        return $user_relations;
    }

    public static function surveys($user_id)
    {
        error_log('user model surveys - user id '.$user_id);
        $user_surveys = pods('survey', [
            'limit'     => -1,
            'where'     => 'user.ID = ' . $user_id
        ]);

        $ret = [];
        if($user_surveys->total())
        {
            $all_user_surveys = $user_surveys->data();
            error_log('user surveys '.json_encode($all_user_surveys));

            foreach ($all_user_surveys as $key => $user_survey)
            {
                $ret[] = $user_survey;
            }
        }

        return $ret;
    }

}
