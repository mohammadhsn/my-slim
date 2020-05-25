<?php


namespace Tests;

use Phinx\Console\PhinxApplication;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;

trait InteractsWithDB
{
    public function migrate()
    {
        $app = new PhinxApplication();

        $arguments = [
            'command' => 'migrate',
        ];

        $app->doRun(new ArrayInput($arguments), new NullOutput());
    }

    public function rollback()
    {
        $app = new PhinxApplication();

        $arguments = [
            'command' => 'rollback',
            '-t'      => '0',
            '-f'      => null
        ];

        $app->doRun(new ArrayInput($arguments), new NullOutput());
    }
}
