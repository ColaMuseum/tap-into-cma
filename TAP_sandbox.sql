# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: internal-db.s190161.gridserver.com (MySQL 5.1.72-rel14.10)
# Database: db190161_TAP_sandbox
# Generation Time: 2014-08-08 05:14:48 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table newsletter
# ------------------------------------------------------------

DROP TABLE IF EXISTS `newsletter`;

CREATE TABLE `newsletter` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `device` varchar(300) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `confirmed` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table survey
# ------------------------------------------------------------

DROP TABLE IF EXISTS `survey`;

CREATE TABLE `survey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `satisfaction` int(2) DEFAULT NULL,
  `notSatisfied` text CHARACTER SET latin1,
  `additions` text CHARACTER SET latin1,
  `comments` text CHARACTER SET latin1,
  `age` tinyint(3) NOT NULL,
  `device` varchar(500) CHARACTER SET latin1 NOT NULL,
  `ip` varchar(35) CHARACTER SET latin1 DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `survey` WRITE;
/*!40000 ALTER TABLE `survey` DISABLE KEYS */;

INSERT INTO `survey` (`id`, `satisfaction`, `notSatisfied`, `additions`, `comments`, `age`, `device`, `ip`, `date`)
VALUES
	(8,0,'','','',0,'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D167 Safari/9537.53','66.192.80.138','2014-06-11 13:05:04'),
	(7,5,'test','test','test',31,'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D167 Safari/9537.53','66.192.80.138','2014-06-11 13:04:51'),
	(6,3,'L','More info on the objects where the tour numbers appear','When you press 125 to sign up for the enewsletter, the word enewsletter is spelled incorrectly',50,'Mozilla/5.0 (iPod; CPU iPhone OS 6_1_5 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Mobile/10B400','66.192.80.138','2014-04-15 15:39:14'),
	(9,4,'test','test','test',31,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36','::1','2014-06-11 13:08:53'),
	(10,0,'','','',0,'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D167 Safari/9537.53','66.192.80.138','2014-06-11 13:09:32'),
	(11,0,'','','',0,'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D167 Safari/9537.53','66.192.80.138','2014-06-11 13:14:13'),
	(12,0,'','','',0,'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D167 Safari/9537.53','66.192.80.138','2014-06-11 13:14:37'),
	(13,0,'','','',0,'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D167 Safari/9537.53','66.192.80.138','2014-06-11 13:14:49'),
	(14,0,'','','',0,'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D167 Safari/9537.53','66.192.80.138','2014-06-11 13:15:21'),
	(15,0,'','','',0,'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D167 Safari/9537.53','66.192.80.138','2014-06-11 13:17:17'),
	(16,0,'','','',0,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36','::1','2014-06-11 13:20:09');

/*!40000 ALTER TABLE `survey` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tour_content
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tour_content`;

CREATE TABLE `tour_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tourID` int(11) DEFAULT NULL,
  `stopID` int(11) DEFAULT NULL,
  `groupTitle` varchar(100) DEFAULT NULL,
  `groupID` int(11) DEFAULT NULL,
  `stopType` tinyint(1) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `speaker` varchar(100) DEFAULT NULL,
  `speakerImage` varchar(15) DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `tour_content` WRITE;
/*!40000 ALTER TABLE `tour_content` DISABLE KEYS */;

