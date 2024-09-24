<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Anglian_Learning
 */

get_header();
?>
<div class="container newsevents mb-5">


<div class="row">

	<?php 
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$args = array(
		'post_type' => 'post', // Default post type
		'post_status' => 'publish',
		'paged' => $paged,
		'posts_per_page' => 6,
		'tax_query' => [
			[
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => [ 'newsletter' ],
				'operator' => 'NOT IN'
			],
		],
	);

	// Custom query
	$wp_query = new WP_Query($args);

	if($wp_query->have_posts()) :
		while ( $wp_query->have_posts() ) : $wp_query->the_post();

			get_template_part('template-parts/content-post'); // Your post content template

		endwhile; ?>

		<div class="pagination col-12">
			<?php 
			echo paginate_links( array(
				'base' => esc_url( get_pagenum_link( 1 ) ) . '%_%', // Base URL correction
				'format' => 'page/%#%/', // Correct format for page numbers
				'current' => max( 1, $paged ),
				'total' => $wp_query->max_num_pages,
				'prev_text' => __('« Previous'),
				'next_text' => __('Next »'),
			) );
			?>
		</div>

		<?php wp_reset_postdata(); ?>

	<?php else : ?>
		<p><?php _e('No posts found'); ?></p>
	<?php endif; ?>
</div>

	
<?php
get_footer();
