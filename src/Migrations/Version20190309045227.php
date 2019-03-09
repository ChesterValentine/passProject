<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190309045227 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE accueil ADD entreprise_id INT NOT NULL, ADD utilisateur_id INT NOT NULL, ADD test_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE accueil ADD CONSTRAINT FK_2994CBEA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE accueil ADD CONSTRAINT FK_2994CBEFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE accueil ADD CONSTRAINT FK_2994CBE1E5D0459 FOREIGN KEY (test_id) REFERENCES test (id)');
        $this->addSql('CREATE INDEX IDX_2994CBEA4AEAFEA ON accueil (entreprise_id)');
        $this->addSql('CREATE INDEX IDX_2994CBEFB88E14F ON accueil (utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_2994CBE1E5D0459 ON accueil (test_id)');
        $this->addSql('ALTER TABLE entreprise ADD contenu_visiteur_id INT DEFAULT NULL, ADD contenu_prestataire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA60F1CE403E FOREIGN KEY (contenu_visiteur_id) REFERENCES contenu_visiteur (id)');
        $this->addSql('ALTER TABLE entreprise ADD CONSTRAINT FK_D19FA607ABED9F2 FOREIGN KEY (contenu_prestataire_id) REFERENCES accueil_prestataire (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D19FA60F1CE403E ON entreprise (contenu_visiteur_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D19FA607ABED9F2 ON entreprise (contenu_prestataire_id)');
        $this->addSql('ALTER TABLE reponse_choisi ADD accueil_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reponse_choisi ADD CONSTRAINT FK_568BDD717C9E3DC1 FOREIGN KEY (accueil_id) REFERENCES accueil (id)');
        $this->addSql('CREATE INDEX IDX_568BDD717C9E3DC1 ON reponse_choisi (accueil_id)');
        $this->addSql('ALTER TABLE test ADD contenu_prestataire_id INT NOT NULL, ADD contenu_visiteur_id INT NOT NULL');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0C7ABED9F2 FOREIGN KEY (contenu_prestataire_id) REFERENCES accueil_prestataire (id)');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0CF1CE403E FOREIGN KEY (contenu_visiteur_id) REFERENCES contenu_visiteur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D87F7E0C7ABED9F2 ON test (contenu_prestataire_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D87F7E0CF1CE403E ON test (contenu_visiteur_id)');
        $this->addSql('ALTER TABLE modalite_connexion ADD entreprise_id INT NOT NULL');
        $this->addSql('ALTER TABLE modalite_connexion ADD CONSTRAINT FK_C4558D92A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C4558D92A4AEAFEA ON modalite_connexion (entreprise_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE accueil DROP FOREIGN KEY FK_2994CBEA4AEAFEA');
        $this->addSql('ALTER TABLE accueil DROP FOREIGN KEY FK_2994CBEFB88E14F');
        $this->addSql('ALTER TABLE accueil DROP FOREIGN KEY FK_2994CBE1E5D0459');
        $this->addSql('DROP INDEX IDX_2994CBEA4AEAFEA ON accueil');
        $this->addSql('DROP INDEX IDX_2994CBEFB88E14F ON accueil');
        $this->addSql('DROP INDEX IDX_2994CBE1E5D0459 ON accueil');
        $this->addSql('ALTER TABLE accueil DROP entreprise_id, DROP utilisateur_id, DROP test_id');
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA60F1CE403E');
        $this->addSql('ALTER TABLE entreprise DROP FOREIGN KEY FK_D19FA607ABED9F2');
        $this->addSql('DROP INDEX UNIQ_D19FA60F1CE403E ON entreprise');
        $this->addSql('DROP INDEX UNIQ_D19FA607ABED9F2 ON entreprise');
        $this->addSql('ALTER TABLE entreprise DROP contenu_visiteur_id, DROP contenu_prestataire_id');
        $this->addSql('ALTER TABLE modalite_connexion DROP FOREIGN KEY FK_C4558D92A4AEAFEA');
        $this->addSql('DROP INDEX UNIQ_C4558D92A4AEAFEA ON modalite_connexion');
        $this->addSql('ALTER TABLE modalite_connexion DROP entreprise_id');
        $this->addSql('ALTER TABLE reponse_choisi DROP FOREIGN KEY FK_568BDD717C9E3DC1');
        $this->addSql('DROP INDEX IDX_568BDD717C9E3DC1 ON reponse_choisi');
        $this->addSql('ALTER TABLE reponse_choisi DROP accueil_id');
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0C7ABED9F2');
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0CF1CE403E');
        $this->addSql('DROP INDEX UNIQ_D87F7E0C7ABED9F2 ON test');
        $this->addSql('DROP INDEX UNIQ_D87F7E0CF1CE403E ON test');
        $this->addSql('ALTER TABLE test DROP contenu_prestataire_id, DROP contenu_visiteur_id');
    }
}
