<?php

require_once 'vendor/autoload.php';

$casters = [
    "WingnutSC",
    "Jackson"
];

$tournament = [
    "Showmatches"
];

$urlArg = $argv[1];

$titleArg = $argv[2];
$teamsArg = $argv[3];
$dateArg = isset($argv[4]) ? $argv[4] : (new DateTime('now'))->format('Y-m-d');

$teams = explode(",", $teamsArg);


$url = \League\Url\Url::createFromUrl($urlArg);

$videoID = $url->getQuery()['v'];
$playlist = $url->getQuery()['list'];

$config = [
    'title' => $titleArg,
    'casters' => $casters,
    'teams' => $teams,
    'tournaments' => $tournament,
    'video' => $videoID . "?list=" . $playlist
];

$filename = $dateArg . "-" . implode("-", explode(" ", clean($titleArg))) . ".md";
$document = new \VKBansal\FrontMatter\Document(implode(" vs. ", $teams), $config);

file_put_contents("source/_vods/{$filename}", \VKBansal\FrontMatter\Parser::dump($document));
echo "Created file {$filename}!\n";


function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
