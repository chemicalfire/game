#!/bin/bash

# 加上 -e参数 一旦某个语句执行出错就终止执行

SCRIPTDIR="$( cd -P "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
LANG=en_US.UTF-8
DEBUG_ON=

export PS4='+${BASH_SOURCE}:${LINENO}:${FUNCNAME[0]}: '

##################################################
# 最全的日志
#LOGFILE_DEBUG=
# 正常的提示信息
#LOGFILE_INFO=
# 警告信息，应该引起关注，但是可以继续发布
#LOGFILE_WARNING=
# 错误信息，会导致发布进程中止
#LOGFILE_ERROR=

shopt -s expand_aliases
alias LOGDEBUG="set +x && log DEBUG"
alias LOGINFO="set +x && log INFO"
alias LOGWARNING="set +x && log WARNING"
alias LOGERROR="set +x && log ERROR"
##################################################
