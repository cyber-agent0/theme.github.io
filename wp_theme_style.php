/*
Theme Name: Donghua Hub
Theme URI: https://donghuahub.com
Author: Your Name
Author URI: https://yoursite.com
Description: A modern WordPress theme for Chinese Anime (Donghua) downloads with gradient design and interactive features
Version: 1.0.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: donghua-hub
Tags: entertainment, anime, gradient, modern, responsive
*/

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
    color: #fff;
    overflow-x: hidden;
}

.nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem 5%;
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    position: sticky;
    top: 0;
    z-index: 1000;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.logo {
    font-size: 1.8rem;
    font-weight: 700;
    background: linear-gradient(45deg, #ff6b6b, #ee5a6f);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: glow 2s ease-in-out infinite;
}

@keyframes glow {
    0%, 100% { filter: drop-shadow(0 0 5px rgba(255, 107, 107, 0.5)); }
    50% { filter: drop-shadow(0 0 15px rgba(255, 107, 107, 0.8)); }
}

.nav-links {
    display: flex;
    gap: 2rem;
    list-style: none;
}

.nav-links a {
    color: #fff;
    text-decoration: none;
    transition: all 0.3s;
    position: relative;
}

.nav-links a::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 0;
    height: 2px;
    background: #ff6b6b;
    transition: width 0.3s;
}

.nav-links a:hover::after {
    width: 100%;
}

.hero {
    text-align: center;
    padding: 4rem 5% 2rem;
    animation: fadeIn 1s ease-in;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.hero h1 {
    font-size: 3.5rem;
    margin-bottom: 1rem;
    background: linear-gradient(45deg, #fff, #ff6b6b);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero p {
    font-size: 1.2rem;
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 2rem;
}

.search-bar {
    max-width: 600px;
    margin: 0 auto;
    position: relative;
}

.search-bar input {
    width: 100%;
    padding: 1rem 3rem 1rem 1.5rem;
    border: 2px solid rgba(255, 255, 255, 0.1);
    background: rgba(255, 255, 255, 0.05);
    border-radius: 50px;
    color: #fff;
    font-size: 1rem;
    outline: none;
    transition: all 0.3s;
}

.search-bar input:focus {
    border-color: #ff6b6b;
    background: rgba(255, 255, 255, 0.1);
}

.search-bar button {
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
    background: linear-gradient(45deg, #ff6b6b, #ee5a6f);
    border: none;
    padding: 0.8rem 2rem;
    border-radius: 50px;
    color: #fff;
    cursor: pointer;
    transition: all 0.3s;
}

.search-bar button:hover {
    transform: translateY(-50%) scale(1.05);
    box-shadow: 0 5px 20px rgba(255, 107, 107, 0.4);
}

.slider-section {
    padding: 2rem 5%;
    max-width: 1400px;
    margin: 0 auto;
}

.slider-container {
    position: relative;
    overflow: hidden;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
}

.slider {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.slide {
    min-width: 100%;
    position: relative;
    height: 450px;
}

.slide-bg {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.slide-content {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 3rem;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.9));
}

.slide-title {
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
    text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
}

.slide-desc {
    font-size: 1.1rem;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 1rem;
    max-width: 600px;
}

.slide-meta {
    display: flex;
    gap: 1.5rem;
    color: rgba(255, 255, 255, 0.7);
}

.slide-meta span {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.slider-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 107, 107, 0.8);
    border: none;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    color: #fff;
    font-size: 1.2rem;
    cursor: pointer;
    transition: all 0.3s;
    z-index: 10;
}

.slider-btn:hover {
    background: #ff6b6b;
    transform: translateY(-50%) scale(1.1);
}

.slider-btn.prev {
    left: 20px;
}

.slider-btn.next {
    right: 20px;
}

.slider-dots {
    display: flex;
    justify-content: center;
    gap: 10px;
    padding: 1.5rem 0;
}

.dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    cursor: pointer;
    transition: all 0.3s;
}

.dot.active {
    background: #ff6b6b;
    transform: scale(1.2);
}

.container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 3rem 5%;
}

.section-title {
    font-size: 2rem;
    margin-bottom: 2rem;
    position: relative;
    display: inline-block;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 60px;
    height: 3px;
    background: linear-gradient(45deg, #ff6b6b, #ee5a6f);
}

.anime-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.anime-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s;
    cursor: pointer;
    border: 1px solid rgba(255, 255, 255, 0.1);
    animation: slideUp 0.5s ease-out;
    text-decoration: none;
    color: #fff;
    display: block;
}

