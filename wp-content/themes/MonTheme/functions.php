<?php

namespace App;

function myTheme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
}

function myTheme_register_assets()
{
    wp_register_style('Bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css');
    wp_register_script('Bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js', ['Popper'], false, true);
    wp_register_script('Popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js', [], false, true);
    wp_enqueue_style('Bootstrap');
    wp_enqueue_script('Bootstrap');
}

function myTheme_title_separator()
{
    return '|';
}

function myTheme_menu_class(array $class): array
{
    $classes[] = 'nav_item';
    return $classes;
}

function myTheme_menu_link_class(array $attributes): array
{
    $attributes['class'] = 'nav-link';
    return $attributes;
}

function myTheme_pagiantion()
{
    $pages =  paginate_links(['type' => 'array']);
    if ($pages === null){
        return;
    }
    echo '<nav aria-label="Pagination" class="my-4">';
    echo '<ul class="pagination">';
    foreach ($pages as $page) {
        $active = strpos($page, 'current') !== false;
        $class = 'page-item';
        if ($active) {
            $class .= ' active';
        }
        echo '<li class="' . $class . '">';
        echo str_replace('page-numbers', 'page-link', $page); // Affichage de la valeur de page
        echo '</li>';
    }
    echo '</ul>';
    echo '</nav>';
}

add_action('after_setup_theme', 'App\myTheme_support');
add_action('wp_enqueue_scripts', 'App\myTheme_register_assets');
add_filter('document_title_separator', 'App\myTheme_title_separator');
add_filter('nav_menu_css_class', 'App\myTheme_menu_class');
add_filter('nav_menu_link_attributes', 'App\myTheme_menu_link_class');
