<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220929114250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Initialize the monster table and insert a monster.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE monster (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name CLOB NOT NULL)');
        $this->addSql("INSERT INTO monster (name) values ('FrankenPHP 🐘')");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE monster');
    }
}
