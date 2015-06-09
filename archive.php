<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Stanton and Meredith
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">

				<h1 class="page-title">

					<?php
					if ( is_category() ) :
					    printf( __( 'Posts in the ', 'stanton-and-meredith' ) );
					    echo '<em>';
					    single_cat_title();
					    echo '</em> ' . __('category', 'stanton-and-meredith') . ':';

					elseif ( is_tag() ) :
					    printf( __( 'Posts with the ', 'stanton-and-meredith' ) );
					    echo '<em>';
					    single_tag_title();
					    echo '</em> ' . __('tag', 'stanton-and-meredith') . ':';

					elseif ( is_author() ) :
					    printf( __( 'Author: %s', 'stanton-and-meredith' ), '<span class="vcard">' . get_the_author() . '</span>' );

					elseif ( is_day() ) :
					    printf( __( 'Posts from %s', 'stanton-and-meredith' ), '<span>' . get_the_date() . '</span>' );

					elseif ( is_month() ) :
					    printf( __( 'Posts from %s', 'stanton-and-meredith' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'stanton-and-meredith' ) ) . '</span>' );

					elseif ( is_year() ) :
					    printf( __( 'Posts from %s', 'stanton-and-meredith' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'stanton-and-meredith' ) ) . '</span>' );

					elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
					    _e( 'Asides', 'stanton-and-meredith' );

					else :
					    _e( 'Archives', 'stanton-and-meredith' );

					endif;
					?>

				</h1>

				<?php
					
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php stanton_and_meredith_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
