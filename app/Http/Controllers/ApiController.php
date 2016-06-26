<?php

namespace App\Http\Controllers;

use Cache;
use App\Util;

class ApiController {


	/**
	 * Return Help Monitors
	 *
	 * GET /api/getHelpMonitors
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function getHelpMonitors()
	{
		// Cache can be used for very heavy delayed api calls

		// if (Cache::has('helpmonitor_fetchposts')) {
		// 	return response()->json(Cache::get('helpmonitor_fetchposts'));
		// }

		$apimonitors = Util\HelpMonitor::fetchmonitors();
		// if ($userposts) {
		// 	Cache::put('helpmonitor_fetchposts', $userposts, 1);
		// }

		return response()->json($apimonitors);
	}



	/**
	 * If there is an authentication error end the response.
	 * Otherwise return the data.
	 *
	 * @param \App\Util\OauthTokenError|mixed $data
	 * @return mixed
	 */
	protected function handleAuthError($data)
	{
		if (is_a($data, 'App\Util\OauthTokenError')) {
			header('Content-Type: application/json');
			echo json_encode([
				'error' => [
					'type' => 'OauthTokenError',
					'data' => $data->getData(),
				],
			]);
			exit;
		}

		return $data;
	}

}
