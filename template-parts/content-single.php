<?php
/**
 * Template part for displaying single posts.
 *
 * @package Stanton and Meredith
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php
		    /* translators: used between list items, there is a space after the comma */
		    $category_list = get_the_category_list( __( ', ', 'stanton-and-meredith' ) );

		    if ( stanton_and_meredith_categorized_blog() ) {
		        echo '<div class="category-list">' . $category_list . '</div>';
		    }
		?>


		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php stanton_and_meredith_posted_on(); ?>

			<?php 
			    if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) { 
			        echo '<span class="comments-link">';
			        comments_popup_link( __( 'Leave a comment', 'stanton-and-meredith' ), __( '1 Comment', 'stanton-and-meredith' ), __( '% Comments', 'stanton-and-meredith' ) );
			        echo '</span>';
			    }
			?>

		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'stanton-and-meredith' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php stanton_and_meredith_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

