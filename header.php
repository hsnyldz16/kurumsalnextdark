<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> - <?php wp_title(); ?></title>
    
    <!-- Font Awesome 7 (Free) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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
            
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
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
                
                <!--<ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#ana-sayfa">Ana Sayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kurumsal">Kurumsal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#hizmetler">Hizmetler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#projeler">Projeler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">İletişim</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <button class="btn btn-custom">Teklif Al</button>
                    </li>
                    <li class="nav-item dropdown ms-lg-3">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="languageDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-globe me-2"></i> <span>Dil</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-flag-usa me-2"></i> English</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-flag me-2"></i> Français</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-flag me-2"></i> العربية</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-flag me-2"></i> Русский</a></li>
                        </ul>
                    </li>
                </ul>-->
            </div>
        </div>
    </nav>
