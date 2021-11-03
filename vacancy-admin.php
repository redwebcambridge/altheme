<?php 
 $dbname = VAC_DB_NAME;
 $servername = VAC_DB_SERVER;
 $school = get_field('school_id','option'); 
 $schoolname = get_field('school_name','option'); 

 require_once("lib/spaces/spaces.php");
 $spaces = Spaces("U4W5DLNFLZSNZRRPJWK2", "aoipt2I/bUwfhot1UzA3rWnQOI7nSDUk2F6viP0FCJ8");
 $my_space = $spaces->space("anglianlearning", "fra1");

 if(isset($_GET['action'])) {
  if ($_GET['action']=='update' && isset($_GET['updateid']) ) {
    $update_id = $_GET['updateid'];
  }
 }


//IF ADDING OR UPDATING (not trashing)
if($_POST) : 
    if ($_POST['publish']) :
      $my_space->uploadFile( $_FILES['application']["tmp_name"], $school.'/'.$_FILES['application']['name']);
      $my_space->uploadFile( $_FILES['recruitment']["tmp_name"], $school.'/'.$_FILES['recruitment']['name']);

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", VAC_DB_USER, VAC_DB_PASSWORD);
        $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

        $sql = $conn->prepare(" INSERT INTO live (vac_title,vac_sub_title,vac_salary,vac_closing_date,vac_description,school,live,school_name,recruitment_pack,application_form,listing_type) VALUES (:vac_title,:vac_sub_title,:vac_salary,:vac_closing_date,:vac_description,:school,:live,:schoolname,:recruitment_pack,:application_form,:listing_type)");

        $sql->execute([
          'vac_title' =>  $_POST['post_title'],
          'vac_sub_title' => $_POST['subtitle'],
          'vac_salary' => $_POST['salary'],
          'vac_closing_date' => $_POST['closing'],
          'vac_description' => stripslashes( wpautop( $_POST['jobdesc'] ) ),
          'school' => $school,
          'live' => 1,
          'schoolname' => $schoolname,
          'recruitment_pack' => $_FILES['recruitment']['name'],
          'application_form' => $_FILES['application']['name'],
          'listing_type' => $_POST['listing_type']
      ]);  

      print_r($sql->errorInfo());

        $update_id = $conn->lastInsertId();
        $redirecturl = '?page=vacancyadmin&added&action=update&updateid='.$update_id;
        echo "<script>location.href='$redirecturl'</script>";
      } catch(PDOException $e) {
        echo $sql . "<br>" . 'update' . $e->getMessage();
      }

    elseif ($_POST['update']) :

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", VAC_DB_USER, VAC_DB_PASSWORD);
        $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, PDO::ERRMODE_EXCEPTION);

      if (file_exists($_FILES['application']['tmp_name'])) {
        $my_space->uploadFile( $_FILES['application']["tmp_name"], $school.'/'.$_FILES['application']['name']);
        $update_data = [
          'vac_title' => $_POST['post_title'],
          'vac_sub_title' => $_POST['subtitle'],
          'vac_salary' => $_POST['salary'],
          'vac_closing_date' => $_POST['closing'],
          'vac_description' => stripslashes( wpautop( $_POST['jobdesc'] ) ),
          'live' => 1,
          'id' => $_POST['updateid'],
          'application_form' => $_FILES['application']['name'],
          'listing_type' => $_POST['listing_type']
        ];
        $sql = $conn->prepare("UPDATE live SET vac_title=:vac_title,vac_sub_title=:vac_sub_title,vac_salary=:vac_salary,vac_closing_date=:vac_closing_date,vac_description=:vac_description,application_form=:application_form,live=:live,listing_type=:listing_type WHERE id=:id");
      } elseif (file_exists($_FILES['recruitment']['tmp_name'])) {
        $my_space->uploadFile( $_FILES['recruitment']["tmp_name"], $school.'/'.$_FILES['recruitment']['name']);
        $update_data = [
          'vac_title' => $_POST['post_title'],
          'vac_sub_title' => $_POST['subtitle'],
          'vac_salary' => $_POST['salary'],
          'vac_closing_date' => $_POST['closing'],
          'vac_description' => stripslashes( wpautop( $_POST['jobdesc'] ) ),
          'live' => 1,
          'id' => $_POST['updateid'],
          'recruitment_pack' => $_FILES['recruitment']['name'],
          'listing_type' => $_POST['listing_type']
        ];
        $sql = $conn->prepare("UPDATE live SET vac_title=:vac_title,vac_sub_title=:vac_sub_title,vac_salary=:vac_salary,vac_closing_date=:vac_closing_date,vac_description=:vac_description,recruitment_pack=:recruitment_pack,live=:live,listing_type=:listing_type WHERE id=:id");
      } elseif (file_exists($_FILES['recruitment']['tmp_name']) && file_exists($_FILES['application']['tmp_name']))  {
        $update_data = [
          'vac_title' => $_POST['post_title'],
          'vac_sub_title' => $_POST['subtitle'],
          'vac_salary' => $_POST['salary'],
          'vac_closing_date' => $_POST['closing'],
          'vac_description' => stripslashes( wpautop( $_POST['jobdesc'] ) ),
          'live' => 1,
          'id' => $_POST['updateid'],
          'application_form' => $_FILES['application']['name'],
          'recruitment_pack' => $_FILES['recruitment']['name'],
          'listing_type' => $_POST['listing_type']
        ];
        $sql = $conn->prepare("UPDATE live SET vac_title=:vac_title,vac_sub_title=:vac_sub_title,vac_salary=:vac_salary,vac_closing_date=:vac_closing_date,vac_description=:vac_description,application_form=:application_form,recruitment_pack=:recruitment_pack,live=:live,listing_type=:listing_type WHERE id=:id");
      } else {
        $update_data = [
          'vac_title' => $_POST['post_title'],
          'vac_sub_title' => $_POST['subtitle'],
          'vac_salary' => $_POST['salary'],
          'vac_closing_date' => $_POST['closing'],
          'vac_description' => stripslashes( wpautop( $_POST['jobdesc'] ) ),
          'live' => 1,
          'id' => $_POST['updateid'],
          'listing_type' => $_POST['listing_type']
        ];
        $sql = $conn->prepare("UPDATE live SET vac_title=:vac_title,vac_sub_title=:vac_sub_title,vac_salary=:vac_salary,vac_closing_date=:vac_closing_date,vac_description=:vac_description,live=:live,listing_type=:listing_type WHERE id=:id");
      }
        $sql->execute($update_data);  
        $update_id = $_POST['updateid'];
      } catch(PDOException $e) {
        echo $sql . "<br>" . 'update' . $e->getMessage();
      }

    endif; 

