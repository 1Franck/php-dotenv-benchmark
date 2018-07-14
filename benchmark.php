<?php

require 'vendor/autoload.php';

$envPath = __DIR__ . '/env';
$envFile = 'default-env';
$maxIteration = 10000;

/**
 * Dotenv\Dotenv
 */
$start = time();
for ($i = 0;$i < $maxIteration; ++$i) {
    $dotenv = new Dotenv\Dotenv($envPath, $envFile);
    $dotenv->load();
}
$end = time() - $start;

echo 'DotEnv\DotEnv > '.$maxIteration.' iterations'."\n";
echo ' total time: '.($end).' secs - average: '.(($end/$maxIteration)*1000).' ms/iteration'."\n";

/**
 * Symfony\Dotenv
 */
$start = time();
for ($i = 0;$i < $maxIteration; ++$i) {
    $dotenv = new Symfony\Component\Dotenv\Dotenv();
    $dotenv->load($envPath.'/'.$envFile);
}
$end = time() - $start;

echo 'Symfony\Dotenv > '.$maxIteration.' iterations'."\n";
echo ' total time: '.($end).' secs - average: '.(($end/$maxIteration)*1000).' ms/iteration'."\n";

/**
 * josegonzalez\Dotenv
 */
$start = time();
for ($i = 0;$i < $maxIteration; ++$i) {
    (new josegonzalez\Dotenv\Loader($envPath.'/'.$envFile))
        ->parse()
        ->toServer(true)
        ->putenv(true)
        ->toEnv(true);
}
$end = time() - $start;

echo 'josegonzalez\Dotenv > '.$maxIteration.' iterations'."\n";
echo ' total time: '.($end).' secs - average: '.(($end/$maxIteration)*1000).' ms/iteration'."\n";