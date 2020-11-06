<?php
namespace Dipnot;

/**
 * Class Transaction
 * @package Dipnot
 *
 * @see     https://directpayonline.atlassian.net/wiki/spaces/API/pages/36110341/createToken+V6
 */
class Transaction
{
	private $_allowedPaymentCurrencies = ["USD", "KES", "EUR", "GBP", "TZS", "ZMW", "UGX", "RWF"];
	private $_allowedDefaultPayment = ["CC", "MO", "PP", "BT", "XP"];

	private $_paymentAmount;
	private $_paymentCurrency;
	private $_companyRef = "";
	private $_redirectURL = "";
	private $_backURL = "";
	private $_declinedURL = "";
	private $_companyRefUnique = "";
	private $_pTL = "";
	private $_pTLType = "";
	private $_transactionChargeType = "";
	private $_transactionAutoChargeDate = "";
	private $_customerEmail = "";
	private $_customerFirstName = "";
	private $_customerLastName = "";
	private $_customerAddress = "";
	private $_customerCity = "";
	private $_customerCountry = "";
	private $_customerDialCode = "";
	private $_customerPhone = "";
	private $_customerZip = "";
	private $_demandPaymentbyTraveler = "";
	private $_emailTransaction = "";
	private $_companyAccRef = "";
	private $_userToken = "";
	private $_defaultPayment = "";
	private $_defaultPaymentCountry = "";
	private $_defaultPaymentMNO = "";
	private $_transactionToPrep = "";
	private $_allowRecurrent = "";
	private $_fraudTimeLimit = "";
	private $_voidable = "";
	private $_chargeType = "";
	private $_transMarketplace = "";
	private $_transBlockCountries = "";
	private $_smsTransaction = "";
	private $_transactionType = "";
	private $_deviceId = "";
	private $_deviceCountry = "";

