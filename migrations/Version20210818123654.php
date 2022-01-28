<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210818123654 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alerte CHANGE id_user_id id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE campagne CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE id_message_simple_id id_message_simple_id INT DEFAULT NULL, CHANGE canal canal VARCHAR(255) DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE planification planification VARCHAR(255) DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE silence silence VARCHAR(255) DEFAULT NULL, CHANGE titre_message titre_message VARCHAR(255) DEFAULT NULL, CHANGE corps_message corps_message VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE client CHANGE tel tel VARCHAR(255) DEFAULT NULL, CHANGE url_delivery url_delivery VARCHAR(255) DEFAULT NULL, CHANGE canal_prefere canal_prefere VARCHAR(255) DEFAULT NULL, CHANGE alerte_statut alerte_statut VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE contact CHANGE id_groupe_id id_groupe_id INT DEFAULT NULL, CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE groupe groupe VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE label_service ADD id_user_id INT DEFAULT NULL, CHANGE statut statut VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE label_service ADD CONSTRAINT FK_5D1C33FB79F37AE5 FOREIGN KEY (id_user_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_5D1C33FB79F37AE5 ON label_service (id_user_id)');
        $this->addSql('ALTER TABLE liste_destinataire ADD id_campagne_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE liste_destinataire ADD CONSTRAINT FK_570C2F1DE30BE83 FOREIGN KEY (id_campagne_id) REFERENCES campagne (id)');
        $this->addSql('CREATE INDEX IDX_570C2F1DE30BE83 ON liste_destinataire (id_campagne_id)');
        $this->addSql('ALTER TABLE liste_distribution CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE message_simple CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE langue langue VARCHAR(255) DEFAULT NULL, CHANGE message message VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alerte CHANGE id_user_id id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE campagne CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE id_message_simple_id id_message_simple_id INT DEFAULT NULL, CHANGE canal canal VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE planification planification VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE silence silence VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE titre_message titre_message VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE corps_message corps_message VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE client CHANGE tel tel VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE url_delivery url_delivery VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE canal_prefere canal_prefere VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE alerte_statut alerte_statut VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE contact CHANGE id_groupe_id id_groupe_id INT DEFAULT NULL, CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE groupe groupe VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE label_service DROP FOREIGN KEY FK_5D1C33FB79F37AE5');
        $this->addSql('DROP INDEX IDX_5D1C33FB79F37AE5 ON label_service');
        $this->addSql('ALTER TABLE label_service DROP id_user_id, CHANGE statut statut VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE liste_destinataire DROP FOREIGN KEY FK_570C2F1DE30BE83');
        $this->addSql('DROP INDEX IDX_570C2F1DE30BE83 ON liste_destinataire');
        $this->addSql('ALTER TABLE liste_destinataire DROP id_campagne_id');
        $this->addSql('ALTER TABLE liste_distribution CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE message_simple CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE langue langue VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE message message VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
