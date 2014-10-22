#coding=utf-8
import os
import sys
import csv # 导入csv模块
import json # 导入json模块
from common import *

# 定义一个检查json格式的函数
def validJsonFormat(obj) :
    if type(obj) == dict :
        for key in obj :
            validJsonFormat(key)
            validJsonFormat(obj[key])
    elif type(obj) == list :
        for value in obj :
            validJsonFormat(value)
    elif type(obj) == str :
        try :
            obj.decode('utf-8')
        except :
            print 'error', repr(obj)


# 定义将csv格式文件内容转换成json格式的文件
def csvFileToJsonFile(input_file, output_file) :
    inHandler = open(input_file, 'rU')
    inReader = csv.reader(inHandler)

    # 第一行为表的中文名称 不使用
    inReader.next()

    fieldNameList = [] # 字段英文名列表
    fieldTypeList = [] # 字段类型列表

    # 解析第二行配置的类型
    line = inReader.next()

    for field in line :

        fieldType = ''
        fieldName = field

        if fieldName == '' :
            fieldNameList.append('blank')
            fieldTypeList.append(fieldType)
            continue

        # 查找 "[" 字符的位置
        nameTypeSeperatorIndex = field.find('[')
        if nameTypeSeperatorIndex > -1 :
            fieldType = field[nameTypeSeperatorIndex + 1 : len(field) - 1]

        fieldName = field[0 : nameTypeSeperatorIndex]

        fieldNameList.append(fieldName)
        fieldTypeList.append(fieldType)

    # 从第三行开始遍历文件
    listDict = {}

    for row in inReader :

        lineDict = {}
        pkIndex = 0
        if len(row) == 0 or row == '' or row == None :
            continue

        for i in range(len(row)) :
            if row[i] == '' or row[i] == None :
                continue

            if fieldNameList[i] == 'blank' :
                continue

            if fieldTypeList[i] == '' :
                logging.error("配置文件 %s 需要配置字段 %s 的类型"%(input_file, fieldNameList[i]))
                sys.exit(1)
                return

            if fieldTypeList[i] == 'int' :
                lineDict[fieldNameList[i]] = (int) (row[i])
            elif fieldTypeList[i] == 'float' :
                lineDict[fieldNameList[i]] = (float) (row[i])
            elif fieldTypeList[i] == 'string' :
                lineDict[fieldNameList[i]] = row[i].decode('gbk').encode('utf8')

        listDict[row[pkIndex]] = lineDict

    outHandler = open(output_file, 'w')
    # 检查json格式是否正确
    validJsonFormat(listDict)
    jsonData = json.dumps(listDict, sort_keys = True) # json.dumps(listDict, sort_keys = True, indent = 2)
    outHandler.truncate()
    outHandler.write(jsonData)
    outHandler.close()
    outputFileBasename = os.path.basename(output_file)
    logging.debug("将csv格式的文件 %s 导出为json格式的文件 %s"%(input_file, outputFileBasename))
    return listDict


# 定义一个比较字典键 用来排序用的函数
def dictKeyCmp(k1, k2) :
    if type(k1) == str and type(k2) == str and k1.isdigit() and k2.isdigit() :
        return cmp(int(k1), int(k2))
    return cmp(k1, k2)

# 定义一个将python字典转换成lua的字典格式
def pyDictToLuaDict(pyDict) :
    lua_string = '{'
    for k, v in pyDict.items() :
        key = "['" + str(k) + "']"
        if type(v) == dict :
            value = pyDictToLuaDict(v)
        elif type(v) == int or type(v) == float :
            value = str(v)
        elif type(v) == str or type(v) == unicode :
            value = v.replace("'", "\\'")
            value = "'" + value + "'"
        else :
            logging.warning("未知的类型 %s"%type(v))
        line = key + "=" + value + ","
        lua_string = lua_string + line
    lua_string = lua_string + "}"
    return lua_string

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


