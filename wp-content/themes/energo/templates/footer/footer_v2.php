<?php
/**
 * Footer Template  File
 *
 * @package ENERGO
 * @author  Theme Kalia
 * @version 1.0
 */

$options = energo_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

$footer_bg = $options->get( 'footer_bg_v1' );
$footer_bg = energo_set( $footer_bg, 'url', ENERGO_URI . 'assets/images/shape/shape-4.png' ); ?>
	
    <!-- main-footer -->
	<footer class="footer-style-two bg-color-2">
		<div class="footer-top">
			<div class="pattern-layer" style="background-image: url(<?php echo esc_url($footer_bg); ?>);"></div>
			
			<?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?>
			<div class="auto-container">
				<div class="row clearfix">
					<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="footer-bottom">
			<div class="auto-container">
				<div class="inner-box clearfix">
					<div class="copyright pull-left">
						<p><?php echo wp_kses( $options->get( 'copyright_text', 'Copyright &copy; 2021 <a href="http://fastwpdemo.com/newwp/energo/">Energo</a>. All Rights Reserved.' ), true ); ?></p>
					</div>
					
					<?php if($options->get( 'show_footer_menu_v2' )) { ?>
					<ul class="footer-nav clearfix pull-right">
						<?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'container_id' => 'navbar-collapse-1',
							'container_class'=>'navbar-collapse collapse navbar-right',
							'menu_class'=>'nav navbar-nav',
							'fallback_cb'=>false,
							'items_wrap' => '%3$s',
							'container'=>false,
							'depth'=>'1',
							'walker'=> new Bootstrap_walker()
						) ); ?>
					</ul>
					<?php } ?>
				</div>
			</div>
		</div>
	</footer>
	<!-- main-footer end -->

	<!-- scroll to top -->
	<button class="scroll-top scroll-to-target" data-target="html">
		<i class="flaticon-up-arrow"></i>
	</button>
