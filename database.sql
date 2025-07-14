create table emprunt_membre(
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    date_de_naissance DATE,
    genre CHAR(10),
    email VARCHAR(100),
    mdp VARCHAR(150),
    image_profil VARCHAR(250),
    ville VARCHAR(100)
);

create table emprunt_categorie_objet(
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(100)
);

create table emprunt_objet(
    id_objet INT AUTO_INCREMENT PRIMARY KEY,
    nom_objet VARCHAR(150),
    id_categorie INT,
    id_membre INT
);

create table emprunt_images_objet(
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    nom_image VARCHAR(250)
);

create table emprunt_emprunt(
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE
);

INSERT INTO emprunt_membre(nom, date_de_naissance, genre, email, ville, mdp, image_profil) VALUES
('Ranoro', '1990-05-15', 'F', 'ranoro@gmail.com', 'Paris', '1234', 'Ranoro.png'),
('Rakoto', '1985-01-30', 'M', 'rakoto@gmail.com', 'Andavamamba', 'kotora','Rakoto.png'),
('Rasoa', '2000-06-26', 'F', 'rasoa@gmail.com', 'Caire', '0000', 'Rasoa.png'),
('Rabe', '1999-12-31', 'M', 'rabe@gmail.com', 'Bogota', '1111', 'Rabe.png');

INSERT INTO emprunt_categorie_objet(nom_categorie) VALUES
('esthetique'),('bricolage'), ('mecanique'), ('cuisine');

INSERT INTO emprunt_objet(nom_objet, id_categorie, id_membre) VALUES
('Seche-cheveux', 1, 1), ('Lisseur', 1, 1), ('Peigne', 1, 1),
('Marteau', 2, 1), ('Tournevis', 2, 1), ('Perceuse', 2, 1),
('Cle a molette', 3, 1), ('Crics', 3, 1),
('Mixeur', 4, 1), ('Poele', 4, 1);

INSERT INTO emprunt_objet(nom_objet, id_categorie, id_membre) VALUES
('Tondeuse', 1, 2), ('Brosse', 1, 2),
('Scie', 2, 2), ('Pince', 2, 2), ('Perceuse', 2, 2),
('Pistolet a graisse', 3, 2), ('Pompe a air', 3, 2), ('Multimetre', 3, 2),
('Casserole', 4, 2), ('Spatule', 4, 2);

INSERT INTO emprunt_objet(nom_objet, id_categorie, id_membre) VALUES
('Peigne', 1, 3), ('Lisseur', 1, 3), ('Seche-cheveux', 1, 3),
('Perceuse', 2, 3), ('Pince', 2, 3),
('Crics', 3, 3), ('Cle a molette', 3, 3), ('Pompe a air', 3, 3),
('Robot patissier', 4, 3), ('Mixeur', 4, 3);

INSERT INTO emprunt_objet(nom_objet, id_categorie, id_membre) VALUES
('Tondeuse', 1, 4), ('Brosse', 1, 4),
('Scie', 2, 4), ('Marteau', 2, 4), ('Tournevis', 2, 4),
('Multimetre', 3, 4), ('Cle a molette', 3, 4), ('Pistolet a graisse', 3, 4),
('Poele', 4, 4), ('Casserole', 4, 4);


INSERT INTO emprunt_emprunt(id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-07-01', '2025-07-10'),   
(4, 3, '2025-07-02', '2025-07-12'),  
(7, 4, '2025-07-03', '2025-07-11'),   
(11, 1, '2025-07-01', '2025-07-07'),  
(14, 3, '2025-07-05', '2025-07-15'),  
(16, 1, '2025-07-04', '2025-07-14'),    
(21, 2, '2025-07-03', '2025-07-13'),  
(26, 4, '2025-07-06', '2025-07-20'),   
(31, 1, '2025-07-02', '2025-07-12'),  
(35, 3, '2025-07-08', '2025-07-18');  


create or replace view emprunt_v_emprunt_objet as 
    SELECT o.id_objet, o.nom_objet, o.id_categorie, o.id_membre,e.date_emprunt, e.date_retour FROM emprunt_emprunt as e JOIN emprunt_objet as o ON e.id_objet = o.id_objet;

create or replace view emprunt_v_categorie_objet as
    SELECT o.id_objet, o.nom_objet, o.id_categorie, c.nom_categorie FROM emprunt_objet as o JOIN emprunt_categorie_objet as c ON c.id_categorie = o.id_categorie;

create or replace view emprunt_v_images_objet as 
    SELECT o.id_objet, o.nom_objet, o.id_categorie, i.nom_image, i.id_image FROM emprunt_objet as o JOIN emprunt_images_objet as i ON o.id_objet = i.id_objet;    