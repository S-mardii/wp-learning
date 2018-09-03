<?php

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'thepost', get_post_format() );
	}
} else {
	echo "<p>There are no posts!</p>";
}

get_footer();