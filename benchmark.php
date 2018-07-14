<?php

require 'vendor/autoload.php';

$envPath = __DIR__ . '/env';
$envFile = 'default-env';
$maxIteration = 100000;

/**
 * vlucas/phpdotenv
 */
$start = getMicrotime();
for ($i = 0;$i < $maxIteration; ++$i) {
    $dotenv = new Dotenv\Dotenv($envPath, $envFile);
    $dotenv->load();
}
outputResult('vlucas/phpdotenv', $maxIteration, getMicrotime($start));

/**
 * symfony\dotenv
 */
$start = getMicrotime();
for ($i = 0;$i < $maxIteration; ++$i) {
    $dotenv = new Symfony\Component\Dotenv\Dotenv();
    $dotenv->load($envPath.'/'.$envFile);
}
outputResult('symfony/dotenv', $maxIteration, getMicrotime($start));

/**
 * josegonzalez\dotenv
 */
$start = getMicrotime();
for ($i = 0;$i < $maxIteration; ++$i) {
    (new josegonzalez\Dotenv\Loader($envPath.'/'.$envFile))
        ->parse()
        ->toServer(true)
        ->putenv(true)
        ->toEnv(true);
}
outputResult('josegonzalez/dotenv', $maxIteration, getMicrotime($start));

/**
 * zrcing/phpenv
 */
$start = getMicrotime();
for ($i = 0;$i < $maxIteration; ++$i) {
    \Phpenv\Env::load($envPath.'/'.$envFile);
}
outputResult('zrcing/phpenv', $maxIteration, getMicrotime($start));