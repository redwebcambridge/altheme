<?php
/**
 * The template for displaying courses
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Anglian_Learning
 */

get_header();  
?>
<div class="page-template-sports-centre">
	<div class="container">
	    <div class="row">

	   <!---Sidebar--->
	   <div class="col-md-3 text-section">
	 		  <?php
			 	$main_sportlearning_page = get_field('sports_homepage','option');
				$sports_menu = get_field('menu_select',$main_sportlearning_page);
				wp_nav_menu(
					array('menu'=>$sports_menu, 'menu_id' => 'sidebar-menu')
				);
			?>
        </div>

		<div class="col-md-9 text-section">
	        <h2 class="heading-two d-flex justify-content-between"><?php  echo single_term_title(); ?></h2>
	        <div class="gradline"></div>
	        <p class="body-text"><?php echo term_description(); ?></p>
			<?php 
			$tax_ID = get_queried_object()->term_id;
			$courses = get_posts(
				array(
					'posts_per_page' => -1,
					'post_type' => 'sportscentre',
					'tax_query' => array(
						array(
							'taxonomy' => 'sports-centre-category',
							'field' => 'term_id',
							'terms' => $tax_ID,
						)
					)
				)
			);
			?>
			<div class="row">
			<?php
			foreach ($courses as $course) : 
				$imageurl = get_the_post_thumbnail_url($course->ID);
				echo '<div class="col-md-4 course"><a href="'.esc_url( get_permalink( $course->ID) ).'">';
                echo '<div class="course-thumbnail" style="background-image:url('.$imageurl.')"></div><p class="course-name">'.$course->post_title.'</p>';
                echo '</a></div>';
			endforeach; 
			?>
			</div>
			<?php 
			if (!$courses) : 
				echo '<div class="alert alert-secondary mx-auto" role="alert"><em>Sorry, there are currently no classes available</em></div>'; 
			endif; ?>
			<?php get_template_part('template-parts/sports-contact'); ?>

		</div>
    </div>
</div>

</div>
</section>

<?php
get_footer();
