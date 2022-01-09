<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->bind(
            'App\Repository\TeacherRepositoryInterface',
            'App\Repository\TeacherRepository');
    
         $this->app->bind(
            'App\Repository\StudentRepositoryInterface',
            'App\Repository\StudentRepository');

         $this->app->bind(
            'App\Repository\StudentPromotionRepositoryInterface',
            'App\Repository\StudentPromotionRepository');
         $this->app->bind('App\Repository\SubjectRepositoryInterface', 'App\Repository\SubjectRepository');
           $this->app->bind('App\Repository\AttendanceRepositoryInterface', 'App\Repository\AttendanceRepository');
           $this->app->bind('App\Repository\QuizzRepositoryInterface', 'App\Repository\QuizzRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}