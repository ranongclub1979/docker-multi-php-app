    -- create_dbs.sql
    -- ฐานข้อมูลสำหรับ Project A
    CREATE DATABASE IF NOT EXISTS project_a_db;
    CREATE USER IF NOT EXISTS 'user_a'@'%' IDENTIFIED BY 'password_a';
    GRANT ALL PRIVILEGES ON project_a_db.* TO 'user_a'@'%';

    -- ฐานข้อมูลสำหรับ Project B
    CREATE DATABASE IF NOT EXISTS project_b_db;
    CREATE USER IF NOT EXISTS 'user_b'@'%' IDENTIFIED BY 'password_b';
    GRANT ALL PRIVILEGES ON project_b_db.* TO 'user_b'@'%';

    FLUSH PRIVILEGES;