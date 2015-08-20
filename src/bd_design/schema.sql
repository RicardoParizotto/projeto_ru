CREATE TABLE `Usuário` (
	`_id` INT NOT NULL AUTO_INCREMENT,
	`nome` varchar(40) NOT NULL,
	`senha` varchar(32) NOT NULL,
	PRIMARY KEY (`_id`)
);

CREATE TABLE `Cardapio` (
	`_id` INT NOT NULL AUTO_INCREMENT,
	`Descricao` TEXT NOT NULL,
	`Data` DATE NOT NULL,
	`Nome` varchar(40) NOT NULL,
	`img_url` varchar(40),
	PRIMARY KEY (`_id`)
);

CREATE TABLE `Avaliacao` (
	`_id` INT NOT NULL AUTO_INCREMENT,
	`id_cardapio` INT NOT NULL,
	`nota` BOOLEAN NOT NULL,
	`comentario` TEXT,
	PRIMARY KEY (`_id`)
);

ALTER TABLE `Avaliacao` ADD CONSTRAINT `Avaliacao_fk0` FOREIGN KEY (`id_cardapio`) REFERENCES `Cardapio`(`_id`);