# 定义执行导出配置的函数
def exportConfig(input_dir, output_dirs, php_config_package_dir, ignore_dirs) :
    list = os.listdir(input_dir)
    for i in list :
        path = os.path.join(input_dir, i)
        if os.path.isdir(path) :
            pathbasename = os.path.basename(path)
            if pathbasename in ignore_dirs :
                continue
            exportConfig(input_dir, output_dirs, php_config_package_dir, ignore_dirs)
        elif os.path.isfile(path) :
            filebasename = os.path.basename(path)
            fileinfos = os.path.splitext(filebasename)
            filename = fileinfos[0]
            fileext = fileinfos[1]

            relpath = os.path.relpath(input_dir, input_dir)
            php_config_package_path = os.path.join(php_config_package_dir, relpath)
            php_config_package_path = os.path.abspath(php_config_package_path)

            if not os.path.exists(php_config_package_path) :
                os.mkdirs(php_config_package_path)

            if fileext == '.csv' :
                output_file_name = output_dirs['json'] + os.sep + filename + '.json'
                input_file_name = path
                try :
                    # 生成json格式的文件
                    configDict = csvFileToJsonFile(input_file_name, output_file_name)
                except Exception, e :
                    logging.error("配置文件%s内容有误"%(input_file_name))
                    raise e

                # 生成php格式的文件
                php_config_file_name = os.path.join(php_config_package_path, filename + '.php')
                open(php_config_file_name, 'w').write("<?php\nreturn " + pyDictToPhpArray(None, configDict, 0))
                # logging.debug("生成PHP的配置文件%s于目录%s下"%(filename + '.php', php_config_package_path))
                # 生成lua格式的文件
                output_file_name = output_dirs['lua'] + os.sep + filename + '.lua'
                lua_extends = """
if GameConfig ~= nil and GameConfig.addSingleConfig ~= nil then
    GameConfig:addSingleConfig('%s',cfg)
end
return cfg"""
                open(output_file_name, 'w').write("local cfg=%s\n%s"%(pyDictToLuaDict(configDict), lua_extends))
                logging.debug("将csv格式的文件 %s 导出为lua 格式的文件 %s"%(path, output_file_name))



# 定义运行方法
def run(config) :

    projectRoot = config['project_root']
    inputConfigDir = projectRoot + os.sep + config['config_input_path']
    outputConfigBaseDir = projectRoot + os.sep + config['config_output_path']
    jsonOutputConfigDir = outputConfigBaseDir + os.sep + getConfig(config, 'config_output_format.json')
    luaOutputConfigDir = outputConfigBaseDir + os.sep + getConfig(config, 'config_output_format.lua')
    outputDirs = {'json' : jsonOutputConfigDir, 'lua' : luaOutputConfigDir}
    projectName = config['project_name']

    jsonFileExtName = 'json'

    phpConfigPackagePath = config['project_root'] + os.sep + getConfig(config, 'package_path.php')

    # 如果php配置包的路径不存在，则创建
    if not os.path.exists(phpConfigPackagePath) :
        os.mkdirs(phpConfigPackagePath)

    # 如果输出json格式文件的目录已经存在，需要递归地删除并重新创建其跟目录路径
    if os.path.exists(jsonOutputConfigDir) :
        delDirectoryRecursive(jsonOutputConfigDir)
    if not os.path.exists(jsonOutputConfigDir) :
        os.makedirs(jsonOutputConfigDir)

    if os.path.exists(luaOutputConfigDir) :
        delDirectoryRecursive(luaOutputConfigDir)
    if not os.path.exists(luaOutputConfigDir) :
        os.makedirs(luaOutputConfigDir)

    # 其中需要忽略的目录
    ignoreDirList = [] # 因为策划配置使用的基本上所svn，在目录中会出现.svn的目录，这样的目录所需要忽略的
    findIgnoreDirectories(inputConfigDir, ignoreDirList)

    # 开始转换输入路径下的csv文件到对应的输出路径
    # 需要输出json，php，lua格式的文件
    exportConfig(inputConfigDir, outputDirs, phpConfigPackagePath, ignoreDirList)


