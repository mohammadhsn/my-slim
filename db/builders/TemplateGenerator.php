<?php


use Phinx\Migration\AbstractTemplateCreation;

class TemplateGenerator extends AbstractTemplateCreation
{

    /**
     * @inheritDoc
     */
    public function getMigrationTemplate()
    {
        return file_get_contents(dirname(__FILE__) . '/defaultTemplate.dist');
    }

    /**
     * @inheritDoc
     */
    public function postMigrationCreation($migrationFilename, $className, $baseClassName)
    {

    }
}