	/**
	 * Transaction constructor
	 *
	 * @param number $paymentAmount
	 * @param float  $paymentCurrency
	 */
	function __construct($paymentAmount, $paymentCurrency)
	{
		if(!is_numeric($paymentAmount)) {
			exit("The \$paymentAmount must be numeric.");
		}

		if(!in_array($paymentCurrency, $this->_allowedPaymentCurrencies)) {
			exit("The \$paymentCurrency is not allowed.");
		}

		$this->_paymentAmount = $paymentAmount;
		$this->_paymentCurrency = $paymentCurrency;
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
	function getRedirectURL()
	{
		return $this->_redirectURL;
	}

	/**
	 * @param string $redirectURL
	 */
	function setRedirectURL($redirectURL)
	{
		$this->_redirectURL = $redirectURL;
	}

	/**
	 * @return string
	 */
	function getBackURL()
	{
		return $this->_backURL;
	}

	/**
	 * @param string $backURL
	 */
	function setBackURL($backURL)
	{
		$this->_backURL = $backURL;
	}

	/**
	 * @return string
	 */
	function getDeclinedURL()
	{
		return $this->_declinedURL;
	}

	/**
	 * @param string $declinedURL
	 */
	function setDeclinedURL($declinedURL)
	{
		$this->_declinedURL = $declinedURL;
	}

	/**
	 * @return string
	 */
	function getCompanyRefUnique()
	{
		return $this->_companyRefUnique;
	}

	/**
	 * @param boolean $companyRefUnique
	 */
	function setCompanyRefUnique($companyRefUnique)
	{
		if(!is_bool($companyRefUnique)) {
			exit("The \$companyRefUnique must be boolean.");
		}

		$this->_companyRefUnique = $companyRefUnique;
	}

	/**
	 * @return string
	 */
	function getPTL()
	{
		return $this->_pTL;
	}

	/**
	 * @param string $pTL
	 */
	function setPTL($pTL)
	{
		$this->_pTL = $pTL;
	}

	/**
	 * @return string
	 */
	function getPTLType()
	{
		return $this->_pTLType;
	}

	/**
	 * @param string $pTLType
	 */
	function setPTLType($pTLType)
	{
		if($pTLType !== "hours" || $pTLType !== "minutes") {
			exit("The \$pTLType must be \"hours\" or \"minutes\".");
		}

		$this->_pTLType = $pTLType;
	}

	/**
	 * @return string
	 */
	function getTransactionChargeType()
	{
		return $this->_transactionChargeType;
	}

	/**
	 * @param int $transactionChargeType
	 */
	function setTransactionChargeType($transactionChargeType)
	{
		if($transactionChargeType <= 0 || $transactionChargeType >= 4) {
			exit("The \$transactionChargeType must be bigger than 0 and lower than 4.");
		}

		$this->_transactionChargeType = $transactionChargeType;
	}

	/**
	 * @return string
	 */
	function getTransactionAutoChargeDate()
	{
		return $this->_transactionAutoChargeDate;
	}

	/**
	 * @param string $transactionAutoChargeDate
	 */
	function setTransactionAutoChargeDate($transactionAutoChargeDate)
	{
		$this->_transactionAutoChargeDate = $transactionAutoChargeDate;
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
	 * @return string
	 */
	function getCustomerFirstName()
	{
		return $this->_customerFirstName;
	}

	/**
	 * @param string $customerFirstName
	 */
	function setCustomerFirstName($customerFirstName)
	{
		$this->_customerFirstName = $customerFirstName;
	}

	/**
	 * @return string
	 */
	function getCustomerLastName()
	{
		return $this->_customerLastName;
	}

	/**
	 * @param string $customerLastName
	 */
	function setCustomerLastName($customerLastName)
	{
		$this->_customerLastName = $customerLastName;
	}

	/**
	 * @return string
	 */
	function getCustomerAddress()
	{
		return $this->_customerAddress;
	}

	/**
	 * @param string $customerAddress
	 */
	function setCustomerAddress($customerAddress)
	{
		$this->_customerAddress = $customerAddress;
	}

	/**
	 * @return string
	 */
	function getCustomerCity()
	{
		return $this->_customerCity;
	}

	/**
	 * @param string $customerCity
	 */
	function setCustomerCity($customerCity)
	{
		$this->_customerCity = $customerCity;
	}

	/**
	 * @return string
	 */
	function getCustomerCountry()
	{
		return $this->_customerCountry;
	}

	/**
	 * @see https://en.wikipedia.org/wiki/ISO_3166-1
	 *
	 * @param string $customerCountry
	 */
	function setCustomerCountry($customerCountry)
	{
		$this->_customerCountry = $customerCountry;
	}

	/**
	 * @return string
	 */
	function getCustomerDialCode()
	{
		return $this->_customerDialCode;
	}

	/**
	 * @see https://en.wikipedia.org/wiki/ISO_3166-1
	 *
	 * @param string $customerDialCode
	 */
	function setCustomerDialCode($customerDialCode)
	{
		$this->_customerDialCode = $customerDialCode;
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
	function getCustomerZip()
	{
		return $this->_customerZip;
	}

	/**
	 * @param string $customerZip
	 */
	function setCustomerZip($customerZip)
	{
		$this->_customerZip = $customerZip;
	}

	/**
	 * @return string
	 */
	function getDemandPaymentbyTraveler()
	{
		return $this->_demandPaymentbyTraveler;
	}

	/**
	 * @param boolean $demandPaymentbyTraveler
	 */
	function setDemandPaymentbyTraveler($demandPaymentbyTraveler)
	{
		if(!is_bool($demandPaymentbyTraveler)) {
			exit("The \$demandPaymentbyTraveler must be boolean.");
		}

		$this->_demandPaymentbyTraveler = $demandPaymentbyTraveler;
	}

	/**
	 * @return string
	 */
	function getEmailTransaction()
	{
		return $this->_emailTransaction;
	}

	/**
	 * @param boolean $emailTransaction
	 */
	function setEmailTransaction($emailTransaction)
	{
		if(!is_bool($emailTransaction)) {
			exit("The \$emailTransaction must be boolean.");
		}

		$this->_emailTransaction = $emailTransaction;
	}

	/**
	 * @return string
	 */
	function getCompanyAccRef()
	{
		return $this->_companyAccRef;
	}

	/**
	 * @param string $companyAccRef
	 */
	function setCompanyAccRef($companyAccRef)
	{
		$this->_companyAccRef = $companyAccRef;
	}

	/**
	 * @return string
	 */
	function getUserToken()
	{
		return $this->_userToken;
	}

	/**
	 * @param string $userToken
	 */
	function setUserToken($userToken)
	{
		$this->_userToken = $userToken;
	}

	/**
	 * @return string
	 */
	function getDefaultPayment()
	{
		return $this->_defaultPayment;
	}

	/**
	 * @param string $defaultPayment
	 */
	function setDefaultPayment($defaultPayment)
	{
		if(!in_array($defaultPayment, $this->_allowedDefaultPayment)) {
			exit("The \$defaultPayment is not allowed.");
		}

		$this->_defaultPayment = $defaultPayment;
	}

	/**
	 * @return string
	 */
	function getDefaultPaymentCountry()
	{
		return $this->_defaultPaymentCountry;
	}

	/**
	 * @param string $defaultPaymentCountry
	 */
	function setDefaultPaymentCountry($defaultPaymentCountry)
	{
		$this->_defaultPaymentCountry = $defaultPaymentCountry;
	}

	/**
	 * @return string
	 */
	function getDefaultPaymentMNO()
	{
		return $this->_defaultPaymentMNO;
	}

	/**
	 * @param string $defaultPaymentMNO
	 */
	function setDefaultPaymentMNO($defaultPaymentMNO)
	{
		$this->_defaultPaymentMNO = $defaultPaymentMNO;
	}

	/**
	 * @return string
	 */
	function getTransactionToPrep()
	{
		return $this->_transactionToPrep;
	}

	/**
	 * @param boolean $transactionToPrep
	 */
	function setTransactionToPrep($transactionToPrep)
	{
		if(!is_bool($transactionToPrep)) {
			exit("The \$transactionToPrep must be boolean.");
		}

		$this->_transactionToPrep = $transactionToPrep;
	}

	/**
	 * @return string
	 */
	function getAllowRecurrent()
	{
		return $this->_allowRecurrent;
	}

	/**
	 * @param boolean $allowRecurrent
	 */
	function setAllowRecurrent($allowRecurrent)
	{
		if(!is_bool($allowRecurrent)) {
			exit("The \$allowRecurrent must be boolean.");
		}

		$this->_allowRecurrent = $allowRecurrent;
	}

	/**
	 * @return string
	 */
	function getFraudTimeLimit()
	{
		return $this->_fraudTimeLimit;
	}

	/**
	 * @param string $fraudTimeLimit
	 */
	function setFraudTimeLimit($fraudTimeLimit)
	{
		$this->_fraudTimeLimit = $fraudTimeLimit;
	}

	/**
	 * @return string
	 */
	function getVoidable()
	{
		return $this->_voidable;
	}

	/**
	 * @param boolean $voidable
	 */
	function setVoidable($voidable)
	{
		if(!is_bool($voidable)) {
			exit("The \$voidable must be boolean.");
		}

		$this->_voidable = $voidable;
	}

	/**
	 * @return string
	 */
	function getChargeType()
	{
		return $this->_chargeType;
	}

	/**
	 * @param string $chargeType
	 */
	function setChargeType($chargeType)
	{
		$this->_chargeType = $chargeType;
	}

	/**
	 * @return string
	 */
	function getTransMarketplace()
	{
		return $this->_transMarketplace;
	}

	/**
	 * @param number $transMarketplace
	 */
	function setTransMarketplace($transMarketplace)
	{
		$this->_transMarketplace = $transMarketplace;
	}

	/**
	 * @return string
	 */
	function getTransBlockCountries()
	{
		return $this->_transBlockCountries;
	}

	/**
	 * @param boolean $transBlockCountries
	 */
	function setTransBlockCountries($transBlockCountries)
	{
		if(!is_bool($transBlockCountries)) {
			exit("The \$transBlockCountries must be boolean.");
		}

		$this->_transBlockCountries = $transBlockCountries;
	}

	/**
	 * @return string
	 */
	function getSmsTransaction()
	{
		return $this->_smsTransaction;
	}

	/**
	 * @param boolean $smsTransaction
	 */
	function setSmsTransaction($smsTransaction)
	{
		if(!is_bool($smsTransaction)) {
			exit("The \$smsTransaction must be boolean.");
		}

		$this->_smsTransaction = $smsTransaction;
	}

	/**
	 * @return string
	 */
	function getTransactionType()
	{
		return $this->_transactionType;
	}

	/**
	 * @param string $transactionType
	 */
	function setTransactionType($transactionType)
	{
		$this->_transactionType = $transactionType;
	}

	/**
	 * @return string
	 */
	function getDeviceId()
	{
		return $this->_deviceId;
	}

	/**
	 * @param string $deviceId
	 */
	function setDeviceId($deviceId)
	{
		$this->_deviceId = $deviceId;
	}

	/**
	 * @return string
	 */
	function getDeviceCountry()
	{
		return $this->_deviceCountry;
	}

	/**
	 * @param string $deviceCountry
	 */
	function setDeviceCountry($deviceCountry)
	{
		$this->_deviceCountry = $deviceCountry;
	}

	/**
	 * @return string
	 */
	function create()
	{
		$xml = "";

		$xml .= $this->createXmlLine("PaymentAmount", $this->_paymentAmount);
		$xml .= $this->createXmlLine("PaymentCurrency", $this->_paymentCurrency);
		$xml .= $this->createXmlLine("CompanyRef", $this->_companyRef);
		$xml .= $this->createXmlLine("RedirectURL", $this->_redirectURL);
		$xml .= $this->createXmlLine("BackURL", $this->_backURL);
		$xml .= $this->createXmlLine("DeclinedURL", $this->_declinedURL);
		$xml .= $this->createXmlLine("CompanyRefUnique", $this->_companyRefUnique);
		$xml .= $this->createXmlLine("PTL", $this->_pTL);
		$xml .= $this->createXmlLine("PTLtype", $this->_pTLType);
		$xml .= $this->createXmlLine("TransactionChargeType", $this->_transactionChargeType);
		$xml .= $this->createXmlLine("TransactionAutoChargeDate", $this->_transactionAutoChargeDate);
		$xml .= $this->createXmlLine("customerEmail", $this->_customerEmail);
		$xml .= $this->createXmlLine("customerFirstName", $this->_customerFirstName);
		$xml .= $this->createXmlLine("customerLastName", $this->_customerLastName);
		$xml .= $this->createXmlLine("customerAddress", $this->_customerAddress);
		$xml .= $this->createXmlLine("customerCity", $this->_customerCity);
		$xml .= $this->createXmlLine("customerCountry", $this->_customerCountry);
		$xml .= $this->createXmlLine("customerDialCode", $this->_customerDialCode);
		$xml .= $this->createXmlLine("customerPhone", $this->_customerPhone);
		$xml .= $this->createXmlLine("customerZip", $this->_customerZip);
		$xml .= $this->createXmlLine("DemandPaymentbyTraveler", $this->_demandPaymentbyTraveler);
		$xml .= $this->createXmlLine("EmailTransaction", $this->_emailTransaction);
		$xml .= $this->createXmlLine("CompanyAccRef", $this->_companyAccRef);
		$xml .= $this->createXmlLine("userToken", $this->_userToken);
		$xml .= $this->createXmlLine("DefaultPayment", $this->_defaultPayment);
		$xml .= $this->createXmlLine("DefaultPaymentCountry", $this->_defaultPaymentCountry);
		$xml .= $this->createXmlLine("DefaultPaymentMNO", $this->_defaultPaymentMNO);
		$xml .= $this->createXmlLine("TransactionToPrep", $this->_transactionToPrep);
		$xml .= $this->createXmlLine("AllowRecurrent", $this->_allowRecurrent);
		$xml .= $this->createXmlLine("FraudTimeLimit", $this->_fraudTimeLimit);
		$xml .= $this->createXmlLine("Voidable", $this->_voidable);
		$xml .= $this->createXmlLine("ChargeType", $this->_chargeType);
		$xml .= $this->createXmlLine("TRANSmarketplace", $this->_transMarketplace);
		$xml .= $this->createXmlLine("TRANSblockCountries", $this->_transBlockCountries);
		$xml .= $this->createXmlLine("SMSTransaction", $this->_smsTransaction);
		$xml .= $this->createXmlLine("TransactionType", $this->_transactionType);
		$xml .= $this->createXmlLine("DeviceId", $this->_deviceId);
		$xml .= $this->createXmlLine("DeviceCountry", $this->_deviceCountry);

		return "<Transaction>{$xml}</Transaction>";
	}

	/**
	 * @param string $tag
	 * @param mixed  $value
	 *
	 * @return string
	 */
	private function createXmlLine($tag, $value)
	{
		return $value ? "<{$tag}>{$value}</{$tag}>" : "";
	}
}