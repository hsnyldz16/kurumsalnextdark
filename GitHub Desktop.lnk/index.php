<?php get_header(); ?>
<!-- Hero Slider Section -->
<section class="hero-section" id="ana-sayfa">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slider1.jpg" alt="Manufacturing" class="hero-image">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-8 hero-content">
                            <h1 class="hero-title">İMALATTA<br>MÜKEMMELLİK</h1>
                            <p class="hero-subtitle">PRECISION · KALİTE · ZAMANINDA TESLİM</p>
                            <button class="btn btn-custom btn-lg">Hizmetlerimizi Keşfedin</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slider2.jpg"  alt="CNC Machining" class="hero-image">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-8 hero-content">
                            <h1 class="hero-title">CNC İŞLEME<br>TEKNOLOJİSİ</h1>
                            <p class="hero-subtitle">YÜKSEK HASSASİYET · İLERİ TEKNOLOJİ</p>
                            <button class="btn btn-custom btn-lg">Detaylı Bilgi</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slider3.jpg" alt="Quality Control" class="hero-image">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-lg-8 hero-content">
                            <h1 class="hero-title">KALIP TASARIM<br>VE ÜRETİM</h1>
                            <p class="hero-subtitle">ÖZEL ÇÖZÜMLER · PROFESYONEL EKİP</p>
                            <button class="btn btn-custom btn-lg">İletişime Geçin</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- Services Section -->
<section class="services-section" id="hizmetler">
    <div class="container">
        <h2 class="section-title">HİZMETLERİMİZ</h2>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <i class="fas fa-drafting-compass service-icon"></i>
                    <h3 class="service-title">KALIP TASARIM</h3>
                    <p class="service-description">Kalite ve hassasiyetle kalıp tasarımı yaparak üretim saroylenial öpümüğe egliyoruz.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <i class="fas fa-cogs service-icon"></i>
                    <h3 class="service-title">CNC İŞLEME</h3>
                    <p class="service-description">CNC teegahlarımızla yüpcek hassasiyetli parçalar üretiyoruz.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <i class="fas fa-cubes service-icon"></i>
                    <h3 class="service-title">SERİ ÜRETİM</h3>
                    <p class="service-description">Sağlam ve kaliteli ürünlerin sert üretimin geroekiestli yoruz.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section class="projects-section" id="projeler">
    <div class="container">
        <h2 class="section-title">PROJELER</h2>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="project-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project1.jpg" alt="Project 1">
                    <div class="project-overlay">
                        <div class="project-info">
                            <h4>Hassas Parça Üretimi</h4>
                            <p>CNC teknolojisi ile yüksek hassasiyetli üretim</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="project-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project2.jpg"  alt="Project 2">
                    <div class="project-overlay">
                        <div class="project-info">
                            <h4>Kalıp Tasarımı</h4>
                            <p>Özel endüstriyel kalıp çözümleri</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="project-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project3.jpg"  alt="Project 3">
                    <div class="project-overlay">
                        <div class="project-info">
                            <h4>Özel İmalat</h4>
                            <p>Müşteri odaklı özel üretim çözümleri</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-custom btn-lg btn-view-all">Tüm Projeler</button>
        </div>
    </div>
</section>
<?php get_footer(); ?>