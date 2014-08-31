<?php
/**
 * Template Name: Gallery Grid Page
 *
 * @package WordPress
 * @subpackage Crowded_Coffin
 * @since Crowded Coffin 1.0
 */ 

// Start the Loop.
while ( have_posts() ) : 
	the_post();

	$images = get_attached_media("", $post->ID);
	
	sort($images);
?>

<div class="gallery-grid-content featured-content site-content" role="main">
	<div class="gallery-grid-gallery-area featured-gallery-area">
		<div class="gallery-grid-gallery-display featured-gallery-display">
			<div class="gallery-grid-gallery-row featured-gallery-row" data-row="0"></div>			
			<div class="gallery-grid-gallery-row featured-gallery-row" data-row="1"></div>			
			<div class="gallery-grid-gallery-row featured-gallery-row" data-row="2"></div>			
			<div class="gallery-grid-gallery-row featured-gallery-row" data-row="3"></div>			
		</div>
		<?php
			$totalRows = 4;
			$totalCols = 6;
			$currentPos = 0;
			$currentContainer = 0;
			$createContainer = true;
			while($createContainer) : ?>
			
			<div class="gallery-grid-gallery-container featured-gallery-container hide" data-container="<?php echo $currentContainer++; ?>">
			
			<?php

				for($i=0;$i<$totalRows;$i++) : ?>

					<div class="gallery-grid-gallery-row featured-gallery-row" data-row="<?php echo $i; ?>">

				<?php

					for($ii=0;$ii<$totalCols;$ii++) :

						if ($currentPos++ == count($images)) :
							$createContainer = false;
							?>
						<div class="gallery-grid-gallery-item featured-gallery-item" data-type="empty"></div>
						<?php
						else :
							$image = $images[$currentPos];
							$uriParsed = parse_url($image->guid);
							$uri = $uriParsed["path"]; 
						?>

						<div class="gallery-grid-gallery-item featured-gallery-item" style="background-image: url('<?php echo $uri; ?>');"></div>

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
