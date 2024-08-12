<?php
/*
Template Name: Central Team Page
*/
get_header(); ?>


<div class="container central-team-page">
    <div class="row">
        <div class="col-md-3 text-section">
            <?php get_template_part('template-parts/sidebar-menu'); ?>
        </div>
        <div class="col-md-9 text-section">
            <?php if ( get_field('organogram') ) : ?>
                <div class="container px-0">
                    <div class="row py-3">
                        <div class="col-12">
                            <img src="<?php echo get_field('organogram')['url']; ?>" alt="Anglian Learning Organogram" class="img-fluid" />
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            
            <div class="container central-team-tabs-nav">
                <div class="row ">
                    <div class="tab_button btn ml-3 col-xl-4 col-md-5 col-6 active executive_btn">CENTRAL LEADERSHIP TEAM </div>
                    <div class="tab_button btn ml-3 col-xl-4 col-md-5 col-6 departments_btn">DEPARTMENTS</div>
                </div>
            </div>

            <div class="executive_team">    
                <div class="tabcontent mt-3">
                    <div class="central_team_row_1 central_team_row row">
                        <?php if( have_rows('ct_row_1') ): ?>
                            <?php while( have_rows('ct_row_1') ): the_row(); ?>
                                    <?php if( have_rows('row_1_members') ): ?>
                                        <?php while( have_rows('row_1_members') ): the_row(); ?>


                                        <?php if(empty(get_sub_field('memeber_images'))) {
                                            $image = get_stylesheet_directory_uri() . '/img/team_placeholder.png';
                                        } else {
                                            $image = get_sub_field('memeber_images')['sizes']['medium'];
                                        } ?>
                                        <div class="col-xl-4 col-md-6 mb-3">
                                            <div class="executive_team_block row">
                                                <div class="col-4 executive_team_image_cont">
                                                    <div class="executive_team_image" style="background-image:url('<?php echo $image; ?>')">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-8 executive_content_cont">
                                                    <h5><?php the_sub_field('members_name'); ?></h5>
                                                    <h6><?php the_sub_field('title'); ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div> 
                </div><!-- .tabcontent -->
                <hr class="my-2">
                <div class="tabcontent mt-4">
                    <div class="central_team_row_2 central_team_row row">
                        <?php if( have_rows('ct_row_2') ): ?>
                            <?php while( have_rows('ct_row_2') ): the_row(); ?>
                                    <?php if( have_rows('row_2_members') ): ?>
                                        <?php while( have_rows('row_2_members') ): the_row(); ?>
                                        <?php if(empty(get_sub_field('memeber_images'))) {
                                            $image = get_stylesheet_directory_uri() . '/img/team_placeholder.png';
                                        } else {
                                            $image = get_sub_field('memeber_images')['sizes']['medium'];
                                        } ?>
                                        <div class="col-xl-4 col-md-6 mb-3">
                                            <div class="executive_team_block row">
                                                <div class="col-4 executive_team_image_cont">
                                                    <div class="executive_team_image" style="background-image:url('<?php echo $image; ?>')">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-8 executive_content_cont">
                                                    <h5><?php the_sub_field('members_name'); ?></h5>
                                                    <h6><?php the_sub_field('title'); ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div> 
                </div><!-- .tabcontent -->
                <hr class="my-2">
                <div class="tabcontent mt-4">
                    <div class="central_team_row_3 central_team_row row">
                        <?php if( have_rows('ct_row_3') ): ?>
                            <?php while( have_rows('ct_row_3') ): the_row(); ?>
                                    <?php if( have_rows('row_3_members') ): ?>
                                        <?php while( have_rows('row_3_members') ): the_row(); ?>
                                        <?php if(empty(get_sub_field('memeber_images'))) {
                                            $image = get_stylesheet_directory_uri() . '/img/team_placeholder.png';
                                        } else {
                                            $image = get_sub_field('memeber_images')['sizes']['medium'];
                                        } ?>
                                        <div class="col-xl-4 col-md-6 mb-3">
                                            <div class="executive_team_block row">
                                                <div class="col-4 executive_team_image_cont">
                                                    <div class="executive_team_image" style="background-image:url('<?php echo $image; ?>')">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-8 executive_content_cont">
                                                    <h5><?php the_sub_field('members_name'); ?></h5>
                                                    <h6><?php the_sub_field('title'); ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div> 
                </div><!-- .tabcontent -->
                <hr class="my-2">
                <div class="tabcontent mt-4">
                    <div class="central_team_row_4 central_team_row row">
                        <?php if( have_rows('ct_row_4') ): ?>
                            <?php while( have_rows('ct_row_4') ): the_row(); ?>
                                    <?php if( have_rows('row_4_members') ): ?>
                                        <?php while( have_rows('row_4_members') ): the_row(); ?>
                                        <?php if(empty(get_sub_field('memeber_images'))) {
                                            $image = get_stylesheet_directory_uri() . '/img/team_placeholder.png';
                                        } else {
                                            $image = get_sub_field('memeber_images')['sizes']['medium'];
                                        } ?>
                                        <div class="col-xl-4 col-md-6 mb-3">
                                            <div class="executive_team_block row">
                                                <div class="col-4 executive_team_image_cont">
                                                    <div class="executive_team_image" style="background-image:url('<?php echo $image; ?>')">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-8 executive_content_cont">
                                                    <h5><?php the_sub_field('members_name'); ?></h5>
                                                    <h6><?php the_sub_field('title'); ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div> 
                </div><!-- .tabcontent -->
            </div>
            <div class="department_team  mt-5">
                <?php
                if( have_rows('team_departments') ):
                    while( have_rows('team_departments') ) : the_row();?>
                        <div class=" grid mb-3">
                            <div class="department_block ">
                            <h5><?php echo get_sub_field('departments_name'); ?></h5>
                            <?php
                            if( have_rows('department_repeater') ):
                                while( have_rows('department_repeater') ) : the_row();?>

                                    <div class="depatments_members ">
                                        <div class="central_team_name"><?php echo get_sub_field('name') ?></div>
                                        <div class="job_role"><?php echo get_sub_field('role') ?></div>
                                    </div>


                                <?php
                                endwhile;
                            endif;       
                            ?>
                            </div>
                        </div>
                    <?php
                    endwhile;
                endif;       
                ?>
            </div>
            







        <!---Body section centre--->
        <!-- <div class="col-md-12">
        <h2 class="heading-two"><?php //the_field('sub_heading') ?></h2>
        <div class="gradline"></div>
        </div> -->

        <!-- <div class="row">
            <div class="col-md-9 text-section">
                <p class="body-text"><?php //the_field('body_text') ?></p>
            </div>
        </div> -->

        </div>
    </div>
    <?php get_template_part('template-parts/downloads'); ?>
</div>





<?php get_footer(); ?>
