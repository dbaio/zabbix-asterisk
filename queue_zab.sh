#!/bin/sh

TIPO=$1
FILA=$2

# TIPOS:
#
#  1 - Calls in queue
#  2 - Answered calls
#  3 - Abandoned calls
#  4 - Average hold time
#  5 - Average talk time

if [ ! $TIPO ] || [ ! $FILA ]; then
   echo 0
   exit 0
else

   case $TIPO in
   1)
      Message="Calls in queue"
      ;;
   2)
      Message="Answered calls"
      ;;
   3)
      Message="Abandoned calls"
      ;;
   4)
      Message="Average hold time"
      ;;
   5)
      Message="Average talk time"
      ;;
   *)
      Message="Error"
      echo 0
      exit 0
      ;;
   esac

   VALOR=`/usr/bin/php /etc/zabbix/queue_status_zab.php $FILA 2>/dev/null| grep "${Message}" | awk -F\: '{ print $2 }'`
   echo $VALOR
   exit 0
fi
