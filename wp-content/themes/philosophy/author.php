<?php 
get_header(); 
?>
<!-- s-content
================================================== -->
<section class="s-content s-content--narrow s-content--no-padding-bottom">
    <article class="row format-standard">
        <div class="col-full s-content__main author-margin">              
            <div class="s-content__author author-margin">
                <?php echo get_avatar(get_the_author_meta('ID')); ?>
                <div class="s-content__author-about">
                    <h4 class="s-content__author-name">
                        <?php the_author_posts_link(); ?>
                    </h4>                    
                    <p><?php echo get_the_author_meta( 'description' ); ?></p>

                    <?php if (function_exists("the_field")):?>
                    <ul class="s-content__author-social ">
                		<?php
                            $philosophy_author_facebook = get_field('facebook','user_'.get_the_author_meta('ID'));
                            $philosophy_author_twitter = get_field('twitter','user_'.get_the_author_meta('ID'));
                           
                            $philosophy_author_instagram = get_field('instagram','user_'.get_the_author_meta('ID'));
                        ?>
                        <?php if($philosophy_author_facebook):?>
                            <li><a href="<?php echo esc_html($philosophy_author_facebook); ?>"> <?php _e('Facebook', 'philosophy'); ?> </a></li>
                        <?php endif;?>

                        <?php if($philosophy_author_twitter):?>
                            <li><a href="<?php echo esc_html($philosophy_author_twitter); ?>"> <?php _e('Twitter', 'philosophy'); ?> </a></li>
                        <?php endif;?>
                       
                        <?php if($philosophy_author_instagram):?>
                            <li><a href="<?php echo esc_html($philosophy_author_instagram); ?>"> <?php _e('Instagram', 'philosophy'); ?> </a></li>
                        <?php endif;?>                 
                    </ul>
                	<?php endif; ?>
                </div>
            </div>
            <div class="author-title">
            <?php
                while(have_posts()){
                    the_post();                    
                ?>	                
                <h4 class="author-h4"><a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></h4>
            <?php } ?>
            <?php 
           		//$count_posts = wp_count_posts();
            	//echo $count_posts->publish;
            ?>
            </div>
            <div class="row">
	            <div class="col-full">
	                <nav class="pgn">
	                    <?php  philosophy_paginate(); ?>
	                </nav>
	            </div>
	        </div>
        </div> <!-- end s-content__main -->
    </article>

</section> <!-- s-content -->


<?php get_footer(); ?>