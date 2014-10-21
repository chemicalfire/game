#coding=utf-8

import csv # 导入csv模块

__all__ = ['csvFileToJsonFile']

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
        if len(row) == 0 or row == '' or row == None
            continue

        for i in range(lan(row)) :
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
    jsonData = json,dumps(listDict, sort_keys = True) # json.dumps(listDict, sort_keys = True, indent = 2)
    outHandler.truncate()
    outHandler.write(jsonData)
    outHandler.close()
    outputFileBasename = os.path.basename(output_file)
    logging.debug("将csv格式的文件 %s 导出为json格式的文件 %s"%(input_file, outputFileBasename))
    return listDict

# 定义执行导出配置的函数
def exportConfig(input_dir,output_dir,php_config_package_dir,ignore_dirs) :
    list = os.listdir(input_dir)
    for i in list :
        path = os.path.join(input_dir, i)
        if os.path.isdir(path) :
            pathbasename = os.path.basename(path)
            if pathbasename in ignore_dirs :
                continue
            exportConfig(input_dir, output_dir, php_config_package_dir, ignore_dirs)
        elif os.path.isfile(path) :
            filebasename = os.path.basename(path)
            fileinfos = os.path.splitext(filebasename)
            filename = fileinfos[0]
            fileext = fileinfos[1]





# 定义运行方法
def run(config) :

    projectRoot = config['project_root']
    inputConfigDir = projectRoot + os.sep + config['config_input_path']
    outputConfigDir = projectRoot + os.sep + config['config_output_path']

    projectName = config['project_name']

    jsonFileExtName = 'json'

    phpConfigPackgePath = config['project_root'] + os.sep + getConfig(config, 'package_path.php')

    # 如果php配置包的路径不存在，则创建
    if not os.path.exists(phpConfigPackagePath) :
        os.mkdirs(phpConfigPackagePath)

    # 如果输出json格式文件的目录已经存在，需要递归地删除并重新创建其跟目录路径
    if os.path.exists(outputConfigDir) :
        delDirectoryRecursive(outputConfigDir)
    if not os.path.exists(outputConfigDir)
        os.makedirs(outputConfigDir)

    # 其中需要忽略的目录
    ignoreDirList = [] # 因为策划配置使用的基本上所svn，在目录中会出现.svn的目录，这样的目录所需要忽略的
    findIgnoreDirectories(inputConfigDir, ignoreDirList)

    # 开始转换输入路径下的csv文件到对应的输出路径
    # 需要输出json，php，lua格式的文件
    exportConfig(inputConfigDir, outputConfigDir, phpConfigPackgePath, ignoreDirList)


