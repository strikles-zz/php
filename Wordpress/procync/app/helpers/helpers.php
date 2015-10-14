<?php

    /**
     * [question_identifier - limesuvey question id]
     * @param  [type] $limesurvey_id [description]
     * @param  [type] $group         [description]
     * @param  [type] $q             [description]
     * @return [type]                [description]
     */
    function question_identifier($limesurvey_id, $group, $q) {
        return $limesurvey_id.'X'.$group['id']['gid'].'X'.$q['id']['qid'];
    }

    /**
     * [randomstring - returns a random alphanumeric string of a given length]
     * @param  [type] $len [length of the string]
     * @return [type]      [description]
     */
    function randomstring($len)
    {
        $string = "";
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        for($i=0;$i<$len;$i++)
        {
            $string.=substr($chars,rand(0,strlen($chars)),1);
        }

        return $string;
    }

    class AjaxResponse
    {
        public static function stream(Array $data, $first = true)
        {
            echo '|';

            $data['timestamp'] = date('H:i:s');
            echo json_encode($data);

            ob_flush();
            flush();
        }

        private function getTimestamp()
        {
            // true = float, false = weirdo "0.2342 123456" format
            $seconds = microtime(true);
            return round( ($seconds * 1000) );
        }
    }

?>
