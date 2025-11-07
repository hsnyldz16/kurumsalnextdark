<!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h5><i class="fas fa-industry me-2"></i>KURUMSAL NEXT</h5>
                    <p class="text-light">İmalat sektöründe mükemmellik ve kalite standartlarını belirleyen öncü firmamız, müşteri memnuniyetini her zaman ön planda tutar.</p>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h5>Hızlı Linkler</h5>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer-menu', // functions.php'de tanımladığımız isim
                        'depth'          => 1,             // Alt menü olmayacağı için 1 seviye yeterli
                        'container'      => false,         // <ul> etrafındaki div'i kaldır
                        'menu_class'     => '',            // <ul> etiketine class eklemiyoruz (veya isterseniz 'list-unstyled' gibi Bootstrap class'ı ekleyebilirsiniz)
                        'items_wrap'     => '<ul>%3$s</ul>', // <ul> etiketini manuel olarak sarıyoruz
                    ) );
                    ?>
                </div>
                
                <div class="footer-section">
                    <h5>İletişim</h5>
                    <ul>
                        <li><i class="fas fa-map-marker-alt me-2 text-primary"></i>Bursa, Türkiye</li>
                        <li><i class="fas fa-phone me-2 text-primary"></i>+90 (XXX) XXX XX XX</li>
                        <li><i class="fas fa-envelope me-2 text-primary"></i>info@kurumsalnext.com</li>
                        <li><i class="fas fa-clock me-2 text-primary"></i>Pzt-Cuma: 08:00 - 18:00</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2024 Kurumsal Next. Tüm hakları saklıdır. <i class="fas fa-heart text-danger"></i> ile tasarlandı.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <?php wp_footer(); ?>
</body>
</html>