<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Anglian_Learning
 */

get_header();
?>

<div class="container newsevents">
	<div class="row row-flex">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="col-12 col-md-4 newseventcontainer">
				<div class="col-12 newseventimage">
					<?php
					$imageurl = get_the_post_thumbnail_url();
					?>
					<a href="<?php the_permalink(); ?>">
						<div class="newseventimagecontainer" style="background-image:url(<?php echo $imageurl; ?>);"></div>
					</a>
				</div>
				<div class="col-12 newseventtext">
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<?php the_excerpt(); ?>
					<a class="readmore" href="<?php the_permalink(); ?>">READ MORE</a>
				</div>
			</div>

			<div class="col-12 page-navi">
              <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
            </div>

		<?php endwhile; endif; ?>

	</div>
</div>

<?php
// get_sidebar();
get_footer();
