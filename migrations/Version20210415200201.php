<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210415200201 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F0816FB88E14F');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP INDEX IDX_C35F0816FB88E14F ON adresse');
        $this->addSql('ALTER TABLE adresse DROP utilisateur_id');
        $this->addSql('ALTER TABLE produit ADD id_lot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC278EFC101A FOREIGN KEY (id_lot_id) REFERENCES lot (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC278EFC101A ON produit (id_lot_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, id_personne_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_1D1C63B3BA091CE5 (id_personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3BA091CE5 FOREIGN KEY (id_personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE adresse ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F0816FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_C35F0816FB88E14F ON adresse (utilisateur_id)');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC278EFC101A');
        $this->addSql('DROP INDEX IDX_29A5EC278EFC101A ON produit');
        $this->addSql('ALTER TABLE produit DROP id_lot_id');
    }
}
