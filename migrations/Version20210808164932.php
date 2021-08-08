<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210808164932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE apple_card (id INT AUTO_INCREMENT NOT NULL, apple_card_id VARCHAR(36) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', last_updated_at DATETIME NOT NULL, data LONGTEXT NOT NULL, device_library_identifier VARCHAR(32) NOT NULL, pass_type_id VARCHAR(64) NOT NULL, push_token VARCHAR(36) NOT NULL, serial_number VARCHAR(50) NOT NULL, INDEX apple_card_created_at_idx (created_at), INDEX apple_card_last_updated_at_idx (last_updated_at), INDEX apple_card_pass_type_id_idx (pass_type_id), UNIQUE INDEX apple_card_apple_card_id_idx (apple_card_id), UNIQUE INDEX apple_card_device_library_identifier_idx (device_library_identifier), UNIQUE INDEX apple_card_push_token_idx (push_token), UNIQUE INDEX apple_card_serial_number_pass_type_id_idx (serial_number, pass_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apple_card_device (apple_card_id INT NOT NULL, device_id INT NOT NULL, INDEX IDX_F1AE26780F0127F (apple_card_id), INDEX IDX_F1AE26794A4C7D4 (device_id), PRIMARY KEY(apple_card_id, device_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE device (id INT AUTO_INCREMENT NOT NULL, device_id VARCHAR(36) NOT NULL, name VARCHAR(20) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', last_updated_at DATETIME NOT NULL, os_type INT NOT NULL, INDEX device_created_at_idx (created_at), INDEX device_last_updated_at_idx (last_updated_at), UNIQUE INDEX device_device_id_idx (device_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE google_card (id INT AUTO_INCREMENT NOT NULL, google_card_id VARCHAR(36) NOT NULL, serial_number VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', last_updated_at DATETIME NOT NULL, data LONGTEXT NOT NULL, object_id VARCHAR(200) NOT NULL, INDEX google_card_created_at_idx (created_at), INDEX google_card_last_updated_at_idx (last_updated_at), UNIQUE INDEX google_card_google_card_id_idx (google_card_id), UNIQUE INDEX google_card_object_id_idx (object_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE google_card_device (google_card_id INT NOT NULL, device_id INT NOT NULL, INDEX IDX_51812FC4B488A7A6 (google_card_id), INDEX IDX_51812FC494A4C7D4 (device_id), PRIMARY KEY(google_card_id, device_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apple_card_device ADD CONSTRAINT FK_F1AE26780F0127F FOREIGN KEY (apple_card_id) REFERENCES apple_card (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apple_card_device ADD CONSTRAINT FK_F1AE26794A4C7D4 FOREIGN KEY (device_id) REFERENCES device (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE google_card_device ADD CONSTRAINT FK_51812FC4B488A7A6 FOREIGN KEY (google_card_id) REFERENCES google_card (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE google_card_device ADD CONSTRAINT FK_51812FC494A4C7D4 FOREIGN KEY (device_id) REFERENCES device (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apple_card_device DROP FOREIGN KEY FK_F1AE26780F0127F');
        $this->addSql('ALTER TABLE apple_card_device DROP FOREIGN KEY FK_F1AE26794A4C7D4');
        $this->addSql('ALTER TABLE google_card_device DROP FOREIGN KEY FK_51812FC494A4C7D4');
        $this->addSql('ALTER TABLE google_card_device DROP FOREIGN KEY FK_51812FC4B488A7A6');
        $this->addSql('DROP TABLE apple_card');
        $this->addSql('DROP TABLE apple_card_device');
        $this->addSql('DROP TABLE device');
        $this->addSql('DROP TABLE google_card');
        $this->addSql('DROP TABLE google_card_device');
    }
}
