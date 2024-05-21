<?php

require_once('vendor/autoload.php');

use Arca\SkillRatingSystem\Elo\Elo;
use Arca\SkillRatingSystem\Elo\EloSettings;
use Arca\SkillRatingSystem\Elo\EloMatchOutcome;

$settings = new EloSettings(minimumAllowedElo: 100.0);
$elo = new Elo($settings);

$a = 1000;
$b = 1000;

dump($elo->oneToOne($a, $b, EloMatchOutcome::DRAW));