<?php get_header(); ?>
<h1>Single.php</h1>
<?php

    while(have_posts()) {
        the_post();

    ?>

    <h2><?php the_title(); ?></h2>
    Autor: <?php the_author(); ?>
    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>"/>
    <?php the_content();
    comment_form();
    }

?>

<?php get_footer();
