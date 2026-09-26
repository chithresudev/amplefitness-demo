<?php
define('DATA_DIR', dirname(__DIR__, 2) . '/data');

function ensure_data_dir() {
    if (!is_dir(DATA_DIR)) {
        @mkdir(DATA_DIR, 0755, true);
    }
    return is_dir(DATA_DIR);
}

function data_dir_writable() {
    return ensure_data_dir() && is_writable(DATA_DIR);
}

function data_path($name) {
    return DATA_DIR . '/' . $name;
}

function read_json($name, $default = []) {
    $path = data_path($name);
    if (!file_exists($path)) {
        return $default;
    }
    $fh = fopen($path, 'r');
    if (!$fh) return $default;
    flock($fh, LOCK_SH);
    $contents = stream_get_contents($fh);
    flock($fh, LOCK_UN);
    fclose($fh);
    $decoded = json_decode($contents, true);
    return is_array($decoded) ? $decoded : $default;
}

function write_json($name, $data) {
    if (!ensure_data_dir()) return false;
    $path = data_path($name);
    $fh = fopen($path, 'c');
    if (!$fh) return false;
    flock($fh, LOCK_EX);
    ftruncate($fh, 0);
    rewind($fh);
    fwrite($fh, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    fflush($fh);
    flock($fh, LOCK_UN);
    fclose($fh);
    return true;
}

function append_json($name, $entry) {
    if (!ensure_data_dir()) return false;
    $path = data_path($name);
    $fh = fopen($path, 'c+');
    if (!$fh) return false;
    flock($fh, LOCK_EX);
    $contents = stream_get_contents($fh);
    $items = json_decode($contents, true);
    if (!is_array($items)) $items = [];
    $items[] = $entry;
    ftruncate($fh, 0);
    rewind($fh);
    fwrite($fh, json_encode($items, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    fflush($fh);
    flock($fh, LOCK_UN);
    fclose($fh);
    return true;
}

function get_settings() {
    $defaults = [
        'notify_email' => 'chithresu@gmail.com',
        'from_email' => 'noreply@amplefitness.in',
        'discount_percent' => 30,
        'admin_username' => null,
        'admin_password_hash' => null,
    ];
    return array_merge($defaults, read_json('settings.json', []));
}

function save_settings($settings) {
    return write_json('settings.json', $settings);
}
