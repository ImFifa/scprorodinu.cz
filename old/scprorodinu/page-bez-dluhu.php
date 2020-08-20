<?php get_header(); ?>

    <!-- carousel -->
    <header class="container">
        <div class="heading-text">
            <h1><?php single_post_title(); ?></h1>
        </div>
        <div class="heading" style="background: url('<?php echo get_template_directory_uri(); ?>/img/bumfest3.jpg') no-repeat center;">
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
    </section>

<?php get_footer();
