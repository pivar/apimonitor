<?php

namespace App\Util;

class HelpMonitor {

	/**
	 * Return Public API fetch Status via CURL internally
	 *
	 * @return array|bool
	 */
	public final static function fetchmonitors()
	{
		// TODO OauthToken based API + DataBase entry for additional API monitoring
		// make this DB based dynamic so that it can fetch from DB
		// API basePATH, endpoints & it can fetch them accordingly
		// for the moment its configurable here in array method
		// *****************
		// To add more please add following
		// add comma  and append additional API like below example
		//	array('path' =>'http://YOURAPIPATHHERE/',
		//	'endpoints' => array('ENDPOINT-1','ENDPOINT-2'))

		$baseApi =array(
									array('path' =>'http://jsonplaceholder.typicode.com/',
										'endpoints' => array('posts/1','users/3')),
									array('path' =>'http://api.postcodes.io/postcodes/',
										'endpoints' => array('OX49 5NU','46129'))
								);
		try {
			$apiResponse_arr; //can be used for some more data display
			for($j=0; $j<count($baseApi); $j++){
				for($i=0; $i<count($baseApi[$j]); $i++){
						$posts = self::get($baseApi[$j]['path'], $baseApi[$j]['endpoints'][$i]);
							if ($posts) {
				 				$apiResponse_arr[]=$posts;
							}
						}
				}
			// We have response from API pass it for rendering via React
			return $apiResponse_arr;
		}
		catch (\Exception $e) {
		}

		return false;
	}

	/**
	 * Query a API endpoints using GET for status code
	 * TODO : similarly for POST, CURL function can be modified
	 *
	 * @param string $endpoint
	 * @return mixed
	 */
	protected final static function get($baseApi, $endpoint)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $baseApi.$endpoint);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, true);
		// We don't need body actually we need only status code
		curl_setopt($ch, CURLOPT_NOBODY, true);
		$output = curl_exec($ch);
		// parse the status code received from header
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		curl_close($ch);
		if ($httpcode == 200 || $httpcode == 201) {
			// if status is 200/201 assuming all great
			// else make it as some issues with KO
			$infoGroup=array('api' =>$baseApi.$endpoint,'status' =>'OK');
		} else{
			$infoGroup=array('api' =>$baseApi.$endpoint,'status' =>'KO');
		}

		return $infoGroup;
	}

}
