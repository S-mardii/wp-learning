<?php

get_header();

if ( have_posts() ) {
?>
	<h2>
		<?php 
		if ( is_category() ) {
			single_cat_title( 'Category Archive: ' ) ;
		} elseif ( is_author() ) {
			// the_archive_title();
			the_post();
			echo 'Author Archive: ' . get_the_author();
			rewind_posts();
		} elseif ( is_tag() ) {
			single_tag_title( 'Tag Archive' );
		} elseif ( is_day() ) {
			echo "Daily Archive: " . get_the_date();
		} elseif ( is_month() ) {
			echo "Monthly Archive: " . get_the_date( 'F Y' );
		} elseif ( is_year() ) {
			echo "Yearly Archive: " . get_the_date( 'Y' );
		} else {
			echo "Archive: ";
		}
		?>
	</h2>
<?php
	while ( have_posts() ) {
		the_post();
?>
		<article>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p class="post-meta"><?php the_time( 'F jS, Y' ); ?> | 
				<a href="<?php echo get_author_posts_url( get_the_author_meta('ID'), get_the_author_meta('user_nicename') ); ?>">
					<?php the_author(); ?>
				</a>
				 |
				<?php 
				$categories = get_the_category();
				$pipe = ' | ';
				$output = '';

				foreach ( $categories as $category ) {
					$output .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>' . $pipe;
				}
				echo trim( $output, $pipe );
				?>
			</p>
			<?php the_excerpt(); ?>
		</article>
<?php
	}
} else {
	echo "<p>There are no posts!</p>";
}

get_footer();