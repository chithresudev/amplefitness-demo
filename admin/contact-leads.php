<?php
require_once __DIR__ . '/includes/data-store.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/db.php';

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$currentUrl = $protocol . "://" . $_SERVER['HTTP_HOST'];
require_admin_login($currentUrl);

$leads = [];
$dbError = null;
try {
    $leads = get_contact_leads();
} catch (Throwable $e) {
    error_log('contact_leads read failed: ' . $e->getMessage());
    $dbError = 'Could not load enquiries from the database. Check admin/includes/db-config.php.';
}

$pageTitle = 'Contact Enquiries';
$adminActive = 'contact-leads';
include __DIR__ . '/includes/layout-header.php';
?>

<div class="admin-topbar">
    <h1>Contact Enquiries</h1>
</div>

<?php if ($dbError): ?>
    <div class="admin-card" style="color:#e74c3c;"><?php echo htmlspecialchars($dbError) ?></div>
<?php endif; ?>

<div class="admin-card">
    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($leads)): ?>
                    <tr><td colspan="5" style="color:var(--admin-text-dim);">No enquiries yet.</td></tr>
                <?php endif; ?>
                <?php foreach ($leads as $lead): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($lead['created_at'] ?? '') ?></td>
                        <td><?php echo htmlspecialchars(trim(($lead['fname'] ?? '') . ' ' . ($lead['lname'] ?? ''))) ?></td>
                        <td><?php echo htmlspecialchars($lead['email'] ?? '') ?></td>
                        <td><?php echo htmlspecialchars($lead['phone'] ?? '') ?></td>
                        <td><?php echo htmlspecialchars($lead['message'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/includes/layout-footer.php'; ?>
