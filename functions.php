<?php 

/**
 * Navwalker ile Bootstrap menü desteğini ekleme
 */
if ( ! file_exists( get_template_directory() . '/wp-bootstrap-navwalker.php' ) ) {
    // Navwalker yoksa hata vermez, sadece dinamik menü çalışmaz
    return new WP_Error( 'wp-bootstrap-navwalker-missing', __( 'Navwalker dosyası bulunamadı.', 'kurumsal-next' ) );
} else {
    // Navwalker dosyasını temaya dahil etme
    require_once get_template_directory() . '/wp-bootstrap-navwalker.php';
}

function kurumsal_next_scripts() {
    
    // Tema yolunu alıyoruz (tekrar tekrar kullanmak için bir değişkene atayalım)
    $theme_uri = get_template_directory_uri(); 

    // --- 1. STİL DOSYALARI (CSS) ---

    // Bootstrap CSS 5.3.2 (Lokalden Çekiyorsanız)
    wp_enqueue_style( 'bootstrap-css', $theme_uri . '/assets/css/bootstrap.min.css', array(), '5.3.2' );
    
    // Font Awesome 6.5.1
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1' );

    // KENDİ ÖZEL CSS DOSYAMIZ
    wp_enqueue_style( 'kurumsal-next-custom', $theme_uri . '/assets/css/custom.css', array('bootstrap-css', 'font-awesome'), '1.0' );

    // -----------------------------------------------------------------------
    
    // --- 2. JAVASCRIPT DOSYALARI (JS) ---

    // A. WordPress'in kendi jQuery'sini yüklüyoruz.
    wp_enqueue_script( 'jquery' );
    
    // B. Bootstrap 5.3.2 JS Bundle (!! KAYIP SATIR BURADA !! - CDN'den çekiliyor varsayımıyla)
    // ÖNEMLİ: Bu script'in handle'ı 'bootstrap-js' olmalıdır!
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.2', true );
    
    
    // C. KENDİ ÖZEL JAVASCRIPT KODUMUZ (custom.js)
    // Artık 'bootstrap-js' tanımlandığı için bu dosya yüklenecektir.
    wp_enqueue_script( 
        'kurumsal-next-js', // 1. Scriptimizin benzersiz adı (handle)
        $theme_uri . '/assets/js/custom.js', // 2. Dosyanın TAM YOLU
        array('jquery', 'bootstrap-js'), // 3. Bağımlılıklar (Şimdi B satırına bağımlı)
        '1.0', // 4. Versiyon numarası
        true // 5. Önemli: True = Scripti footer'a yükle.
    );

}
add_action( 'wp_enqueue_scripts', 'kurumsal_next_scripts' );

/**
 * Temadaki Navigasyon Menü Alanlarını Kaydetme
 */
function kurumsal_next_register_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Ana Navigasyon Menüsü', 'kurumsal-next' ),
            // İhtiyaç duyarsanız, buraya başka menü konumları da ekleyebilirsiniz (örn: 'footer-menu' => 'Alt Bilgi Menüsü')
            'footer-menu' => __( 'Alt Bilgi Hızlı Linkler Menüsü', 'kurumsal-next' ),
        )
    );
}
add_action( 'init', 'kurumsal_next_register_menus' );

// ... diğer functions.php kodlarınız (wp_enqueue_scripts, menü tanımlamaları vb.)

/**
 * Temada Desteklenen Özellikleri Tanımlama
 */
function kurumsal_next_theme_setup() {

    // 1. Öne Çıkan Görsel (Featured Image / Post Thumbnail) desteğini ekle
    add_theme_support( 'post-thumbnails' );
    

    // YENİ ÖZEL BOYUT EKLENİYOR
    // Adı: 'hizmet-karti'
    // Genişlik: 600px
    // Yükseklik: 400px
    // Kırpma (crop): true (Görselin tam olarak 600x400 kesilmesini sağlar)
    add_image_size( 'hizmet-karti', 600, 400, true );
}
add_action( 'after_setup_theme', 'kurumsal_next_theme_setup' );

