<?php
/**
 * Home Page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package alexsantos
 */

get_header(); ?>

	<div id="primary" class="content-area">
			
		<main id="main" class="site-main">

		<?php $wp_query1 = new WP_Query('showposts=5&cat=1'); ?>

		<?php if($wp_query1->have_posts()) : ?>
			            

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<div class="grid">

				<div class="grid__col-md-4">

					<div class="grid">

						<div class="grid__col-md-12">

							<div class="site-branding">

								<svg viewBox="0 0 100 100" class="icon icon-caricatura">
  									<use xlink:href="#icon-caricatura"></use>
								</svg>

								<?php
								the_custom_logo();
								if ( is_front_page() && is_home() ) : ?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
								endif;

								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
								<?php
								endif; ?>
							</div><!-- .site-branding -->

						</div><!-- grid__col-md-12 -->

					</div><!-- grid -->

				</div><!-- grid__col-md-4 -->

				<div class="grid__col-md-8">

					<div class="grid">

						<div class="grid__col-md-4">

							<div class="separador">

								<div class="latest-heading">Artigos</div>

							</div>

							<?php while($wp_query1->have_posts()) : $wp_query1->the_post(); ?>

								<?php

									get_template_part( 'template-parts/content' );
								
								?>

							<?php endwhile; ?>

							<?php else : ?>

								<?php get_template_part( 'template-parts/content', 'none' ); ?>

							<?php endif; ?>

							<?php wp_reset_postdata(); ?>

						</div><!-- grid__col-md-4 -->

						<?php $wp_query2 = new WP_Query('showposts=4&post_type=portefolio'); ?>

						<?php if($wp_query2->have_posts()) : ?>
					            

						<div class="grid__col-md-4">

							<div class="separador">

								<div class="latest-heading">Portefólio</div>

							</div>

						<?php while($wp_query2->have_posts()) : $wp_query2->the_post(); ?>

							<?php

								get_template_part( 'template-parts/content' );
							
							?>

						<?php endwhile; ?>

						<?php else : ?>

							<?php get_template_part( 'template-parts/content', 'none' ); ?>

						<?php endif; ?>

						<?php wp_reset_postdata(); ?>

						</div><!-- grid__col-md-4 -->

						<?php $wp_query3 = new WP_Query('showposts=6&cat=16'); ?>

						<?php if($wp_query3->have_posts()) : ?>
					            

						<div class="grid__col-md-4">

							<div class="separador">

								<div class="latest-heading">Mixtapes</div>

							</div>

						<?php while($wp_query3->have_posts()) : $wp_query3->the_post(); ?>

							<?php

								get_template_part( 'template-parts/content' );
							
							?>

						<?php endwhile; ?>

						<?php else : ?>

							<?php get_template_part( 'template-parts/content', 'none' ); ?>

						<?php endif; ?>

						<?php wp_reset_postdata(); ?>

						</div><!-- grid__col-md-4 -->

					</div><!-- grid -->
					
				</div><!-- grid__col-md-8 -->

			</div><!-- grid -->

		</main><!-- #main -->
		
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();