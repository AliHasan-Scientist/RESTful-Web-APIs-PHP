CREATE TABLE `posts`
(
    `id`          int(11) NOT NULL AUTO_INCREMENT,
    `category_id` int(11) NOT NULL,
    `title`       varchar(255) NOT NULL,
    `body`        text         NOT NULL,
    `author`      varchar(255) NOT NULL,
    `created_at`  datetime     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);
INSERT INTO `posts` (`id`, `category_id`, `title`, `body`, `author`)
VALUES (1, 1, 'Technology Post One',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut interdum est nec lorem mattis interdum. Cras augue est, interdum eu consectetur et, faucibus vel turpis. Etiam pulvinar, enim quis elementum iaculis, tortor sapien eleifend eros, vitae rutrum augue quam sed leo. Vivamus fringilla, diam sit amet vestibulum vulputate, urna risus hendrerit arcu, vitae fringilla odio justo vulputate neque. Nulla a massa sed est vehicula rhoncus sit amet quis libero. Integer euismod est quis turpis hendrerit, in feugiat mauris laoreet. Vivamus nec laoreet neque. Cras condimentum aliquam nunc nec maximus. Cras facilisis eros quis leo euismod pharetra sed cursus orci.',
        'Sam Smith');
