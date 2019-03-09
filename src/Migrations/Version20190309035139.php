<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190309035139 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contenu_visiteur (id INT AUTO_INCREMENT NOT NULL, fichier VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accueil_prestataire (id INT AUTO_INCREMENT NOT NULL, fichier VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accueil_prestataire_accueil (accueil_prestataire_id INT NOT NULL, accueil_id INT NOT NULL, INDEX IDX_628C902E1998D741 (accueil_prestataire_id), INDEX IDX_628C902E7C9E3DC1 (accueil_id), PRIMARY KEY(accueil_prestataire_id, accueil_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accueil (id INT AUTO_INCREMENT NOT NULL, contenu_visiteur_id INT DEFAULT NULL, date_passage DATE DEFAULT NULL, obtenu TINYINT(1) DEFAULT NULL, note INT DEFAULT NULL, INDEX IDX_2994CBEF1CE403E (contenu_visiteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modalite_connexion (id INT AUTO_INCREMENT NOT NULL, mode_visiteur_libre TINYINT(1) DEFAULT NULL, mode_visiteur_declare TINYINT(1) DEFAULT NULL, mode_prestataire_libre TINYINT(1) DEFAULT NULL, mode_prestataire_declare TINYINT(1) DEFAULT NULL, mode_prestataire_employeur TINYINT(1) DEFAULT NULL, test_plateforme TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accueil_prestataire_accueil ADD CONSTRAINT FK_628C902E1998D741 FOREIGN KEY (accueil_prestataire_id) REFERENCES accueil_prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueil_prestataire_accueil ADD CONSTRAINT FK_628C902E7C9E3DC1 FOREIGN KEY (accueil_id) REFERENCES accueil (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueil ADD CONSTRAINT FK_2994CBEF1CE403E FOREIGN KEY (contenu_visiteur_id) REFERENCES contenu_visiteur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE accueil DROP FOREIGN KEY FK_2994CBEF1CE403E');
        $this->addSql('ALTER TABLE accueil_prestataire_accueil DROP FOREIGN KEY FK_628C902E1998D741');
        $this->addSql('ALTER TABLE accueil_prestataire_accueil DROP FOREIGN KEY FK_628C902E7C9E3DC1');
        $this->addSql('DROP TABLE contenu_visiteur');
        $this->addSql('DROP TABLE accueil_prestataire');
        $this->addSql('DROP TABLE accueil_prestataire_accueil');
        $this->addSql('DROP TABLE accueil');
        $this->addSql('DROP TABLE modalite_connexion');
    }
}
