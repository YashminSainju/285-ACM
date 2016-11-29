CREATE TABLE `images` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `img` longblob NOT NULL,
 `caption` tinytext NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
