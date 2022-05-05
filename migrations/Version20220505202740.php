<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220505202740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_C7440455BCF5E72D ON client (categorie_id)');
        $this->addSql('ALTER TABLE contrat ADD client_id INT DEFAULT NULL, ADD team_experts LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_6034999319EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_6034999319EB6921 ON contrat (client_id)');
        $this->addSql('ALTER TABLE fiche_intervention ADD expert_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fiche_intervention ADD CONSTRAINT FK_8D88099EC5568CE4 FOREIGN KEY (expert_id) REFERENCES expert (id)');
        $this->addSql('CREATE INDEX IDX_8D88099EC5568CE4 ON fiche_intervention (expert_id)');
        $this->addSql('ALTER TABLE projet ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_50159CA919EB6921 ON projet (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455BCF5E72D');
        $this->addSql('DROP INDEX IDX_C7440455BCF5E72D ON client');
        $this->addSql('ALTER TABLE client DROP categorie_id');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_6034999319EB6921');
        $this->addSql('DROP INDEX IDX_6034999319EB6921 ON contrat');
        $this->addSql('ALTER TABLE contrat DROP client_id, DROP team_experts');
        $this->addSql('ALTER TABLE fiche_intervention DROP FOREIGN KEY FK_8D88099EC5568CE4');
        $this->addSql('DROP INDEX IDX_8D88099EC5568CE4 ON fiche_intervention');
        $this->addSql('ALTER TABLE fiche_intervention DROP expert_id');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA919EB6921');
        $this->addSql('DROP INDEX IDX_50159CA919EB6921 ON projet');
        $this->addSql('ALTER TABLE projet DROP client_id');
    }
}
