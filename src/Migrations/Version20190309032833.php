<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190309032833 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, raison_sociale VARCHAR(255) NOT NULL, accueil TINYINT(1) DEFAULT NULL, prestataire TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise_entreprise (entreprise_source INT NOT NULL, entreprise_target INT NOT NULL, INDEX IDX_A28E618B69CC344 (entreprise_source), INDEX IDX_A28E618B1F7993CB (entreprise_target), PRIMARY KEY(entreprise_source, entreprise_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur_entreprise (utilisateur_id INT NOT NULL, entreprise_id INT NOT NULL, INDEX IDX_3FA13876FB88E14F (utilisateur_id), INDEX IDX_3FA13876A4AEAFEA (entreprise_id), PRIMARY KEY(utilisateur_id, entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entreprise_entreprise ADD CONSTRAINT FK_A28E618B69CC344 FOREIGN KEY (entreprise_source) REFERENCES entreprise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entreprise_entreprise ADD CONSTRAINT FK_A28E618B1F7993CB FOREIGN KEY (entreprise_target) REFERENCES entreprise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_entreprise ADD CONSTRAINT FK_3FA13876FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_entreprise ADD CONSTRAINT FK_3FA13876A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur ADD entreprise_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3A4AEAFEA ON utilisateur (entreprise_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE entreprise_entreprise DROP FOREIGN KEY FK_A28E618B69CC344');
        $this->addSql('ALTER TABLE entreprise_entreprise DROP FOREIGN KEY FK_A28E618B1F7993CB');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3A4AEAFEA');
        $this->addSql('ALTER TABLE utilisateur_entreprise DROP FOREIGN KEY FK_3FA13876A4AEAFEA');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE entreprise_entreprise');
        $this->addSql('DROP TABLE utilisateur_entreprise');
        $this->addSql('DROP INDEX IDX_1D1C63B3A4AEAFEA ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP entreprise_id');
    }
}
