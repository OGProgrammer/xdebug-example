# Xdebug Examples

This is a repo of xdebug examples when debugging in certain situations.

* A simple example
* A loop example with watchers & conditional breakpoints
* A vagrant example
* A docker example
* How you might setup a remote (AWS/Cloud to localhost) debug scenario.

## Installing Xdebug

You can checkout the [Offical Docs](https://xdebug.org/docs/install) for install xdebug. I've also included a script to install on OSX. PRs welcome for other systems.

Available Install Scripts:

* OSX via [Homebrew](https://brew.sh/)
  * /install/osx/brew-install-php71-xdebug.sh

## Examples

### Debugging in the CLI
* Set the XDEBUG_CONFIG environment variable to turn on remote_enable & configure the ide key

        export XDEBUG_CONFIG="remote_enable=1 idekey=phpstorm"
    
* Now go start your debug listener in your favorite IDE. 
_Ex. Set PHPStorm telephone icon all green to start listening_

* Default Xdebug settings are normally good enough to just call script with `php` command...

```
php www/example/web/watchers.php
```

* If you need to change xdebug settings, you can do that inline with option -d in `php`

```
php -dxdebug.remote_enable=1 -dxdebug.remote_mode=req -dxdebug.remote_port=9000 \
    -dxdebug.remote_host=127.0.0.1 -dxdebug.remote_connect_back=0 www/example/watchers.php
```

### Debugging with the PHP Built In Web Server

* Start the `php` built in web server with remote_enabled turned on.

To run the PHP built in web server in the background:

```
# This will launch the php web server in a way where it runs even after closing your terminal.

nohup php -dxdebug.remote_enable=1 -dxdebug.remote_mode=req -dxdebug.remote_port=9000 \
    -dxdebug.remote_host=127.0.0.1 -dxdebug.remote_connect_back=0 \
    -S 127.0.0.1:8000 -t ./www/example/web > /dev/null 2>&1 &
    
# Use `pkill php` in dev to kill this server later
```

To run it in the foreground:

```
php -dxdebug.remote_enable=1 -S 127.0.0.1:8000 -t ./www/example/web
```

_Note: You can change php & xdebug settings inline when starting it like what directory gets served up with the -t option. [Read more about the Built in PHP Web Server Here](http://php.net/manual/en/features.commandline.webserver.php)_

* Goto your web browser and navigate to "127.0.0.1:8000/index.php"
* Now start your xdebug browser extension or add the GET parameter ?XDEBUG_SESSION_START=phpstorm at the end of the url.
* Goto your IDE and start your debug listener
* Refresh the browser page and your IDE should kick off the debug session

### Debugging with other Web Servers

The main thing is to check your php.ini xdebug settings. Run `php -i | grep xdebug` for what your settings currently are in cli or run `phpinfo()` from a PHP script hosted on your web server to see what everything is set to.

__Look for `xdebug.remote_enable` and make sure its on.__ 

The hardest part from here is getting the connection from the server to your machine working. 
Identify the host IP you want to debug from (your machines IP running the IDE).
Either hard code that into the `xdebug.remote_host` option or turn on `xdebug.remote_connect_back` which will connect back to the requesting IP. 
__Just watch out for the reverse proxy trap.__ In cases like docker, vagrant, reverse proxies, you don't want to use `xdebug.remote_connect_back` but rather set the IP in `xdebug.remote_host` to point back to the host.

### Docker Xdebug Example

This is probably a good example to look at how to get docker setup to get the xdebug connection
Clone my other repository for an xdebug example using docker:

`git clone git@github.com:OGProgrammer/docker-xdebug.git`

Read the README.md file within that repository for more information.

### Vagrant (PuPHPet) Xdebug Example

Clone my other repository for an xdebug example using PuPHPet:

`git clone git@github.com:OGProgrammer/vagrant-xdebug.git`

Read the README.md file within that repository for more information.

### Debugging a Cloud Server

You should be able to pick an arbitrary port like 9900 and setup xdebug with that port and your WAN IP address. Then on your router you can setup port forwarding to your local machine. In theory that should allow the cloud server to connect back to your IDE. If you can't access the internet from the cloud instance then you might want to use VIM/DBGp on the instance itself. If your a real magician you might even be able to setup an ssh tunnel but I've never tried that. Someone with experience doing this? I'd like to hear about remote debug experiences.

### Profiling

For MacOSX I'm using `brew install qcachegrind --with-graphviz` but kcachegrind is good among others.

You'll need to set the following xdebug configs to enable profiling:

```
xdebug.profiler_enable = 1
xdebug.profiler_output_dir = /tmp

; Turn this off for more accurate profiling - https://xdebug.org/docs/all_settings#extended_info
; "PHP's generated oparrays will increase with about a third of the size slowing down your scripts"
xdebug.extended_info = 0
```

Set `profiler_output_dir` to a location you can later retrieve the cachegrind.out files.

Don't forget to turn this back off as these files can get quite large with complex applications.

An example can be found in the docker example repository that plays around with the profiler.

### About & other info

```
Built & Maintained by @OGProgrammer

Support Your Local User Groups
http://php.ug/

Check out our PHP UG in Las Vegas, NV
http://PHPVegas.com

Support your local tech scene!
#VegasTech

Share your knowledge!
Become a speaker, co-organizer, at your local user groups.
Contribute to your favorite open source packages (even if its a README ;)

If you enjoyed this code, please support me at one of the following:

Thank you! ☺

BTC Wallet
1HNHoUz8ruQGko8vh85Jf4nXx8tpEaxUxr

ETH Wallet
0xb561e6a160c86cd5831c323b0f9ce319b56c6421

Patreon
https://www.patreon.com/ogprogrammer
```
