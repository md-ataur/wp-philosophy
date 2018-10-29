<?php 
get_header(); 

?>

<section class="s-content s-content--narrow">
    <article class="row format-standard">
        <div class="s-content__header col-full">
			<div class="row masonry-wrap">

				<?php
				while (have_posts()) {
					the_post();
				}
				the_content();

				?>

			</div>
		</div>
	</article>
</section> <!-- s-content -->

<?php get_footer(); ?>