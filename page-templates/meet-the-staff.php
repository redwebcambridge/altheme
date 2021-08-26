<?php
/*
Template Name: Meet the staff
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="container meet-the-staff1">
        <div class="row">
          <!---sidebar--->
          <div class="col-md-2">
            <?php get_template_part('template-parts/sidebar-menu'); ?>
          </div>
          <!---Sidebar - End--->


          <!---Body section--->
          <div class="col-md-10 text-section">
          <?php if (get_field('sub_heading')) : ?>
            <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>
            <div class="gradline"></div>
          <?php endif; ?>

            <!---Table--->
            <table class="table">
              <thead class="table-head">
                <tr>
                  <th scope="col"><p>Name</p></th>
                  <th scope="col"><p>Role</p></th>
                  <th scope="col"><p>Email</p></th>
                  <th scope="col"><p>Form / Mentor Group</p></th>
                </tr>
              </thead>
              <tbody>

              <?php if( get_field('table_of_staff') ): ?>
              <?php while( the_repeater_field('table_of_staff') ): ?>

                <?php $dept = get_sub_field('department'); ?>


                <?php if ($dept) { ?>

                <tr>

                  <th scope="row" colspan="4" class="table-subheading">
                    <p><?php the_sub_field('department'); ?></p>
                  </th>

                </tr>
            <?php   } ; ?>



                <tr>
                  <td scope="row">
                    <p><?php the_sub_field('name'); ?></p>
                  </td>

                  <td>
                    <p><?php the_sub_field('role'); ?></p>
                </td>

                  <td>
                    <p><a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a></p>
                  </td>

                  <td>
                    <p><?php the_sub_field('form__mentor_group'); ?><p>
                  </td>
                </tr>

              <?php endwhile; ?>
              <?php endif; ?>

              </tbody>
            </table>

            <!---Table end--->

          </div>

          <!---Body section - End--->


        </div>
        <?php get_template_part('template-parts/downloads'); ?>

      </div>



</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>