<?php
require_once __DIR__ . '/data-store.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function is_admin_logged_in() {
    return !empty($_SESSION['admin_logged_in']);
}

function require_admin_login($base_url) {
    $settings = get_settings();
    if (empty($settings['admin_username']) || empty($settings['admin_password_hash'])) {
        header('Location: ' . $base_url . '/admin/setup.php');
        exit;
    }
    if (!is_admin_logged_in()) {
        header('Location: ' . $base_url . '/admin/login.php');
        exit;
    }
}

function csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_check($token) {
    return !empty($_SESSION['csrf_token']) && is_string($token) && hash_equals($_SESSION['csrf_token'], $token);
}
