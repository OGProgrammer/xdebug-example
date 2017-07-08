#!/usr/bin/env bash
echo "Lets start a PHP web server with profiling enabled!"
ps aux | grep php
echo "Make sure you don't already see a php server running!"
echo "You can always kill the proc by doing a good ol \"pkill php\", just don't run that on prod ;)"
sleep 1

# Meat and potatoes ( Enable the profiler and turn off extended info )
nohup php \
    -dxdebug.profiler_enable=1 \
    -dxdebug.extended_info=0 \
    -S 127.0.0.1:8000  > /dev/null 2>&1 &

# Anytime you use pkill or kill, you gotta blast this https://goo.gl/ZMwyjN
ps aux | grep php
echo "---"
echo "You should see a line above that says \"php -dxdebug.profiler_enable=1 ...  -S 127.0.0.1:8000\""
echo "If you see that, great success"