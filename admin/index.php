<?php
require_once __DIR__ . '/includes/data-store.php';
require_once __DIR__ . '/includes/auth.php';

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$currentUrl = $protocol . "://" . $_SERVER['HTTP_HOST'];
require_admin_login($currentUrl);

$gallery = read_json('gallery.json', []);
$contactLeads = read_json('contact-leads.json', []);
$voucherLeads = read_json('voucher-leads.json', []);
$settings = get_settings();

$pageTitle = 'Dashboard';
$adminActive = 'dashboard';
include __DIR__ . '/includes/layout-header.php';
?>

<div class="admin-topbar">
    <h1>Dashboard</h1>
    <span class="admin-badge">Signed in as <?php echo htmlspecialchars($settings['admin_username']) ?></span>
</div>

<div class="admin-stats">
    <div class="admin-stat">
        <div class="stat-value"><?php echo count($gallery) ?></div>
        <div class="stat-label">Gallery Images</div>
    </div>
    <div class="admin-stat">
        <div class="stat-value"><?php echo count($contactLeads) ?></div>
        <div class="stat-label">Contact Enquiries</div>
    </div>
    <div class="admin-stat">
        <div class="stat-value"><?php echo count($voucherLeads) ?></div>
        <div class="stat-label">Voucher Signups</div>
    </div>
</div>

<div class="admin-card">
    <p style="margin:0;color:var(--admin-text-dim);">
        Notification emails for new contact enquiries and voucher signups are currently sent to
        <strong style="color:var(--admin-text);"><?php echo htmlspecialchars($settings['notify_email']) ?></strong>.
        Change this on the <a href="<?php echo $currentUrl . '/admin/settings.php' ?>" style="color:var(--admin-accent);">Settings</a> page.
    </p>
</div>

<?php include __DIR__ . '/includes/layout-footer.php'; ?>
