drop table if exists `tbl_version`;
create table if not exists `tbl_version` (
  `id` int(11) unsigned not null auto_increment comment '版本ID号',
  `code` varchar(32) not null default '' comment '版本编号',
  `create` int(11) unsigned not null default 0 comment '发布版本时的时间戳',
  `status` smallint(5) unsigned not null default 0 comment '版本的状态',
  `log` text not null comment '版本日志',
  `modules` text not null comment '模块信息',
  primary key (`id`),
  unique key (`code`)
) engine=innodb charset=utf8 comment '版本库';