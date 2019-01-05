<?php
namespace App\Services;

class Twitter{
	protected $apiKey;

	public function __construct($givenKey){
		$this->apiKey = $givenKey;
	}
}