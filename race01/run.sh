if [ $# -eq 0 ]
  then
    echo "Usage: zsh run.sh r_num p_num"
    exit 1
fi

nohup php -S 10.11.$1.$2:3100 server/index.php 0<&- &>/dev/null &
nohup php -S 10.11.$1.$2:3101 server/send_request.php 0<&- &>/dev/null &
nohup php -S 10.11.$1.$2:3102 server/get_card_move.php 0<&- &>/dev/null &
nohup php -S 10.11.$1.$2:3103 server/get_first_move.php 0<&- &>/dev/null &
echo "\033[1;33mTo stop server type: killall -9 php\033[0m\n"