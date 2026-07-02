# Laravel SMS Gateway Plivo Driver

Plivo SMS gateway driver for [`misaf/laravel-sms-gateway`](https://github.com/misaf/laravel-sms-gateway).

## Installation

```bash
composer require misaf/laravel-sms-gateway-plivo
```

Laravel package discovery registers the driver service provider automatically.

## Configuration

```env
SMS_GATEWAY_DRIVER=plivo
SMS_GATEWAY_PLIVO_AUTH_ID=your-auth-id
SMS_GATEWAY_PLIVO_AUTH_TOKEN=your-auth-token
```

```php
// config/services.php
'plivo' => [
    'auth_id'    => env('SMS_GATEWAY_PLIVO_AUTH_ID'),
    'auth_token' => env('SMS_GATEWAY_PLIVO_AUTH_TOKEN'),
],
```

## Usage

```php
use Misaf\LaravelSmsGateway\Facade\SmsGateway;

$response = SmsGateway::driver('plivo')->send([
    'dst'  => '09123456789',
    'text' => 'Hello',
]);
```

The payload is passed directly to Plivo, so use the fields expected by the Plivo API.

Use `request()` when you need direct access to Laravel's HTTP client:

```php
$request = SmsGateway::driver('plivo')->request();
```

## Testing

```bash
composer test
composer analyse
```

## License

MIT
