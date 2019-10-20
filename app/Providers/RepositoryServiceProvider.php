<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\InvoiceConfiguration\InterfaceInvoiceConfiguration;
use App\Repositories\InvoiceConfiguration\InvoiceConfigurationRepository;

class RepositoryServiceProvider extends ServiceProvider
{

    private $repositories = [
        InterfaceInvoiceConfiguration::class => InvoiceConfigurationRepository::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $key => $provider) {
            $this->app->bind($key, $provider);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
