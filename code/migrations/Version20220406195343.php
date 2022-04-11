<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220406195343 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE qcm (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, qcm_id INT DEFAULT NULL, options_id INT DEFAULT NULL, image_id INT DEFAULT NULL, enonce VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_B6F7494EFF6241A6 (qcm_id), UNIQUE INDEX UNIQ_B6F7494E3ADB05F1 (options_id), UNIQUE INDEX UNIQ_B6F7494E3DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EFF6241A6 FOREIGN KEY (qcm_id) REFERENCES reponse (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E3ADB05F1 FOREIGN KEY (options_id) REFERENCES question_options (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E3DA5256D FOREIGN KEY (image_id) REFERENCES question_image (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE qcm');
        $this->addSql('DROP TABLE question');
    }
}
