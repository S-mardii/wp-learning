<?php

get_header(); ?>

<div class="main-content clearfix">
	<div class="main-column">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'thepost', get_post_format() );
			}
		} else {
			echo "<p>There are no posts!</p>";
		}
		?>
	</div> <!-- main-column -->

	<?php if ( is_active_sidebar( 'rightsidebar' ) ) { ?>
		<div class="sidebar-column">
			<?php dynamic_sidebar( 'rightsidebar' ); ?>
		</div> <!-- sidebar-column -->
	<?php } ?>
	
</div> <!-- main-content -->

<?php get_footer(); ?>