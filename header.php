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

	<div id="main-intro">
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00000.png" style="display:block;"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00001.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00002.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00003.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00004.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00005.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00006.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00007.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00008.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00009.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00010.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00011.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00012.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00013.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00014.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00015.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00016.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00017.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00018.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00019.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00020.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00021.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00022.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00023.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00024.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00025.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00026.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00027.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00028.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00029.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00030.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00031.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00032.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00033.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00034.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00035.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00036.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00037.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00038.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00039.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00040.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00041.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00042.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00043.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00044.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00045.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00046.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00047.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00048.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00049.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00050.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00051.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00052.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00053.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00054.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00055.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00056.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00057.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00058.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00059.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00060.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00061.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00062.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00063.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00064.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00065.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00066.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00067.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00068.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00069.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00070.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00071.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00072.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00073.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00074.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00075.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00076.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00077.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00078.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00079.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00080.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00081.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00082.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00083.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00084.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00085.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00086.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00087.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00088.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00089.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00090.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00091.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00092.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00093.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00094.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00095.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00096.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00097.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00098.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00099.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00100.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00101.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00102.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00103.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00104.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00105.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00106.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00107.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00108.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00109.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00110.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00111.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00112.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00113.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00114.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00115.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00116.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00117.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00118.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00119.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00120.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00121.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00122.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00123.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00124.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00125.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00126.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00127.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00128.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00129.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00130.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00131.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00132.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00133.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00134.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00135.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00136.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00137.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00138.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00139.png"/> 
		<img src="/wordpress/wp-content/themes/crowdedcoffin/intro/pngs/CrowdedCoffinlLAYERS_00140.png"/> 
		
		<h1 class="main-enter-site">ENTER</h1>
	</div>

	<div id="page" class="site">

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
