<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240729095934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__agents AS SELECT id FROM agents');
        $this->addSql('DROP TABLE agents');
        $this->addSql('CREATE TABLE agents (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, utilisateur_id_id INTEGER DEFAULT NULL, entite_id_id INTEGER DEFAULT NULL, responsable BOOLEAN NOT NULL, CONSTRAINT FK_9596AB6EB981C689 FOREIGN KEY (utilisateur_id_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9596AB6E73CE5D14 FOREIGN KEY (entite_id_id) REFERENCES entites_supports (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO agents (id) SELECT id FROM __temp__agents');
        $this->addSql('DROP TABLE __temp__agents');
        $this->addSql('CREATE INDEX IDX_9596AB6EB981C689 ON agents (utilisateur_id_id)');
        $this->addSql('CREATE INDEX IDX_9596AB6E73CE5D14 ON agents (entite_id_id)');
        $this->addSql('ALTER TABLE comptes ADD COLUMN nom_compte VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE comptes ADD COLUMN type_compte VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE comptes ADD COLUMN date_ouverture DATETIME NOT NULL');
        $this->addSql('ALTER TABLE comptes ADD COLUMN statut_compte VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE comptes ADD COLUMN solde INTEGER NOT NULL');
        $this->addSql('CREATE TEMPORARY TABLE __temp__contacts AS SELECT id FROM contacts');
        $this->addSql('DROP TABLE contacts');
        $this->addSql('CREATE TABLE contacts (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, compte_id_id INTEGER DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, statut_contact VARCHAR(255) NOT NULL, CONSTRAINT FK_3340157386A5793C FOREIGN KEY (compte_id_id) REFERENCES comptes (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO contacts (id) SELECT id FROM __temp__contacts');
        $this->addSql('DROP TABLE __temp__contacts');
        $this->addSql('CREATE INDEX IDX_3340157386A5793C ON contacts (compte_id_id)');
        $this->addSql('ALTER TABLE entites_supports ADD COLUMN nom_entite VARCHAR(255) NOT NULL');
        $this->addSql('CREATE TEMPORARY TABLE __temp__factures AS SELECT id FROM factures');
        $this->addSql('DROP TABLE factures');
        $this->addSql('CREATE TABLE factures (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, compte_id_id INTEGER DEFAULT NULL, service_id_id INTEGER DEFAULT NULL, montant INTEGER NOT NULL, date_facturation DATETIME NOT NULL, date_paiement DATETIME NOT NULL, date_expiration DATETIME NOT NULL, statut_facture VARCHAR(255) NOT NULL, CONSTRAINT FK_647590B86A5793C FOREIGN KEY (compte_id_id) REFERENCES comptes (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_647590BD63673B0 FOREIGN KEY (service_id_id) REFERENCES services (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO factures (id) SELECT id FROM __temp__factures');
        $this->addSql('DROP TABLE __temp__factures');
        $this->addSql('CREATE INDEX IDX_647590B86A5793C ON factures (compte_id_id)');
        $this->addSql('CREATE INDEX IDX_647590BD63673B0 ON factures (service_id_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__incidents AS SELECT id FROM incidents');
        $this->addSql('DROP TABLE incidents');
        $this->addSql('CREATE TABLE incidents (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, canal_id_id INTEGER DEFAULT NULL, motif_id_id INTEGER DEFAULT NULL, sous_motif_id_id INTEGER DEFAULT NULL, contact_id_id INTEGER DEFAULT NULL, service_id_id INTEGER DEFAULT NULL, priorite_id_id INTEGER DEFAULT NULL, teleconseiller_id_id INTEGER DEFAULT NULL, entite_support_id_id INTEGER DEFAULT NULL, description VARCHAR(255) NOT NULL, commentaire VARCHAR(255) DEFAULT NULL, statut_incident VARCHAR(255) NOT NULL, disponiblite BOOLEAN NOT NULL, date_echeance DATETIME DEFAULT NULL, CONSTRAINT FK_E65135D01CDC2171 FOREIGN KEY (canal_id_id) REFERENCES canaux (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E65135D01E18B6D0 FOREIGN KEY (motif_id_id) REFERENCES motifs (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E65135D05E21C5E3 FOREIGN KEY (sous_motif_id_id) REFERENCES sous_motifs (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E65135D0526E8E58 FOREIGN KEY (contact_id_id) REFERENCES contacts (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E65135D0D63673B0 FOREIGN KEY (service_id_id) REFERENCES services (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E65135D020FD7A30 FOREIGN KEY (priorite_id_id) REFERENCES priorite (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E65135D0AC64DA04 FOREIGN KEY (teleconseiller_id_id) REFERENCES teleconseillers (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E65135D0ADC21228 FOREIGN KEY (entite_support_id_id) REFERENCES entites_supports (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO incidents (id) SELECT id FROM __temp__incidents');
        $this->addSql('DROP TABLE __temp__incidents');
        $this->addSql('CREATE INDEX IDX_E65135D01CDC2171 ON incidents (canal_id_id)');
        $this->addSql('CREATE INDEX IDX_E65135D01E18B6D0 ON incidents (motif_id_id)');
        $this->addSql('CREATE INDEX IDX_E65135D05E21C5E3 ON incidents (sous_motif_id_id)');
        $this->addSql('CREATE INDEX IDX_E65135D0526E8E58 ON incidents (contact_id_id)');
        $this->addSql('CREATE INDEX IDX_E65135D0D63673B0 ON incidents (service_id_id)');
        $this->addSql('CREATE INDEX IDX_E65135D020FD7A30 ON incidents (priorite_id_id)');
        $this->addSql('CREATE INDEX IDX_E65135D0AC64DA04 ON incidents (teleconseiller_id_id)');
        $this->addSql('CREATE INDEX IDX_E65135D0ADC21228 ON incidents (entite_support_id_id)');
        $this->addSql('ALTER TABLE motifs ADD COLUMN nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE prestataires ADD COLUMN nom_prestateur VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE prestataires ADD COLUMN responsable BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE priorite ADD COLUMN nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE priorite ADD COLUMN latence DATETIME NOT NULL');
        $this->addSql('CREATE TEMPORARY TABLE __temp__services AS SELECT id FROM services');
        $this->addSql('DROP TABLE services');
        $this->addSql('CREATE TABLE services (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, type_service_id_id INTEGER DEFAULT NULL, nom_service VARCHAR(255) NOT NULL, type_service VARCHAR(255) NOT NULL, CONSTRAINT FK_7332E169A6DBC485 FOREIGN KEY (type_service_id_id) REFERENCES type_services (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO services (id) SELECT id FROM __temp__services');
        $this->addSql('DROP TABLE __temp__services');
        $this->addSql('CREATE INDEX IDX_7332E169A6DBC485 ON services (type_service_id_id)');
        $this->addSql('ALTER TABLE sous_motifs ADD COLUMN nom VARCHAR(255) NOT NULL');
        $this->addSql('CREATE TEMPORARY TABLE __temp__teleconseillers AS SELECT id FROM teleconseillers');
        $this->addSql('DROP TABLE teleconseillers');
        $this->addSql('CREATE TABLE teleconseillers (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, utilisateur_id_id INTEGER DEFAULT NULL, prestataire_id_id INTEGER DEFAULT NULL, responsable BOOLEAN NOT NULL, CONSTRAINT FK_69CF9B4EB981C689 FOREIGN KEY (utilisateur_id_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_69CF9B4E28CBAD30 FOREIGN KEY (prestataire_id_id) REFERENCES prestataires (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO teleconseillers (id) SELECT id FROM __temp__teleconseillers');
        $this->addSql('DROP TABLE __temp__teleconseillers');
        $this->addSql('CREATE INDEX IDX_69CF9B4EB981C689 ON teleconseillers (utilisateur_id_id)');
        $this->addSql('CREATE INDEX IDX_69CF9B4E28CBAD30 ON teleconseillers (prestataire_id_id)');
        $this->addSql('ALTER TABLE type_services ADD COLUMN nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD COLUMN nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD COLUMN prenom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD COLUMN adresse VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD COLUMN email VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD COLUMN phone_number VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__agents AS SELECT id FROM agents');
        $this->addSql('DROP TABLE agents');
        $this->addSql('CREATE TABLE agents (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO agents (id) SELECT id FROM __temp__agents');
        $this->addSql('DROP TABLE __temp__agents');
        $this->addSql('CREATE TEMPORARY TABLE __temp__comptes AS SELECT id FROM comptes');
        $this->addSql('DROP TABLE comptes');
        $this->addSql('CREATE TABLE comptes (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO comptes (id) SELECT id FROM __temp__comptes');
        $this->addSql('DROP TABLE __temp__comptes');
        $this->addSql('CREATE TEMPORARY TABLE __temp__contacts AS SELECT id FROM contacts');
        $this->addSql('DROP TABLE contacts');
        $this->addSql('CREATE TABLE contacts (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO contacts (id) SELECT id FROM __temp__contacts');
        $this->addSql('DROP TABLE __temp__contacts');
        $this->addSql('CREATE TEMPORARY TABLE __temp__entites_supports AS SELECT id FROM entites_supports');
        $this->addSql('DROP TABLE entites_supports');
        $this->addSql('CREATE TABLE entites_supports (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO entites_supports (id) SELECT id FROM __temp__entites_supports');
        $this->addSql('DROP TABLE __temp__entites_supports');
        $this->addSql('CREATE TEMPORARY TABLE __temp__factures AS SELECT id FROM factures');
        $this->addSql('DROP TABLE factures');
        $this->addSql('CREATE TABLE factures (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO factures (id) SELECT id FROM __temp__factures');
        $this->addSql('DROP TABLE __temp__factures');
        $this->addSql('CREATE TEMPORARY TABLE __temp__incidents AS SELECT id FROM incidents');
        $this->addSql('DROP TABLE incidents');
        $this->addSql('CREATE TABLE incidents (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO incidents (id) SELECT id FROM __temp__incidents');
        $this->addSql('DROP TABLE __temp__incidents');
        $this->addSql('CREATE TEMPORARY TABLE __temp__motifs AS SELECT id FROM motifs');
        $this->addSql('DROP TABLE motifs');
        $this->addSql('CREATE TABLE motifs (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO motifs (id) SELECT id FROM __temp__motifs');
        $this->addSql('DROP TABLE __temp__motifs');
        $this->addSql('CREATE TEMPORARY TABLE __temp__prestataires AS SELECT id FROM prestataires');
        $this->addSql('DROP TABLE prestataires');
        $this->addSql('CREATE TABLE prestataires (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO prestataires (id) SELECT id FROM __temp__prestataires');
        $this->addSql('DROP TABLE __temp__prestataires');
        $this->addSql('CREATE TEMPORARY TABLE __temp__priorite AS SELECT id FROM priorite');
        $this->addSql('DROP TABLE priorite');
        $this->addSql('CREATE TABLE priorite (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO priorite (id) SELECT id FROM __temp__priorite');
        $this->addSql('DROP TABLE __temp__priorite');
        $this->addSql('CREATE TEMPORARY TABLE __temp__services AS SELECT id FROM services');
        $this->addSql('DROP TABLE services');
        $this->addSql('CREATE TABLE services (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO services (id) SELECT id FROM __temp__services');
        $this->addSql('DROP TABLE __temp__services');
        $this->addSql('CREATE TEMPORARY TABLE __temp__sous_motifs AS SELECT id FROM sous_motifs');
        $this->addSql('DROP TABLE sous_motifs');
        $this->addSql('CREATE TABLE sous_motifs (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO sous_motifs (id) SELECT id FROM __temp__sous_motifs');
        $this->addSql('DROP TABLE __temp__sous_motifs');
        $this->addSql('CREATE TEMPORARY TABLE __temp__teleconseillers AS SELECT id FROM teleconseillers');
        $this->addSql('DROP TABLE teleconseillers');
        $this->addSql('CREATE TABLE teleconseillers (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO teleconseillers (id) SELECT id FROM __temp__teleconseillers');
        $this->addSql('DROP TABLE __temp__teleconseillers');
        $this->addSql('CREATE TEMPORARY TABLE __temp__type_services AS SELECT id FROM type_services');
        $this->addSql('DROP TABLE type_services');
        $this->addSql('CREATE TABLE type_services (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO type_services (id) SELECT id FROM __temp__type_services');
        $this->addSql('DROP TABLE __temp__type_services');
        $this->addSql('CREATE TEMPORARY TABLE __temp__utilisateur AS SELECT id FROM utilisateur');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('CREATE TABLE utilisateur (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO utilisateur (id) SELECT id FROM __temp__utilisateur');
        $this->addSql('DROP TABLE __temp__utilisateur');
    }
}
