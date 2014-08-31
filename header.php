<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Crowded_Coffin
 * @since Crowded Coffin 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=device-dpi">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Anton:n,b,i,bi|Play:n,b,i,bi|&amp;subset=latin">
	<link rel="stylesheet" type="text/css" href="http://static.parastorage.com/services/web/2.1022.7/css/wysiwyg/user-site-fonts/latin.css">
	
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery-ui.min.css">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

	<script>
	window.loadablePages = {
		<?php 
			$pages = get_pages();

			foreach($pages as $pagePos=>$page){
				?>
					
					"<? echo $page->post_name; ?>": {
						"config": {
							"name": "<? echo $page->post_name; ?>",
							"id": "<?php echo $page->post_name; ?>-page"
						},
						"data": {
							"template": null
						}
					},
				<?php
			}

		?>
	}

	  // Hides mobile browser's address bar when page is done loading.
	window.addEventListener('load', function(e) {
		setTimeout(function() { window.scrollTo(0, 1); }, 1);
	}, false);
	</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class=" site">

	<header id="primaryHeader" class="site-header" role="banner">
		<div class="header-main">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
 				<img id="site-main-logo" src="/wordpress/wp-content/themes/crowdedcoffin/CCwebheader.jpg"
 			</a></h1>
		
			<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</nav>
		</div>
	</header><!-- #masthead -->

	<div id="main" class="site-main">
