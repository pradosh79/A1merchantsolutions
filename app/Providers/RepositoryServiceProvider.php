<?php

namespace App\Providers;

use App\Interfaces\ActivityLogRepositoryInterface;
use App\Interfaces\AdvertiserRepositoryInterface;
use App\Interfaces\ClaimRepositoryInterface;
use App\Interfaces\OfferRepositoryInterface;
use App\Interfaces\ScreenRepositoryInterface;
use App\Repositories\ActivityLogRepository;
use App\Repositories\AdvertiserRepository;
use App\Repositories\ClaimRepository;
use App\Repositories\OfferRepository;
use App\Repositories\ScreenRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Central binding map: Interface => Implementation.
     * Swapping a persistence strategy later only requires editing this file.
     */
    public array $bindings = [
        ScreenRepositoryInterface::class => ScreenRepository::class,
        AdvertiserRepositoryInterface::class => AdvertiserRepository::class,
        OfferRepositoryInterface::class => OfferRepository::class,
        ClaimRepositoryInterface::class => ClaimRepository::class,
        ActivityLogRepositoryInterface::class => ActivityLogRepository::class,
    ];

    public function register(): void
    {
        foreach ($this->bindings as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }
}
