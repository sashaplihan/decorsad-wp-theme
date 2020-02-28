<?php
/**
 * Template name: Страница контактов
 */
get_header();
?>

<?php
$contact_block_name_1 = get_post_meta( $post->ID, 'contact_page_block_name_1', true );
$contact_block_name_2 = get_post_meta( $post->ID, 'contact_page_block_name_2', true );
$contact_block_name_3 = get_post_meta( $post->ID, 'contact_page_block_name_3', true );
$contact_block_name_4 = get_post_meta( $post->ID, 'contact_page_block_name_4', true );
$contact_block_content_1 = get_post_meta( $post->ID, 'contact_page_block_content_1', true );
$contact_block_content_2 = get_post_meta( $post->ID, 'contact_page_block_content_2', true );
$contact_phone = get_post_meta( $post->ID, 'contact_page_phone_list', true );
$contact_email = get_post_meta( $post->ID, 'contact_page_email_list', true );
?>
    <div class="contact__page">

        <div class="container">
            <div class="row">
                <?php
                if ((get_post_meta($post->ID, 'contact_form_show', true ) != 'off')) :
                    ?>
                    <div class="col-12 order-2 col-md-6 order-md-1">
                        <h2 class="contact_form_title">Связаться с нами:</h2>
                        <p class="contact_text_normal">Мы свяжемся с вами в течение 24 часов.</p>
                        <div class="contact_form_wrap">
                            <?php $contact_page_form = get_post_meta( $post->ID, 'shortcode_contact_form', true ) ?
                                get_post_meta( $post->ID, 'shortcode_contact_form', true ) : ''; ?>
                            <?php echo do_shortcode( $contact_page_form ) ; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php
                if ((get_post_meta($post->ID, 'contact_info_show', true ) != 'off')) :
                    ?>
                    <div class="col-12 order-1 col-md-6 order-md-2">
                        <h2 class="contact_form_title">Контактная информация:</h2>
                        <p class="contact_text_normal">
                            Есть вопрос? Нужна помощь? Задайте нам вопрос, используя любой из способов ниже.
                        </p>
                        <div class="contact_adr_wrap">
                            <h3><?php echo $contact_block_name_1 ; ?></h3>
                            <p class="contact_text_normal">
                                <?php echo $contact_block_content_1 ; ?>
                            </p>

                            <h3><?php echo $contact_block_name_2 ; ?></h3>
                            <p class="contact_text_normal">
                                <?php echo $contact_block_content_2 ; ?>
                            </p>

                            <h3><?php echo $contact_block_name_3 ; ?></h3>
                            <p class="contact_text_normal">
                                <?php foreach ($contact_phone as $phone) :
                                    $page_phone_number = $phone['contact_page_phone'] ? $phone['contact_page_phone'] : '';
                                    $page_phone_provider = $phone['contact_page_phone_provider'] ? $phone['contact_page_phone_provider'] : '';
                                    ?>
                                    <span><a href="tel:<?php echo str_replace(array(" ", ")", "(", "-"), "", $page_phone_number) ; ?>"><?php echo $page_phone_number ; ?></a> (<?php echo $page_phone_provider ; ?>); </span><br/>
                                <?php endforeach; ?>
                            </p>

                            <h3><?php echo $contact_block_name_4 ; ?></h3>
                            <?php foreach ($contact_email as $email) :
                                $email_adr = $email['contact_page_email'] ? $email['contact_page_email'] : '';
                                ?>
                                <p class="contact_text_normal">
                                    <a href="mailto:<?php echo $email_adr ; ?>"><?php echo $email_adr ; ?></a>
                                </p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="map_contact_page">
            <div id="map" class="map_yandex"></div>
        </div>
    </div>
<?php
get_footer();