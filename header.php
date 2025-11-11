<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> - <?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">

    <div class="container">

        <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <i class="fas fa-industry me-2"></i><?php bloginfo('name'); ?>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary-menu', // functions.php'de tanımladığımız isim
                    'depth'          => 2,             // Menüde kaç seviye alt menü gösterileceği (0 = sınırsız)
                    'container'      => false,         // Navigasyon etrafına <div> etiketi sarmalamayı devre dışı bırakır
                    'menu_class'     => 'navbar-nav ms-auto', // Bootstrap'e uygun <ul> etiketine uygulanacak CSS class'ı
                    'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback', // Menü atanmazsa ne yapılacağı
                    'walker'         => new WP_Bootstrap_Navwalker(), // Bootstrap uyumluluğu için özel Walker sınıfı
                ));
                ?>
        </div>
    </div>
</nav>
