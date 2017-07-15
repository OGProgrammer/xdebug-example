<?php
// Checkout https://xdebug.org/docs/stack_trace for configuring this
ini_set('xdebug.collect_params', '4');

// super global dump
ini_set('xdebug.collect_vars', 'on');
ini_set('xdebug.collect_params', '4');
ini_set('xdebug.dump_globals', 'on');
ini_set('xdebug.dump.SERVER', 'REQUEST_URI');

// show local vars
ini_set('xdebug.show_local_vars', 'on');

function someFunc($var) {
    thatFunc($var);
}
function thatFunc($var) {
    otherFunc([$var, $var]);
}
function otherFunc($var) {
    daftFunc($var, 0);
}
function daftFunc(array $var, $divNum) {
    // Bad code below
    $res = ($var[0] / $divNum);
    return $res;
}

someFunc('asdf');

// Fatal this script for fun
$errorMsg = 'Fatal error';
trigger_error($errorMsg, E_USER_ERROR);