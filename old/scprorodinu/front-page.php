<?php get_header(); ?>

<!-- carousel -->
<header class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="6000">
        <div class="carousel-inner">
            <?php
            $gallery_images = CFS()->get('images');
            $num = 0;
            foreach ($gallery_images as $image) {
            ?>

            <div class="carousel-item<?php echo (!$num)?' active':''; ?>">
                <div class="carousel-caption d-none d-md-block">
                    <h1><?php echo $image["heading"]; ?></h1>
                    <p><?php echo $image["text"]; ?></p>
                </div>
                <img class="d-block w-100" src="<?php echo $image["image"]; ?>" alt="<?php echo $image["heading"]; ?>">
            </div>

            <?php
                $num++;
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>


<!-- about us -->

<section class="container" id="about">
    <?php
    while (have_posts()) {
        the_post();
    ?>
    <div class="d-flex row align-items-center justify-content-around">
        <div class="col-12">
            <h2><?php the_title(); ?></h2>
        </div>
        <div class="col-12 col-lg-6 order-lg-2">
    <?php
        the_content();
    } ?>
        </div>
        <div class="col-12 col-lg-6 oder-lg-1">
            <?php if(has_post_thumbnail()) { ?>
            <img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="O nás">
            <?php } else { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/bumfest6.jpg" class="img-fluid" alt="O nás">
            <?php } ?>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <a class="btn btn-primary m-auto" href="/nase-aktivity" >Naše aktivity</a> <a class="btn btn-primary m-auto" href="/nase-sluzby" >Naše služby</a>
    </div>
</section>


<!-- posts -->

<section id="posts" class="container">
    <div class="row">
        <div class="col-12">
            <h2>Novinky</h2>
        </div>
    <?php

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
    );

    $blogposts = new WP_Query($args);

    while ($blogposts->have_posts()) {
        $blogposts->the_post();
    ?>

        <div class="col-12">
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
        </div>

    <?php
    }
    ?>

    <div class="d-flex justify-content-center">
        <a class="btn btn-primary m-auto" href="/prispevky" >Zobrazit všechny příspěvky</a>
    </div>
    </div>
</section>

<?php get_footer(); ?>
