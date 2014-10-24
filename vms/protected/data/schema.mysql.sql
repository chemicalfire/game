drop table if exists `tbl_version`;
create table if not exists `tbl_version` (
  `id` int(11) unsigned not null auto_increment comment '版本ID号',
  `code` char(32) not null default '' comment '版本编号',
  `create` int(11) unsigned not null default 0 comment '发布版本时的时间戳',
  `status` smallint(5) unsigned not null default 0 comment '版本的状态',
  `log` text not null comment '版本日志',
  `backend` char(32) not null default '' comment '后端tag版本号',
  `frontend` char(32) not null default '' comment '前段tag版本号',
  `script` char(32) not null default '' comment '脚本tag版本号',
  `config` char(32) not null default '' comment '配置tag版本号',
  `asset` char(32) not null default '' comment 'asset版本号tag',
  primary key (`id`),
  unique key (`code`)
) engine=innodb charset=utf8 comment '版本库';


drop table if exists `tbl_sub_version`;
create table if not exists `tbl_sub_version` (
  `type` char(32) not null default '' comment '版本的类型，例如：backend/frontend/script/config/asset',
  `version` char(32) not null default '' comment '各个类型tag的版本号',
  `create` int(11) unsigned not null default 0 comment '该类型的版本tag的创建时间戳',
  primary key (`type`, `version`)
) engine=innodb charset=utf8 comment '子版本库';
