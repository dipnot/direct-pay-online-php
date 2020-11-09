<?php
use Dipnot\DirectPayOnline\Config;
use Dipnot\DirectPayOnline\Model\Service;
use Dipnot\DirectPayOnline\Model\Transaction;
use Dipnot\DirectPayOnline\Request\CreateTokenRequest;

require_once("./../vendor/autoload.php");

// Config
$config = new Config();
$config->setCompanyToken("9F416C11-127B-4DE2-AC7F-D5710E4C5E0A");
$config->setTestMode(true);

// Transaction
$transaction = new Transaction(100, "USD");

// Service
$service1 = new Service("Test Product", 3854, "2020/02/12 11:21");
$service2 = new Service("Test Service", 5525, "2020/02/12 11:21");

// createToken Request
$createTokenRequest = new CreateTokenRequest($config);
$createTokenRequest->setTransaction($transaction);
$createTokenRequest->setServices([$service1, $service2]);
$createToken = $createTokenRequest->execute();
print_r($createToken);

// Get payment URL with created token
$paymentUrl = $createTokenRequest->getPaymentUrl($createToken["TransToken"]);
print_r($paymentUrl);