<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 *  @package Anglian_Learning
 */

get_header();
$dbname = VAC_DB_NAME;
$servername = VAC_DB_SERVER;
?>

<div class="container newsevents">
		<?php if ( $_GET['s']!=='') : ?>
		<div class="row row-flex">	
			<?php
			try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", VAC_DB_USER, VAC_DB_PASSWORD);
				$conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, PDO::ERRMODE_EXCEPTION);
				$sql = $conn->prepare("SELECT * FROM live WHERE vac_title LIKE :term OR vac_description LIKE :term AND school=:school AND live=1");
				$term = filter_var($_GET['s'], FILTER_SANITIZE_STRING);
				$sql->execute([
					'term' => '%'.$term.'%',
					'school' => get_field('school_id','option'),
				]);  
				$vacancy_results = $sql->fetchAll();
			} catch(PDOException $e) {
				echo $sql . "<br>" . 'update' . $e->getMessage();
			}
			if($vacancy_results) {
				foreach ($vacancy_results as $vacancy) {
					//If passed skip
					$date = new DateTime($vacancy['vac_closing_date']);
					$now = new DateTime();
					if($date < $now) {continue;}
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
					<div class="col-12 col-md-4 newseventcontainer">
					<span class="vacancy_tag">VACANCY</span>
					<div class="col-12 newseventimage">
						<a href="<?php if($vacancy){echo $vacancies_url.'#vacancy_'.$vacancy['id'];} ?>" target="_blank">
							<div class="newseventimagecontainer" style="background-image:url(<?php echo get_field('logo_and_icons','option')['default_header_image']; ?>);">
							</div>
						</a>
					</div>
					<div class="col-12 newseventtext">
						<h4><a href="<?php if($vacancy){echo $vacancies_url.'#vacancy_'.$vacancy['id'];} ?>"><?php echo $vacancy['vac_title']; ?></a></h4>
						<p><?php echo implode(' ', array_slice(explode(' ', $vacancy['vac_description']), 0, 20));  ?>...</p>
						<a class="readmore" href="<?php if($vacancy){echo $vacancies_url.'#vacancy_'.$vacancy['id'];} ?>">READ MORE</a>
					</div>
				</div>
			<?php
				} 
			} 
			/* Start the Loop */
			while ( have_posts() ) : the_post() ?>

			<div class="col-12 col-md-4 newseventcontainer">
				<div class="col-12 newseventimage">
					<?php
					$imageurl = get_the_post_thumbnail_url();
					if (!$imageurl) {
						$imageurl = get_field('logo_and_icons','option')['default_header_image'];
					}
					?>
					<a href="<?php the_permalink(); ?>">
						<div class="newseventimagecontainer" style="background-image:url(<?php echo $imageurl; ?>);"></div>
					</a>
				</div>
				<div class="col-12 newseventtext">
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<?php the_excerpt(); ?>
					<a class="readmore" href="<?php the_permalink(); ?>">READ MORE</a>
				</div>
			</div>

			<?php endwhile;	?>
			</div>
		</div>
	
		<div class="row">
			<?php
			else :
				echo '<div class="col-6 mx-auto mb-5 pb-5"><h4 align="center" class="my-5 pt-5">Sorry! There are no results for that search term. Please try again.</h4>'.get_search_form(false).'</div>';
			endif;
			?>
		</div>


<?php
get_footer();
