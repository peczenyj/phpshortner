CREATE SCHEMA IF NOT EXISTS url_short;
USE url_short;

CREATE TABLE urls (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  url varchar(100) NOT NULL UNIQUE
)