<article class="masonry__brick entry format-audio" data-aos="fade-up">
    <?php
    if (function_exists("the_field")) :
        $source_audio_link = get_field("audio_file");       
    ?>  
    <div class="entry__thumb">
        <a href="<?php the_permalink(); ?>" class="entry__thumb-link">
            <?php 
            if (has_post_thumbnail()) {
               esc_url(the_post_thumbnail( "philosophy-square"));
            }                
            ?>
        </a>
        <?php 
        if ($source_audio_link) {
        ?>
        <div class="audio-wrap">
            <audio id="player" src="<?php echo wp_kses_post($source_audio_link);?>" width="100%" height="42" controls="controls"></audio>
        </div>
        <?php  }?>
    </div>
    <?php endif;?>
    <?php get_template_part( 'template-parts/common/post-summary' ) ?>

</article> <!-- end article -->