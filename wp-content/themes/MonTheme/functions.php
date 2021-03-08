<?php

namespace App;

function myTheme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

function myTheme_register_assets() {
    wp_register_style('Bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css');
    wp_register_script('Bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js', ['Popper'], false, true);
    wp_register_script('Popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js', [], false, true);
    wp_enqueue_style('Bootstrap');
    wp_enqueue_script('Bootstrap');
}

function myTheme_title_separator() {
    return '|';
}

add_action('after_setup_theme', 'App\myTheme_support');
add_action('wp_enqueue_scripts', 'App\myTheme_register_assets');
add_filter('document_title_separator', 'App\myTheme_title_separator');
