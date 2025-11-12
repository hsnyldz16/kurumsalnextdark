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

<!-- News Section -->
<section class="news-section" id="haberler">
    <div class="container">
        <h2 class="section-title">HABERLER & DUYURULAR</h2>
        <div class="row g-4">

            <!-- News Loop -->
            <div class="row g-4">
                <?php
                // 1. WP_Query Argümanları: Son 3 yazıyı 'haberler' kategorisinden çek
                $args = array(
                    'post_type'      => 'post',        // Varsayılan yazı türü
                    'category_name'  => 'haberler',    // Kategorinin kısa adı (slug)
                    'posts_per_page' => 3,             // Gösterilecek yazı sayısı
                    'post_status'    => 'publish',     // Sadece yayınlanmış yazıları getir
                    'orderby'        => 'date',        // Sıralama kriteri: 'date' (post_date kolonu)
                    'order'          => 'DESC'         // Sıralama yönü: 'DESC' (büyükten küçüğe, en yeni en üstte)
                );

                // 2. Yeni Sorguyu (Query) Başlat
                $the_query = new WP_Query( $args );

                // 3. WordPress Döngüsü Başlangıcı
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                ?><div class="col-lg-4 col-md-6">
                        <div class="news-card">
                            <div class="news-image-wrapper">
                                <?php 
                                // Öne Çıkarılmış Görsel (Featured Image)
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( 'large', array( 'class' => 'news-image' ) );
                                } else {
                                    // Öne çıkarılmış görsel yoksa varsayılan bir görsel basılabilir
                                    echo '<img src="' . get_template_directory_uri() . '/assets/img/default-news.jpg" alt="' . get_the_title() . '" class="news-image">';
                                }
                                ?>
                                
                                <span class="news-date">
                                    <i class="far fa-calendar"></i> 
                                    <?php 
                                    // Yayın Tarihi (Örn: 10 Kas 2024)
                                    echo get_the_date( 'd M Y' ); 
                                    ?>
                                </span>
                            </div>
                            <div class="news-content">
                                <h3 class="news-title"><?php the_title(); ?></h3>
                                <p class="news-excerpt">
                                    <?php 
                                    // Yazı Özeti (excerpt) veya içerikten kısa bir bölüm
                                    // 15 kelimelik özet çek
                                    echo wp_trim_words( get_the_excerpt(), 15, '...' ); 
                                    ?>
                                </p>
                                <div class="mt-3">
                                    <a href="<?php the_permalink(); ?>" class="btn-read-more">
                                        Devamını Oku <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    endwhile;
                else :
                    // Eğer hiç yazı bulunamazsa bu mesaj gösterilir
                    echo '<p class="col-12 text-center">Şu anda yayınlanmış haber bulunmamaktadır.</p>';
                endif;

                // 4. Ana Sorgu (Main Query) Verilerini Geri Yükle
                wp_reset_postdata();
                ?>
            </div>
            <!-- News Loop End -->
        </div>

        <!-- All News Button -->
        <div class="text-center mt-5">
            <a href="haberler.html" class="btn btn-custom btn-lg">
                <i class="fas fa-newspaper me-2"></i> Tüm Haberleri Görüntüle
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>