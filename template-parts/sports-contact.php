<?php $sports_contact = get_field('sports_contact','option'); ?>
<div class="contact-box row mx-0">
    <div class="name-position col-md-4">
        <p><strong><?php echo $sports_contact['contact_name']; ?></strong><br>
        <?php echo $sports_contact['position']; ?></p>
    </div>
    <div class="d-flex col-md-8 justify-content-end align-items-center contact-details">
        <p class="email"><a href="mailto:<?php echo $sports_contact['email_address']; ?>"><?php echo $sports_contact['email_address']; ?></a></p>
        <p class="number"><?php echo $sports_contact['telephone_number']; ?></p>
    </div>
</div>
