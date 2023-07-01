CREATE DATABASE php_mysql_crud_luis;

USE php_mysql_crud_luis;

CREATE TABLE task(
    id INT(11) PRIMARY KEY AUTO_INCREMENT, 
    title VARCHAR(255) NOT NULL, 
    description TEXT, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
    );

    alter table task add image LONGBLOB;

    DESCRIBE task;