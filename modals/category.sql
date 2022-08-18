CREATE TABLE `categories` (
                              `id` int(11) NOT NULL AUTO_INCREMENT,
                              `name` varchar(255) NOT NULL,
                              `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                              PRIMARY KEY (`id`)
);

INSERT INTO `categories` (`id`, `name`) VALUES
                                            (1, 'Technology'),
                                            (2, 'Gaming'),
                                            (3, 'Auto'),
                                            (4, 'Entertainment'),
                                            (5, 'Books');

