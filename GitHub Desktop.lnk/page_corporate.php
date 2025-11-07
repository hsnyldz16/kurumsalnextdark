<?php 
/**
 * Template Name: Kurumsal Sayfa Şablonu
 * Description: Kurumsal Sayfa yapısına özel (Hakkımızda, Değerler, İstatistikler) şablon.
 */

get_header(); 
// WP Döngüsünü başlatıyoruz. Varsayılan olarak sayfanın içeriğini çeker.
while ( have_posts() ) : the_post(); 
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <p class="page-subtitle"><?php echo get_post_meta(get_the_ID(), 'subtitle', true); ?></p>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">

                <p class="section-description">
                    <?php the_content(); ?>
                </p>
                <button class="btn btn-custom btn-lg mt-3" onclick="window.location.href='<?php echo get_post_meta(get_the_ID(), 'about_detail_link', true);  ?>';">Daha Fazla Bilgi</button>
            </div>
            <div class="col-lg-6">
                <img src="<?php echo get_post_meta(get_the_ID(), 'about_image_url', true) ?: 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=800&q=80'; ?>" alt="About Us" class="about-image">
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <span class="stat-number" data-count="<?php echo get_post_meta(get_the_ID(), 'years_of_experience', true);?>">0</span>
                    <span class="stat-label">Yıllık Deneyim</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <span class="stat-number" data-count="<?php echo get_post_meta(get_the_ID(), 'total_projects', true);?>">0</span>
                    <span class="stat-label">Tamamlanan Proje</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <span class="stat-number" data-count="<?php echo get_post_meta(get_the_ID(), 'customers', true);?>">0</span>
                    <span class="stat-label">Mutlu Müşteri</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <span class="stat-number" data-count="<?php echo get_post_meta(get_the_ID(), 'expert_team', true);?>">0</span>
                    <span class="stat-label">Uzman Ekip</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <h2 class="section-title text-center mb-5">Neden Bizi Seçmelisiniz?</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3 class="feature-title">Kalite Güvencesi</h3>
                    <p class="feature-description">ISO 9001 sertifikalı üretim süreçlerimizle en yüksek kalite standartlarını garanti ediyoruz.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="feature-title">Zamanında Teslimat</h3>
                    <p class="feature-description">Projelerinizi belirlenen sürede eksiksiz ve hatasız teslim etme konusunda %98 başarı oranına sahibiz.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3 class="feature-title">İnovasyon</h3>
                    <p class="feature-description">Sürekli AR-GE çalışmalarımızla sektörün en yenilikçi çözümlerini sunuyoruz.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="feature-title">Uzman Kadro</h3>
                    <p class="feature-description">Alanında uzman, sertifikalı mühendis ve teknisyenlerden oluşan profesyonel ekibimiz.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3 class="feature-title">Müşteri Odaklı</h3>
                    <p class="feature-description">Her projeye özel çözümler üreterek müşteri memnuniyetini en üst seviyede tutuyoruz.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3 class="feature-title">Global Standartlar</h3>
                    <p class="feature-description">Uluslararası kalite standartlarına uygun üretim ve hizmet anlayışı.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="values-section">
    <div class="container">
        <h2 class="section-title text-center mb-5">Değerlerimiz</h2>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="value-box">
                    <div class="value-number">01</div>
                    <h3 class="value-title">Dürüstlük</h3>
                    <p class="value-description">Tüm iş ilişkilerimizde şeffaf ve dürüst olmayı ilke ediniriz.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="value-box">
                    <div class="value-number">02</div>
                    <h3 class="value-title">Mükemmellik</h3>
                    <p class="value-description">Her projede en yüksek kalite ve hassasiyeti hedefleriz.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="value-box">
                    <div class="value-number">03</div>
                    <h3 class="value-title">Yenilikçilik</h3>
                    <p class="value-description">Sürekli gelişim ve inovasyon odaklı çalışırız.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="value-box">
                    <div class="value-number">04</div>
                    <h3 class="value-title">Sorumluluk</h3>
                    <p class="value-description">Çevreye ve topluma karşı sorumluluğumuzun bilincindeyiz.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
endwhile; // WP döngüsü biter

get_footer(); // footer.php dosyasını çağırır
?>