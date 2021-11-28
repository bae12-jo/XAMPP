-- # team21 계정 생성, team21 DB 생성 및 권한 부여
-- use mysql;
-- create user 'team21'@'%' identified by 'team21';
-- create database team21 default character set utf8;
-- REVOKE ALL PRIVILEGES ON *.* FROM 'team21'@'%'; REVOKE GRANT OPTION ON *.* FROM 'team21'@'%'; GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, FILE, INDEX, ALTER, CREATE TEMPORARY TABLES, CREATE VIEW, EVENT, TRIGGER, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EXECUTE ON *.* TO 'team21'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;

-- # team21 계정으로 로그인
-- exit;
-- mysql -u team21 -p
-- team21
-- use team21;

use team21;

CREATE TABLE users (
	idUsers int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    uidUsers TINYTEXT NOT NULL,
    emailUsers TINYTEXT NOT NULL,
    pwdUsers LONGTEXT NOT NULL
);

CREATE TABLE seoulparkings (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    parking_code int(11) NOT NULL,
    parking_name LONGTEXT NOT NULL,
    addr LONGTEXT NOT NULL,
    parking_type LONGTEXT NOT NULL,
    operation_rule_nm LONGTEXT NOT NULL,
    tel LONGTEXT,
    capacity int(11) NOT NULL,
    pay_nm TINYTEXT NOT NULL,
    night_free_open TINYTEXT NOT NULL,
    weekday_begin_time TINYTEXT NOT NULL,
    weekday_end_time TINYTEXT NOT NULL,
    weekend_begin_time TINYTEXT NOT NULL,
    weekend_end_time TINYTEXT NOT NULL,
    holiday_begin_time TINYTEXT NOT NULL,
    holiday_end_time TINYTEXT NOT NULL,
    sync_time DATETIME NOT NULL,
    saturday_pay_nm TINYTEXT NOT NULL,
    holiday_pay_nm TINYTEXT NOT NULL,
    fulltime_monthly int(11) NOT NULL,
    rates int(11) NOT NULL,
    time_rate int(11) NOT NULL,
    add_rates int(11) NOT NULL,
    add_time_rate int(11) NOT NULL,
    day_maximum int(11) NOT NULL
);

CREATE TABLE remaining (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    parking_name LONGTEXT NOT NULL,
    capacity int(11) NOT NULL,
    remain int(11) NOT NULL
);

CREATE TABLE history (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    parking_name LONGTEXT NOT NULL,
    parking_addr LONGTEXT NOT NULL,
    park_date date NOT NULL,
    park_day TINYTEXT NOT NULL,
    park_minute int(11) NOT NULL,
    rates int(11) NOT NULL
);

CREATE TABLE festival (
    id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    fst_name LONGTEXT NOT NULL,
    fst_place LONGTEXT NOT NULL,
    begin_day DATE NOT NULL,
    end_day DATE NOT NULL,
    fst_hosts LONGTEXT NOT NULL,
    fst_organizer LONGTEXT NOT NULL,
    fst_sponsors LONGTEXT NOT NULL,
    tell TINYTEXT NOT NULL,
    website LONGTEXT NOT NULL,
    fst_info LONGTEXT NOT NULL,
    fst_addr LONGTEXT NOT NULL,
    fst_addr_num LONGTEXT NOT NULL,
    update_date DATE NOT NULL
);

