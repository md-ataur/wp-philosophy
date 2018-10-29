<?php get_header(); ?>

    <!-- s-content
    ================================================== -->
    <section class="s-content">        
        <div class="row masonry-wrap">
            <div class="masonry">
                <div class="grid-sizer"></div>
                <?php
                    if(! have_posts()){
                        ?>
                        <div class="container">
                            <div class="row">
                                <div class="text-center">
                                    <h3><?php _e('No Result Found: ', 'philosophy');?><?php the_search_query(); ?></h3>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                <?php
                while (have_posts()) {
                    the_post();
                    get_template_part( 'post-formats/post', get_post_format() );
                }
                ?>

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