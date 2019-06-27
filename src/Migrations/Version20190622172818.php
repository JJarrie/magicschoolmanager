<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190622172818 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE school_entity_user');
        $this->addSql('ALTER TABLE school_entity ADD owner_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE school_entity ADD CONSTRAINT FK_F39447A47E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F39447A47E3C61F9 ON school_entity (owner_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE school_entity_user (school_entity_id CHAR(36) NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\', user_id CHAR(36) NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\', INDEX IDX_96595DD2A76ED395 (user_id), INDEX IDX_96595DD2F06ABEE0 (school_entity_id), PRIMARY KEY(school_entity_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE school_entity_user ADD CONSTRAINT FK_96595DD2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE school_entity_user ADD CONSTRAINT FK_96595DD2F06ABEE0 FOREIGN KEY (school_entity_id) REFERENCES school_entity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE school_entity DROP FOREIGN KEY FK_F39447A47E3C61F9');
        $this->addSql('DROP INDEX IDX_F39447A47E3C61F9 ON school_entity');
        $this->addSql('ALTER TABLE school_entity DROP owner_id');
    }
}
