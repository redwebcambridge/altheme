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

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="adult-learning-page">
	      <div class="container">
	        <div class="row">

	          <!---Sidebar--->
          <div class="col-md-2 text-section">
          <?php
            $menu_choice = get_field('menu_select');
            wp_nav_menu(
              array('menu'=>$menu_choice, 'menu_id' => 'sidebar-menu')
            );
            ?>
          </div>
          <!---Sidebar - End--->


	          <!---Body section--->

	          <div class="col-md-10 text-section">
	              <h2 class="heading-two"><?php the_archive_title(); ?></h2>

	              <div class="gradline"></div>

	              <p class="body-text"><?php the_archive_description(); ?></p>

	              <div class="row">
	                  <?php

	  				/*
	  				 * Include the Post-Type-specific template for the content.
	  				 * If you want to override this in a child theme, then include a file
	  				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
	  				 */
	  				get_template_part( 'template-parts/content', get_post_type() ); ?>
	              </div>

	            <div class="contact-box row">
	                <div class="name-position col-md-6">
	                      <p><strong><?php the_field('contact_name', 526) ?></strong><br>
	                          <?php the_field('position', 526) ?></p>
	                </div>

	                <div class="contact-details d-flex col-md-6">
	                    <p class="email"><a href="mailto:<?php the_field('email', 526) ?>"><?php the_field('email', 526) ?></a></p>
	                    <p class="number"><?php the_field('phone_number', 526) ?></p>
	                </div>
	            </div>


	          <!---Body section - End--->
	        </div>
	    </div>
	</div>
	</section>


	<?php endwhile; endif; ?>


<?php
// get_sidebar();
get_footer();
