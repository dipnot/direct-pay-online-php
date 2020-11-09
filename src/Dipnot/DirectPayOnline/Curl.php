<?php
namespace Dipnot\DirectPayOnline;

/**
 * Class Curl
 * @package Dipnot\DirectPayOnline
 */
class Curl
{
	/**
	 * Creates and executes cURL
	 *
	 * @param string $url
	 * @param array  $options
	 *
	 * @return bool|string
	 */
	function execute($url, $options)
	{
		$curl = curl_init($url);
		curl_setopt_array($curl, $options);
		return curl_exec($curl);
	}
}