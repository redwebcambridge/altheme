<?php
/*
Template Name: Vacancies
*/

get_header(); ?>


<div class="container">
    <div class="row">

    <div class="col-12 ">
        <h2 class="heading-two"><?php echo get_field('sub_heading'); ?></h2>
        <div class="gradline"></div>
        <p class="body-text"><?php echo get_field('body_text'); ?></p>
        <a class="btn text-white" href="https://ce0976li.webitrent.com/ce0976li_webrecruitment/wrd/run/ETREC179GF.open?WVID=612290007I" target="_blank">Click here to view our current vacancies</a>
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
