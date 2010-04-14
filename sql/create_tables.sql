CREATE TABLE campaigns(id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, name VARCHAR(254), nickname VARCHAR(254), description VARCHAR(254), photo VARCHAR(254), countryid INT, tagid INT, categoryid INT, unique(id, name)) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE tags(id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, name VARCHAR(254), unique(id,name)) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE campaigns_tags(id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, campaign_id INT, tag_id INT, unique(id)) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE categories(id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, name VARCHAR(254), unique(id,name)) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE comments(id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, comment TEXT, user_id INT, campaign_id INT, unique(id)) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE leads(id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, name VARCHAR(254), email VARCHAR(100), phone VARCHAR(25), country_id INT, comment TEXT, unique(id)) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE accounts(id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, name VARCHAR(254), url VARCHAR(254), email VARCHAR(254), password VARCHAR(254), mobile VARCHAR(30), country_id int, photo VARCHAR(254) DEFAULT 'default.jpeg', salt VARCHAR(254), is_verified INT(1) DEFAULT 0, unique(id)) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE likes(id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, user_id INT, campaign_id INT, unique(id)) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE shares(id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, user_id INT, campaign_id INT, unique(id)) ENGINE=MyISAM DEFAULT CHARSET=latin1;
CREATE TABLE countries(id INT, code VARCHAR(4), country VARCHAR(254), unique(id, country)) ENGINE=MyISAM DEFAULT CHARSET=latin1;
INSERT INTO `countries` VALUES (1,'AF','Afghanistan'),(2,'AL','Albania'),(3,'DZ','Algeria'),(4,'AS','American Samoa'),(5,'AD','Andorra'),(6,'AO','Angola'),(7,'AI','Anguilla'),(8,'AQ','Antarctica'),(9,'AG','Antigua And Barbuda'),(10,'AR','Argentina'),(11,'AM','Armenia'),(12,'AW','Aruba'),(13,'AU','Australia'),(14,'AT','Austria'),(15,'AZ','Azerbaijan'),(16,'BS','Bahamas'),(17,'BH','Bahrain'),(18,'BD','Bangladesh'),(19,'BB','Barbados'),(20,'BY','Byelorussian SSR'),(21,'BE','Belgium'),(22,'BZ','Belize'),(23,'BJ','Benin'),(24,'BM','Bermuda'),(25,'BT','Bhutan'),(26,'BO','Bolivia'),(27,'BA','Bosnia Hercegovina'),(28,'BW','Botswana'),(29,'BV','Bouvet Island'),(30,'BR','Brazil'),(31,'IO','British Indian Ocean Territory'),(32,'BN','Brunei Darussalam'),(33,'BG','Bulgaria'),(34,'BF','Burkina Faso'),(35,'BI','Burundi'),(36,'BY','Byelorussian SSR'),(37,'KH','Cambodia'),(38,'CM','Cameroon'),(39,'CA','Canada'),(40,'CV','Cape Verde'),(41,'KY','Cayman Islands'),(42,'CF','Central African Republic'),(43,'TD','Chad'),(44,'CL','Chile'),(45,'CN','China'),(46,'CX','Christmas Island'),(47,'CC','Cocos (Keeling) Islands'),(48,'CO','Colombia'),(49,'KM','Comoros'),(50,'CG','Congo'),(51,'CD','Congo'),(52,'CK','Cook Islands'),(53,'CR','Costa Rica'),(54,'CI','Cote D Ivoire'),(55,'HR','Croatia'),(56,'CU','Cuba'),(57,'CY','Cyprus'),(58,'CZ','Czech Republic'),(59,'CS','Czechoslovakia'),(60,'DK','Denmark'),(61,'DJ','Djibouti'),(62,'DM','Dominica'),(63,'DO','Dominican Republic'),(64,'TP','East Timor'),(65,'EC','Ecuador'),(66,'EG','Egypt'),(67,'SV','El Salvador'),(68,'GB','Great Britain'),(69,'GQ','Equatorial Guinea'),(70,'ER','Eritrea'),(71,'EE','Estonia'),(72,'ET','Ethiopia'),(73,'FK','Falkland Islands (Malvinas)'),(74,'FO','Faroe Islands'),(75,'FJ','Fiji'),(76,'FI','Finland'),(77,'FR','France'),(78,'GF','French Guiana'),(79,'PF','French Polynesia'),(80,'TF','French Southern Territories'),(81,'GA','Gabon'),(82,'GM','Gambia'),(83,'GE','Georgia'),(84,'DE','Germany'),(85,'GH','Ghana'),(86,'GI','Gibraltar'),(87,'GB','Great Britain'),(88,'GR','Greece'),(89,'GL','Greenland'),(90,'GD','Grenada'),(91,'GP','Guadeloupe'),(92,'GU','Guam'),(93,'GT','Guatemela'),(94,'GG','Guernsey'),(95,'GN','Guinea'),(96,'GW','Guinea-Bissau'),(97,'GY','Guyana'),(98,'HT','Haiti'),(99,'HM','Heard and McDonald Islands'),(100,'HN','Honduras'),(101,'HK','Hong Kong'),(102,'HU','Hungary'),(103,'IS','Iceland'),(104,'IN','India'),(105,'ID','Indonesia'),(106,'IR','Iran (Islamic Republic Of)'),(107,'IQ','Iraq'),(108,'IE','Ireland'),(109,'IM','Isle Of Man'),(110,'IL','Israel'),(111,'IT','Italy'),(112,'JM','Jamaica'),(113,'JP','Japan'),(114,'JE','Jersey'),(115,'JO','Jordan'),(116,'KZ','Kazakhstan'),(117,'KE','Kenya'),(118,'KI','Kiribati'),(119,'KP','Korea'),(120,'KR','Korea'),(121,'KW','Kuwait'),(122,'KG','Kyrgyzstan'),(123,'LA','Lao People s Democratic Republic'),(124,'LV','Latvia'),(125,'LB','Lebanon'),(126,'LS','Lesotho'),(127,'LR','Liberia'),(128,'LY','Libyan Arab Jamahiriya'),(129,'LI','Liechtenstein'),(130,'LT','Lithuania'),(131,'LU','Luxembourg'),(132,'MO','Macau'),(133,'MK','Macedonia'),(134,'MG','Madagascar'),(135,'MW','Malawi'),(136,'MY','Malaysia'),(137,'MV','Maldives'),(138,'ML','Mali'),(139,'MT','Malta'),(140,'MH','Marshall Islands'),(141,'MQ','Martinique'),(142,'MR','Mauritania'),(143,'MU','Mauritius'),(144,'YT','Mayotte'),(145,'MX','Mexico'),(146,'FM','Micronesia'),(147,'MD','Moldova'),(148,'MC','Monaco'),(149,'MN','Mongolia'),(150,'MS','Montserrat'),(151,'MA','Morocco'),(152,'MZ','Mozambique'),(153,'MM','Myanmar'),(154,'NA','Namibia'),(155,'NR','Nauru'),(156,'NP','Nepal'),(157,'NL','Netherlands'),(158,'AN','Netherlands Antilles'),(159,'NT','Neutral Zone'),(160,'NC','New Caledonia'),(161,'NZ','New Zealand'),(162,'NI','Nicaragua'),(163,'NE','Niger'),(164,'NG','Nigeria'),(165,'NU','Niue'),(166,'NF','Norfolk Island'),(167,'MP','Northern Mariana Islands'),(168,'NO','Norway'),(169,'OM','Oman'),(170,'PK','Pakistan'),(171,'PW','Palau'),(172,'PA','Panama'),(173,'PG','Papua New Guinea'),(174,'PY','Paraguay'),(175,'PE','Peru'),(176,'PH','Philippines'),(177,'PN','Pitcairn'),(178,'PL','Poland'),(179,'PT','Portugal'),(180,'PR','Puerto Rico'),(181,'QA','Qatar'),(182,'RE','Reunion'),(183,'RO','Romania'),(184,'RU','Russian Federation'),(185,'RW','Rwanda'),(186,'SH','Saint Helena'),(187,'KN','Saint Kitts And Nevis'),(188,'LC','Saint Lucia'),(189,'PM','Saint Pierre and Miquelon'),(190,'VC','Saint Vincent and The Grenadines'),(191,'WS','Samoa'),(192,'SM','San Marino'),(193,'ST','Sao Tome and Principe'),(194,'SA','Saudi Arabia'),(195,'SN','Senegal'),(196,'SC','Seychelles'),(197,'SL','Sierra Leone'),(198,'SG','Singapore'),(199,'SK','Slovakia'),(200,'SI','Slovenia'),(201,'SB','Solomon Islands'),(202,'SO','Somalia'),(203,'ZA','South Africa'),(204,'GS','South Georgia and The Sandwich Islands'),(205,'ES','Spain'),(206,'LK','Sri Lanka'),(207,'SD','Sudan'),(208,'SR','Suriname'),(209,'SJ','Svalbard and Jan Mayen Islands'),(210,'SZ','Swaziland'),(211,'SE','Sweden'),(212,'CH','Switzerland'),(213,'SY','Syrian Arab Republic'),(214,'TW','Taiwan'),(215,'TJ','Tajikista'),(216,'TZ','Tanzania'),(217,'TH','Thailand'),(218,'TG','Togo'),(219,'TK','Tokelau'),(220,'TO','Tonga'),(221,'TT','Trinidad and Tobago'),(222,'TN','Tunisia'),(223,'TR','Turkey'),(224,'TM','Turkmenistan'),(225,'TC','Turks and Caicos Islands'),(226,'TV','Tuvalu'),(227,'UG','Uganda'),(228,'UA','Ukraine'),(229,'AE','United Arab Emirates'),(230,'UK','United Kingdom'),(231,'US','United States'),(232,'UM','United States Minor Outlying Islands'),(233,'UY','Uruguay'),(234,'SU','USSR'),(235,'UZ','Uzbekistan'),(236,'VU','Vanuatu'),(237,'VA','Vatican City State'),(238,'VE','Venezuela'),(239,'VN','Vietnam'),(240,'VG','Virgin Islands (British)'),(241,'VI','Virgin Islands (U.S.)'),(242,'WF','Wallis and Futuna Islands'),(243,'EH','Western Sahara'),(244,'YE','Yemen'),(245,'YU','Yugoslavia'),(246,'ZR','Zaire'),(247,'ZM','Zambia'),(248,'ZW','Zimbabwe');
