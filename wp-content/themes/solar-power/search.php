<?php
/**
 * Displaying Search Results pages.
 * @package Solar Power
 * @subpackage solar-power
 * @since 1.0
 */

get_header(); ?>

<main id="main" role="main">
    <div class="post-wrapper mt-3">
        <div class="container">
            <div class="row">
                <?php
                $solar_power_layout = get_theme_mod( 'solar_power_theme_options','Right Sidebar');
                if($solar_power_layout == 'One Column'){?>
                    <div id="firstbox">
                        <?php if ( have_posts() ) : ?>
                            <h1 class="entry-title mb-3"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','solar-power'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php else : ?>
                            <h1 class="entry-title mb-3"><?php esc_html_e( 'Nothing Found', 'solar-power' ); ?></h1>
                        <?php endif; ?>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                              get_template_part( 'template-parts/post/content',get_post_format() ); 
                            endwhile;
                            else : ?>
                                <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'solar-power' ); ?></p>
                                <?php
                                get_search_form();
                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => esc_html__( 'Previous page', 'solar-power' ),
                                    'next_text'          => esc_html__( 'Next page', 'solar-power' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'solar-power' ) . ' </span>',
                                ));
                            ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                <?php }else if($solar_power_layout == 'Three Columns'){?>
                    <div class="row">
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
                        <div id="firstbox" class="col-lg-6 col-md-6">
                            <?php if ( have_posts() ) : ?>
                                <h1 class="entry-title mb-3"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','solar-power'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php else : ?>
                                <h1 class="entry-title mb-3"><?php esc_html_e( 'Nothing Found', 'solar-power' ); ?></h1>
                            <?php endif; ?>
                            <?php if ( have_posts() ) :
                              /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                  get_template_part( 'template-parts/post/content',get_post_format() ); 
                                endwhile;
                                else : ?>
                                    <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'solar-power' ); ?></p>
                                    <?php
                                    get_search_form();
                                endif; 
                            ?>
                            <div class="navigation">
                              <?php
                                  // Previous/next page navigation.
                                  the_posts_pagination( array(
                                      'prev_text'          => esc_html__( 'Previous page', 'solar-power' ),
                                      'next_text'          => esc_html__( 'Next page', 'solar-power' ),
                                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'solar-power' ) . ' </span>',
                                  ) );
                              ?>
                            </div>
                        </div>
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
                    </div>
                <?php }else if($solar_power_layout == 'Four Columns'){?>
                    <div class="row">
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
                        <div id="firstbox" class="col-lg-3 col-md-3">
                            <?php if ( have_posts() ) : ?>
                                <h1 class="entry-title mb-3"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','solar-power'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php else : ?>
                                <h1 class="entry-title mb-3"><?php esc_html_e( 'Nothing Found', 'solar-power' ); ?></h1>
                            <?php endif; ?>
                            <?php if ( have_posts() ) :
                              /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                  get_template_part( 'template-parts/post/content',get_post_format() ); 
                                endwhile;
                                else : ?>
                                    <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'solar-power' ); ?></p>
                                    <?php
                                    get_search_form();
                                endif; 
                            ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => esc_html__( 'Previous page', 'solar-power' ),
                                        'next_text'          => esc_html__( 'Next page', 'solar-power' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'solar-power' ) . ' </span>',
                                    ) );
                                ?>
                            </div>
                        </div>
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3'); ?></div>
                    </div>
                <?php }else if($solar_power_layout == 'Right Sidebar'){?>
                    <div class="row">
                        <div id="firstbox" class="col-lg-8 col-md-8">
                            <?php if ( have_posts() ) : ?>
                                <h1 class="entry-title mb-3"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','solar-power'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php else : ?>
                                <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'solar-power' ); ?></h1>
                            <?php endif; ?>
                            <?php if ( have_posts() ) :
                              /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                  get_template_part( 'template-parts/post/content',get_post_format() ); 
                                endwhile;
                                else : ?>
                                    <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'solar-power' ); ?></p>
                                    <?php
                                    get_search_form();
                                endif; 
                            ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => esc_html__( 'Previous page', 'solar-power' ),
                                        'next_text'          => esc_html__( 'Next page', 'solar-power' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'solar-power' ) . ' </span>',
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
                    </div>
                <?php }else if($solar_power_layout == 'Left Sidebar'){?>
                    <div class="row">
                        <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
                        <div id="firstbox" class="col-lg-8 col-md-8">
                            <?php if ( have_posts() ) : ?>
                                <h1 class="entry-title mb-3"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','solar-power'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php else : ?>
                                <h1 class="entry-title mb-3"><?php esc_html_e( 'Nothing Found', 'solar-power' ); ?></h1>
                            <?php endif; ?>
                            <?php if ( have_posts() ) :
                              /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                  get_template_part( 'template-parts/post/content',get_post_format() ); 
                                endwhile;
                                else : ?>
                                    <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'solar-power' ); ?></p>
                                    <?php
                                    get_search_form();
                                endif; 
                            ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => esc_html__( 'Previous page', 'solar-power' ),
                                        'next_text'          => esc_html__( 'Next page', 'solar-power' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'solar-power' ) . ' </span>',
                                    ) );
                                ?>
                            </div>
                        </div>
                    </div>
                <?php }else if($solar_power_layout == 'Grid Layout'){?>
                    <div id="firstbox">
                        <?php if ( have_posts() ) : ?>
                            <h1 class="entry-title mb-3"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','solar-power'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php else : ?>
                            <h1 class="entry-title mb-3"><?php esc_html_e( 'Nothing Found', 'solar-power' ); ?></h1>
                        <?php endif; ?>
                        <div class="row">
                            <?php if ( have_posts() ) :
                              /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                  get_template_part( 'template-parts/post/grid-layout' ); 
                                endwhile;
                                else : ?>
                                    <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'solar-power' ); ?></p>
                                    <?php
                                    get_search_form();
                                endif; 
                            ?>
                        </div>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => esc_html__( 'Previous page', 'solar-power' ),
                                    'next_text'          => esc_html__( 'Next page', 'solar-power' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'solar-power' ) . ' </span>',
                                ));
                            ?>
                        </div>
                    </div>
                <?php }else {?>
                    <div class="row">
                        <div id="firstbox" class="col-lg-8 col-md-8">
                            <?php if ( have_posts() ) : ?>
                                <h1 class="entry-title mb-3"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','solar-power'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                            <?php else : ?>
                                <h1 class="entry-title mb-3"><?php esc_html_e( 'Nothing Found', 'solar-power' ); ?></h1>
                            <?php endif; ?>
                            <?php if ( have_posts() ) :
                              /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                  get_template_part( 'template-parts/post/content' ,get_post_format()); 
                                endwhile;
                                else : ?>
                                    <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'solar-power' ); ?></p>
                                    <?php
                                    get_search_form();
                                endif; 
                            ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => esc_html__( 'Previous page', 'solar-power' ),
                                        'next_text'          => esc_html__( 'Next page', 'solar-power' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'solar-power' ) . ' </span>',
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>