endif; 

 //if updating or just added then get the values to display in the input fields incase of updates
 if (isset($update_id)) : 
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", VAC_DB_USER, VAC_DB_PASSWORD);
    $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("SELECT * FROM live WHERE id=:id");
    $sql->execute([
      'id' => $update_id,
    ]);  
    $vacancy = $sql->fetch();
  } catch(PDOException $e) {
    echo $sql . "<br>" . 'update' . $e->getMessage();
  }
endif;

if (isset($_GET['downloadapplication'])){
  $my_space->downloadFile( $school.'/'.$vacancy['application_form'],'../application/'.$vacancy['application_form']); 
  $downloadurl = '../application/'.$vacancy['application_form'];
  echo "<script>location.href='$downloadurl'</script>";
  die;
}
if (isset($_GET['downloadrecruitmentpack'])){
  $my_space->downloadFile( $school.'/'.$vacancy['recruitment_pack'],'../application/'.$vacancy['recruitment_pack']); 
  $downloadurl = '../application/'.$vacancy['recruitment_pack'];
  echo "<script>location.href='$downloadurl'</script>";
  die;
}

?>

<?php
//move to trash
if ( isset($_GET['action']) && $_GET['action']=='trash' ) :
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", VAC_DB_USER, VAC_DB_PASSWORD);
    $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("INSERT INTO trash SELECT * FROM live WHERE id=:id" );
    $sql->execute([
      'id' => $_GET['id'],
    ]); 
    $sql = $conn->prepare("DELETE FROM live WHERE id=:id" );
    $sql->execute([
      'id' => $_GET['id'],
    ]); 
  } catch(PDOException $e) {
    echo $sql . "<br>" . 'update' . $e->getMessage();
  }
endif;

