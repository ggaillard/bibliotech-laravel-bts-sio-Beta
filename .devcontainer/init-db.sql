-- ===============================================
-- Script d'initialisation PostgreSQL - BiblioTech Séance 1
-- Base de données prête pour l'apprentissage Laravel
-- ===============================================

-- Configuration initiale
SET client_encoding = 'UTF8';
SET default_transaction_isolation = 'read committed';
SET timezone = 'UTC';

-- Message de démarrage
\echo '🚀 Initialisation de la base de données BiblioTech...'

-- Créer les extensions nécessaires pour Laravel
CREATE EXTENSION IF NOT EXISTS "uuid-ossp";
CREATE EXTENSION IF NOT EXISTS "unaccent";

-- Créer un utilisateur pour l'application (sécurité)
DO $$
BEGIN
    IF NOT EXISTS (SELECT FROM pg_catalog.pg_roles WHERE rolname = 'bibliotech_user') THEN
        CREATE USER bibliotech_user WITH ENCRYPTED PASSWORD 'bibliotech_secret';
    END IF;
END
$$;

-- Accorder les permissions à l'utilisateur
GRANT CONNECT ON DATABASE bibliotech TO bibliotech_user;
GRANT USAGE ON SCHEMA public TO bibliotech_user;
GRANT CREATE ON SCHEMA public TO bibliotech_user;
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO bibliotech_user;
GRANT ALL PRIVILEGES ON ALL SEQUENCES IN SCHEMA public TO bibliotech_user;
ALTER DEFAULT PRIVILEGES IN SCHEMA public GRANT ALL ON TABLES TO bibliotech_user;
ALTER DEFAULT PRIVILEGES IN SCHEMA public GRANT ALL ON SEQUENCES TO bibliotech_user;

-- Configuration pour Laravel
SET search_path TO public;

-- Table des migrations Laravel (sera utilisée automatiquement)
-- Laravel la créera automatiquement, on prépare juste l'environnement

-- Pour la Séance 1, on crée juste une table simple pour tester
-- Les vraies migrations seront vues en Séance 2
CREATE TABLE IF NOT EXISTS health_check (
    id SERIAL PRIMARY KEY,
    status VARCHAR(50) DEFAULT 'ok',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insérer une donnée de test
INSERT INTO health_check (status) VALUES ('database_ready') ON CONFLICT DO NOTHING;

-- Message de fin
\echo '✅ Base de données BiblioTech initialisée avec succès !'
\echo 'ℹ️  Utilisateur: postgres / bibliotech_user'
\echo 'ℹ️  Base de données: bibliotech'
\echo 'ℹ️  Port: 5432'
