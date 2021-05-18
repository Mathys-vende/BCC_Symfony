<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210517131518 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot DROP INDEX UNIQ_B81291B8EB576A8, ADD INDEX IDX_B81291B8EB576A8 (id_acheteur_id)');
        $this->addSql('ALTER TABLE lot DROP INDEX UNIQ_B81291B20068689, ADD INDEX IDX_B81291B20068689 (id_vendeur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot DROP INDEX IDX_B81291B20068689, ADD UNIQUE INDEX UNIQ_B81291B20068689 (id_vendeur_id)');
        $this->addSql('ALTER TABLE lot DROP INDEX IDX_B81291B8EB576A8, ADD UNIQUE INDEX UNIQ_B81291B8EB576A8 (id_acheteur_id)');
    }
}
