<?php
/* Template Name: Events List */
get_header();
?>

<section class="event-table-wrapper">

    <h1>Events</h1>

    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $query = new WP_Query([
        'post_type' => 'event',
        'posts_per_page' => 5, // 👈 change per page
        'paged' => $paged,
        'post_status' => 'publish'
    ]);
    ?>

    <?php if ($query->have_posts()) : ?>

        <table class="event-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($query->have_posts()) : $query->the_post(); ?>

                    <?php
                    $start = get_field('start_date');
                    $end   = get_field('end_date');
                    ?>

                    <tr>
                        <td><?php the_title(); ?></td>
                        <td><?php echo $start ?: '-'; ?></td>
                        <td><?php echo $end ?: '-'; ?></td>
                        <td>
                            <a href="<?php the_permalink(); ?>">View</a>
                        </td>
                    </tr>

                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="event-pagination">
            <?php
            echo paginate_links([
                'total' => $query->max_num_pages,
                'current' => $paged,
                'prev_text' => '← Prev',
                'next_text' => 'Next →'
            ]);
            ?>
        </div>

    <?php else: ?>
        <p>No events found.</p>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>

</section>

<?php get_footer(); ?>