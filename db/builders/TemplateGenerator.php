<?php


use Phinx\Migration\AbstractTemplateCreation;

class TemplateGenerator extends AbstractTemplateCreation
{

    /**
     * {@inheritdoc}
     */
    public function getMigrationTemplate()
    {
        return file_get_contents(dirname(__FILE__).'/defaultTemplate.dist');
    }

    /**
     * {@inheritdoc}
     */
    public function postMigrationCreation($migrationFilename, $className, $baseClassName)
    {
    }
}
