<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Cardening
 */

get_header();
?>

    <div class="custom_post_page">
        <div class="container">
            <div class="row">
                <div class="col-12 order-2 col-sm-4 order-sm-1 col-md-3">
                    <div class="sidebar_wrap">
                        <h3>Каталог сортов</h3>
                        <nav class="side_menu">
                            <?php wp_nav_menu( [
                                'theme_location'  => 'side_menu',
                                'menu'            => '',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'side_left_menu',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth'           => 2,
                                'walker'          => '',
                            ] );
                            ?>
                        </nav>
                    </div>
                </div>
                <div class="col-12 order-1 col-sm-8 order-sm-2 col-md-9">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <h2><?php echo esc_html( get_the_title() ); ?></h2>
                        <div class="entry-content">
                            <?php
                            the_content( sprintf(
                                wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'garden' ),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                get_the_title()
                            ) );
                            ?>
                        </div>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();