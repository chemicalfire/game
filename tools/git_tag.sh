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

# 打印日志
function log {
    set +x
    if [ "$#" -lt 2 ]; then
        echo "$0 <level> <msg>"
        exit
    fi
    local level=$1
    shift 1
    local logfilename=LOGFILE_${level}
    if [[ ! "${!logfilename}" ]]
    then
        echo "[$(date +'%Y-%m-%d %H:%M:%S')][${level}] $@"
    else
        logfilename=${!logfilename}
        echo "[$(date +'%Y-%m-%d %H:%M:%S')][${level}] $@" | tee -a $logfilename
    fi
    ${DEBUG_ON}
    return 0
}

# 检查目录
function check_dir {
    set +x
    for i in $@
    do
        if ! test -d "${!i}"; then
            log ERROR "dir not exists: $i"
            ${DEBUG_ON}
            exit 1
        fi
    done
    ${DEBUG_ON}
    return 0
}

# 当前分支
function current_branch {
    local src_path=$1
    check_dir src_path
    echo $(cd $src_path && git branch 2> /dev/null | sed -e '/^[^*]/d' -e 's/* \(.*\)/\1/')
}

# 打tag
function create_tag {
    local src_path=$1
    check_dir src_path
    local branch=$(current_branch $src_path)

    local tag_prefix="${branch}.$(date +"%y%m%d")."
    local last_tag_of_today=$(cd $src_path && git tag | grep "^${tag_prefix}" | tail -n 1 | sed "s/^${tag_prefix}//")

    if test -n "$last_tag_of_today"
    then
        local tag=${tag_prefix}$(printf "%02d" $(echo "${last_tag_of_today} + 1" | bc))
    else
        local tag=${tag_prefix}01
    fi
	cd $src_path && git tag -a ${tag} -m' auto creat tag '
	cd $src_path && git push origin ${tag}
}

# 声明一个控制器
function runaction {
    set +x
    local declared_action_name
    local action
    action=$1
    declared_action_name=$(declare -F $action || true)
    if test ! -n "$declared_action_name"
    then
       echo "$action() not found in $0"
       exit 1
    fi

    shift 1
    ${DEBUG_ON}
    $action $@
}

runaction $@
exit 0