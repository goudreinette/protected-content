<?php namespace ProtectedContent;

/**
 * Page
 */
global $post;
if (is_protected_page($post->ID)) {
    require plugin_dir_path(__FILE__) . 'page_template.php';
    load_scripts_styles($post->ID);
}


function load_scripts_styles($page_id)
{
    wp_enqueue_style('protected-content', plugin_dir_url(__FILE__) . 'css/index.css');
    wp_enqueue_style('animate', plugin_dir_url(__FILE__) . 'css/animate.css');
    wp_enqueue_script('protected-content', plugin_dir_url(__FILE__) . 'js/index.js');
    wp_localize_script('protected-content', 'data', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        'page_id' => $page_id
    ]);
}