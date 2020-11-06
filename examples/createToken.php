<?php
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

print_r($createToken);