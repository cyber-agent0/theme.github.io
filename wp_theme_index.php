<?php
/**
 * The main template file
 */

get_header(); ?>

<section class="hero">
    <h1><?php bloginfo('name'); ?></h1>
    <p><?php bloginfo('description'); ?></p>
    <div class="search-bar">
        <input type="text" id="anime-search" placeholder="<?php esc_attr_e('Search for anime titles...', 'donghua-hub'); ?>">
        <button id="search-btn"><?php _e('Search', 'donghua-hub'); ?></button>
    </div>
</section>

<?php
// Featured Slider Section
$featured_args = array(
    'post_type' => 'anime',
    'posts_per_page' => 3,
    'meta_key' => '_anime_badge',
    'orderby' => 'date',
    'order' => 'DESC'
);
$featured_query = new WP_Query($featured_args);

if ($featured_query->have_posts()) : ?>
<section class="slider-section">
    <div class="slider-container">
        <div class="slider">
            <?php while ($featured_query->have_posts()) : $featured_query->the_post(); 
                $episodes = get_post_meta(get_the_ID(), '_anime_episodes', true);
                $rating = get_post_meta(get_the_ID(), '_anime_rating', true);
                $bg_gradient = get_post_meta(get_the_ID(), '_anime_bg_gradient', true);
                if (!$bg_gradient) {
                    $bg_gradient = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
                }
            ?>
            <div class="slide">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('donghua-slider', array('class' => 'slide-bg')); ?>
                <?php else : ?>
                    <div class="slide-bg" style="background: <?php echo esc_attr($bg_gradient); ?>; display: flex; align-items: center; justify-content: center; font-size: 8rem;">⚔️</div>
                <?php endif; ?>
                <div class="slide-content">
                    <h2 class="slide-title"><?php the_title(); ?></h2>
                    <p class="slide-desc"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                    <div class="slide-meta">
                        <?php if ($episodes) : ?>
                        <span><i class="fas fa-play-circle"></i> <?php echo esc_html($episodes); ?></span>
                        <?php endif; ?>
                        <?php if ($rating) : ?>
                        <span><i class="fas fa-star"></i> <?php echo esc_html($rating); ?> <?php _e('Rating', 'donghua-hub'); ?></span>
                        <?php endif; ?>
                        <span><i class="fas fa-eye"></i> <?php echo get_post_meta(get_the_ID(), 'post_views_count', true) ?: '0'; ?> <?php _e('Views', 'donghua-hub'); ?></span>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <button class="slider-btn prev"><i class="fas fa-chevron-left"></i></button>
        <button class="slider-btn next"><i class="fas fa-chevron-right"></i></button>
    </div>
    <div class="slider-dots">
        <?php for ($i = 0; $i < $featured_query->post_count; $i++) : ?>
        <span class="dot <?php echo $i === 0 ? 'active' : ''; ?>" data-index="<?php echo $i; ?>"></span>
        <?php endfor; ?>
    </div>
</section>
<?php endif; ?>

<div class="container">
    <h2 class="section-title"><?php _e('Popular Categories', 'donghua-hub'); ?></h2>
    <div class="categories">
        <span class="category-tag active" data-genre="all"><?php _e('All', 'donghua-hub'); ?></span>
        <?php
        $genres = get_terms(array(
            'taxonomy' => 'genre',
            'hide_empty' => true,
        ));
        
        if (!empty($genres) && !is_wp_error($genres)) :
            foreach ($genres as $genre) : ?>
                <span class="category-tag" data-genre="<?php echo esc_attr($genre->slug); ?>">
                    <?php echo esc_html($genre->name); ?>
                </span>
            <?php endforeach;
        endif; ?>
    </div>

    <h2 class="section-title"><?php _e('Latest Releases', 'donghua-hub'); ?></h2>
    <div class="anime-grid" id="anime-grid">
        <?php
        $args = array(
            'post_type' => 'anime',
            'posts_per_page' => 12,
            'orderby' => 'date',
            'order' => 'DESC'
        );
        
        $anime_query = new WP_Query($args);
        
        if ($anime_query->have_posts()) :
            while ($anime_query->have_posts()) : $anime_query->the_post();
                get_template_part('template-parts/content', 'anime-card');
            endwhile;
            wp_reset_postdata();
        else : ?>
            <p><?php _e('No anime found. Please add some anime posts from the WordPress admin.', 'donghua-hub'); ?></p>
        <?php endif; ?>
    </div>
    
    <?php
    // Pagination
    if ($anime_query->max_num_pages > 1) : ?>
        <div class="pagination">
            <?php
            echo paginate_links(array(
                'total' => $anime_query->max_num_pages,
                'prev_text' => '<i class="fas fa-chevron-left"></i>',
                'next_text' => '<i class="fas fa-chevron-right"></i>',
            ));
            ?>
        </div>
    <?php endif; ?>
</div>

<!-- Anime Detail Modal -->
<div class="modal-overlay" id="animeModal">
    <div class="modal">
        <button class="modal-close"><i class="fas fa-times"></i></button>
        <div class="modal-header">
            <div class="modal-header-bg" id="modalBg">🎬</div>
        </div>
        <div class="modal-body">
            <h2 class="modal-title" id="modalTitle"></h2>
            <div class="modal-meta">
                <div class="modal-meta-item">
                    <i class="fas fa-calendar"></i>
                    <span id="modalYear"></span>
                </div>
                <div class="modal-meta-item">
                    <i class="fas fa-film"></i>
                    <span id="modalEpisodes"></span>
                </div>
                <div class="modal-meta-item">
                    <i class="fas fa-star"></i>
                    <span id="modalRating"></span>
                </div>
                <div class="modal-meta-item">
                    <i class="fas fa-tag"></i>
                    <span id="modalGenre"></span>
                </div>
            </div>
            <p class="modal-description" id="modalDesc"></p>

            <div class="download-section">
                <h3><i class="fas fa-download"></i> <?php _e('Download Options', 'donghua-hub'); ?></h3>
                <div class="download-options" id="downloadOptions">
                    <!-- Download options will be loaded dynamically -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>