<?php get_header(); ?>


    <div style="display: flex;
    justify-content: center;
    background-repeat: no-repeat;
    background-size: cover;
    align-items: center;height: 300px; background-image: url('<?php the_field('vacancies_image','option'); ?>');"><span style="background-color: #911553;" class="text-white text-center p-4"><?php the_field('vacancies_image_text','option'); ?></span></div>


  <div class="container">
    <div class="row">
      <?php

      $show_form = 1;

      if ($show_form) { ?>

      <div class="col-lg-8 pt-5">

        <h4 style="color:#911553;"><?php the_field( 'vacancies_page_title','option'); ?></h4>
        <div style="height: 1px; background-color:#911553;" class="line my-4"></div>

        <?php the_field( 'vacancies_page_text','option'); ?>


        <h1 class="pt-5" style="color:#911553;">CURRENT VACANCIES</h1><br>
        <div style="height: 1px; background-color:#911553;" class="line mb-4"></div>

        <?php

        $vacancies = get_posts( array( 'post_type' => 'vacancies', 'numberposts'    => -1,));

        echo '<pre>';
        //var_dump($vacancies);
        var_dump( $vacancies[0]->post_title);
        echo  $vacancies[0]->post_title;
        echo '</pre>';

        // for testing
        // $vacancies = 0;

        if ($vacancies) {

        foreach ($vacancies as $vacancy): ?>

          <h3  class="mb-3" style="color:#911553;"><?php echo $vacancy->post_title;?></h3>

          <p><?php echo the_field('salary'); ?></p>

          <p>Closing Date: <?php echo the_field('closing_date'); ?></p>

          <hr style="border-top: dotted 1px;">

        <?php endforeach ;wp_reset_postdata();

        } else {

          echo 'We do not have any vacancies at the moment. Please log an interest with us for future opportunities. You can find all available vacancies within Anglian Learning on their website' . '<a href="www.anglian-learning.com">' . " " . 'here.' . '</a>';

        }

        ?>


      </div>

      <div class="col-lg-4">

        <div class="w-100" style="background-color: rgb(233,180,103);">


          <?php echo do_shortcode('[contact-form-7 id="379" title="Log and Interest For Future Opportunities"]'); ?>

        </div>


      </div>
      <?php  } else { ?>

        <div class="col-lg-12 pt-5">

          <h4 style="color:#911553;"><?php the_field( 'vacancies_page_title','option'); ?></h4>
          <div style="height: 1px; background-color:#911553;" class="line my-4"></div>

          <?php the_field( 'vacancies_page_text','option'); ?>


          <h1 class="pt-5" style="color:#911553;">CURRENT VACANCIES</h1><br>
          <div style="height: 1px; background-color:#911553;" class="line mb-4"></div>

          <?php

          $vacancies = get_posts( array( 'post_type' => 'vacancies', 'numberposts'    => -1,));

          // for testing
          // $vacancies = 0;

          if ($vacancies) {

          foreach ($vacancies as $vacancy): ?>

            <h3  class="mb-3" style="color:#911553;"><?php echo $vacancy->post_title;?></h3>

            <p><?php echo the_field('salary'); ?></p>

            <p>Closing Date: <?php echo the_field('closing_date'); ?></p>

            <hr style="border-top: dotted 1px;">

          <?php endforeach ;wp_reset_postdata();

          } else {

            echo 'We do not have any vacancies at the moment. Please log an interest with us for future opportunities. You can find all available vacancies within Anglian Learning on their website' . '<a href="www.anglian-learning.com">' . " " . 'here.' . '</a>';

          }

          ?>


        </div>

        <?php }; ?>
    </div>
  </div>
<?php get_footer(); ?>

