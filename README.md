# palworld-server-admin

|          |      |
|----------|------|
| PHP      | 8.3  |
| Composer | 2.6  |
| Laravel  | 10.x |
| SQLite   | -    |
| shell    | use  |
| cron     | use  |
| rcon     | use  |

## インストール




# rconコマンド

プレイヤーリストを返す

```
/home/palworld/rcon/rcon -a "127.0.0.1:25575" -p paladmin "ShowPlayers"
```

ブロードキャスト　サーバー内の全員にメッセージを送る
```
/home/palworld/rcon/rcon -a "127.0.0.1:25575" -p paladmin "Broadcast hohrhohr"
```

