<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Anglian_Learning
 */

get_header(); ?>

	<div class="container newsevents">
	  	<div class="row">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		        <div class="col-12 col-md-8 single-content standard-content">
					<h2 class="heading-two"><?php the_title(); ?></h2>
					<div class="gradline"></div>
					<p class="body-text"></p>

		          	<?php the_content(); ?>
		        </div>

				<div class="col-12 col-md-4">
					<?php
					$imageurl = get_the_post_thumbnail_url();
					?>
			    	<img src="<?php echo $imageurl; ?>">

			        <h3 class="section-header ceo-right-header special-underine"><strong>SHARE</strong></h3>

					<div class="socialcontainer">
						<div class="row no-gutters">
			                <div class="col-4 social-share" id ="twitter">
			                    <a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=Anglian Learning" target="_blank"></a>
			                </div>

				            <?php $post = get_post(); ?>

				            <?php $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');  ?>

			                <div class="col-4 social-share" id ="facebook">
			                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>&picture=<?php echo $featured_img_url ?>" target="_blank"></a>
			                </div>

			                <div class="col-4 social-share" id ="linkedin">
			                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=LinkedIn" target="_blank"></a>
			                </div>
						</div>
					</div>


			        <h3 class="section-header ceo-right-header special-underine"><strong>CONTACT</strong> DETAILS</h3>
					<p class="newsevents-contact newsevents-phone"><?php the_field('telephone','option'); ?></p>
			        <p class="newsevents-contact newsevents-email"><a href="mailto:<?php the_field('email_address','option'); ?>"></a><?php the_field('email_address','option'); ?></a></p>
			        <p class="newsevents-contact newsevents-address"><?php the_field('address','option'); ?></p>
				</div>

			<?php endwhile; endif; ?>

	  	</div>

		<?php get_template_part('downloads'); ?>
		
	</div>

<?php get_footer();
