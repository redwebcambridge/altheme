<?php
/**
 * News Category
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
$category = get_queried_object();
?>

<div class="container newsevents mb-5 newsletters">
	<div class="row row-flex">
		<?php 
		$the_query = new WP_Query( array('post_type'  => 'post','posts_per_page' => -1,'cat' => $category->term_id )  );
		if ($the_query->have_posts()) : while ($the_query->have_posts() ) : $the_query->the_post(); 
		get_template_part('template-parts/content-newsletters');
		endwhile; else : echo '<div class="alert alert-secondary text-center" role="alert"><em>Sorry! There are no posts found</em></div>'; endif;
		?>
	</div>
	<?php if ($the_query->post_count > 6) : ?>
		<?php get_template_part('template-parts/loadmore'); ?>
	<?php endif; ?>
</div>

<?php
get_footer();