<?php
/**
 * The template for displaying the footer
 * 
 * @subpackage urja-solar-energy
 * @since 1.0
 * @version 0.1
 */

?>
		</div>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="container">
				<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
			</div>
			<div class="clearfix"></div>
			<div class="copyright"> 
				<div class="container">
					<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
				</div>
			</div>
		</footer>
		<?php if (get_theme_mod('urja_solar_energy_show_back_totop',true) != ''){ ?>
			<button role="tab" class="back-to-top"><span class="back-to-top-text"><?php echo esc_html('Top', 'urja-solar-energy'); ?></span></button>
		<?php }?>
	</div>
</div>
		
<?php wp_footer(); ?>

</body>
</html>