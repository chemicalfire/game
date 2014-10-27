#coding=utf-8

import os
import sys
import logging


def gitTag(dir) :
    # 检查目录合法性
    if not os.path.exists(dir) :
        logging.error('目录 %s 不存在'%(dir))
    elif not os.path.isdir(dir) :
        logging.error(' %s 不是目录'%(dir))

    # 执行git_tag.sh文件
    toolDir = os.path.abspath(dir + os.sep + '..' + os.sep + '..' + os.sep + 'tools')
    file = os.popen(toolDir + os.sep + 'git_tag.sh git_create_tag ' + dir)
    file.read()

def backendTag(config) :
    projectRoot = config['project_root']
    dir = projectRoot + os.sep + '..' + os.sep + 'backend' + os.sep + 'dev'
    dir = os.path.abspath(dir)
    gitTag(dir)

