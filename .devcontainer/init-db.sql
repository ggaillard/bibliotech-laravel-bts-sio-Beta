-- Script d'initialisation PostgreSQL pour BiblioTech
-- Séance 1 : Fondations Laravel + Docker

-- Création de la base de données principale (si elle n'existe pas)
-- Note: Déjà créée par POSTGRES_DB dans docker-compose.yml

-- Configuration de la base pour Laravel
SET timezone = 'UTC';

-- Extension pour les UUID (pour les séances futures)
CREATE EXTENSION IF NOT EXISTS "uuid-ossp";

-- Extension pour la recherche full-text (Séance 6)
CREATE EXTENSION IF NOT EXISTS "unaccent";

-- Création d'un utilisateur pour les tests (optionnel)
-- DO $$ 
-- BEGIN
--     IF NOT EXISTS (SELECT FROM pg_user WHERE usename = 'bibliotech_test') THEN
--         CREATE USER bibliotech_test WITH PASSWORD 'test_secret';
--         GRANT ALL PRIVILEGES ON DATABASE bibliotech TO bibliotech_test;
--     END IF;
-- END $$;

-- Log de l'initialisation
INSERT INTO pg_stat_activity (query) 
VALUES ('BiblioTech database initialized for Séance 1') 
ON CONFLICT DO NOTHING;

-- Message de confirmation
SELECT 'BiblioTech PostgreSQL initialized successfully for Laravel!' as status;