<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

/**
 * Class PalWorldSettingService
 * @package App\Services
 * PalWorldの設定ファイルを読み書きするためのサービスクラス
 *
 */
class PalWorldSettingService
{

    public function __construct()
    {
    }


    private function getSettingFilePath()
    {
        return config("shells.setting_file_path");
    }


    /**
     * 設定ファイル(iniファイル)を読み込む
     * @return array
     */
    public function readSettingFile()
    {
        $path = $this->getSettingFilePath();


        /***
         * 以下のようなiniファイルを読み込む
         * [/Script/Pal.PalGameWorldSettings]
         * OptionSettings=(Difficulty=None,DayTimeSpeedRate=1.000000,NightTimeSpeedRate=1.000000,ExpRate=1.000000,PalCaptureRate=1.000000,PalSpawnNumRate=1.000000,PalDamageRateAttack=1.000000,PalDamageRateDefense=1.000000,PlayerDamageRateAttack=1.000000,PlayerDamageRateDefense=1.000000,PlayerStomachDecreaceRate=1.000000,PlayerStaminaDecreaceRate=1.000000,PlayerAutoHPRegeneRate=1.000000,PlayerAutoHpRegeneRateInSleep=1.000000,PalStomachDecreaceRate=1.000000,PalStaminaDecreaceRate=1.000000,PalAutoHPRegeneRate=1.000000,PalAutoHpRegeneRateInSleep=1.000000,BuildObjectDamageRate=1.000000,BuildObjectDeteriorationDamageRate=1.000000,CollectionDropRate=1.000000,CollectionObjectHpRate=1.000000,CollectionObjectRespawnSpeedRate=1.000000,EnemyDropItemRate=1.000000,DeathPenalty=ItemAndEquipment,bEnablePlayerToPlayerDamage=False,bEnableFriendlyFire=False,bEnableInvaderEnemy=False,bActiveUNKO=False,bEnableAimAssistPad=True,bEnableAimAssistKeyboard=False,DropItemMaxNum=3000,DropItemMaxNum_UNKO=100,BaseCampMaxNum=128,BaseCampWorkerMaxNum=15,DropItemAliveMaxHours=1.000000,bAutoResetGuildNoOnlinePlayers=False,AutoResetGuildTimeNoOnlinePlayers=72.000000,GuildPlayerMaxNum=20,PalEggDefaultHatchingTime=2.000000,WorkSpeedRate=1.000000,bIsMultiplay=False,bIsPvP=False,bCanPickupOtherGuildDeathPenaltyDrop=False,bEnableNonLoginPenalty=True,bEnableFastTravel=True,bIsStartLocationSelectByMap=True,bExistPlayerAfterLogout=False,bEnableDefenseOtherGuildPlayer=False,CoopPlayerMaxNum=4,ServerPlayerMaxNum=32,ServerName="ポケダの伝説 Server",ServerDescription="",AdminPassword="paladmin",ServerPassword="",PublicPort=8211,PublicIP="",RCONEnabled=True,RCONPort=25575,Region="",bUseAuth=True,BanListURL="https://api.palworldgame.com/api/banlist.txt")
         */
        $result = $this->parse_custom_ini_file($path);

        return $result;
    }

    public function parse_custom_ini_file($file)
    {
        $lines = file($file);
        $result = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line == "" || $line[0] == '[' || $line[0] == ';') continue;

            if (strpos($line, '(') !== false) {
                $key = substr($line, 0, strpos($line, '('));
                $value = substr($line, strpos($line, '(') + 1, -1);
                $pairs = explode(',', $value);
                $result[trim($key)] = [];
                foreach ($pairs as $pair) {
                    if (strpos($pair, '=') !== false) {
                        list($subkey, $subvalue) = explode('=', $pair);
                        $result[trim($key)][trim($subkey)] = trim($subvalue);
                    }
                }
            }
        }
        return $result;
    }


    /**
     * 設定の配列を使ってiniファイルを再生成する。
     * @param $setting
     * @return void
     */
    public function updateSettingFile($setting)
    {

        $dir = config("shells.shells_dir");
        shell_exec($dir . "/service-stop.sh");

        $path = $this->getSettingFilePath();

        $ini = $this->createIniFile($setting);

        //保存する前にバックアップを取る
        $backup_path = $path . ".bak";
        copy($path, $backup_path);


        $handle = fopen($path, 'w');
        if (!$handle) {
            return false;
        }
        //ファイルの処理
        fwrite($handle, $ini);
        //ファイルを閉じる
        fclose($handle);


        shell_exec($dir . "/service-start.sh");

    }

    public function createIniFile($setting)
    {

        $ini = "[/Script/Pal.PalGameWorldSettings]\n";
        $option_settings_inner = [];
        foreach ($setting as $key => $value) {
            $option_settings_inner[] = $key . "=" . $value;
        }

        $option_settings_inner_text = implode(",", $option_settings_inner);
        $ini .= "OptionSettings=(" . $option_settings_inner_text . ")";
        $ini .= "\n\n";
        return $ini;
    }


}
