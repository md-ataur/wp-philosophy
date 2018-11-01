<?php 
/*
Template name: Codestar Page
*/
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
		<div class="col-full">
			<?php the_content();?>

			<!-- Codestar Meta field retrieve -->
			<?php
				$philosophy_page_meta = get_post_meta( get_the_ID(), 'page-metabox', true );			
				echo esc_html($philosophy_page_meta['page-heading'])."<br/>";
				echo esc_html($philosophy_page_meta['page-teaser'])."<br/>";
				if ($philosophy_page_meta['is-favorite']) {
					echo esc_html($philosophy_page_meta['page-favorite-text'])."<br/>";
				}
				echo wp_get_attachment_image( $philosophy_page_meta['image-upload'], 'medium')."<br/>";			
			?>
			<div class="slider-bar">
				<div class="my-slider">
					<?php
					if ($philosophy_page_meta['gallery']) {
						$philosophy_gallery_ids = explode(',', $philosophy_page_meta['gallery']);
						foreach ($philosophy_gallery_ids as $philosophy_gallery_id) {
							echo "<div>".wp_get_attachment_image( $philosophy_gallery_id,'medium')."</div>";
						}
					}
					?>
				</div>
			</div>
			<?php
			
			$group_fields = $philosophy_page_meta['group-field'];
			foreach ($group_fields as $group_field) {
				$post_title = $group_field['featured-posts'];
				echo get_the_title( $post_title )."<br/>";
			}
			?>


		</div>
	</article>
</section> <!-- s-content -->

<?php get_footer(); ?>