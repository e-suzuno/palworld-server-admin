#!/bin/bash
DIR=$(dirname "$0")
if [ -f "$DIR/reboot.flag" ]; then
    rm "$DIR/reboot.flag"
    sudo reboot
fi
