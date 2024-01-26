#!/bin/bash
set -e

# Variables
PAL_SAVEGAMES_DIR="/opt/palworld/Pal/Saved/SaveGames"
BACKUP_DIR="/opt/palworld/backup"

DATE=$(date +%Y%m%d_%H%M%S)
DAYS=7  # Number of days to keep backups

create_backup() {
  # Create backup
  tar -czf "${BACKUP_DIR}/backup_${DATE}.tar.gz" -C "${PAL_SAVEGAMES_DIR}" .
}

remove_old_backups() {
  # Remove backups older than $DAYS days
  find "${BACKUP_DIR}" -name "backup_*.tar.gz" -mtime +${DAYS} -exec rm {} \;
}

create_backup
remove_old_backups

echo "finish"
