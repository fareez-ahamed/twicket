<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

/**
*
*/
class Twitter
{
	private $client;

	function __construct()
	{
		$stack = HandlerStack::create();

		$middleware = new Oauth1([
			'consumer_key'    => '',
			'consumer_secret' => '',
			'token'           => '',
			'token_secret'    => ''
			]);

		$stack->push($middleware);

		$this->client = new Client([
			'base_uri' => 'https://api.twitter.com/1.1/',
			'handler' => $stack,
			"verify" => base_path('resources/assets/cacert.pem'),
			"auth" => "oauth"
			]);
	}

	public function getMentions($since = null)
	{
		$res = null;
		if(is_null($since))
			$res = $this->client->get('statuses/mentions_timeline.json');
		else
			$res = $this->client->get('statuses/mentions_timeline.json', [
				"query" => [
					"since_id" => $since
				]
				]);
		return json_decode(	$res->getBody() );
	}

	public function reply($tweet_id, $message)
	{
		$res = $this->client->post('statuses/update.json',[
				"query" => [
					"in_reply_to_status_id" => $tweet_id,
					"status" => $message
					]
				]);
	}


}
