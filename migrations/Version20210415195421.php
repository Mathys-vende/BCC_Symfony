<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210415195421 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, personne_id INT DEFAULT NULL, region VARCHAR(255) NOT NULL, departement VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, INDEX IDX_C35F0816FB88E14F (utilisateur_id), INDEX IDX_C35F0816A21BD112 (personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, id_categorie_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_497DD6349F34925F (id_categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_lot (categorie_id INT NOT NULL, lot_id INT NOT NULL, INDEX IDX_2536E81ABCF5E72D (categorie_id), INDEX IDX_2536E81AA8CBA5F7 (lot_id), PRIMARY KEY(categorie_id, lot_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commissaire_priseur (id INT AUTO_INCREMENT NOT NULL, id_personne_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_E21F5C61BA091CE5 (id_personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE date (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devise (id INT AUTO_INCREMENT NOT NULL, devise VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE encherir (id INT AUTO_INCREMENT NOT NULL, id_acheteur_id INT DEFAULT NULL, id_vente_id INT DEFAULT NULL, id_date_id INT DEFAULT NULL, prix_propose DOUBLE PRECISION NOT NULL, INDEX IDX_503B7C878EB576A8 (id_acheteur_id), INDEX IDX_503B7C872D1CFB9F (id_vente_id), UNIQUE INDEX UNIQ_503B7C87660A9F1B (id_date_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estimation (id INT AUTO_INCREMENT NOT NULL, id_date_id INT DEFAULT NULL, id_lot_id INT DEFAULT NULL, id_commissaire_id INT DEFAULT NULL, description LONGTEXT NOT NULL, valeur DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_D0527024660A9F1B (id_date_id), INDEX IDX_D05270248EFC101A (id_lot_id), INDEX IDX_D0527024CA8C2027 (id_commissaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lot (id INT AUTO_INCREMENT NOT NULL, id_vendeur_id INT DEFAULT NULL, id_acheteur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix_de_depart DOUBLE PRECISION NOT NULL, prix_de_vente DOUBLE PRECISION DEFAULT NULL, prix_de_reserve DOUBLE PRECISION DEFAULT NULL, statut VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B81291B20068689 (id_vendeur_id), UNIQUE INDEX UNIQ_B81291B8EB576A8 (id_acheteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordre_achat (id INT AUTO_INCREMENT NOT NULL, id_date_id INT DEFAULT NULL, id_vente_id INT DEFAULT NULL, id_acheteur_id INT DEFAULT NULL, offre_acheteur DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_71306AD9660A9F1B (id_date_id), INDEX IDX_71306AD92D1CFB9F (id_vente_id), INDEX IDX_71306AD98EB576A8 (id_acheteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, civilite VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, id_produit_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, photo LONGBLOB NOT NULL, INDEX IDX_14B78418AABEFE2C (id_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_tag (produit_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_423DC0FAF347EFB (produit_id), INDEX IDX_423DC0FABAD26311 (tag_id), PRIMARY KEY(produit_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle_de_vente (id INT AUTO_INCREMENT NOT NULL, id_adresse_id INT DEFAULT NULL, id_commissaire_priseur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_473C2217E86D5C8B (id_adresse_id), INDEX IDX_473C2217B483CCFF (id_commissaire_priseur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, id_personne_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_1D1C63B3BA091CE5 (id_personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vente (id INT AUTO_INCREMENT NOT NULL, id_date_id INT DEFAULT NULL, id_vente_enchere_id INT DEFAULT NULL, id_lot_id INT DEFAULT NULL, commission DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_888A2A4C660A9F1B (id_date_id), INDEX IDX_888A2A4C9F42C7DD (id_vente_enchere_id), INDEX IDX_888A2A4C8EFC101A (id_lot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vente_enchere (id INT AUTO_INCREMENT NOT NULL, id_date_id INT DEFAULT NULL, id_salle_de_vente_id INT DEFAULT NULL, id_devise_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME DEFAULT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_67DB1BEF660A9F1B (id_date_id), INDEX IDX_67DB1BEF6C22232 (id_salle_de_vente_id), INDEX IDX_67DB1BEF7471EC71 (id_devise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F0816FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F0816A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD6349F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE categorie_lot ADD CONSTRAINT FK_2536E81ABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_lot ADD CONSTRAINT FK_2536E81AA8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commissaire_priseur ADD CONSTRAINT FK_E21F5C61BA091CE5 FOREIGN KEY (id_personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE encherir ADD CONSTRAINT FK_503B7C878EB576A8 FOREIGN KEY (id_acheteur_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE encherir ADD CONSTRAINT FK_503B7C872D1CFB9F FOREIGN KEY (id_vente_id) REFERENCES vente (id)');
        $this->addSql('ALTER TABLE encherir ADD CONSTRAINT FK_503B7C87660A9F1B FOREIGN KEY (id_date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE estimation ADD CONSTRAINT FK_D0527024660A9F1B FOREIGN KEY (id_date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE estimation ADD CONSTRAINT FK_D05270248EFC101A FOREIGN KEY (id_lot_id) REFERENCES lot (id)');
        $this->addSql('ALTER TABLE estimation ADD CONSTRAINT FK_D0527024CA8C2027 FOREIGN KEY (id_commissaire_id) REFERENCES commissaire_priseur (id)');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B20068689 FOREIGN KEY (id_vendeur_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B8EB576A8 FOREIGN KEY (id_acheteur_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE ordre_achat ADD CONSTRAINT FK_71306AD9660A9F1B FOREIGN KEY (id_date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE ordre_achat ADD CONSTRAINT FK_71306AD92D1CFB9F FOREIGN KEY (id_vente_id) REFERENCES vente (id)');
        $this->addSql('ALTER TABLE ordre_achat ADD CONSTRAINT FK_71306AD98EB576A8 FOREIGN KEY (id_acheteur_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit_tag ADD CONSTRAINT FK_423DC0FAF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_tag ADD CONSTRAINT FK_423DC0FABAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_de_vente ADD CONSTRAINT FK_473C2217E86D5C8B FOREIGN KEY (id_adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE salle_de_vente ADD CONSTRAINT FK_473C2217B483CCFF FOREIGN KEY (id_commissaire_priseur_id) REFERENCES commissaire_priseur (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3BA091CE5 FOREIGN KEY (id_personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4C660A9F1B FOREIGN KEY (id_date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4C9F42C7DD FOREIGN KEY (id_vente_enchere_id) REFERENCES vente_enchere (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4C8EFC101A FOREIGN KEY (id_lot_id) REFERENCES lot (id)');
        $this->addSql('ALTER TABLE vente_enchere ADD CONSTRAINT FK_67DB1BEF660A9F1B FOREIGN KEY (id_date_id) REFERENCES date (id)');
        $this->addSql('ALTER TABLE vente_enchere ADD CONSTRAINT FK_67DB1BEF6C22232 FOREIGN KEY (id_salle_de_vente_id) REFERENCES salle_de_vente (id)');
        $this->addSql('ALTER TABLE vente_enchere ADD CONSTRAINT FK_67DB1BEF7471EC71 FOREIGN KEY (id_devise_id) REFERENCES devise (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salle_de_vente DROP FOREIGN KEY FK_473C2217E86D5C8B');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD6349F34925F');
        $this->addSql('ALTER TABLE categorie_lot DROP FOREIGN KEY FK_2536E81ABCF5E72D');
        $this->addSql('ALTER TABLE estimation DROP FOREIGN KEY FK_D0527024CA8C2027');
        $this->addSql('ALTER TABLE salle_de_vente DROP FOREIGN KEY FK_473C2217B483CCFF');
        $this->addSql('ALTER TABLE encherir DROP FOREIGN KEY FK_503B7C87660A9F1B');
        $this->addSql('ALTER TABLE estimation DROP FOREIGN KEY FK_D0527024660A9F1B');
        $this->addSql('ALTER TABLE ordre_achat DROP FOREIGN KEY FK_71306AD9660A9F1B');
        $this->addSql('ALTER TABLE vente DROP FOREIGN KEY FK_888A2A4C660A9F1B');
        $this->addSql('ALTER TABLE vente_enchere DROP FOREIGN KEY FK_67DB1BEF660A9F1B');
        $this->addSql('ALTER TABLE vente_enchere DROP FOREIGN KEY FK_67DB1BEF7471EC71');
        $this->addSql('ALTER TABLE categorie_lot DROP FOREIGN KEY FK_2536E81AA8CBA5F7');
        $this->addSql('ALTER TABLE estimation DROP FOREIGN KEY FK_D05270248EFC101A');
        $this->addSql('ALTER TABLE vente DROP FOREIGN KEY FK_888A2A4C8EFC101A');
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F0816A21BD112');
        $this->addSql('ALTER TABLE commissaire_priseur DROP FOREIGN KEY FK_E21F5C61BA091CE5');
        $this->addSql('ALTER TABLE encherir DROP FOREIGN KEY FK_503B7C878EB576A8');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B20068689');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B8EB576A8');
        $this->addSql('ALTER TABLE ordre_achat DROP FOREIGN KEY FK_71306AD98EB576A8');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3BA091CE5');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418AABEFE2C');
        $this->addSql('ALTER TABLE produit_tag DROP FOREIGN KEY FK_423DC0FAF347EFB');
        $this->addSql('ALTER TABLE vente_enchere DROP FOREIGN KEY FK_67DB1BEF6C22232');
        $this->addSql('ALTER TABLE produit_tag DROP FOREIGN KEY FK_423DC0FABAD26311');
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F0816FB88E14F');
        $this->addSql('ALTER TABLE encherir DROP FOREIGN KEY FK_503B7C872D1CFB9F');
        $this->addSql('ALTER TABLE ordre_achat DROP FOREIGN KEY FK_71306AD92D1CFB9F');
        $this->addSql('ALTER TABLE vente DROP FOREIGN KEY FK_888A2A4C9F42C7DD');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE categorie_lot');
        $this->addSql('DROP TABLE commissaire_priseur');
        $this->addSql('DROP TABLE date');
        $this->addSql('DROP TABLE devise');
        $this->addSql('DROP TABLE encherir');
        $this->addSql('DROP TABLE estimation');
        $this->addSql('DROP TABLE lot');
        $this->addSql('DROP TABLE ordre_achat');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_tag');
        $this->addSql('DROP TABLE salle_de_vente');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE vente');
        $this->addSql('DROP TABLE vente_enchere');
    }
}
