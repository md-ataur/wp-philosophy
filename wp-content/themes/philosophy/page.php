<?php 
get_header(); 
the_post();
?>

<section class="s-content s-content--narrow">
    <article class="row format-standard">    	
        <div class="s-content__header col-full">
			<div class="row masonry-wrap">
				<h2><?php the_title();?></h2>
			</div>
		</div>
		<div class="col-full s-content__main">
			<?php the_content();?>
			
		</div>
	</article>
</section> <!-- s-content -->

<?php get_footer(); ?>