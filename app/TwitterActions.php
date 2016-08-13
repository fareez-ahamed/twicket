<?php

namespace App;

use App\Mention;
use App\Twitter;
/**
* 	
*/
class TwitterActions
{
	private $t;
	
	function __construct()
	{
		$this->t = new Twitter();
	}

	public function updateMentions()
	{
		$arr = [];
		
		if(Mention::all()->count() == 0)
			$arr = $this->t->getMentions();
		else
			$arr = $this->t->getMentions(
					Mention::orderBy('tweet_id','desc')
							->first(["tweet_id"])
							->tweet_id
							);

		echo "Number of new tweets:".count($arr)."\n";

		foreach ($arr as $tweet) {

			$c = Customer::firstOrNew(['twitter_uid' => $tweet->user->id_str]);

			$user = $tweet->user;

			$big_url = str_replace("normal", "bigger", $user->profile_image_url);

			$c->fill([
				"name" => $user->name,
				"twitter_id" => $user->screen_name,
				"location" => $user->location,
				"image_url" => $big_url,
				"followers" => $user->followers_count
				]);

			$c->save();

			$c->mentions()->create([
					"tweet_id" => $tweet->id_str,
					"text" => $tweet->text,
					"status" => "new",
					"retweets" => $tweet->retweet_count
					// "favs" => $tweet->favorites_count
				]);

		}
	}
}