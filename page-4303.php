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
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'page' );

		// End the loop.
		endwhile;
		?>
		<?php if(function_exists('pf_show_link')){echo pf_show_link();} ?>
    <section id="employees">
      <?php
          // Get Make Magazine files
          $args = array(
          	'post_type' => 'employee',
          );
          $the_query = new WP_Query( $args ); ?>

          <?php if ( $the_query->have_posts() ) : ?>

          	<!-- pagination here -->

          	<!-- the loop -->
          	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
              <div class="employee">
                <?php the_post_thumbnail('employee_imgs'); ?>
            		<h3><?php the_title(); ?></h3>
                <p><i class="fa fa-mobile"></i> <?php echo get_post_meta(get_the_ID(), 'employee_phone_number', true); ?></p>
                <p><i class="fa fa-envelope-o"></i> <?php echo get_post_meta(get_the_ID(), 'employee_e-mail', true); ?></p>
                <p><i class="fa fa-clock-o"></i> <?php echo strip_tags(get_post_meta(get_the_ID(), 'work_hours', true)); ?></p>
              </div>
          	<?php endwhile; ?>
          	<!-- end of the loop -->

          	<!-- pagination here -->

          	<?php wp_reset_postdata(); ?>

          <?php else : ?>
          	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
          <?php endif; ?>

    </section>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
