<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="row-fluid">
			<?php if ( is_active_sidebar( 'footer-a' ) ) : ?>
				<?php dynamic_sidebar( 'footer-a' ); ?>
			<?php endif; ?>
		</div>
		<div class="row-fluid">
			<?php if ( is_active_sidebar( 'footer-b' ) ) : ?>
				<?php dynamic_sidebar( 'footer-b' ); ?>
			<?php endif; ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
