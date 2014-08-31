<?php
/**
 * Template Name: Cover Page
 *
 * @package WordPress
 * @subpackage Crowded_Coffin
 * @since Crowded Coffin 1.0
 */ 

// Start the Loop.
while ( have_posts() ) : 
	the_post();

	$images = get_attached_media("", $post->ID);
	
	foreach($images as $imagePos=>$image) break;
?>

<div class="cover-content site-content" role="main">

	<div class="cover-left-image" style="background-image: url('<?php
		$uriParsed = parse_url($image->guid);
		$uri = $uriParsed["path"];  
		echo $uri; ?>');"></div>
	<div class="cover-details content-area">
		<span class="cover-title"><?php the_title(); ?></span>
		<div class="cover-description">
			<?php the_content(); ?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div>

<? 
endwhile;