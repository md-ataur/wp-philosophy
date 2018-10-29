<?php 
/*
Template name: Contact Page
*/
get_header(); 
the_post();
?>
    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">
        <article class="row format-standard">
            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    <?php the_title(); ?>
                </h1>
               
            </div> <!-- end s-content__header -->
    
            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                   <?php if (has_post_thumbnail()) {
                   		the_post_thumbnail('large');
                   } ?>
                </div>
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">
               <?php the_content();?>               
               <div class="row block-1-2 block-tab-full">
                <?php
                if (is_active_sidebar( "contact" )) {
                    dynamic_sidebar( "contact" );
                }
                ?>
               </div>

	        	<?php if(function_exists("wpcf7_contact_form")):?>
	        	<div class="contact-area">
	        		<?php echo do_shortcode('[contact-form-7 id="158" title="Contact form 1"]'); ?>
	        	</div>
           		<?php endif;?>
            </div> <!-- end s-content__main -->
        </article>


    </section> <!-- s-content -->


    <?php get_footer(); ?>