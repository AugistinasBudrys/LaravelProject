<?php


namespace App\Providers;

use App\Repositories\EventRepository;
use App\Repositories\EventRepositoryInterface;
use App\Repositories\UserRepository;
use App\Contract\UserRepositoryInterface;
use App\Repositories\RoleRepository;
use App\Contract\RoleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RoleRepositoryInterface::class,RoleRepository::class);
        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
    }
}