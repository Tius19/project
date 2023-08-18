CREATE DATABASE `super_w`;
CREATE TABLE `super_w`.`categories` ( `categorie_id` INT NOT NULL AUTO_INCREMENT, `user_id` INT(11) NOT NULL, `categorie_name` VARCHAR(128) NOT NULL, `description` VARCHAR(256) NOT NULL, PRIMARY KEY (`categorie_id`), FOREIGN KEY (`user_id`) REFERENCES users(`user_id`)) ENGINE = MyISAM;
CREATE TABLE `super_w`.`users` ( `user_id` INT NOT NULL AUTO_INCREMENT, `full_name` VARCHAR(128) NOT NULL, `email` VARCHAR(256) NOT NULL, `password` VARCHAR(256) NOT NULL, PRIMARY KEY (`user_id`)) ENGINE = MyISAM;
CREATE TABLE `super_w`.`products` ( `product_id` INT NOT NULL AUTO_INCREMENT, `categorie_id` INT(11) NOT NULL, `user_id` INT(11) NOT NULL, `product_name` VARCHAR(128) NOT NULL, PRIMARY KEY (`product_id`), FOREIGN KEY (`categorie_id`) REFERENCES categories(`categorie_id`), FOREIGN KEY (`user_id`) REFERENCES users(`user_id`)) ENGINE = MyISAM;

INSERT INTO `categories` (`categorie_id`, `user_id`, `categorie_name`, `description`) VALUES
(1, 1, 'Ustensiles de cuisine', 'Tout ce dont vous avez besoin pour faire de bon petits plats'),
(2, 1, 'Outils de jardin', 'Le nécessaire du jardinier'),
(3, 1, 'Produits ménagers', 'Tout pour le ménage'),
(4, 2, 'Nourritures', 'De bon ingrédients'),
(5, 2, 'Produits cosmétiques', 'Pour prendre soin de vous ');

INSERT INTO `users` (`user_id`, `full_name`, `email`, `password`) VALUES
(1, 'John Doe', 'exemple@mail.com', '12345'),
(2, 'Jean ValJean', 'jean@mail.com', '12345');

INSERT INTO `products` (`product_id`, `categorie_id`, `user_id`, `product_name`) VALUES
(1, 1, 1, 'Fourchette'),
(2, 1, 1, 'Cuillère'),
(3, 1, 1, 'Couteau'),
(4, 2, 1, 'Pelle'),
(5, 2, 1, 'Rateau'),
(6, 2, 1, 'Gants de jardinage'),
(7, 3, 1, 'Balai'),
(8, 3, 1, 'Liquide vaiselle'),
(9, 3, 1, 'Serpillère'),
(10, 4, 2, 'Riz'),
(11, 4, 2, 'Lentilles'),
(12, 4, 2, 'Poulet'),
(13, 5, 2, 'Dentifrice'),
(14, 5, 2, 'Maquillage'),
(15, 5, 2, 'Déodorant');
