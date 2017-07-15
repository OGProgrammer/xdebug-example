<?php
// Just some useless code to show the call stack in xdebug

function appendMessage($message) {
    // Take Note of the Call Stack at this point (left pane)
    $returnMessage = $message . ' Chips';
    //Step 2 : note that $var is a diff $var, watch out for where you are in the call stack when using watchers
    return $returnMessage;
}

function getMessage($message = null) {
    // Step 1: setup watcher on $var (Optionally show an "Expression" like substr($var, 4))
    if (!$message) {
        $message = "Computer";
    } else {
        $message = "Potato";
    }
    // Step into this function call
    $resultMessage = appendMessage($message);
    return $resultMessage;
}