//move from trash to restore
if ( isset($_GET['action']) && $_GET['action']=='restore' ) :
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", VAC_DB_USER, VAC_DB_PASSWORD);
    $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("INSERT INTO live SELECT * FROM trash WHERE id=:id" );
    $sql->execute([
      'id' => $_GET['id'],
    ]); 
    $sql = $conn->prepare("DELETE FROM trash WHERE id=:id" );
    $sql->execute([
      'id' => $_GET['id'],
    ]); 
    
  } catch(PDOException $e) {
    echo $sql . "<br>" . 'update' . $e->getMessage();
  }
endif;

//delete from trash
if ( isset($_GET['action']) && $_GET['action']=='permdelete' ) :
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", VAC_DB_USER, VAC_DB_PASSWORD);
    $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("DELETE FROM trash WHERE id=:id" );
    $sql->execute([
      'id' => $_GET['id'],
    ]); 
    
  } catch(PDOException $e) {
    echo $sql . "<br>" . 'update' . $e->getMessage();
  }
endif;

?>

<div class="wrap">
<?php if (isset($_GET['added'])) : ?>
<div id="message" class="updated notice notice-success"><p>Vacancy added/updated.</p></div>
<?php endif; ?>

<h1 class="wp-heading-inline">Vacancies</h1>
<a href="?page=vacancyadmin&action=addvacancy" class="page-title-action">Add New</a>

<?php 
//Add Vacancy
if ( isset($_GET['action']) && $_GET['action']=='addvacancy'||  isset($_GET['action']) && $_GET['action']=='update' ) :

if (isset($_GET['action']) && $_GET['action']=='addvacancy'){
  $action = 'addvacancy';
  unset($vacancy);
} else {
  $action = 'update';
}  

?>