INSERT INTO `tour_content` (`id`, `tourID`, `stopID`, `groupTitle`, `groupID`, `stopType`, `title`, `description`, `speaker`, `speakerImage`, `source`)
VALUES
	(1,1,101,'Welcome',0,0,NULL,NULL,NULL,NULL,NULL),
	(2,1,101,NULL,1,2,'Director\'s Welcome',NULL,'Karen Brosius, Executive Director','3','karen'),
	(3,1,101,NULL,2,2,'Speical Exhibition Design',NULL,'Victoria Cooke, Curator','1','v02'),
	(4,1,101,NULL,3,1,'Sponsor',NULL,'Lou Kennedy, CEO Nephron Pharmaceuticals','3-video','sponsor'),
	(5,1,102,'Introduction',0,0,NULL,NULL,NULL,NULL,NULL),
	(6,1,102,NULL,1,1,'Introduction',NULL,'Victoria Cooke, Curator','1-video','v01'),
	(7,1,102,NULL,2,2,'Improvisation &amp; Jazz',NULL,'Victoria Cooke, Curator','1','v03'),
	(8,1,102,NULL,4,1,'Moving Image Research Collection',NULL,'Greg Wilsbacher; Curator, Newsfilm Collections','5-video','greg'),
	(9,1,103,'Jazz in Japan',0,0,NULL,NULL,NULL,NULL,NULL),
	(10,1,103,NULL,1,2,'Importing Jazz',NULL,'Victoria Cooke, Curator','1','v04'),
	(11,1,103,NULL,2,1,'Jazz in Japan',NULL,'Peter Hoyt, Adjunct Curator of Music','2-video','p01'),
	(12,1,103,NULL,3,2,'Traditional Japanese Music',NULL,'Peter Hoyt, Adjunct Curator of Music','2','p02'),
	(13,1,103,NULL,4,3,'Shakuhachi Music',NULL,'Choshi Or Shirabe','4','p02_m'),
	(14,1,103,NULL,5,5,'Komuso Priest',NULL,NULL,'film-10','film-10'),
	(15,1,103,NULL,6,4,'Monks Playing Shakuhachi Flute',NULL,NULL,'2','p02_i-1'),
	(16,1,103,NULL,7,4,'Shakuhachi Flute',NULL,NULL,'2','p02_i-2'),
	(17,1,104,'Origins & Approaches to Jazz',0,0,NULL,NULL,NULL,NULL,NULL),
	(18,1,104,NULL,1,2,'American &amp; Japanese Approaches to Jazz',NULL,'Peter Hoyt, Adjunct Curator of Music','2','p04'),
	(19,1,104,NULL,2,3,'Jelly Roll Blues',NULL,'Jelly Roll Morton',NULL,'p04_m'),
	(20,1,104,NULL,3,4,'Jelly Roll Blues Cover',NULL,NULL,NULL,'p04_i'),
	(21,1,104,NULL,5,2,'Origins of Jazz',NULL,'Peter Hoyt, Adjunct Curator of Music','2','p05'),
	(22,1,104,NULL,6,3,'Maple Leaf Rag',NULL,'Scott Joplin',NULL,'p05_m'),
	(23,1,104,NULL,7,4,'Scott Joplin',NULL,NULL,NULL,'p05_i-1'),
	(24,1,104,NULL,8,4,'Maple Leaf Rag Poster',NULL,NULL,NULL,'p05_i-2'),
	(25,1,105,'Art Deco Animals',0,0,NULL,NULL,'Victoria Cooke, Curator',NULL,NULL),
	(26,1,105,NULL,1,2,'Art Deco Animals',NULL,'Victoria Cooke, Curator','1','v07'),
	(27,1,105,NULL,2,2,'A National Dog',NULL,'Victoria Cooke, Curator','1','v08'),
	(28,1,106,'Natural Colors',0,2,NULL,NULL,'Victoria Cooke, Curator','1','v09'),
	(29,1,107,'Water',0,2,NULL,NULL,'Victoria Cooke, Curator','1','v06'),
	(30,1,108,'Women, Rebellion & Smoking',0,2,NULL,NULL,'Victoria Cooke, Curator','1','v17'),
	(31,1,109,'A Cultured Home',0,2,NULL,NULL,'Victoria Cooke, Curator','1','v10'),
	(32,1,110,'Fashion of the Traditional Japanese Woman',0,0,NULL,NULL,NULL,NULL,NULL),
	(33,1,110,NULL,1,2,'Kimonos',NULL,'Victoria Cooke, Curator','1','v05'),
	(34,1,110,NULL,2,5,'Kimono Fashion Show',NULL,'Jun-30','film-4','film-4'),
	(35,1,110,NULL,3,5,'Japanese Hair Styles',NULL,'Apr-30','film-8','film-8'),
	(36,1,111,'Japanese Jazz - A Classical Music',0,0,NULL,NULL,NULL,NULL,NULL),
	(37,1,111,NULL,1,2,'Japanese Jazz - A Classical Music',NULL,'Peter Hoyt, Adjunct Curator of Music','2','p06'),
	(38,1,111,NULL,2,3,'Ragtime',NULL,'Stravinsky',NULL,'p06_m'),
	(39,1,112,'Art Deco Fountains',0,2,NULL,NULL,'Victoria Cooke, Curator','1','v14'),
	(40,1,113,'Rice Cake Vendors',0,5,NULL,NULL,'Jun-29','film-5','film-5'),
	(41,1,114,'Advertising',0,0,NULL,NULL,NULL,NULL,NULL),
	(42,1,114,NULL,1,2,'Advertising',NULL,'Victoria Cooke, Curator','1','v18'),
	(43,1,114,NULL,2,5,'Street Advertisement for Shochiku Kinema',NULL,'Mar-29','film-11','film-11'),
	(44,1,115,'Smoking in Japanese Culture',0,2,NULL,NULL,'Victoria Cooke, Curator','1',NULL),
	(45,1,115,NULL,1,2,'Smoking as a Motif',NULL,'Victoria Cooke, Curator','1','v11'),
	(46,1,115,NULL,2,2,'Smoking in the Cultured Home',NULL,'Victoria Cooke, Curator','1','v12'),
	(47,1,116,'Fashion & Dance of the Modern Japanese Woman',0,0,NULL,NULL,NULL,NULL,NULL),
	(48,1,116,NULL,1,2,'Fashion of the Modern Woman',NULL,'Victoria Cooke, Curator','1','v16'),
	(49,1,116,NULL,2,2,'Japanese Sandman',NULL,'Peter Hoyt, Adjunct Curator of Music','2','p10'),
	(50,1,116,NULL,3,3,'Japanese Sandman',NULL,'Paul Whiteman',NULL,'p10_m'),
	(51,1,117,'Butterfly of Nagasaki',0,0,NULL,NULL,NULL,NULL,NULL),
	(52,1,117,NULL,1,2,'Butterfly of Nagasaki',NULL,'Peter Hoyt, Adjunct Curator of Music','2','p11'),
	(53,1,117,NULL,2,3,'Butterfly of Nagasaki',NULL,'Watanabe Hamako',NULL,'p11_m'),
	(54,1,117,NULL,3,4,'Watanabe Hamako',NULL,NULL,NULL,'p11_i'),
	(55,1,118,'Dance ',0,0,NULL,NULL,NULL,NULL,NULL),
	(56,1,118,NULL,1,5,'Singin\' in the Rain',NULL,'Jun-30','film-2','film-2'),
	(57,1,118,NULL,2,5,'Native Dance',NULL,'Jun-30','film-1','film-1'),
	(58,1,118,NULL,3,5,'Japanese Chorus Girls',NULL,'Jul-30','film-3','film-3'),
	(59,1,119,'Hollywood and Japan',0,2,NULL,NULL,'Victoria Cooke, Curator','1','v19'),
	(60,1,120,'Japanese Prints',0,2,NULL,NULL,'Victoria Cooke, Curator','1','v15'),
	(61,1,121,'Oragami',0,2,NULL,NULL,'Victoria Cooke, Curator','1','v13'),
	(62,1,122,'The Modern Age',0,2,NULL,NULL,'Victoria Cooke, Curator','1','v20'),
	(63,1,123,'Additional Commentary on Jazz & Musical Selections',0,0,NULL,NULL,NULL,NULL,NULL),
	(64,1,123,NULL,1,2,'Japanese Musical History',NULL,'Peter Hoyt, Adjunct Curator of Music','2','p03'),
	(65,1,123,NULL,2,4,'String Instrument from Nara',NULL,NULL,NULL,'p03_i-1'),
	(66,1,123,NULL,3,4,'Temple Bell, Fukuoka',NULL,NULL,NULL,'p03_i-2'),
	(67,1,123,NULL,4,2,'Foreign Influence',NULL,'Peter Hoyt, Adjunct Curator of Music','2','p07'),
	(68,1,123,NULL,5,3,'Three Little Maids from School',NULL,'Gilbert and Sullivan',NULL,'p07_m'),
	(69,1,123,NULL,6,3,'Miya sama, Miya sama',NULL,'Gilbert and Sullivan',NULL,'p07_m-2'),
	(70,1,123,NULL,7,4,'The Mikado, Three Little Maids','Lithograph depicts Kate Forster (left), Geraldine Ulmar (center), and Geraldine St. Maur (right) as the three little maids, respectively Pitti-Sing, Yum-Yum, and Peep-Bo',NULL,NULL,'p07_i'),
	(71,1,123,NULL,8,2,'Portraying the Exotic',NULL,'Peter Hoyt, Adjunct Curator of Music','2','p08'),
	(72,1,123,NULL,9,3,'La Boheme',NULL,'Giacomo Puccini',NULL,'p08_m'),
	(73,1,123,NULL,10,2,'Madama Butterfly',NULL,'Peter Hoyt, Adjunct Curator of Music','2','p09'),
	(74,1,123,NULL,11,3,'Madama Butterfly',NULL,'Giacomo Puccini',NULL,'p09_m'),
	(75,1,124,'Additional Films from MIRC',0,0,NULL,NULL,NULL,NULL,NULL),
	(76,1,124,NULL,1,5,'Education in Japan (Silent)',NULL,'1921','film-6','film-6'),
	(77,1,124,NULL,2,5,'Ivory Carving (Silent)',NULL,'1922','film-9','film-9'),
	(78,1,124,NULL,2,5,'Bijinza Cabaret Young Girls Chorus',NULL,'Dec-31','film-7','film-7'),
	(79,1,125,'Sign up for our E-Newsletter',0,10,NULL,NULL,NULL,NULL,'newsletter'),
	(80,2,201,'Say Hello to Gladys',0,1,NULL,NULL,'Gladys the Grasshopper','gladys-1','intro'),
	(81,2,202,'Where is Japan?',0,1,NULL,NULL,'Gladys the Grasshopper','gladys-2','japan'),
	(82,2,203,'Song Books',0,2,NULL,NULL,'Danielle Kelly, Education Assistant','2','DK-1'),
	(83,2,204,'Poster of Books',0,2,NULL,NULL,'Danielle Kelly, Education Assistant','2','DK-2'),
	(84,2,205,'Skiiing is Fun!',0,2,NULL,NULL,'Gladys the Grasshopper','1','skier'),
	(85,2,206,'A Loyal Dog',0,2,NULL,NULL,'Gladys the Grasshopper','1','akita'),
	(86,2,207,'Swimming Fish',0,2,NULL,NULL,'Gladys the Grasshopper','1','fish'),
	(87,2,208,'Comfortable Kimono',0,2,NULL,NULL,'Gladys the Grasshopper','1','kimono'),
	(88,2,209,'King of the Jungle',0,1,NULL,NULL,'Scott Pfaff, Riverbanks Zoo','lions','lions'),
	(89,2,210,'Baby Turtles (Tortoises)',0,1,NULL,NULL,'Scott Pfaff, Riverbanks Zoo','turtles','turtles'),
	(90,2,211,'Deep Sea Travel ',0,2,NULL,NULL,'Danielle Kelly, Education Assistant','3','DK-3'),
	(91,2,212,'The Rabbit in the Moon',0,2,NULL,NULL,'Gladys the Grasshopper','1','rabbit'),
	(92,2,213,'Crowned Cranes',0,1,NULL,NULL,'Scott Pfaff, Riverbanks Zoo','cranes','cranes'),
	(93,2,214,'Thanks!',0,2,NULL,NULL,'Gladys the Grasshopper','1','out'),
	(94,3,301,'Introduction',0,0,NULL,NULL,NULL,NULL,NULL),
	(95,3,301,NULL,1,2,'Introduction to Meiji Magic',NULL,'Alex Kasten, collector','1','1.1'),
	(96,3,301,NULL,2,2,'How to look at the pieces',NULL,'Alex Kasten, collector','1','1.2'),
	(97,3,302,'Court Life',0,2,NULL,NULL,'Alex Kasten, collector','1','2'),
	(98,3,303,'Festivals',0,2,NULL,NULL,'Alex Kasten, collector','1','3'),
	(99,3,304,'The Wise Mother &amp; Tea Ceremonies',0,0,NULL,NULL,'Alex Kasten, collector',NULL,NULL),
	(100,3,304,NULL,1,2,'The Wise Mother',NULL,'Alex Kasten, collector','1','4.1'),
	(101,3,304,NULL,2,2,'The Tea Ceremony',NULL,'Alex Kasten, collector','1','4.2'),
	(102,3,304,NULL,3,5,'Tea Service Demonstrated (Silent)',NULL,NULL,'film-12','film-12'),
	(103,3,305,'Nature',0,2,NULL,NULL,'Alex Kasten, collector','1','5'),
	(104,3,306,'Conclusion',0,2,NULL,NULL,'Alex Kasten, collector','1','6'),
	(105,4,101,'Welcome',0,0,NULL,NULL,NULL,NULL,NULL),
	(106,4,101,NULL,1,2,'Welcome',NULL,'Karen Brosius, CMA Executive Director','karen','1.1'),
	(107,4,101,NULL,2,2,'Overview of Exhibition',NULL,'Will South, CMA Chief Curator','will','2.3'),
	(108,4,102,'Introduction',0,0,NULL,NULL,NULL,NULL,NULL),
	(109,4,102,NULL,1,1,'Childhood Dreams',NULL,'Shelley Reed, Artist','shelley','2.1'),
	(110,4,102,NULL,2,1,'Arresting Imagery',NULL,'Nick Capasso, Director of the Fitchburg Art Museum','capasso','2.2'),
	(111,4,102,NULL,3,2,'Echoing the Past',NULL,'Shelley Reed, Artist','shelley','s-7'),
	(112,4,103,'Tiger',0,0,NULL,NULL,NULL,NULL,NULL),
	(113,4,103,NULL,1,2,'Tiger',NULL,'Shelley Reed, Artist','shelley','5.1'),
	(114,4,103,NULL,2,2,'What\'s the Attraction?',NULL,'Nick Capasso, Director of the Fitchburg Art Museum','capasso','n-2'),
	(115,4,103,NULL,3,4,'Portrait of Mr. Van Amburgh, As He Appeared with His Animals at the London Theatres',NULL,'Edwin Henry Landseer',NULL,'tiger'),
	(116,4,104,'Hound and Cockatoo | Limited Pallete',0,0,NULL,NULL,NULL,NULL,NULL),
	(117,4,104,NULL,1,2,'Hounds and Cockatoo',NULL,'Shelley Reed, Artist','shelley','s-11'),
	(118,4,104,NULL,2,2,'Limited Pallete',NULL,'Shelley Reed, Artist','shelley','s-8'),
	(119,4,104,NULL,3,4,'White Dog',NULL,'Alexandre-Fran&#231;ois Desportes (1661&#8211;1743)',NULL,'desportes_hound'),
	(120,4,104,NULL,4,4,'Jan Weenix',NULL,'A Still Life of Game with a Cockatoo',NULL,'cockatoo'),
	(121,4,105,'Caught in a Net',0,0,NULL,NULL,NULL,NULL,NULL),
	(122,4,105,NULL,1,2,'Caught in a Net',NULL,'Shelley Reed, Artist','shelley','3.1'),
	(123,4,105,NULL,2,2,'Obscure Old Masters',NULL,'Shelley Reed, Artist','shelley','s-6'),
	(124,4,105,NULL,3,2,'Dust Bin of Art History',NULL,'Nick Capasso, Director of the Fitchburg Art Museum','capasso','n-4'),
	(125,4,106,'Tondos - Pretator/Prey',0,0,NULL,NULL,NULL,NULL,NULL),
	(126,4,106,NULL,1,2,'Wolf',NULL,'Shelley Reed, Artist','shelley','7.1'),
	(127,4,106,NULL,2,2,'Swan',NULL,'Shelley Reed, Artist','shelley','7.2'),
	(128,4,107,'Scale of Paintings',0,2,NULL,NULL,'Shelley Reed, Artist','shelley','6.1'),
	(129,4,108,'Evolution as Artist',0,2,NULL,NULL,'Shelley Reed, Artist','shelley','s-4'),
	(130,4,109,'Beauty and Botanicals',0,2,NULL,NULL,NULL,NULL,NULL),
	(131,4,109,NULL,1,2,'Inspiration and Beauty',NULL,'Nick Capasso, Director of the Fitchburg Art Museum','capasso','n-3'),
	(132,4,109,NULL,2,2,'Botanicals',NULL,'Shelley Reed, Artist','shelley','4.1'),
	(133,4,110,'Attacked by Hounds',0,2,NULL,NULL,'Shelley Reed, Artist','shelley','8.1'),
	(134,4,111,'Around a Fountain',0,2,NULL,NULL,'Shelley Reed, Artist','shelley','9.1'),
	(135,4,112,'In Dubious Battle',0,0,NULL,NULL,NULL,NULL,NULL),
	(136,4,112,NULL,1,2,'Genesis of <em>In Dubious Battle</em>',NULL,'Shelley Reed, Artist','shelley','10.1'),
	(137,4,112,NULL,2,2,'Expanding the Horizon',NULL,'Shelley Reed, Artist','shelley','10.2'),
	(138,4,112,NULL,3,2,'Enevitability of Behavoir',NULL,'Shelley Reed, Artist','shelley','10.3'),
	(139,4,112,NULL,4,2,'Mystery',NULL,'Nick Capasso, Director of the Fitchburg Art Museum','capasso','n-1'),
	(140,4,113,'Combining Appropriations',0,0,NULL,NULL,NULL,NULL,NULL),
	(141,4,113,NULL,1,2,'Appropriation',NULL,'Shelley Reed, Artist','shelley','11.1'),
	(142,4,113,NULL,3,2,'Process',NULL,'Shelley Reed, Artist','shelley','s-12'),
	(143,4,114,'Bird Concert',0,0,NULL,NULL,NULL,NULL,NULL),
	(144,4,114,NULL,1,2,'Bird Concert',NULL,'Shelley Reed, Artist','shelley','12.1'),
	(145,4,114,NULL,2,2,'John James Audubon',NULL,'Shelley Reed, Artist','shelley','12.2'),
	(146,4,114,NULL,2,4,'A Concert of Birds',NULL,'Richard Earlom',NULL,'bird-concert'),
	(147,4,115,'Interpreted Animals | In the Shadows',0,0,NULL,NULL,NULL,NULL,NULL),
	(148,4,115,NULL,1,2,'Interpreted Animals',NULL,'Shelley Reed, Artist','shelley','s-10'),
	(149,4,115,NULL,2,2,'In the Shadows',NULL,'Shelley Reed, Artist','shelley','s-2'),
	(150,4,116,'Ribonned Fruit and Ribboned Flowers ',0,2,NULL,NULL,'Shelley Reed, Artist','shelley','13.1'),
	(151,4,117,'On the Wall',0,2,NULL,NULL,'Shelley Reed, Artist','shelley','14.1'),
	(152,4,118,'Conclusion',0,2,NULL,NULL,'Shelley Reed, Artist','shelley','s-9'),
	(153,5,201,'Introduction',0,0,NULL,NULL,NULL,NULL,NULL),
	(154,5,201,NULL,1,1,'Gladys',NULL,'Gladys','gladys','intro'),
	(155,5,201,NULL,2,2,'Music!',NULL,'Danielle Kelley','danielle','intro-music'),
	(156,5,202,'Tigers',0,1,NULL,NULL,'Susan O\'Cain, Riverbanks Zoo','gladys','tigers'),
	(157,5,203,'Elephants',0,0,NULL,NULL,'Susan O\'Cain, Riverbanks Zoo','susan',NULL),
	(158,5,203,NULL,1,1,'Elephants at the Zoo',NULL,'Susan O\'Cain, Riverbanks Zoo','susan','elephants'),
	(159,5,203,NULL,2,2,'Elephant in Music',NULL,'Danielle Kelley','danielle','elephant-music'),
	(160,5,204,'Farm',0,1,NULL,NULL,'Susan O\'Cain, Riverbanks Zoo','susan','farm'),
	(161,5,205,'Lorikeets',0,1,NULL,NULL,'Susan O\'Cain, Riverbanks Zoo','susan','lorikeet'),
	(162,5,206,'Kangaroo',0,0,NULL,NULL,'Susan O\'Cain, Riverbanks Zoo','susan',NULL),
	(163,5,206,NULL,1,1,'Kangaroos at the Zoo',NULL,'Susan O\'Cain, Riverbanks Zoo','susan','kangaroo'),
	(164,5,206,NULL,2,1,'Kangaroos in Music',NULL,'Danielle Kelley','danielle','kangaroo-music'),
	(165,5,207,NULL,1,2,'Mrs. Shelley\'s Pet',NULL,'Shelley Reed, Artist','shelley','pet'),
	(166,5,207,NULL,2,1,'Turtles',NULL,'Scott Pfaff','scott','turtles'),
	(167,5,207,'Turtles and Mrs. Shelley\'s Pet',0,2,NULL,NULL,NULL,NULL,NULL),
	(168,5,208,'Swan Music',0,2,NULL,NULL,'Danielle Kelley','danielle','swan-music'),
	(169,5,209,'Painting is Fun!',0,2,NULL,NULL,'Shelley Reed, Artist','shelley','painting-fun'),
	(170,5,210,'Lions',0,0,NULL,NULL,NULL,NULL,NULL),
	(171,5,210,NULL,1,2,'King of the Jungle',NULL,'Scott Pfaff','scott','lions'),
	(172,5,210,NULL,2,2,'Lion Music',NULL,'Danielle Kelley','danielle','lion-music'),
	(173,5,211,'Bird Concert',0,2,NULL,NULL,'Danielle Kelley','danielle','bird-concert'),
	(174,5,212,'Rooster and Turkey Music',0,2,NULL,NULL,'Danielle Kelley','danielle','roosterandturkey-music');

