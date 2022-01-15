<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220115122150 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE question_image (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question_options (id INT AUTO_INCREMENT NOT NULL, horizontal TINYINT(1) DEFAULT \'1\' NOT NULL, columns SMALLINT DEFAULT 1 NOT NULL, ordered TINYINT(1) DEFAULT \'1\' NOT NULL, indicative TINYINT(1) DEFAULT \'0\' NOT NULL, next TINYINT(1) DEFAULT \'0\' NOT NULL, first TINYINT(1) DEFAULT \'0\' NOT NULL, last TINYINT(1) DEFAULT \'0\' NOT NULL, pointsBon DOUBLE PRECISION DEFAULT \'1.0\' NOT NULL, pointsMauvais DOUBLE PRECISION DEFAULT \'0.0\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse (id INT AUTO_INCREMENT NOT NULL, est_correct TINYINT(1) NOT NULL, texte VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE question ADD options_id INT DEFAULT NULL, ADD image_id INT DEFAULT NULL, ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E3ADB05F1 FOREIGN KEY (options_id) REFERENCES question_options (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E3DA5256D FOREIGN KEY (image_id) REFERENCES question_image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B6F7494E3ADB05F1 ON question (options_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B6F7494E3DA5256D ON question (image_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E3DA5256D');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E3ADB05F1');
        $this->addSql('DROP TABLE question_image');
        $this->addSql('DROP TABLE question_options');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP INDEX UNIQ_B6F7494E3ADB05F1 ON question');
        $this->addSql('DROP INDEX UNIQ_B6F7494E3DA5256D ON question');
        $this->addSql('ALTER TABLE question DROP options_id, DROP image_id, DROP type');
    }
}
