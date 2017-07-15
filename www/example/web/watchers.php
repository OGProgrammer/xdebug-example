<?php
// Some useless example to show watchers, expressions, and overriding variable values

require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'include.php';

// Come back here when debugger is in thatFunction to see $message is relevant in the scope you are "watching" it in
$message = 'Watcher Example';

$message = getMessage($message);

echo $message;