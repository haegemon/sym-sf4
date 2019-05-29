<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190529211137 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE staff (id INT AUTO_INCREMENT NOT NULL, photo_id INT DEFAULT NULL, full_name VARCHAR(1024) NOT NULL, position VARCHAR(1024) NOT NULL, description LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_426EF3927E9E4C8C (photo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE testimonials (id INT AUTO_INCREMENT NOT NULL, photo_id INT DEFAULT NULL, title VARCHAR(1024) NOT NULL, ext LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_383115797E9E4C8C (photo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE houses (id INT AUTO_INCREMENT NOT NULL, gallery_id INT DEFAULT NULL, plan_gallery_id INT DEFAULT NULL, main_photo_id INT DEFAULT NULL, title VARCHAR(1024) NOT NULL, url VARCHAR(1024) NOT NULL, description LONGTEXT NOT NULL, size DOUBLE PRECISION NOT NULL, price INT NOT NULL, bedroom_count INT NOT NULL, floor_count INT NOT NULL, bathroom_count INT NOT NULL, UNIQUE INDEX UNIQ_95D7F5CB4E7AF8F (gallery_id), UNIQUE INDEX UNIQ_95D7F5CB698A9599 (plan_gallery_id), INDEX IDX_95D7F5CBA7BC5DF9 (main_photo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE staff ADD CONSTRAINT FK_426EF3927E9E4C8C FOREIGN KEY (photo_id) REFERENCES ant_media (id)');
        $this->addSql('ALTER TABLE testimonials ADD CONSTRAINT FK_383115797E9E4C8C FOREIGN KEY (photo_id) REFERENCES ant_media (id)');
        $this->addSql('ALTER TABLE houses ADD CONSTRAINT FK_95D7F5CB4E7AF8F FOREIGN KEY (gallery_id) REFERENCES media__gallery (id)');
        $this->addSql('ALTER TABLE houses ADD CONSTRAINT FK_95D7F5CB698A9599 FOREIGN KEY (plan_gallery_id) REFERENCES media__gallery (id)');
        $this->addSql('ALTER TABLE houses ADD CONSTRAINT FK_95D7F5CBA7BC5DF9 FOREIGN KEY (main_photo_id) REFERENCES ant_media (id)');
        $this->addSql('DROP TABLE ant_Portfolio');
        $this->addSql('ALTER TABLE fos_user DROP locked, DROP expired, DROP expires_at, DROP credentials_expired, DROP credentials_expire_at, CHANGE username username VARCHAR(180) NOT NULL, CHANGE username_canonical username_canonical VARCHAR(180) NOT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE email_canonical email_canonical VARCHAR(180) NOT NULL, CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A6479C05FB297 ON fos_user (confirmation_token)');
        $this->addSql('ALTER TABLE media__gallery ADD slug VARCHAR(156) NOT NULL');
        $this->addSql('ALTER TABLE media__gallery_media DROP FOREIGN KEY FK_80D4C5414E7AF8F');
        $this->addSql('ALTER TABLE media__gallery_media DROP FOREIGN KEY FK_80D4C541EA9FDD75');
        $this->addSql('ALTER TABLE media__gallery_media ADD CONSTRAINT FK_80D4C5414E7AF8F FOREIGN KEY (gallery_id) REFERENCES media__gallery (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media__gallery_media ADD CONSTRAINT FK_80D4C541EA9FDD75 FOREIGN KEY (media_id) REFERENCES ant_media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ant_media ADD cdn_flush_identifier VARCHAR(64) DEFAULT NULL, CHANGE content_type content_type VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ant_Portfolio (id INT AUTO_INCREMENT NOT NULL, gallery_id INT DEFAULT NULL, title VARCHAR(55) NOT NULL COLLATE utf8_unicode_ci, description LONGTEXT NOT NULL COLLATE utf8_unicode_ci, metaKey VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, metaDesc VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, slug VARCHAR(156) NOT NULL COLLATE utf8_unicode_ci, created DATETIME NOT NULL, UNIQUE INDEX UNIQ_D68380944E7AF8F (gallery_id), UNIQUE INDEX UNIQ_D6838094989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ant_Portfolio ADD CONSTRAINT FK_D68380944E7AF8F FOREIGN KEY (gallery_id) REFERENCES media__gallery (id)');
        $this->addSql('DROP TABLE staff');
        $this->addSql('DROP TABLE testimonials');
        $this->addSql('DROP TABLE houses');
        $this->addSql('ALTER TABLE ant_media DROP cdn_flush_identifier, CHANGE content_type content_type VARCHAR(64) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('DROP INDEX UNIQ_957A6479C05FB297 ON fos_user');
        $this->addSql('ALTER TABLE fos_user ADD locked TINYINT(1) NOT NULL, ADD expired TINYINT(1) NOT NULL, ADD expires_at DATETIME DEFAULT NULL, ADD credentials_expired TINYINT(1) NOT NULL, ADD credentials_expire_at DATETIME DEFAULT NULL, CHANGE username username VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE username_canonical username_canonical VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE email email VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE email_canonical email_canonical VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE salt salt VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE confirmation_token confirmation_token VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE media__gallery DROP slug');
        $this->addSql('ALTER TABLE media__gallery_media DROP FOREIGN KEY FK_80D4C5414E7AF8F');
        $this->addSql('ALTER TABLE media__gallery_media DROP FOREIGN KEY FK_80D4C541EA9FDD75');
        $this->addSql('ALTER TABLE media__gallery_media ADD CONSTRAINT FK_80D4C5414E7AF8F FOREIGN KEY (gallery_id) REFERENCES media__gallery (id)');
        $this->addSql('ALTER TABLE media__gallery_media ADD CONSTRAINT FK_80D4C541EA9FDD75 FOREIGN KEY (media_id) REFERENCES ant_media (id)');
    }
}
