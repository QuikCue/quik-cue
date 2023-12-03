<?php

namespace App\Services\Product\Application\Providers;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom([
            realpath(__DIR__ . '/../../Infrastructure/Migrations')
        ]);

    }

    public function register(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../Presentation/CLI/Console.php');

        $this->loadRoutesFrom(__DIR__ . '/../../Presentation/API/Routes.php');

        $this->loadRoutesFrom(__DIR__ . '/../../Presentation/HTTP/Routes.php');

    }
}