function custom_theme_customize_register( $wp_customize ) {
    
    // 1. Yeni Bölüm Oluşturma
    $wp_customize->add_section( 'map_settings_section', array(
        'title'    => __( 'Harita ve İletişim Kodları', 'kurumsal-next-dark' ),
        'priority' => 30, // Konumunu belirler
    ));

    // 2. Iframe Kodu İçin Ayar (Setting) Ekleme
    $wp_customize->add_setting( 'contact_map_iframe_code', array(
        'default'           => '', // Varsayılan boş bırakılabilir
        'sanitize_callback' => 'wp_kses_post', // HTML'i güvenli bir şekilde kaydetme
        'type'              => 'theme_mod',
    ));
    

    // 3. Kontrol Alanı (Control) Ekleme (Textarea)
    $wp_customize->add_control( 'contact_map_iframe_code_control', array(
        'label'    => __( 'Google Harita Iframe Kodu', 'kurumsal-next-dark' ),
        'description' => __( 'Google Haritalar\'dan aldığınız tam iframe kodunu buraya yapıştırın.', 'kurumsal-next-dark' ),
        'section'  => 'map_settings_section',
        'settings' => 'contact_map_iframe_code',
        'type'     => 'textarea', // Textarea kullanıyoruz
    ));

    // YENİ AYAR: Adres Metni
    $wp_customize->add_setting( 'contact_address_text', array(
        'default'           => "Lütfen bir adres giriniz", // Varsayılan adres
        'sanitize_callback' => 'wp_kses_post', // HTML ve satır sonlarını güvenli bir şekilde kaydetme
        'type'              => 'theme_mod',
    ));

    // YENİ KONTROL: Adres Metin Alanı
    $wp_customize->add_control( 'contact_address_text_control', array(
        'label'    => __( 'Adres Metni', 'kurumsal-next-dark' ),
        'description' => __( 'Adresi satır satır yazınız. Her satır otomatik olarak <br> etiketi ile ayrılacaktır.', 'kurumsal-next-dark' ),
        'section'  => 'map_settings_section',
        'settings' => 'contact_address_text',
        'type'     => 'textarea', 
    ));

    // YENİ AYAR: Telefonlar
    $wp_customize->add_setting( 'contact_phone_text', array(
        'default'           => "Html formatında telefon bilgisini girebilirsiniz", // Varsayılan adres
        'sanitize_callback' => 'wp_kses_post', // HTML ve satır sonlarını güvenli bir şekilde kaydetme
        'type'              => 'theme_mod',
    ));

    // YENİ KONTROL: Telefonlar Metin Alanı
    $wp_customize->add_control( 'contact_phone_text_control', array(
        'label'    => __( 'Telefon HTML', 'kurumsal-next-dark' ),
        'description' => __( 'HTML Şablonda telefon bilginizi girebilirsiniz.', 'kurumsal-next-dark' ),
        'section'  => 'map_settings_section',
        'settings' => 'contact_phone_text',
        'type'     => 'textarea', 
    ));

        // YENİ AYAR: E-Postlar
    $wp_customize->add_setting( 'contact_email_text', array(
        'default'           => "Html formatında e-mail bilgisini girebilirsiniz", // Varsayılan adres
        'sanitize_callback' => 'wp_kses_post', // HTML ve satır sonlarını güvenli bir şekilde kaydetme
        'type'              => 'theme_mod',
    ));

    // YENİ KONTROL: Telefonlar Metin Alanı
    $wp_customize->add_control( 'contact_emaile_text_control', array(
        'label'    => __( 'E-Posta HTML', 'kurumsal-next-dark' ),
        'description' => __( 'HTML şablonda email bilginizi girebilirsiniz', 'kurumsal-next-dark' ),
        'section'  => 'map_settings_section',
        'settings' => 'contact_email_text',
        'type'     => 'textarea', 
    ));

    
}
add_action( 'customize_register', 'custom_theme_customize_register' );
?>