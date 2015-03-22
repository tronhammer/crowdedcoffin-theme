<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Crowded_Coffin
 * @since Crowded Coffin 1.0
 */
?>
			</div><!-- #main -->

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info">
					<?php do_action( 'crowdedcoffin_credits' ); ?>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/foundation.min.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/placeholder.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.cookie.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/fastclick.js"></script>
	    <script>
			$(document).foundation();
	    </script>
	</body>
</html>