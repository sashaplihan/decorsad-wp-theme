<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Cardening
 */

get_header();
?>

	<div class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <section class="error-404 not-found">
                        <header class="page-header">
                            <?php if (ot_get_option( '404_page_title' )) { ?>
                                <h1 class="title_404"><?php echo ot_get_option( '404_page_title' ); ?></h1>
                            <?php } ?>
                            <?php if (ot_get_option( '404_page_subtitle' )) { ?>
                                <div class="subtitle_404"><?php echo ot_get_option( '404_page_subtitle' ); ?></div>
                            <?php } ?>
                        </header>

                        <?php if (ot_get_option( '404_page_content' )) { ?>
                            <div class="page_content_404"><?php echo ot_get_option( '404_page_content' ); ?></div>
                        <?php } ?>
                        <?php if (ot_get_option( '404_page_name_link' )) { ?>
                            <a class="button button_404" href="<?php echo ot_get_option( '404_page_link' ); ?>"><?php echo ot_get_option( '404_page_name_link' ); ?></a>
                        <?php } ?>
                    </section>
                </div>
            </div>
        </div>
	</div>

<?php
get_footer();
