-- =====================================================================
-- Ample Fitness - tables + sample seed data (MySQL / MariaDB)
-- cPanel: phpMyAdmin > select your database > Import > this file > Go
-- =====================================================================

SET NAMES utf8mb4;

-- ---------------------------------------------------------------------
-- Table: contact_leads  (Contact Us form)
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS contact_leads (
    id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
    fname       VARCHAR(100) NOT NULL,
    lname       VARCHAR(100) NOT NULL DEFAULT '',
    email       VARCHAR(255) NOT NULL,
    phone       VARCHAR(20)  NOT NULL,
    message     TEXT         NULL,
    ip_address  VARCHAR(45)  NULL,
    created_at  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_contact_leads_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- Table: voucher_leads  (Discount voucher / enquiry popup)
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS voucher_leads (
    id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name        VARCHAR(150) NOT NULL,
    phone       VARCHAR(20)  NOT NULL,
    ip_address  VARCHAR(45)  NULL,
    created_at  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_voucher_leads_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------------
-- Sample seed data: contact_leads
-- ---------------------------------------------------------------------
INSERT INTO contact_leads (fname, lname, email, phone, message, ip_address, created_at) VALUES
('Ravi',     'Kumar',       'ravi.kumar@example.com',      '9876543210', 'I want to know about personal training plans and pricing.',          '49.204.10.21',  '2026-09-01 09:15:22'),
('Anita',    'Sharma',      'anita.sharma@example.com',    '9988776655', 'What are your gym timings on Saturdays and Sundays?',                 '106.51.72.140', '2026-09-03 18:42:05'),
('Karthik',  'Raj',         'karthik.raj@example.com',     '9445012345', 'Do you offer a free trial session before joining?',                   '157.49.88.3',   '2026-09-05 07:30:48'),
('Meena',    'Lakshmi',     'meena.l@example.com',         '9840098400', 'Looking for a nutrition coaching program for weight loss.',           '117.193.4.56',  '2026-09-08 12:05:10'),
('Arjun',    'Venkatesh',   'arjun.v@example.com',         '9003112233', 'Is there a couple membership or family discount available?',          '49.37.200.17',  '2026-09-10 20:11:37'),
('Divya',    'Ramesh',      'divya.ramesh@example.com',    '8939456789', 'I am interested in group fitness classes in the evening batch.',      '106.198.6.250', '2026-09-14 16:27:59'),
('Suresh',   'Babu',        'suresh.babu@example.com',     '9677123456', 'Do you have trainers for strength and conditioning for athletes?',    '223.187.32.9',  '2026-09-17 10:48:33'),
('Lakshmi',  'Narayanan',   'lakshmi.n@example.com',       '7299001122', 'Please share details about the functional training program.',         '42.106.181.77', '2026-09-21 08:02:14'),
('Mohammed', 'Irfan',       'irfan.m@example.com',         '9566778899', 'Can I pause my membership if I travel for a month?',                  '182.65.140.33', '2026-09-26 19:36:41'),
('Priya',    'Subramanian', 'priya.s@example.com',         '9790123987', 'Interested in fitness boot camps. When does the next batch start?',   '27.5.212.102',  '2026-10-02 07:55:06');

-- ---------------------------------------------------------------------
-- Sample seed data: voucher_leads
-- ---------------------------------------------------------------------
INSERT INTO voucher_leads (name, phone, ip_address, created_at) VALUES
('Priya',     '9123456780', '49.204.11.90',  '2026-09-02 11:20:45'),
('Suresh',    '8012345678', '106.51.70.12',  '2026-09-04 17:05:13'),
('Gayathri',  '9884512300', '157.49.90.44',  '2026-09-06 08:40:27'),
('Vignesh',   '9176543210', '117.193.8.201', '2026-09-09 21:14:02'),
('Harini',    '6380123456', '49.37.199.5',   '2026-09-12 13:33:58'),
('Naveen',    '7708899001', '106.198.4.130', '2026-09-15 06:58:19'),
('Sangeetha', '9361234567', '223.187.30.66', '2026-09-19 15:47:31'),
('Rahul',     '8122334455', '42.106.180.18', '2026-09-23 18:22:09'),
('Keerthana', '9025678901', '182.65.141.7',  '2026-09-28 10:09:52'),
('Ajay',      '6374567890', '27.5.210.240',  '2026-10-03 19:41:26');
