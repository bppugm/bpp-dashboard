<?php

namespace App\Repositories;

use App\Achievement;
use App\Clients\ClientInterface;

/**
 * ScheduledUpdatesRepository
 */
class ScheduledUpdatesRepository
{
	public function fetchFromClient(Achievement $achievement, ClientInterface $client)
	{
		$achievement->update(['value' => $client->fetchData()]);

		return $achievement;
	}

	public function update()
	{
		$achievements = Achievement::where('automated', true)->get();

		foreach ($achievements as $key => $achievement) {
			$client = resolve($this->getClientClass($achievement->name));
			$response[$key] = $this->fetchFromClient($achievement, $client);
		}

		return collect($response);
	}

	public function toCamelCase($string)
	{
		$string = ucwords(str_replace('_', ' ', $string));
		$string = str_replace(' ', '', $string);
		return $string;
	}

	public function getClientClass($name)
	{
		$class = $this->toCamelCase($name)."Client";

		return "App\Clients\\$class";
	}
}