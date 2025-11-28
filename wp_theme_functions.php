<?php
/**
 * Donghua Hub Theme Functions
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Theme Setup
function donghua_hub_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(350, 350, true);
    
    // Add custom image sizes
    add_image_size('donghua-slider', 1400, 450, true);
    add_image_size('donghua-card', 350, 350, true);
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'donghua-hub'),
        'footer' => __('Footer Menu', 'donghua-hub'),
    ));
    
    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Add theme support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'donghua_hub_setup');

// Enqueue scripts and styles
function donghua_hub_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('donghua-hub-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // Enqueue theme JavaScript
    wp_enqueue_script('donghua-hub-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('donghua-hub-script', 'donghuaAjax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('donghua_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'donghua_hub_scripts');

// Register Widget Areas
function donghua_hub_widgets_init() {
    // Footer Widget Areas
    register_sidebar(array(
        'name'          => __('Footer Widget 1', 'donghua-hub'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in your footer.', 'donghua-hub'),
        'before_widget' => '<div class="footer-section">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget 2', 'donghua-hub'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in your footer.', 'donghua-hub'),
        'before_widget' => '<div class="footer-section">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget 3', 'donghua-hub'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in your footer.', 'donghua-hub'),
        'before_widget' => '<div class="footer-section">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget 4', 'donghua-hub'),
        'id'            => 'footer-4',
        'description'   => __('Add widgets here to appear in your footer.', 'donghua-hub'),
        'before_widget' => '<div class="footer-section">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'donghua_hub_widgets_init');

// Custom Post Type for Anime
function donghua_hub_register_anime_post_type() {
    $labels = array(
        'name'               => __('Anime', 'donghua-hub'),
        'singular_name'      => __('Anime', 'donghua-hub'),
        'menu_name'          => __('Anime', 'donghua-hub'),
        'add_new'            => __('Add New', 'donghua-hub'),
        'add_new_item'       => __('Add New Anime', 'donghua-hub'),
        'edit_item'          => __('Edit Anime', 'donghua-hub'),
        'new_item'           => __('New Anime', 'donghua-hub'),
        'view_item'          => __('View Anime', 'donghua-hub'),
        'search_items'       => __('Search Anime', 'donghua-hub'),
        'not_found'          => __('No anime found', 'donghua-hub'),
        'not_found_in_trash' => __('No anime found in trash', 'donghua-hub'),
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'anime'),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-video-alt3',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    );
    
    register_post_type('anime', $args);
}
add_action('init', 'donghua_hub_register_anime_post_type');

// Custom Taxonomy for Genres
function donghua_hub_register_genre_taxonomy() {
    $labels = array(
        'name'              => __('Genres', 'donghua-hub'),
        'singular_name'     => __('Genre', 'donghua-hub'),
        'search_items'      => __('Search Genres', 'donghua-hub'),
        'all_items'         => __('All Genres', 'donghua-hub'),
        'parent_item'       => __('Parent Genre', 'donghua-hub'),
        'parent_item_colon' => __('Parent Genre:', 'donghua-hub'),
        'edit_item'         => __('Edit Genre', 'donghua-hub'),
        'update_item'       => __('Update Genre', 'donghua-hub'),
        'add_new_item'      => __('Add New Genre', 'donghua-hub'),
        'new_item_name'     => __('New Genre Name', 'donghua-hub'),
        'menu_name'         => __('Genres', 'donghua-hub'),
    );
    
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'genre'),
    );
    
    register_taxonomy('genre', array('anime'), $args);
}
add_action('init', 'donghua_hub_register_genre_taxonomy');

// Add custom meta boxes for anime details
function donghua_hub_add_anime_meta_boxes() {
    add_meta_box(
        'anime_details',
        __('Anime Details', 'donghua-hub'),
        'donghua_hub_anime_details_callback',
        'anime',
        'normal',
        'high'
    );
    
    add_meta_box(
        'download_links',
        __('Download Links', 'donghua-hub'),
        'donghua_hub_download_links_callback',
        'anime',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'donghua_hub_add_anime_meta_boxes');

// Anime details meta box callback
function donghua_hub_anime_details_callback($post) {
    wp_nonce_field('donghua_hub_save_anime_details', 'donghua_hub_anime_details_nonce');
    
    $episodes = get_post_meta($post->ID, '_anime_episodes', true);
    $year = get_post_meta($post->ID, '_anime_year', true);
    $rating = get_post_meta($post->ID, '_anime_rating', true);
    $badge = get_post_meta($post->ID, '_anime_badge', true);
    $bg_gradient = get_post_meta($post->ID, '_anime_bg_gradient', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="anime_episodes"><?php _e('Episodes', 'donghua-hub'); ?></label></th>
            <td><input type="text" id="anime_episodes" name="anime_episodes" value="<?php echo esc_attr($episodes); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="anime_year"><?php _e('Year', 'donghua-hub'); ?></label></th>
            <td><input type="text" id="anime_year" name="anime_year" value="<?php echo esc_attr($year); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="anime_rating"><?php _e('Rating', 'donghua-hub'); ?></label></th>
            <td><input type="text" id="anime_rating" name="anime_rating" value="<?php echo esc_attr($rating); ?>" class="small-text" placeholder="9.5"></td>
        </tr>
        <tr>
            <th><label for="anime_badge"><?php _e('Badge', 'donghua-hub'); ?></label></th>
            <td>
                <select id="anime_badge" name="anime_badge">
                    <option value=""><?php _e('None', 'donghua-hub'); ?></option>
                    <option value="NEW" <?php selected($badge, 'NEW'); ?>><?php _e('NEW', 'donghua-hub'); ?></option>
                    <option value="HOT" <?php selected($badge, 'HOT'); ?>><?php _e('HOT', 'donghua-hub'); ?></option>
                    <option value="POPULAR" <?php selected($badge, 'POPULAR'); ?>><?php _e('POPULAR', 'donghua-hub'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="anime_bg_gradient"><?php _e('Background Gradient', 'donghua-hub'); ?></label></th>
            <td><input type="text" id="anime_bg_gradient" name="anime_bg_gradient" value="<?php echo esc_attr($bg_gradient); ?>" class="large-text" placeholder="linear-gradient(135deg, #667eea 0%, #764ba2 100%)"></td>
        </tr>
    </table>
    <?php
}

// Download links meta box callback
function donghua_hub_download_links_callback($post) {
    wp_nonce_field('donghua_hub_save_download_links', 'donghua_hub_download_links_nonce');
    
    $link_480p = get_post_meta($post->ID, '_download_480p', true);
    $link_720p = get_post_meta($post->ID, '_download_720p', true);
    $link_1080p = get_post_meta($post->ID, '_download_1080p', true);
    $size_480p = get_post_meta($post->ID, '_size_480p', true);
    $size_720p = get_post_meta($post->ID, '_size_720p', true);
    $size_1080p = get_post_meta($post->ID, '_size_1080p', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="download_480p"><?php _e('480p Download Link', 'donghua-hub'); ?></label></th>
            <td><input type="url" id="download_480p" name="download_480p" value="<?php echo esc_url($link_480p); ?>" class="large-text"></td>
        </tr>
        <tr>
            <th><label for="size_480p"><?php _e('480p File Size', 'donghua-hub'); ?></label></th>
            <td><input type="text" id="size_480p" name="size_480p" value="<?php echo esc_attr($size_480p); ?>" class="regular-text" placeholder="~150 MB"></td>
        </tr>
        <tr>
            <th><label for="download_720p"><?php _e('720p Download Link', 'donghua-hub'); ?></label></th>
            <td><input type="url" id="download_720p" name="download_720p" value="<?php echo esc_url($link_720p); ?>" class="large-text"></td>
        </tr>
        <tr>
            <th><label for="size_720p"><?php _e('720p File Size', 'donghua-hub'); ?></label></th>
            <td><input type="text" id="size_720p" name="size_720p" value="<?php echo esc_attr($size_720p); ?>" class="regular-text" placeholder="~350 MB"></td>
        </tr>
        <tr>
            <th><label for="download_1080p"><?php _e('1080p Download Link', 'donghua-hub'); ?></label></th>
            <td><input type="url" id="download_1080p" name="download_1080p" value="<?php echo esc_url($link_1080p); ?>" class="large-text"></td>
        </tr>
        <tr>
            <th><label for="size_1080p"><?php _e('1080p File Size', 'donghua-hub'); ?></label></th>
            <td><input type="text" id="size_1080p" name="size_1080p" value="<?php echo esc_attr($size_1080p); ?>" class="regular-text" placeholder="~700 MB"></td>
        </tr>
    </table>
    <?php
}

// Save anime details
function donghua_hub_save_anime_details($post_id) {
    if (!isset($_POST['donghua_hub_anime_details_nonce'])) {
        return;
    }
    
    if (!wp_verify_nonce($_POST['donghua_hub_anime_details_nonce'], 'donghua_hub_save_anime_details')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['anime_episodes'])) {
        update_post_meta($post_id, '_anime_episodes', sanitize_text_field($_POST['anime_episodes']));
    }
    
    if (isset($_POST['anime_year'])) {
        update_post_meta($post_id, '_anime_year', sanitize_text_field($_POST['anime_year']));
    }
    
    if (isset($_POST['anime_rating'])) {
        update_post_meta($post_id, '_anime_rating', sanitize_text_field($_POST['anime_rating']));
    }
    
    if (isset($_POST['anime_badge'])) {
        update_post_meta($post_id, '_anime_badge', sanitize_text_field($_POST['anime_badge']));
    }
    
    if (isset($_POST['anime_bg_gradient'])) {
        update_post_meta($post_id, '_anime_bg_gradient', sanitize_text_field($_POST['anime_bg_gradient']));
    }
}
add_action('save_post', 'donghua_hub_save_anime_details');

// Save download links
function donghua_hub_save_download_links($post_id) {
    if (!isset($_POST['donghua_hub_download_links_nonce'])) {
        return;
    }
    
    if (!wp_verify_nonce($_POST['donghua_hub_download_links_nonce'], 'donghua_hub_save_download_links')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    $fields = array(
        'download_480p' => '_download_480p',
        'size_480p' => '_size_480p',
        'download_720p' => '_download_720p',
        'size_720p' => '_size_720p',
        'download_1080p' => '_download_1080p',
        'size_1080p' => '_size_1080p',
    );
    
    foreach ($fields as $field => $meta_key) {
        if (isset($_POST[$field])) {
            if (strpos($field, 'download') !== false) {
                update_post_meta($post_id, $meta_key, esc_url_raw($_POST[$field]));
            } else {
                update_post_meta($post_id, $meta_key, sanitize_text_field($_POST[$field]));
            }
        }
    }
}
add_action('save_post', 'donghua_hub_save_download_links');

// AJAX Search Handler
function donghua_hub_ajax_search() {
    check_ajax_referer('donghua_nonce', 'nonce');
    
    $search_term = sanitize_text_field($_POST['search_term']);
    
    $args = array(
        'post_type' => 'anime',
        's' => $search_term,
        'posts_per_page' => 12,
    );
    
    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        ob_start();
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/content', 'anime-card');
        }
        $html = ob_get_clean();
        wp_send_json_success($html);
    } else {
        wp_send_json_error(__('No anime found', 'donghua-hub'));
    }
    
    wp_die();
}
add_action('wp_ajax_donghua_search', 'donghua_hub_ajax_search');
add_action('wp_ajax_nopriv_donghua_search', 'donghua_hub_ajax_search');

// Custom excerpt length
function donghua_hub_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'donghua_hub_excerpt_length');

// Custom excerpt more
function donghua_hub_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'donghua_hub_excerpt_more');
?>