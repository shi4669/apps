--
-- アプリケーションデータベース（apps_db）の作成
--
CREATE DATABASE apps_db CHARACTER SET utf8;

-- 権限の設定
--  ユーザ名：appsuser
--  パスワード：appspass
--  apps_dbデータベースに対する全てのアクセス権を与える
-- 

GRANT ALL ON apps_db.* TO 'appsuser'@'localhost' IDENTIFIED BY 'appspass';

FLUSH PRIVILEGES;

USE customer_management;

-- セグメント情報（segments）の作成
--
CREATE TABLE `ipaddresses` (
  `id` int(20) NOT NULL auto_increment,
  `ipaddress` varchar(256) default NULL,
  `segment_id` varchar(11) default NULL,
  `ip_div_id` varchar(11) default NULL,
  `icmp_div_id` varchar(11) default NULL,
  `ip_status_id` varchar(11) default NULL,
  `mointor_device_id` varchar(11) default NULL,      
  `device_category_id` varchar(11) default NULL,      
  `hostname` varchar(256) default NULL,
  `host_detail` varchar(512) default NULL,
  `requester` varchar(512) default NULL,    
  `request_date` datetime default NULL,
  `tag` varchar(512) default NULL,
  `dns_domain` varchar(512) default NULL,
  `dns_server` varchar(512) default NULL,    
  `comment` varchar(512) default NULL,    
  `memo1` varchar(5000) default NULL,
  `memo2` varchar(5000) default NULL,  
  `created_id` varchar(255) default NULL,
  `updated_id` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ip_div_categories` (
  `id` int(11) NOT NULL auto_increment,
  `ip_div_name` varchar(256) default NULL,
  `created_id` varchar(255) default NULL,
  `updated_id` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,  
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `icmp_div_categories` (
  `id` int(11) NOT NULL auto_increment,
  `icmp_div_name` varchar(256) default NULL,
  `created_id` varchar(255) default NULL,
  `updated_id` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,  
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into icmp_div_categories(icmp_div_name) values('応答あり');
insert into icmp_div_categories(icmp_div_name) values('応答なし');

CREATE TABLE `ip_status_categories` (
  `id` int(11) NOT NULL auto_increment,
  `ip_status_name` varchar(256) default NULL,
  `created_id` varchar(255) default NULL,
  `updated_id` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,  
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into ip_status_categories(ip_status_name) values('未割当');
insert into ip_status_categories(ip_status_name) values('稼働中');
insert into ip_status_categories(ip_status_name) values('予約済');
insert into ip_status_categories(ip_status_name) values('申請中');
insert into ip_status_categories(ip_status_name) values('未割当(割当実績あり)');

CREATE TABLE `device_categories` (
  `id` int(11) NOT NULL auto_increment,
  `device_name` varchar(256) default NULL,
  `created_id` varchar(255) default NULL,
  `updated_id` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,  
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into device_categories(device_name) values('サーバ');
insert into device_categories(device_name) values('ネットワーク機器');
insert into device_categories(device_name) values('仮想基盤');
insert into device_categories(device_name) values('ディスク');

CREATE TABLE `monitor_device_categories` (
  `id` int(11) NOT NULL auto_increment,
  `monitor_device_name` varchar(256) default NULL,
  `created_id` varchar(255) default NULL,
  `updated_id` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,    
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into monitor_device_categories(monitor_device_name) values('JP1');
insert into monitor_device_categories(monitor_device_name) values('NetCrunch');



-- セグメント情報（segments）の作成
--
CREATE TABLE `segments` (
  `id` int(11) NOT NULL auto_increment,
  `segment_name` varchar(256) default NULL,
  `location_id` varchar(11) default NULL,  
  `segment_ipaddress` varchar(256) default NULL,
  `segment_subnet` varchar(256) default NULL,  
  `segment_owner_id` varchar(11) default NULL,
  `segment_status_id` varchar(11) default NULL,
  `segment_div_id` varchar(11) default NULL,
  `segment_source_device` varchar(256) default NULL,    
  `segment_status_date` datetime default NULL,    
  `memo` varchar(5000) default NULL,
  `created_id` varchar(255) default NULL,
  `updated_id` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `segment_status_categories` (
  `id` int(11) NOT NULL auto_increment,
  `segment_status_name` varchar(256) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into segment_status_categories(segment_status_name) values('本番稼働中');
insert into segment_status_categories(segment_status_name) values('本番稼働前');
insert into segment_status_categories(segment_status_name) values('廃止');


CREATE TABLE `segment_divs` (
  `id` int(11) NOT NULL auto_increment,
  `segment_div_name` varchar(256) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into segment_divs(segment_div_name) values('業務');
insert into segment_divs(segment_div_name) values('管理(バックアップ）');
insert into segment_divs(segment_div_name) values('管理（クラスタ)');


--
-- 拠点一覧（locations）の作成
--
CREATE TABLE `locations` (
  `id` int(11) NOT NULL auto_increment,
  `location_name` varchar(256) default NULL,
  `created_id` varchar(255) default NULL,
  `updated_id` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- 変更履歴（changes）の作成
--
CREATE TABLE `changes` (
  `id` int(11) NOT NULL auto_increment,
  `change_title` varchar(256) default NULL,
  `change_target` varchar(256) default NULL,
  `change_target_detail` varchar(256) default NULL,
  `change_target_mng_no` varchar(256) default NULL,    
  `change_target_date` datetime default NULL,  
  `change_div_id` varchar(10) default NULL,
  `change_status_id` varchar(10) default NULL,
  `change_detail` varchar(1000) default NULL,
  `change_doc_id` varchar(10) default NULL,
  `change_doc_detail` varchar(1000) default NULL,
  `operation_doc` varchar(1000) default NULL,
  `shared_div_id` varchar(10) default NULL,
  `service_affect_id` varchar(10) default NULL,  
  `affect_detail` varchar(1000) default NULL,
  `shared_detail` varchar(1000) default NULL,
  `tag` varchar(512) default NULL,    
  `memo` varchar(1000) default NULL,    
  `created_id` varchar(255) default NULL,
  `updated_id` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into changes   (change_target,change_target_date,change_target_detail,change_div,change_status,change_detail,change_doc_div,change_doc_detail)  values   ('SYSSL18','2016-04-12','ファイルサーバ権限変更','1','2','メンテナンスのため','0','なし');
insert into changes   (change_target,change_target_date,change_target_detail,change_div,change_status,change_detail,change_doc_div,change_doc_detail)  values   ('SYSS100','2016-04-13','定期メンテナンスのための再起動','2','1','メンテナンスのため','0','なし');
 insert into changes   (change_target,change_target_date,change_target_detail,change_div,change_status,change_detail,change_doc_div,change_doc_detail)  values   ('Hoge100','2016-04-14','HogeHoge機器ネットワーク接続','1','1','メンテナンスのため','0','なし');

insert into changes   (change_target,change_target_date,change_target_detail,change_div,change_status,change_detail,change_doc_div,change_doc_detail)  values   ('Hoge200','2016-04-14','HogeHoge機器交換作業','2','3','メンテナンスのため','0','なし');


--
-- 変更区分（change_div）の作成
--
CREATE TABLE `change_divs` (
  `id` int(11) NOT NULL auto_increment,
  `change_div_name` varchar(256) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into change_divs(change_div_name) values('メンテナンス作業');
insert into change_divs(change_div_name) values('ライン業務');

--
-- 変更状況（change_progresses）の作成
--
CREATE TABLE `change_progresses` (
  `id` int(11) NOT NULL auto_increment,
  `progress_name` varchar(256) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into change_progresses(progress_name) values('対応待ち');
insert into change_progresses(progress_name) values('完了');
2insert into change_progresses(progress_name) values('レビュー資料作成中');

--
-- 汎用コード（general_codes）の作成
--
CREATE TABLE `general_codes` (
  `id` int(11) NOT NULL auto_increment,
  `code_name` varchar(256) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

i2nsert into general_codes(code_name) values('あり');
insert into general_codes(code_name) values('なし');


+---------------+--------------+------+-----+---------+----------------+
2| Field         | Type         | Null | Key | Default | Extra          |
+---------------+--------------+------+-----+---------+----------------+
| id            | int(11)      | NO   | PRI | NULL    | auto_increment |
| loaded        | datetime     | YES  |     | NULL    |                |
| host_name     | varchar(256) | YES  |     | NULL    |                |
| software_name | varchar(512) | YES  |     | NULL    |                |
| version       | varchar(512) | YES  |     | NULL    |                |
| maker         | varchar(512) | YES  |     | NULL    |                |
| input_div     | varchar(2)   | YES  |     | NULL    |                |
| created_id    | varchar(255) | YES  |     | NULL    |                |
| updated_id    | varchar(255) | YES  |     | NULL    |                |
| created       | datetime     | YES  |     | NULL    |                |
| modified      | datetime     | YES  |     | NULL    |                |
+---------------+--------------+------+-----+---------+----------------+


CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) default NULL,
  `password` varchar(50) default NULL,
  `user_full_name` varchar(50) default NULL,
  `mail_address` varchar(50) default NULL,    
  `user_div` varchar(1) default '0',
  `mail_send_div` varchar(1) default '1',    
  `created` datetime default NULL,
  `modified` datetime default NULL,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `task_categories` (
  `id` int(11) NOT NULL auto_increment,
  `task_category_name` varchar(256) default NULL,
  `created_id` varchar(255) default NULL,
  `updated_id` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `templates` (
  `id` int(11) NOT NULL auto_increment,
  `templates_name` varchar(256) default NULL,
  `task_category_id` varchar(2) default '1',  
  `subject` varchar(256) default NULL,  
  `destination` varchar(256) default NULL,
  `attachment` varchar(512) default NULL,  
  `mail_templates` varchar(2048) default NULL,
  `situation` varchar(2048) default NULL,
  `usages` varchar(2048) default NULL,
  `tag` varchar(256) default NULL,    
  `memo` varchar(2048) default NULL,
  `history` varchar(2048) default NULL,
  `created_id` varchar(255) default NULL,
  `updated_id` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `memos` (
  `id` int(11) NOT NULL auto_increment,
  `memo_title` varchar(256) default NULL,
  `memo_date` datetime default NULL,    
  `task_category_id` varchar(2) default '1',
  `memo_category_id` varchar(2) default '1',
  `prj_name` varchar(256) default NULL,      
  `tag` varchar(256) default NULL,    
  `memo` varchar(5000) default NULL,
  `memo2` varchar(5000) default NULL,
  `created_id` varchar(255) default NULL,
  `updated_id` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `memo_categories` (
  `id` int(11) NOT NULL auto_increment,
  `memo_category_name` varchar(256) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into memo_categories values('1','非公開');
insert into memo_categories values('2','公開');

CREATE TABLE `todos` (
  `id` int(11) NOT NULL auto_increment,
  `todo_title` varchar(256) default NULL,
  `todo_date` datetime default NULL,    
  `task_category_id` varchar(2) default '1',
  `todo_category_id` varchar(2) default '1',
  `todo_progress_id` varchar(2) default '1',
  `prj_name` varchar(256) default NULL,  
  `tag` varchar(256) default NULL,
  `element` varchar(512) default NULL,        
  `memo` varchar(2048) default NULL,
  `memo2` varchar(2048) default NULL,
  `created_id` varchar(255) default NULL,
  `updated_id` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `todo_progresses` (
  `id` int(11) NOT NULL auto_increment,
  `progress_name` varchar(256) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `todo_categories` (
  `id` int(11) NOT NULL auto_increment,
  `todo_category_name` varchar(256) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `links` (
  `id` int(11) NOT NULL auto_increment,
  `link_title` varchar(256) default NULL,
  `link_category_id` varchar(2) default '1',
  `memo_category_id` varchar(2) default '1',  
  `tag` varchar(256) default NULL,
  `link_methods_id` varchar(2) default '1',
  `link` varchar(2048) default NULL,  
  `memo` varchar(2048) default NULL,
  `memo2` varchar(2048) default NULL,  
  `created_id` varchar(255) default NULL,
  `updated_id` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `link_categories` (
  `id` int(11) NOT NULL auto_increment,
  `link_category_name` varchar(256) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `link_methods` (
  `id` int(11) NOT NULL auto_increment,
  `link_method_name` varchar(256) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into link_methods values('1','UNCパス形式');
insert into link_methods values('2','http形式');


CREATE TABLE `isc_memos` (
  `id` int(11) NOT NULL auto_increment,
  `memo_title` varchar(256) default NULL,
  `memo_date` datetime default NULL,    
  `source` varchar(2056) default '1',
  `isc_memo_category_id` varchar(2) default '1',  
  `tag` varchar(256) default NULL,    
  `memo1` varchar(5000) default NULL,
  `memo2` varchar(5000) default NULL,
  `memo3` varchar(2000) default NULL,
  `memo4` varchar(2048) default NULL,    
  `created_id` varchar(255) default NULL,
  `updated_id` varchar(255) default NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `isc_memo_categories` (
  `id` int(11) NOT NULL auto_increment,
  `memo_category_name` varchar(256) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into isc_memo_categories values(1,'インシデント');
insert into isc_memo_categories values(2,'資料連携');
insert into isc_memo_categories values(3,'セミナー案内');
