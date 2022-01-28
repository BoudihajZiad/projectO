<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210728154350 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE client_groupe_contact (client_id INT NOT NULL, groupe_contact_id INT NOT NULL, INDEX IDX_ABC643F919EB6921 (client_id), INDEX IDX_ABC643F95F4C1496 (groupe_contact_id), PRIMARY KEY(client_id, groupe_contact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client_groupe_contact ADD CONSTRAINT FK_ABC643F919EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_groupe_contact ADD CONSTRAINT FK_ABC643F95F4C1496 FOREIGN KEY (groupe_contact_id) REFERENCES groupe_contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455869022F7');
        $this->addSql('DROP INDEX IDX_C7440455869022F7 ON client');
        $this->addSql('ALTER TABLE client ADD id_groupe INT NOT NULL, DROP id_de_groupe_id, CHANGE tel tel VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE client_groupe_contact');
        $this->addSql('ALTER TABLE client ADD id_de_groupe_id INT DEFAULT NULL, DROP id_groupe, CHANGE tel tel VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455869022F7 FOREIGN KEY (id_de_groupe_id) REFERENCES groupe_contact (id)');
        $this->addSql('CREATE INDEX IDX_C7440455869022F7 ON client (id_de_groupe_id)');
    }
}
