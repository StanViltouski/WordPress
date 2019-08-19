<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php wp_head(); ?>
   
</head>
<body>
<section class="header header-wave-1 header-wave-2 header-wave-3">
    <div class="mobile-menu-fixed">
        <div class="container navbar-container">
            <div class="top-line">
                <a class="navbar-brand d-flex align-items-center" href="<?php echo home_url('/'); ?>">
                    <img src="/img/logo.png" alt="logo-mobile" srcset="/img/logo@2x.png 2x, /img/logo@3x.png 3x" />
                </a>
                <a href="#" class="close-button">
                    <img src="/img/close-popup-icon.svg" alt="close-button">
                </a>
            </div>
            <div class="mobile-menu-wrapper">
                <ul class="mobile-menu">
                    <li class="mobile-nav-item">
                        <div class="mobile-dropdown-wrapper">
                            <div class="mobile-dropdown-item-toggler">
                                <a href="#">Services<i class="fas fa-chevron-down"></i></a>
                                <div class="mobile-dropdown-menu">
                                    <a href="/sport-dev.html" class="mobile-dropdown-item">Sport Dev</a>
                                    <a href="/product-dev.html" class="mobile-dropdown-item">Product Dev</a>
                                    <a href="/showcases-catalog.html" class="mobile-dropdown-item">Outsourcing</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="mobile-nav-item">
                        <a href="#">Showcases</a>
                    </li>
                    <li class="mobile-nav-item">
                        <a href="#">Approach</a>
                    </li>
                    <li class="mobile-nav-item">
                        <a href="#"> Blog</a>
                    </li>
                    <li class="mobile-nav-item">
                        <a href="/contacts.html">Contacts</a>
                    </li>
                </ul>
                <div class="mobile-nav-item-button">
                    <a class="btn" href="#">Send Inquiry</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container navbar-container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="<?php bloginfo('template_directory') ?>/assets/svg/stone-labs-logo-white.svg" alt="logo">
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="dropdown-item-wrapper">
                            <div class="top-dropdown-item">
                                <a class="nav-item dropdown-link" href="#">
                                    Services<i class="fas fa-chevron-down"></i>
                                </a>

                                <div class="nav-dropdown-menu">
                                    <a href="/sport-dev.html" class="nav-dropdown-item">Sport Dev</a>
                                    <a href="/product-dev.html" class="nav-dropdown-item">Product Dev</a>
                                    <a href="/showcases-catalog.html" class="nav-dropdown-item">Outsourcing</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item" href="/showcases-catalog.html">Showcases</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item" href="#">Approach</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item" href="/blog.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item" href="/contacts.html">Contacts</a>
                    </li>
                </ul>
            </div>
            <div class="nav-item-button">
                <a class="btn" href="#">Send Inquiry</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>