<?php
function extract_youtube_id($url) {
    $patterns = [
        '~youtu\.be/([A-Za-z0-9_-]{11})~',
        '~youtube\.com/watch\?v=([A-Za-z0-9_-]{11})~',
        '~youtube\.com/shorts/([A-Za-z0-9_-]{11})~',
        '~youtube\.com/embed/([A-Za-z0-9_-]{11})~',
    ];
    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }
    }
    return null;
}

function is_instagram_url($url) {
    $host = parse_url($url, PHP_URL_HOST);
    return $host && preg_match('/(^|\.)instagram\.com$/', $host);
}
