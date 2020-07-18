<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200306083823 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE consultation CHANGE patient_id patient_id INT DEFAULT NULL, CHANGE medecin_id medecin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ligne_prescription CHANGE ordonnance_id ordonnance_id INT DEFAULT NULL, CHANGE medicament_id medicament_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE medecin CHANGE matricule matricule INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL, CHANGE ordonnance ordonnance INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ordonnance CHANGE patient_id patient_id INT DEFAULT NULL, CHANGE medecin_id medecin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient CHANGE num_ss num_ss DOUBLE PRECISION DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL, CHANGE date_naissance date_naissance DATE DEFAULT NULL, CHANGE sexe sexe VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE consultation CHANGE patient_id patient_id INT DEFAULT NULL, CHANGE medecin_id medecin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ligne_prescription CHANGE ordonnance_id ordonnance_id INT DEFAULT NULL, CHANGE medicament_id medicament_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE medecin CHANGE matricule matricule INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE prenom prenom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE ordonnance ordonnance INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ordonnance CHANGE patient_id patient_id INT DEFAULT NULL, CHANGE medecin_id medecin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient CHANGE num_ss num_ss DOUBLE PRECISION DEFAULT \'NULL\', CHANGE nom nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE prenom prenom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE date_naissance date_naissance DATE DEFAULT \'NULL\', CHANGE sexe sexe VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
    }
}
