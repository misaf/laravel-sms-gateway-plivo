<?php

declare(strict_types=1);

namespace Misaf\LaravelSmsGatewayPlivo;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Misaf\LaravelSmsGateway\SmsGatewayManager;
use Misaf\LaravelSmsGatewayPlivo\Drivers\PlivoDriver;

final class PlivoSmsGatewayServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->callAfterResolving(SmsGatewayManager::class, function (SmsGatewayManager $manager): void {
            $manager->extend('plivo', fn(Application $app): PlivoDriver => $app->make(PlivoDriver::class));
        });
    }
}
