<?php
function getArticles()
{
	$arr = [];
	for ($i=0; $i <= 5; $i++) { 
		$arr[] = [
			"title" => 'mytitle' .$i,
			'content' => 'my content' .$i,
		];
	}

	return $arr;
}