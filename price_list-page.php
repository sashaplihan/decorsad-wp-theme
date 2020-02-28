<?php
/**
 * Template name: Страница прайс-лист
 */
get_header();
?>
<?php
$title_action_price_list = get_post_meta( $post->ID, 'title_action', true );
$discount_price_list = get_post_meta( $post->ID, 'discount_action', true );
$qr_code_picture_price_list = get_post_meta( $post->ID, 'qr_code_picture', true );
$price_list_download = get_post_meta( $post->ID, 'price_list_list', true );
?>
    <div class="price_list_page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="action_title">
                        <h2><?php echo $title_action_price_list; ?></h2>
                    </div>
                    <div class="discount_action">
                        <h3><?php echo $discount_price_list; ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    if ((get_post_meta($post->ID, 'qr_code_show', true ) != 'off')) :
                ?>
                    <div class="col-12 col-md-4">
                        <div class="qr_code_block">
                            <img src="<?php echo $qr_code_picture_price_list; ?>" alt="">
                        </div>
                    </div>
                <?php endif; ?>
                <?php
                if ((get_post_meta($post->ID, 'price_list_show', true ) != 'off')) :
                    ?>
                    <div class="col-12 col-md-8">
                        <div class="price_list_download">
                            <ul>
                                <?php foreach ($price_list_download as $price_download) :
                                    $icon_download = $price_download['price_list_icon'] ? $price_download['price_list_icon'] : '';
                                    $price_link_text = $price_download['price_list_text'] ? $price_download['price_list_text'] : '';
                                    $price_link = $price_download['price_list_link'] ? $price_download['price_list_link'] : '';
                                    ?>
                                    <li><span><i class="fa <?php echo $icon_download; ?>"></i></span>
                                        <a href="<?php echo $price_link; ?>" target="_blank"><?php echo $price_link_text; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="price_list_content">
                        <?php while ( have_posts() ) :the_post(); ?>
                            <?php the_content(); ?>
                        <? endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
