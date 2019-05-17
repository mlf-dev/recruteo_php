-- FICHE DE REQUETES A FAIRE DANS LE TERMINALuse

-- Se connecter à la base de données après s'être mis dans le dossier du projet
mysql -u root -p

-- Création de la base de donnée
CREATE DATABASE recruteo_db CHARACTER SET UTF8mb4 COLLATE utf8mb4_general_ci;

-- Se placer dans la base de donnée en question
use recruteo_db;

-- Création de la table societe
CREATE TABLE societe(
    id INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    adresse VARCHAR(255) NOT NULL,
    code_postal VARCHAR(255) NOT NULL,
    ville VARCHAR(255) NOT NULL,
    CONSTRAINT  pk_id_societe PRIMARY KEY (id)
)ENGINE=innoDB DEFAULT CHARSET=utf8;

-- Création de la table langage
CREATE TABLE langage(
    id INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    CONSTRAINT pk_id_langage PRIMARY KEY (id)
)ENGINE=innoDB DEFAULT CHARSET=utf8;

-- Création de la table developpeur
CREATE TABLE developpeur(
                        id INT NOT NULL AUTO_INCREMENT,
                        nom VARCHAR(255) NOT NULL,
                        bio TEXT NOT NULL,
                        created_at DATETIME NOT NULL,
                        CONSTRAINT pk_id_developpeur PRIMARY KEY (id)
)ENGINE=innoDB DEFAULT CHARSET=utf8;

-- Création de la table equipe, qui possède une clé étrangère
CREATE TABLE equipe(
                            id INT NOT NULL AUTO_INCREMENT,
                            nom VARCHAR(255) NOT NULL,
                            created_at DATETIME NOT NULL,
                            id_societe INT NOT NULL,
                            CONSTRAINT pk_id_equipe PRIMARY KEY (id),
                            CONSTRAINT fk_id_societe FOREIGN KEY (id_societe) REFERENCES societe(id) ON DELETE CASCADE
)ENGINE=innoDB DEFAULT CHARSET=utf8;

-- Créer une société
INSERT INTO societe (nom, adresse, code_postal, ville) VALUES ('Next-Formation','8 rue Firmin Gillot','75015','paris');

-- Modifier une societe
# UPDATE societe SET adresse='9 rue Firmin Gillot' WHERE adresse='8 rue Firmin Gillot';

-- Supprimer la table
# DROP TABLE +nomdelatable;

-- Ajouter un attribut à une table
# ALTER TABLE equipe_developpeur ADD date_inscription DATETIME(255);

-- Insertion dans la table equipe d'une nouvelle équipe DWWM
INSERT INTO equipe (nom, created_at, id_societe) VALUES ('DWWM',NOW(),1);

-- Jointure d'équipe avec societe
SELECT * FROM equipe LEFT JOIN societe ON equipe.id_societe = societe.id;
-- autre possibilité
SELECT * FROM equipe, societe WHERE societe.id = equipe.id_societe;

-- Supprimer un tuple (une ligne) dans une table
DELETE FROM societe WHERE id=1;

-- Création de la table de liaison equipe_developpeur
CREATE TABLE equipe_developpeur (
    date_inscription DATETIME,
    id_developpeur INT NOT NULL,
    id_equipe INT NOT NULL,
    CONSTRAINT pk_equipe_developpeur PRIMARY KEY (id_developpeur,id_equipe),
    CONSTRAINT fk_id_developpeur FOREIGN KEY (id_developpeur) REFERENCES developpeur(id) ON DELETE CASCADE,
    CONSTRAINT fk_id_equipe FOREIGN KEY (id_equipe) REFERENCES equipe(id) ON DELETE CASCADE
)ENGINE=innoDB DEFAULT CHARSET=utf8;

-- Insérer des nouveaux développeurs
INSERT INTO developpeur (nom, bio, created_at) VALUES ('vincent','j\'aime les tic-tac', NOW());
INSERT INTO developpeur (nom, bio, created_at) VALUES ('alain', 'j\'aime m\'entrainer', NOW());
INSERT INTO developpeur (nom, bio, created_at) VALUES ('ozan', 'j\'aime les mangas', NOW());
INSERT INTO developpeur (nom, bio, created_at) VALUES ('marie-line', 'j\'aime la moto', NOW());
INSERT INTO developpeur (nom, bio, created_at) VALUES ('serge', 'j\'aime l\'amour véritable', NOW());
INSERT INTO developpeur (nom, bio, created_at) VALUES ('jamal', 'j\'aime la sieste', NOW());
INSERT INTO developpeur (nom, bio, created_at) VALUES ('said', 'j\'aime les couches pas chères', NOW());
INSERT INTO developpeur (nom, bio, created_at) VALUES ('benjamin', 'j\'aime le hockey sur glace', NOW());
INSERT INTO developpeur (nom, bio, created_at) VALUES ('julien', 'j\'aime bien tinder', NOW());
INSERT INTO developpeur (nom, bio, created_at) VALUES ('marie', 'j\'aime just dance', NOW());
INSERT INTO developpeur (nom, bio, created_at) VALUES ('majid', 'j\'aime rester à la maison', NOW());

