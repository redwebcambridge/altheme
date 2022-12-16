<?php
/*
Template Name: Vacancies
*/

if(isset($_GET['download'])) :
  $dbname = VAC_DB_NAME;
  $servername = VAC_DB_SERVER;
  $vacancy = $_GET['download'];
  $type = $_GET['type'];

  require_once(dirname( __FILE__ )."/../lib/spaces/spaces.php");
  $spaces = Spaces(VAC_SPACE_KEY, VAC_SPACE_SECRET);
  $my_space = $spaces->space("anglianlearning", "fra1");

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", VAC_DB_USER, VAC_DB_PASSWORD);
    $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("SELECT school, $type FROM live WHERE id=$vacancy");
    $sql->execute();
    $vacancies = $sql->fetch();
  } catch(PDOException $e) {
    echo $e->getMessage();
  }

  $my_space->downloadFile( $vacancies['school'].'/'.$vacancies[$type], $_SERVER['DOCUMENT_ROOT'].'/application/'.$vacancies[$type]);
  $downloadurl = get_site_url().'/application/'.$vacancies[$type];

  echo '<h3 style="text-align:center;padding:100px 0; color:#ccc; font-family: sans-serif">Downloading Application...</h3>';
  echo "<script>location.href='$downloadurl'</script>";
  die;

endif;

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="container">
        <div class="row">
          <div class="col-lg-8 text-section">
            <h2 class="heading-two"><?php the_field('sub_heading'); ?></h2>

            <div class="gradline"></div>

            <div class="current_vacancies">
            <p class="body-text"><?php the_field('body_text'); ?></p>
            <h2 class="heading-two mt-5">Current Vacancies</h2>
            <div class="gradline mb-5"></div>

            <?php
            $dbname = VAC_DB_NAME;
            $servername = VAC_DB_SERVER;
            $school = get_field('school_id','option');

            if (is_sports_page()) {
              $listing_type = 'sports_center';
            } elseif (is_adult_ed_page()) {
              $listing_type = 'adult_learning';
            } else {
              $listing_type = 'school';
            }

            try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", VAC_DB_USER, VAC_DB_PASSWORD);
              $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, PDO::ERRMODE_EXCEPTION);
              $sql = $conn->prepare("SELECT * FROM live WHERE school=:school AND live=1 AND listing_type=:listing_type ORDER BY vac_closing_date ASC");
              $sql->execute([
                'school' => $school,
                'listing_type' => $listing_type,
              ]);
              $vacancies = $sql->fetchAll();
            } catch(PDOException $e) {
              echo $sql . "<br>" . 'update' . $e->getMessage();
            }

            $i=0;
            foreach ($vacancies as $vacancy){
              $closingdate = new DateTime($vacancy['vac_closing_date']);
              $now = new DateTime();
              if($closingdate < $now) {
                continue;
              }
               echo '<div class="vacancy" id="vacancy_'.$vacancy['id'].'"><h3>'.$vacancy['vac_title'].'</h3>';
               echo '<h4>'.$vacancy['vac_sub_title'].'</h4>';
               echo '<p class="closingdate">Closing Date: '.$closingdate->format('l j F Y g:i a');
               echo '<br>Salary: '.$vacancy['vac_salary'].'</p>';
               echo '<a class="btn btn-primary" data-toggle="collapse" href="#content'.$i.'" role="button" aria-expanded="false" aria-controls="content'.$i.'">View details</a>';
               echo '<div class="content collapse multi-collapse" id="content'.$i.'">';
               echo stripslashes($vacancy['vac_description']);
               //application form
               if ($vacancy['application_form']){echo '<p><a class="btn btn-secondary btn-sm" target="_blank" href="?download='.$vacancy['id'].'&type=application_form" >Download Application Form</a>&nbsp;';}
               //Recruitment Pack
               if ($vacancy['recruitment_pack']){echo '<a class="btn btn-secondary btn-sm" target="_blank" href="?download='.$vacancy['id'].'&type=recruitment_pack" >Download Recruitment Pack</a></p>';}
               echo '</div></div>';
               $i++;
            }
            if ($i==0){
              echo '<p>There are currently no vacancies. Please log an interest with us for future opportunities.</p>';
            }
            ?>
          </div>
        </div>

          <div class="col-lg-4 text-section">
            <?php if(get_field('show_log_an_interest_form')) : ?>
              <div class="log_interest">
              <?php
              $form = get_field('form');
              echo do_shortcode('[contact-form-7 id="'. $form[0] .'"]'); ?>
              </div>
            <?php endif; ?>

          </div>

          <!---Body section right - End--->
        </div>
        <?php get_template_part('template-parts/downloads'); ?>

      </div>

</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
