<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210824143644 extends AbstractMigration
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
        $this->addSql('ALTER TABLE campagne ADD idd INT DEFAULT NULL, CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE id_message_simple_id id_message_simple_id INT DEFAULT NULL, CHANGE canal canal VARCHAR(255) DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE planification planification VARCHAR(255) DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE silence silence VARCHAR(255) DEFAULT NULL, CHANGE titre_message titre_message VARCHAR(255) DEFAULT NULL, CHANGE corps_message corps_message VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE client CHANGE tel tel VARCHAR(255) DEFAULT NULL, CHANGE url_delivery url_delivery VARCHAR(255) DEFAULT NULL, CHANGE canal_prefere canal_prefere VARCHAR(255) DEFAULT NULL, CHANGE alerte_statut alerte_statut VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE contact CHANGE id_groupe_id id_groupe_id INT DEFAULT NULL, CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE groupe groupe VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE destinataire_camp CHANGE id_campagne_id id_campagne_id INT DEFAULT NULL, CHANGE id_contact_id id_contact_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE groupe_contact CHANGE id_user_id id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE label_service CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE statut statut VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE liste_destinataire CHANGE id_campagne_id id_campagne_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE liste_distribution CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE message_simple CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE langue langue VARCHAR(255) DEFAULT NULL, CHANGE message message VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE message_variable CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE message message VARCHAR(255) DEFAULT NULL, CHANGE type type VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE alerte CHANGE id_user_id id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE campagne DROP idd, CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE id_message_simple_id id_message_simple_id INT DEFAULT NULL, CHANGE canal canal VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE planification planification VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE silence silence VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE titre_message titre_message VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE corps_message corps_message VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE client CHANGE tel tel VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE url_delivery url_delivery VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE canal_prefere canal_prefere VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE alerte_statut alerte_statut VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE contact CHANGE id_groupe_id id_groupe_id INT DEFAULT NULL, CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE groupe groupe VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE destinataire_camp CHANGE id_campagne_id id_campagne_id INT DEFAULT NULL, CHANGE id_contact_id id_contact_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE groupe_contact CHANGE id_user_id id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE label_service CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE statut statut VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE liste_destinataire CHANGE id_campagne_id id_campagne_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE liste_distribution CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE message_simple CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE langue langue VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE message message VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE message_variable CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE message message VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
