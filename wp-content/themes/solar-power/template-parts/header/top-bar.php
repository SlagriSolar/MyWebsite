<?php 
/*
* Display Top Bar
*/
?>
<?php if( get_theme_mod('solar_power_show_topbar', false) != ''){ ?>
  <?php if( get_theme_mod( 'solar_power_topar_text' ) != '' || get_theme_mod( 'solar_power_call' ) != '' || get_theme_mod( 'solar_power_button_text' ) != '' || get_theme_mod( 'solar_power_button_link' ) != '' ) { ?>
    <div class="top-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-md-5 align-self-center ps-md-5">
            <?php if( get_theme_mod( 'solar_power_topar_text' ) != '') { ?>
              <p class="topbar-text ms-xl-5 text-md-start text-center"><?php echo esc_html( get_theme_mod('solar_power_topar_text') ); ?></p>
            <?php } ?>
          </div>
          <div class="col-lg-3 col-md-3 align-self-center">      
            <span class="call text-md-end text-center">
              <?php if( get_theme_mod( 'solar_power_call' ) != '') { ?>
                <i class="fas fa-phone pe-2"></i><a href="tel:<?php echo esc_url( get_theme_mod('solar_power_call','' )); ?>"><?php echo esc_html( get_theme_mod('solar_power_call') ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('solar_power_call') ); ?></span></a>
              <?php } ?>
            </span>   
          </div>
          <div class="col-lg-3 col-md-4 request-btn align-self-center text-lg-center text-center p-3">
            <?php if ( get_theme_mod('solar_power_button_text') != "" ) {?>
              <a href="<?php echo esc_html( get_theme_mod('solar_power_button_link','') ); ?>" class="py-2 px-3"><?php echo esc_html( get_theme_mod('solar_power_button_text') ); ?><i class="fas fa-arrow-right ms-2"></i><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('solar_power_button_text') ); ?></span></a> 
            <?php }?>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  <?php }?>
<?php }?>