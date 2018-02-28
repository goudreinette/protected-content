<?php namespace ProtectedContent;

/*
Plugin Name: Protected Content
Plugin URI: --
Description: Protect pages with auto-generated passwords
Version: 1.0
Author: reinvdwoerd
Author URI: reinvdwoerd.herokuapp.con
License: --
*/

require plugin_dir_path(__FILE__) . 'database.php';
require plugin_dir_path(__FILE__) . 'ajax.php';


/**
 * In this module: initialization, expiration date, load frontend if protected page
 */
add_action('admin_init', function () {
    require plugin_dir_path(__FILE__) . 'admin.php';
});


add_action('wp', function () {
    global $post;
    if ($post->post_type == 'portfolio' && !is_admin())
        require plugin_dir_path(__FILE__) . 'page.php';
});
