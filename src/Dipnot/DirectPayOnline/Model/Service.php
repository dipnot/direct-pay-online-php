<?php
namespace Dipnot\DirectPayOnline\Model;

/**
 * Class Service
 * @package Dipnot\DirectPayOnline\Model
 *
 * @see     https://directpayonline.atlassian.net/wiki/spaces/API/pages/36110341/createToken+V6
 */
class Service
{
	private $_serviceDescription;
	private $_serviceType;
	private $_serviceDate;
	private $_serviceFrom = "";
	private $_serviceTo = "";
	private $_serviceRef = "";

	/**
	 * Service constructor
	 *
	 * @param string $serviceDescription
	 * @param string $serviceType
	 * @param string $serviceDate
	 */
	function __construct($serviceDescription, $serviceType, $serviceDate)
	{
		$this->_serviceDescription = $serviceDescription;
		$this->_serviceType = $serviceType;
		$this->_serviceDate = $serviceDate;
	}

	/**
	 * @return string
	 */
	function getServiceFrom()
	{
		return $this->_serviceFrom;
	}

	/**
	 * @param string $serviceFrom
	 */
	function setServiceFrom($serviceFrom)
	{
		$this->_serviceFrom = $serviceFrom;
	}

	/**
	 * @return string
	 */
	function getServiceTo()
	{
		return $this->_serviceTo;
	}

	/**
	 * @param string $serviceTo
	 */
	function setServiceTo($serviceTo)
	{
		$this->_serviceTo = $serviceTo;
	}

	/**
	 * @return string
	 */
	function getServiceRef()
	{
		return $this->_serviceRef;
	}

	/**
	 * @param string $serviceRef
	 */
	function setServiceRef($serviceRef)
	{
		$this->_serviceRef = $serviceRef;
	}

	/**
	 * @return string
	 */
	function create()
	{
		$xml = "";

		$xml .= $this->createXmlLine("ServiceDescription", $this->_serviceDescription);
		$xml .= $this->createXmlLine("ServiceType", $this->_serviceType);
		$xml .= $this->createXmlLine("ServiceDate", $this->_serviceDate);
		$xml .= $this->createXmlLine("ServiceFrom", $this->_serviceFrom);
		$xml .= $this->createXmlLine("ServiceTo", $this->_serviceTo);
		$xml .= $this->createXmlLine("ServiceRef", $this->_serviceRef);

		return "<Service>{$xml}</Service>";
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