<?php

declare(strict_types=1);

namespace Misaf\LaravelSmsGatewayPlivo\Drivers;

use Illuminate\Http\Client\PendingRequest;
use Misaf\LaravelSmsGateway\SmsGatewayDriver;

final class PlivoDriver extends SmsGatewayDriver
{
    protected function driverName(): string
    {
        return 'plivo';
    }

    protected function defaultGateway(): string
    {
        return "https://api.plivo.com/v1/Account/{$this->serviceConfigString('auth_id')}/";
    }

    protected function configureRequest(PendingRequest $request): PendingRequest
    {
        return $request
            ->withBasicAuth($this->serviceConfigString('auth_id'), $this->serviceConfigString('auth_token'))
            ->acceptJson()
            ->asJson();
    }
}
