<?php

@define("SHOW_MATCHED_PATTERN", $_GET["show_matched_patterns"]);

$pattern = "/(http|ftp|www)?[^\s]+\.\w+\/?/";
$wordsToMatch = array(
		"http://www.google.com",
		"http://sub.domain.google.com",
		"www.google.com",
		"www.google.com.br",
		"www.google.js",
		"http://google.com",
		"www [dot] google [dot] com",
		"www[dot]google[dot]com",
		"google.com",

		"Some words before http://www.google.com",
		"Some words before http://sub.domain.google.com",
		"Some words before www.google.com",
		"Some words before www.google.com.br",
		"Some words before www.google.js",
		"Some words before http://google.com",
		"Some words before www [dot] google [dot] com",
		"Some words before www[dot]google[dot]com",
		"Some words before google.com",

		"http://www.google.com some words after",
		"http://sub.domain.google.com some words after",
		"www.google.com some words after",
		"www.google.com.br some words after",
		"www.google.js some words after",
		"http://google.com some words after",
		"www [dot] google [dot] com some words after",
		"www[dot]google[dot]com some words after",
		"google.com some words after",

		"Some words around http://www.google.com the url string",
		"Some words around http://sub.domain.google.com the url string",
		"Some words around www.google.com the url string",
		"Some words around www.google.com.br the url string",
		"Some words around www.google.js the url string",
		"Some words around http://google.com the url string",
		"Some words around www [dot] google [dot] com the url string",
		"Some words around www[dot]google[dot]com the url string",
		"Some words around google.com the url string"
	);

$totalSubjects = count($wordsToMatch);
$totalFails = 0;
$failedMatches = array();
$match;

if (!SHOW_MATCHED_PATTERN)
	echo "<a href='?show_matched_patterns=1'><button>Show matched patterns</button></a>";
else
	echo "<a href='?'><button>Hide matched patterns</button></a>";

foreach ($wordsToMatch as $url) {

	if (!preg_match($pattern, $url, $match)) {
		array_push($failedMatches, $url);
		$totalFails++;
	} else {
		if (SHOW_MATCHED_PATTERN) {
			$matchedPattern = preg_replace("/\//", "\/", $match[0]);
			$matchedPattern = preg_replace("/\^/", "\^", $matchedPattern);
			$matchedPattern = preg_replace("/\?/", "\?", $matchedPattern);
			$matchedPattern = preg_replace("/\+/", "\+", $matchedPattern);
			$matchedPattern = preg_replace("/\[/", "\[", $matchedPattern);
			$matchedPattern = preg_replace("/\]/", "\]", $matchedPattern);
			$matchedPattern = preg_replace("/\{/", "\{", $matchedPattern);
			$matchedPattern = preg_replace("/\}/", "\}", $matchedPattern);
			echo "<p>", preg_replace("/".$matchedPattern."/", "<b style='color: #c00'>{$match[0]}</b>", $url), "</p>";
		}
	}
}

if ($totalFails > 0)
	echo "<h1 style='background: #c55; color: #fff; border: 2px solid #a00; padding: 10px;'>Failed to match {$totalFails}/{$totalSubjects} subjects</h1>";
else
	echo "<h1 style='background: #5c5; color: #fff; border: 2px solid #0a0; padding: 10px;'>Success! No failed matches</h1>";

foreach ($failedMatches as $subject) {
	echo "<p>Failed to match <b>{$subject}</b></p>";
}
