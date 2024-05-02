<?php
/*
Template Name: Meet the staff
*/
get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="container meet-the-staff1">
        <div class="row">
          <!---sidebar--->
          <div class="col-md-3">
            <?php get_template_part('template-parts/sidebar-menu'); ?>
          </div>
          <!---Sidebar - End--->


          <!---Body section--->
          <div class="col-md-9 text-section">
          <?php if (get_field('sub_heading')) : ?>
            <h2 class="heading-two"><?php echo get_field('sub_heading') ?></h2>
            <div class="gradline mb-3"></div>
          <?php endif; ?>
          <p class="body-text"><?php echo get_field('intro_text') ?></p>


            <!---Table--->
            <table class="table largetableview">
              <thead class="table-head">
                <tr>
                  <th scope="col" class="name_col"><p>Name</p></th>
                  <th scope="col"><p>Role</p></th>
                  <th scope="col" style="text-align:right" class="form">
                    <?php
                    if (get_field('school_id','option') == "svc") {
                      echo '<p>Mentor Group</p>';
                    } else {
                      echo '<p>Form / Mentor Group</p>';
                    }
                    ?>
                  </th>
                </tr>
              </thead>
              <tbody>

              <?php if( get_field('table_of_staff') ): ?>
              <?php while( the_repeater_field('table_of_staff') ): ?>

                <?php $dept = get_sub_field('department'); ?>


                <?php if ($dept) { ?>

                <tr>

                  <th scope="row" colspan="4" class="table-subheading">
                    <p><?php echo get_sub_field('department'); ?></p>
                  </th>

                </tr>
            <?php   } ; ?>

                <tr>
                  <td scope="row">
                    <p><?php echo get_sub_field('name'); ?><br><a href="mailto:<?php echo get_sub_field('email'); ?>"><?php echo get_sub_field('email'); ?></a></p>
                  </td>

                  <td>
                    <p><?php echo get_sub_field('role'); ?></p>
                </td>

                  <td style="text-align:right">
                    <p><?php echo get_sub_field('form__mentor_group'); ?><p>
                  </td>
                </tr>

              <?php endwhile; ?>
              <?php endif; ?>

              </tbody>
            </table>

            <!---Table end--->


            <!---Mobile view Table--->

            <?php if( get_field('table_of_staff') ): ?>
            <?php while( the_repeater_field('table_of_staff') ): ?>

                <table width="100%" class="table mobileviewtable">
                    <tbody width="100%">
                        <?php if (get_sub_field('department')) { ?>
                        <tr>
                            <td width="30%" class="mobileviewlabel departmentlabel"><p>Department</p></td>
                            <td><p><?php echo get_sub_field('department'); ?></p></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td width="30%" class="mobileviewlabel"><p>Name</p></td>
                            <td><p><?php echo get_sub_field('name'); ?><br><a href="mailto:<?php echo get_sub_field('email'); ?>"><?php echo get_sub_field('email'); ?></a></p></td>
                        </tr>
                        <tr>
                            <td width="30%" class="mobileviewlabel"><p>Role</p></td>
                            <td><p><?php echo get_sub_field('role'); ?></p></td>
                        </tr>
                        <?php if (get_sub_field('form__mentor_group')) { ?>
                        <tr>
                            <td width="30%" class="mobileviewlabel"><p>Form / Mentor Group</p></td>
                            <td><p><?php echo get_sub_field('form__mentor_group'); ?><p></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            <?php endwhile; ?>
            <?php endif; ?>

            <!---Mobile view Table end--->
          </div>

          <!---Body section - End--->


        </div>
        <?php get_template_part('template-parts/downloads'); ?>

      </div>



</section>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
