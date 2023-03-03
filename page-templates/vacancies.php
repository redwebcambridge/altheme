<?php
/*
Template Name: Vacancies
*/

get_header(); ?>


<div class="container">
    <div class="row">

    <div class="col-12 ">
        <?php echo the_content(); ?>
    </div>
    <div class="col-12 mb-5">
        <!-- BEGIN MYNEWTERM API HTML: PLACE INSIDE PAGE BODY WHERE YOU WANT VACANCIES TO DISPLAY. PLEASE DO NOT CHANGE DIV ID (id="mnt-parent-container") !!! -->
        <div class="mt-5" id="mnt-parent-container" style="width: 96.7%; margin: 0 auto; background-color: transparent;"></div>
        <!-- END MYNEWTERM API HTML -->
    </div>

    <?php get_template_part('template-parts/downloads'); ?>


    </div>
</div>




<?php get_footer(); ?>
