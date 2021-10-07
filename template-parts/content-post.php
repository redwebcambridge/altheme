<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Anglian_Learning
 */

?>

<div class="col-12 col-md-6 col-lg-4 newseventcontainer">
	<div class="col-12 newseventimage">
		<?php
		$imageurl = get_field('thumbnail')['url'];
		if(empty($imageurl)){
			$imageurl = get_the_post_thumbnail_url();
		}
		 ?>
		<a href="<?php the_permalink(); ?>">
			<div class="newseventimagecontainer" style="background-image:url(<?php echo $imageurl; ?>);"></div>
		</a>
	</div>
	<div class="col-12 newseventtext" onclick="window.location.href = '<?php the_permalink(); ?>' " >
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<?php the_excerpt(); ?>
		<a class="readmore" href="<?php the_permalink(); ?>">READ MORE</a>
	</div>
</div>
