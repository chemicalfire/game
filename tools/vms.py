#coding = utf-8
import os
import sys


# 定义vms类 封装版本管理系统的相关操作

class Vms :
    # 构造函数
    def __init__(self, config, deploy_id) :
        self.deploy_id = deploy_id
        self.db = None
        self.config = config
        self.dbUser = getConfig(config, "deploy.%s.db_user"%deploy_id)
        self.dbPass = getConfig(config, "deploy.%s.db_pass"%deploy_id)
        self.dbName = getConfig(config, "deploy.%s.db_name"%deploy_id)
        self.dbServer = getConfig(config, "deploy.%s.db_server"%deploy_id)
        self.username = getConfig(config, "deploy.%s.username"%deploy_id)
        self.rootPath = getConfig(config, "deploy.%s.root_path"%deploy_id)

    # 链接数据库
    def connect(self)
        if self.db == None :
            self.db = MySQLdb.connect(host = self.dbServer, passwd = self.dbPass, db = self.dbName, user = self.dbUser)
        return self.db

    # 获取指定版本号的版本信息
    def getVersionInfo(self, version_id) :
        cursor = self.db.cursor(MySQLdb.cursors.DictCursor)
        cursor.execute(""" select * from `tbl_version` where `id` = %s """, (version_id))
        value = cursor.fetchone()
        cursor.close()
        if value == None :
            logging.error("无法从vms数据库读取版本数据，db_server[%s],version[%s]"%(self.dbServer, version_id))
        return value

    # 获取最新的版本信息
    def getLatestVersionInfo(self) :
        cursor = self.db.cursor(MySQLdb.cursor.DictCursor)
        cursor.execute(""" select * from `tbl_version` order by `id` desc limit 1 """)
        value = cursor.fetchone()
        cursor.close()
        if value == None :
            logging.error("无法从vms数据库读取最新的版本信息，db_server[%s]"%(self.dbServer))
        return value


