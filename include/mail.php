<?php
require_once __DIR__ . '/../admin/includes/data-store.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $fname   = htmlspecialchars(trim($_POST["fname"]));
    $lname   = htmlspecialchars(trim($_POST["lname"]));
    $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone   = htmlspecialchars(trim($_POST["phone"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    append_json('contact-leads.json', [
        'id' => time() . '-' . bin2hex(random_bytes(4)),
        'fname' => $fname,
        'lname' => $lname,
        'email' => $email,
        'phone' => $phone,
        'message' => $message,
        'created_at' => date('Y-m-d H:i:s'),
    ]);

    $settings = get_settings();
    $fromEmail = $settings['from_email'];

    // ========== 1. Email to Site Owner ==========
    $to = $settings['notify_email'];
    $subject = "New Contact Form Submission From Ample fitness website";

    $adminBody = "
    <html>
    <head>
      <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #f2f2f2; }
      </style>
    </head>
    <body>
      <h2>New Contact Form Submission Ample fitness website</h2>
      <table>
        <tr><th>First Name</th><td>{$fname}</td></tr>
        <tr><th>Last Name</th><td>{$lname}</td></tr>
        <tr><th>Email</th><td>{$email}</td></tr>
        <tr><th>Phone</th><td>{$phone}</td></tr>
        <tr><th>Message</th><td>{$message}</td></tr>
      </table>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: Ample Fitness Website <{$fromEmail}>\r\n";
    $headers .= "Reply-To: {$fname} {$lname} <{$email}>\r\n";

    $adminMailSent = mail($to, $subject, $adminBody, $headers, "-f{$fromEmail}");

    // ========== 2. Confirmation Email to User ==========
    $userSubject = "Thanks for contacting us!";

    $userBody = "
    <html>
    <body>
      <p>Dear {$fname},</p>
      <p>Thank you for getting in touch with us. We have received your message and will respond as soon as possible.</p>
      <br>
      <p>Best Regards,<br>Team Support Ample Fitness</p>
    </body>
    </html>
    ";

    $userHeaders = "MIME-Version: 1.0\r\n";
    $userHeaders .= "Content-type:text/html;charset=UTF-8\r\n";
    $userHeaders .= "From: Ample Fitness <{$fromEmail}>\r\n";

    mail($email, $userSubject, $userBody, $userHeaders, "-f{$fromEmail}");

    // The lead is already saved above regardless of mail delivery. The admin
    // notification is the business-critical send; the customer confirmation
    // is best-effort and must not block a successful submission if it fails
    // (e.g. a bad/unreachable customer email address).
    if ($adminMailSent) {
        echo "success";
    } else {
        echo "error";
    }
}
