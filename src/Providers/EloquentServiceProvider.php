<?php

namespace App\Providers;

use Illuminate\Database\Capsule\Manager as Capsule;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;


class EloquentServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    /**
     * @inheritDoc
     */
    public function boot()
    {
        $capsule = new Capsule();
        $capsule->addConnection($this->container->get('settings')['db']);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    /**
     * @inheritDoc
     */
    public function register()
    {

    }
}
