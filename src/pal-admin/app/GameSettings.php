<?php

namespace App;


class GameSettings
{
    const DIFFICULTY = "難易度 none=ノーマル hard=ハード";
    const DAY_TIME_SPEED_RATE = "お昼のスビード倍率";
    const NIGHT_TIME_SPEED_RATE = "夜のスビード倍率";
    const EXP_RATE = "経験値倍率";
    const PAL_CAPTURE_RATE = "パル捕獲倍率";
    const PAL_SPAWN_NUM_RATE = "パル出現数倍率";
    const PAL_DAMAGE_RATE_ATTACK = "パル与ダメージ倍率";
    const PAL_DAMAGE_RATE_DEFENSE = "パル被ダメ倍率";
    const PLAYER_DAMAGE_RATE_ATTACK = "プレイヤー与ダメージ倍率";
    const PLAYER_DAMAGE_RATE_DEFENSE = "プレイヤー被ダメ倍率";
    const PLAYER_STOMACH_DECREACE_RATE = "プレイヤー食料倍率";
    const PLAYER_STAMINA_DECREACE_RATE = "プレイヤースタミナ倍率";
    const PLAYER_AUTO_HP_REGENE_RATE = "プレイヤー自動HP回復倍率";
    const PLAYER_AUTO_HP_REGENE_RATE_IN_SLEEP = "プレイヤー睡眠中自動HP回復倍率";
    const PAL_STOMACH_DECREACE_RATE = "パル食料倍率";
    const PAL_STAMINA_DECREACE_RATE = "パルスタミナ倍率";
    const PAL_AUTO_HP_REGENE_RATE = "パル自動HP回復倍率";
    const PAL_AUTO_HP_REGENE_RATE_IN_SLEEP = "パルHP回復倍率";
    const BUILD_OBJECT_DAMAGE_RATE = "建築オブジェクトダメージ倍率";
    const BUILD_OBJECT_DETERIORATION_DAMAGE_RATE = "建築オブジェクト風化ダメージ倍率";
    const COLLECTION_DROP_RATE = "収集ドロップ倍率";
    const COLLECTION_OBJECT_HP_RATE = "収集オブジェクトHP倍率";
    const COLLECTION_OBJECT_RESPAWN_SPEED_RATE = "収集オブジェクトロップスピード倍率";
    const ENEMY_DROP_ITEM_RATE = "敵ドロップアイテム倍率";
    const DEATH_PENALTY = "デスペナ";
    const B_ENABLE_PLAYER_TO_PLAYER_DAMAGE = "プレイヤー間のダメージを有効にする";
    const B_ENABLE_FRIENDLY_FIRE = "フレンドリーファイアを有効にする";
    const B_ENABLE_INVADER_ENEMY = "侵略者敵を有効にする";
    const B_ACTIVE_UNKO = "アクティブUNKO";
    const B_ENABLE_AIM_ASSIST_PAD = "エイムアシストパッドを有効にする";
    const B_ENABLE_AIM_ASSIST_KEYBOARD = "エイムアシストキーボードを有効にする";
    const DROP_ITEM_MAX_NUM = "ドロップアイテム最大個数";
    const DROP_ITEM_MAX_NUM_UNKO = "UNKOドロップアイテム最大個数";
    const BASE_CAMP_MAX_NUM = "ベース拠点の最大数";
    const BASE_CAMP_WORKER_MAX_NUM = "ベース拠点のワーカー最大数";
    const DROP_ITEM_ALIVE_MAX_HOURS = "ドロップアイテムの生存最大時間";
    const B_AUTO_RESET_GUILD_NO_ONLINE_PLAYERS = "自動リセットギルドオンラインプレイヤーなし";
    const AUTO_RESET_GUILD_TIME_NO_ONLINE_PLAYERS = "自動リセットギルド時間オンラインプレイヤーなし";
    const GUILD_PLAYER_MAX_NUM = "ギルドプレイヤー最大数";
    const PAL_EGG_DEFAULT_HATCHING_TIME = "パル卵初期値孵化時間";
    const WORK_SPEED_RATE = "作業スピード倍率";
    const B_IS_MULTIPLAY = "bIs マルチプレイ";
    const B_IS_PVP = "bIs PvP";
    const B_CAN_PICKUP_OTHER_GUILD_DEATH_PENALTY_DROP = "他のギルドのデスペナルティドロップを拾うことができます";
    const B_ENABLE_NON_LOGIN_PENALTY = "非ログインペナルティを有効にする";
    const B_ENABLE_FAST_TRAVEL = "ファストトラベルを有効にする";
    const B_IS_START_LOCATION_SELECT_BY_MAP = "開始場所をマップで選択";
    const B_EXIST_PLAYER_AFTER_LOGOUT = "ログアウト後の存在プレーヤー";
    const B_ENABLE_DEFENSE_OTHER_GUILD_PLAYER = "防御を有効にするその他のギルドプレイヤー";
    const COOP_PLAYER_MAX_NUM = "協力プレイヤー最大数";
    const SERVER_PLAYER_MAX_NUM = "サーバープレーヤー最大数";
    const SERVER_NAME = "サーバー名";
    const SERVER_DESCRIPTION = "サーバー説明";
    const ADMIN_PASSWORD = "鯖管パスワード";
    const SERVER_PASSWORD = "鯖パスワード/現在不具合の為エラーになる";
    const PUBLIC_PORT = "ポート";
    const PUBLIC_IP = "グローバルIP";
    const RCON_ENABLED = "RCON有効";
    const RCON_PORT = "RCONポート";
    const REGION = "地域";
    const B_USE_AUTH = "認証使用";
    const BAN_LIST_URL = "BAN一覧url";

