-- ============================================================
--  LE BON APPART — Script de création de la base de données
-- ============================================================

CREATE DATABASE IF NOT EXISTS annonces_immo
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE annonces_immo;

-- ------------------------------------------------------------
--  Table : agents
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS agents (
  id           INT           NOT NULL AUTO_INCREMENT,
  prenom       VARCHAR(100)  NOT NULL,
  nom          VARCHAR(100)  NOT NULL,
  email        VARCHAR(255)  NOT NULL UNIQUE,
  mot_de_passe VARCHAR(255)  NOT NULL,
  avatar       VARCHAR(255)  NOT NULL DEFAULT 'default.svg',
  created_at   TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
--  Table : annonces
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS annonces (
  id          INT            NOT NULL AUTO_INCREMENT,
  agent_id    INT            NOT NULL,
  titre       VARCHAR(255)   NOT NULL,
  ùm TEXT           NOT NULL,
  type        ENUM('location','vente') NOT NULL,
  prix        DECIMAL(10,2)  NOT NULL,
  postal_code VARCHAR(10)    NOT NULL,
  city        VARCHAR(100)   NOT NULL,
  created_at  TIMESTAMP      NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  CONSTRAINT fk_annonce_agent
    FOREIGN KEY (agent_id) REFERENCES agents(id)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
--  Table : messages
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS messages (
  id         INT           NOT NULL AUTO_INCREMENT,
  annonce_id INT           NOT NULL,
  nom        VARCHAR(150)  NOT NULL,
  email      VARCHAR(255)  NOT NULL,
  message    TEXT          NOT NULL,
  created_at TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  CONSTRAINT fk_message_annonce
    FOREIGN KEY (annonce_id) REFERENCES annonces(id)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ------------------------------------------------------------
--  Données : 3 agents
--  Mot de passe de tous les agents : motdepasse123
--  Hash bcrypt généré avec password_hash('motdepasse123', PASSWORD_DEFAULT)
-- ------------------------------------------------------------
INSERT INTO agents (prenom, nom, email, mot_de_passe, avatar) VALUES
(
  'Marie',
  'Dupont',
  'marie.dupont@exemple.fr',
  '$2y$12$Q4K1eF9QwJXzH2oK3vL8vOQZ0RZt5N5kF2UbY1bX3dWqA7cM6ePsO',
  'default.svg'
),
(
  'Thomas',
  'Leroy',
  'thomas.leroy@exemple.fr',
  '$2y$12$Q4K1eF9QwJXzH2oK3vL8vOQZ0RZt5N5kF2UbY1bX3dWqA7cM6ePsO',
  'default.svg'
),
(
  'Claire',
  'Martin',
  'claire.martin@exemple.fr',
  '$2y$12$Q4K1eF9QwJXzH2oK3vL8vOQZ0RZt5N5kF2UbY1bX3dWqA7cM6ePsO',
  'default.svg'
);

-- ------------------------------------------------------------
--  Données : 5 annonces
-- ------------------------------------------------------------
INSERT INTO annonces (agent_id, titre, description, type, prix, postal_code, city) VALUES
(
  1,
  'Appartement lumineux 3 pièces',
  'Bel appartement de 3 pièces au 4e étage avec ascenseur, situé dans le 1er arrondissement de Lyon. Séjour de 28 m² avec parquet, cuisine équipée indépendante, deux chambres, salle de bain avec baignoire. Double vitrage, chauffage central inclus. Disponible dès le 1er mars.',
  'location',
  850.00,
  '69001',
  'Lyon'
),
(
  1,
  'T3 traversant avec balcon',
  'Appartement traversant de 72 m² au 3e étage sans ascenseur. Deux chambres séparées, séjour avec balcon plein sud, cuisine ouverte récemment rénovée. Quartier calme, proche des commerces et du métro ligne B. Cave incluse.',
  'vente',
  198000.00,
  '69003',
  'Lyon'
),
(
  2,
  'Studio meublé proche gare',
  'Studio entièrement meublé de 22 m² idéal pour étudiant ou jeune actif. Situé à 5 minutes à pied de la gare Montparnasse. Cuisine équipée, salle de bain moderne, internet inclus dans les charges. Disponible immédiatement.',
  'location',
  920.00,
  '75015',
  'Paris'
),
(
  2,
  'Maison de ville 5 pièces avec jardin',
  'Belle maison de ville de 120 m² sur trois niveaux avec jardin privatif de 80 m². Cuisine ouverte sur salon, 3 chambres dont une suite parentale, bureau, deux salles de bain. Garage double. Secteur recherché, écoles à proximité.',
  'vente',
  385000.00,
  '33000',
  'Bordeaux'
),
(
  3,
  'Appartement vue mer 2 pièces',
  'Charmant appartement de 45 m² en résidence avec piscine, vue dégagée sur la mer. Séjour avec terrasse de 12 m², chambre avec dressing, cuisine équipée. Parking en sous-sol. Idéal comme résidence principale ou secondaire.',
  'vente',
  265000.00,
  '06400',
  'Cannes'
);
