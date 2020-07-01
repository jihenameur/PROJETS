<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200617130914 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client DROP fiche_st, DROP relation');
        $this->addSql('ALTER TABLE fiche_st DROP FOREIGN KEY FK_72C8CFB71A65C546');
        $this->addSql('ALTER TABLE fiche_st DROP FOREIGN KEY FK_72C8CFB7670C757F');
        $this->addSql('DROP INDEX IDX_72C8CFB71A65C546 ON fiche_st');
        $this->addSql('DROP INDEX IDX_72C8CFB7670C757F ON fiche_st');
        $this->addSql('ALTER TABLE fiche_st DROP no_id, DROP fournisseur_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client ADD fiche_st VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD relation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE fiche_st ADD no_id INT DEFAULT NULL, ADD fournisseur_id INT NOT NULL');
        $this->addSql('ALTER TABLE fiche_st ADD CONSTRAINT FK_72C8CFB71A65C546 FOREIGN KEY (no_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE fiche_st ADD CONSTRAINT FK_72C8CFB7670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('CREATE INDEX IDX_72C8CFB71A65C546 ON fiche_st (no_id)');
        $this->addSql('CREATE INDEX IDX_72C8CFB7670C757F ON fiche_st (fournisseur_id)');
    }
}
