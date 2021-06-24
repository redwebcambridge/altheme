<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Anglian_Learning
 */

?>

<div class="col-md-4 course">
	<a href="<?php the_permalink(); ?>">
		<div class="course-thumbnail" style="background-image:url('<?php the_field('featured_top_image'); ?>')"></div>
		<p class="course-name"><?php the_title(); ?></p>
	</a>
</div>
