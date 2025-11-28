jQuery(document).ready(function($) {
    'use strict';

    // Slider functionality
    const slider = $('.slider');
    const slides = $('.slide');
    const prevBtn = $('.slider-btn.prev');
    const nextBtn = $('.slider-btn.next');
    const dots = $('.dot');
    let currentSlide = 0;
    let autoSlideInterval;

    function goToSlide(index) {
        currentSlide = index;
        if (currentSlide < 0) currentSlide = slides.length - 1;
        if (currentSlide >= slides.length) currentSlide = 0;
        
        slider.css('transform', `translateX(-${currentSlide * 100}%)`);
        
        dots.each(function(i) {
            $(this).toggleClass('active', i === currentSlide);
        });
    }

    function nextSlide() {
        goToSlide(currentSlide + 1);
    }

    function prevSlide() {
        goToSlide(currentSlide - 1);
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(nextSlide, 5000);
    }

    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
    }

    if (slides.length > 0) {
        prevBtn.on('click', function() {
            prevSlide();
            stopAutoSlide();
            startAutoSlide();
        });

        nextBtn.on('click', function() {
            nextSlide();
            stopAutoSlide();
            startAutoSlide();
        });

        dots.on('click', function() {
            goToSlide(parseInt($(this).data('index')));
            stopAutoSlide();
            startAutoSlide();
        });

        startAutoSlide();
    }

    // Category filter
    $('.category-tag').on('click', function() {
        $('.category-tag').removeClass('active');
        $(this).addClass('active');
        
        const genre = $(this).data('genre');
        
        // Here you can add AJAX filtering if needed
        // For now, it just highlights the active category
    });

    // Anime card click - Open modal
    $(document).on('click', '.anime-card', function(e) {
        e.preventDefault();
        
        const postId = $(this).data('post-id');
        
        $.ajax({
            url: donghuaAjax.ajax_url,
            type: 'POST',
            data: {
                action: 'get_anime_details',
                post_id: postId,
                nonce: donghuaAjax.nonce
            },
            success: function(response) {
                if (response.success) {
                    const data = response.data;
                    
                    $('#modalTitle').text(data.title);
                    $('#modalYear').text(data.year);
                    $('#modalEpisodes').text(data.episodes);
                    $('#modalRating').text(data.rating);
                    $('#modalGenre').text(data.genre);
                    $('#modalDesc').text(data.description);
                    
                    if (data.bg_gradient) {
                        $('#modalBg').css('background', data.bg_gradient);
                    }
                    
                    // Load download options
                    let downloadHtml = '';
                    if (data.downloads) {
                        if (data.downloads['480p']) {
                            downloadHtml += `
                                <div class="download-option">
                                    <div class="quality">480p</div>
                                    <div class="size">${data.downloads['480p'].size}</div>
                                    <a href="${data.downloads['480p'].link}" class="download-btn" target="_blank">
                                        <i class="fas fa-download"></i> Download
                                    </a>
                                </div>
                            `;
                        }
                        if (data.downloads['720p']) {
                            downloadHtml += `
                                <div class="download-option">
                                    <div class="quality">720p</div>
                                    <div class="size">${data.downloads['720p'].size}</div>
                                    <a href="${data.downloads['720p'].link}" class="download-btn" target="_blank">
                                        <i class="fas fa-download"></i> Download
                                    </a>
                                </div>
                            `;
                        }
                        if (data.downloads['1080p']) {
                            downloadHtml += `
                                <div class="download-option">
                                    <div class="quality">1080p</div>
                                    <div class="size">${data.downloads['1080p'].size}</div>
                                    <a href="${data.downloads['1080p'].link}" class="download-btn" target="_blank">
                                        <i class="fas fa-download"></i> Download
                                    </a>
                                </div>
                            `;
                        }
                    }
                    
                    $('#downloadOptions').html(downloadHtml || '<p>No download links available yet.</p>');
                    
                    $('#animeModal').addClass('active');
                    $('body').css('overflow', 'hidden');
                }
            }
        });
    });

    // Close modal
    $('.modal-close').on('click', function() {
        $('#animeModal').removeClass('active');
        $('body').css('overflow', 'auto');
    });

    $('#animeModal').on('click', function(e) {
        if ($(e.target).is('#animeModal')) {
            $(this).removeClass('active');
            $('body').css('overflow', 'auto');
        }
    });

    // Search functionality
    let searchTimeout;
    $('#anime-search').on('input', function() {
        clearTimeout(searchTimeout);
        const searchTerm = $(this).val();
        
        if (searchTerm.length >= 3) {
            searchTimeout = setTimeout(function() {
                performSearch(searchTerm);
            }, 500);
        } else if (searchTerm.length === 0) {
            // Reset to show all anime
            location.reload();
        }
    });

    $('#search-btn').on('click', function() {
        const searchTerm = $('#anime-search').val();
        if (searchTerm.length >= 3) {
            performSearch(searchTerm);
        }
    });

    function performSearch(searchTerm) {
        $.ajax({
            url: donghuaAjax.ajax_url,
            type: 'POST',
            data: {
                action: 'donghua_search',
                search_term: searchTerm,
                nonce: donghuaAjax.nonce
            },
            beforeSend: function() {
                $('#anime-grid').html('<p>Searching...</p>');
            },
            success: function(response) {
                if (response.success) {
                    $('#anime-grid').html(response.data);
                    initAnimeCardAnimations();
                } else {
                    $('#anime-grid').html('<p>' + response.data + '</p>');
                }
            }
        });
    }

    // Anime card animation on scroll
    function initAnimeCardAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        $(entry.target).css('opacity', '1');
                        $(entry.target).css('animation', 'slideUp 0.5s ease-out forwards');
                    }, index * 100);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        $('.anime-card').each(function() {
            $(this).css('opacity', '0');
            observer.observe(this);
        });
    }

    initAnimeCardAnimations();

    // Newsletter form
    $('#newsletter-form').on('submit', function(e) {
        e.preventDefault();
        const $form = $(this);
        const $input = $form.find('input[type="email"]');
        const $button = $form.find('button');
        const originalHtml = $button.html();
        
        $button.html('<i class="fas fa-spinner fa-spin"></i>');
        
        setTimeout(function() {
            $button.html('<i class="fas fa-check"></i>');
            $input.val('');
            setTimeout(function() {
                $button.html(originalHtml);
            }, 2000);
        }, 1500);
    });

    // Download button interaction
    $(document).on('click', '.download-btn', function(e) {
        if (!$(this).attr('href') || $(this).attr('href') === '#') {
            e.preventDefault();
            const $btn = $(this);
            const originalText = $btn.html();
            $btn.html('<i class="fas fa-spinner fa-spin"></i> Preparing...');
            $btn.prop('disabled', true);
            setTimeout(function() {
                $btn.html('<i class="fas fa-check"></i> Ready!');
                setTimeout(function() {
                    $btn.html(originalText);
                    $btn.prop('disabled', false);
                }, 1500);
            }, 2000);
        }
    });
});

