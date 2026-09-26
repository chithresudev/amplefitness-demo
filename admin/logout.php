<?php
require_once __DIR__ . '/includes/auth.php';

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$currentUrl = $protocol . "://" . $_SERVER['HTTP_HOST'];

$_SESSION = [];
session_destroy();

header('Location: ' . $currentUrl . '/admin/login.php');
exit;
