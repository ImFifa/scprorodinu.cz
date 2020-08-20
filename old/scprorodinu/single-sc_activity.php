<?php get_header(); ?>

<?php
$args = array(
    'post_type' => 'sc_activity'
);

$activity = new WP_Query($args);
while ($activity->have_posts()) {
    $activity->the_post();
?>

<!-- header -->
<header class="container">
    <div class="heading-text">
        <h1><?php the_title(); ?></h1>
    </div>
    <?php
        if (has_post_thumbnail()) {
    ?>
        <div class="heading" style="background: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>') no-repeat center;"></div>
    <?php
    } else {
    ?>
        <div class="heading"></div>
    <?php
    }
    ?>
</header>

<section id="post" class="container">
    <article>
        <?php the_content();
        }
        ?>
    </article>
</section>

<?php get_footer(); ?>
