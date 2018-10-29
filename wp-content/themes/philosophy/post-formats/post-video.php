 <article class="masonry__brick entry format-video" data-aos="fade-up">
    <?php
    if (function_exists("the_field")) {
        $source_video_link = get_field("source_link");
    ?>                    
    <div class="entry__thumb video-image">
        <a href="<?php echo esc_url($source_video_link);?>?color=01aef0&title=0&byline=0&portrait=0" data-lity>
            <?php 
            if (has_post_thumbnail()) {
               esc_url(the_post_thumbnail( "philosophy-square"));
            }                
            ?>
        </a>
    </div>
    <?php }?>
    <?php get_template_part( 'template-parts/common/post-summary' ) ?>

</article> <!-- end article -->