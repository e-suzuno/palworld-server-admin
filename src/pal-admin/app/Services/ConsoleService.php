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
        $filename = $dir . '/reboot.flag';
        if (touch($filename)) {
            return true;
        } else {
            return false;
        }
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
     * バックアップコマンドを手動で呼び出す
     */
    public function backup(): bool
    {
        $dir = config("shells.shells_dir");
        $command = $dir . "/backup.sh";
        $output = shell_exec($command);
        $result = explode("\n", trim($output));


        if (!isset($result[2])) {
            return false;
        }

        if ($result[2] == "finish") {
            return false;
        }
        return true;
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