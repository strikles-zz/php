<?php
// check for subnav
global $post;

$pages_to_hide = get_posts([
	'post_type' 		=> 'page',
	'posts_per_page' 	=> -1,
	'meta_key' 			=> 'hide_in_menu',
	'meta_value' 		=> true,
	'fields' 			=> 'ids'
]);

//print_r(implode($pages_to_hide, ','));


$children = wp_list_pages( [
	'title_li' => '',
	'child_of' => $post->post_parent?: $post->ID,
	'echo' 	=> 0,
	'exclude' => implode($pages_to_hide, ',')
]);


if ($children): ?>
<div class="sub-menu green">
	<ul> <?php echo $children; ?></ul>
</div>
<?php endif;?>