<form name='vacancy' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?page=vacancyadmin&action=<?php echo $action; ?>" method="post" enctype="multipart/form-data">
<div id="poststuff">
  <div id="post-body" class="metabox-holder columns-2">

    <div id="post-body-content">

      <div id="titlediv">
        <div id="titlewrap">
          <input type="text" name="post_title" required size="30" value="<?php if(isset($vacancy)){echo $vacancy['vac_title'];} ?>" id="title" spellcheck="true" autocomplete="off" placeholder="Vacancy Title">
        </div>
      </div>

      <?php 
      //get vacancy page
      if(isset($vacancy['listing_type'])) :
        if($vacancy['listing_type'] == 'sports_center' ) :
        $pages = get_pages( array(
          'post_type' => 'page',
          'meta_key' => '_wp_page_template',
          'meta_value' => 'page-templates/vacancies.php',
          'hierarchical' => 0,
          'child_of' => get_field('sports_homepage','option'),
        ) );
        endif;
        if($vacancy['listing_type'] == 'adult_learning' ) :
          $pages = get_pages( array(
            'post_type' => 'page',
            'meta_key' => '_wp_page_template',
            'meta_value' => 'page-templates/vacancies.php',
            'hierarchical' => 0,
            'child_of' => get_field('adult_learning_homepage','option'),
          ) );
          endif;
          if($vacancy['listing_type'] == 'school' ) :
            $pages = get_pages( array(
              'post_type' => 'page',
              'meta_key' => '_wp_page_template',
              'meta_value' => 'page-templates/vacancies.php',
              'hierarchical' => 0,
              'exclude_tree' => array(get_field('adult_learning_homepage','option'),get_field('sports_homepage','option')),
            ) );
            endif;
            if (empty($pages)) {
              $pages = get_pages( array(
                'post_type' => 'page',
                'meta_key' => '_wp_page_template',
                'meta_value' => 'page-templates/vacancies.php',
                'hierarchical' => 0,
              ) );
            }
        foreach ($pages as $page){
          $vacancies_url = get_permalink($page->ID);
        }


      endif;
      ?>

      <div id="acf_after_title-sortables" >

      <p><a href="<?php if($vacancy){echo $vacancies_url.'#vacancy_'.$vacancy['id'];} ?>" target="_blank"><?php if(isset($vacancy)){echo $vacancies_url.'#vacancy_'.$vacancy['id'];} ?></a></p>

        <div id="vacancy_fields" class="postbox acf-postbox">

          <div class="acf-field" style="width:40%" >
            <h2>Sub-Title</h2>
            <input type="text" name="subtitle" required value="<?php if(isset($vacancy)){echo $vacancy['vac_sub_title'];} ?>">
          </div>

          <div class="acf-field">
            <h2>Salary</h2>
            <input type="text" name="salary" required value="<?php if(isset($vacancy)){echo $vacancy['vac_salary'];} ?>" >
          </div>

          <div class="acf-field">
            <h2>Closing Date</h2>
            <input type="datetime-local" name="closing" required value="<?php if(isset($vacancy)){echo $vacancy['vac_closing_date'];} ?>" >
          </div>

          <div class="acf-field" >
            <h2>Listing Type</h2>
            <?php 
             $user = wp_get_current_user();
             $roles = ( array ) $user->roles;
             if (in_array('sports_manager',$roles) ) :
             ?>
              <select name="listing_type">
                <?php if (get_field('activate_sport_centre','option')) : ?>
                  <option value="sports_center" <?php if(isset($vacancy) && $vacancy['listing_type'] == "sports_center"){echo 'selected';} ?>>Sports Center Listing</option>
                <?php endif; ?>
              </select>
            <?php elseif (in_array('adult_ed_manager',$roles) ) :  ?>
              <select name="listing_type">
              <?php if (get_field('activate_adult_learning','option')) : ?>
                  <option value="adult_learning" <?php if(isset($vacancy) && $vacancy['listing_type'] == "adult_learning"){echo 'selected';} ?>>Adult Learning Listing</option>
                <?php endif; ?>
              </select>
              <?php else : ?>
              <select name="listing_type">
                <option value="school" <?php if(isset($vacancy) && $vacancy['listing_type'] == "school"){echo 'selected';} ?>>School Listing</option>
                <?php if (get_field('activate_adult_learning','option')) : ?>
                  <option value="adult_learning" <?php if(isset($vacancy) && $vacancy['listing_type'] == "adult_learning"){echo 'selected';} ?>>Adult Learning Listing</option>
                <?php endif; ?>
                <?php if (get_field('activate_sport_centre','option')) : ?>
                  <option value="sports_center" <?php if(isset($vacancy) && $vacancy['listing_type'] == "sports_center"){echo 'selected';} ?>>Sports Center Listing</option>
                <?php endif; ?>
              </select>
            <?php endif; ?>
          </div>

          <div class="acf-field" style="width:100%">
           <h2>Job Description</h2>

           <?php if(isset($vacancy)){$jobdesc = $vacancy['vac_description'];} ?>
              <?php wp_editor(
                $jobdesc,
                'jobdesc',
                array(
                  'media_buttons' => true,
                  'textarea_rows' => 40,
                  'tabindex' => 4,
                  'tinymce' => array(
                    'theme_advanced_buttons1' => 'bold, italic, ul, pH, temp',
                  ),
                )
            );?>
          </div>

          <div class="acf-field">             
            <h2>Application Form</h2>
          <?php 
             if(isset($vacancy)){
              echo '<a href="'.$_SERVER['REQUEST_URI'].'&downloadapplication" target="_blank">'.$vacancy['application_form'].'</a>';
             }
             ?>
             <h4>Upload Application Form</h4>
             <input type="file" id="application" name="application" >
             
          </div>
          <div class="acf-field">             
            <h2>Recruitment Pack</h2>
          <?php 
             if(isset($vacancy)){
              echo '<a href="'.$_SERVER['REQUEST_URI'].'&downloadrecruitmentpack" target="_blank">'.$vacancy['recruitment_pack'].'</a>';
             }
             ?>
             <h4>Upload Recruitment Pack</h4>
             <input type="file" id="recruitment" name="recruitment" >
             
          </div>

        </div>    
      </div> 
    </div> 
    
    <div id="postbox-container-1" class="postbox-container">
      <div id="submitdiv" class="postbox "><div class="submitbox" id="submitpost">

        <div id="minor-publishing">

          <div id="minor-publishing-actions">
            <div id="save-action">
                <input type="submit" name="save" id="save-post" value="Save Draft" class="button">
            </div>
            <div class="clear"></div>
          </div>

          <div id="misc-publishing-actions">
            <div class="clear"></div>
          </div>

          <div id="major-publishing-actions">
            <div id="delete-action">
              <a href="?page=vacancyadmin&action=trash&id=<?php echo $vacancy['id']; ?>">Move to Trash</a>
            </div>

            <div id="publishing-action">
              <?php if (isset($update_id)) : ?>
                <input type="hidden" value="<?php echo $update_id ?>" name="updateid">
                <input type="submit" name="update" id="update" class="button button-primary button-large" value="Update">
              <?php else : ?>
              <input type="submit" name="publish" id="publish" class="button button-primary button-large" value="Publish">
              <?php endif; ?>
            </div>
            <div class="clear"></div>

          </div>
         
        </div>
      
      </div></div>



