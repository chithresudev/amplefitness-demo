<?php
require_once __DIR__ . '/includes/data-store.php';
require_once __DIR__ . '/includes/auth.php';

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$currentUrl = $protocol . "://" . $_SERVER['HTTP_HOST'];
require_admin_login($currentUrl);

$leads = read_json('voucher-leads.json', []);
usort($leads, function ($a, $b) {
    return strcmp($b['created_at'] ?? '', $a['created_at'] ?? '');
});

$pageTitle = 'Voucher Signups';
$adminActive = 'voucher-leads';
include __DIR__ . '/includes/layout-header.php';
?>

<div class="admin-topbar">
    <h1>Voucher Signups</h1>
</div>

<div class="admin-card">
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($leads)): ?>
                    <tr><td colspan="3" style="color:var(--admin-text-dim);">No voucher signups yet.</td></tr>
                <?php endif; ?>
                <?php foreach ($leads as $lead): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($lead['created_at'] ?? '') ?></td>
                        <td><?php echo htmlspecialchars($lead['name'] ?? '') ?></td>
                        <td><?php echo htmlspecialchars($lead['phone'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/includes/layout-footer.php'; ?>
