<?php
namespace app\core;

class ExternalData{
	
	static function get($url, $method = 'GET', $data = [], $followLocation = true)
	{
		//cURL is much better than file_get_contents
		$curl = curl_init();

		$cookieFile = "curl_cookies.txt";
		if(substr(PHP_OS,0,3) == 'WIN'){
			$cookieFile = str_replace('\\','/',getcwd().'/'.$cookieFile);
		}

		$options = array(
			CURLOPT_URL => $url, // this is the URL of the endpoint to request from
			CURLOPT_RETURNTRANSFER => true, //this forces output as a string to a variable
			CURLOPT_TIMEOUT => 30, //set the maximum time for the request before exiting
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, //1.1 is supported currently
			CURLOPT_FOLLOWLOCATION => $followLocation, //redirect the request as instructed in response headers
			CURLOPT_CUSTOMREQUEST => $method, //$method can be GET, POST, DELETE, PUT
			CURLOPT_POSTFIELDS => $data, //data to submit
			CURLOPT_COOKIEJAR => $cookieFile,
			CURLOPT_COOKIEFILE => $cookieFile,
			CURLOPT_HEADER => false, //set to true to see the response headers (multiple if redirected)
			CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache" //request uncached/fresh responses
			)
		);

		curl_setopt_array($curl, $options);

		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
	}
}