<?php
/**
 * Template Name: Video Page
 *
 * @package WordPress
 * @subpackage Crowded_Coffin
 * @since Crowded Coffin 1.0
 */ 

// Start the Loop.
while ( have_posts() ) : 
	the_post();
	?>

<div class="site-content" role="main">
	<div class="video-left-container">
		<iframe width="471" height="298" src="//www.youtube.com/embed/OuPZCD50Sdk" frameborder="0" allowfullscreen></iframe>

		<h2>NEKROGOBLiKON</h2>
		<h3>Friends [In Space]</h3>

		<p>Running Time: 3:20 min</p>
 
		<p>Nekrogoblikon live on their UK tour with Limp Bizkit</p>
	</div>
	<div class="video-right-container">
		<iframe width="471" height="298" src="//www.youtube.com/embed/AELB65UaCiQ" frameborder="0" allowfullscreen></iframe>

		<h2>the PiG</h2>

		<div>Year : 2007</div>
		<div>Running Time: 4:37 min</div>
 
		<p>this is a video of the PiG we roasted in the ground for my Birthday</p>
	</div>
</div>

<? 
endwhile;