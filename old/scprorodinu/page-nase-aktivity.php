<?php get_header(); ?>

<!-- carousel -->
<header class="container">
    <div class="heading-text">
        <h1><?php single_post_title(); ?></h1>
    </div>
    <div class="heading" style="background: url('<?php echo get_template_directory_uri(); ?>/img/bumfest1.jpg') no-repeat center;">
    </div>
</header>

<!-- section -->
<section class="container">

<?php
    while (have_posts()) {
        the_post();
        the_content();
    }
?>

    <div class="row">
    <?php
    $args = array(
            'post_type' => 'sc_activity'
    );

    $activity = new WP_Query($args);
    while ($activity->have_posts()) {
        $activity->the_post();
    ?>

        <div class="activity col-12 col-md-6 col-lg-4 col-xl-3">
            <?php
            if (has_post_thumbnail()) {
            ?>
            <a style="background: url('<?php echo the_post_thumbnail_url(get_the_ID()); ?>') no-repeat center center; background-size: cover;" href="<?php the_permalink(); ?>">
            </a>
            <?php
            }
            ?>
            <h4><?php the_title(); ?></h4>
            <?php the_excerpt(); ?>
            <a class="btn-secondary btn" href="<?php the_permalink(); ?>">Zobrazit více</a>
        </div>

    <?php
    }
    ?>
    </div>
</section>

<?php get_footer();
