<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190604134359 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE qcmanswers ADD question_id INT NOT NULL');
        $this->addSql('ALTER TABLE qcmanswers ADD CONSTRAINT FK_19BD97A31E27F6BF FOREIGN KEY (question_id) REFERENCES qcmquestions (id)');
        $this->addSql('CREATE INDEX IDX_19BD97A31E27F6BF ON qcmanswers (question_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE qcmanswers DROP FOREIGN KEY FK_19BD97A31E27F6BF');
        $this->addSql('DROP INDEX IDX_19BD97A31E27F6BF ON qcmanswers');
        $this->addSql('ALTER TABLE qcmanswers DROP question_id');
    }
}
