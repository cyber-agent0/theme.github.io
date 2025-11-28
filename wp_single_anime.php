<?php
/**
 * The template for displaying single anime posts
 */

get_header();

while (have_posts()) : the_post();
    $episodes = get_post_meta(get_the_ID(), '_anime_episodes', true);
    $year = get_post_meta(get_the_ID(), '_anime_year', true);
    $rating = get_post_meta(get_the_ID(), '_anime_rating', true);
    $bg_gradient = get_post_meta(get_the_ID(), '_anime_bg_gradient', true);
    
    if (!$bg_gradient) {
        $bg_gradient = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
    }
    
    // Get download links
    $link_480p = get_post_meta(get_the_ID(), '_download_480p', true);
    $size_480p = get_post_meta(get_the_ID(), '_size_480p', true);
    $link_720p = get_post_meta(get_the_ID(), '_download_720p', true);
    $size_720p = get_post_meta(get_the_ID(), '_size_720p', true);
    $link_1080p = get_post_meta(get_the_ID(), '_download_1080p', true);
    $size_1080p = get_post_meta(get_the_ID(), '_size_1080p', true);
    
    // Get genres
    $genres = wp_get_post_terms(get_the_ID(), 'genre', array('fields' => 'names'));
    $genre_string = !empty($genres) ? implode(', ', $genres) : __('Uncategorized', 'donghua-hub');
?>

<div class="container" style="margin-top: 2rem;">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="modal">
            <div class="modal-header">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('full', array('class' => 'modal-header-bg')); ?>
                <?php else : ?>
                    <div class="modal-header-bg" style="background: <?php echo esc_attr($bg_gradient); ?>;">🎬</div>
                <?php endif; ?>
            </div>
            <div class="modal-body">
                <h1 class="modal-title"><?php the_title(); ?></h1>
                <div class="modal-meta">
                    <div class="modal-meta-item">
                        <i class="fas fa-calendar"></i>
                        <span><?php echo $year ? esc_html($year) : '2024'; ?></span>
                    </div>
                    <div class="modal-meta-item">
                        <i class="fas fa-film"></i>
                        <span><?php echo $episodes ? esc_html($episodes) : __('TBA', 'donghua-hub'); ?></span>
                    </div>
                    <?php if ($rating) : ?>
                    <div class="modal-meta-item">
                        <i class="fas fa-star"></i>
                        <span><?php echo esc_html($rating); ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="modal-meta-item">
                        <i class="fas fa-tag"></i>
                        <span><?php echo esc_html($genre_string); ?></span>
                    </div>
                </div>
                
                <div class="modal-description">
                    <?php the_content(); ?>
                </div>

                <?php if ($link_480p || $link_720p || $link_1080p) : ?>
                <div class="download-section">
                    <h3><i class="fas fa-download"></i> <?php _e('Download Options', 'donghua-hub'); ?></h3>
                    <div class="download-options">
                        <?php if ($link_480p) : ?>
                        <div class="download-option">
                            <div class="quality">480p</div>
                            <div class="size"><?php echo esc_html($size_480p ?: '~150 MB'); ?></div>
                            <a href="<?php echo esc_url($link_480p); ?>" class="download-btn" target="_blank">
                                <i class="fas fa-download"></i> <?php _e('Download', 'donghua-hub'); ?>
                            </a>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($link_720p) : ?>
                        <div class="download-option">
                            <div class="quality">720p</div>
                            <div class="size"><?php echo esc_html($size_720p ?: '~350 MB'); ?></div>
                            <a href="<?php echo esc_url($link_720p); ?>" class="download-btn" target="_blank">
                                <i class="fas fa-download"></i> <?php _e('Download', 'donghua-hub'); ?>
                            </a>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($link_1080p) : ?>
                        <div class="download-option">
                            <div class="quality">1080p</div>
                            <div class="size"><?php echo esc_html($size_1080p ?: '~700 MB'); ?></div>
                            <a href="<?php echo esc_url($link_1080p); ?>" class="download-btn" target="_blank">
                                <i class="fas fa-download"></i> <?php _e('Download', 'donghua-hub'); ?>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </article>
    
    <?php
    // Related anime
    $terms = wp_get_post_terms(get_the_ID(), 'genre', array('fields' => 'ids'));
    
    if (!empty($terms)) :
        $related_args = array(
            'post_type' => 'anime',
            'posts_per_page' => 6,
            'post__not_in' => array(get_the_ID()),
            'tax_query' => array(
                array(
                    'taxonomy' => 'genre',
                    'field' => 'term_id',
                    'terms' => $terms,
                ),
            ),
        );
        
        $related_query = new WP_Query($related_args);
        
        if ($related_query->have_posts()) : ?>
            <div style="margin-top: 4rem;">
                <h2 class="section-title"><?php _e('Related Anime', 'donghua-hub'); ?></h2>
                <div class="anime-grid">
                    <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                        <?php get_template_part('template-parts/content', 'anime-card'); ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        <?php endif;
    endif; ?>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>