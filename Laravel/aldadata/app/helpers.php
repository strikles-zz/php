<?php

// My common functions
function eerror_log($msg)
{
    if (!Config::get('app.debug')) {
        return;
    }

    error_log($msg);
}

?>
