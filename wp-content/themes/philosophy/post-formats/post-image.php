<article class="masonry__brick entry format-image" data-aos="fade-up">                 
    <div class="entry__thumb">
        <a href="<?php the_permalink(); ?>" class="entry__thumb-link">            
            <?php 
            if (has_post_thumbnail()) {
               esc_url(the_post_thumbnail( "philosophy-square"));
            }                
            ?>
        </a>
    </div>

    <?php get_template_part( 'template-parts/common/post-summary' ) ?>
</article> <!-- end article -->