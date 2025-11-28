<?php
/**
 * Template part for displaying anime cards
 */

$episodes = get_post_meta(get_the_ID(), '_anime_episodes', true);
$rating = get_post_meta(get_the_ID(), '_anime_rating', true);
$badge = get_post_meta(get_the_ID(), '_anime_badge', true);
$bg_gradient = get_post_meta(get_the_ID(), '_anime_bg_gradient', true);

if (!$bg_gradient) {
    $bg_gradient = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
}
?>

<div class="anime-card" data-post-id="<?php the_ID(); ?>">
    <div class="anime-img <?php echo has_post_thumbnail() ? 'has-thumbnail' : ''; ?>" style="background: <?php echo esc_attr($bg_gradient); ?>;">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('donghua-card'); ?>
        <?php endif; ?>
        
        <?php if ($badge) : ?>
            <div class="anime-badge"><?php echo esc_html($badge); ?></div>
        <?php endif; ?>
        
        <?php if ($rating) : ?>
            <div class="anime-rating">
                <i class="fas fa-star"></i> <?php echo esc_html($rating); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="anime-info">
        <div class="anime-title"><?php the_title(); ?></div>
        <div class="anime-meta">
            <span><?php echo $episodes ? esc_html($episodes) : __('TBA', 'donghua-hub'); ?></span>
            <span>1080p</span>
        </div>
    </div>
</div>