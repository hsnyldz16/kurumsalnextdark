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

<section class="filter-section">
    <div class="container">
        <div class="filter-buttons">
            
            <button class="filter-btn active" data-filter="all">Tümü</button>
            
            <?php
            // 2. Dinamik Özel Alan Butonları
            if ( ! empty( $distinct_categories ) ) :
                foreach ( $distinct_categories as $slug => $name ) :
            ?>
                <button class="filter-btn" data-filter="<?php echo esc_attr( $slug ); ?>">
                    <?php echo esc_html( $name ); ?>
                </button>
            <?php
                endforeach;
            endif;
            ?>
            
        </div>
    </div>
</section>

<!-- Projects Grid -->
<section class="projects-section">
    <div class="container">
        <div class="row" id="projectsGrid">
            
            <!-- Project List -->
             <?php 
            if ( have_posts() ) : 
                while ( have_posts() ) : the_post(); 

                    $completion_date = get_post_meta( get_the_ID(), 'date', true ); // Örneğin: Kasım 2024
                    $duration        = get_post_meta( get_the_ID(), 'duration', true ); // Örneğin: 6 ay
                    $meta_value_3    = get_post_meta( get_the_ID(), 'mold weight', true ); // Örneğin: 3.5 ton (Değişken bir alan olduğu için genel isim verdim)
                    $data_category_slug    = get_post_meta( get_the_ID(), 'data_category_slug', true );
                    $data_category    = get_post_meta( get_the_ID(), 'data_category', true );
                    
                    // Öne Çıkan Görsel (Thumbnail) kontrolü
                    $thumbnail_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : 'varsayilan-gorsel.jpg'; // 'large' yerine özel boyut kullanabilirsiniz
            ?>
            <div class="col-lg-6 project-item" data-category="<?php echo esc_attr( $data_category_slug ); ?>">
                <div class="project-card">
                    <a>
                        <div class="project-image-wrapper">
                            <?php 
                            // Öne Çıkan Görsel
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'large', array( 'class' => 'project-image' ) ); 
                            } else {
                                // Varsayılan görsel (isteğe bağlı)
                                echo '<img src="' . esc_url( $thumbnail_url ) . '" alt="' . esc_attr( get_the_title() ) . '" class="project-image">';
                            }
                            ?>
                            
                            <span class="project-category"><?php echo esc_html( $data_category ); ?></span>
                            
                            <div class="project-overlay">
                                <h3 class="project-overlay-title"><?php the_title(); ?></h3>
                                <?php 
                                // Kısa Açıklama (Özet veya içeriğin ilk kısmı)
                                if ( has_excerpt() ) {
                                    the_excerpt();
                                } else {
                                    // Özet yoksa, içeriğin kısa bir kısmını göster
                                    echo '<p class="project-overlay-desc">' . wp_trim_words( get_the_content(), 15, '...' ) . '</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                    
                    <div class="project-content">
                        
                        <h3 class="project-title"><?php the_title(); ?></h3>
                        
                        <p class="project-description">
                            <?php the_excerpt(); // Proje içeriği yerine özet kullanıyoruz ?>
                        </p>
                        
                        <div class="project-meta">
                            
                            <?php if ( ! empty( $completion_date ) ) : ?>
                            <div class="meta-item">
                                <i class="fas fa-calendar-alt"></i>
                                <div>
                                    <span class="meta-label">Tamamlanma</span>
                                    <span class="meta-value"><?php echo esc_html( $completion_date ); ?></span>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <?php if ( ! empty( $duration ) ) : ?>
                            <div class="meta-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <span class="meta-label">Süre</span>
                                    <span class="meta-value"><?php echo esc_html( $duration ); ?></span>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <?php if ( ! empty( $meta_value_3 ) ) : ?>
                            <div class="meta-item">
                                <i class="fas fa-weight-hanging"></i> <div>
                                    <span class="meta-label">Kalıp Ağırlığı</span>
                                    <span class="meta-value"><?php echo esc_html( $meta_value_3 ); ?></span>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>
                        
                        <div class="project-tags">
                            <?php 
                            $post_tags = get_the_tags();
                            if ( $post_tags ) {
                                foreach( $post_tags as $tag ) {
                                    echo '<span class="tag">' . esc_html( $tag->name ) . '</span>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                endwhile;
            else : 
            ?> <p>Gösterilecek proje bulunmamaktadır.</p>
            <?php endif; // Döngü Sonu ?>
        </div>
    </div>
</section>

<?php 
get_footer(); // footer.php dosyasını çağır
?>