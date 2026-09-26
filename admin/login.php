<?php
require_once __DIR__ . '/includes/data-store.php';
require_once __DIR__ . '/includes/auth.php';

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$currentUrl = $protocol . "://" . $_SERVER['HTTP_HOST'];

$settings = get_settings();
if (empty($settings['admin_username']) || empty($settings['admin_password_hash'])) {
    header('Location: ' . $currentUrl . '/admin/setup.php');
    exit;
}

if (is_admin_logged_in()) {
    header('Location: ' . $currentUrl . '/admin/index.php');
    exit;
}

$error = '';
$maxAttempts = 5;
$lockoutSeconds = 60;

if (!isset($_SESSION['login_attempts'])) $_SESSION['login_attempts'] = 0;
if (!isset($_SESSION['login_locked_until'])) $_SESSION['login_locked_until'] = 0;

$locked = $_SESSION['login_locked_until'] > time();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$locked) {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === $settings['admin_username'] && password_verify($password, $settings['admin_password_hash'])) {
        $_SESSION['login_attempts'] = 0;
        $_SESSION['admin_logged_in'] = true;
        session_regenerate_id(true);
        header('Location: ' . $currentUrl . '/admin/index.php');
        exit;
    } else {
        $_SESSION['login_attempts']++;
        if ($_SESSION['login_attempts'] >= $maxAttempts) {
            $_SESSION['login_locked_until'] = time() + $lockoutSeconds;
            $_SESSION['login_attempts'] = 0;
            $error = 'Too many failed attempts. Try again in a minute.';
        } else {
            $error = 'Invalid username or password.';
        }
    }
} elseif ($locked) {
    $error = 'Too many failed attempts. Try again in a minute.';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Login — Ample Fitness</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&amp;family=Rubik:ital,wght@0,300..900;1,300..900&amp;display=swap" rel="stylesheet">
    <link href="<?php echo $currentUrl . '/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo $currentUrl . '/css/admin.css' ?>" rel="stylesheet">
</head>

<body class="admin-body">
    <div class="admin-login-wrap">
        <div class="admin-login-card">
            <h1>Ample Fitness Admin</h1>
            <p>Sign in to manage the gallery, leads and settings.</p>

            <?php if (!empty($_GET['created'])): ?>
                <div class="admin-alert admin-alert-success">Admin account created. Please sign in.</div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="admin-alert admin-alert-danger"><?php echo htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST" class="admin-form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required <?php echo $locked ? 'disabled' : '' ?>>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required <?php echo $locked ? 'disabled' : '' ?>>
                </div>
                <button type="submit" class="admin-btn" style="width:100%;" <?php echo $locked ? 'disabled' : '' ?>>Sign In</button>
            </form>
        </div>
    </div>
</body>

</html>
