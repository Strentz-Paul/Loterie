<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200623130823 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE euromillion (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, numbers INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loto (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, numbers INT NOT NULL, chance INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stars_euromillion (id INT AUTO_INCREMENT NOT NULL, tirage_euromillion_id INT NOT NULL, date DATE NOT NULL, star INT NOT NULL, INDEX IDX_4D3FE03AAF067911 (tirage_euromillion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stars_euromillion ADD CONSTRAINT FK_4D3FE03AAF067911 FOREIGN KEY (tirage_euromillion_id) REFERENCES euromillion (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stars_euromillion DROP FOREIGN KEY FK_4D3FE03AAF067911');
        $this->addSql('DROP TABLE euromillion');
        $this->addSql('DROP TABLE loto');
        $this->addSql('DROP TABLE stars_euromillion');
    }
}
