-- Ample Fitness - form submission tables (MySQL / MariaDB)
-- Import once:  mysql -u <user> -p <database> < database/schema.sql

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

CREATE TABLE IF NOT EXISTS voucher_leads (
    id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name        VARCHAR(150) NOT NULL,
    phone       VARCHAR(20)  NOT NULL,
    ip_address  VARCHAR(45)  NULL,
    created_at  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_voucher_leads_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
