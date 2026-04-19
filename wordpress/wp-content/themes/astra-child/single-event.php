<?php get_header(); ?>

<section style="max-width:800px;margin:40px auto;padding:20px;">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <h1><?php the_title(); ?></h1>

    <div style="margin-top:20px;">
        <?php echo get_field('event_body'); ?>
    </div>

    <hr>

    <p><strong>Start Date:</strong> <?php echo get_field('start_date'); ?></p>

    <p><strong>End Date:</strong> <?php echo get_field('end_date'); ?></p>

<?php endwhile; endif; ?>

</section>

<?php get_footer(); ?>