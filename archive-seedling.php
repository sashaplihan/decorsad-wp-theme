<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cardening
 */

get_header();
?>


    <div class="page_useful">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-4 order-sm-1 col-md-3">
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
                <div class="col-12 col-sm-8 order-sm-2 col-md-9">
                    <?php if ( have_posts() ) : ?>

                        <h2><?php post_type_archive_title(); ?></h2>

                        <div class="row">
                            <?php
                            $count = 0;
                            $args = array( 'post_type' => 'seedling', 'posts_per_page' => -1 );
                            $price_seedling = get_post_meta( $post->ID, 'sort_price', true );
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                    <div class="taxonomy_wrap_item">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="taxonomy_item">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <?php the_post_thumbnail('service_thumb', ["class" => "img-responsive post_thumbnail"]); ?>
                                                <?php endif; ?>
                                                <h3><?php the_title( ); ?></h3>
                                                <?php if ($price_seedling) { ?>
                                                    <div class="sort_price_taxonomy">
                                                        <span class="price_value_taxonomy"><?php echo $price_seedling ; ?></span>
                                                        <span class="price_currency_taxonomy">руб (BYN)</span>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                                <?php $count++; ?>
                                <?php if ($count % 3 == 0): ?>
                                    <div class="clearfix"></div>
                                    <br>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>

                    <?php else : ?>

                        <?php get_template_part( 'template-parts/content', 'none' ); ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>


    </div>

<?php
get_footer();
