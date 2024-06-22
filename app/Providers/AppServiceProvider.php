<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Paginator::useBootstrap();
        Paginator::defaultView("pagination::default");
        
        Gate::define('edit-project', function(User $user, Project $project) {
            return $project->status == Project::STATUSES[0] || $user->userAccess->where('permission', 'admin')->count() > 0;
        });

        Gate::define('destroy-project', function(User $user, Project $project) {
            return $user->userAccess->where('permission', 'admin')->count() > 0;
        });

        Gate::define('edit-destroy-task', function(User $user, Task $task) {
            return $task->user->id == $user->id || $user->userAccess->where('permission', 'admin')->count() > 0;
        });
    }
}
