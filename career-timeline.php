<?php
/**
 * Plugin Name: Career Timeline for Elementor
 * Description: Dynamic Elementor Career Snapshot timeline with repeater and styling controls.
 * Version: 1.3.0
 * Requires Plugins: elementor
 * Author: Drunall Technologies
 */
if (!defined('ABSPATH')) exit;
add_action('elementor/widgets/register', function($manager) {
    if (!class_exists('\\Elementor\\Widget_Base')) return;
    require_once __DIR__ . '/widget-career-timeline.php';
    $manager->register(new \Career_Timeline_Widget());
});
add_action('wp_enqueue_scripts', function() {
    wp_register_style('career-timeline', plugins_url('assets/timeline.css', __FILE__), [], '1.3.0');
    wp_register_script('career-timeline', plugins_url('assets/timeline.js', __FILE__), [], '1.3.0', true);
});
