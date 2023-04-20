<div class="staff-section">
    <?php if (get_sub_field('picture')): ?>
        <div class="thumbnail" style="background-image:url('<?php echo get_sub_field('picture')['sizes']['large']; ?>')"></div>
        <div class="member-block-image-ghost"></div>
    <?php endif; ?>
    <div class="staff-text">
    <h3><?php the_sub_field('name'); ?></h3>
        <p>
            <?php
            if(get_sub_field('role')){echo '<strong>'.get_sub_field('role').'</strong>';}
            if(get_sub_field('department')){echo ', '.get_sub_field('department');}
            if(get_sub_field('form__mentor_group')){echo ', <em>'.get_sub_field('form__mentor_group').'</em>';}
            if(get_sub_field('email')){echo '<br><a class="staff_emailaddress" href="mailto:'.get_sub_field('email').'">'.get_sub_field('email')."</a>";}
            ?>
        </p>
        <?php
        $content = substr(get_sub_field('description'),0,80);
        $content = substr($content,0,strrpos($content,' '));
        $content = preg_replace('/<span[^>]+\>/i', '', $content);
        echo '<div class="desc_short">'.$content."...</div>";
        ?>
        <div class="allcontent"><?php echo get_sub_field('description'); ?></div>
        <?php if (!empty(get_sub_field('description'))) : ?>
            <p class="read-more-button">More</p>
        <?php endif; ?>

    </div>
</div>