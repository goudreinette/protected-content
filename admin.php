<?php namespace ProtectedContent;


/**
 * In this module:
 *
 * The admin meta box, random access code generation
 */


add_action('add_meta_boxes', 'ProtectedContent\register_meta_box');
add_action("save_post", function ($post_id) {
    save_meta_box($post_id);
});


function register_meta_box()
{
    add_meta_box("protected-content", "Access Code", 'ProtectedContent\show_meta_box', "portfolio", "side", "default", null);
}

function show_meta_box()
{
    global $post;

    $actual = get_post_meta($post->ID, 'protected_content')[0] ?: [];

    $assigns = array_merge(default_meta(), $actual);

    require plugin_dir_path(__FILE__) . 'meta_box.php';
}

function save_meta_box($post_id)
{
    $new_meta_value = [
        'enabled' => !!$_POST['pc_enabled'],
        'code' => $_POST['pc_code'],
    ];
    update_post_meta($post_id, 'protected_content', $new_meta_value);
}
