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
<?php
$price_seedling = get_post_meta( $post->ID, 'sort_price', true );
$age_seedling = get_post_meta( $post->ID, 'age_sort', true );
$rootstock_seedling = get_post_meta( $post->ID, 'rootstock_sort', true );
$ripening = get_post_meta( $post->ID, 'ripening_period', true );
$size_seedling = get_post_meta( $post->ID, 'size_sort', true );
$taste_seedling = get_post_meta( $post->ID, 'taste_sort', true );
$color_seedling = get_post_meta( $post->ID, 'color_sort', true );
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
                    <div class="row">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div class="col-12 order-2 order-lg-1 col-lg-6">
                                <div class="slider_seeding">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('sort_thumb', ["class" => "img-responsive post_thumbnail"]); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-12 order-1 order-lg-2 col-lg-6">
                                <div class="seeding_wrap">
                                    <h2><?php echo esc_html( get_the_title() ); ?></h2>
                                    <?php if ($price_seedling) { ?>
                                        <div class="sort_price">
                                            <span class="price_value"><?php echo $price_seedling ; ?></span>
                                            <span class="price_currency">руб (BYN)</span>
                                        </div>
                                    <?php } ?>
                                    <?php
                                        if ((get_post_meta($post->ID, 'sort_characteristics_show', true ) != 'off')) :
                                    ?>
                                        <ul class="sort_list">
                                            <?php if ($age_seedling) { ?>
                                                <li>
                                                    <span class="grade_sort">Возраст</span>
                                                    <span class="sort_param"><?php echo $age_seedling ; ?></span>
                                                </li>
                                            <?php } ?>
                                            <?php if ($rootstock_seedling) { ?>
                                                <li>
                                                    <span class="grade_sort">Подвой</span>
                                                    <span class="sort_param"><?php echo $rootstock_seedling ; ?></span>
                                                </li>
                                            <?php } ?>
                                            <?php if ($ripening) { ?>
                                                <li>
                                                    <span class="grade_sort">Срок созревания</span>
                                                    <span class="sort_param"><?php echo $ripening ; ?></span>
                                                </li>
                                            <?php } ?>
                                            <?php if ($size_seedling) { ?>
                                                <li>
                                                    <span class="grade_sort">Размер ягод или плодов</span>
                                                    <span class="sort_param"><?php echo $size_seedling ; ?></span>
                                                </li>
                                            <?php } ?>
                                            <?php if ($taste_seedling) { ?>
                                                <li>
                                                    <span class="grade_sort">Вкус</span>
                                                    <span class="sort_param"><?php echo $taste_seedling ; ?></span>
                                                </li>
                                            <?php } ?>
                                            <?php if ($color_seedling) { ?>
                                                <li>
                                                    <span class="grade_sort">Цвет ягод или плодов</span>
                                                    <span class="sort_param"><?php echo $color_seedling ; ?></span>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-12 order-3">
                                <div class="seeding_description">
                                    <div class="sort_descr">Описание</div>
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
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();