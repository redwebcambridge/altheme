<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Anglian_Learning
 */

get_header();
$thumbnail= get_field('thumbnail'); ?>

	<div class="container newsevents">
	  	<div class="row">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		        <article class="col-12 col-md-8 single-content standard-content">

					<?php if( get_field('subheaderarticle') ): ?>
						<h2 class="heading-two"><?php echo get_field('subheaderarticle'); ?></h2>
						<div class="gradline"></div>
					<?php endif; ?>


					<p class="body-text"></p>
		          	<?php the_content(); ?>
					  <?php if (has_category('newsletter') || has_category('the-fountain')) : get_template_part('template-parts/content-newsletters'); endif; ?>
		        </article>

				<div class="col-12 col-md-4 mb-5">
					<?php if (!empty($thumbnail['url'])) : ?><img src="<?php echo $thumbnail['url']; ?>" alt="<?php echo $thumbnail['alt']; ?>" title="<?php echo $thumbnail['title']; ?>"><?php endif; ?>
					<?php if (!empty($thumbnail['caption'])) : echo '<div class="wp-caption-text">'.$thumbnail['caption'].'</div>'; endif; ?>
			        <h3 class="h3 section-header ceo-right-header special-underine"><strong>SHARE</strong></h3>

					<div class="socialcontainer">
						<div class="row no-gutters d-flex">

				            <?php $post = get_post(); ?>

							<a id="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" title="Share to Facebook" aria-label="Share to Facebook" class="w-auto social-share me-2 px-3"></a>

							<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=LinkedIn" title="Share to LinkedIn" aria-label="Share to LinkedIn" target="_blank" id="linkedin" class="w-auto social-share me-2 px-3"></a>

							<a id="email" href="mailto:?subject=<?php echo get_the_title(); ?>&body=View <?php echo get_the_title(); ?>: <?php echo get_permalink(); ?>" title="Email" aria-label="Email" class="px-3 w-auto social-share me-2"></a>

						</div>
					</div>

					<?php
					if (is_sports_page()) {
						$sports_fields = get_field('sports_footer_options','option');
						$phone_number = $sports_fields['telephone'];
						$email = $sports_fields['email_address'];
						$address = $sports_fields['address'];
						$social = $sports_fields['social_media'];
					} elseif (is_adult_ed_page()) {
						$adult_fields = get_field('footer_options','option');
						$phone_number = $adult_fields['telephone'];
						$email = $adult_fields['email_address'];
						$address = $adult_fields['address'];
						$social = $adult_fields['social_media'];
					} else {
						$phone_number = get_field('telephone','option');
						$email = get_field('email_address','option');
						$address = get_field('address','option');
						$social = get_field('platforms' , 'option');
					}
					$display_options = get_field('display_options'); 
					?>


			        <h3 class="h3 section-header ceo-right-header special-underine"><strong>CONTACT</strong> DETAILS</h3>
					<p class="newsevents-contact newsevents-phone" role="text"><i class="fas fa-phone"></i><?php echo $phone_number; ?></p>
			        <p class="newsevents-contact newsevents-email" role="text"><i class="fas fa-envelope"></i><a href="mailto:<?php echo $email; ?>" role="link"><?php echo $email; ?></a></p>
			        <p class="newsevents-contact newsevents-address" role="text"><i class="fas fa-map-marker-alt"></i><?php 
                    if(!empty($address['address_line_1'])) : echo $address['address_line_1'].', '; endif; 
                    if(!empty($address['street'])) : echo $address['street'].', '; endif; 
                    if(!empty($address['town'])) : echo $address['town'].', '; endif; 
                    if(!empty($address['city'])) : echo $address['city'].', '; endif; 
                    if(!empty($address['county'])) : echo $address['county'].', '; endif; 
                    if(!empty($address['postal_code'])) : echo $address['postal_code']; endif;                                     
                    ?>  </p>
				</div>

			<?php endwhile; endif; ?>

	  	</div>

		<?php get_template_part('template-parts/downloads'); ?>

		
	</div>

<?php get_footer();
