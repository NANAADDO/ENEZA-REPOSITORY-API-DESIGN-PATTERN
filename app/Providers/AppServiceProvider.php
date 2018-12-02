<?php

namespace App\Providers;

use App\Repositories\Contracts\ContentRepository;
use App\Repositories\Contracts\CourseRepository;
use App\Repositories\Contracts\QuizAnswersRepository;
use App\Repositories\Eloquent\EloquentContentRepository;
use App\Repositories\Eloquent\EloquentCourseRepository;
use App\Repositories\Contracts\SubjectRepository;
use App\Repositories\Eloquent\EloquentQuizAnswersRepository;
use App\Repositories\Eloquent\EloquentSubjectRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       if ($this->app->environment() == 'local') {
        $this->app->register('Kurt\Repoist\RepoistServiceProvider');
    $this->app->singleton(CourseRepository::class
        ,EloquentCourseRepository::class);
           $this->app->singleton(SubjectRepository::class
               ,EloquentSubjectRepository::class);
           $this->app->singleton(ContentRepository::class
               ,EloquentContentRepository::class);
           $this->app->singleton(QuizAnswersRepository::class
               ,EloquentQuizAnswersRepository::class);
       }
    }
}
