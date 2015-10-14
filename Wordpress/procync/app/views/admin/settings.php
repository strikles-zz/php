<?php

//print_r($excel_files);

$evaluations = get_posts([
    'post_type' => 'evaluation',
    'posts_per_page' => -1
]);

?>

<div class="wrap">

<h2>ProCync settings</h2>
<h3>Response Seeder</h3>

<table class="form-table">
    <tr>
        <th scope="row">
            <label>Select evaluation</label>
        </th>
        <td>
            <select id="input-evaluation" style="width:500px;">
                <?php

                foreach ($evaluations as $key => $value)
                {
                    echo '<option value="' . $value->ID . '">' . $value->post_title . '</option>';
                }

                ?>
            </select>
            </td>
        </td>
    </tr>
    <tr>
        <th></th>
        <td>
            <button id="dump-selected-survey">Dump Selected Survey .json !</button>
        </td>
    </tr>
    <tr>
        <th></th>
        <td>
            <button id="start-seeder">GO!</button>
        </td>
    </tr>
    <tr>
        <th>Seeder output</th>
        <td>
            <div id="seeder-output"></div>
        </td>
    </tr>
</table>

<script>
(function($) {

    $('#dump-selected-survey').on('click', function() {

        var evaluation_id = $('#input-evaluation').val();
        console.log('evaluation_id', evaluation_id);

        $.post('/cms/wp-admin/admin-ajax.php', {action: 'genRelationSurveys', evaluation_id: evaluation_id}).done(function(data, status){
            alert("Data: " + data + "\nStatus: " + status);
        });

    });

    'use strict';
    var xhr = new XMLHttpRequest();

    $('#abort-import').on('click', function() {

        xhr.abort();
        $('#abort-import').prop('disabled', 'disabled');

    });

    $('#start-seeder').on('click', function() {

        var $button = $(this);
        $button.prop('disabled', true);

        var startSeeder = function()
        {
            var statusCounter = 0,
                totalRows = 0,
                lastRow = 0,
                totalBatches = 0,
                status = '';

            xhr.open("POST", "/cms/wp-admin/admin-ajax.php", true);
            xhr.onprogress = function(e)
            {
                console.log('seeding response text', e.currentTarget.responseText);
                var responses = e.currentTarget.responseText.split('|');
                responses.splice(0,1)
                var responseCount = responses.length;

                console.log('seeder - on progress', responses);
                for (statusCounter; statusCounter < responseCount; statusCounter++)
                {
                    var response = $.parseJSON(responses[statusCounter]);
                    var $div, $message;

                    if(response)
                    {
                        if (response.error)
                        {
                            console.log('seeder - response error', response);

                            $div = $('<div>').addClass('error');
                            //var $error = $('<div>').html(response.error).appendTo($div);
                            if(response.message) {
                                $message = $('<div>').html(response.message).appendTo($div);
                            }
                            if(response.data) {
                                var $data = $('<div>').html(response.data).appendTo($div);
                            }
                            $('#seeder-output').append($div);
                        }

                        else
                        {
                            console.log('seeder - response status', response);
                            if(response.log)
                            {
                                $div          = $('<div>').addClass('updated');
                                $message      = $('<div>').html(response.message ? response.message : response.status).appendTo($div);
                                var uptime    = response.uptime ? response.uptime : 0;
                                var timestamp = response.timestamp ? response.timestamp : false;
                                var $uptime   = $('<span>').addClass('uptime').html(' <small>' + uptime + 'ms </small>').prependTo($message);

                                if(timestamp)
                                {
                                    var $timestamp = $('<span>').addClass('timestamp').html(timestamp).prependTo($message);
                                }

                                $('#seeder-output').append($div);
                            }
                        }

                        if(response.row)
                        {
                            lastRow = response.row;
                        }
                    }

                }
            }

            xhr.onreadystatechange = function()
            {
                if (xhr.readyState === 4) {

                	// if (phpdebugbar && phpdebugbar.ajaxHandler) {
                	// 	console.log ('handling phpdebugbar');
                	// 	phpdebugbar.ajaxHandler.handle(xhr);
                	// } else {
                	// 	console.log ('skipping phpdebugbar');
                	// }
                    console.log('readyState 4');
                    $button.prop('disabled', false);
                }
            };

             xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
             xhr.send('action=response_seeder&evaluation_id=' + $('#input-evaluation').val());
        };

        startSeeder();
    });

})(jQuery);
</script>
