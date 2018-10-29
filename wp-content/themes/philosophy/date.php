<?php 
get_header(); 
?>
<!-- s-content
================================================== -->
<section class="s-content s-content--narrow s-content--no-padding-bottom">
    <article class="row format-standard">
        <div class="col-full s-content__main date-page">              
            <h1> Posts In: 
                <?php 
                if (is_month()) {
                        $month = get_query_var( 'monthnum');
                        $dateobj = DateTime::createFromFormat("!m", $month);
                        echo esc_html($dateobj->format("F"));
                    }else if(is_year()){
                        echo esc_html( get_query_var( 'year' ) ) ;
                    }else if(is_day()){
                        $day = get_query_var("day");
                        $month = get_query_var("monthnum");
                        $year = get_query_var("year");
                        printf("%s/%s/%s", $day, $month, $year);
                    }    
                ?>
                
            </h1>
            <div class="author-title">
            <?php
                while(have_posts()){
                    the_post();                    
                ?>	                
                <h4 class="author-h4"><a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></h4>
            <?php } ?>
           
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