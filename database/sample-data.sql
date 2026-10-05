-- Ample Fitness - optional sample rows for testing the admin pages.
-- Run AFTER schema.sql. Delete these rows before going live if you like.

INSERT INTO contact_leads (fname, lname, email, phone, message, ip_address) VALUES
('Ravi',  'Kumar',   'ravi@example.com',  '9876543210', 'I want to know about personal training plans.', '127.0.0.1'),
('Anita', 'Sharma',  'anita@example.com', '9988776655', 'What are your gym timings on weekends?',       '127.0.0.1');

INSERT INTO voucher_leads (name, phone, ip_address) VALUES
('Priya',  '9123456780', '127.0.0.1'),
('Suresh', '8012345678', '127.0.0.1');
