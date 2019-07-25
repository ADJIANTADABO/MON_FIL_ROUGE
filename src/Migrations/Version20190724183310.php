<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190724183310 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comptebank ADD adminsystem_id INT NOT NULL');
        $this->addSql('ALTER TABLE comptebank ADD CONSTRAINT FK_C5432BBD6AF56DC3 FOREIGN KEY (adminsystem_id) REFERENCES superadmin (id)');
        $this->addSql('CREATE INDEX IDX_C5432BBD6AF56DC3 ON comptebank (adminsystem_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comptebank DROP FOREIGN KEY FK_C5432BBD6AF56DC3');
        $this->addSql('DROP INDEX IDX_C5432BBD6AF56DC3 ON comptebank');
        $this->addSql('ALTER TABLE comptebank DROP adminsystem_id');
    }
}
