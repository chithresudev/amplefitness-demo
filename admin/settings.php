<?php
require_once __DIR__ . '/includes/data-store.php';
require_once __DIR__ . '/includes/auth.php';

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$currentUrl = $protocol . "://" . $_SERVER['HTTP_HOST'];
require_admin_login($currentUrl);

$settings = get_settings();
$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_check($_POST['csrf_token'] ?? '')) {
        $message = 'Session expired, please try again.';
        $messageType = 'danger';
    } elseif (($_POST['form'] ?? '') === 'email') {
        $email = filter_var(trim($_POST['notify_email'] ?? ''), FILTER_VALIDATE_EMAIL);
        $fromEmail = filter_var(trim($_POST['from_email'] ?? ''), FILTER_VALIDATE_EMAIL);
        if (!$email) {
            $message = 'Please enter a valid notification email address.';
            $messageType = 'danger';
        } elseif (!$fromEmail) {
            $message = 'Please enter a valid sender (From) email address.';
            $messageType = 'danger';
        } else {
            $settings['notify_email'] = $email;
            $settings['from_email'] = $fromEmail;
            save_settings($settings);
            $message = 'Email settings updated.';
            $messageType = 'success';
        }
    } elseif (($_POST['form'] ?? '') === 'discount') {
        $percent = (int) ($_POST['discount_percent'] ?? 0);
        if ($percent < 1 || $percent > 90) {
            $message = 'Enter a discount percentage between 1 and 90.';
            $messageType = 'danger';
        } else {
            $settings['discount_percent'] = $percent;
            save_settings($settings);
            $message = 'Voucher discount updated.';
            $messageType = 'success';
        }
    } elseif (($_POST['form'] ?? '') === 'password') {
        $current = $_POST['current_password'] ?? '';
        $new = $_POST['new_password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        if (!password_verify($current, $settings['admin_password_hash'])) {
            $message = 'Current password is incorrect.';
            $messageType = 'danger';
        } elseif (strlen($new) < 8) {
            $message = 'New password must be at least 8 characters.';
            $messageType = 'danger';
        } elseif ($new !== $confirm) {
            $message = 'New passwords do not match.';
            $messageType = 'danger';
        } else {
            $settings['admin_password_hash'] = password_hash($new, PASSWORD_BCRYPT);
            save_settings($settings);
            $message = 'Password updated.';
            $messageType = 'success';
        }
    }
}

$settings = get_settings();

$pageTitle = 'Settings';
$adminActive = 'settings';
include __DIR__ . '/includes/layout-header.php';
?>

<div class="admin-topbar">
    <h1>Settings</h1>
</div>

<?php if ($message): ?>
    <div class="admin-alert admin-alert-<?php echo $messageType ?>"><?php echo htmlspecialchars($message) ?></div>
<?php endif; ?>

<div class="admin-card">
    <h3 style="margin-top:0;">Email Settings</h3>
    <p style="color:var(--admin-text-dim);font-size:14px;">Contact form and voucher signups are emailed to the notification address below. The sender (From) address must be on your own domain (e.g. @amplefitness.in) or most inboxes will flag these emails as spam.</p>
    <form method="POST" class="admin-form">
        <input type="hidden" name="csrf_token" value="<?php echo csrf_token() ?>">
        <input type="hidden" name="form" value="email">
        <div class="form-group">
            <label for="notify_email">Notification Email (where leads are sent)</label>
            <input type="email" id="notify_email" name="notify_email" required value="<?php echo htmlspecialchars($settings['notify_email']) ?>">
        </div>
        <div class="form-group">
            <label for="from_email">Sender / From Email (must be on your domain)</label>
            <input type="email" id="from_email" name="from_email" required value="<?php echo htmlspecialchars($settings['from_email']) ?>">
        </div>
        <button type="submit" class="admin-btn">Save Email Settings</button>
    </form>
</div>

<div class="admin-card">
    <h3 style="margin-top:0;">Voucher Popup Discount</h3>
    <p style="color:var(--admin-text-dim);font-size:14px;">Controls the "% OFF" figure shown on the homepage voucher popup.</p>
    <form method="POST" class="admin-form">
        <input type="hidden" name="csrf_token" value="<?php echo csrf_token() ?>">
        <input type="hidden" name="form" value="discount">
        <div class="form-group">
            <label for="discount_percent">Discount Percentage</label>
            <input type="number" id="discount_percent" name="discount_percent" min="1" max="90" required value="<?php echo (int) $settings['discount_percent'] ?>">
        </div>
        <button type="submit" class="admin-btn">Save Discount</button>
    </form>
</div>

<div class="admin-card">
    <h3 style="margin-top:0;">Change Password</h3>
    <form method="POST" class="admin-form">
        <input type="hidden" name="csrf_token" value="<?php echo csrf_token() ?>">
        <input type="hidden" name="form" value="password">
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input type="password" id="current_password" name="current_password" required>
        </div>
        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" id="new_password" name="new_password" required minlength="8">
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm New Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required minlength="8">
        </div>
        <button type="submit" class="admin-btn">Update Password</button>
    </form>
</div>

<?php include __DIR__ . '/includes/layout-footer.php'; ?>
