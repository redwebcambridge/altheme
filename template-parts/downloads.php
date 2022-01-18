<?php if( have_rows('download') ): ?>
	<div class="row mb-4">
		<div class="col-12 downloadtitlecontainer">
			<h2 class="downloadstitle">Downloads</h2>
			<div class="gradline"></div>
		</div>
        <div class="col-12 d-flex flex-wrap space-between downloadlist">

            <?php while( have_rows('download') ): the_row(); ?>

                <?php if(get_sub_field('upload_file_or_enter_url')=='Enter URL') { ?>
                    <a href="<?php the_sub_field('url'); ?>" target="_blank" class="col-12 col-md-6 col-lg-4 p-1">
                        <div class="downloadcontainer">
                            <i class="fas fa-link"></i><p><?php the_sub_field('download_title'); ?></p>
                        </div>
                    </a>
                <?php } else { ?>
                    <a href="<?php the_sub_field('file_upload'); ?>" target="_blank" class="col-12 col-md-6 col-lg-4 p-1">
                        <div class="downloadcontainer">
                            <i class="fas fa-download"></i><p><?php the_sub_field('download_title'); ?></p>
                        </div>
                    </a>
                <?php } ?>

            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>
