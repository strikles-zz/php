<?php

    /**
     * Add an extra column to the surveys admin screen so we can add a button to send the invitation
     * @param [type] $columns [description]
     */
    function set_custom_edit_survey_columns($columns) {

        $columns['invitation_email'] = 'Send email';
        return $columns;
    }
    add_filter( 'manage_edit-survey_columns', 'set_custom_edit_survey_columns' );

    /**
     * Add markup to the extra column we added in the above function
     * @param  [type] $column  [description]
     * @param  [type] $post_id [description]
     * @return [type]          [description]
     */
    function custom_survey_column($column, $post_id)
    {
        switch($column)
        {

            case 'invitation_email':

                $user = get_post_meta($post_id, 'user', true);
                if(is_array($user) && array_key_exists('ID', $user)) {

                    $has_access_to_reporting_tool = get_user_meta($user['ID'], 'has_access_to_reporting_tool', true);

                    $invited      = get_post_meta($post_id, 'invitation_send', true);
                    $completed    = get_post_meta($post_id, 'completed', true);
                    $button_tekst = ( $invited ? 'Resend' : 'Send' ) . ' e-mail';

                    echo '<input type="button" class="button send-email-button" data-id="' . $post_id . '" value="' . $button_tekst . '"></input>';
                    if("1" === $has_access_to_reporting_tool)
                    {
                        echo '<input type="button" class="button send-reportinginvite-button" data-id="' . $post_id . '" value="Send Reporting Invite"></input>';
                    }
                    if("1" !== $completed)
                    {
                        echo '<input type="button" class="button send-reminder-button" data-id="' . $post_id . '" value="Send Reminder"></input>';
                    }
                    echo '&nbsp;&nbsp;<input type="button" class="button delete-responses-button" data-id="' . $post_id . '" value="Delete Responses"></input>';
                }

                break;
        }
    }
    add_action( 'manage_survey_posts_custom_column' , 'custom_survey_column', 10, 2 );

    /**
     * Add ajax listener for sending the invite
     */
    add_action( 'wp_ajax_send_invitation', function() {

        //error_log('got this far');

        $invitation_id  = isset($_POST['invitation_id']) ? $_POST['invitation_id'] : false;
        $is_reminder    = isset($_POST['is_reminder']) ? $_POST['is_reminder'] : false;
        $is_reporting   = isset($_POST['is_reporting']) ? $_POST['is_reporting'] : false;

        if(!$invitation_id) {
            return false;
        }

        //$invitation = get_post($invitation_id);
        $token       = get_post_meta($invitation_id, 'auth_token', true);
        $user_id     = get_post_meta($invitation_id, 'user', true)['ID'];
        $user        = new WP_User($user_id);
        $user_role   = $user->roles[0];

        $durations = [
            'TM' => 5,
            'OM' => 10,
            'OP' => 10
        ];

        $evaluation_id  = get_post_meta($invitation_id, 'evaluation', true)['ID'];
        $evaluation_pod = pods('evaluation', $evaluation_id);
        $relation_pod   = pods('relation', $evaluation_pod->field('relation')['ID']);

        error_log('>>> Expiration '.json_encode($evaluation_pod->field('expiration')));

        $details = [
            'role'              => $user_role,
            'company_or_agency' => get_user_meta($user_id, 'company_or_agency', true),
            'company'           => $relation_pod->display('company'),
            'agency'            => $relation_pod->display('agency'),
            'brand'             => $relation_pod->display('brand'),
            'country'           => $relation_pod->display('country'),
            'duration'          => $durations[$user_role],
            'expiration'        => date_i18n('j F',strtotime('+ 2weeks'))
        ];

        $details['source_company'] = $details['company_or_agency'] == 'company' ? $details['company'] : $details['agency'];
        $details['target_company'] = $details['company_or_agency'] == 'company' ? $details['agency'] : $details['company'];

        if(!($details['company_or_agency'] === 'company' || $details['company_or_agency'] === 'agency')) {
            throw new Exception('User is neither of type agency or company');
        }

        $invitation_postfix = ($details['company_or_agency'] === 'company' ? 'client' : 'agency');

        //error_log('got this far');

        $email = new Emailer();
        $email->headers[] = 'Cc: Jasper Kums <jasper@eenvoudmedia.nl>' . "\r\n";

        try
        {
            $email->compose([
                'template'    => $is_reminder ? 'reminder' : ($is_reporting ? 'reporting' : 'invitation'.$invitation_postfix),
                'pre_header'  => '',
                'title'       => ($is_reminder ? 'Reminder ProCync Survey' : 'Welcome to ProCync'),
                'name'        => $user->display_name,
                'date'        => date_i18n('j M Y'),
                'button_text' => ($is_reporting ? 'VIEW REPORTING' : 'START SURVEY'),
                'button_url'  => get_bloginfo('url') . ($is_reporting ? '/reporting/' : '/survey/') . $token,
                'details'     => $details
            ]);

            $timestamp = time();
            $result = $email->send([
                'subject' => ($is_reminder ? 'Reminder ProCync Survey, ' : 'Welcome to ProCync, ').$user->display_name.' - '.$timestamp,
                'to' => $user->user_email,
            ]);


            if($result)
            {
                // Update post meta, so we know an invitation has already been sent
                update_post_meta($invitation_id, 'invitation_send', 1);
                update_post_meta($invitation_id, 'invitation_send_date', $timestamp);

                // Return success and the timestamp so we can update the row with javascript
                header('Content-Type: application/json');
                print_r(json_encode([
                    'success'   => 'success',
                    'date'      => date_i18n('d-M-Y G:i', $timestamp) //09-Jun-2015 18:31
                ]));

            }
            else
            {
                // Something went wrong sending the e-mail, but we don't know what
                header('Content-Type: application/json');
                print_r(json_encode([
                    'error' => 'error',
                    'message' => 'failed to send e-mail'
                ]));
            }

        } catch (Exception $e) {

            error_log(json_encode($e));

            // Something went wrong sending the e-mail, return error and error message
            header('Content-Type: application/json');
            print_r(json_encode([
                'error' => 'error',
                'message' => $e->getMessage()
            ]));
        }

        exit();
    });

    /**
     * Add script to survey admin screen for handling the ajax sending of the invitation
     */
    function survey_admin_script() {

        global $post_type;
        if('survey' == $post_type): ?>

        <script>

            (function($) {

                $(function() {

                    $('input.delete-responses-button').on('click', function() {

                        var $button = $(this),
                            $row = $button.parents('tr:first');

                        $.post(ajaxurl, {
                            action: 'deleteResponses',
                            survey_id: $button.attr('data-id')
                        })
                        .done(function(data) {
                            if (data.success) {
                                alert(data);
                            }
                        })
                        .fail(function() {
                            if (data.error && data.message) {
                                alert(data.message);
                            }
                        });
                    });

                    // invite
                    $('input.send-email-button').on('click', function() {

                        var $button = $(this),
                            $row = $button.parents('tr:first');

                        // save original text of button
                        if (!$button.data('value')) {
                            $button.data('value', $button.prop('value'));
                        }

                        $button.prop('value','Sending...').prop('disabled', 'disabled');
                        $.post(ajaxurl, {
                            action: 'send_invitation',
                            invitation_id: $button.attr('data-id')
                        })
                        .done(function(data) {
                            if (data.success) {
                                $row.find('.column-meta-1').html('Yes');
                                $row.find('.column-meta-2').html(data.date);
                                $button.prop('value','Done').prop('disabled', 'disabled');
                            }
                        })
                        .fail(function() {
                            if (data.error && data.message) {
                                alert(data.message);
                            }
                        });

                        $button.prop('value',$button.data('value')).removeProp('disabled');
                    });

                    // reminder
                    $('input.send-reminder-button').on('click', function() {

                        var $button = $(this),
                            $row = $button.parents('tr:first');

                        // save original text of button
                        if (!$button.data('value')) {
                            $button.data('value', $button.prop('value'));
                        }

                        $button.prop('value','Sending...').prop('disabled', 'disabled');
                        $.post(ajaxurl, {
                            action: 'send_invitation',
                            invitation_id: $button.attr('data-id'),
                            is_reminder: true
                        })
                        .done(function(data) {
                            if (data.success) {
                                $row.find('.column-meta-1').html('Yes');
                                $row.find('.column-meta-2').html(data.date);
                                $button.prop('value','Done').prop('disabled', 'disabled');
                            }
                        })
                        .fail(function() {
                            if (data.error && data.message) {
                                alert(data.message);
                            }
                        });

                        $button.prop('value',$button.data('value')).removeProp('disabled');
                    });

                    // invite
                    $('input.send-reportinginvite-button').on('click', function() {

                        var $button = $(this),
                            $row = $button.parents('tr:first');

                        // save original text of button
                        if (!$button.data('value')) {
                            $button.data('value', $button.prop('value'));
                        }

                        $button.prop('value','Sending...').prop('disabled', 'disabled');
                        $.post(ajaxurl, {
                            action: 'send_invitation',
                            invitation_id: $button.attr('data-id'),
                            is_reporting: true
                        })
                        .done(function(data) {
                            if (data.success) {
                                $button.prop('value','Done').prop('disabled', 'disabled');
                            }
                        })
                        .fail(function() {
                            if (data.error && data.message) {
                                alert(data.message);
                            }
                        });

                        $button.prop('value',$button.data('value')).removeProp('disabled');
                    });
                });

            })(jQuery);

        </script>

<?php
        endif;
    }
    add_action( 'admin_print_scripts', 'survey_admin_script', 200 );
?>
