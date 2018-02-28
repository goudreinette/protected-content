<?php namespace ProtectedContent;

/**
 * In this module: the ajax callbacks and queries.
 */
add_action('wp_ajax_nopriv_protected_content_validate_code', 'ProtectedContent\validate_code');
add_action('wp_ajax_protected_content_validate_code', 'ProtectedContent\validate_code');

function validate_code()
{
    $is_valid = verify_access_code($_POST['page_id'], $_POST['code']);
    wp_send_json($is_valid);
}