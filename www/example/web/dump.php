<?php

// add the <pre> tag for better formatting
echo '<h1>Dump Examples</h1><p>(XDebug not required)</p><pre>';

echo '<h2>var_export($_SERVER);</h2>';
var_export($_SERVER);

echo '<h2>var_dump($_SERVER);</h2>';
var_dump($_SERVER);

echo '<h2>print_r($_SERVER);</h2>';
print_r($_SERVER);

echo '<h3>Other examples of dumping vars (not to screen)</h3>';
echo '<h2>error_log(print_r($_SERVER, true));</h2>';
error_log(print_r($_SERVER, true));
echo '<i>Check out your logs for the var dump</i>';

echo '<h2>mail("mail@localhost", "Stuffs on fire yo", print_r($_SERVER, true));</h2>';
mail("mail@localhost", "Stuffs on fire yo", print_r($_SERVER, true));
echo '<i>Send an email with the error (Not the best way but I have seen this in the wild)</i>';
