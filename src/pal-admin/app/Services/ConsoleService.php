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

        $dir = config("shells.shells_dir");
        file_put_contents($dir . '/reboot.flag', 'reboot');

    }


    /**
     * @return array
     */
    public function getSystemInfo()
    {
        $dir = config("shells.shells_dir");
        $command = $dir . "/sysinfo.sh";
        $output = shell_exec($command);
        $result = explode("\n", trim($output));
        return [
            'cpu_usage' => $result[0],
            'memory_usage' => $result[1]
        ];
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
