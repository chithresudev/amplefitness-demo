<?php
require_once __DIR__ . '/../admin/includes/data-store.php';
require_once __DIR__ . '/../admin/includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rawName = trim($_POST["voucher_name"] ?? "");
    $phone   = trim($_POST["voucher_phone"] ?? "");

    if ($rawName === "" || !preg_match('/^[6-9][0-9]{9}$/', $phone)) {
        echo "error";
        exit;
    }

    // If the DB is down, still send the notification email so the lead isn't lost.
    try {
        save_voucher_lead($rawName, $phone);
    } catch (Throwable $e) {
        error_log('voucher_leads insert failed: ' . $e->getMessage());
    }

    $name = htmlspecialchars($rawName);

    $settings = get_settings();
    $to      = $settings['notify_email'];
    $subject = "New Discount Voucher Request From Ample fitness website";

    $body = "
    <html>
    <head>
      <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #f2f2f2; }
      </style>
    </head>
    <body>
      <h2>New Discount Voucher Request</h2>
      <table>
        <tr><th>Name</th><td>{$name}</td></tr>
        <tr><th>Phone</th><td>{$phone}</td></tr>
      </table>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: Ample Fitness Website <{$settings['from_email']}>\r\n";

    $mailSent = mail($to, $subject, $body, $headers);

    echo $mailSent ? "success" : "error";
}
