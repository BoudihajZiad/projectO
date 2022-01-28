<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210728160013 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, groupe VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_inter (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_inter_contact (groupe_inter_id INT NOT NULL, contact_id INT NOT NULL, INDEX IDX_216CA18379FA9BEE (groupe_inter_id), INDEX IDX_216CA183E7A1254A (contact_id), PRIMARY KEY(groupe_inter_id, contact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_inter_groupe_contact (groupe_inter_id INT NOT NULL, groupe_contact_id INT NOT NULL, INDEX IDX_CC56B14779FA9BEE (groupe_inter_id), INDEX IDX_CC56B1475F4C1496 (groupe_contact_id), PRIMARY KEY(groupe_inter_id, groupe_contact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE groupe_inter_contact ADD CONSTRAINT FK_216CA18379FA9BEE FOREIGN KEY (groupe_inter_id) REFERENCES groupe_inter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_inter_contact ADD CONSTRAINT FK_216CA183E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_inter_groupe_contact ADD CONSTRAINT FK_CC56B14779FA9BEE FOREIGN KEY (groupe_inter_id) REFERENCES groupe_inter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_inter_groupe_contact ADD CONSTRAINT FK_CC56B1475F4C1496 FOREIGN KEY (groupe_contact_id) REFERENCES groupe_contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client CHANGE tel tel VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE groupe_inter_contact DROP FOREIGN KEY FK_216CA183E7A1254A');
        $this->addSql('ALTER TABLE groupe_inter_groupe_contact DROP FOREIGN KEY FK_CC56B1475F4C1496');
        $this->addSql('ALTER TABLE groupe_inter_contact DROP FOREIGN KEY FK_216CA18379FA9BEE');
        $this->addSql('ALTER TABLE groupe_inter_groupe_contact DROP FOREIGN KEY FK_CC56B14779FA9BEE');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE groupe_contact');
        $this->addSql('DROP TABLE groupe_inter');
        $this->addSql('DROP TABLE groupe_inter_contact');
        $this->addSql('DROP TABLE groupe_inter_groupe_contact');
        $this->addSql('ALTER TABLE client CHANGE tel tel VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
