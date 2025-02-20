<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Anglian_Learning
 */

?>

<div class="col-12 col-md-4 col-lg-2 newslettercontainer">
	<div class="col-12 newseventimage">
		<?php
		$download = get_field('pdf_upload'); ?>
		<a href="<?php echo $download['url']; ?>" title="<?php echo esc_attr(get_the_title()); ?>" aria-label="<?php echo esc_attr(get_the_title()); ?>" target="_blank">
			<div class="newseventimagecontainer newsletter" style="background-image:url(<?php echo $download['icon']; ?>);"></div>
		</a>
	</div>
	<div class="col-12 newseventtext" onclick="window.open( '<?php echo $download['url']; ?>',  '_blank')" >
		<div class="h4"><a href="<?php echo $download['url']; ?>" target="_blank"><?php the_title(); ?></a></div>
	</div>
</div>
