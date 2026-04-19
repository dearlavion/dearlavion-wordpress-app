<?php
acf_form_head();
/* Template Name: Add Event */

get_header();

//if (!is_user_logged_in()) {
//    echo '<p>Please log in to create an event.</p>';
//    get_footer();
//    return;
//}
//?>

<section class="event-form-wrapper">

    <h1>Create Event</h1>

    <?php
    acf_form([
        'post_id' => 'new_post',
        'new_post' => [
            'post_type' => 'event',
            'post_status' => 'publish'
        ],
        //disable wordpress fields
        //'post_title' => true,
        //'post_content' => true,
        'submit_value' => 'Create Event',
        'form_attributes' => [
            'class' => 'event-acf-form'
        ],
        'return' => '/events'
    ]);
    ?>

</section>

<?php get_footer(); ?>