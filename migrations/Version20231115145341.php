<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231115145341 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande (id_commande SMALLINT AUTO_INCREMENT NOT NULL, id_membre SMALLINT NOT NULL, id_vehicule SMALLINT NOT NULL, date_heure_depart DATETIME NOT NULL, date_heure_fin DATETIME NOT NULL, prix_total SMALLINT NOT NULL, date_enregistrement DATETIME NOT NULL, INDEX IDX_6EEAA67DD0834EC4 (id_membre), INDEX IDX_6EEAA67D79F41388 (id_vehicule), PRIMARY KEY(id_commande)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membre (id_membre SMALLINT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(20) NOT NULL, mdp VARCHAR(60) NOT NULL, nom VARCHAR(20) NOT NULL, prenom VARCHAR(20) NOT NULL, email VARCHAR(50) NOT NULL, civilite VARCHAR(1) NOT NULL, statut SMALLINT NOT NULL, date_enregistrement DATETIME NOT NULL, PRIMARY KEY(id_membre)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id_vehicule SMALLINT AUTO_INCREMENT NOT NULL, titre VARCHAR(200) NOT NULL, marque VARCHAR(50) NOT NULL, modele VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, photo VARCHAR(200) NOT NULL, prix_journalier INT NOT NULL, date_enregistrement DATETIME NOT NULL, PRIMARY KEY(id_vehicule)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DD0834EC4 FOREIGN KEY (id_membre) REFERENCES membre (id_membre)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D79F41388 FOREIGN KEY (id_vehicule) REFERENCES vehicule (id_vehicule)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DD0834EC4');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D79F41388');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE membre');
        $this->addSql('DROP TABLE vehicule');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
