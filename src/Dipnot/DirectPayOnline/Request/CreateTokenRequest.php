<?php
namespace Dipnot\DirectPayOnline\Request;
use Dipnot\DirectPayOnline\Model\Service;
use Dipnot\DirectPayOnline\Model\Transaction;
use Dipnot\DirectPayOnline\Request;

/**
 * Class CreateTokenRequest
 * @package Dipnot\DirectPayOnline\Request
 *
 * @see     https://directpayonline.atlassian.net/wiki/spaces/API/pages/36110341/createToken+V6
 */
class CreateTokenRequest extends Request
{
	const PRODUCTION_PAYMENT_URL = "https://secure.3gdirectpay.com/payv2.php?ID={{TOKEN}}";
	const TEST_PAYMENT_URL = "https://secure1.sandbox.directpay.online/payv2.php?ID={{TOKEN}}";

	private $_transaction;
	private $_services;

	/**
	 * @return Transaction
	 */
	function getTransaction()
	{
		return $this->_transaction;
	}

	/**
	 * @param Transaction $transaction
	 */
	function setTransaction($transaction)
	{
		$this->_transaction = $transaction;
	}

	/**
	 * @return Service[]
	 */
	function getServices()
	{
		return $this->_services;
	}

	/**
	 * @param Service[] $services
	 */
	function setServices($services)
	{
		$this->_services = $services;
	}

	/**
	 * Returns payment URL based on the test mode
	 *
	 * @param string $token
	 *
	 * @return string
	 */
	function getPaymentUrl($token)
	{
		$paymentUrl = $this->_config->isTestMode() ? self::TEST_PAYMENT_URL : self::PRODUCTION_PAYMENT_URL;
		return str_replace("{{TOKEN}}", $token, $paymentUrl);
	}

	/**
	 * Makes createToken request
	 * The XML response will convert to PHP array
	 *
	 * @return mixed
	 */
	function execute()
	{
		if(!$this->getTransaction()) {
			exit("A Transaction must be set.");
		}

		if(!$this->getServices() || count($this->getServices()) <= 0) {
			exit("At least a Service must be set.");
		}

		$xml = "";

		$xml .= '<?xml version="1.0" encoding="utf-8"?>';
		$xml .= "<API3G>";
		$xml .= "<CompanyToken>{$this->_config->getCompanyToken()}</CompanyToken>";
		$xml .= $this->getTransaction()->create();
		$xml .= "<Request>createToken</Request>";
		$xml .= "<Services>";
		foreach($this->getServices() as $service) {
			$xml .= $service->create();
		}
		$xml .= "</Services>";
		$xml .= "</API3G>";

		return $this->_client->post("/v6/", $xml); // Do not delete the slash of the end
	}
}