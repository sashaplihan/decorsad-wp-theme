<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cardening
 */

?>
    <footer>
        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="footer-column">
                            <div class="text_widget">
                                <?php if (ot_get_option( 'footer_logo_upload' )) { ?>
                                    <img src="<?php echo ot_get_option( 'footer_logo_upload' ); ?>" alt="<?php bloginfo( 'name' ); ?>"  class="logo-footer" />
                                <?php } else { ?>
                                    <div class="header_brand"><?php bloginfo( 'name' ); ?></div>
                                <?php } ?>
                                <?php if (ot_get_option( 'footer_company_info' )) { ?>
                                    <?php echo ot_get_option( 'footer_company_info' ); ?>
                                <?php } ?>
                                <div class="social-footer">
                                    <nav class="soc">
                                        <ul>
                                            <?php
                                            $social_list = ot_get_option( 'social_list_item' );
                                            ?>
                                            <?php
                                            foreach ($social_list as $social) :
                                            $social_icon = $social['icon_social'] ? $social['icon_social'] : '';
                                            $social_link = $social['social_icon_link'] ? $social['social_icon_link'] : '';
                                            ?>
                                            <li><a href="<?php echo $social_link; ?>" target="_blank"><i class="fa <?php echo $social_icon; ?>"></i></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                        <div class="footer-column">
                            <div class="text_widget">
                                <h3>
                                    <?php if (ot_get_option( 'footer_name_contact_block' )) { ?>
                                        <?php echo ot_get_option( 'footer_name_contact_block' ); ?>
                                    <?php } ?>
                                </h3>
                                <div class="footer_adr">
                                    <ul>
                                        <li><i class="fa <?php echo ot_get_option( 'footer_icon_contact_block_1' ); ?>"></i><span><?php echo ot_get_option( 'footer_info_contact_block_1' ); ?></span></li>
                                    </ul>
                                </div>
                                <h3>
                                    <?php if (ot_get_option( 'footer_name_phone_block' )) { ?>
                                        <?php echo ot_get_option( 'footer_name_phone_block' ); ?>
                                    <?php } ?>
                                </h3>
                                <div class="footer_adr">
                                    <ul>
                                        <?php
                                        $footer_phone_list = ot_get_option( 'footer_phone_list_item' );
                                        ?>
                                        <?php
                                        foreach ($footer_phone_list as $footer_phone) :
                                        $footer_icon = $footer_phone['footer_icon_phone'] ? $footer_phone['footer_icon_phone'] : '';
                                        $footer_phone_number = $footer_phone['footer_phone_number'] ? $footer_phone['footer_phone_number'] : '';
                                        $footer_phone_provider = $footer_phone['footer_phone_provider'] ? $footer_phone['footer_phone_provider'] : '';
                                        ?>
                                        <li><i class="fa <?php echo $footer_icon; ?>"></i><span><a href="tel:<?php echo str_replace(array(" ", ")", "(", "-"), "", $footer_phone_number) ; ?>"><?php echo $footer_phone_number; ?></a> ( <?php echo $footer_phone_provider; ?> )</span></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <h3>
                                    <?php if (ot_get_option( 'footer_name_email_block' )) { ?>
                                        <?php echo ot_get_option( 'footer_name_email_block' ); ?>
                                    <?php } ?>
                                </h3>
                                <div class="footer_adr">
                                    <ul>
                                        <?php
                                        $footer_email_list = ot_get_option( 'footer_email_list_item' );
                                        ?>
                                        <?php
                                        foreach ($footer_email_list as $email_list) :
                                        $email_icon = $email_list['footer_icon_email'] ? $email_list['footer_icon_email'] : '';
                                        $email_adres = $email_list['footer_email'] ? $email_list['footer_email'] : '';
                                        ?>
                                        <li><i class="fa <?php echo $email_icon; ?>"></i><span><a href="mailto:<?php echo $email_adres; ?>"><?php echo $email_adres; ?></a></span></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                        <div class="footer-column">
                            <h3>
                                <?php if (ot_get_option( 'footer_right_block' )) { ?>
                                    <?php echo ot_get_option( 'footer_right_block' ); ?>
                                <?php } ?>
                            </h3>
                            <?php
                            if ( function_exists('dynamic_sidebar') )
                                dynamic_sidebar('sidebar_footer_right');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="copyright_content">
                    <?php if (ot_get_option( 'copyright_org' )) { ?>
                        &copy; <?php echo ot_get_option( 'year_foundation_org' ); ?>-<?php echo date('Y'); ?> <?php echo ot_get_option( 'copyright_org' ); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </footer>
    <div class="top" title="Наверх"><i class="fa fa-angle-double-up"></i></div>
</div>


<?php wp_footer(); ?>

</body>
</html>
