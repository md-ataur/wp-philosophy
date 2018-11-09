<?php

/*
* Template Name: Ajax Test
*/
get_header();
the_post();
?>
<section class="s-content s-content--narrow s-content--no-padding-bottom">
    <article class="row format-standard">
        <div class="col-full s-content__main author-margin">         
		  	<div class="row masonry-wrap">
				<h2 class="text-center"><?php the_title();?></h2>
			</div>			
		    <div class="row">
		        <div class="col-full">		              
	                <?php 
	                    the_content();
	                    wp_link_pages();
	                    //$nonce = wp_create_nonce( "ajaxtest" );
	                ?>

	                <form action="<?php home_url("/"); ?>" method="post">
	                	<label for="info">Some Information</label>
	                	<input type="text" id="info" name="info" />
	                	<br/>
	                	<!-- <input type="hidden" value="<?php //echo $nonce;?>"> -->
	                	<input id="ajaxsbumit" type="submit" name="submit" value="Post via ajax" >
	                	<?php wp_nonce_field("ajaxtest");?>
	                </form>
		        </div>
		    </div>
		</div>
	</article>
</section> <!-- s-content -->

<?php get_footer();?>

