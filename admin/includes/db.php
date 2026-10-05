<?php
// Shared PDO connection for form submissions (contact + voucher leads).

function db() {
    static $pdo = null;
    if ($pdo !== null) return $pdo;

    $configPath = __DIR__ . '/db-config.php';
    if (!file_exists($configPath)) {
        throw new RuntimeException('Missing admin/includes/db-config.php - copy db-config.sample.php and fill it in.');
    }
    $config = require $configPath;

    $dsn = sprintf(
        'mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4',
        $config['host'],
        $config['port'] ?? 3306,
        $config['database']
    );
    $pdo = new PDO($dsn, $config['username'], $config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    return $pdo;
}

function client_ip() {
    return substr($_SERVER['REMOTE_ADDR'] ?? '', 0, 45) ?: null;
}

function save_contact_lead($fname, $lname, $email, $phone, $message) {
    $stmt = db()->prepare(
        'INSERT INTO contact_leads (fname, lname, email, phone, message, ip_address)
         VALUES (?, ?, ?, ?, ?, ?)'
    );
    return $stmt->execute([$fname, $lname, $email, $phone, $message, client_ip()]);
}

function save_voucher_lead($name, $phone) {
    $stmt = db()->prepare('INSERT INTO voucher_leads (name, phone, ip_address) VALUES (?, ?, ?)');
    return $stmt->execute([$name, $phone, client_ip()]);
}

function get_contact_leads() {
    return db()->query('SELECT * FROM contact_leads ORDER BY created_at DESC, id DESC')->fetchAll();
}

function get_voucher_leads() {
    return db()->query('SELECT * FROM voucher_leads ORDER BY created_at DESC, id DESC')->fetchAll();
}

function count_leads($table) {
    if (!in_array($table, ['contact_leads', 'voucher_leads'], true)) return 0;
    return (int) db()->query("SELECT COUNT(*) FROM {$table}")->fetchColumn();
}
