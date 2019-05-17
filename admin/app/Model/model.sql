-- LANDINGS
CREATE TABLE IF NOT EXISTS landings (
    id INT(16) NOT NULL,
    name VARCHAR(256) DEFAULT NULL,
    email VARCHAR(256) NOT NULL,
    phone VARCHAR(256) DEFAULT NULL,
    message TEXT,
    regdate DATETIME DEFAULT NULL
) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8;

ALTER TABLE landings ADD PRIMARY KEY (id);
ALTER TABLE landings MODIFY id INT(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 2;

INSERT INTO landings(id, name, email, phone, message, regdate)
VALUES (1, 'Andres', 'andresrobert@icloud.com', '+56952094004', 'Testing', '2018-09-04 09:26:59');

-- ROLES
CREATE TABLE IF NOT EXISTS roles (
    id INT(16) NOT NULL,
    users_id INT(16) DEFAULT NULL,
    role ENUM ('report', 'admin') DEFAULT NULL,
    active TINYINT(1) NOT NULL DEFAULT '1'
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = utf8;

ALTER TABLE roles MODIFY id INT(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 3;
ALTER TABLE roles ADD PRIMARY KEY (id);

INSERT INTO roles(id, users_id, role, active)
VALUES (1, 1, 'admin', 1),
       (2, 1, 'report', 1);

-- USERS
CREATE TABLE IF NOT EXISTS users (
    id INT(16) NOT NULL,
    email VARCHAR(256) NOT NULL,
    firstname VARCHAR(256) DEFAULT NULL,
    lastname VARCHAR(256) DEFAULT NULL,
    username VARCHAR(256) DEFAULT NULL,
    password VARCHAR(256) DEFAULT NULL,
    regdate DATETIME DEFAULT NULL
) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8;

ALTER TABLE users ADD PRIMARY KEY (id);
ALTER TABLE users MODIFY id INT(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 2;

INSERT INTO users(id, email, firstname, lastname, username, password, regdate)
VALUES (1, 'andresrobert@icloud.com', 'Andres', 'Robert', 'arobert', '$2a$10$5nf2sY9YbThkMtwaOClsDuuFkqD1LMY6bRT017kO1Xd76uBc7hxS6', '2018-09-02 00:00:00');

-- REGISTRATIONS
CREATE TABLE IF NOT EXISTS registrations (
    id INT(16) NOT NULL,
    conferences_id INT(16) NULL,
    first_name VARCHAR(256) NOT NULL,
    last_name VARCHAR(256) NOT NULL,
    country VARCHAR(256) NOT NULL,
    id_number VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL,
    occupation VARCHAR(256) NOT NULL,
    organization VARCHAR(256) NOT NULL,
    attendance_date DATETIME DEFAULT NULL,
    regdate DATETIME DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

ALTER TABLE registrations ADD PRIMARY KEY (id);
ALTER TABLE registrations MODIFY id INT(16) NOT NULL AUTO_INCREMENT;


