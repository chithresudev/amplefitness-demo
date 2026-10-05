<?php
// One-time import of the old JSON lead files into MySQL.
// Run from the project root:  php database/migrate-json-leads.php
if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit;
}

require_once __DIR__ . '/../admin/includes/data-store.php';
require_once __DIR__ . '/../admin/includes/db.php';

$pdo = db();

// The JSON files stored htmlspecialchars()-encoded values; the DB stores raw text
// and escapes on output, so decode while importing.
$decode = function ($v) { return html_entity_decode((string) $v, ENT_QUOTES); };

$contact = $pdo->prepare(
    'INSERT INTO contact_leads (fname, lname, email, phone, message, created_at) VALUES (?, ?, ?, ?, ?, ?)'
);
$contactCount = 0;
foreach (read_json('contact-leads.json', []) as $lead) {
    $contact->execute([
        $decode($lead['fname'] ?? ''),
        $decode($lead['lname'] ?? ''),
        $lead['email'] ?? '',
        $decode($lead['phone'] ?? ''),
        $decode($lead['message'] ?? ''),
        $lead['created_at'] ?? date('Y-m-d H:i:s'),
    ]);
    $contactCount++;
}

$voucher = $pdo->prepare('INSERT INTO voucher_leads (name, phone, created_at) VALUES (?, ?, ?)');
$voucherCount = 0;
foreach (read_json('voucher-leads.json', []) as $lead) {
    $voucher->execute([
        $decode($lead['name'] ?? ''),
        $lead['phone'] ?? '',
        $lead['created_at'] ?? date('Y-m-d H:i:s'),
    ]);
    $voucherCount++;
}

echo "Imported {$contactCount} contact leads and {$voucherCount} voucher leads.\n";
