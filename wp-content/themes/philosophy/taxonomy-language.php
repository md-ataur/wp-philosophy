<?php get_header(); ?>

    <!-- s-content
    ================================================== -->
    <section class="s-content">        
        <div class="row masonry-wrap">
        	<h2 class="title-margin"><?php _e("Taxonomy term page","philosophy");?></h2>
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