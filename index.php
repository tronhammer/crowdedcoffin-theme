<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Crowded_Coffin
 * @since Crowded Coffin 1.0
 */

get_header(); ?>


<div id="main-intro" style="display:none;">
	<h1 class="main-enter-site">ENTER</h1>
	<video width="800" height="600" id="main-intro-video" name="Video Name" src="/wordpress/wp-content/themes/crowdedcoffin/CrowdedCoffinlLAYERS_1.mov"></video>
</div>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area">

	</div><!-- #primary -->
</div><!-- #main-content -->

<?php
get_footer();