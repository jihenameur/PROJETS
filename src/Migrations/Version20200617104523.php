<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200617104523 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, nom_ar VARCHAR(255) NOT NULL, quantite DOUBLE PRECISION NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom_cli VARCHAR(255) NOT NULL, prenom_cli VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, fiche_st VARCHAR(255) NOT NULL, relation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boutique (id INT AUTO_INCREMENT NOT NULL, nom_bou VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, fiche_st VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_st (id INT AUTO_INCREMENT NOT NULL, no_id INT DEFAULT NULL, fournisseur_id INT NOT NULL, date VARCHAR(255) NOT NULL, operation VARCHAR(255) NOT NULL, INDEX IDX_72C8CFB71A65C546 (no_id), INDEX IDX_72C8CFB7670C757F (fournisseur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, nom_fs VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fiche_st ADD CONSTRAINT FK_72C8CFB71A65C546 FOREIGN KEY (no_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE fiche_st ADD CONSTRAINT FK_72C8CFB7670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fiche_st DROP FOREIGN KEY FK_72C8CFB71A65C546');
        $this->addSql('ALTER TABLE fiche_st DROP FOREIGN KEY FK_72C8CFB7670C757F');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE boutique');
        $this->addSql('DROP TABLE fiche_st');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE user');
    }
}
