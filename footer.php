<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Boom_Festive
 */

?>
	<?php global $boom_festive; ?>
	<footer id="colophon" class="site-footer">
	<div class="container">
			<div class="row">
		<div class="site-info col-12 col-md-6">
				<?php
				 echo $boom_festive['opt-copyright'];
				?>
			</a>
		</div><!-- .site-info -->
		</div>
</div>
	</footer>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
