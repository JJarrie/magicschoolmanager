<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20190619211752 extends AbstractMigration
{

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE school (id INT UNSIGNED AUTO_INCREMENT NOT NULL, user_id INT UNSIGNED DEFAULT NULL, name VARCHAR(255) NOT NULL, uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', UNIQUE INDEX UNIQ_F99EDABBD17F50A6 (uuid), INDEX IDX_F99EDABBA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE school ADD CONSTRAINT FK_F99EDABBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE school DROP FOREIGN KEY FK_F99EDABBA76ED395');
        $this->addSql('DROP TABLE school');
    }
}
