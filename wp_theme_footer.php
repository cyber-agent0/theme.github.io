<footer>
    <div class="footer-characters">
        <div class="character-left">🥷</div>
        <div class="character-right">⚔️</div>
    </div>
    
    <div class="footer-content">
        <div class="footer-main">
            <?php if (is_active_sidebar('footer-1')) : ?>
                <?php dynamic_sidebar('footer-1'); ?>
            <?php else : ?>
                <div class="footer-section footer-about">
                    <div class="footer-logo"><?php bloginfo('name'); ?></div>
                    <p><?php bloginfo('description'); ?></p>
                    <div class="social-icons">
                        <a href="#" class="social-icon facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon youtube"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="social-icon discord"><i class="fab fa-discord"></i></a>
                        <a href="#" class="social-icon telegram"><i class="fab fa-telegram-plane"></i></a>
                        <a href="#" class="social-icon tiktok"><i class="fab fa-tiktok"></i></a>
                        <a href="#" class="social-icon weibo"><i class="fab fa-weibo"></i></a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (is_active_sidebar('footer-2')) : ?>
                <?php dynamic_sidebar('footer-2'); ?>
            <?php else : ?>
                <div class="footer-section">
                    <h3><?php _e('Quick Links', 'donghua-hub'); ?></h3>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>"><i class="fas fa-chevron-right"></i> <?php _e('Home', 'donghua-hub'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/anime/')); ?>"><i class="fas fa-chevron-right"></i> <?php _e('Latest Releases', 'donghua-hub'); ?></a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Popular Donghua', 'donghua-hub'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/genre/')); ?>"><i class="fas fa-chevron-right"></i> <?php _e('Genres', 'donghua-hub'); ?></a></li>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (is_active_sidebar('footer-3')) : ?>
                <?php dynamic_sidebar('footer-3'); ?>
            <?php else : ?>
                <div class="footer-section">
                    <h3><?php _e('Top Genres', 'donghua-hub'); ?></h3>
                    <ul class="footer-links">
                        <?php
                        $genres = get_terms(array(
                            'taxonomy' => 'genre',
                            'number' => 6,
                            'hide_empty' => true,
                        ));
                        
                        if (!empty($genres) && !is_wp_error($genres)) :
                            foreach ($genres as $genre) : ?>
                                <li><a href="<?php echo esc_url(get_term_link($genre)); ?>"><i class="fas fa-fire"></i> <?php echo esc_html($genre->name); ?></a></li>
                            <?php endforeach;
                        endif; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (is_active_sidebar('footer-4')) : ?>
                <?php dynamic_sidebar('footer-4'); ?>
            <?php else : ?>
                <div class="footer-section">
                    <h3><?php _e('Newsletter', 'donghua-hub'); ?></h3>
                    <div class="newsletter">
                        <p style="color: rgba(255,255,255,0.7); margin-bottom: 1rem;"><?php _e('Subscribe to get updates on latest releases and exclusive content!', 'donghua-hub'); ?></p>
                        <form class="newsletter-form" id="newsletter-form">
                            <input type="email" name="newsletter_email" placeholder="<?php esc_attr_e('Enter your email', 'donghua-hub'); ?>" required>
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                    <ul class="footer-links" style="margin-top: 1.5rem;">
                        <li><a href="mailto:<?php echo esc_attr(get_option('admin_email')); ?>"><i class="fas fa-envelope"></i> <?php echo esc_html(get_option('admin_email')); ?></a></li>
                        <li><a href="#"><i class="fas fa-headset"></i> <?php _e('24/7 Support', 'donghua-hub'); ?></a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved. 东华动漫', 'donghua-hub'); ?></p>
            <div class="footer-bottom-links">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => false,
                    'menu_class' => '',
                    'depth' => 1,
                    'fallback_cb' => 'donghua_hub_footer_fallback_menu',
                ));
                ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

<?php
function donghua_hub_footer_fallback_menu() {
    echo '<a href="#">' . __('Privacy Policy', 'donghua-hub') . '</a>';
    echo '<a href="#">' . __('Terms of Service', 'donghua-hub') . '</a>';
    echo '<a href="#">' . __('DMCA', 'donghua-hub') . '</a>';
    echo '<a href="#">' . __('Contact Us', 'donghua-hub') . '</a>';
}
?>