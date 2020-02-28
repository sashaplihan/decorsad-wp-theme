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
                    <h2><?php echo single_cat_title() ?></h2>


                    <div class="row">
                        <?php $price_seedling = get_post_meta( $post->ID, 'sort_price', true ); ?>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="taxonomy_wrap_item">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="taxonomy_item">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('service_thumb', ["class" => "img-fluid"]); ?>
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

                            <?php endwhile; ?>
                        <?php else : ?>
                        В категории <?php echo single_cat_title() ?> на данный момент нет сортов для продажи
                        <?php endif; ?>


                    </div>


                </div>
            </div>
        </div>


    </div>

<?php
get_footer();
