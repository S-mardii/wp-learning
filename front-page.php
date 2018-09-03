<?php

get_header(); 

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
?>
	
	<article class="page-layout">
		<!-- Sub Menu -->
		<nav class="child-navigation-menu children-links clearfix">
			<ul>
				<?php
				$args = [
					'child_of' => get_the_top_ancestor_id(),
					'title_li' => '',
				];
				wp_list_pages( $args );
				?>
			</ul>
		</nav>
		<!-- Sub Menu -->
		<?php the_content(); ?>
	</article>

<?php
	}
} else {
	echo "<p>There are no posts!</p>";
}
?>

<!-- home-column -->
<div class="home-columns clearfix">
	<div class="home-left">
		<h3>Uncategorized</h3>
		<?php 
		$uncategorizedPosts = new WP_Query( ['category_name' => 'uncategorized'] );
		if ( $uncategorizedPosts->have_posts() ) {
			while ( $uncategorizedPosts->have_posts() ) {
				$uncategorizedPosts->the_post();
				get_template_part( 'thepost', get_post_format() );
			}
		} else {
			echo 'There is no Uncategorized posts.';
		}
		wp_reset_postdata();
		?>
	</div>
	
	<div class="home-right">
		<h3>Testing</h3>
		<?php
		$testingPosts = new WP_Query( ['category_name' => 'Testing'] );
		if ( $testingPosts->have_posts() ) {
			while ( $testingPosts->have_posts() ) {
				$testingPosts->the_post();
				get_template_part( 'thepost', get_post_format() );
			}
		} else {
			echo 'There is no Testing posts';
		}
		wp_reset_postdata();
		?>
	</div>
</div>
<!-- /home-columns -->

<?php
wp_reset_postdata();

get_footer(); 
?>