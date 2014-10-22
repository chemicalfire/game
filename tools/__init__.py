#coding=utf-8
import os
import sys
from common import * # 加载通用方法文件

# 加载MySQLdb模块
if sys.platform != 'win32' :
    import MySQLdb


# 定义操作
actions={'keys':[],'values':{}}
hidden_actions = {}

# 定义添加回调方法的函数
def addAction(key, name, callback) :
    actions['keys'].append(key)
    actions['values'][key] = {'name' : name, 'callback' : callback}

# 添加导出配置表方法回调
import action_export_config

addAction('export_config', '导出配置为json/php/lua格式', action_export_config.run)

