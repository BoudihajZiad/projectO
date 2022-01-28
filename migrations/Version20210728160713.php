<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210728160713 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE class_inter (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE class_inter_contact (class_inter_id INT NOT NULL, contact_id INT NOT NULL, INDEX IDX_3FDE82225C965BCE (class_inter_id), INDEX IDX_3FDE8222E7A1254A (contact_id), PRIMARY KEY(class_inter_id, contact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE class_inter_groupe_contact (class_inter_id INT NOT NULL, groupe_contact_id INT NOT NULL, INDEX IDX_767365DD5C965BCE (class_inter_id), INDEX IDX_767365DD5F4C1496 (groupe_contact_id), PRIMARY KEY(class_inter_id, groupe_contact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE class_inter_contact ADD CONSTRAINT FK_3FDE82225C965BCE FOREIGN KEY (class_inter_id) REFERENCES class_inter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE class_inter_contact ADD CONSTRAINT FK_3FDE8222E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE class_inter_groupe_contact ADD CONSTRAINT FK_767365DD5C965BCE FOREIGN KEY (class_inter_id) REFERENCES class_inter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE class_inter_groupe_contact ADD CONSTRAINT FK_767365DD5F4C1496 FOREIGN KEY (groupe_contact_id) REFERENCES groupe_contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client CHANGE tel tel VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE contact CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE groupe groupe VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE class_inter_contact DROP FOREIGN KEY FK_3FDE82225C965BCE');
        $this->addSql('ALTER TABLE class_inter_groupe_contact DROP FOREIGN KEY FK_767365DD5C965BCE');
        $this->addSql('DROP TABLE class_inter');
        $this->addSql('DROP TABLE class_inter_contact');
        $this->addSql('DROP TABLE class_inter_groupe_contact');
        $this->addSql('ALTER TABLE client CHANGE tel tel VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE contact CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE groupe groupe VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
