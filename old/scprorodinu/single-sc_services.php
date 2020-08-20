<?php get_header(); ?>

<?php
while (have_posts()) {
    the_post();
?>

<!-- header -->
<header class="container">
    <div class="heading-text">
        <h1><?php the_title(); ?></h1>
    </div>
    <?php
        if (has_post_thumbnail()) {
    ?>
        <div class="heading-service" style="background: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>') no-repeat left;"></div>
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
