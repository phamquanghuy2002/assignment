<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220310090356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE clase (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, major VARCHAR(20) NOT NULL, semester VARCHAR(255) NOT NULL, number INT NOT NULL, teacher VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, address VARCHAR(50) NOT NULL, phone VARCHAR(10) NOT NULL, birth DATE NOT NULL, email VARCHAR(50) NOT NULL, image LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_clase (student_id INT NOT NULL, clase_id INT NOT NULL, INDEX IDX_91A8D553CB944F1A (student_id), INDEX IDX_91A8D5539F720353 (clase_id), PRIMARY KEY(student_id, clase_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student_clase ADD CONSTRAINT FK_91A8D553CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_clase ADD CONSTRAINT FK_91A8D5539F720353 FOREIGN KEY (clase_id) REFERENCES clase (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student_clase DROP FOREIGN KEY FK_91A8D5539F720353');
        $this->addSql('ALTER TABLE student_clase DROP FOREIGN KEY FK_91A8D553CB944F1A');
        $this->addSql('DROP TABLE clase');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE student_clase');
    }
}
