<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Anglian_Learning
 */

get_header();
?>

	<div id="primary" class="site-main container" role="region" aria-labelledby="page-not-found-heading">

		<section class="error-404 not-found row text-center py-5">


			<div class="page-content align-center col-12 align-items-xl-center">
				<h1 id="page-not-found-heading">404</h1>
				<p><?php esc_html_e( 'PAGE NOT FOUND', 'anglian-learning' ); ?></p>

					
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</div><!-- #primary -->

<?php
get_footer();
