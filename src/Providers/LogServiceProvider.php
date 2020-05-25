<?php


namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Monolog\Handler\StreamHandler;

use Monolog\Logger;

class LogServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $settings = $this->container->get('settings');

        $log = new Logger($settings['app']['name']);

        $log->pushHandler(new StreamHandler($this->path($settings)));

        $this->container->add('logger', $log);
    }

    protected function path(array $settings): string
    {
        return sprintf(
            '%s%s%s',
            $this->container->get('path'),
            DIRECTORY_SEPARATOR,
            $settings['logging']['filename']
        );
    }

    public function register()
    {
    }
}
