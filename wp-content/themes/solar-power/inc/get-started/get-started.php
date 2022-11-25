<?php
//about theme info
add_action( 'admin_menu', 'solar_power_gettingstarted' );
function solar_power_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started: Education Theme', 'solar-power'), esc_html__('Get Started', 'solar-power'), 'edit_theme_options', 'solar_power_guide', 'solar_power_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function solar_power_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/get-started/get-started.css');
}
add_action('admin_enqueue_scripts', 'solar_power_admin_theme_style');

//guidline for about theme
function solar_power_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'solar-power' );
?>

<div class="wrapper-info">
	<div class="top-section">
	    <div class="col-left">
	    	<h2><?php esc_html_e( 'Welcome to Solar Power Theme', 'solar-power' ); ?></h2>
	    	<span class="version">Version: <?php echo esc_html($theme['Version']);?></span>
	    	<p><?php esc_html_e('Solar Power comes with a clean, sleek, modern, and sophisticated WordPress theme with an intuitive design and catchy layout. The design is absolutely spot-on for solar energy companies solar plants, solar panels manufacturing companies, green energy units, and any business that deals with solar energy. To make your website perfectly resize itself you have a responsive and retina-ready design that seamlessly works on any device. Professional design is what it gives along with translation readiness thanks to its RTL and WPML compatibility. Moreover, you do get a lot of personalization options for making a unique website. This theme offers you an SEO-friendly design that is the result of SEO-optimized codes included in the core of this theme. For boosting the conversions, there is impressive Call To Action Buttons (CTA) placed at various points. You cannot miss the various social media options included in this theme as it helps you connect with more people. Secure and clean codes do their work very well as they not only make your website lightweight but also results in a splendid performance. The Bootstrap framework already makes it a robust WordPress theme with fast page load time and plenty of shortcodes to work with in order to get an outstanding website.', 'solar-power'); ?></p>
	    </div>
	    <div class="col-right">
	    	<div class="logo">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/solar-power.png" alt="" />
			</div>
	    </div>
	    <div class="info-link">
			<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'solar-power'); ?></a>
			<a href="<?php echo esc_url( SOLAR_POWER_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'solar-power'); ?></a>
			<a class="get-pro" href="<?php echo esc_url( SOLAR_POWER_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'solar-power'); ?></a>
		</div>
	</div>

	<div class="accordain-sec">
		<div class="block">
		  	<input type="radio" name="city" id="cityA" checked />   
		  	<label for="cityA"><span><?php esc_html_e( 'Visit to our amazing Premium Theme', 'solar-power' ); ?></span><span class="dashicons dashicons-arrow-down"></span></label>
		  	<div class="info1">
			  	<h3><?php esc_html_e( 'Premium Theme Information', 'solar-power' ); ?></h3>
			  	<hr class="hr-accr">
			  	<div class="sec-left-inner">
			  		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/solar-power.png" alt="" />
			  		<p class="lite-para"><?php esc_html_e('Any sustainable power or solar energy-related businesses need an online presence and for that, this Solar WordPress Theme is the best solution. This is one of the modern themes you will find in the market with all the functionality included to make a better website. Developers have made use of HTML codes and built the design on Bootstrap framework that makes the website robust and results in an extremely lightweight design. Having said that, your website won’t have any loading issues or unnecessary lagging delays as the pages will get loaded within a second or two without asking your visitors to wait.', 'solar-power'); ?></p>

					<div class="info-link-top">
						<a href="<?php echo esc_url( SOLAR_POWER_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'solar-power' ); ?></a>
						<a href="<?php echo esc_url( SOLAR_POWER_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'solar-power' ); ?></a>
						<a href="<?php echo esc_url( SOLAR_POWER_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'solar-power' ); ?></a>
					</div>					
			  	</div>
		  	</div>
		</div>
		<div class="block">
		  	<input type="radio" name="city" id="cityB"/>
		  	<label for="cityB"><span><?php esc_html_e( 'Theme Features', 'solar-power' ); ?></span><span class="dashicons dashicons-arrow-down"></span></label>
		  	<div class="info2">
			    <h3><?php esc_html_e( 'Lite Theme v/s Premium Theme', 'solar-power' ); ?></h3>
			  	<hr class="hr-accr">
			  	<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'solar-power'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'solar-power'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'solar-power'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'solar-power'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'solar-power'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'solar-power'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'solar-power'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'solar-power'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'solar-power'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'solar-power'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'solar-power'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Contact us Page Template', 'solar-power'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'solar-power'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Blog Templates & Layout', 'solar-power'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'solar-power'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Page Templates & Layout', 'solar-power'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'solar-power'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Full Documentation', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Latest WordPress Compatibility', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support 3rd Party Plugins', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Secure and Optimized Code', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Exclusive Functionalities', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Enable / Disable', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Google Font Choices', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Gallery', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Simple & Mega Menu Option', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Shortcodes', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Premium Membership', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Budget Friendly Value', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Priority Error Fixing', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Feature Addition', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('All Access Theme Pass', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Seamless Customer Support', 'solar-power'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no-alt"></span></td>
								<td class="table-img"><span class="dashicons dashicons-yes"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( SOLAR_POWER_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'solar-power'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
		 	</div>
		</div>
	</div>
</div>
<?php } ?>