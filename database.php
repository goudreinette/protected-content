<?php namespace ProtectedContent;



function get_protected_content_meta($page_id)
{
    return get_post_meta($page_id, 'protected_content')[0] ?: [];
}

function get_access_code($page_id)
{
    return get_protected_content_meta($page_id)['code'];
}


function is_protected_page($page_id)
{
    return get_post_meta($page_id, 'protected_content')[0]['enabled'];
}

function verify_access_code($page_id, $access_code)
{
    $actual = get_access_code($page_id);
    return $actual == $access_code;
}

function default_meta()
{
    return [
        'code' => random_int(10000, 99999),
        'enabled' => false
    ];
}
