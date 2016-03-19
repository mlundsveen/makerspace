<?php
/**
 * Template Name: Inventory Page Template
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
    <div id="active-projects">
			<h2><?php _e('Active projects', 'makerspace'); ?></h2>
			      <?php
							$args = array(
							    'post_type' => 'project',
							    'posts_per_page' => 9999,
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
							        <div class="active single-projects <?php if(get_post_meta(get_the_ID(), 'project_open', true)) { echo 'open-project'; } ?>">
			                            	<div class="projects-img">
			                           	    	<?php the_post_thumbnail('projects_imgs'); ?>
			                           	    </div>
			                                <a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a>
							        </div>
							    <?php
							    }
							} ?>
			                <?php wp_reset_postdata(); ?>
    </div>
		<div id="archived-projects">
			<h2><?php _e('Archived projects', 'makerspace'); ?></h2>
				<ul>
      <?php
							$args = array(
							    'post_type' => 'project',
							    'posts_per_page' => 9999,
									'tax_query' => array(
										array (
											'taxonomy' 	=> 'projectcategory',
											'field' 		=> 'slug',
											'terms'			=> 'finished',
											'operator'	=> 'IN' )
									),
							);
							$projects = new WP_Query( $args );
							if( $projects->have_posts() ) {
							    while( $projects->have_posts() ) {
							       $projects->the_post();
							        ?>
			                <li class="archived single-projects"><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></li>
							    <?php
							    }
							} ?>
			                <?php wp_reset_postdata(); ?>
			 </ul>
    </div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
