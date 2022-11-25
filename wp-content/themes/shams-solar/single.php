<?php
/**
 * The template for displaying all single posts
 */
get_header(); ?>

<main id="main" role="main">
	<div class="container">
		<div class="row">
			<?php
		    $shams_solar_layout_settings = get_theme_mod( 'shams_solar_layout_settings', __('Right Sidebar','shams-solar') );
			if($shams_solar_layout_settings == 'Left Sidebar'){ ?>
			    <div id="sidebox" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebox-1'); ?>
				</div>
				<div class="col-lg-8 col-md-8">
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post(); 

							get_template_part( 'template-parts/post/single-post' );
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();

							endif;

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'shams-solar' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'shams-solar' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );?>

							<?php if( get_theme_mod( 'shams_solar_show_single_post_pagination',true) != '') {

											the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html(get_theme_mod('shams_solar_next_text',__( 'Next Post', 'shams-solar' ))) . '<i class="fas fa-chevron-right ms-1"></i></span> ' .
									'<span class="screen-reader-text">' . __( 'Next Post', 'shams-solar' ) . '</span> ' .
									'',
								'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="fas fa-chevron-left me-1"></i>' . esc_html(get_theme_mod('shams_solar_prev_text',__( 'Previous Post', 'shams-solar' ))) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous Post', 'shams-solar' ) . '</span> ' .
									'',
							) );
						}

						endwhile; // End of the loop.

					?>
				</div>
			<?php }else if($shams_solar_layout_settings == 'Right Sidebar'){ ?>
				<div class="col-lg-8 col-md-8">
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post(); 

							get_template_part( 'template-parts/post/single-post' ); 
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'shams-solar' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'shams-solar' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );?>

							<?php if( get_theme_mod( 'shams_solar_show_single_post_pagination',true) != '') {

												the_post_navigation( array(
									'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html(get_theme_mod('shams_solar_next_text',__( 'Next Post', 'shams-solar' ))) . '<i class="fas fa-chevron-right ms-1"></i></span> ' .
										'<span class="screen-reader-text">' . __( 'Next Post', 'shams-solar' ) . '</span> ' .
										'',
									'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="fas fa-chevron-left me-1"></i>' . esc_html(get_theme_mod('shams_solar_prev_text',__( 'Previous Post', 'shams-solar' ))) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Previous Post', 'shams-solar' ) . '</span> ' .
										'',
								) );
						}

						endwhile; // End of the loop.

					?>
				</div>
				<div id="sidebox" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebox-1'); ?>
				</div>
			<?php }else if($shams_solar_layout_settings == 'One Column'){ ?>
				<div class="col-lg-12 col-md-12">
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post(); 

							get_template_part( 'template-parts/post/single-post' ); 
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'shams-solar' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'shams-solar' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );?>

							<?php if( get_theme_mod( 'shams_solar_show_single_post_pagination',true) != '') {

											the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html(get_theme_mod('shams_solar_next_text',__( 'Next Post', 'shams-solar' ))) . '<i class="fas fa-chevron-right ms-1"></i></span> ' .
									'<span class="screen-reader-text">' . __( 'Next Post', 'shams-solar' ) . '</span> ' .
									'',
								'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="fas fa-chevron-left me-1"></i>' . esc_html(get_theme_mod('shams_solar_prev_text',__( 'Previous Post', 'shams-solar' ))) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous Post', 'shams-solar' ) . '</span> ' .
									'',
							) );
						}

						endwhile; // End of the loop.

					?>
				</div>
			<?php }else if($shams_solar_layout_settings == 'Grid Layout'){ ?>
				<div class="col-lg-8 col-md-8">
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post(); 

							get_template_part( 'template-parts/post/single-post' ); // If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'shams-solar' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'shams-solar' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );?>

							<?php if( get_theme_mod( 'shams_solar_show_single_post_pagination',true) != '') {

											the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html(get_theme_mod('shams_solar_next_text',__( 'Next Post', 'shams-solar' ))) . '<i class="fas fa-chevron-right ms-1"></i></span> ' .
									'<span class="screen-reader-text">' . __( 'Next Post', 'shams-solar' ) . '</span> ' .
									'',
								'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="fas fa-chevron-left me-1"></i>' . esc_html(get_theme_mod('shams_solar_prev_text',__( 'Previous Post', 'shams-solar' ))) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous Post', 'shams-solar' ) . '</span> ' .
									'',
							) );
						}

						endwhile; // End of the loop.

					?>
				</div>
				<div id="sidebox" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebox-1'); ?>
				</div>
			<?php }else {?>
				<div class="col-lg-8 col-md-8">
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post(); 

							get_template_part( 'template-parts/post/single-post' ); 
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'shams-solar' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'shams-solar' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );?>

							<?php if( get_theme_mod( 'shams_solar_show_single_post_pagination',true) != '') {

											the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html(get_theme_mod('shams_solar_next_text',__( 'Next Post', 'shams-solar' ))) . '<i class="fas fa-chevron-right ms-1"></i></span> ' .
									'<span class="screen-reader-text">' . __( 'Next Post', 'shams-solar' ) . '</span> ' .
									'',
								'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="fas fa-chevron-left me-1"></i>' . esc_html(get_theme_mod('shams_solar_prev_text',__( 'Previous Post', 'shams-solar' ))) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous Post', 'shams-solar' ) . '</span> ' .
									'',
							) );
						}

						endwhile; // End of the loop.

					?>
				</div>
				<div id="sidebox" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebox-1'); ?>
				</div>
			<?php }?>
		</div>
	</div>
</main>

<?php get_footer();