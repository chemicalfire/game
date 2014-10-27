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
# 添加代码git分支tag的回调
import action_git_tag

# 添加导出配置的操作
addAction('export_config', '导出配置为json/php/lua格式', action_export_config.run)

# 添加为代码打git分支tag的操作
addAction('make_backend_git_tag', '为backend目录打git分支tag', action_git_tag.backendTag)
#addAction('make_frontend_git_tag', '为frontend目录打git分支tag', action_git_tag.frontendTag)
#addAction('make_config_git_tag', '为config目录打git分支tag', action_git_tag.configTag)
#addAction('make_script_git_tag', '为script目录打git分支tag', action_git_tag.scriptTag)
#addAction('make_asset_git_tag', '为asset目录打git分支tag', action_git_tag.assetTag)