/*!40000 ALTER TABLE `tour_content` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tours
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tours`;

CREATE TABLE `tours` (
  `tourID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT '',
  `openDate` date DEFAULT '0000-00-00',
  `closeDate` date DEFAULT '0000-00-00',
  `image` varchar(25) DEFAULT NULL,
  `location` varchar(25) DEFAULT NULL,
  `length` varchar(25) DEFAULT NULL,
  `noStops` int(2) DEFAULT NULL,
  `details` text,
  `db_name` varchar(25) DEFAULT NULL,
  `menu` tinyint(1) DEFAULT NULL,
  `testing` tinyint(1) DEFAULT NULL,
  `show` tinyint(1) DEFAULT NULL,
  `icon` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`tourID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `tours` WRITE;
/*!40000 ALTER TABLE `tours` DISABLE KEYS */;

INSERT INTO `tours` (`tourID`, `title`, `openDate`, `closeDate`, `image`, `location`, `length`, `noStops`, `details`, `db_name`, `menu`, `testing`, `show`, `icon`)
VALUES
	(1,'Japan &amp; the Jazz Age','2014-02-07','2014-04-20','japan.jpg',NULL,NULL,NULL,NULL,'2014_1',1,NULL,1,NULL),
	(2,'Family Tour <span class=\'sub\'>Japan &amp; the Jazz Age</span>','2014-02-07','2014-04-20','japan-family.jpg',NULL,NULL,NULL,NULL,'2014_1',NULL,NULL,1,NULL),
	(3,'Meiji Magic','2014-01-03','2014-05-01','meiji.jpg',NULL,NULL,NULL,NULL,'2014_1',NULL,NULL,1,NULL),
	(4,'Animal Instinct: <br/>Paintings by Shelley Reed','2014-05-16','2014-09-14','meiji.jpg',NULL,NULL,NULL,NULL,'2014_2',NULL,0,1,1),
	(5,'Family Tour <span class=\'sub\'>Animal Instinct and Cheer for the Home Team!</span>','2014-05-16','2014-09-14','meiji.jpg',NULL,NULL,NULL,NULL,'2014_3',NULL,0,1,2);

/*!40000 ALTER TABLE `tours` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
