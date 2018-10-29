<?php get_header(); ?>

    <!-- s-content
    ================================================== -->
    <section class="s-content"> 
    	<div class="row narrow">
            <h3 class="text-center"><?php _e("New Translatable Text","philosophy"); ?></h3> 
            <h3 class="text-center"><?php _e("Hello World","philosophy"); ?></h3>

	  		<div class="col-full s-content__header" data-aos="fade-up">
	            <h1><?php _e('Category:','philosophy'); ?> <?php single_cat_title(); ?></h1>
	            <p class="lead"><?php echo esc_html(category_description()); ?></p>
	        </div>
	    </div>       
        <div class="row masonry-wrap">
            <div class="masonry">
                <div class="grid-sizer"></div>
                <?php
                if (!have_posts()):?>
                	<h3 class="text-center"><?php _e("There is no post in this category","philosophy"); ?></h3>	
                <?php endif; ?>

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