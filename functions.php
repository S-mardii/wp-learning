<?php
// register custom theme
function custom_theme_assets() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'custom_theme_assets' );

register_nav_menus( ['primary' => __( 'Primary Menu' )] );

function get_the_top_ancestor_id() {
	global $post;

	if ( $post->post_parent ) {
		$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
		return $ancestors[0];
	} else {
		return $post->ID;
	}
}

// // Customize Read More... excerpt link
// function new_excerpt_more( $more ) {
// 	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More...', 'your-text-domain') . '</a>';
// }
// add_filter( 'excerpt_more', 'new_excerpt_more' );

function customize_the_excerpt_length() {
	return 20;
}
add_filter( 'excerpt_length', 'customize_the_excerpt_length' );