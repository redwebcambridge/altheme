<?php if( have_rows('download') ): ?>
	<div class="row">
		<div class="col-12 downloadtitlecontainer">
			<h2 class="downloadstitle">Downloads</h2>
			<div class="gradline"></div>
		</div>
        <div class="col-12 col-md-4">


            <?php while( have_rows('download') ): the_row(); ?>

                <?php if(get_sub_field('url')) { ?>
                    <a href="<?php the_sub_field('url'); ?>">
                        <div class="downloadcontainer">
                            <p><?php the_sub_field('download_title'); ?></p>
                        </div>
                    </a>
                <?php } else { ?>
                    <a href="<?php the_sub_field('file_upload'); ?>">
                        <div class="downloadcontainer">
                            <p><i class="fas fa-download"></i></span><?php the_sub_field('download_title'); ?></p>
                        </div>
                    </a>
                <?php } ?>

            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>
