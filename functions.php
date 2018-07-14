<?php

/**
 * @param null $substract
 * @return float
 */
function getMicrotime($substract = null) {
    $seconds = microtime(true);
    if ($substract) {
        return $seconds - $substract;
    }
    return $seconds;
}

/**
 * @param $name
 * @param $maxIteration
 * @param $time
 */
function outputResult($name, $maxIteration, $time) {
    $totalTime = round($time,4);
    $average = round($time / $maxIteration, 8) * 1000;
    echo $name. ' > '.number_format($maxIteration).' iterations'."\n";
    echo ' total time: '.$totalTime.' secs - average: '.$average.' ms/iteration'."\n";
}