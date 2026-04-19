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

<section style="max-width:800px;margin:40px auto;padding:20px;">

    <h1>Create Event</h1>

    <?php
    acf_form([
        'post_id' => 'new_post',
        'new_post' => [
            'post_type' => 'event',
            'post_status' => 'publish'
        ],
        'post_title' => true,
        'field_groups' => [13],
        'submit_value' => 'Create Event',
        'updated_message' => 'Event created successfully!',
        'return' => '/events'
    ]);
    ?>

</section>

<?php get_footer(); ?>