<?php 
get_header(); // header.php dosyasını çağırır
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
            <div class="col-lg-12 mb-4 mb-lg-0">
                <p class="section-description"><?php the_content(); ?></p>
            </div>
        </div>
    </div>
</section>

<?php 
endwhile; // WP döngüsü biter

get_footer(); // footer.php dosyasını çağırır
?>