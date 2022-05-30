<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220529095648 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE absence ADD apprenant_id INT NOT NULL, ADD intervenant_id INT NOT NULL, ADD module_id INT NOT NULL, ADD user_id INT NOT NULL, ADD classe_id INT NOT NULL');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C9C5697D6D FOREIGN KEY (apprenant_id) REFERENCES apprenant (id)');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C9AB9A1716 FOREIGN KEY (intervenant_id) REFERENCES intervenant (id)');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C9AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id)');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C98F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('CREATE INDEX IDX_765AE0C9C5697D6D ON absence (apprenant_id)');
        $this->addSql('CREATE INDEX IDX_765AE0C9AB9A1716 ON absence (intervenant_id)');
        $this->addSql('CREATE INDEX IDX_765AE0C9AFC2B591 ON absence (module_id)');
        $this->addSql('CREATE INDEX IDX_765AE0C9A76ED395 ON absence (user_id)');
        $this->addSql('CREATE INDEX IDX_765AE0C98F5EA509 ON absence (classe_id)');
        $this->addSql('ALTER TABLE apprenant ADD classe_id INT NOT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE apprenant ADD CONSTRAINT FK_C4EB462E8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE apprenant ADD CONSTRAINT FK_C4EB462EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C4EB462E8F5EA509 ON apprenant (classe_id)');
        $this->addSql('CREATE INDEX IDX_C4EB462EA76ED395 ON apprenant (user_id)');
        $this->addSql('ALTER TABLE apprenant_module ADD CONSTRAINT FK_15BFE584C5697D6D FOREIGN KEY (apprenant_id) REFERENCES apprenant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apprenant_module ADD CONSTRAINT FK_15BFE584AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apprenant_bloc ADD CONSTRAINT FK_50F25ECEC5697D6D FOREIGN KEY (apprenant_id) REFERENCES apprenant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apprenant_bloc ADD CONSTRAINT FK_50F25ECE5582E9C0 FOREIGN KEY (bloc_id) REFERENCES bloc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apprenant_document ADD CONSTRAINT FK_D8B6F302C5697D6D FOREIGN KEY (apprenant_id) REFERENCES apprenant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apprenant_document ADD CONSTRAINT FK_D8B6F302C33F7837 FOREIGN KEY (document_id) REFERENCES document (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bloc ADD classe_id INT NOT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE bloc ADD CONSTRAINT FK_C778955A8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE bloc ADD CONSTRAINT FK_C778955AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C778955A8F5EA509 ON bloc (classe_id)');
        $this->addSql('CREATE INDEX IDX_C778955AA76ED395 ON bloc (user_id)');
        $this->addSql('ALTER TABLE classe ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF96A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8F87BF96A76ED395 ON classe (user_id)');
        $this->addSql('ALTER TABLE document ADD module_id INT NOT NULL, ADD intervenant_id INT NOT NULL, ADD user_id INT NOT NULL, ADD apprenant_id INT NOT NULL');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76AB9A1716 FOREIGN KEY (intervenant_id) REFERENCES intervenant (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76C5697D6D FOREIGN KEY (apprenant_id) REFERENCES apprenant (id)');
        $this->addSql('CREATE INDEX IDX_D8698A76AFC2B591 ON document (module_id)');
        $this->addSql('CREATE INDEX IDX_D8698A76AB9A1716 ON document (intervenant_id)');
        $this->addSql('CREATE INDEX IDX_D8698A76A76ED395 ON document (user_id)');
        $this->addSql('CREATE INDEX IDX_D8698A76C5697D6D ON document (apprenant_id)');
        $this->addSql('ALTER TABLE intervenant ADD classe_id INT NOT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE intervenant ADD CONSTRAINT FK_73D0145C8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE intervenant ADD CONSTRAINT FK_73D0145CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_73D0145C8F5EA509 ON intervenant (classe_id)');
        $this->addSql('CREATE INDEX IDX_73D0145CA76ED395 ON intervenant (user_id)');
        $this->addSql('ALTER TABLE intervenant_module ADD CONSTRAINT FK_795A72CEAB9A1716 FOREIGN KEY (intervenant_id) REFERENCES intervenant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE intervenant_module ADD CONSTRAINT FK_795A72CEAFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE intervenant_apprenant ADD CONSTRAINT FK_EE2E22AB9A1716 FOREIGN KEY (intervenant_id) REFERENCES intervenant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE intervenant_apprenant ADD CONSTRAINT FK_EE2E22C5697D6D FOREIGN KEY (apprenant_id) REFERENCES apprenant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message ADD classe_id INT NOT NULL, ADD apprenant_id INT NOT NULL, ADD intervenant_id INT NOT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FC5697D6D FOREIGN KEY (apprenant_id) REFERENCES apprenant (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FAB9A1716 FOREIGN KEY (intervenant_id) REFERENCES intervenant (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F8F5EA509 ON message (classe_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FC5697D6D ON message (apprenant_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FAB9A1716 ON message (intervenant_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FA76ED395 ON message (user_id)');
        $this->addSql('ALTER TABLE module ADD classe_id INT NOT NULL, ADD bloc_id INT NOT NULL, ADD user_id INT NOT NULL, ADD apprenant_id INT NOT NULL');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C2426288F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C2426285582E9C0 FOREIGN KEY (bloc_id) REFERENCES bloc (id)');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C242628A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C242628C5697D6D FOREIGN KEY (apprenant_id) REFERENCES apprenant (id)');
        $this->addSql('CREATE INDEX IDX_C2426288F5EA509 ON module (classe_id)');
        $this->addSql('CREATE INDEX IDX_C2426285582E9C0 ON module (bloc_id)');
        $this->addSql('CREATE INDEX IDX_C242628A76ED395 ON module (user_id)');
        $this->addSql('CREATE INDEX IDX_C242628C5697D6D ON module (apprenant_id)');
        $this->addSql('ALTER TABLE module_intervenant ADD CONSTRAINT FK_FDFB1E8EAFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE module_intervenant ADD CONSTRAINT FK_FDFB1E8EAB9A1716 FOREIGN KEY (intervenant_id) REFERENCES intervenant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tuteur ADD apprenant_id INT NOT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE tuteur ADD CONSTRAINT FK_56412268C5697D6D FOREIGN KEY (apprenant_id) REFERENCES apprenant (id)');
        $this->addSql('ALTER TABLE tuteur ADD CONSTRAINT FK_56412268A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_56412268C5697D6D ON tuteur (apprenant_id)');
        $this->addSql('CREATE INDEX IDX_56412268A76ED395 ON tuteur (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE absence DROP FOREIGN KEY FK_765AE0C9C5697D6D');
        $this->addSql('ALTER TABLE absence DROP FOREIGN KEY FK_765AE0C9AB9A1716');
        $this->addSql('ALTER TABLE absence DROP FOREIGN KEY FK_765AE0C9AFC2B591');
        $this->addSql('ALTER TABLE absence DROP FOREIGN KEY FK_765AE0C9A76ED395');
        $this->addSql('ALTER TABLE absence DROP FOREIGN KEY FK_765AE0C98F5EA509');
        $this->addSql('DROP INDEX IDX_765AE0C9C5697D6D ON absence');
        $this->addSql('DROP INDEX IDX_765AE0C9AB9A1716 ON absence');
        $this->addSql('DROP INDEX IDX_765AE0C9AFC2B591 ON absence');
        $this->addSql('DROP INDEX IDX_765AE0C9A76ED395 ON absence');
        $this->addSql('DROP INDEX IDX_765AE0C98F5EA509 ON absence');
        $this->addSql('ALTER TABLE absence DROP apprenant_id, DROP intervenant_id, DROP module_id, DROP user_id, DROP classe_id');
        $this->addSql('ALTER TABLE apprenant DROP FOREIGN KEY FK_C4EB462E8F5EA509');
        $this->addSql('ALTER TABLE apprenant DROP FOREIGN KEY FK_C4EB462EA76ED395');
        $this->addSql('DROP INDEX IDX_C4EB462E8F5EA509 ON apprenant');
        $this->addSql('DROP INDEX IDX_C4EB462EA76ED395 ON apprenant');
        $this->addSql('ALTER TABLE apprenant DROP classe_id, DROP user_id');
        $this->addSql('ALTER TABLE apprenant_bloc DROP FOREIGN KEY FK_50F25ECEC5697D6D');
        $this->addSql('ALTER TABLE apprenant_bloc DROP FOREIGN KEY FK_50F25ECE5582E9C0');
        $this->addSql('ALTER TABLE apprenant_document DROP FOREIGN KEY FK_D8B6F302C5697D6D');
        $this->addSql('ALTER TABLE apprenant_document DROP FOREIGN KEY FK_D8B6F302C33F7837');
        $this->addSql('ALTER TABLE apprenant_module DROP FOREIGN KEY FK_15BFE584C5697D6D');
        $this->addSql('ALTER TABLE apprenant_module DROP FOREIGN KEY FK_15BFE584AFC2B591');
        $this->addSql('ALTER TABLE bloc DROP FOREIGN KEY FK_C778955A8F5EA509');
        $this->addSql('ALTER TABLE bloc DROP FOREIGN KEY FK_C778955AA76ED395');
        $this->addSql('DROP INDEX IDX_C778955A8F5EA509 ON bloc');
        $this->addSql('DROP INDEX IDX_C778955AA76ED395 ON bloc');
        $this->addSql('ALTER TABLE bloc DROP classe_id, DROP user_id');
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF96A76ED395');
        $this->addSql('DROP INDEX IDX_8F87BF96A76ED395 ON classe');
        $this->addSql('ALTER TABLE classe DROP user_id');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76AFC2B591');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76AB9A1716');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76A76ED395');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76C5697D6D');
        $this->addSql('DROP INDEX IDX_D8698A76AFC2B591 ON document');
        $this->addSql('DROP INDEX IDX_D8698A76AB9A1716 ON document');
        $this->addSql('DROP INDEX IDX_D8698A76A76ED395 ON document');
        $this->addSql('DROP INDEX IDX_D8698A76C5697D6D ON document');
        $this->addSql('ALTER TABLE document DROP module_id, DROP intervenant_id, DROP user_id, DROP apprenant_id');
        $this->addSql('ALTER TABLE intervenant DROP FOREIGN KEY FK_73D0145C8F5EA509');
        $this->addSql('ALTER TABLE intervenant DROP FOREIGN KEY FK_73D0145CA76ED395');
        $this->addSql('DROP INDEX IDX_73D0145C8F5EA509 ON intervenant');
        $this->addSql('DROP INDEX IDX_73D0145CA76ED395 ON intervenant');
        $this->addSql('ALTER TABLE intervenant DROP classe_id, DROP user_id');
        $this->addSql('ALTER TABLE intervenant_apprenant DROP FOREIGN KEY FK_EE2E22AB9A1716');
        $this->addSql('ALTER TABLE intervenant_apprenant DROP FOREIGN KEY FK_EE2E22C5697D6D');
        $this->addSql('ALTER TABLE intervenant_module DROP FOREIGN KEY FK_795A72CEAB9A1716');
        $this->addSql('ALTER TABLE intervenant_module DROP FOREIGN KEY FK_795A72CEAFC2B591');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F8F5EA509');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FC5697D6D');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FAB9A1716');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FA76ED395');
        $this->addSql('DROP INDEX IDX_B6BD307F8F5EA509 ON message');
        $this->addSql('DROP INDEX IDX_B6BD307FC5697D6D ON message');
        $this->addSql('DROP INDEX IDX_B6BD307FAB9A1716 ON message');
        $this->addSql('DROP INDEX IDX_B6BD307FA76ED395 ON message');
        $this->addSql('ALTER TABLE message DROP classe_id, DROP apprenant_id, DROP intervenant_id, DROP user_id');
        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C2426288F5EA509');
        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C2426285582E9C0');
        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C242628A76ED395');
        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C242628C5697D6D');
        $this->addSql('DROP INDEX IDX_C2426288F5EA509 ON module');
        $this->addSql('DROP INDEX IDX_C2426285582E9C0 ON module');
        $this->addSql('DROP INDEX IDX_C242628A76ED395 ON module');
        $this->addSql('DROP INDEX IDX_C242628C5697D6D ON module');
        $this->addSql('ALTER TABLE module DROP classe_id, DROP bloc_id, DROP user_id, DROP apprenant_id');
        $this->addSql('ALTER TABLE module_intervenant DROP FOREIGN KEY FK_FDFB1E8EAFC2B591');
        $this->addSql('ALTER TABLE module_intervenant DROP FOREIGN KEY FK_FDFB1E8EAB9A1716');
        $this->addSql('ALTER TABLE tuteur DROP FOREIGN KEY FK_56412268C5697D6D');
        $this->addSql('ALTER TABLE tuteur DROP FOREIGN KEY FK_56412268A76ED395');
        $this->addSql('DROP INDEX IDX_56412268C5697D6D ON tuteur');
        $this->addSql('DROP INDEX IDX_56412268A76ED395 ON tuteur');
        $this->addSql('ALTER TABLE tuteur DROP apprenant_id, DROP user_id');
    }
}
