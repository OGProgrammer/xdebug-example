<?php
// Just some useless code to show the call stack in xdebug

function thisFunction($aDiffVar) {

    $var = 'something else';
    //Step 2 : note that $var is a diff $var, watch out for where you are in the call stack when using watchers
    return true;
}

function thatFunction($var = null) {
    // Step 1: setup watcher on $var
    if ($var) {
        $var = "Computer Chips";
    }
    // Step into this function call
    thisFunction($var);
    return false;
}