<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220414080756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE films (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, annee INT NOT NULL, genre_1 INT NOT NULL, genre_2 INT DEFAULT NULL, genre_3 INT DEFAULT NULL, acteurs VARCHAR(255) NOT NULL, synopsis LONGTEXT NOT NULL, images VARCHAR(255) NOT NULL, duree INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genres (id INT AUTO_INCREMENT NOT NULL, genre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE series (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, annee INT NOT NULL, genre_1 INT NOT NULL, genre_2 INT DEFAULT NULL, genre_3 INT DEFAULT NULL, acteurs LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', synopsis LONGTEXT NOT NULL, images VARCHAR(255) NOT NULL, duree_episode INT NOT NULL, nombre_episode INT NOT NULL, nombre_saison INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE films');
        $this->addSql('DROP TABLE genres');
        $this->addSql('DROP TABLE series');
    }
}
