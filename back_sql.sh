#!/bin/bash -x

DB="wwa1118"
DB_Username="root"
DB_Password="8eoZEs5d1780vIbK"
# DB_Host="192.168.100.161"
#
#
Backup_File="/home/ec2-user/Silk_Backup/"${DB}"_BACKUP_"`date '+%m-%d-%y'`".sql"

mysqldump --user=${DB_Username} --password=${DB_Password} --single-transaction --database ${DB} > ${Backup_File}
# mysqldump --user=${DB_Username} --password=${DB_Password} --host=${DB_Host} --single-transaction --database ${DB} > ${Backup_File}
gzip ${Backup_File}
find /home/ec2-user/Silk_Backup/*.sql.gz -mtime +30 -exec rm {} \;

