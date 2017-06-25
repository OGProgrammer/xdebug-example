# Xdebug Examples

This is a repo of xdebug examples when debugging in certain situations.

* A simple example
* A loop example with watchers & conditional breakpoints
* A vagrant example
* A docker example
* A remote example

## Simple Example

### CLI Debugging

There are a couple ways to debug on the command line. The trick is to trigger xdebug to start which can be done in one of the following ways.

1. Inline PHP Flags

    Add xdebug flags into php command executing the script. _See inline-cli-debug.sh_

        php -dxdebug.remote_enable=1 -dxdebug.remote_mode=req -dxdebug.remote_port=9000 -dxdebug.remote_host=127.0.0.1 -dxdebug.remote_connect_back=0 simple.php
    
2. Environment Variables

    Export env vars to your cli session. _See env-var-nix.sh or env-var-windows.sh_

        export XDEBUG_CONFIG="remote_enable=1 remote_mode=req remote_port=9000 remote_host=127.0.0.1 remote_connect_back=0"
    
3. Autostart

    Optionally, we can use Xdebug's `remote_autostart` setting to always start a debugging session for every script that is run.



```
Support Your Local User Groups
http://php.ug/

Check out our PHP UG in Las Vegas, NV
http://PHPVegas.com

Support your local tech scene!
#VegasTech

Anyone can become a speaker, just share your knowledge!
Giving back to others reciprocates so many benefits.
```
