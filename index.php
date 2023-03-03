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
		$args = array('post_status' => 'publish','paged' => $paged, 'posts_per_page' => 6, 'cat'=>-18) ;
		$wp_query = new WP_Query($args);
		$big = 99999999999999;

		if($wp_query->have_posts()) :
		while ( $wp_query->have_posts() ) : $wp_query->the_post();

		get_template_part('template-parts/content-post');?>

		<?php endwhile; ?>

		<div class="pagination col-12">
			<?php echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages
			) );
			?>
		</div>
		
		<?php endif; ?>


</div>

	
<?php
get_footer();
