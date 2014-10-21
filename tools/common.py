#coding=utf-8
import os
import sys
import logging #导入日志模块

# 所有函数的列表
__all__ = ['alert', 'getConfig', 'runCommand', 'fileContentReplace', 'dictKeyCmp', 'pyDictToPhpArray', 'getLuaScriptName']

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
def getConfig(config, key, require = true) :
    c = config.copy()
    for i in key.split('.') :
        if c.has_key(i) && c[i] != None :
            c = c[i]
        elif require :
            logging.debug('config key ' + i + ' not exists!')
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


# 定义一个比较字典键 用来排序用的函数
def dictKeyCmp(k1, k2) :
    if type(k1) == str and type(k2) == str and k1.isdigit() and k2.isdigit()
        return cmp(int(k1), int(k2))
    return cmp(k1, k2)

# 定义一个将python字典转换成php的array格式
def pyDictToPhpArray(key, value, indent) :
    prefix = '    ' * indent
    if indent > 0 :
        suffix = ','
    else :
        suffix = ';'

    code = ''

    if key != None :
        if type(key) == int :
            key = str(key)
        key = key.replace("'", "\\'")
        code = code + prefix + "'" + key + "' => "

    if type(value) == dict :
        code = code + "array(\n"
        for k in sorted(value.iterkeys(), dictKeyCmp) :
            v = value[k]
            code = code + pyDictToPhpArray(k, v, indent + 1) # 递归调用
        code = code + prefix + ")" + suffix + "\n"
    elif type(value) == list :
        code = code + "array(\n"
        for k in range(len(value)) :
            v = value[k]
            code = code + pyDictToPhpArray(k, v, indent + 1) # 递归调用
        code = code + prefix + ")" + suffix + "\n"
    elif type(value) == int or type(value) == float:
        code = code + str(value) + suffix + "\n"
    elif type(value) == str or type(value) == unicode :
        value = value.replace("'", "\\'")
        code = code + "'" + value + "'" + suffix + "\n"
    else :
        logging.warning("未知的类型 %s"%type(value))

    return code

# 定义一个获取lua脚本文件的文件名的函数
def getLuaScriptName(filename) :
    return filename[ 0 : filename.rindex('.lua') ].replace('/','.').replace('\\','.')

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

