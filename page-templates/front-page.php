<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php $blurb = get_post_meta($post->ID, 'blurb', true);
				$blurb;
				if( $blurb ): ?>
				<div class="frontpage-blurb">
				<?php echo $blurb; ?>
				</div>
				<?php endif; ?>
			<?php get_template_part( 'searchform' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<!-- <?php the_content(); ?> -->
					<div id="map" class="img-polaroid">
						<ul id="map-ui">
							<a href='#' id='acaoeducativa.mapadosplanos' class='active'>Munícipios</a>
							<a href='#' id='acaoeducativa.mapadosplanos-estados'>Estados</a>
						</ul>
						<div class="map-legends">
    						<div class="map-legend">
        						<h2>Planos de Educação</h2>
        						<div class="legenda">
        							<div class="leg_elaboracao">
        								<span class="marker"></span>
        								<span>Em elaboração</span>
        							</div>
    								<div class="leg_complano">
    									<span class="marker"></span>
    									<span>Com plano</span>
    								</div>
    								<div class="leg_semplano">
    									<span class="marker"></span>
    									<span>Sem plano</span>
    								</div>
    								<div class="leg_gestor">
    									<span class="marker"></span>
    									<span>Resposta do/a gestor/a</span>
    								</div>
    							</div>
    						</div>
						</div>
					</div>
					<?php if ( is_active_sidebar( 'frontpage-below-map' ) ) : ?>
						<div class="below-map front-widgets">
							<?php dynamic_sidebar( 'frontpage-below-map' ); ?>
						</div><!-- .first -->
					<?php endif; ?>
					
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
				</div><!-- .entry-content -->
				<footer class="entry-meta">
					<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
				</footer><!-- .entry-meta -->
			</article><!-- #post -->
		<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->

	</div><!-- #primary -->

<?php get_sidebar('front'); ?>
<?php get_footer(); ?>
