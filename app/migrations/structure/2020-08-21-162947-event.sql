CREATE TABLE IF NOT EXISTS `event_categories` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `event` (
     `id` int NOT NULL,
     `gallery_id` int DEFAULT NULL,
     `gategory_id` int NOT NULL DEFAULT '1',
     `name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
     `slug` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
     `content` text COLLATE utf8mb4_general_ci NOT NULL,
     `public` int NOT NULL,
     `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `event`
    ADD PRIMARY KEY (`id`),
    ADD KEY `event_ibfk_1` (`gallery_id`),
    ADD KEY `event_ibfk_2` (`gategory_id`);

ALTER TABLE `event`
    MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `event`
    ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
    ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`gategory_id`) REFERENCES `event_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;