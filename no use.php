SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

-- Table structure for table `admin`
CREATE TABLE
  `admin` (
    `id` int (11) NOT NULL,
    `first_name` varchar(255) NOT NULL,
    `last_name` varchar(255) NOT NULL,
    `username` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- Dumping data for table `admin`
INSERT INTO
  `admin` (
    `id`,
    `first_name`,
    `last_name`,
    `username`,
    `password`
  )
VALUES
  (
    1,
    'Jayesh',
    'sharma',
    'admin',
    '$2y$10$kggeKkIs6rEWf.p/6muJCOepa8zY4DcDU3CBZua8iNc9SBM3MMGym'
  );

-- Table structure for table `category`
CREATE TABLE
  `category` (
    `id` int (11) NOT NULL,
    `category` varchar(127) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO
  `category` (`id`, `category`)
VALUES
  (1, 'Science'),
  (2, 'Technology'),
  (3, 'Biology'),
  (4, 'Poems'),
  (5, 'Programming');

--
-- Table structure for table `post`
CREATE TABLE
  `post` (
    `post_id` int (11) NOT NULL,
    `post_title` varchar(127) NOT NULL,
    `post_text` text NOT NULL,
    `category` int (11) NOT NULL,
    `publish` int (2) NOT NULL DEFAULT 1,
    `cover_url` varchar(255) NOT NULL DEFAULT 'default.jpg',
    `crated_at` datetime NOT NULL DEFAULT current_timestamp()
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- Dumping data for table `post`
INSERT INTO `post` (`post_title`, `post_text`, `category`, `cover_url`)
VALUES ('New Title', 'This is the body of the new post.', 1, '01.jpg');

INSERT INTO `post` (`post_title`, `post_text`, `category`, `cover_url`)
VALUES ('New Title', 'This is the body of the new post.', 1, '02.jpg');

INSERT INTO `post` (`post_title`, `post_text`, `category`, `cover_url`)
VALUES ('New Title', 'This is the body of the new post.', 1, '03.jpg');

INSERT INTO `post` (`post_title`, `post_text`, `category`, `cover_url`)
VALUES ('New Title', 'This is the body of the new post.', 2, '01.jpg');

INSERT INTO `post` (`post_title`, `post_text`, `category`, `cover_url`)
VALUES ('New Title', 'This is the body of the new post.', 2, '02.jpg');

INSERT INTO `post` (`post_title`, `post_text`, `category`, `cover_url`)
VALUES ('New Title', 'This is the body of the new post.', 2, '03.jpg');

INSERT INTO `post` (`post_title`, `post_text`, `category`, `cover_url`)
VALUES ('New Title', 'This is the body of the new post.', 3, '01.jpg');

INSERT INTO `post` (`post_title`, `post_text`, `category`, `cover_url`)
VALUES ('New Title', 'This is the body of the new post.', 3, '02.jpg');

INSERT INTO `post` (`post_title`, `post_text`, `category`, `cover_url`)
VALUES ('New Title', 'This is the body of the new post.', 4, '03.jpg');

INSERT INTO `post` (`post_title`, `post_text`, `category`, `cover_url`)
VALUES ('New Title', 'This is the body of the new post.', 4, '01.jpg');

INSERT INTO `post` (`post_title`, `post_text`, `category`, `cover_url`)
VALUES ('New Title', 'This is the body of the new post.', 5, '02.jpg');

INSERT INTO `post` (`post_title`, `post_text`, `category`, `cover_url`)
VALUES ('New Title', 'This is the body of the new post.', 5, '03.jpg');




-- Table structure for table `users`
CREATE TABLE
  `users` (
    `id` INT (11) NOT NULL,
    `fname` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;





-- Dumping data for table `users`
INSERT INTO
  `users` (`id`, `fname`, `username`, `password`)
VALUES
  (
    1,
    'Manish',
    'dube',
    '$2y$10$5KdCaBOhNE6HZOmn39jO4OOyKUI1xC1St51KH8DhtXGX8drct98/q'
  ),
  (
    2,
    'Hardik',
    'Patel',
    '$2y$10$KpVvp9ixSCn/9FMR3k0tn.0Oul5lf2jGaCGPOgKyyxQTdyMk8xtlG'
  );




CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
  

ALTER TABLE `admin` ADD PRIMARY KEY (`id`);

ALTER TABLE `category` ADD PRIMARY KEY (`id`);

ALTER TABLE `post` ADD PRIMARY KEY (`post_id`);

ALTER TABLE `users` ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `username` (`username`);

-- AUTO_INCREMENT
ALTER TABLE `admin` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `category` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `post` MODIFY `post_id` int (11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT;

ALTER TABLE contact_messages
ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE contact_messages 
ADD COLUMN status ENUM('unread', 'read') DEFAULT 'unread';

COMMIT;