delimiter $$

CREATE TABLE #prefix#sentinel_countries (
  `id` char(2) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `phone_code` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `en_country` varchar(50) DEFAULT NULL,
  `fr_country` varchar(50) DEFAULT NULL,
  `ru_country` varchar(50) DEFAULT NULL,
  `zh_country` varchar(50) DEFAULT NULL,
  `currency` char(3) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `en_country_UNIQUE` (`en_country`),
  UNIQUE KEY `fr_country_UNIQUE` (`fr_country`),
  UNIQUE KEY `ru_country_UNIQUE` (`ru_country`),
  UNIQUE KEY `zh_country_UNIQUE` (`zh_country`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8$$

CREATE TABLE #prefix#sentinel_item (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action` tinyint(1) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(15) DEFAULT NULL,
  `id2_country` char(2) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `ip_UNIQUE` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8$$

INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('AD','376','Andorra','Andorre','Андорра','安道尔','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('AE','971','United Arab Emirates','Emirats Arabes Unis','ОАЭ','阿拉伯联合酋长国','AED')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('AF','93','Afghanistan','Afghanistan','Афганистан','阿富汗','AFN')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('AL','355','Albania','Albanie','Албания','阿尔巴尼亚','ALL')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('AM','374','Armenia','Arménie','Армения','亚美尼亚','AMD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('AR','54','Argentina','Argentine','Аргентина','阿根廷','ARS')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('AT','43','Austria','Autriche','Австрия','奥地利','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('AU','61','Australia','Australie','Австралия','澳大利亚','AUD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('AZ','994','Azerbaijan','Azerbaïdjan','Азербайджан','阿塞拜疆','AZN')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('BA','387','Bosnia-Herzegovina','Bosnie-Herzégovine','Босния-Герцеговина','波斯尼亚和黑塞哥维那','BAM')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('BB','1246','Barbados','Barbade','Барбадос','巴巴多斯','BBD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('BD','880','Bangladesh','Bangladesh','Бангладеш','孟加拉国','BDT')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('BE','32','Belgium','Belgique','Бельгия','比利时','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('BF','854','Burkina Faso','Burkina faso','Буркина Фасо','布基纳法索','XOF')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('BG','359','Bulgaria','Bulgarie','Болгария','保加利亚','BGN')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('BH','973','Bahrain','Bahrein','Бахрейн','巴林','BHD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('BN','673','Brunei','Brunei','Бруней','文莱','BND')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('BO','591','Bolivia','Bolivie','Боливия','玻利维亚','BOB')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('BR','55','Brazil','Brésil','Бразилия','巴西','BRL')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('BS','1242','Bahamas','Bahamas','Багамы','巴哈马','BSD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('BT','975','Bhutan','Bhutan','Бутан','不丹','INR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('BY','375','Belarus','Bélarus','Беларусь','白俄罗斯','BYR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('CA','1','Canada','Canada','Канада','加拿大','CAD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('CF','236','Central African Republic','Rép. Centre Afrique','ЦАР','中非共和国','XAF')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('CG','242','Congo','Congo','Конго','刚果','XAF')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('CH','41','Switzerland','Suisse','Швейцария','瑞士','CHF')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('CI',NULL,'Côte D''Ivoire','Côte d''Ivoire','Кот-д''Ивуар','科特迪瓦',NULL)$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('CL','56','Chile','Chili','Чили','智利','CLP')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('CM','237','Cameroon','Cameroun','Камерун','喀麦隆','XAF')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('CN','86','People''s Republic of China','République populaire de Chine','Китай','中华人民共和国','CNY')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('CO','57','Colombia','Colombie','Колумбия','哥伦比亚','COP')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('CR','506','Costa Rica','Costa Rica','Коста Рика','哥斯达黎加','CRC')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('CU','53','Cuba','Cuba','Куба','古巴','CUP')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('CY','357','Cyprus','Chypre','Кипр','塞浦路斯','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('CZ','420','Czech Republic','République tchèque','Чехия','捷克','CZK')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('DE','49','Germany','Allemagne','Германия','德国','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('DK','45','Denmark','Danemark','Дания','丹麦','DKK')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('DY','229','Benin','Bénin','Бенин','贝宁','XOF')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('DZ','213','Algeria','Algérie','Алжир','阿尔及利亚','DZD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('EC','593','Ecuador','Equateur','Эквадор','厄瓜多尔','USD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('EE','372','Estonia','Estonie','Эстония','爱沙尼亚','EEK')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('EG','20','Egypt','Egypte','Египет','埃及','EGP')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('ES','34','Spain','Espagne','Испания','西班牙','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('ET','251','Ethiopia','Ethiopie','Эфиопия','埃塞俄比亚','ETB')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('EU',NULL,'European Union','Union Européenne','Европейский Союз','欧洲联盟',NULL)$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('FI','358','Finland','Finlande','Финляндия','芬兰','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('FR','33','France','France','Франция','法国','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('GA','241','Gabon','Gabon','Габон','加蓬','XAF')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('GB','44','United Kingdom','Royaume-Uni','Великобритания','英国','GBP')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('GD',NULL,'Grenada','Grenade','Гренада','格拉纳达',NULL)$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('GE','995','Georgia','Géorgie','Грузия','格鲁吉亚','GEL')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('GH','233','Ghana','Ghana','Гана','加纳',NULL)$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('GI','292','Gibraltar','Gibraltar','Гибралтар','直布罗陀','GIP')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('GM','220','Gambia','Gambie','Гамбия','冈比亚','GMD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('GN','324','Guinea','Guinée Conakry','Гвинея','几内亚','GNF')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('GQ','226','Equatorial Guinea','Guinée Equatoriale','Экваториальная Гвинея','赤道几内亚','XAF')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('GR','30','Greece','Grèce','Греция','希腊','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('GW','624','Guinea-Bissau','Guinée Bissau','Гвинея Биссау','几内亚比绍','XOF')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('HK','852','Hongkong','Hongkong','Гонконг','香港','HKD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('HR','385','Croatia','Croatie','Хорватия','克罗地亚','HRK')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('HU','36','Hungary','Hongrie','Венгрия','匈牙利','HUF')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('ID','62','Indonesia','Indonésie','Индонезия','印度尼西亚','IDR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('IE','353','Ireland','Irlande','Ирландия','爱尔兰共和国','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('IL','972','Israel','Israël','Израиль','以色列','ILS')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('IN','91','India','Inde','Индия','印度','INR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('IQ','964','Iraq','Iraq','Ирак','伊拉克','IQD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('IR','98','Iran (Islamic republic of)','Iran (République islamique d'')','Иран','伊朗','IRR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('IS','354','Iceland','Islande','Исландия','冰岛','ISK')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('IT','39','Italy','Italie','Италия','意大利','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('JO','962','Jordan','Jordanie','Иордания','约旦','JOD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('JP','81','Japan','Japon','Япония','日本','JPY')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('KE','254','Kenya','Kenya','Кения','肯尼亚','KES')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('KG','996','Kyrgyzstan','Kirghizistan','Киргизстан','吉尔吉斯斯坦','KGS')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('KH','855','Cambodia','Cambodge','Камбоджа','柬埔寨','KHR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('KR','82','Republic of Korea','République de Corée','Южная Корея','大韩民国','KRW')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('KW','965','Kuwait','Koweït','Кувейт','科威特','KWD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('KZ','7','Kazakhstan','Kazakhstan','Казахстан','哈萨克斯坦','KZT')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('LA','856','Lao People''s Democratic Republic','Laos','Лаос','老挝','LAK')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('LB','961','Lebanon','Liban','Ливан','黎巴嫩','LBP')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('LI','423','Liechtenstein','Liechtenstein','Лихтенштейн','列支敦士登','CHF')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('LK','94','Sri Lanka','Sri Lanka','Шри Ланка','斯里兰卡','LKR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('LR','231','Liberia','Libéria','Либерия','利比里亚','LRD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('LS','266','Lesotho','Lesotho','Лесото','莱索托','ZAR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('LT','370','Lithuania','Lituanie','Литва','立陶宛','LTL')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('LU','352','Luxemburg','Luxembourg','Люксембург','卢森堡','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('LV','371','Latvia','Lettonie','Латвия','拉脱维亚','LVL')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('LY','218','Libya','Libye','Ливия','利比亚','LYD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('MA','212','Morocco','Maroc','Марокко','摩洛哥','MAD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('MC','377','Monaco','Principauté de Monaco','Монако','摩纳哥公国','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('MD','373','Moldova','Moldova','Молдова','摩尔多瓦','MDL')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('ME','382','Montenegro','Monténegro','Черногория','黑山','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('MK','389','Macedonia (FYROM)','Macédoine (FYROM)','Македония','马其顿共和国','MKD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('ML','223','Mali','Mali','Мали','马里共和国','XOF')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('MM','95','Myanmar','Myanmar','Мьянма','缅甸','MMK')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('MN','976','Mongolia','Mongolie','Монголия','蒙古国','MNT')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('MR','478','Mauritania','Mauritanie','Мавритания','毛里塔尼亚','MRO')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('MT','356','Malta','Malte','Мальта','马耳他','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('MV','960','Maldives','Maldives','Мальдивы','马尔代夫','MVR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('MW','265','Malawi','Malawi','Малави','马拉维','MWK')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('MX','52','Mexico','Mexique','Мексика','墨西哥','MXN')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('MY','60','Malaysia','Malaisie','Малайзия','马来西亚','MYR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('NA','264','Namibia','Namibie','Намибия','纳米比亚','ZAR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('NE','227','Niger','Niger','Нигер','尼日尔','XOF')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('NG','234','Nigeria','Nigéria','Нигерия','尼日利亚','NGN')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('NL','31','Netherlands','Pays-Bas','Нидерланды','荷兰','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('NO','47','Norway','Norvège','Норвегия','挪威','NOK')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('NP','977','Nepal','Népal','Непал','尼泊尔','NPR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('NZ','64','New Zealand','Nouvelle-Zélande','Новая Зеландия','新西兰','NZD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('OM','968','Oman','Oman','Оман','阿曼','OMR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('PE','51','Peru','Pérou','Перу','秘鲁','PEN')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('PH','63','Phillippines','Phillippines','Филиппины','菲律宾','PHP')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('PK','92','Pakistan','Pakistan','Пакистан','巴基斯坦','PKR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('PL','48','Poland','Pologne','Польша','波兰','PLN')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('PT','351','Portugal','Portugal','Португалия','葡萄牙','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('PY','600','Paraguay','Paraguay','Парагвай','巴拉圭','PYG')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('QA','974','Qatar','Qatar','Катар','卡塔尔','QAR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('RO','40','Romania','Roumanie','Румыния','罗马尼亚','RON')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('RS','381','Serbia','Serbie','Сербия','塞尔维亚','RSD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('RU','7','Russian Federation','Russie','Россия','俄罗斯','RUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('SA','966','Saudi Arabia','Arabie Saoudite','Саудовская Аравия','沙特阿拉伯','SAR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('SD','736','Sudan','Soudan','Судан','苏丹共和国','SDG')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('SE','46','Sweden','Suède','Швеция','瑞典','SEK')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('SG','65','Singapour','Singapour','Сингапур','新加坡','SGD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('SI','386','Slovenia','Slovénie','Словения','斯洛文尼亚','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('SK','421','Slovakia','Slovaquie','Словакия','斯洛伐克','EUR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('SN','686','Senegal','Senegal','Сенегал','塞内加尔','XOF')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('SY','963','Syrian Arab Republic','République arabe syrienne','Сирия','阿拉伯叙利亚共和国','SYP')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('TD','148','Chad','Tchad','Чад','乍得','XAF')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('TG','768','Togo','Togo','Того','多哥','XOF')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('TH','66','Thailand','Thaïlande','Таиланд','泰国','THB')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('TJ','992','Tajikistan','Tadjikistan','Таджикистан','塔吉克斯坦','TJS')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('TM','993','Turkmenistan','Turkménistan','Туркменистан','土库曼斯坦','TMT')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('TN','216','Tunisia','Tunisie','Тунис','突尼斯','TND')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('TR','90','Turkey','Turquie','Турция','土耳其','TRY')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('TZ','255','Tanzanie','Tanzanie','Танзания','坦桑尼亚','TZS')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('UA','380','Ukraine','Ukraine','Украина','乌克兰','UAH')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('US','1','United States of America','Etats-Unis d''Amérique','США','美国','USD')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('UY','598','Uruguay','Uruguay','Уругвай','乌拉圭','UYU')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('UZ','998','Uzbekistan','Ouzbékistan','Узбекистан','乌兹别克斯坦','UZS')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('VE','58','Venezuela','Vénézuela','Венесуэла','委内瑞拉','VEF')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('VN','84','Vietnam','Vietnam','Вьетнам','越南','VND')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('YE','967','Yemen','Yémen','Йемен','也门','YER')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('ZA','27','South Africa','Afrique du Sud','ЮАР','南非','ZAR')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('ZM','260','Zambia','Zambie','Замбия','赞比亚','ZMK')$$
INSERT INTO #prefix#sentinel_countries (`id`,`phone_code`,`en_country`,`fr_country`,`ru_country`,`zh_country`,`currency`) VALUES ('ZW','263','Zimbabwe','Zimbabwe','Зимбабве','津巴布韦','ZWL')$$