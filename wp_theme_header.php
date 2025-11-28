<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="nav">
    <div class="logo">
        <?php if (has_custom_logo()) : ?>
            <?php the_custom_logo(); ?>
        <?php else : ?>
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
        <?php endif; ?>
    </div>
    
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_class' => 'nav-links',
        'container' => false,
        'fallback_cb' => 'donghua_hub_fallback_menu',
    ));
    ?>
</nav>

<?php
// Fallback menu if no menu is assigned
function donghua_hub_fallback_menu() {
    echo '<ul class="nav-links">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . __('Home', 'donghua-hub') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/anime/')) . '">' . __('Latest', 'donghua-hub') . '</a></li>';
    echo '<li><a href="#">' . __('Popular', 'donghua-hub') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/genre/')) . '">' . __('Genres', 'donghua-hub') . '</a></li>';
    echo '</ul>';
}
?>