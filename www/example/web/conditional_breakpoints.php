<?php

$greetingArray = ['H','e','l','l','o',' ','W','o','r','l','d'.'!'];

$greeting = null;

foreach ($greetingArray as $char) {
    // Setup a conditional breakpoint here
    // Right click on the breakpoint and checkbox condition and paste the following for an example condition
    // $greeting == "Hello"
    $greeting .= $char;
}

echo $greeting;