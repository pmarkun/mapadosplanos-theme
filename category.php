<?php
/**
 * The template for displaying Category pages.
 *
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">

		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'twentytwelve' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			while (have_posts()) : the_post();  ?>

				
				<?php 
				if (is_sticky()): ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class("category-sticky"); ?>>
					<a href="<?php echo get_permalink(); ?>">
					<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('category-sticky', array('class'	=> "category-image"));
					}
					else {
						echo '<img class="category-image" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.jpg" />';
					} 
					?>

				<?php else: ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class("category-regular"); ?>>
						<a href="<?php echo get_permalink(); ?>">
					<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('category-regular', array('class'	=> "category-image"));
					}
					else {
						echo '<img class="category-image" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbnail-default.jpg" />';
					}
				endif;
				?>
				
				<div class="category-title-wrapper"><h1 class="category-title"><?php the_title(); ?></h1></div>
				</a>
				</article>		
			<?php endwhile; ?>

			
			<?php twentytwelve_content_nav( 'nav-below' ); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>