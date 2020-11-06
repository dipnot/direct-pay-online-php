<?php
namespace Dipnot;

/**
 * Class DirectPayOnline
 * @package Dipnot
 */
class DirectPayOnline
{
	const PRODUCTION_API_ENDPOINT = "https://secure.3gdirectpay.com/API";
	const PRODUCTION_PAYMENT_URL = "https://secure.3gdirectpay.com/payv2.php?ID={{TOKEN}}";

	const TEST_API_ENDPOINT = "https://secure1.sandbox.directpay.online/API";
	const TEST_PAYMENT_URL = "https://secure1.sandbox.directpay.online/payv2.php?ID={{TOKEN}}";

	private $_companyToken;
	private $_testMode;
	private $_client;

	/**
	 * DirectPayOnline constructor
	 *
	 * @param string  $companyToken
	 * @param boolean $testMode
	 */
	function __construct($companyToken, $testMode = false)
	{
		$this->_companyToken = $companyToken;
		$this->_testMode = $testMode;
		$this->_client = $this->createHttpClient();
	}

	/**
	 * Makes createToken request
	 *
	 * @param Transaction $transaction
	 * @param Service[]   $services
	 *
	 * @return mixed
	 */
	function createToken($transaction, $services)
	{
		$xml = "";

		$xml .= '<?xml version="1.0" encoding="utf-8"?>';
		$xml .= "<API3G>";
		$xml .= "<CompanyToken>{$this->_companyToken}</CompanyToken>";
		$xml .= $transaction->create();
		$xml .= "<Request>createToken</Request>";
		$xml .= "<Services>";
		foreach($services as $service) {
			$xml .= $service->create();
		}
		$xml .= "</Services>";
		$xml .= "</API3G>";

		return $this->_client->post("/v6/", $xml);
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
		$paymentUrl = $this->_testMode ? self::TEST_PAYMENT_URL : self::PRODUCTION_PAYMENT_URL;
		return str_replace("{{TOKEN}}", $token, $paymentUrl);
	}

	/**
	 * Creates HttpClient based on the test mode
	 *
	 * @return HttpClient
	 */
	private function createHttpClient()
	{
		return new HttpClient($this->_testMode ? self::TEST_API_ENDPOINT : self::PRODUCTION_API_ENDPOINT);
	}
}