-- lier dev à équipe
INSERT INTO equipe_developpeur(date_inscription, id_developpeur, id_equipe) VALUES (NOW(),1,2);
INSERT INTO equipe_developpeur(date_inscription, id_developpeur, id_equipe) VALUES (NOW(),2,2);
INSERT INTO equipe_developpeur(date_inscription, id_developpeur, id_equipe) VALUES (NOW(),3,2);
INSERT INTO equipe_developpeur(date_inscription, id_developpeur, id_equipe) VALUES (NOW(),4,2);
INSERT INTO equipe_developpeur(date_inscription, id_developpeur, id_equipe) VALUES (NOW(),5,2);
INSERT INTO equipe_developpeur(date_inscription, id_developpeur, id_equipe) VALUES (NOW(),6,2);
INSERT INTO equipe_developpeur(date_inscription, id_developpeur, id_equipe) VALUES (NOW(),7,2);
INSERT INTO equipe_developpeur(date_inscription, id_developpeur, id_equipe) VALUES (NOW(),8,2);
INSERT INTO equipe_developpeur(date_inscription, id_developpeur, id_equipe) VALUES (NOW(),9,2);
INSERT INTO equipe_developpeur(date_inscription, id_developpeur, id_equipe) VALUES (NOW(),10,2);
INSERT INTO equipe_developpeur(date_inscription, id_developpeur, id_equipe) VALUES (NOW(),11,2);

-- consulter la liste des développeurs appartenant à une équipe, qui elle, appartient à une société
SELECT * FROM developpeur d
LEFT JOIN equipe_developpeur ed on developpeur.id = ed.id_developpeur
LEFT JOIN equipe e on e.id = ed.id_equipe
LEFT JOIN societe s on s.id = e.id_societe;

SELECT * FROM developpeur,equipe_developpeur,equipe,societe WHERE developpeur.id = equipe_developpeur.id_developpeur AND equipe.id = equipe_developpeur.id_equipe AND societe.id = equipe.id_societe;
-- ou
SELECT * FROM developpeur,equipe_developpeur WHERE developpeur.id = equipe_developpeur.id_developpeur;

-- Créer des langages
INSERT INTO langage (nom) VALUES ('php');
INSERT INTO langage (nom) VALUES ('reactjs');
INSERT INTO langage (nom) VALUES ('nodejs');
INSERT INTO langage (nom) VALUES ('javascript');
INSERT INTO langage (nom) VALUES ('css');
INSERT INTO langage (nom) VALUES ('laravel');
INSERT INTO langage (nom) VALUES ('react native');
INSERT INTO langage (nom) VALUES ('symfony');
INSERT INTO langage (nom) VALUES ('vuejs');
INSERT INTO langage (nom) VALUES ('angular');
INSERT INTO langage (nom) VALUES ('html');

-- Faire la table de laison entre les langages et les développeurs
CREATE TABLE langage_developpeur (
    id_developpeur INT NOT NULL,
    id_langage INT NOT NULL,
    CONSTRAINT pk_langage_developpeur PRIMARY KEY (id_developpeur,id_langage),
    CONSTRAINT fk_id_developpeur_langage FOREIGN KEY (id_developpeur) REFERENCES developpeur(id) ON DELETE CASCADE,
    CONSTRAINT fk_id_langage FOREIGN KEY (id_langage) REFERENCES langage(id) ON DELETE CASCADE
)ENGINE=innoDB DEFAULT CHARSET=utf8;

-- Association des langages à des développeurs
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (1,1);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (1,2);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (1,3);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (2,4);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (2,3);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (2,5);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (3,1);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (4,8);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (5,9);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (6,10);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (7,6);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (8,7);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (9,9);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (10,11);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (11,3);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (11,2);
-- Association des langages requis aux développeurs de l'équipe dwwm :
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (1,4);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (2,1);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (3,4);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (4,1);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (4,4);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (5,1);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (5,4);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (6,4);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (6,1);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (7,4);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (7,1);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (8,4);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (8,1);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (9,4);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (9,1);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (10,1);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (10,4);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (11,1);
INSERT INTO langage_developpeur(id_developpeur, id_langage) VALUES (11,4);

-- Faire la table de jointure entre les équipes et les langages requis
CREATE TABLE langage_requis_equipe(
    id_equipe INT NOT NULL,
    id_langage INT NOT NULL,
    CONSTRAINT pk_langage_requis PRIMARY KEY (id_equipe,id_langage),
    CONSTRAINT fk_id_equipe_langage_requis FOREIGN KEY (id_equipe) REFERENCES equipe(id) ON DELETE CASCADE,
    CONSTRAINT fk_id_langage_requis FOREIGN KEY (id_langage) REFERENCES langage(id) ON DELETE CASCADE
)ENGINE=innoDB DEFAULT CHARSET=utf8;

-- On associe les langages requis à l'équipe voulue
INSERT INTO langage_requis_equipe (id_equipe, id_langage) VALUES (2, 1);
INSERT INTO langage_requis_equipe (id_equipe, id_langage) VALUES (2, 4);

