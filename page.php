<?php
get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
?>
		<article class="page-layout">
			<div class="child-navigation-menu">
				<ul>
					<?php $args = [
						'child_of' => get_the_top_ancestor_id(),
						'title_li' => '', 
					];

					wp_list_pages( $args ); 
					?>
				</ul>
			</div>

			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
		</article>
<?php
	}
} else {
	echo "<p>There are no pages!</p>";
}

get_footer();