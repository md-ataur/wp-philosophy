<?php get_header(); ?>

    <!-- s-content
    ================================================== -->
    <section class="s-content">        
        <div class="row masonry-wrap">
        	<h2 class="title-margin"><?php single_cat_title();?></h2>

            <!-- codestar taxonomy start -->
            <div class="text-center">
            <?php
                $philosophy_term = get_queried_object();
                $philosophy_term_meta = get_term_meta($philosophy_term->term_id,'language_featured_image',true);
                if (isset($philosophy_term_meta['featured_image'])) {
                    echo wp_kses_post( wp_get_attachment_image( $philosophy_term_meta['featured_image'], 'medium' ) );
                }                               
            ?>
            <br/>
            <br/>
            </div>
            <!-- codestar taxonomy end -->

            <div class="masonry">
                <div class="grid-sizer"></div>
                <div class="<?php post_class(); ?>">
                    <?php
                    while (have_posts()) {
                        the_post();
                        get_template_part( 'post-formats/post', get_post_format() );
                    }
                    ?>
                </div>

            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->

        <div class="row">
            <div class="col-full">
                <nav class="pgn">
                    <?php  philosophy_paginate(); ?>
                </nav>
            </div>
        </div>
    </section> <!-- s-content -->

  
<?php get_footer(); ?>