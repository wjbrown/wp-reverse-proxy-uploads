<?php
/*
    Plugin Name: WP Reverse Proxy Uploads
    Plugin URI: https://github.com/wjbrown/wp-reverse-proxy-uploads
    description: Allows you to specify a reverse proxy (like AWS cloudfront) to serve attachment files.
    Version: 1.0
    Author: wjbrown
    Author URI: http://github.com/wjbrown
    License: MIT
*/

if(!defined('WP_REVERSE_PROXY_BASE_URL')) {
    define('WP_REVERSE_PROXY_BASE_URL', false);
}

function reverse_proxy_attachment_url($url)
{
    $parsed = parse_url($url);

    $new_url = $parsed['scheme'] . "://" . WP_REVERSE_PROXY_BASE_URL . $parsed['path'];

    if ($parsed['query']) {
        $new_url .= '?' . $parsed['query'];
    }
    
    return $new_url;
}

if (WP_REVERSE_PROXY_BASE_URL) {
    add_filter('wp_get_attachment_url', 'reverse_proxy_attachment_url');
}
