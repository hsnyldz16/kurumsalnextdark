<?php
/**
 * Template Name: İletişim Sayfası Şablonu
 */
get_header(); // Header'ı çağırır
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
<!-- Contact Info Cards -->
<section class="contact-info-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3 class="info-title">Adresimiz</h3>
                    <p class="info-text">
                        <?php 
                        // 1. Özelleştiriciden kaydedilen kodu çek
                        $iframe_code = get_theme_mod( 'contact_address_text' );
                        
                        if ( $iframe_code ) {
                            // 2. Kodu ekrana bas (wp_kses_post ile zaten temizlenmişti)
                            echo $iframe_code;
                        } else {
                            // 3. Eğer kod yoksa kullanıcıyı uyaran bir mesaj gösterebiliriz
                            echo '';
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3 class="info-title">Telefon</h3>
                    <p class="info-text">
                        <?php 
                        // 1. Özelleştiriciden kaydedilen kodu çek
                        $address_code = get_theme_mod( 'contact_phone_text' );
                        
                        if ( $address_code ) {
                            // 2. Kodu ekrana bas (wp_kses_post ile zaten temizlenmişti)
                            echo $address_code;
                        } else {
                            // 3. Eğer kod yoksa kullanıcıyı uyaran bir mesaj gösterebiliriz
                            echo '';
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 class="info-title">E-posta</h3>
                    <p class="info-text">
                         <?php 
                        // 1. Özelleştiriciden kaydedilen kodu çek
                        $email_code = get_theme_mod( 'contact_email_text' );
                        
                        if ( $email_code ) {
                            // 2. Kodu ekrana bas (wp_kses_post ile zaten temizlenmişti)
                            echo $email_code;
                        } else {
                            // 3. Eğer kod yoksa kullanıcıyı uyaran bir mesaj gösterebiliriz
                            echo '';
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="contact-form-section">
    <div class="container">
        <h2 class="section-title">Bize Ulaşın</h2>
        <p class="section-subtitle">Formu doldurarak bizimle iletişime geçebilirsiniz. En kısa sürede size dönüş yapacağız.</p>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="contact-form-wrapper">
                    <?php echo do_shortcode( '[contact-form-7 id="4560d34" title="İletişim formu 1" html_id="contactForm"]' ); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="container">
        <h2 class="section-title">Konumumuz</h2>
        <p class="section-subtitle">Bursa Organize Sanayi Bölgesinde modern tesisimizde sizleri ağırlamaktan mutluluk duyarız</p>
        
        <div class="map-container">
            <iframe src=" <?php 
        // 1. Özelleştiriciden kaydedilen kodu çek
        $iframe_code = get_theme_mod( 'contact_map_iframe_code' );
        
        if ( $iframe_code ) {
            // 2. Kodu ekrana bas (wp_kses_post ile zaten temizlenmişti)
            echo $iframe_code;
        } else {
            // 3. Eğer kod yoksa kullanıcıyı uyaran bir mesaj gösterebiliriz
            echo '<p>Lütfen Harita iframe kodunu Özelleştirici ayarlarından girin.</p>';
        }
        ?>" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

<?php 
get_footer(); // Footer'ı çağırır
?>