<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190724184345 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE transaction ADD code INT NOT NULL, ADD montant INT NOT NULL');
        $this->addSql('ALTER TABLE comptebank ADD adminpartenaire_id INT NOT NULL');
        $this->addSql('ALTER TABLE comptebank ADD CONSTRAINT FK_C5432BBDBBC4D3E8 FOREIGN KEY (adminpartenaire_id) REFERENCES adminpartenaire (id)');
        $this->addSql('CREATE INDEX IDX_C5432BBDBBC4D3E8 ON comptebank (adminpartenaire_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comptebank DROP FOREIGN KEY FK_C5432BBDBBC4D3E8');
        $this->addSql('DROP INDEX IDX_C5432BBDBBC4D3E8 ON comptebank');
        $this->addSql('ALTER TABLE comptebank DROP adminpartenaire_id');
        $this->addSql('ALTER TABLE transaction DROP code, DROP montant');
    }
}
