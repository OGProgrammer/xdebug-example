#!/usr/bin/env bash
echo "Unlink old php before attempting..."
sleep 1

# Meat and potatoes
brew update
brew install php71
brew install php71-xdebug

# Verify
php -i | grep xdebug
echo "---"
echo "If you see a bunch of xdebug variables above this, you have much success"