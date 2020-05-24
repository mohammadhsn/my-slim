<?php


namespace App\Providers;

use Dotenv\Dotenv;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class SettingsServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    public function boot()
    {
        $this->initEnv();
        $this->loadSettings();
    }

    protected function loadSettings()
    {
        $path = str_replace(
            '/',
            DIRECTORY_SEPARATOR,
            sprintf("%s/conf/settings.php", $this->container->get('path'))
        );
        $this->container->add('settings', require $path);
    }

    protected function initEnv()
    {
        $env = DotEnv::createImmutable($this->container->get('path'));
        $env->load();
    }

    /**
     * @inheritDoc
     */
    public function register()
    {
        //
    }

}