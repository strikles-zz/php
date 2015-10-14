<?php

function my_pre_save_post( $post_id )
{
    // check if this is to be a new post
    if( $post_id != 'new' )
    {
        return $post_id;
    }

    // Create a new post
    $post = array(
        'post_status'  => 'draft' ,
        'post_title'  => $_POST['post_title'],
        'post_excerpt'  => $_POST['post_excerpt'],
        'post_type'  => 'review' ,
    );

    // insert the post
    $post_id = wp_insert_post( $post );

    // update $_POST['return']
    $_POST['return'] = add_query_arg( array('post_id' => $post_id), $_POST['return'] );

    // return the new ID
    return $post_id;
}

add_filter('acf/pre_save_post' , 'my_pre_save_post' );

?>

<?php



acf_form_head();

get_header();

the_post();


// check for subnav
$children = 0;
if(!$post->post_parent){
	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
}
else{
	$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
}
?>

<div id="content">
	<div class="container">
		<div class="row">
			<?php if($children){ ?>
			<div class="col-md-3 col-sm-4 hidden-xs">
				<div class="sub-menu green">
					<ul> <?php echo $children; ?></ul>
				</div>
			</div>
			<div class="col-md-9 col-sm-8">
			<?php } else { // no subnav?>
			<div class="col-md-12">
			<?php } ?>
			<?php

			$args = array(
				'post_id' => 'new',
				'post_title' => true,
				'html_before_fields' => '
					<div class="field">
						<p class="label">
							<label for="Voornaam">Voornaam</label>
						</p>
						<div class="acf-input-wrap">
							<input type="text" name="post_title"/>
						</div>
					</div>',
				'html_after_fields' => '
					<div class="field">
						<p class="label">
							<label for="Bericht">Bericht</label>
						</p>
						<div class="acf-input-wrap">
							<input type="text" name="post_excerpt"/>
						</div>
					</div>',
            	'submit_value' => 'Verstuur Bericht!',
				'field_groups' => array( 387 )
			);

			acf_form( $args );

			?>

			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>