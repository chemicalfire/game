#! /usr/bin/python
#coding=utf-8
import os
import sys
import getopt
import traceback


#定义一个输出函数
def alert(msg, title = '') :
	print '=' * 35, title, '=' * 35
	print msg
	print '=' * 80

#将部署目录添加到系统目录中
deploy_dir = None
deploy_relative_paths = ['../deploy'] #部署目录所在位置应该在当前工具脚本目录上一层级
for deploy_relative_path in deploy_relative_paths : 
	_deploy_dir = os.path.abspath(os.path.join(os.path.dirname(os.path.abspath(__file__)), deploy_relative_path))
	if os.path.isdir(_deploy_dir) :
		deploy_dir = _deploy_dir
		sys.path.insert(0, deploy_dir)

#导入导表工具
try :
    import __init__ as export_actions
    from dependencies import yaml
except ImportError:
    traceback.print_exc()
    sys.exit(1)



# 检查config.yaml文件是否存在
if not os.path.exists(deploy_dir + os.sep + 'config.yaml') :
    logging.error('在deploy目录下找不到config.yaml文件')
    raw_input()
    sys.exit(1)

# 加载主配置文件
config_files = ['config.yaml']
config = {}
for file in config_files :
    filepath = deploy_dir + os.sep + file
    if os.path.exists(filepath) :
        yaml_dict = yaml.load(open(filepath))
        if yaml_dict :
            config = dict(config.items() + yaml_dict.items())


# 检查主配置文件里面的内容
for config_name in ['project_root', 'project_name'] :
    cfg = config.get(config_name)
    if not cfg :
        logging.error("主配置文件中缺少 %s 的配置"%config_name)
        raw_input()
        sys.exit(1)
    vars()[config_name] = cfg # 设置全局变量
    print "%s:%s"%(config_name, cfg)

# 重新加载配置
config_files = [
    'config.yaml', # 主配置文件
    project_name + '.common.yaml' # 项目的配置文件
    ]

config = {}
for file in config_files :
    filepath = deploy_dir + os.sep + file
    if os.path.exists(filepath) :
        yaml_dict = yaml.load(open(filepath))
        if yaml_dict :
            config = dict(config.items() + yaml_dict.items())

config['project_name'] = project_name
config['project_root'] = project_root

action_indexes = sys.argv[1 : ]
if len(action_indexes) and export_actions.hidden_actions.has_key(action_indexes[0]) :
    export_actions.hidden_actions[action_indexes[0]](config)
    sys.exit(0)

action_keys = export_actions.actions['keys']
action_values = export_actions.actions['values']


while True :
    if len(action_indexes) :
        action_index = action_indexes.pop(0)
    else :
        print ""
        print "=" * 30
        print "操作: "
        for i in range(0,len(action_keys)) :
            action = action_values[action_keys[i]]
            print "\t", i+1, ":", action['name'].decode('utf-8')
        print "\tq : 退出"
        action_index = raw_input("选择: ")

    print "\n 操作 [%s]\n"%action_index
    if action_index.isdigit():
        action_index = int(action_index) - 1
        if action_index >= 0 and action_index < len(action_keys):
            callback = action_values[action_keys[action_index]]['callback']
            callback(config)
    elif action_index == 'q':
        sys.exit(0)
    else:
        if action_values.has_key(action_index):
            action_values[action_index]['callback'](config)