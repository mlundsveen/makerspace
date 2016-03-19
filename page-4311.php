<?php
/**
 * The template for displaying the Make Magazine page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
					// Post thumbnail.
					twentyfifteen_post_thumbnail();
				?>

				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'twentyfifteen' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'twentyfifteen' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
					?>
				</div><!-- .entry-content -->
		</article><!-- #post-## -->
		<?php // End the loop.
		endwhile;
		?>
		<?php if(function_exists('pf_show_link')){echo pf_show_link();} ?>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
