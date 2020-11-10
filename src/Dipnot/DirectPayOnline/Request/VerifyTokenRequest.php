<?php
namespace Dipnot\DirectPayOnline\Request;
use Dipnot\DirectPayOnline\Request;

/**
 * Class VerifyTokenRequest
 * @package Dipnot\DirectPayOnline\Request
 *
 * @see     https://directpayonline.atlassian.net/wiki/spaces/API/pages/32702465/verifyToken+V6
 */
class VerifyTokenRequest extends Request
{
	private $_transactionToken = "";
	private $_companyRef = "";
	private $_veirfyTransaction = ""; // Documentation has typo too
	private $_accRef = "";
	private $_customerPhone = "";
	private $_customerPhonePrefix = "";
	private $_customerEmail = "";

	/**
	 * @return string
	 */
	function getTransactionToken()
	{
		return $this->_transactionToken;
	}

	/**
	 * @param string $transactionToken
	 */
	function setTransactionToken($transactionToken)
	{
		$this->_transactionToken = $transactionToken;
	}

	/**
	 * @return string
	 */
	function getCompanyRef()
	{
		return $this->_companyRef;
	}

	/**
	 * @param string $companyRef
	 */
	function setCompanyRef($companyRef)
	{
		$this->_companyRef = $companyRef;
	}

	/**
	 * @return string
	 */
	function getVeirfyTransaction()
	{
		return $this->_veirfyTransaction;
	}

	/**
	 * @param string $veirfyTransaction
	 */
	function setVeirfyTransaction($veirfyTransaction)
	{
		$this->_veirfyTransaction = $veirfyTransaction;
	}

	/**
	 * @return string
	 */
	function getAccRef()
	{
		return $this->_accRef;
	}

	/**
	 * @param string $accRef
	 */
	function setAccRef($accRef)
	{
		$this->_accRef = $accRef;
	}

	/**
	 * @return string
	 */
	function getCustomerPhone()
	{
		return $this->_customerPhone;
	}

	/**
	 * @param string $customerPhone
	 */
	function setCustomerPhone($customerPhone)
	{
		$this->_customerPhone = $customerPhone;
	}

	/**
	 * @return string
	 */
	function getCustomerPhonePrefix()
	{
		return $this->_customerPhonePrefix;
	}

	/**
	 * @param string $customerPhonePrefix
	 */
	function setCustomerPhonePrefix($customerPhonePrefix)
	{
		$this->_customerPhonePrefix = $customerPhonePrefix;
	}

	/**
	 * @return string
	 */
	function getCustomerEmail()
	{
		return $this->_customerEmail;
	}

	/**
	 * @param string $customerEmail
	 */
	function setCustomerEmail($customerEmail)
	{
		$this->_customerEmail = $customerEmail;
	}

	/**
	 * Makes verifyToken request
	 * The XML response will convert to PHP array
	 *
	 * @return mixed
	 */
	function execute()
	{
		if(!$this->getTransactionToken() && !$this->getCompanyRef()) {
			exit("TransactionToken or CompanyRef must be set.");
		}

		$xml = "";

		$xml .= '<?xml version="1.0" encoding="utf-8"?>';
		$xml .= "<API3G>";
		$xml .= "<CompanyToken>{$this->_config->getCompanyToken()}</CompanyToken>";
		$xml .= "<Request>verifyToken</Request>";
		if($this->getTransactionToken()) {
			$xml .= "<TransactionToken>{$this->getTransactionToken()}</TransactionToken>";
		}
		if($this->getCompanyRef()) {
			$xml .= "<CompanyRef>{$this->getTransactionToken()}</CompanyRef>";
		}
		$xml .= "</API3G>";

		return $this->_client->post("/v6/", $xml); // Do not delete the slash of the end
	}
}