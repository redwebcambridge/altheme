<?php $adlearning_contact = get_field('adult_learning_contact','option'); ?>
<div class="contact-box row mx-auto">
    <div class="name-position col-md-12 col-lg-4">
        <p><strong><?php echo $adlearning_contact['contact_name']; ?></strong><br>
        <?php echo $adlearning_contact['position']; ?></p>
    </div>
    <div class="d-flex col-md-12 col-lg-8 justify-content-end align-items-center contact-details">
        <p class="email"><a href="mailto:<?php echo $adlearning_contact['email_address']; ?>"><?php echo $adlearning_contact['email_address']; ?></a></p>
        <p class="number"><?php echo $adlearning_contact['telephone_number']; ?></p>
    </div>
</div>
