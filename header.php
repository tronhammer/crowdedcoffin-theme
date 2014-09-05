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
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=device-dpi">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Anton:n,b,i,bi|Play:n,b,i,bi|&amp;subset=latin">
	<link rel="stylesheet" type="text/css" href="http://static.parastorage.com/services/web/2.1022.7/css/wysiwyg/user-site-fonts/latin.css">
	
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/foundation.min.css">
	
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/modernizr.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/device-layouts.css"> 
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/cc-responsive.css">

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
		setTimeout(function() { window.scrollTo(0, 1); }, 10);
	}, false);
	</script>
</head>

<body <?php body_class(); ?>>

	<? include("intro.php"); ?>

	<div class="device-size-advisor hide"></div>

	<div id="page" class="site row">

		<header id="primary-header" class="site-header small-12 small-centered columns" role="banner">
			<div id="primary-logo">
				<img src="/wordpress/wp-content/themes/crowdedcoffin/CCwebheader.jpg" width="100%"/>
			</div>
		
			<nav id="primary-navigation" class="primary-navigation" role="navigation">
				<?php wp_nav_menu( array(
					'theme_location' => 'primary',
					'container_class' => 'row',
					'items_wrap' => '%3$s',
					'walker' => new cc_walker_nav_menu()
				) ); ?>
			</nav>
		</header><!-- #masthead -->