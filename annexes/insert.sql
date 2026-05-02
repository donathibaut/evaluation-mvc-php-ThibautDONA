START TRANSACTION;

USE `bdd-tpak`;

--
-- DELETE data from db before INSERT
--

DELETE FROM `trajets`;
DELETE FROM `agences`;
DELETE FROM `grpUsers`;
DELETE FROM `users`;

ALTER TABLE `trajets` AUTO_INCREMENT = 1;
ALTER TABLE `agences` AUTO_INCREMENT = 1;
ALTER TABLE `grpUsers` AUTO_INCREMENT = 1;
ALTER TABLE `users` AUTO_INCREMENT = 1;

--
-- (Passwords intended for testing)
--

INSERT INTO users (nom_user, prenom_user, tel, mail, password, is_admin) VALUES
('Ladmin','Amine','0612345678','admin@email.fr', '$2y$10$Mz.a1.4i2KeOC05Qb2YOoO9hEO01rAtS9LmI1dOJMdOHsbPsKaqW6', 1),
('Martin','Alexandre','0612345678','alexandre.martin@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Dubois','Sophie','0698765432','sophie.dubois@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Bernard','Julien','0622446688','julien.bernard@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Moreau','Camille','0611223344','camille.moreau@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Lefèvre','Lucie','0777889900','lucie.lefevre@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Leroy','Thomas','0655443322','thomas.leroy@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Roux','Chloé','0633221199','chloe.roux@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Petit','Maxime','0766778899','maxime.petit@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Garnier','Laura','0688776655','laura.garnier@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Dupuis','Antoine','0744556677','antoine.dupuis@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Lefebvre','Emma','0699887766','emma.lefebvre@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Fontaine','Louis','0655667788','louis.fontaine@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Chevalier','Clara','0788990011','clara.chevalier@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Robin','Nicolas','0644332211','nicolas.robin@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Gauthier','Marine','0677889922','marine.gauthier@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Fournier','Pierre','0722334455','pierre.fournier@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Girard','Sarah','0688665544','sarah.girard@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Lambert','Hugo','0611223366','hugo.lambert@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Masson','Julie','0733445566','julie.masson@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0),
('Henry','Arthur','0666554433','arthur.henry@email.fr', '$2y$10$OfPjBa7YceVi8kpu7.duOegc2lHUvz/BjMKfCZbzznq4kpDTOHohS', 0);

INSERT INTO agences (ville_agence) VALUES
('Paris'), ('Lyon'), ('Marseille'), ('Toulouse'), ('Nice'), ('Nantes'), ('Strasbourg'), ('Montpellier'), ('Bordeaux'), ('Lille'), ('Rennes'), ('Reims');

--
-- Finish TRANSACTION
--
COMMIT;