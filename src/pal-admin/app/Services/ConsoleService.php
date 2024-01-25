<?php

namespace App\Services;


/**
 * Class ConsoleService
 * @package App\Services
 *　コンソールコマンドを実行するためのサービスクラス
 */
class ConsoleService
{

    public function __cConsoleServiceonstruct()
    {

    }

    //サーバのOSの再起動コマンドを実行する
    public function reboot()
    {

        $command = config('shells.reboot');
        $result = $this->exec($command);
        return $result;
    }


    /**
     * @param string $command
     * @return string
     */
    public function exec(string $command): string
    {
        $result = exec($command);
        return $result;
    }
}
