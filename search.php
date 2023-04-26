<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 *  @package Anglian_Learning
 */

get_header();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_status' => 'publish',
    's' => get_search_query(),
    'paged' => $paged
);
$query = new WP_Query($args);
?>

<div class="container newsevents">

    <?php if ($query->have_posts()) : ?>
        <div class="row row-flex">  
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php 
                //IF SEARCH COME FROM ACADEMY PAGE
                if ($_GET['site_section'] == 'academy') {
                    if (is_adult_ed_page() || is_sports_page()) {
                        continue;
                    } 
                }
                //IF SEARCH COME FROM SPORTS PAGE
                if ($_GET['site_section'] == 'sports') {
                    if (!is_sports_page()) {
                        continue;
                    } 
                }
                //IF SEARCH COME FROM ADULT ED PAGE
                if ($_GET['site_section'] == 'adult_ed') {
                    if (!is_adult_ed_page()) {
                        continue;
                    } 
                }
                ?>
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
            <?php endwhile; ?>
        </div>
        
        <div class="row">
            <div class="pagination col-12">
                <?php echo paginate_links( array(
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $query->max_num_pages
                )); ?>
            </div>
        </div>

    <?php else : ?>
        <div class="row">
            <?php echo '<div class="col-6 mx-auto mb-5 pb-5"><h4 align="center" class="my-5 pt-5">Sorry! There are no results for that search term. Please try again.</h4>'.get_search_form(false).'</div>'; ?>
        </div>
    <?php endif; ?>

</div>

<?php
wp_reset_postdata();
get_footer();
?>


