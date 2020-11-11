# Direct Pay Online API Wrapper for PHP  
[![Latest Stable Version](https://poser.pugx.org/dipnot/direct-pay-online-php/v)](https://packagist.org/packages/dipnot/direct-pay-online-php)
[![Total Downloads](https://poser.pugx.org/dipnot/direct-pay-online-php/downloads)](https://packagist.org/packages/dipnot/direct-pay-online-php)

Unofficial PHP wrapper for [Direct Pay Online API](https://directpayonline.atlassian.net/wiki/spaces/API/overview)  
  
Inspired by [cy6erlion/direct-pay-online](https://github.com/cy6erlion/direct-pay-online)  

## Dependencies
- PHP 5.6.36 or higher
- PHP ext-curl
- PHP ext-simplexml
- PHP ext-json
  
## Installation  
You can install via [Composer](https://getcomposer.org/).  

    composer require dipnot/direct-pay-online-php

  
## Usage  
You can see the full example in [examples](https://github.com/dipnot/direct-pay-online-php/tree/main/examples) folder.
### Config
All request are needs a Config.
```php  
use Dipnot\DirectPayOnline\Config;

$config = new Config();  
$config->setCompanyToken("9F416C11-127B-4DE2-AC7F-D5710E4C5E0A");  
$config->setTestMode(true);
```
### Transaction
```php  
use Dipnot\DirectPayOnline\Model\Transaction;

$transaction = new Transaction(100, "USD");
```  

### Service
```php  
use Dipnot\DirectPayOnline\Model\Service;

$service = new Service("Test Product", 3854, "2020/02/12 11:21");
```  
### "createToken" Request
Create a token to start payment process.  
```php  
use Dipnot\DirectPayOnline\Request\CreateTokenRequest;

$createTokenRequest = new CreateTokenRequest($config);  
$createTokenRequest->setTransaction($transaction);  
$createTokenRequest->addService($service1);
$createTokenRequest->addService($service2);
$createToken = $createTokenRequest->execute();  
print_r($createToken);  
``` 

### "verifyToken" Request
Get the payment result by using VerifyTokenRequest.
```php  
use Dipnot\DirectPayOnline\Request\VerifyTokenRequest;

$verifyTokenRequest = new VerifyTokenRequest($config);
$verifyTokenRequest->setTransactionToken($_GET["TransactionToken"]);
$verifyToken = $verifyTokenRequest->execute();
print_r($verifyToken);
```  
  
### Getting the payment URL  
Get the payment URL with the created token to redirect the user to the payment page.  
```php  
$paymentUrl = $createTokenRequest->getPaymentUrl($createToken["TransToken"]);  
print_r($paymentUrl);
```  
  
## Test values  
You can fill the personal info randomly in the payment page.  
  
||Value|  
|--|--|  
|Company token|9F416C11-127B-4DE2-AC7F-D5710E4C5E0A|  
|Card number|5436886269848367|  
|Card expiry date (Month/Year)|12/22|  
|Card CVV|123|  
  
## License  
[![License: MIT](https://img.shields.io/badge/License-MIT-%232fdcff)](https://github.com/dipnot/direct-pay-online-php/blob/main/LICENSE)
