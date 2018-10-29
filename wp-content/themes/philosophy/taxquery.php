<?php

/*
* Template Name: Tax Query Example
*/
get_header();

?>
<section class="s-content s-content--narrow s-content--no-padding-bottom">
    <article class="row format-standard">
        <div class="col-full s-content__main author-margin">         
		    <div class="row masonry-wrap">
		        <div class="masonry">
		            <div class="grid-sizer"></div>
		            <div class="<?php post_class(); ?>">
		                <?php
		                $philosophy_array_args = array(
							'post_type'			=> "book",
							'posts_per_page'	=> -1,
							'tax_query'			=> array(
								array(
									'taxonomy'	=> 'language',
									'field'		=> 'slug',
									'terms'		=> array('english','bangla')
								)
							)

						);

						$philosophy_terms_post = new WP_Query($philosophy_array_args);
						while ( $philosophy_terms_post->have_posts()) {
							$philosophy_terms_post->the_post();
							the_title();
							echo "<br/>";
						}

						wp_reset_query();
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
		</div>
	</article>
</section> <!-- s-content -->


