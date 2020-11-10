<?php
use Dipnot\DirectPayOnline\Model\Service;
use Dipnot\DirectPayOnline\Model\Transaction;
use Dipnot\DirectPayOnline\Request\CreateTokenRequest;

require_once("./../vendor/autoload.php");

// Config
$config = require_once("./_config.php");

// Transaction
$transaction = new Transaction(100, "USD");
$transaction->setRedirectURL("http://localhost/direct-pay-online-php/examples/redirect-url.php");

// Service
$service1 = new Service("Test Product", 3854, "2020/02/12 11:21");
$service2 = new Service("Test Service", 5525, "2020/02/12 11:21");

// createToken Request
$createTokenRequest = new CreateTokenRequest($config);
$createTokenRequest->setTransaction($transaction);
$createTokenRequest->addService($service1);
$createTokenRequest->addService($service2);
$createToken = $createTokenRequest->execute();
print_r($createToken);

// Get payment URL with created token
$paymentUrl = $createTokenRequest->getPaymentUrl($createToken["TransToken"]);
print_r($paymentUrl);