@keyframes slideUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.anime-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
    border-color: #ff6b6b;
}

.anime-img {
    width: 100%;
    height: 350px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    position: relative;
    overflow: hidden;
}

.anime-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.anime-img::before {
    content: '🎬';
    animation: float 3s ease-in-out infinite;
}

.anime-img.has-thumbnail::before {
    display: none;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.anime-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: linear-gradient(45deg, #ff6b6b, #ee5a6f);
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
}

.anime-rating {
    position: absolute;
    top: 10px;
    left: 10px;
    background: rgba(0, 0, 0, 0.7);
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    gap: 5px;
}

.anime-rating i {
    color: #ffc107;
}

.anime-info {
    padding: 1.5rem;
}

.anime-title {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.anime-meta {
    display: flex;
    justify-content: space-between;
    color: rgba(255, 255, 255, 0.6);
    font-size: 0.9rem;
}

.categories {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    margin: 2rem 0;
}

.category-tag {
    padding: 0.5rem 1.5rem;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 25px;
    cursor: pointer;
    transition: all 0.3s;
}

.category-tag:hover, .category-tag.active {
    background: linear-gradient(45deg, #ff6b6b, #ee5a6f);
    border-color: transparent;
    transform: scale(1.05);
}

.modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    z-index: 2000;
    align-items: center;
    justify-content: center;
    animation: fadeIn 0.3s ease;
}

.modal-overlay.active {
    display: flex;
}

.modal {
    background: linear-gradient(135deg, #1a1a2e, #16213e);
    border-radius: 20px;
    max-width: 900px;
    width: 90%;
    max-height: 90vh;
    overflow-y: auto;
    position: relative;
    border: 1px solid rgba(255, 255, 255, 0.1);
    animation: modalSlide 0.4s ease;
}

@keyframes modalSlide {
    from { opacity: 0; transform: scale(0.9) translateY(50px); }
    to { opacity: 1; transform: scale(1) translateY(0); }
}

.modal-close {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(255, 107, 107, 0.8);
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    color: #fff;
    font-size: 1.2rem;
    cursor: pointer;
    z-index: 10;
    transition: all 0.3s;
}

.modal-close:hover {
    background: #ff6b6b;
    transform: rotate(90deg);
}

.modal-header {
    height: 300px;
    position: relative;
    overflow: hidden;
}

.modal-header-bg {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 5rem;
}

.modal-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 150px;
    background: linear-gradient(transparent, #1a1a2e);
}

.modal-body {
    padding: 2rem;
}

.modal-title {
    font-size: 2rem;
    margin-bottom: 1rem;
    background: linear-gradient(45deg, #fff, #ff6b6b);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.modal-meta {
    display: flex;
    gap: 2rem;
    margin-bottom: 1.5rem;
    flex-wrap: wrap;
}

.modal-meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: rgba(255, 255, 255, 0.7);
}

.modal-meta-item i {
    color: #ff6b6b;
}

.modal-description {
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.8;
    margin-bottom: 2rem;
}

.download-section {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
    padding: 1.5rem;
    margin-top: 1.5rem;
}

.download-section h3 {
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.download-options {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
}

.download-option {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    padding: 1rem;
    text-align: center;
    transition: all 0.3s;
    cursor: pointer;
}

.download-option:hover {
    border-color: #ff6b6b;
    background: rgba(255, 107, 107, 0.1);
    transform: translateY(-5px);
}

.download-option .quality {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.download-option .size {
    color: rgba(255, 255, 255, 0.6);
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

.download-btn {
    background: linear-gradient(45deg, #ff6b6b, #ee5a6f);
    border: none;
    padding: 0.8rem 1.5rem;
    border-radius: 25px;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.download-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 20px rgba(255, 107, 107, 0.4);
}

footer {
    background: linear-gradient(180deg, transparent, rgba(0, 0, 0, 0.5));
    margin-top: 4rem;
    position: relative;
    overflow: hidden;
}

.footer-characters {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 0;
}

.character-left {
    position: absolute;
    left: -20px;
    bottom: -20px;
    font-size: 200px;
    opacity: 0.15;
    transform: scaleX(-1);
    animation: floatCharLeft 6s ease-in-out infinite;
}

.character-right {
    position: absolute;
    right: -20px;
    bottom: -20px;
    font-size: 200px;
    opacity: 0.15;
    animation: floatCharRight 6s ease-in-out infinite;
}

@keyframes floatCharLeft {
    0%, 100% { transform: scaleX(-1) translateY(0); }
    50% { transform: scaleX(-1) translateY(-20px); }
}

@keyframes floatCharRight {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

.footer-content {
    position: relative;
    z-index: 1;
    max-width: 1400px;
    margin: 0 auto;
    padding: 4rem 5% 2rem;
}

.footer-main {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 3rem;
    margin-bottom: 3rem;
}

.footer-section h3 {
    font-size: 1.3rem;
    margin-bottom: 1.5rem;
    color: #ff6b6b;
    position: relative;
    display: inline-block;
}

.footer-section h3::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 40px;
    height: 2px;
    background: #ff6b6b;
}

.footer-about p {
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.8;
    margin-bottom: 1.5rem;
}

.footer-logo {
    font-size: 2rem;
    font-weight: 700;
    background: linear-gradient(45deg, #ff6b6b, #ee5a6f);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1rem;
    display: inline-block;
}

.footer-links {
    list-style: none;
}

.footer-links li {
    margin-bottom: 0.8rem;
}

.footer-links a {
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.footer-links a:hover {
    color: #ff6b6b;
    transform: translateX(5px);
}

.footer-links a i {
    width: 20px;
    text-align: center;
}

.social-icons {
    display: flex;
    gap: 1rem;
    margin-top: 1.5rem;
    flex-wrap: wrap;
}

.social-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 1.3rem;
    transition: all 0.3s;
    cursor: pointer;
    border: 2px solid transparent;
    text-decoration: none;
}

.social-icon:hover {
    transform: translateY(-5px) rotate(10deg);
    border-color: #ff6b6b;
}

.social-icon.facebook:hover { background: #1877f2; }
.social-icon.twitter:hover { background: #1da1f2; }
.social-icon.instagram:hover { background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); }
.social-icon.youtube:hover { background: #ff0000; }
.social-icon.discord:hover { background: #5865f2; }
.social-icon.telegram:hover { background: #0088cc; }
.social-icon.tiktok:hover { background: #000; border-color: #ff0050; }
.social-icon.weibo:hover { background: #e6162d; }

.newsletter {
    margin-top: 1rem;
}

.newsletter-form {
    display: flex;
    gap: 0.5rem;
    margin-top: 1rem;
}

.newsletter-form input {
    flex: 1;
    padding: 0.8rem 1rem;
    border: 1px solid rgba(255, 255, 255, 0.2);
    background: rgba(255, 255, 255, 0.05);
    border-radius: 25px;
    color: #fff;
    outline: none;
}

.newsletter-form input:focus {
    border-color: #ff6b6b;
}

.newsletter-form button {
    background: linear-gradient(45deg, #ff6b6b, #ee5a6f);
    border: none;
    padding: 0.8rem 1.5rem;
    border-radius: 25px;
    color: #fff;
    cursor: pointer;
    transition: all 0.3s;
}

.newsletter-form button:hover {
    transform: scale(1.05);
}

.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.footer-bottom p {
    color: rgba(255, 255, 255, 0.6);
}

.footer-bottom-links {
    display: flex;
    gap: 2rem;
}

.footer-bottom-links a {
    color: rgba(255, 255, 255, 0.6);
    text-decoration: none;
    transition: color 0.3s;
}

.footer-bottom-links a:hover {
    color: #ff6b6b;
}

@media (max-width: 768px) {
    .hero h1 { font-size: 2rem; }
    .nav-links { gap: 1rem; font-size: 0.9rem; }
    .anime-grid { grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); }
    .slide { height: 350px; }
    .slide-title { font-size: 1.5rem; }
    .modal { width: 95%; }
    .modal-header { height: 200px; }
    .character-left, .character-right { font-size: 120px; opacity: 0.1; }
    .footer-main { grid-template-columns: 1fr; }
    .footer-bottom { flex-direction: column; text-align: center; }
}

::-webkit-scrollbar {
    width: 10px;
}

::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.3);
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(45deg, #ff6b6b, #ee5a6f);
    border-radius: 10px;
}