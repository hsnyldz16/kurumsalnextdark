<?php 
/**
 * Template Name: Hizmetler Kategori Arşivi Şablonu
 * Kategori Slug'ı: hizmetlerimiz
 */

get_header(); // header.php dosyasını çağır
?>

<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h1 class="page-title"><?php single_cat_title(); ?></h1> 
            <p class="page-subtitle"><?php echo category_description(); ?></p>
        </div>
    </div>
</section>

<section class="services-section">
    <div class="container">
        <?php 
        $count = 0;

        // WordPress, bu sayfaya geldiğinde hizmet yazıları hazırdır.
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); 
                $count++; 

                // Görselin yerini değiştiren CSS sınıfı (Çift sıralarda görseli sağa alır)
                $reverse_class = ($count % 2 == 0) ? ' flex-lg-row-reverse' : '';
        ?>

        <div class="row align-items-center service-card<?php echo $reverse_class; ?>">
            
            <div class="col-lg-5">
                <?php 
                if ( has_post_thumbnail() ) {
                    
                    // Öne çıkan görseli (Thumbnail) large boyutta çeker
                    the_post_thumbnail( 'large', array( 'class' => 'service-image' ) );
                }
                ?>
            </div>
            
            <div class="col-lg-7">
                <div class="service-content">
                    
                    <div class="service-icon-box">
                        <i class="<?php echo get_post_meta(get_the_ID(), 'icon', true);?>"></i> 
                    </div>
                    
                    <h2 class="service-title"><?php the_title(); ?></h2>
                    
                    <p class="service-description"><?php the_excerpt(); ?></p>

                    <p><?php the_content(); ?></p>
                </div>
            </div>
        </div>
        <?php 
            endwhile; 
        else : 
            // Hiç yazı bulunamazsa mesaj
            echo '<p>' . __('Bu kategoride henüz hizmet bulunmamaktadır.', 'kurumsal-next') . '</p>';
        endif; 
        ?>
    </div>
</section>

<?php 
get_footer(); // footer.php dosyasını çağır
?>