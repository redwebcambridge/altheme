<?php
/*
Template Name: Vacancies
*/

get_header(); ?>


<div class="container">
    <div class="row">

    <div class="col-12 ">
        <h2 class="heading-two"><?php the_field('sub_heading'); ?></h2>
        <div class="gradline"></div>
        <p class="body-text"><?php the_field('body_text'); ?></p>

        <?php //echo the_content(); ?>
    </div>
    <div class="col-12">
        <h2 class="heading-two mt-5">Current Vacancies</h2>
        <div class="gradline mb-5"></div>   
    </div>
    <div class="col-12 mb-5">
        <!-- BEGIN MYNEWTERM API HTML: PLACE INSIDE PAGE BODY WHERE YOU WANT VACANCIES TO DISPLAY. PLEASE DO NOT CHANGE DIV ID (id="mnt-parent-container") !!! -->
        <div id="mnt-parent-container" style="width: 96.7%; margin: 0 auto; background-color: transparent;"></div>
        <!-- END MYNEWTERM API HTML -->
    </div>

    <?php get_template_part('template-parts/downloads'); ?>


    </div>
</div>


<!-- BEGIN MYNEWTERM API SCRIPT: PLACE BEFORE CLOSING BODY TAG. PLEASE DO NOT ALTER THIS CODE!!! -->
<script>
    var mntInitCounter = 0, mntApiScript = document.createElement("script");
    mntApiScript.type = "text/javascript";
    mntApiScript.src = "<?php echo SCRIPT_URL; ?>" + (new Date().getTime());
    document.body.appendChild(mntApiScript);

    window.onload = function () {
    if(document.readyState == 'complete' && mntInitCounter === 0) {
        mntInitCounter = 1;
        mntSchoolVacancies('<?php echo MNT_API_KEY; ?>', 1);
    }
    };
</script>
<!-- END MYNEWTERM API SCRIPT -->




<?php get_footer(); ?>
