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

		if(!empty(get_field('thumbnail')['url'])){
			$imageurl = get_field('thumbnail')['url'];
		} elseif(empty($imageurl)) {
			$imageurl = get_the_post_thumbnail_url();
		}
		
		 ?>
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(get_the_title()); ?>" aria-label="<?php echo esc_attr(get_the_title()); ?>">
			<div class="newseventimagecontainer" style="background-image:url(<?php echo $imageurl; ?>);"></div>
		</a>
	</div>
	<div class="col-12 newseventtext" onclick="window.location.href = '<?php the_permalink(); ?>' " >
		<div class="h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
		<?php the_excerpt(); ?>
		<a class="readmore" href="<?php the_permalink(); ?>">READ MORE</a>
	</div>
</div>
