<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220804070207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE beginner (id INT AUTO_INCREMENT NOT NULL, friendly VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gear (id INT AUTO_INCREMENT NOT NULL, fk_beginner_id INT DEFAULT NULL, gear_name VARCHAR(55) NOT NULL, gear_type VARCHAR(100) NOT NULL, gear_producer VARCHAR(55) NOT NULL, gear_price NUMERIC(8, 2) NOT NULL, INDEX IDX_B44539B2A327F72 (fk_beginner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gear ADD CONSTRAINT FK_B44539B2A327F72 FOREIGN KEY (fk_beginner_id) REFERENCES beginner (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gear DROP FOREIGN KEY FK_B44539B2A327F72');
        $this->addSql('DROP TABLE beginner');
        $this->addSql('DROP TABLE gear');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
