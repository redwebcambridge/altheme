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


if (get_field('category_display', $category) === 'newsletter_display') { ?>

	<div class="container newsevents mb-5 newsletters">
		<div class="row">
			<div class="col py-4">
				<?php
				if (!empty($category->description)) {
					echo '<div class="category-description">' . $category->description . '</div>';
				}
				?>
			</div>
		</div>
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


<?php } else { //NORMAL DISPLAY ?>

	<div class="container newsevents mb-5">
		<?php 
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

		$the_query = new WP_Query( 
		array(
			'post_type'  => 'post',
			'posts_per_page' => 6,
			'post_status' => 'publish',
			'cat' => $category->term_id,
			'paged' => $paged
			)  
		);

		if ($the_query->have_posts()) : ?>
			<div class="row row-flex" role="list">
			<?php 
				while ($the_query->have_posts() ) : $the_query->the_post(); 
					get_template_part('template-parts/content-post');
				endwhile; 
			?>
			</div>

			<div class="row">
				<div class="pagination col-12">
				<?php 
					echo paginate_links( array(
						'base' => esc_url( get_pagenum_link( 1 ) ).'%_%', 
						'format' => 'page/%#%/', 
						'current' => max( 1, $paged ),
						'total' => $the_query->max_num_pages,
						'prev_text' => __('« Previous'),
						'next_text' => __('Next »'),
					) );
					?>
				</div>
			</div>

		<?php
			wp_reset_postdata();
		else : ?>
			<div class="row">
				<div class="alert alert-secondary text-center" role="alert"><em>Sorry! There are no posts found</em></div>
			</div>
		<?php endif; ?>

	</div>
	
<?php } ?>

<?php
get_footer();
