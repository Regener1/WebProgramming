-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `forums`;
CREATE TABLE `forums` (
  `id_forum` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id_forum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `forums` (`id_forum`, `title`) VALUES
(1,	'Information'),
(2,	'About all'),
(3,	'Free theme');

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `author` varchar(30) NOT NULL,
  `topics_id_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `topics_id_fk` (`topics_id_fk`),
  CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`topics_id_fk`) REFERENCES `topics` (`id_topic`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `posts` (`id_post`, `text`, `date`, `author`, `topics_id_fk`) VALUES
(1,	'short answer',	'2017-10-23 23:39:36',	'anonim',	1),
(2,	'second answer',	'2017-10-23 23:40:22',	'crazy1',	2),
(3,	'simple text',	'2017-10-23 23:40:54',	'zero',	3),
(4,	'empty answer',	'2017-10-24 16:00:33',	'no',	1);

DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `file_path` text,
  `author` varchar(30) NOT NULL,
  `forums_id_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_topic`),
  KEY `forums_id_fk` (`forums_id_fk`),
  CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`forums_id_fk`) REFERENCES `forums` (`id_forum`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `topics` (`id_topic`, `title`, `text`, `date`, `file_path`, `author`, `forums_id_fk`) VALUES
(1,	'Important',	'Tomorrow sit drink chili, functional Bureau temperature is realized. Nutrition salad recipes, pregnant layer valley football, targeted clinical football. However, a driver now. Tomorrow we had before and, tristique id from the id, vulputate is brought about football. Nulla. Now sit carton fermentation. However, lorem region to invest or not done that nutrition or taste.\r\nLive long mourning fermentation.\r\n\r\nAnd that the gate, Etiam bibendum risus, ac posuere mauris of the valley. Clinical and Bureau itself. The latest photography enforcement passengers. Jasmine from nibh eu lorem financing leakage. Clinical Planning my need is the most exciting, who made a smart layer. Present sniper, poisonous propaganda of financing, diam dui enforcement professionals,\r\na ferry that has not organizations. Nam suscipit vulputate felis, and to help you. Nisi ultrices Morbi non, dapibus elit ac, malesuada tortor. Is not present diam. Now trigger athletics, soccer any free life makeup casino developer. Present cursus diam mauris, in luctus orci turpis.\r\n\r\nOf course, in the porch of his exemplary life, nor the price of a free unless they need.\r\nClinical makeup Planning diameter of the deposit. Clinical sauce smile on my basketball a targeted hate changes. As well as large, but it was not our design now varius lobortis vulputate velit urna metus. Reserved entrance to invest it in a smart, photography eros. Tincidunt suscipit sed developer time, soccer mourning diameter leakage. You have no euismod ex.\r\nNulla.',	'2017-10-22 11:00:05',	NULL,	'Admin',	1),
(2,	'Sample',	'Fermentum basketball propaganda, but it is basketball macro tomato. Tomorrow nutrition lion pool does not pass, the biggest football outdoor photography. The People\'s Bank lorem sem need gas, real estate targeted networks. Recommended set free propaganda. Present, as he was drinking, from the hatred of basketball, the gate diameter.\r\nFrom the present eget nulla non lacus consectetur faucibus eget odio. For now receives a large receives receives the jaws of convenience. For players who diameter. Each time previously, that deductible Pacific Pacific carrots.\r\n\r\nUltricies developers drop, no poisonous protein from me. Till innovative thermal element. Massage is important sterilized airports,\r\nand chokes the region. Dui or homework, carrots targeted lorem. Vivamus euismod ex nisl, quis enim Maecenas sit amet hendrerit of life. Tomorrow sapien macro, it will sit at, targeted at consumer. The largest gateway to the makeup. Duis sed vulputate purus, and chocolate cake. Pregnant with kids need a large notebook,\r\nbut care chili real estate. Laoreet graduated on a real deductible. However, the clinical receives.',	'2017-10-22 11:01:43',	NULL,	'Admin',	2),
(3,	'About all topick',	'Now at outdoor manufacturing, from Japan and some salad. Kids sit smile dolor In vel was a smile. Quisque cursus tincidunt sapien, was to adorn the life of a makeup. Integer ac venenatis ligula, drink a lot of out of. For developers laughter film, or gateway salad pregnant life. No diameter of cats.\r\nBefore the very first basketball set their jaws grief and clinical care; The life of Vivamus ante porta non, fermentum mi sit amet, lobortis ex. Jasmine smile and relax. But condi eros tellus pede Pellentesque massa Aenean nec orci lacus lobortis eu warm-up.\r\n\r\nInteger sodales ullamcorper nibh, posuere of life itself. Even valley lakes or mass feugiat feugiat.\r\nSoccer and sit temperature. Moors antioxidants, there is no need door members, ugly ugly Planning agency, the ecological pot dui any hardware. Integer quis felis protein, ultrices nisl nec, sagittis lorem. Present price of lorem. Live Vulputate approval to quiver real estate, tomato salad with propaganda, but basketball now that it was before.\r\nEach sterilized fears football cartoon big impact. Not of life, the life of a lion, tempus ullamcorper dui Nullam sit amet elit. Morbi hendrerit facilisis lorem, et condimentum nisi. Aenean quis neque nec lorem into the entrance room. Propaganda relay at the main players who can not drink from it. Now or at any vehicles, diving football around.\r\nProin nec arcu vitae dolor facilisis mattis. The film is not always a soft asset. The refinancing. The pain in the competition, but the valley, or vehicles, and the territories that had not. Class began Employment twist by our marriage, per himenaeos. This is accomplished in the classroom. Sed velit sapien, tempor id is the same as,\r\ntincidunt dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Reserved no need carrots that said vehicles. Duis feugiat, resulting in a lot of ultrices, nisl risus consectetur, eros turpis, or boundaries, who can know except.\r\n\r\nAenean vitae urna massa. Sapien just chat, ultricies propaganda or, a protein-free.\r\nBut the makeup so that the arc throat real estate. Suspendisse the ends of the, lacus laoreet vulputate faucibus, sapien mi hendrerit nisl, vel porttitor mauris how you look at a great slaughter. Sed quis urna egestas mi. The care from either players pull photography courses. At this sterilized before.\r\n\r\nPull a boat ugly in real estate. Maecenas graduated mass, and clinical development at;\r\nweekend kits. Maecenas risus various bows now adorn any propaganda. Tomorrow that any developer or development. There is no protein except that a lot of chocolate. Gluten. Economy and is parturient Curabitur elit Maecenas tempus tincidunt. That boat macro real estate and Performance. How or ceramic start. Heart disease and convallis velit.\r\nBut of course, it becomes hatred sauce. Present rutrum lacinia magna, eleifend et sit eget velit gravida sit amet. Donec suscipit vehicula velit, adipiscing eget, to the gate of a lion. That\'s largest casino-free, and no warm-up. A video developers ugly.',	'2017-10-22 11:02:46',	NULL,	'Admin',	3);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id_user`, `user_name`, `email`, `password`) VALUES
(1,	'admin',	'admin@mail.ru',	'1234');

-- 2017-11-07 20:52:44