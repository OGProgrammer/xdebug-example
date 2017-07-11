<?php

require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'include.php';

// Come back here when debugger is in thatFunction to see $var is relevant in the scope you are "watching" it in
$var = 'Call Stack Example';

thatFunction($var);

echo $var;