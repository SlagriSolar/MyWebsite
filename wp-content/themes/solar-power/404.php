<?php
/**
 * Display 404 page
 * @package Solar Power
 */

get_header(); ?>

<main id="main" role="main" class="main-content">
    <div class="container">
        <div class="page-content my-5">
            <h1 class="mb-2 p-0"><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'solar-power' ), esc_html__( 'Not Found', 'solar-power' ) ) ?></h1>
            <p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn', 'solar-power' ); ?></p>
            <p class="text-404"><?php esc_html_e( 'Dont worry it happens to the best of us.', 'solar-power' ); ?></p>
            <div class="read-moresec my-4">
                <a href="<?php echo esc_url( home_url() ); ?>" class="button hvr-sweep-to-right py-2 px-3"><?php esc_html_e( 'Return to home page', 'solar-power' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Return to home page', 'solar-power' );?></span></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</main>

<?php get_footer(); ?>