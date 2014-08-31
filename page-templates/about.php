<?php
/**
 * Template Name: About Page
 *
 * @package WordPress
 * @subpackage Crowded_Coffin
 * @since Crowded Coffin 1.0
 */ 

while ( have_posts() ) : 
	the_post();

	$images = get_attached_media("", $post->ID);
	
	foreach($images as $imagePos=>$image) break;
?>

<div class="about-content site-content" role="main" style="background-image: url('<?php
	$uriParsed = parse_url($image->guid);
	$uri = $uriParsed["path"];  
	echo $uri; ?>');">
	<div class="about-details"><?php the_content(); ?></div>
</div><!-- #content -->

<? 
endwhile;