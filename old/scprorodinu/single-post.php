<?php get_header(); ?>

<?php
while(have_posts()) {
    the_post();
?>

<!-- header -->
<header class="container">
    <div class="heading-text">
        <h1><?php the_title(); ?></h1>
        <p>
    Autor: <?php the_author(); ?>, <?php the_time('j. F Y'); ?></p>
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
            comments_template();
        }
        ?>
    </article>
</section>

<?php get_footer(); ?>
