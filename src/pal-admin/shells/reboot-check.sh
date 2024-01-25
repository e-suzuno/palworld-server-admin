#!/bin/bash
DIR=$(dirname "$0")
if [ -f "$DIR/reboot.flag" ]; then
    rm "$DIR/reboot.flag"
    # ファイルが正常に削除されたか確認
    if [ ! -f "$DIR/reboot.flag" ]; then
        sudo reboot
    else
        echo "Failed to delete reboot.flag file. Aborting reboot."
    fi
fi
