# Getting Started

## Setup/Install

Install through Composer.

```
composer require apvalkov/merchant-sdk
```
## Example redirect to pay page
```php
$apiKey    = 'Your api key here';
$secretKey = 'Your secret key here';

$config       = new Config(Environment::Sandbox, $apiKey, $secretKey, ApiVersion::v1);
$inxyPayments = new INXYPayments($config);

$orderAmountInUSD = 20;
$orderName        = 'Order #1';
$customer         = new Customer('example@mail.com', 'John', 'Doe');
$sessionRequest   = new SessionRequest($orderAmountInUSD, $orderName);

$sessionRequest->setOrderId('order_123');
$sessionRequest->setCryptocurrencies([CurrencyCode::USDT, CurrencyCode::BTC]);
$sessionRequest->setPostbackUrl('https://example.com/postback');
$sessionRequest->setCancelUrl('https://example.com/cancel');
$sessionRequest->setSuccessUrl('https://example.com/success');
$sessionRequest->setCustomer($customer);

$sessionResponse = $inxyPayments->createSession($sessionRequest);

header( 'Location: ' . $sessionResponse->getRedirectUri());
```