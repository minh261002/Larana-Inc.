<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceProviderRepository extends ServiceProvider
{
    protected $repositories = [
        'App\Repositories\BaseRepositoryInterface' => 'App\Repositories\BaseRepository',
        'App\Repositories\Module\ModuleRepositoryInterface' => 'App\Repositories\Module\ModuleRepository',
        'App\Repositories\Permission\PermissionRepositoryInterface' => 'App\Repositories\Permission\PermissionRepository',
        'App\Repositories\Role\RoleRepositoryInterface' => 'App\Repositories\Role\RoleRepository',
        'App\Repositories\Admin\AdminRepositoryInterface' => 'App\Repositories\Admin\AdminRepository',
        'App\Repositories\Slider\SliderItemRepositoryInterface' => 'App\Repositories\Slider\SliderItemRepository',
        'App\Repositories\Slider\SliderRepositoryInterface' => 'App\Repositories\Slider\SliderRepository',
        'App\Repositories\User\UserRepositoryInterface' => 'App\Repositories\User\UserRepository',
        'App\Repositories\Post\PostRepositoryInterface' => 'App\Repositories\Post\PostRepository',
        'App\Repositories\Post\PostCatalogueRepositoryInterface' => 'App\Repositories\Post\PostCatalogueRepository',
        'App\Repositories\Category\CategoryRepositoryInterface' => 'App\Repositories\Category\CategoryRepository',
        'App\Repositories\Amenity\AmenityRepositoryInterface' => 'App\Repositories\Amenity\AmenityRepository',
        'App\Repositories\Service\ServiceRepositoryInterface' => 'App\Repositories\Service\ServiceRepository',
        'App\Repositories\Property\PropertyRepositoryInterface' => 'App\Repositories\Property\PropertyRepository',
        'App\Repositories\Notification\NotificationRepositoryInterface' => 'App\Repositories\Notification\NotificationRepository',
    ];

    public function register(): void
    {
        foreach ($this->repositories as $interface => $repository) {
            $this->app->bind($interface, $repository);
        }
    }
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
