<?php get_header(); ?>

<!-- carousel -->
<header class="container">
    <div class="heading-text">
        <h1>Příspěvky</h1>
        <p>Archiv všech zveřejněných příspěvků</p>
    </div>
    <div class="heading" style="background: url('<?php echo get_template_directory_uri(); ?>/img/bumfest3.jpg') no-repeat center;">
    </div>
</header>

<!-- posts -->
<section id="posts" class="container">

<div class="row">
    <?php
    while (have_posts()) {
        the_post();
    ?>

<div class="post row">
    <?php
    if (has_post_thumbnail()) {
    ?>
    <a class="col-12 col-lg-3" style="background: url('<?php echo the_post_thumbnail_url(get_the_ID()); ?>') no-repeat center center; background-size: cover;" href="<?php the_permalink(); ?>">
    </a>
    <?php
    }
    ?>
    <div class="col-12 <?php echo (!has_post_thumbnail())?'col-lg-12':'col-lg-9' ?>">
        <h4><?php the_title(); ?></h4>
        <div class="post-date">
            <?php the_time('j. F Y'); ?>
        </div>
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="btn btn-secondary">Číst více</a>
    </div>
</div>

    <?php
    }
    wp_reset_query();
    ?>
    </div>

    <div class="pagination">
        <?php echo paginate_links() ?>
    </div>
</section>

<?php get_footer(); ?>
