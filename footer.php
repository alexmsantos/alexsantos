<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package alexsantos
 */

?>
	</div> <!-- content -->

	<footer id="colophon" class="site-footer">

		<div class="grid">
			<div class="grid__col-12">
				<div class="grid">
					<div class="grid__col-md-12">
						<div class="site-info">
							@ Alex Santos <?php echo date("Y") ?>. Todos os direitos reservados.
						</div><!-- .site-info -->
					</div><!-- grid__col-12 -->
				</div><!-- grid -->
			</div><!-- grid__col-12 -->
		</div><!-- grid -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
