
# Direct Pay Online API Wrapper for PHP
Unofficial PHP wrapper for [Direct Pay Online API](https://directpayonline.atlassian.net/wiki/spaces/API/overview)

Inspired by [cy6erlion/direct-pay-online](https://github.com/cy6erlion/direct-pay-online)

## Installation
You can install via [Composer](https://getcomposer.org/).

    composer require dipnot/direct-pay-online

## Usage
### createToken
Create a token to start payment process.
```php
use Dipnot\DirectPayOnline;
use Dipnot\Service;
use Dipnot\Transaction;

require_once("./../vendor/autoload.php");

$directPayOnline = new DirectPayOnline("9F416C11-127B-4DE2-AC7F-D5710E4C5E0A");
$transaction = new Transaction(100, "USD");
$service1 = new Service("Shirt", 3854, "2020/02/12 11:21");
$service2 = new Service("Trouser", 3854, "2020/02/12 11:21");

$createToken = $directPayOnline->createToken(
	$transaction,
	[$service1, $service2]
);

print_r($createToken); // You can access the token with $createToken["TransToken"]
```

### getPaymentLink
Get the payment link with the created token to redirect the user to the payment page.
```php
...
// You will get the payment URL
$directPayOnline->getPaymentUrl($createToken["TransToken"]);
...
```

### Test mode
You can use test API for testing purpose. Just pass `true` as second parameter.
```php
$directPayOnline  =  new  DirectPayOnline("COMPANY_TOKEN", true);
```

## License
[![License: MIT](https://img.shields.io/badge/License-MIT-%232fdcff)](https://github.com/dipnot/direct-pay-online-php/blob/main/LICENSE)
