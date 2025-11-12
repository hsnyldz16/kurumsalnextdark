<?php 
/**
 * Projeler Kategorisi Arşivi Şablonu
 * Dosya: category-projeler.php
 */

get_header(); // header.php dosyasını çağır


if ( have_posts() ) : 
    
    while ( have_posts() ) : the_post();

        $data_category_slug = get_post_meta( get_the_ID(), 'data_category_slug', true );
        $data_category = get_post_meta( get_the_ID(), 'data_category', true );
        
        if ( ! empty( $data_category_slug ) && ! empty( $data_category ) ) {
            $distinct_categories[ $data_category_slug ] = $data_category;
        }
    endwhile;
endif;
?>

<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h1 class="page-title"><?php single_cat_title(); ?></h1> 
            <p class="page-subtitle"><?php echo category_description(); ?></p>
        </div>
    </div>
</section>


<section class="news-section" id="haberler">
    <div class="container">
        <div class="row g-4">

            <div class="row g-4">
                <?php

                // WordPress ana sorgusu tekrar başlatılıyor
                // Not: Üstteki döngü distinct kategorileri toplamak için kullanıldığı için
                // burada have_posts() kontrolü ile döngü yeniden başlatılmalı.
                rewind_posts(); 
                
                // 1. WordPress Döngüsü Başlangıcı
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
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
                ?>
            </div>
            <?php if ( have_posts() ) : ?>
            <div class="col-12 mt-5">
                <nav class="pagination-wrapper d-flex justify-content-center">
                    <?php 
                    // WordPress'in yerleşik sayfalandırma fonksiyonu. 
                    // Bootstrap 5 ile uyumlu bir çıktı almak için bu fonksiyonu kullanabiliriz.
                    $paginate_links = paginate_links( array(
                        'type'      => 'array',
                        'prev_text' => '&laquo;', // Önceki sayfa linki metni
                        'next_text' => '&raquo;', // Sonraki sayfa linki metni
                        'mid_size'  => 2, // Aktif sayfanın etrafındaki sayfa sayısı
                    ) );

                    if ( $paginate_links ) {
                        echo '<ul class="pagination">';
                        foreach ( $paginate_links as $link ) {
                            // Linkin aktif olup olmadığını kontrol et (span etiketi içinde gelirse)
                            $is_active = ( strpos( $link, 'current' ) !== false || strpos( $link, 'page-numbers dots' ) !== false ) ? 'active' : '';
                            
                            // Linkin önceki/sonraki link olup olmadığını kontrol et
                            $is_prev_next = ( strpos( $link, 'prev' ) !== false || strpos( $link, 'next' ) !== false ) ? '' : '';

                            // Linkin HTML yapısını Bootstrap uyumlu hale getir
                            $link = str_replace( 'page-numbers', 'page-link', $link );
                            $link = str_replace( 'dots', '', $link ); // Üç nokta gösterimi
                            
                            // <span> (aktif sayfa) etiketlerini kaldırıp <a> içine al
                            if ( strpos( $link, 'span' ) !== false ) {
                                $text_match = preg_match( '/<span.*?>(.*?)<\/span>/', $link, $matches );
                                $link_text = isset($matches[1]) ? $matches[1] : '';
                                $link = '<a class="page-link" href="#">' . $link_text . '</a>';
                            }
                            
                            // Sayfa öğesini oluştur
                            echo '<li class="page-item ' . $is_active . $is_prev_next . '">';
                            echo $link;
                            echo '</li>';
                        }
                        echo '</ul>';
                    }
                    ?>
                </nav>
            </div>
            <?php endif; ?>
            </div>
    </div>
</section>

<?php 
get_footer(); // footer.php dosyasını çağır
?>