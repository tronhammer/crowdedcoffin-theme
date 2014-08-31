<?php
/**
 * Template Name: Help Grimm Page
 *
 * @package WordPress
 * @subpackage Crowded_Coffin
 * @since Crowded Coffin 1.0
 */ 

// Start the Loop.
while ( have_posts() ) : 
	the_post();

	$images = get_attached_media("", $post->ID);
?>

<div class="help-grimm-content site-content" role="main">

<div style="text-align:center;">
	<span style="line-height:1.4em; color: rgb(153, 153, 153); font-size: 30px;font-weight: bold;">Meet</span> 
	<span style="background:white;color:black;font-size: 30px;font-weight: bold;">GRiMM</span>
</div>

<p style="text-align: center; margin-top: 0px; margin-bottom: 5px;">GRiMM had a Cruciate Ligament Rupture on NYE and now needs a 3k surgery - WE NEED YOUR HELP</p>

	<div class="help-grimm-slider-images">
		<div class="help-grimm-image-slider">
	<?php
		foreach($images as $imagePos=>$image) : ?>
			<div class="slider-image hide" style="background-image: url('<?php
			$uriParsed = parse_url($image->guid);
			$uri = $uriParsed["path"];  
			echo $uri; ?>');"></div>
	<?php
		endforeach;
		?>
		</div>
	</div>
	<div class="help-grimm-details content-area">
		<div class="help-grimm-donation">
			If you would like to <br/> help GRiMM<br/>
			- PLEASE -<br/>
			send your <br/>
			Paypal donation to <br/>
			<a href="mailto:helpgrimm@gmail.com" style="text-decoration:underline;font-size: 15px;margin-top: 5px;">HELPGRiMM@gmail.com</a>
		 </div>
		<div class="help-grimm-description">
			<?php the_content(); ?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div>

<? 
endwhile;