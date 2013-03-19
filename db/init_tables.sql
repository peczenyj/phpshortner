USE `url_short`;

LOCK TABLES `urls` WRITE;
INSERT INTO `urls` VALUES 
  (1,'http://www.google.com');
UNLOCK TABLES;