// AJAX handler for getting anime details (add to functions.php)
// This code should be added to functions.php
/*
function donghua_hub_get_anime_details() {
    check_ajax_referer('donghua_nonce', 'nonce');
    
    $post_id = intval($_POST['post_id']);
    $post = get_post($post_id);
    
    if ($post && $post->post_type === 'anime') {
        $episodes = get_post_meta($post_id, '_anime_episodes', true);
        $year = get_post_meta($post_id, '_anime_year', true);
        $rating = get_post_meta($post_id, '_anime_rating', true);
        $bg_gradient = get_post_meta($post_id, '_anime_bg_gradient', true);
        
        $genres = wp_get_post_terms($post_id, 'genre', array('fields' => 'names'));
        $genre_string = !empty($genres) ? implode(', ', $genres) : '';
        
        $downloads = array();
        
        $link_480p = get_post_meta($post_id, '_download_480p', true);
        $size_480p = get_post_meta($post_id, '_size_480p', true);
        if ($link_480p) {
            $downloads['480p'] = array(
                'link' => $link_480p,
                'size' => $size_480p ?: '~150 MB'
            );
        }
        
        $link_720p = get_post_meta($post_id, '_download_720p', true);
        $size_720p = get_post_meta($post_id, '_size_720p', true);
        if ($link_720p) {
            $downloads['720p'] = array(
                'link' => $link_720p,
                'size' => $size_720p ?: '~350 MB'
            );
        }
        
        $link_1080p = get_post_meta($post_id, '_download_1080p', true);
        $size_1080p = get_post_meta($post_id, '_size_1080p', true);
        if ($link_1080p) {
            $downloads['1080p'] = array(
                'link' => $link_1080p,
                'size' => $size_1080p ?: '~700 MB'
            );
        }
        
        $data = array(
            'title' => get_the_title($post_id),
            'year' => $year ?: '2024',
            'episodes' => $episodes ?: 'TBA',
            'rating' => $rating ?: 'N/A',
            'genre' => $genre_string ?: 'Uncategorized',
            'description' => get_the_excerpt($post_id) ?: get_the_content($post_id),
            'bg_gradient' => $bg_gradient,
            'downloads' => $downloads
        );
        
        wp_send_json_success($data);
    } else {
        wp_send_json_error('Anime not found');
    }
    
    wp_die();
}
add_action('wp_ajax_get_anime_details', 'donghua_hub_get_anime_details');
add_action('wp_ajax_nopriv_get_anime_details', 'donghua_hub_get_anime_details');
*/