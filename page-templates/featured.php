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

	sort($images);
?>
<div class="featured-content site-content" role="main">

	<div class="featured-details content-area">
		<div class="featured-left-image" style="background-image: url('<?php
			$uriParsed = parse_url($mainImage->guid);
			echo $uriParsed["path"]; 
		?>');"></div>
		<span class="featured-title"><?php the_title(); ?></span>
		<div class="featured-description">
			<?php the_content(); ?>
		</div><!-- #content -->
	</div><!-- #primary -->

	<div class="featured-gallery-area">
		<div class="featured-gallery-display">
			<div class="featured-gallery-row" data-row="0"></div>			
			<div class="featured-gallery-row" data-row="1"></div>			
			<div class="featured-gallery-row" data-row="2"></div>			
			<div class="featured-gallery-row" data-row="3"></div>			
		</div>
		<?php
			$totalRows = 4;
			$totalCols = 6;
			$currentPos = 0;
			$currentContainer = 0;
			$createContainer = true;
			while($createContainer) : ?>
			
			<div class="featured-gallery-container hide" data-container="<?php echo $currentContainer++; ?>">
			
			<?php

				for($i=0;$i<$totalRows;$i++) : ?>

					<div class="featured-gallery-row" data-row="<?php echo $i; ?>">

				<?php

					for($ii=0;$ii<$totalCols;$ii++) :

						if ($currentPos++ >= count($images)-1) :
							$createContainer = false;
							?>
						<div class="featured-gallery-item" data-type="empty"></div>
						<?php
						else :
							$image = $images[$currentPos];
							$uriParsed = parse_url($image->guid);
							$uri = $uriParsed["path"]; 
						?>

						<div class="featured-gallery-item" style="background-image: url('<?php echo $uri; ?>');"></div>

					<?php
						endif;
					endfor; ?>
					</div> <!-- end row -->
				<?php
				endfor; ?>
					</div> <!-- end container -->
				<?php
			endwhile;

		endwhile;
