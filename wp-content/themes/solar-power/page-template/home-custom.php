<?php
/**
 * Template Name: Home Custom Page
 */
?>

<?php get_header(); ?>

<main id="main" role="main">
  <?php do_action( 'solar_power_above_slider' ); ?>
    <?php if( get_theme_mod('solar_power_slider_hide_show', false) != ''){ ?> 
      <section id="slider" class="m-0 p-0 mw-100">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel"> 
          <?php $solar_power_content_pages = array();
            for ( $count = 1; $count <= 4; $count++ ) {
              $mod = intval( get_theme_mod( 'solar_power_slider_page' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $solar_power_content_pages[] = $mod;
              }
            }
            if( !empty($solar_power_content_pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $solar_power_content_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
          ?>     
          <div class="carousel-inner" role="listbox">
            <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
              <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <?php if ( get_theme_mod('solar_power_slider_title',true) == true ) {?>
                    <h1><?php the_title(); ?></h1>
                    <?php }?>
                     <?php if ( get_theme_mod('solar_power_slider_content',true) == true ) {?>
                      <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( solar_power_string_limit_words( $excerpt,15 ) ); ?></p></div>
                    <?php }?>
                    <?php if ( get_theme_mod('solar_power_slider_button',true) == true ) {?>
                    <div class="read-btn mt-4">
                      <a href="<?php echo esc_url(get_permalink()); ?>" class="py-2 px-3"><?php esc_html_e( 'Read More', 'solar-power' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Read More', 'solar-power' );?></span></a>
                    </div>
                   <?php }?>
                  </div>
                </div>
              </div>
            <?php $i++; endwhile; 
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
              <div class="no-postfound"></div>
            <?php endif;
          endif;?>
          <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-arrow-left"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Previous', 'solar-power' );?></span>
          </a>
          <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-arrow-right"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Next', 'solar-power' );?></span>
          </a>
        </div>   
        <div class="clearfix"></div>
      </section>
    <?php }?>
  <?php do_action( 'solar_power_below_slider' ); ?>

  <?php if( get_theme_mod('solar_power_features_small_title') != '' || get_theme_mod('solar_power_features_title') != '' || get_theme_mod('solar_power_category_setting') != ''){ ?>
    <section id="our-features" class="text-center py-5">
      <div class="container">     
        <div class="features-title mb-5">
          <?php if( get_theme_mod('solar_power_features_small_title') != ''){ ?>
            <p class="small-title text-center pb-2"><?php echo esc_html(get_theme_mod('solar_power_features_small_title')); ?></p>
          <?php }?>
          <?php if( get_theme_mod('solar_power_features_title') != ''){ ?>
            <h3 class="text-center"><?php echo esc_html(get_theme_mod('solar_power_features_title')); ?></h3>
          <?php }?>
        </div>
        <div class="owl-carousel">
          <?php $solar_power_catData =  get_theme_mod('solar_power_category_setting');
          if($solar_power_catData){
          $page_query = new WP_Query(array( 'category_name' => esc_html($solar_power_catData,'solar-power'))); ?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>  
            <div class="features-box mx-3 pb-2">
              <div class="features-img">
               <?php the_post_thumbnail(); ?>
             </div>
              <div class="content">
                <h4 class="text-center mt-2"><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h4>
                <p class="my-2 text-center"><?php $excerpt = get_the_excerpt(); echo esc_html( solar_power_string_limit_words( $excerpt,12 ) ); ?></p>
              </div>
            </div>
          <?php endwhile; 
          wp_reset_postdata();
          }
          ?>
        </div>
        <div class="clearfix"></div>
      </div>
    </section>
  <?php }?>
  <?php do_action( 'solar_power_below_our_services' ); ?>

  <div class="container entry-content">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>
<?php get_footer(); ?>