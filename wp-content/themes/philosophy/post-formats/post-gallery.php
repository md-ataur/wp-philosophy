<article class="masonry__brick entry format-gallery" data-aos="fade-up">
                        
    <div class="entry__thumb slider">
        <div class="slider__slides">
        <?php if (class_exists('Attachments')): ?>            
            <?php
            $attachments = new Attachments( 'gallery' );
            if ($attachments->exist()):
                while ( $attachment = $attachments->get()):
            ?>
            <div class="slider__slide">
                <?php echo wp_kses_post($attachments->image( 'philosophy-square' )); ?>
            </div>
                <?php endwhile; ?>
            <?php endif;?>
        <?php endif; ?>  
        </div>
    </div>
    <?php get_template_part( 'template-parts/common/post-summary' ) ?>

</article> <!-- end article -->
