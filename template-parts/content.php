<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package alexsantos
 */

?>
	

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' || 'portefolio' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php alexsantos_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

<!--	<div class="entry-content">

		<?php // if ( has_excerpt() ) : ?>
      	<?php // echo mb_substr(strip_tags($post->post_excerpt), 0, 200);?>
		<?php // else : ?>
      	<?php // echo mb_substr(strip_tags($post->post_content), 0, 200);?>...
      	<?php // endif;

		//	wp_link_pages( array(
		//		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'alexsantos' ),
		//		'after'  => '</div>',
		//	) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php alexsantos_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
