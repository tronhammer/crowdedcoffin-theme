<?php
/**
 * Template Name: Featured Page
 *
 * @package WordPress
 * @subpackage Crowded_Coffin
 * @since Crowded Coffin 1.0
 */ 

// Start the Loop.
while ( have_posts() ) : 
	the_post();

	$images = get_attached_media("", $post->ID);
	
	foreach($images as $imagePos=>$mainImage) break;
?>

<div class="featured-content site-content" role="main">

	<div class="featured-details content-area">
		<div class="featured-left-image" style="background-image: url('<?php echo $mainImage->guid; ?>');"></div>
		<span class="featured-title"><?php the_title(); ?></span>
		<div class="featured-description">
			<?php the_content(); ?>
		</div><!-- #content -->
	</div><!-- #primary -->

	<div class="featured-gallery-area">
		<?php
			foreach($images as $imagePos=>$image) : ?>

			<div class="featured-gallery-item" style="background-image: url('<?php echo $image->guid; ?>');"></div>

		<?php
			endforeach; ?>
	</div>
</div>

<? 
endwhile;