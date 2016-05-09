<?php

namespace Projeto\Providers;

use Illuminate\Support\ServiceProvider;

class ProjetoRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \Projeto\Repositories\UserRepository::class,
            \Projeto\Repositories\UserRepositoryEloquent::class
        );
        
        $this->app->bind(
            \Projeto\Repositories\CourseRepository::class,
            \Projeto\Repositories\CourseRepositoryEloquent::class
        );
        
        $this->app->bind(
            \Projeto\Repositories\SubjectRepository::class,
            \Projeto\Repositories\SubjectRepositoryEloquent::class
        );
        
        $this->app->bind(
            \Projeto\Repositories\ProjectRepository::class,
            \Projeto\Repositories\ProjectRepositoryEloquent::class
        );
        
        $this->app->bind(
            \Projeto\Repositories\ProjectFileRepository::class,
            \Projeto\Repositories\ProjectFileRepositoryEloquent::class
        );
    }
}
