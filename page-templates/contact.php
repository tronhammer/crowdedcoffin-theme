<?php
/**
 * Template Name: Contact Page
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

<div class="contact-content site-content" role="main">

	<div class="contact-left-image" style="background-image: url('<?php 
		$uriParsed = parse_url($image->guid);
		$uri = $uriParsed["path"];  
		echo $uri; ?>');"></div>
	<div class="contact-details content-area">
		<span class="contact-title"><?php the_title(); ?></span>
		<div class="contact-description">
			<?php the_content(); ?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div>

<? 
endwhile;