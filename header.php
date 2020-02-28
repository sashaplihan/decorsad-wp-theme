<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cardening
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<input type="checkbox" id="nav-toggle" hidden>

<nav class="mobile_menu nav">
    <label for="nav-toggle" class="nav-toggle" onclick></label>
    <h2 class="logo">
        <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
    </h2>
        <?php wp_nav_menu( array(
            'theme_location'  => 'primary',
            'menu'            => '',
            'container'       => 'false',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'nav',
            'menu_id'         => 'main-menu',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0,
            'walker'          => '',
        )); ?>
</nav>

<div id="page" class="site main_page">
    <header class="site_header">
        <div class="top_line">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="follow_contact">
                            <a href="/contacts/">Связаться с нами</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <?php
                    $phone_list = ot_get_option( 'header_phone_list_item' );
                    ?>
                    <?php
                    foreach ($phone_list as $phone) :
                    $phone_icon = $phone['icon_phone'] ? $phone['icon_phone'] : '';
                    $header_phone_number = $phone['phone_number'] ? $phone['phone_number'] : '';
                    $header_phone_provider = $phone['phone_provider'] ? $phone['phone_provider'] : '';
                    ?>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="phone_wrap">
                            <i class="fa <?php echo $phone_icon; ?>"></i>
                            <span><a href="tel:<?php echo str_replace(array(" ", ")", "(", "-"), "", $header_phone_number) ; ?>"><?php echo $header_phone_number; ?></a> ( <?php echo $header_phone_provider; ?> )</span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="header_content">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="logo_wrap">
                            <?php if ( is_front_page() || is_home()) { ?>
                                <?php if (ot_get_option( 'header_logo_upload' )) { ?>
                                    <div>
                                        <img src="<?php echo ot_get_option( 'header_logo_upload' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                                    </div>
                                <?php } else { ?>
                                    <div class="header_brand_name"><?php bloginfo( 'name' ); ?></div>
                                <?php } ?>
                            <?php } else {?>
                                <?php if (ot_get_option( 'header_logo_upload' )) { ?>
                                    <a href="<?php echo home_url(); ?>" class="header_brand"><img src="<?php echo ot_get_option( 'header_logo_upload' ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
                                <?php } else { ?>
                                    <a href="<?php echo home_url(); ?>" class="header_brand_name"><?php bloginfo( 'name' ); ?></a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-8 col-lg-8">
                        <div class="social-header">
                            <div class="soc">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="menu_main">
            <div class="menu_content">
                <div class="container">
                    <div class="row">
                        <nav class="top_menu">
                            <?php wp_nav_menu( [
                                'theme_location'  => 'primary',
                                'menu'            => '',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'nav',
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
            </div>
        </div>
    </header>

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' / '); ?>
            </div>
        </div>
    </div>
