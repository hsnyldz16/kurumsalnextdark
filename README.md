# Kurumsal Next Dark WordPress Teması

Kurumsal Next Dark, modern ve profesyonel bir tasarıma sahip, kurumsal web siteleri için geliştirilmiş bir WordPress temasıdır. Bu tema, Bootstrap 5, Font Awesome ve özel JavaScript kodları ile güçlendirilmiştir.

## Özellikler

*   **Modern ve Duyarlı Tasarım:** Bootstrap 5 ile geliştirilmiş, tüm cihazlarda (mobil, tablet, masaüstü) mükemmel görünen tam duyarlı bir arayüze sahiptir.
*   **Özelleştirilebilir Ana Sayfa:** Ana sayfada büyük bir slider, hizmetler bölümü ve projeler bölümü bulunmaktadır.
*   **Özel Sayfa Şablonları:**
    *   **Kurumsal Sayfa:** "Hakkımızda", "İstatistikler", "Neden Bizi Seçmelisiniz?" ve "Değerlerimiz" gibi bölümleri içeren özel bir sayfa şablonu.
    *   **Hizmetlerimiz Sayfası:** Hizmetlerinizi özel bir düzende sergilemek için tasarlanmış bir kategori şablonu.
    *   **Projeler Sayfası:** Projelerinizi filtreleyerek ve detaylı bilgilerle (tamamlanma tarihi, süre, vb.) göstermek için tasarlanmış bir kategori şablonu.
*   **Kolay Menü Yönetimi:** "Ana Menü" ve "Alt Bilgi Menüsü" olmak üzere iki adet menü konumu bulunmaktadır.
*   **Öne Çıkan Görsel Desteği:** Yazı ve sayfalara öne çıkan görseller ekleyebilirsiniz.
*   **Font Awesome İkonları:** Tema genelinde Font Awesome ikonlarını kullanabilirsiniz.

## Kurulum

1.  WordPress yönetici panelinize giriş yapın.
2.  **Görünüm > Temalar > Yeni Ekle** yolunu izleyin.
3.  **Tema Yükle** butonuna tıklayın.
4.  `kurumsal-next-dark.zip` dosyasını seçin ve **Şimdi Kur** butonuna tıklayın.
5.  Kurulum tamamlandıktan sonra temayı **Etkinleştir**'in.

## Kullanım

### Ana Sayfa Ayarları

Ana sayfa `index.php` dosyasından yönetilmektedir. Slider, hizmetler ve projeler bölümlerindeki içerikleri doğrudan bu dosyayı düzenleyerek değiştirebilirsiniz.

### Kurumsal Sayfa

1.  Yeni bir sayfa oluşturun (**Sayfalar > Yeni Ekle**).
2.  Sağ taraftaki **Sayfa Özellikleri** bölümünden **Şablon** olarak **Kurumsal Sayfa Şablonu**'nu seçin.
3.  Sayfa içeriğini ve özel alanları (subtitle, about\_image\_url, vb.) doldurun.
4.  Sayfayı yayımlayın.

### Hizmetlerimiz Sayfası

1.  **Yazılar > Kategoriler** bölümünden "hizmetlerimiz" adında bir kategori oluşturun.
2.  Hizmetlerinizi bu kategoriye ekleyin. Her hizmet için bir yazı oluşturun.
3.  Yazılarınıza öne çıkan görseller ve ikonlar ekleyebilirsiniz. İkonlar için özel alan (`icon`) kullanılmaktadır.

### Projeler Sayfası

1.  **Yazılar > Kategoriler** bölümünden "projeler" adında bir kategori oluşturun.
2.  Projelerinizi bu kategoriye ekleyin. Her proje için bir yazı oluşturun.
3.  Projeleriniz için özel alanları (`date`, `duration`, `mold weight`, `data_category_slug`, `data_category`) doldurun. Bu alanlar proje detaylarını ve filtreleme özelliğini kontrol eder.

## Geliştirme

Tema, `functions.php` dosyası aracılığıyla CSS ve JavaScript dosyalarını yükler. Tema üzerinde değişiklik yapmak isterseniz, `assets/css/custom.css` ve `assets/js/custom.js` dosyalarını düzenleyebilirsiniz.

*   **CSS:** `assets/css/custom.css`
*   **JavaScript:** `assets/js/custom.js`

Bootstrap ve Font Awesome dosyaları CDN üzerinden veya lokal olarak yüklenebilir. Bu ayarları `functions.php` dosyasından kontrol edebilirsiniz.