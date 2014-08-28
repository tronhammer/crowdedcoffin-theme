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
			$rowCount = 6;
			$containerCount = 4;
			$currentRow = 0;
			$currentContainer = 0;
			foreach($images as $imagePos=>$image) : 
				$newRow = !$currentRow++;

				if ($newRow) : 

					$newContainer = !$currentContainer++;

					if ($newContainer) : ?>
				
				<div class="container">

				<?php
				endif;
				?>

					<div class="row">

				<?php
				endif; ?>

						<div class="featured-gallery-item" style="background-image: url('<?php echo $image->guid; ?>');"></div>

				<?php
				if ($currentRow == $rowCount) : 

					$currentRow = 0;


					?>
				
					</div> <!-- end row -->

				<?php
				endif;

				if ($currentContainer == $containerCount && !$currentRow) : 
				
					$currentContainer = 0;

					?>

				</div> <!-- end container -->

				<?php
				endif;

			endforeach; 

			if ($currentRow) : ?>
			
					</div> <!-- end row -->

			<?php
			endif;

			if ($currentContainer) : ?>

				</div> <!-- end container -->

			<?php
			endif;

			?>
	</div>
</div>

<? 
endwhile;