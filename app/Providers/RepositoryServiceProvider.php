<?php

namespace App\Providers;

use App\Interfaces\ICourselistRepository;
use App\Interfaces\ICourseOfferRepository;
use App\Interfaces\ICourseRepository;
use App\Interfaces\IGroupBaseRepository;
use App\Interfaces\IsemesterRepositroy;
use App\Repositories\CourselistRepository;
use App\Repositories\CourseOfferRepository;
use App\Repositories\CourseRepository;
use App\Repositories\GropuRepository;
use App\Repositories\SemesterRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IGroupBaseRepository::class, GropuRepository::class);
        $this->app->bind(IsemesterRepositroy::class,  SemesterRepository::class);
  
        $this->app->bind(ICourselistRepository::class,CourselistRepository::class);
        $this->app->bind(ICourseOfferRepository::class,CourseOfferRepository::class);
      

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
