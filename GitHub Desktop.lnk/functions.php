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

?>