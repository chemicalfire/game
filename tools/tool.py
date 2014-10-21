#coding=utf-8
import os
import sys
import getopt
import traceback

#将部署目录添加到系统目录中
deploy_dir = None
deploy_relative_paths = ['../deploy'] #部署目录所在位置应该在当前工具脚本目录上一层级
for deploy_relative_path in deploy_relative_paths : 
	_deploy_dir = os.path.abspath(os.path.join(os.path.dirname(os.path.abspath(__file__)), deploy_relative_path))
	if os.path.isdir(_deploy_dir) :
		deploy_dir = _deploy_dir
		sys.path.insert(0, deploy_dir)

#导入ios 开发工具包
try :
    import __init__ as export_actions
except ImportError:
    traceback.print_exc()
    alert('can not find wall-e directory: %s' % ' or '.join(deploy_path))
    sys.exit(1)

