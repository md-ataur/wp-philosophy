<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">    
    <?php wp_head(); ?>

</head>

<body id="top" <?php body_class(); ?>>

    <!-- pageheader
    ================================================== -->
    <?php
    $pageheader = 's-pageheader';
    if (is_home()) {
        $pageheader = 's-pageheader s-pageheader--home';
    }else{
        $pageheader = 's-pageheader';
    }
    ?>
    <section class="<?php echo esc_html($pageheader);?>">
        <header class="header">
            <div class="header__content row">
                <?php if (current_theme_supports( "custom-logo" )) { ?>
                    <div class="header__logo">
                        <a class="logo" href="<?php the_permalink(); ?>">
                            <?php the_custom_logo(); ?>
                        </a>
                </div> <!-- end header__logo -->
                <?php } ?>
               
                <?php 
                if (is_active_sidebar( "header-social" )) {
                    dynamic_sidebar( 'header-social' );
                }
                ?>

                <a class="header__search-trigger" href="#0"></a>
                <div class="header__search">
                    <?php get_search_form(); ?>
        
                    <a href="#0" title="Close Search" class="header__overlay-close"><?php _e("Close","philosophy");?></a>

                </div>  <!-- end header__search -->
                <?php get_template_part( "template-parts/common/navigation" ) ?>

            </div> <!-- header-content -->
        </header> <!-- header -->

        <?php 
        if (is_front_page()) {
            get_template_part( "template-parts/home-featured/featured" );
        }
        ?>

    </section> <!-- end s-pageheader -->
  


