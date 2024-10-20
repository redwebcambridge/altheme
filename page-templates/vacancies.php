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
        <a class="btn text-white" href="https://ce0976li.webitrent.com/ce0976li_webrecruitment/wrd/run/ETREC179GF.open?WVID=612290007I" target="_blank">Click here to view current vacancies advertised from 21 October 2024</a>
    </div>

<?php if(get_field('school_id','option') != 'jfa') : ?>

    <div class="col-12">
        <p class="mt-3">For current vacancies advertised prior to 21 October 2024 please see below.</p>

        
    </div>
    <div class="col-12 mb-5">
        <!-- BEGIN MYNEWTERM API HTML: PLACE INSIDE PAGE BODY WHERE YOU WANT VACANCIES TO DISPLAY. PLEASE DO NOT CHANGE DIV ID (id="mnt-parent-container") !!! -->
        <div id="mnt-parent-container" style="width: 96.7%; margin: 0 auto; background-color: transparent;"></div>
        <!-- END MYNEWTERM API HTML -->
    </div>


<?php endif; ?>

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
