<?php

// admin procync options
function add_admin_styles () {
    wp_enqueue_style('admin_style', get_template_directory_uri() . '/assets/css/admin.css', array());
}

if (is_admin()) {
    add_action('admin_enqueue_scripts', 'add_admin_styles' );
}

function procync_settings_view() {
    include_once __DIR__ . '/../views/admin/settings.php';
}

function my_plugin_menu() {
    add_options_page('ProCync', 'ProCync', 'manage_options', 'procync.php', 'procync_settings_view');
}

add_action('admin_menu', 'my_plugin_menu');

add_action( 'login_form_middle', 'add_lost_password_link' );
function add_lost_password_link() {
    return '<p class="forgot-password"><a href="/wp-login.php?action=lostpassword">Forgot Login?</a></p>';
}

// auto generate relationship titles
add_filter('title_save_pre', function($title) {

    global $post;
    if (!$post)
    {
        return $title;
    }

    if ('evaluation' === $post->post_type)
    {
        if(isset($_REQUEST['pods_meta_relation']))
        {
            if(!(array_key_exists('pods_meta_relation', $_REQUEST) && array_key_exists('pods_meta_period_year', $_REQUEST) && array_key_exists('pods_meta_period_quarter', $_REQUEST) && array_key_exists('pods_meta_180_360', $_REQUEST) ))
            {
                return $title;
            }

            $relation_name  = get_post($_REQUEST['pods_meta_relation'])->post_title;
            $period_year    = $_REQUEST['pods_meta_period_year'];
            $period_quarter = $_REQUEST['pods_meta_period_quarter'];
            $relation_type = $_REQUEST['pods_meta_180_360'];
            $title_str      = $relation_name.' - '.$period_year.' - Q'.$period_quarter.' - '.$relation_type;

            return $title_str;
        }

        return $title;
    }
    elseif('relation' === $post->post_type)
    {
        // invoked on delete
            if(!(array_key_exists('pods_meta_agency', $_REQUEST) && array_key_exists('pods_meta_company', $_REQUEST) && array_key_exists('pods_meta_brand', $_REQUEST) && array_key_exists('pods_meta_country', $_REQUEST) ))
        {
            return $title;
        }

        $agency_name   = get_post($_REQUEST['pods_meta_agency'])->post_title;
        $company_name  = get_post($_REQUEST['pods_meta_company'])->post_title;
        $brand_name    = get_post($_REQUEST['pods_meta_brand'])->post_title;
        $country       = $_REQUEST['pods_meta_country'];

        $title_str = $company_name.' - '.$country.' - '.$agency_name.' - '.$brand_name;

        return $title_str;
    }

    return $title;

});

add_action( 'pods_api_post_save_pod_item_evaluation', 'create_survey', 99999, 3 );
function create_survey($pieces, $is_new_item, $post_id)
{
    // $is_new_item is never new :(
    LimesurveyModel::createSurveys($post_id);
}

//////////////////
// delete hooks //
//////////////////

// delete evaluation
add_action( 'pods_api_pre_delete_pod_item_evaluation', 'delete_evaluation', 99999, 3 );
function delete_evaluation($params, $pod)
{
    error_log('delete evaluation '.json_encode($params).'-'.json_encode($pod));
    $surveys = EvaluationModel::surveys($params->id);
    error_log('eval surveys '.json_encode($surveys));

    foreach ($surveys as $key => $survey) {
        wp_delete_post($survey->ID, true);
    }
}

// delete relation
add_action( 'pods_api_pre_delete_pod_item_relation', 'delete_relation', 99999, 3 );
function delete_relation($params, $pod)
{
    error_log('delete relation '.json_encode($params).'-'.json_encode($pod));
    $evaluations = RelationModel::evaluations($params->id);
    error_log('rel evaluations '.json_encode($evaluations));

    foreach ($evaluations as $key => $evaluation) {
        wp_delete_post($evaluation->ID, true);
    }
}

// delete user
add_action( 'delete_user', 'remove_user');
function remove_user($user_id)
{
    $survey = pods('survey', [
        'limit'     => -1,
        'where'     => 'user.ID = ' . $user_id
    ]);

    while ( $survey->fetch() ) {

        $candidate_user = $survey->field('user');
        error_log(json_encode($candidate_user));
        if($candidate_user) {
            error_log(json_encode($candidate_user));
            //wp_delete_post($user_survey->ID, true);
        }
    }
}


add_action( 'wp_ajax_response_seeder', function()
{
    ResponseSeeder::run();
    AjaxResponse::stream([
        'success' => 'success'
    ], true);

    exit;
});
