<?php

class EvaluationModel {

    /**
     * [users - return all users associated with a given relation]
     * @param  [type] $evaluation_id [description]
     * @return [type]              [description]
     *
     * called from ResponseSeeder.class
     */
    public static function users($evaluation_id)
    {
        global $wpdb;
        $usermetas = $wpdb->get_results("
            SELECT user_id, meta_value FROM wp_usermeta
            WHERE meta_key = 'evaluations'
        ");

        $user_ids = [];
        foreach ($usermetas as $usermeta)
        {
            $values = maybe_unserialize($usermeta->meta_value);
            if(empty($values))
            {
                continue;
            }

            foreach ($values as $value)
            {
                if ((int)$value == $evaluation_id)
                {
                    $user_ids[] = (int)$usermeta->user_id;
                }
            }
        }

        $user_ids = array_unique($user_ids);

        return $user_ids;
    }

    /**
     * [surveyID - return the survey id]
     * @param  [type] $evaluation_id [description]
     * @param  [type] $step        [180 or 360]
     * @return [type]              [description]
     */
    public static function surveyID($evaluation_id, $step)
    {
        $evaluation_pod = pods('evaluation', $evaluation_id);
        $fieldname      = 'survey_id_'.$step;
        $limesurvey_id  = (int)$evaluation_pod->field($fieldname);

        return $limesurvey_id;
    }

    /**
     * Utility for generating an iterable array containing the relationship steps
     *
     * @param  [type] $relation_type [possible value are 180 or 360]
     * @return [type] $relation_teps [if $relation_type is 360 steps are 180 + 360 otherwise steps is just the 180]
     */
    public static function getSteps($relation_type)
    {
        // get relation steps
        $relation_steps = ['180'];
        if('360' === $relation_type)
        {
            $relation_steps[] = '360';
        }

        return $relation_steps;
    }

    public static function surveys($evaluation_id) {

        $evals = pods('survey', [
            'limit'     => -1,
            'where'     => 'evaluation.ID = ' . $evaluation_id
        ]);

        $ret = [];
        if($evals->total())
        {
            $all_evals = $evals->data();
            foreach ($all_evals as $key => $eval)
            {
                $ret[] = $eval;
            }
        }

        return $ret;
    }
}
