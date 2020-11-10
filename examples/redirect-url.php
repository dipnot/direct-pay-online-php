<?php
use Dipnot\DirectPayOnline\Request\VerifyTokenRequest;

/**
 * The payment page send data on GET
 *
 * "TransID"
 * "CCDapproval"
 * "PnrID"
 * "TransactionToken"
 * "CompanyRef"
 */

// Config
$config = require_once("./_config.php");

// verifyToken Request
$verifyTokenRequest = new VerifyTokenRequest($config);
$verifyTokenRequest->setTransactionToken($_GET["TransactionToken"]);
$verifyToken = $verifyTokenRequest->execute();
print_r($verifyToken);