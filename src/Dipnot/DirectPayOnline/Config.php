<?php
namespace Dipnot\DirectPayOnline;

/**
 * Class Config
 * @package Dipnot\DirectPayOnline
 */
class Config
{
	private $_companyToken;
	private $_testMode;

	/**
	 * @return string
	 */
	public function getCompanyToken()
	{
		return $this->_companyToken;
	}

	/**
	 * @param string $companyToken
	 */
	public function setCompanyToken($companyToken)
	{
		$this->_companyToken = $companyToken;
	}

	/**
	 * @return boolean
	 */
	public function isTestMode()
	{
		return $this->_testMode;
	}

	/**
	 * @param boolean $testMode
	 */
	public function setTestMode($testMode)
	{
		$this->_testMode = $testMode;
	}
}