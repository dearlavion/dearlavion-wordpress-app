<?php
/* Template Name: Events List */
get_header();
?>

<section style="max-width:800px;margin:40px auto;">

<h1>Events</h1>

<?php
$query = new WP_Query([
    'post_type' => 'event',
    'posts_per_page' => -1
]);

while ($query->have_posts()) : $query->the_post(); ?>

    <div style="margin-bottom:20px;">
        <h2><a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a></h2>
    </div>

<?php endwhile; wp_reset_postdata(); ?>

</section>

<?php get_footer(); ?>