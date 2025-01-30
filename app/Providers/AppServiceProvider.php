<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(\App\Repositories\MedicoRepository::class);
        $this->app->bind(\App\Repositories\CidadeRepository::class);
        $this->app->bind(\App\Repositories\ConsultaRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
