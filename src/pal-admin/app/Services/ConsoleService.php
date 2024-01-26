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
     * RCONコマンド、現在ログインしているプレイヤー情報を取得する
     * @return array<int,array{name: string, playeruid: string, steamid: string}>
     */
    public function showPlayers(): array
    {
        $result = $this->rcon("ShowPlayers");
        //$result は "name,playeruid,steamid"　と帰ってくる
        $players = explode("\n", $result);
        $player_list = [];
        foreach ($players as $player) {
            $player_info = explode(",", $player);
            if (count($player_info) == 3) {
                $player_list[] = [
                    'name' => $player_info[0],
                    'playeruid' => $player_info[1],
                    'steamid' => $player_info[2]
                ];
            }
        }
        return $player_list;
    }


    /**
     * パルワールドサーバーにブロードキャストする。
     * @param string $message
     * @return bool
     */
    public function broadcast(string $message)
    {
        $result = $this->rcon("Broadcast " . $message);

        Log::info($result);

        if ($result == "Broadcasting: " . $message) {
            return true;
        } else {
            return false;
        }
    }






    /**
     * RCONコマンドを実行する汎用
     * @param $rcon_command
     * @return string
     */
    public function rcon($rcon_command): string
    {
        $rcon_paht = config("shells.rcon_path");
        $pal_admin_password = config("shells.pal_admin_password");
        $rcon_host = config("shells.rcon_host");

        return $this->exec($rcon_paht . ' -a "' . $rcon_host . '" -p ' . $pal_admin_password . ' "' . $rcon_command . '" ');
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