</form>
<?php
else : //Not updating or adding so show list of vanancies and get trash 

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", VAC_DB_USER, VAC_DB_PASSWORD);
    $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("SELECT * FROM live WHERE school=:school");
    $sql->execute([
      'school' => $school,
    ]);  

    $vacancies = $sql->fetchAll();
  } catch(PDOException $e) {
    echo $sql . "<br>" . 'update' . $e->getMessage();
  }
  //get trash
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", VAC_DB_USER, VAC_DB_PASSWORD);
    $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("SELECT * FROM trash WHERE school=:school");
    $sql->execute([
      'school' => $school,
    ]);  

    $vacancies_trashed = $sql->fetchAll();
  } catch(PDOException $e) {
    echo $sql . "<br>" . 'update' . $e->getMessage();
  }
?>


<table class="wp-list-table widefat fixed striped table-view-list posts" style="margin-top:50px">
	<thead>
    <td>Vacancy Title</td>
    <td>Vacancy Sub-Title</td>
    <td>Status</td>
    <td>Edit</td>
    <td>Move to Trash</td>
	</thead>

	<tbody id="the-list">

  <?php
  $i=0;
   foreach ($vacancies as $vacancy){
     $i++;

     $user = wp_get_current_user();
     $roles = ( array ) $user->roles;
     if (in_array('sports_manager',$roles) ) :
      if ($vacancy['listing_type'] !== 'sports_center'){continue;}
     endif;
     if (in_array('adult_ed_manager',$roles) ) :
      if ($vacancy['listing_type'] !== 'adult_learning'){continue;}
     endif;
     

     if ($vacancy['live']){
       $status = 'Published';
     } else {
      $status = 'Draft';
    }
    $date = new DateTime($vacancy['vac_closing_date']);
    $now = new DateTime();

    if($date < $now) {
      $status = '<strong>Passed closing date</strong>';
    }
   
      echo '<tr><td><a href="?page=vacancyadmin&action=update&updateid='.$vacancy['id'].'">'.$vacancy['vac_title'].'</a></td>';
      echo '<td>'.$vacancy['vac_sub_title'].'</td>';
      echo '<td>'.$status.'</td>';
      echo '<td><a href="?page=vacancyadmin&action=update&updateid='.$vacancy['id'].'">Edit</a></td>';
      echo '<td><a href="?page=vacancyadmin&action=trash&id='.$vacancy['id'].'">Move to Trash</a></td>';
   } 
   if ($i==0){
     echo '<p><strong>There are currently no Vacancies</strong></p>';
   }
  ?>
  </tbody>

</table>

<h2 style="margin-top:50px">Trash</h2>
<table class="wp-list-table widefat fixed striped table-view-list posts">
	<thead>
    <td>Vacancy Title</td>
    <td>Vacancy Sub-Title</td>
    <td>Status</td>
    <td>Edit</td>
    <td>Restore / Delete</td>
	</thead>

	<tbody id="the-list">

  <?php
  $i=0;
   foreach ($vacancies_trashed as $vacancy){
     $i++;
     if ($vacancy['live']){
       $status = 'Published';
     } else {
      $status = 'Draft';
    }
      echo '<tr><td><a href="?page=vacancyadmin&action=update&updateid='.$vacancy['id'].'">'.$vacancy['vac_title'].'</a></td>';
      echo '<td>'.$vacancy['vac_sub_title'].'</td>';
      echo '<td>'.$status.'</td>';
      echo '<td><a href="?page=vacancyadmin&action=update&updateid='.$vacancy['id'].'">Edit</a></td>';
      echo '<td><a href="?page=vacancyadmin&action=restore&id='.$vacancy['id'].'">Restore</a> | <a style="color:red" href="?page=vacancyadmin&action=permdelete&id='.$vacancy['id'].'">Permanently Delete</a></td>';
   } 
   if ($i==0){
     echo '<p><strong>There are currently no Vacancies in trash</strong></p>';
   }
  ?>
  </tbody>

</table>

<?php endif; ?>

</div>