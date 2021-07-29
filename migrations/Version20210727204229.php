<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210727204229 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gift (id INT AUTO_INCREMENT NOT NULL, stock_id INT DEFAULT NULL, receiver_id INT DEFAULT NULL, gitft_uuid VARCHAR(255) NOT NULL, gift_code VARCHAR(255) NOT NULL, gift_description VARCHAR(255) NOT NULL, gift_price NUMERIC(10, 0) NOT NULL, UNIQUE INDEX UNIQ_A47C990D3AC63E42 (gitft_uuid), INDEX IDX_A47C990DDCD6110 (stock_id), INDEX IDX_A47C990DCD53EDB6 (receiver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE receiver (id INT AUTO_INCREMENT NOT NULL, receiver_uuid VARCHAR(255) NOT NULL, receiver_first_name VARCHAR(255) NOT NULL, receiver_last_name VARCHAR(255) NOT NULL, receiver_country_code VARCHAR(5) NOT NULL, UNIQUE INDEX UNIQ_3DB88C96D4361C98 (receiver_uuid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock (id INT AUTO_INCREMENT NOT NULL, file_name VARCHAR(255) NOT NULL, date_import DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gift ADD CONSTRAINT FK_A47C990DDCD6110 FOREIGN KEY (stock_id) REFERENCES stock (id)');
        $this->addSql('ALTER TABLE gift ADD CONSTRAINT FK_A47C990DCD53EDB6 FOREIGN KEY (receiver_id) REFERENCES receiver (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gift DROP FOREIGN KEY FK_A47C990DCD53EDB6');
        $this->addSql('ALTER TABLE gift DROP FOREIGN KEY FK_A47C990DDCD6110');
        $this->addSql('DROP TABLE gift');
        $this->addSql('DROP TABLE receiver');
        $this->addSql('DROP TABLE stock');
    }
}
