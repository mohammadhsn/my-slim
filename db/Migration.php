<?php


use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Builder;
use Phinx\Migration\AbstractMigration;

class Migration extends AbstractMigration
{
    /** @var Builder $capsule */
    protected $schema;

    public function init()
    {
        $this->schema = Capsule::schema();
    }
}
