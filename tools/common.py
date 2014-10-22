#coding=utf-8
import os
import sys
import logging #导入日志模块


#定义一个输出函数
def alert(msg, title = '') :
	print '=' * 35, title, '=' * 35
	print msg
	print '=' * 80


#配置logging
logging.basicConfig(
    level = logging.DEBUG,
    format = '%(asctime)s %(filename)s[line:%(lineno)d] %(levelname)s %(message)s',
    datefmt = '%Y-%m-%d %H:%M:%S',
)

# logging.debug('a test logging debug info')

# 定义一个获取配置的函数 支持使用 . 来选取层级
def getConfig(config, key, require = True) :
    c = config.copy()
    for i in key.split('.') :
        if c.has_key(i) and c[i] != None :
            c = c[i]
        elif require :
            logging.error('config key ' + i + ' not exists!')
        else :
            return None

    return c



# 定义一个执行命令的函数
def runCommand(cmd) :
    logging.info(cmd)
    os.system(cmd)

# 定义一个替换文件内容的函数 这个函数会用在将策划的配置导出后写入对应的文件中
def fileContentReplace(filename, search, replace) :
    fileHandler = open(filename, 'r') # 以只读方式打开文件
    content = fileHandler.read() # 获取文件内所有的内容
    fileHandler.close() # 关闭文件

    # 替换文本内容
    content = content.replace(search, replace)

    fileHandler = open(filename, 'w') # 以只写方式打开文件
    fileHandler.write(content)
    fileHandler.close()



# 定义删除目录下文件的函数
def delDirectoryRecursive(dir) :
    list = os.listdir(dir)
    for i in list :
        path = os.path.join(dir, i)
        if os.path.isdir(path) :
            delDirectoryRecursive(path)
        elif os.path.isfile(path) :
            os.remove(path)

# 定义查找需要忽略的目录的函数
def findIgnoreDirectories(dir, ignores) :
    list = os.listdir(dir)
    for i in list :
        path = os.path.join(dir, i)
        if os.path.isdir(path) :
            pathbasename = os.path.basename(path)
            if pathbasename.find('_dev') > -1 or i == '.svn':
                ignores.append(pathbasename)
            else :
                findIgnoreDirectories(pathbasename, ignores)

