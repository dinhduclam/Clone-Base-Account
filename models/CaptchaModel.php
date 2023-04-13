<?php

class CaptchaModel
{
	public static function confirmCaptcha($recaptcha_response)
	{
		$recaptcha_secret = Application::$app->env['CAPTCHA_SECRET'];
		$remote_ip = $_SERVER['SERVER_NAME'];

		$url = Application::$app->env['RECAPTCHA_URL'];
		$data = array(
			'secret' => $recaptcha_secret,
			'response' => $recaptcha_response,
			'remoteip' => $remote_ip
		);

		$options = array(
			'http' => array (
				'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
				'method' => 'POST',
				'content' => http_build_query($data)
			)
		);

		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		$response = json_decode($result, true);

		return $response['success'] ?? false;
	}
}