<?php
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$currentUrl = $protocol . "://" . $_SERVER['HTTP_HOST'];
$adminActive = $adminActive ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) . ' — ' : ''; ?>Ample Fitness Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&amp;family=Rubik:ital,wght@0,300..900;1,300..900&amp;display=swap" rel="stylesheet">
    <link href="<?php echo $currentUrl . '/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo $currentUrl . '/css/admin.css' ?>" rel="stylesheet">
</head>

<body class="admin-body">
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <a href="<?php echo $currentUrl . '/admin/index.php' ?>" class="admin-logo">Ample<span>Admin</span></a>
            <nav class="admin-nav">
                <a href="<?php echo $currentUrl . '/admin/index.php' ?>" class="<?php echo $adminActive === 'dashboard' ? 'active' : '' ?>">Dashboard</a>
                <a href="<?php echo $currentUrl . '/admin/gallery.php' ?>" class="<?php echo $adminActive === 'gallery' ? 'active' : '' ?>">Gallery</a>
                <a href="<?php echo $currentUrl . '/admin/contact-leads.php' ?>" class="<?php echo $adminActive === 'contact-leads' ? 'active' : '' ?>">Contact Enquiries</a>
                <a href="<?php echo $currentUrl . '/admin/voucher-leads.php' ?>" class="<?php echo $adminActive === 'voucher-leads' ? 'active' : '' ?>">Voucher Signups</a>
                <a href="<?php echo $currentUrl . '/admin/settings.php' ?>" class="<?php echo $adminActive === 'settings' ? 'active' : '' ?>">Settings</a>
                <a href="<?php echo $currentUrl . '/admin/logout.php' ?>">Logout</a>
            </nav>
        </aside>
        <main class="admin-main">