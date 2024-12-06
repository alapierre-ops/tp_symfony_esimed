<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241204075951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin_user DROP plain_password');
        $this->addSql('ALTER TABLE advert ALTER price TYPE DOUBLE PRECISION');
        $this->addSql('ALTER TABLE picture DROP CONSTRAINT fk_picture_advert');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE advert ALTER price TYPE NUMERIC(10, 0)');
        $this->addSql('ALTER TABLE admin_user ADD plain_password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT fk_picture_advert FOREIGN KEY (advert_id) REFERENCES advert (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