    private static $mapping = [
        "Difficulty" => self::DIFFICULTY,
        "DayTimeSpeedRate" => self::DAY_TIME_SPEED_RATE,
        "NightTimeSpeedRate" => self::NIGHT_TIME_SPEED_RATE,
        "ExpRate" => self::EXP_RATE,
        "PalCaptureRate" => self::PAL_CAPTURE_RATE,
        "PalSpawnNumRate" => self::PAL_SPAWN_NUM_RATE,
        "PalDamageRateAttack" => self::PAL_DAMAGE_RATE_ATTACK,
        "PalDamageRateDefense" => self::PAL_DAMAGE_RATE_DEFENSE,
        "PlayerDamageRateAttack" => self::PLAYER_DAMAGE_RATE_ATTACK,
        "PlayerDamageRateDefense" => self::PLAYER_DAMAGE_RATE_DEFENSE,
        "PlayerStomachDecreaceRate" => self::PLAYER_STOMACH_DECREACE_RATE,
        "PlayerStaminaDecreaceRate" => self::PLAYER_STAMINA_DECREACE_RATE,
        "PlayerAutoHPRegeneRate" => self::PLAYER_AUTO_HP_REGENE_RATE,
        "PlayerAutoHpRegeneRateInSleep" => self::PLAYER_AUTO_HP_REGENE_RATE_IN_SLEEP,
        "PalStomachDecreaceRate" => self::PAL_STOMACH_DECREACE_RATE,
        "PalStaminaDecreaceRate" => self::PAL_STAMINA_DECREACE_RATE,
        "PalAutoHPRegeneRate" => self::PAL_AUTO_HP_REGENE_RATE,
        "PalAutoHpRegeneRateInSleep" => self::PAL_AUTO_HP_REGENE_RATE_IN_SLEEP,
        "BuildObjectDamageRate" => self::BUILD_OBJECT_DAMAGE_RATE,
        "BuildObjectDeteriorationDamageRate" => self::BUILD_OBJECT_DETERIORATION_DAMAGE_RATE,
        "CollectionDropRate" => self::COLLECTION_DROP_RATE,
        "CollectionObjectHpRate" => self::COLLECTION_OBJECT_HP_RATE,
        "CollectionObjectRespawnSpeedRate" => self::COLLECTION_OBJECT_RESPAWN_SPEED_RATE,
        "EnemyDropItemRate" => self::ENEMY_DROP_ITEM_RATE,
        "DeathPenalty" => self::DEATH_PENALTY,
        "bEnablePlayerToPlayerDamage" => self::B_ENABLE_PLAYER_TO_PLAYER_DAMAGE,
        "bEnableFriendlyFire" => self::B_ENABLE_FRIENDLY_FIRE,
        "bEnableInvaderEnemy" => self::B_ENABLE_INVADER_ENEMY,
        "bActiveUNKO" => self::B_ACTIVE_UNKO,
        "bEnableAimAssistPad" => self::B_ENABLE_AIM_ASSIST_PAD,
        "bEnableAimAssistKeyboard" => self::B_ENABLE_AIM_ASSIST_KEYBOARD,
        "DropItemMaxNum" => self::DROP_ITEM_MAX_NUM,
        "DropItemMaxNum_UNKO" => self::DROP_ITEM_MAX_NUM_UNKO,
        "BaseCampMaxNum" => self::BASE_CAMP_MAX_NUM,
        "BaseCampWorkerMaxNum" => self::BASE_CAMP_WORKER_MAX_NUM,
        "DropItemAliveMaxHours" => self::DROP_ITEM_ALIVE_MAX_HOURS,
        "bAutoResetGuildNoOnlinePlayers" => self::B_AUTO_RESET_GUILD_NO_ONLINE_PLAYERS,
        "AutoResetGuildTimeNoOnlinePlayers" => self::AUTO_RESET_GUILD_TIME_NO_ONLINE_PLAYERS,
        "GuildPlayerMaxNum" => self::GUILD_PLAYER_MAX_NUM,
        "PalEggDefaultHatchingTime" => self::PAL_EGG_DEFAULT_HATCHING_TIME,
        "WorkSpeedRate" => self::WORK_SPEED_RATE,
        "bIsMultiplay" => self::B_IS_MULTIPLAY,
        "bIsPvP" => self::B_IS_PVP,
        "bCanPickupOtherGuildDeathPenaltyDrop" => self::B_CAN_PICKUP_OTHER_GUILD_DEATH_PENALTY_DROP,
        "bEnableNonLoginPenalty" => self::B_ENABLE_NON_LOGIN_PENALTY,
        "bEnableFastTravel" => self::B_ENABLE_FAST_TRAVEL,
        "bIsStartLocationSelectByMap" => self::B_IS_START_LOCATION_SELECT_BY_MAP,
        "bExistPlayerAfterLogout" => self::B_EXIST_PLAYER_AFTER_LOGOUT,
        "bEnableDefenseOtherGuildPlayer" => self::B_ENABLE_DEFENSE_OTHER_GUILD_PLAYER,
        "CoopPlayerMaxNum" => self::COOP_PLAYER_MAX_NUM,
        "ServerPlayerMaxNum" => self::SERVER_PLAYER_MAX_NUM,
        "ServerName" => self::SERVER_NAME,
        "ServerDescription" => self::SERVER_DESCRIPTION,
        "AdminPassword" => self::ADMIN_PASSWORD,
        "ServerPassword" => self::SERVER_PASSWORD,
        "PublicPort" => self::PUBLIC_PORT,
        "PublicIP" => self::PUBLIC_IP,
        "RCONEnabled" => self::RCON_ENABLED,
        "RCONPort" => self::RCON_PORT,
        "Region" => self::REGION,
        "bUseAuth" => self::B_USE_AUTH,
        "BanListURL" => self::BAN_LIST_URL,
    ];

    public static function label($name)
    {
        if (isset(self::$mapping[$name])) {
            return self::$mapping[$name];
        }
        return null;
    }
}
