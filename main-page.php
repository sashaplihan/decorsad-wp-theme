<?php
/**
 * Template name: Главная страница
 */

get_header();
?>

<?php
$main_sliders = get_post_meta( $post->ID, 'main_slider_list', true );
$block_about_title = get_post_meta( $post->ID, 'about_title', true );
$title_sale_block = get_post_meta( $post->ID, 'sale_title', true );
$sale_list = get_post_meta( $post->ID, 'sale_list_item', true );
$top_product_title_block = get_post_meta( $post->ID, 'top_product_title', true );
$top_product_list = get_post_meta( $post->ID, 'top_product_list_item', true );
$top_button_title = get_post_meta( $post->ID, 'title_button_top', true );
$top_button_link = get_post_meta( $post->ID, 'link_button_top', true );

//echo '<pre>';
//echo print_r($top_product_list);
//echo '</pre>';
?>
<div class="main_content">

    <?php
        if ($main_sliders && (get_post_meta($post->ID, 'main_slider_show', true ) != 'off')) :
    ?>
        <section>
            <div class="main_slider">
                <div class="owl-carousel slider">
                    <?php
                    foreach ($main_sliders as $slider) :
                        $slide_image = $slider['slider_upload'] ? $slider['slider_upload'] : '';
                        $slide_title = $slider['slider_title'] ? $slider['slider_title'] : '';
                        $slide_description = $slider['slider_description'] ? $slider['slider_description'] : '';
                    ?>
                    <div class="slide" style="background-image: url(<?php echo $slide_image ; ?>);">
                        <h2><?php echo $slide_title ; ?></h2>
                        <p><?php echo $slide_description ; ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php
        if ($main_sliders && (get_post_meta($post->ID, 'about_show', true ) != 'off')) :
    ?>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1><?php echo $block_about_title ; ?></h1>
                        <div class="description_company">
                            <?php while ( have_posts() ) :the_post(); ?>
                                <?php the_content(); ?>
                            <? endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php
        if ($title_sale_block && (get_post_meta($post->ID, 'sale_show', true ) != 'off')) :
    ?>
        <section class="section invert">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-5 col-xl-8">
                        <h2><?php echo $title_sale_block ; ?></h2>
                    </div>
                    <div class="col-12 col-md-7 col-xl-4">
                        <?php
                        foreach ($sale_list as $sale) :
                            $sale_title_button = $sale['title_button_sale'] ? $sale['title_button_sale'] : '';
                            $sale_button_link = $sale['link_button_sale'] ? $sale['link_button_sale'] : '';
                        ?>
                        <a href="<?php echo $sale_button_link ; ?>" class="button button-green"><?php echo $sale_title_button ; ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="section pop_product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pop_product_title">
                        <h2><?php echo $top_product_title_block ; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                    foreach ($top_product_list as $product_id) :
                        $pop_id = get_post($product_id['main_top_product_list'], ARRAY_A);
//                    print_r($pop_id)
                ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="service_wrap_item">
                            <a href="<?php echo get_the_permalink($pop_id['ID']); ?>">
                                <div class="service_item">
                                    <?php if (get_the_post_thumbnail($pop_id['ID'])) : ?>
                                        <?php echo get_the_post_thumbnail($pop_id['ID'], 'pop_thumb'); ?>
                                    <?php endif; ?>
                                    <h3><?php echo $pop_id['post_title'] ?></h3>
                                    <?php if(get_post_meta( $pop_id['ID'], 'sort_price', true)) : ?>
                                        <div class="sort_price_taxonomy">
                                            <span class="price_value_taxonomy"><?php echo get_post_meta( $pop_id['ID'], 'sort_price', true) ; ?></span>
                                            <span class="price_currency_taxonomy">руб (BYN)</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="<?php echo $top_button_link ; ?>" class="button button_green"><?php echo $top_button_title ; ?></a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
