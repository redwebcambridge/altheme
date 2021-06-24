<?php
/*
Template Name: Vacancies
*/

if(isset($_GET['downloadapplication'])) :

  $dbname = VAC_DB_NAME;
  $servername = VAC_DB_SERVER;
  $vacancy = $_GET['downloadapplication'];

  require_once(dirname( __FILE__ )."/../lib/spaces/spaces.php");
  $spaces = Spaces("U4W5DLNFLZSNZRRPJWK2", "aoipt2I/bUwfhot1UzA3rWnQOI7nSDUk2F6viP0FCJ8");
  $my_space = $spaces->space("anglianlearning", "fra1");

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", VAC_DB_USER, VAC_DB_PASSWORD);
    $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("SELECT school, application_form FROM live WHERE id=$vacancy");
    $sql->execute();
    $vacancies = $sql->fetch();
  } catch(PDOException $e) {
    echo $e->getMessage();
  }

  $my_space->downloadFile( $vacancies['school'].'/'.$vacancies['application_form'], $_SERVER['DOCUMENT_ROOT'].'/application/'.$vacancies['application_form']);
  $downloadurl = get_site_url().'/application/'.$vacancies['application_form'];
  echo '<h3 style="text-align:center;padding:100px 0; color:#ccc; font-family: sans-serif">Downloading Application...</h3>';
  echo "<script>location.href='$downloadurl'</script>";
  die;
endif;


get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="container contact-page">
        <div class="row">
          <div class="col-lg-8 text-section">
            <h2 class="heading-two"><?php the_field('sub_heading') ?></h2>

            <div class="gradline"></div>

            <div class="current_vacancies">
            <p class="body-text"><?php the_field('body_text') ?></p>
            <h2 class="heading-two mt-5">Current Vacancies</h2>
            <div class="gradline mb-5"></div>

            <?php
            $dbname = VAC_DB_NAME;
            $servername = VAC_DB_SERVER;
            $school = get_field('school_id','option');

            try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", VAC_DB_USER, VAC_DB_PASSWORD);
              $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, PDO::ERRMODE_EXCEPTION);
              $sql = $conn->prepare("SELECT * FROM live WHERE school=:school AND live=1");
              $sql->execute([
                'school' => $school,
              ]);
              $vacancies = $sql->fetchAll();
            } catch(PDOException $e) {
              echo $sql . "<br>" . 'update' . $e->getMessage();
            }

            $i=0;
            foreach ($vacancies as $vacancy){
              $i++;
               echo '<div class="vacancy"><h3>'.$vacancy['vac_title'].'</h3>';
               echo '<h4>'.$vacancy['vac_sub_title'].'</h4>';
               echo '<p class="closingdate">'.$vacancy['vac_closing_date'].'</p>';
               echo '<a class="btn btn-primary" data-toggle="collapse" href="#content'.$i.'" role="button" aria-expanded="false" aria-controls="content'.$i.'">Show description</a>';
               echo '<div class="content collapse multi-collapse" id="content'.$i.'">'.$vacancy['vac_description'];
               if ($vacancy['application_form']){echo '<p><a class="btn btn-secondary btn-sm" target="_blank" href="?downloadapplication='.$vacancy['id'].'" >Download Application</a></p>';}
               echo '</div></div>';
            }
            if ($i==0){
              echo '<p><em>There are currently no Vacancies</em></p>';
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
      </div>

</section>
<script>
      $('input:file').change(function(e){
      var file = '<p style="font-weight:700;">'+e.target.files[0].name+'</p>';
      $('.cv_upload small').append(file)
    });
</script>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
