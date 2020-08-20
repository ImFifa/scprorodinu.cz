<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body id="page-top">

    <div class="container-fluid page-area">

        <!-- Scroll to top button -->
        <a class="scroll-to-top rounded" href="#page-top" style="display: inline;">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Image and text -->
        <nav class="navbar navbar-expand-xl sticky-top navbar-light">
            <a class="navbar-brand" href="/">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" class="d-inline-block align-top" alt="Sociální centrum pro rodinu">
                <span class="navbar-text">Sociální centrum pro rodinu</span>
            </a>
            <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse right m-auto" id="navbarToggler">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item<?php if (is_front_page()) echo ' active'; ?> navbar-text">
                        <a class="nav-link" href="<?php echo site_url(''); ?>">O nás</a>
                    </li>
                    <li class="nav-item<?php if (is_page('nase-aktivity')) echo ' active'; ?> navbar-text">
                        <a class="nav-link" href="<?php echo site_url('/nase-aktivity'); ?>">Aktivity</a>
                    </li>
                    <li class="nav-item<?php if (is_page('nase-sluzby')) echo ' active'; ?> navbar-text">
                        <a class="nav-link" href="<?php echo site_url('/nase-sluzby'); ?>">Služby</a>
                    </li>
                    <li class="nav-item <?php if (is_page('pestounska-pece') || is_page('klicenka')) echo ' active'; ?> navbar-text dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Pěstounská péče
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo site_url('/pestounska-pece'); ?>">Pěstounská péče</a>
                            <a class="dropdown-item" href="<?php echo site_url('/klicenka'); ?>">Klíčenka</a>
                        </div>
                    </li>
                    <li class="nav-item<?php if (is_page('bez-dluhu')) echo ' active'; ?> navbar-text">
                        <a class="nav-link" href="<?php echo site_url('/bez-dluhu'); ?>">Bez dluhů</a>
                    </li>
                    <li class="nav-item<?php if (is_page('dokumenty')) echo ' active'; ?> navbar-text">
                        <a class="nav-link" href="<?php echo site_url('/dokumenty'); ?>">Dokumenty</a>
                    </li>
                    <li class="nav-item<?php if (is_page('podporuji-nas')) echo ' active'; ?> navbar-text">
                        <a class="nav-link" href="<?php echo site_url('/podporuji-nas'); ?>">Podporují nás</a>
                    </li>
                    <li class="nav-item<?php if (is_page('kontakt')) echo ' active'; ?> navbar-text">
                        <a class="nav-link" href="<?php echo site_url('/kontakt'); ?>">Kontakt</a>
                    </li>
                    <li class="nav-item navbar-text">
                        <a class="nav-link" target="blank" href="https://www.facebook.com/scprorodinu/?__tn__=%2Cd%2CP-R&eid=ARCQwzuGC8mXkugv9Vjp5mL57PT1vtwzaa76dIHCbjmH4_dmpQy1adQxKI7mrK6ywAs73aZYpKfvHRCj"><i class="fab fa-facebook-square"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
