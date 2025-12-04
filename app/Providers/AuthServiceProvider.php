<?php

namespace App\Providers;

use App\Models\Tour;
use App\Policies\TourPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Tour::class => TourPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
