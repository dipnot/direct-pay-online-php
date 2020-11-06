<?php
namespace Dipnot;

/**
 * Class HttpClient
 * @package Dipnot
 */
class HttpClient
{
	const METHOD_GET = "GET";
	const METHOD_POST = "POST";
	const METHOD_PUT = "PUT";
	const METHOD_DELETE = "DELETE";

	private $_baseUrl;
	private $_curl;

	/**
	 * HttpClient constructor
	 *
	 * @param string $baseUrl
	 */
	function __construct($baseUrl)
	{
		$this->_baseUrl = $baseUrl;
		$this->_curl = new Curl();
	}

	/**
	 * Makes HTTP GET request
	 *
	 * @param string $uri
	 * @param string $body
	 *
	 * @return mixed
	 */
	function get($uri, $body)
	{
		return $this->makeHttpRequest(self::METHOD_GET, $uri, $body);
	}

	/**
	 * Makes HTTP POST request
	 *
	 * @param string $uri
	 * @param string $body
	 *
	 * @return mixed
	 */
	function post($uri, $body)
	{
		return $this->makeHttpRequest(self::METHOD_POST, $uri, $body);
	}

	/**
	 * Makes HTTP DELETE request
	 *
	 * @param string $uri
	 * @param string $body
	 *
	 * @return mixed
	 */
	function delete($uri, $body)
	{
		return $this->makeHttpRequest(self::METHOD_DELETE, $uri, $body);
	}

	/**
	 * Makes HTTP PUT request
	 *
	 * @param string $uri
	 * @param string $body
	 *
	 * @return mixed
	 */
	function put($uri, $body)
	{
		return $this->makeHttpRequest(self::METHOD_PUT, $uri, $body);
	}

	/**
	 * Makes HTTP request
	 *
	 * @param string $method
	 * @param string $uri
	 * @param mixed  $body
	 *
	 * @return mixed
	 */
	private function makeHttpRequest($method, $uri, $body)
	{
		$response = $this->_curl->execute($this->_baseUrl . $uri, [
			CURLOPT_TIMEOUT => 0,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_CUSTOMREQUEST => $method,
			CURLOPT_POSTFIELDS => $body,
			CURLOPT_HTTPHEADER => [
				"Content-Type: application/xml"
			],
		]);

		return $this->parseResponse($response);
	}

	/**
	 * Parse XML response and convert into array
	 *
	 * @param mixed $response
	 *
	 * @return mixed
	 */
	private function parseResponse($response)
	{
		$parseXml = simplexml_load_string($response);
		return json_decode(json_encode((array)$parseXml), true);
	}
}