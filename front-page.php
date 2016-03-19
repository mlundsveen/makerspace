<?php
/**
 * Template Name: Frontpage
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'frontpage' );

		// End the loop.
		endwhile;
		wp_reset_postdata();
		?>
		<!-- Next events -->
		<?php dynamic_sidebar( 'front-events' ); ?>

		<!-- Newest projects -->
		<div id="front-projects">
			<h2>Some new projects</h2>
			<div class="front-projects-all">
				<?php
								$args = array(
										'post_type' => 'project',
										'posts_per_page' => 3,
										'tax_query' => array(
											array (
												'taxonomy' 	=> 'projectcategory',
												'field' 		=> 'slug',
												'terms'			=> 'finished',
												'operator'	=> 'NOT IN' )
										),
								);
								$projects = new WP_Query( $args );
								if( $projects->have_posts() ) {
										while( $projects->have_posts() ) {
											 $projects->the_post();
												?>
												<div class="front-single-projects">
																			<div class="projects-img">
																					<?php the_post_thumbnail('front_imgs'); ?>
																				</div>
																				<a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a>
												</div>
										<?php
										}
								} ?>
												<?php wp_reset_postdata(); ?>
			   </div>
		</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
