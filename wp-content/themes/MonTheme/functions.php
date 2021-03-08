<?php

namespace App;

function myTheme_support() {
    add_theme_support('title-tag');
}

function myTheme_register_assets() {
    wp_register_style('Bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css');
    wp_enqueue_style('Bootstrap');
}



add_action('after_setup_theme', 'App\myTheme_support');
add_action('wp_enqueue_scripts', 'App\myTheme_register_assets');

?>