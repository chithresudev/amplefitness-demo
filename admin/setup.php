<?php
require_once __DIR__ . '/includes/data-store.php';
require_once __DIR__ . '/includes/auth.php';

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$currentUrl = $protocol . "://" . $_SERVER['HTTP_HOST'];

$settings = get_settings();
if (!empty($settings['admin_username']) && !empty($settings['admin_password_hash'])) {
    header('Location: ' . $currentUrl . '/admin/login.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm_password'] ?? '';

    if ($username === '' || strlen($username) < 3) {
        $error = 'Username must be at least 3 characters.';
    } elseif (strlen($password) < 8) {
        $error = 'Password must be at least 8 characters.';
    } elseif ($password !== $confirm) {
        $error = 'Passwords do not match.';
    } elseif (!data_dir_writable()) {
        $error = 'Could not write to the /data folder on the server. Check that it exists and is writable (e.g. chmod 755) by the web server user.';
    } else {
        $settings['admin_username'] = $username;
        $settings['admin_password_hash'] = password_hash($password, PASSWORD_BCRYPT);

        if (!save_settings($settings)) {
            $error = 'Could not save the account — check that data/settings.json exists and is writable by the web server user.';
        } else {
            header('Location: ' . $currentUrl . '/admin/login.php?created=1');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Create Admin Account — Ample Fitness Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&amp;family=Rubik:ital,wght@0,300..900;1,300..900&amp;display=swap" rel="stylesheet">
    <link href="<?php echo $currentUrl . '/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo $currentUrl . '/css/admin.css' ?>" rel="stylesheet">
</head>

<body class="admin-body">
    <div class="admin-login-wrap">
        <div class="admin-login-card">
            <h1>Create Admin Account</h1>
            <p>This is a one-time setup. Choose a username and password for the Ample Fitness admin panel.</p>

            <?php if ($error): ?>
                <div class="admin-alert admin-alert-danger"><?php echo htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST" class="admin-form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required minlength="3" value="<?php echo htmlspecialchars($_POST['username'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required minlength="8">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required minlength="8">
                </div>
                <button type="submit" class="admin-btn" style="width:100%;">Create Account</button>
            </form>
        </div>
    </div>
</body>

</html>
