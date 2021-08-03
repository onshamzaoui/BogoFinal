<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210802140740 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE facturation (id INT AUTO_INCREMENT NOT NULL, duree DATETIME NOT NULL, type_paiment VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD facturation_id INT NOT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455DBC5F284 FOREIGN KEY (facturation_id) REFERENCES facturation (id)');
        $this->addSql('CREATE INDEX IDX_C7440455DBC5F284 ON client (facturation_id)');
        $this->addSql('ALTER TABLE deal ADD facturation_id INT NOT NULL');
        $this->addSql('ALTER TABLE deal ADD CONSTRAINT FK_E3FEC116DBC5F284 FOREIGN KEY (facturation_id) REFERENCES facturation (id)');
        $this->addSql('CREATE INDEX IDX_E3FEC116DBC5F284 ON deal (facturation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455DBC5F284');
        $this->addSql('ALTER TABLE deal DROP FOREIGN KEY FK_E3FEC116DBC5F284');
        $this->addSql('DROP TABLE facturation');
        $this->addSql('DROP INDEX IDX_C7440455DBC5F284 ON client');
        $this->addSql('ALTER TABLE client DROP facturation_id');
        $this->addSql('DROP INDEX IDX_E3FEC116DBC5F284 ON deal');
        $this->addSql('ALTER TABLE deal DROP facturation_id');
    }
}