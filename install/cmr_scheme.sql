-- Host: localhost
-- Generato il: 16 Giu, 2007 at 12:45 PM
-- Versione MySQL: 4.1.9
-- 
-- Database: `camaroes`
-- 

-- --------------------------------------------------------

-- 
--  `cmr_account`
-- 
--  
--  
-- 

CREATE TABLE IF NOT EXISTS `cmr_account` (
  `id` bigint(20) NOT NULL auto_increment,
  `url` varchar(254) NOT NULL default '',
  `user_email` varchar(254) NOT NULL default '',
  `uid` varchar(254) NOT NULL default '',
  `pw` varchar(254) NOT NULL default '',
  `server` varchar(254) NOT NULL default '',
  `service` varchar(254) NOT NULL default 'extern_service.name',
  `port` bigint(20) NOT NULL default '0',
  `protocol` varchar(254) NOT NULL default '',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`pw`)
) TYPE=MyISAM COMMENT='table of accounts' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_asset`
-- 
--  
--  
-- 

CREATE TABLE IF NOT EXISTS `cmr_asset` (
  `id` bigint(20) NOT NULL auto_increment,
  `serial` varchar(254) default '',
  `mac_adress` varchar(254) default '',
  `name` varchar(50) NOT NULL default 'localhost',
  `location` varchar(254) default '',
  `ip` varchar(50) NOT NULL default '127.0.0.1',
  `nat_ip` varchar(254) NOT NULL default '',
  `mask` varchar(254) default '',
  `gateway` varchar(254) default '',
  `dns1` varchar(254) default '',
  `dns2` varchar(254) default '',
  `type` enum('', 'router','switch','printer','fax','telefone','screem','firewall','pc','model') NOT NULL default 'pc',
  `os` varchar(254) NOT NULL default '',
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `login_id` varchar(254) NOT NULL default '',
  `login_pw` varchar(254) NOT NULL default '',
  `check_command` varchar(254) NOT NULL default 'extern_command.name',
  `certificate` varchar(254) NOT NULL default 'extern_certificate.name',
  `my_master`  varchar(254) NOT NULL default 'extern_asset.name',
  `my_software`  varchar(254) NOT NULL default 'extern_software.name',
  `my_service`  varchar(254) NOT NULL default 'extern_service.name',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`,`ip`),
  KEY `ip` (`ip`)
) TYPE=MyISAM COMMENT='table of all asset' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_certificate`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_certificate` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `serial` varchar(254) NOT NULL default '',
  `user_email` varchar(254) NOT NULL default '',
  `version` varchar(254) NOT NULL default '',
  `to_cn` varchar(254) default '',
  `to_o` varchar(254) default '',
  `to_ou` varchar(254) default '',
  `from_cn` varchar(254) default '',
  `from_o` varchar(254) default '',
  `from_ou` varchar(254) default '',
  `valid_from` datetime NOT NULL default '2000-01-01 01:01:01',
  `valid_to` datetime NOT NULL default '2000-01-01 01:01:01',
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `cert_pkcs` varchar(254) default '',
  `pub_key_pkcs` varchar(254) NOT NULL default '',
  `status` enum('', 'valid','revocation') default '',
  `type` varchar(254) NOT NULL default 'default',
  `login_script` text,
  `public_key` text,
  `private_key` text,
  `pass_phrase` varchar(254) NOT NULL default '',
  `my_master`  varchar(254) NOT NULL default 'extern_certificate.name',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uid` (`serial`),
  UNIQUE KEY `serial` (`serial`),
  UNIQUE KEY `email` (`from_cn`)
) TYPE=MyISAM COMMENT='table of certificates' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
--  `cmr_code`
-- 
--  
--  
-- 

CREATE TABLE IF NOT EXISTS `cmr_code` (
  `id` bigint(20) NOT NULL auto_increment,
  `code` varchar(254) NOT NULL default '',
  `script` text,
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `code` (`code`)
) TYPE=MyISAM COMMENT='table of text code' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
--  `cmr_command`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_command` (
  `id` bigint(20) NOT NULL auto_increment,
  `command_name` varchar(254) NOT NULL default '',
  `command_line` varchar(254) NOT NULL default '',
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`command_name`)
) TYPE=MyISAM COMMENT='table of commands' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
--  `cmr_contact`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_contact` (
  `id` bigint(20) NOT NULL auto_increment,
  `uid` varchar(254) NOT NULL default '',
  `name` varchar(100) NOT NULL default '',
  `last_name` varchar(254) default '',
  `sexe` enum('', 'M','F') default '',
  `function` varchar(254) default '',
  `email` varchar(254) default '',
  `email_sign` text,
  `tel` varchar(254) default '',
  `cel` varchar(254) default '',
  `adress` varchar(254) default '',
  `location` varchar(254) NOT NULL default '',
  `country` varchar(254) NOT NULL default 'enable',
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `status` enum('', 'connect','disconnect') default '',
  `lang` varchar(254) NOT NULL default 'italian',
  `style` varchar(254) NOT NULL default 'default',
  `public_key` text,
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uid` (`uid`),
  UNIQUE KEY `email` (`email`)
) TYPE=MyISAM PACK_KEYS=0 COMMENT='table of contacts' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
--  `cmr_cron`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_cron` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `command` varchar(254) NOT NULL default 'extern_command.command_name',
  `at` timestamp NOT NULL default '2000-01-01 01:01:01',
  `type` enum('', 'normal','php','windows','linux','unix','solaris','database') NOT NULL default 'normal',
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM COMMENT='table of cron job commands' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_download`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_download` (
  `id` bigint(20) NOT NULL auto_increment,
  `url` varchar(254) NOT NULL default '',
  `path` varchar(254) default '',
  `file_name` varchar(254) default '',
  `file_type` varchar(254) default '',
  `file_size` varchar(254) default '',
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='Table of file to download' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_email`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_email` (
  `id` bigint(20) NOT NULL auto_increment,
  `encoding` varchar(254) NOT NULL default '',
  `lang` varchar(254) NOT NULL default '',
  `header` text,
  `mail_title` varchar(254) NOT NULL default '',
  `mail_from` varchar(254) NOT NULL default '',
  `mail_to` varchar(254) NOT NULL default '',
  `mail_cc` varchar(254) NOT NULL default '',
  `mail_bcc` varchar(254) NOT NULL default '',
  `attach` enum('', 'yes','no') default 'no',
  `text` text,
  `my_master`  varchar(254) NOT NULL default 'extern_email.name',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM PACK_KEYS=0 COMMENT='table of emails' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_faq`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_faq` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `argoment` varchar(254) NOT NULL default '',
  `question` text,
  `response` text,
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM COMMENT='table of faqs' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
--  `cmr_father_groups`
-- 
--  
--  
-- 

CREATE TABLE IF NOT EXISTS `cmr_father_groups` (
  `id` bigint(20) NOT NULL auto_increment,
  `group_father` varchar(50) NOT NULL default 'extern_groups.name',
  `group_child` varchar(50) NOT NULL default 'extern_groups.name',
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `group_father` (`group_father`,`group_child`)
) TYPE=MyISAM COMMENT='table of father groups' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
--  `cmr_forum`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_forum` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `argoment` varchar(254) NOT NULL default '',
  `text` text,
  `my_master`  varchar(254) NOT NULL default 'extern_forum.name',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM COMMENT='table of forum' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_generator`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_generator` (
  `id` bigint(20) NOT NULL auto_increment,
  `db` varchar(254) NOT NULL default '',
  `table` varchar(254) NOT NULL default '0',
  `column` varchar(254) NOT NULL default '',
  `code1` enum('', '@_database_@','@_show_create_db_@','@_date_time_@','@_db_date_time_@','@_db_privileges_@','@_db_caracter_set_@','@_db_collation_@','@_db_type_@','@_pre_match_@','@_form_name_@','@_table_@','@_table_name_@','@_show_create_table_@','@_table_engine_@','@_table_version_@','@_table_row_format_@','@_table_rows_@','@_table_avg_row_length_@','@_table_data_length_@','@_table_max_data_length_@','@_table_index_length_@','@_table_data_free_@','@_table_auto_increment_@','@_table_create_time_@','@_table_update_time_@','@_table_check_time_@','@_table_collation_@','@_table_checksum_@','@_table_create_options_@','@_table_comment_@','@_table_index_@','@_table_num_row_@','@_table_num_column_@','@_table_primary_@','@_table_type_@','@_table_privilege_@','@_table_date_time_@','@_table_non_unique_@','@_table_key_name_@','@_table_seq_in_index_@','@_table_column_name_@','@_table_cardinality_@','@_table_sub_part_@','@_table_packed_@','@_table_index_type_@','@_column_@','@_column_id_@','@_column_count_@','@_column_null_@','@_column_default_@','@_column_extra_@','@_column_field_@','@_column_type_@','@_column_collation_@','@_column_key_@','@_column_privileges_@','@_column_comment_@','@_column_index1_@','@_column_unique1_@','@_column_not_null1_@','@_column_extern1_@','@_column_comment1_@','@_column_date_time1_@','@_column_int1_@','@_column_null1_@','@_column_key1_@','@_column_text1_@','@_column_index2_@','@_column_unique2_@','@_column_not_null2_@','@_column_extern2_@','@_column_comment2_@','@_column_date_time2_@','@_column_int2_@','@_column_null2_@','@_column_key2_@','@_column_text2_@','@_column_index3_@','@_column_unique3_@','@_column_not_null3_@','@_column_extern3_@','@_column_comment3_@','@_column_date_time3_@','@_column_int3_@','@_column_null3_@','@_column_key3_@','@_column_text3_@','@_column0_@','@_column1_@','@_column2_@','@_column3_@','@_column4_@','@_column5_@','@_form_label_elmt_@','@_form_box_elmt_@','@_form_box_elmt_upd_@','@_column[0-9]+_@','@_table[0-9]+_@','@_rown[0-9]+_@') NOT NULL default '@_database_@',
  `code2` enum('', '@_foreach_comment_@([^@]*)@@_foreach_comment_@@','@_foreach_db_@([^@]*)@@_foreach_db_@@','@_foreach_table_@([^@]*)@@_foreach_table_@@','@_foreach_column_@([^@]*)@@_foreach_column_@@','@_foreach_rown_@([^@]*)@@_foreach_rown_@@','@_button_@)(.*)(@@_button_@@)') NOT NULL default '@_foreach_comment_@([^@]*)@@_foreach_comment_@@',
  `code3` enum('', '@@date_time@@','@@date@@','@@time@@','@@my_ip@@','@@my_name@@','@@my_last_name@@','@@my_lang@@','@@my_comment@@','@@my_tel@@','@@my_cel@@','@@my_group@@','@@my_function@@','@@my_location@@','@@my_sign@@','@@group_sign@@','@@ticket_number@@','@@ticket_title@@','@@ticket_text@@','@@ticket_assign_to@@','@@ticket_severity@@','@@ticket_state@@','@@ticket_type@@','@@ticket_list_user_inpact@@','@@ticket_list_group_inpact@@','@@ticket_list_asset_inpact@@','@@ticket_sla@@','@@ticket_lang@@','@@ticket_call_log_group@@','@@ticket_comment@@') NOT NULL default '@@date_time@@',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`db`)
) TYPE=MyISAM COMMENT='table for generator' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_groups`
-- 
--  
--  
-- 

CREATE TABLE IF NOT EXISTS `cmr_groups` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `type` enum('', '0_guest','1_contact','1_forum','2_client','2_vip','3_user','4_tecnician','5_noc','5_soc','5_operator','6_admin','7_developer','7_database','0_read_only','1_read_only','2_read_only','3_read_only','4_read_only','5_read_only','6_read_only','7_read_only','0','1','2','3','4','5','6','7') NOT NULL default '0_guest',
  `location` varchar(254) default '',
  `sla` timestamp NOT NULL default '2000-01-01 01:01:01',
  `public_key` text,
  `private_key` text,
  `pass_phrase` varchar(254) default '',
  `email_sign` text,
  `group_email` varchar(254) default 'extern_user.email',
  `admin_email` varchar(254) default 'extern_user.email',
  `home` varchar(254) NOT NULL default 'home/groups/default',
  `notify` enum('', 'by_email','by_sms','by_web','all','unknow') NOT NULL default 'by_email',
  `web_site` varchar(254) default '',
  `login_script` text,
  `adress` varchar(254) default '',
  `my_master`  varchar(254) NOT NULL default 'extern_groups.name',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM COMMENT='table of groups' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_history`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_history` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_email` varchar(254) NOT NULL default 'extern_user.email',
  `table_name` varchar(64) NOT NULL default '',
  `line_id` varchar(64) NOT NULL default '0',
  `action` VARCHAR( 64 ) NOT NULL DEFAULT 'read',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='table of action history' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_message`
-- 
--  
--  
-- 

CREATE TABLE IF NOT EXISTS `cmr_message` (
  `id` bigint(20) NOT NULL auto_increment,
  `sender` varchar(254) NOT NULL default '',
  `title` varchar(254) NOT NULL default 'No title',
  `attach` varchar(254) NOT NULL default '',
  `text` text,
  `groups_dest`  varchar(254) NOT NULL default '',
  `users_dest`  varchar(254) NOT NULL default '',
  `modules_dest`  varchar(254) NOT NULL default '',
  `mail_to` varchar(254) NOT NULL default '',
  `mail_cc` varchar(254) NOT NULL default '',
  `mail_bcc` varchar(254) NOT NULL default '',
  `begin_time` timestamp NOT NULL default '2000-01-01 01:01:01',
  `end_time` timestamp NOT NULL default '2000-01-01 01:01:01',
  `intervale` varchar(254) NOT NULL default '',
  `priority` bigint(20) NOT NULL default '0',
  `type` enum( '', 'text', 'html', 'php', 'email', 'normal', 'news', 'work', 'java_script', 'sql', 'command', 'url', 'cmr', 'NULL' ) NOT NULL default 'text',
  `state` enum('', 'enable', 'disable','NULL') NOT NULL default 'enable',
  `my_master`  varchar(254) NOT NULL default 'extern_message.title',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='table of messages' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_monitor`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_monitor` (
  `id` bigint(20) NOT NULL auto_increment,
  `group_name` varchar(50) NOT NULL default 'extern_groups.name',
  `monitor_group` varchar(50) NOT NULL default '',
  `config` text,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'current date',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `group_name` (`group_name`,`monitor_group`)
) TYPE=MyISAM PACK_KEYS=0 COMMENT='table for monitor' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_va`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_va` (
  `id` bigint(20) NOT NULL auto_increment,
  `group_name` varchar(254) NOT NULL default 'extern_groups.name',
  `va_ip` text,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'current date',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM PACK_KEYS=0 COMMENT='table for va' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_rss`
-- 
-- 
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_rss` (
  `id` bigint(20) NOT NULL auto_increment,
  `version` varchar(254) NOT NULL default '',
  `title` varchar(254) NOT NULL default 'No title',
  `link` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `rating` varchar(254) NOT NULL default '',
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `feed_adress` varchar(254) default '',
  `type` enum('', 'normal','job','ids','xpu','va','rma','hardware_Move','hardware_remove','hardware_add','hardware_replace','new_account','new_group','hardware_install','hardware_request','hardware_restart','software_install','software_remove','software_update','software_request','model','NULL') NOT NULL default 'normal',
  `text` text,
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM PACK_KEYS=0 COMMENT='table of rss' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_services`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_services` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `port` bigint(20) NOT NULL default '0',
  `protocol` varchar(254) NOT NULL default '',
  `check_command` varchar(254) NOT NULL default 'extern_command.command_line',
  `my_master`  varchar(254) NOT NULL default 'extern_services.name',
  `my_slave`  varchar(254) NOT NULL default 'extern_services.name',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM COMMENT='table of services' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_session`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_session` (
  `id` bigint(20) NOT NULL auto_increment,
  `sessionid` varchar(50) NOT NULL default '',
  `sessionip` varchar(50) NOT NULL default '',
  `user_email` varchar(50) NOT NULL default 'extern_user.email',
  `status` varchar(254) NOT NULL default 'disconnect',
  `state` varchar(254) NOT NULL default 'enable',
  `time_out` varchar(254) default '',
  `session_end` timestamp NOT NULL default '2000-01-01 01:01:01',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `sessionid` (`sessionid`,`sessionip`,`user_email`)
) TYPE=MyISAM COMMENT='table of sessions' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_sla`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_sla` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_email` varchar(254) default 'extern_user.email',
  `group_name` varchar(254) NOT NULL default 'extern_groups.name',
  `asset_ip` varchar(254) NOT NULL default '',
  `ticket_type` enum('', 'normal','job','ids','xpu','va','rma','hardware_Move','hardware_remove','hardware_add','hardware_replace','new_account','new_group','hardware_install','hardware_request','hardware_restart','software_install','software_remove','software_update','software_request','model','NULL') NOT NULL default 'normal',
  `ticket_call_method` set('normal','automatic','by_help_desk','by_email','by_phone','by_web','by_sms','unknow','SNMP','NULL') NOT NULL default 'by_email',
  `ticket_state` enum('', 'open','update','close','in_progress','pending','unknow','NULL') NOT NULL default 'open',
  `ticket_severity` enum('', 'info','low','normal','medium','high','critical','NULL') default 'normal',
  `ticket_assign_to` varchar(254) NOT NULL default '',
  `num_user_impact` bigint(20) default 0,
  `num_group_impact` bigint(20) default 0,
  `num_asset_impact` bigint(20) default 0,
  `sla` varchar(254) NOT NULL default '3 DAY',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='table of sla' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_software`
-- 
--  
--  
-- 

CREATE TABLE IF NOT EXISTS `cmr_software` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `type` varchar(254) NOT NULL default '',
  `copyright` varchar(254) NOT NULL default '',
  `certificate` varchar(254) NOT NULL default 'extern_certificate.name',
  `my_master`  varchar(254) NOT NULL default 'extern_software.name',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='table of software' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_statistic`
-- 
--  
--  
-- 

CREATE TABLE IF NOT EXISTS `cmr_statistic` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `type` set('day','week','month','year','other') NOT NULL default '',
  `period_begin` timestamp NOT NULL default '2000-01-01 01:01:01',
  `period_end` timestamp NOT NULL default '2000-01-01 01:01:01',
  `data` text,
  `my_master`  varchar(254) NOT NULL default 'extern_statistic.name',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='table of statistics' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_ticket`
-- 
--  
--  
-- 

CREATE TABLE IF NOT EXISTS `cmr_ticket` (
  `id` bigint(20) NOT NULL auto_increment,
  `number` varchar(20) NOT NULL default '',
  `lang` varchar(20) NOT NULL default '',
  `title` varchar(254) NOT NULL default 'No title',
  `work_by` varchar(254) NOT NULL default 'extern_user.email',
  `call_log_user` varchar(254) default 'extern_user.email',
  `call_log_group` varchar(254) NOT NULL default 'extern_groups.name',
  `call_method` set('normal','automatic','by_help_desk','by_email','by_phone','by_web','by_sms','unknow','SNMP','NULL') default '',
  `state` enum('', 'open','update','close','in_progress','pending','unknow','NULL') NOT NULL default 'open',
  `state_now` enum('', 'opened','updated','closed','open','update','close','in_progress','pending','unknow','NULL') NOT NULL default 'opened',
  `assign_to` varchar(254) default '',
  `list_user_impact` varchar(254) default '',
  `list_group_impact` varchar(124) default '',
  `list_asset_impact` varchar(254) default '',
  `severity` enum('', 'info','low','normal','medium','high','critical','NULL') default 'normal',
  `sla` varchar(64) NOT NULL default '3 DAY',
  `mail_title` varchar(254) NOT NULL default '',
  `mail_from` varchar(254) NOT NULL default 'operator@localhost',
  `mail_to` varchar(254) NOT NULL default 'soc@localhost',
  `mail_cc` varchar(254) NOT NULL default 'noc@localhost',
  `mail_bcc` varchar(254) NOT NULL default 'admin@localhost',
  `attach` varchar(254) NOT NULL default 'operator@localhost',
  `type` enum('', 'normal','job','ids','xpu','va','rma','hardware_Move','hardware_remove','hardware_add','hardware_replace','new_account','new_group','hardware_install','hardware_request','hardware_restart','software_install','software_remove','software_update','software_request','model','NULL') NOT NULL default 'normal',
  `text` text,
  `mail_text` text,
  `my_master` varchar(254) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `number` (`number`),
  FULLTEXT KEY `text` (`text`),
  FULLTEXT KEY `mail_text` (`mail_text`)
) TYPE=MyISAM COMMENT='table of tickets' AUTO_INCREMENT=1 ;
        


-- --------------------------------------------------------

-- 
--  `cmr_translate`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_translate` (
  `id` bigint(20) NOT NULL auto_increment,
  `code` varchar(240) NOT NULL default '',
  `language` varchar(240) NOT NULL default '',
  `text` text,
  `translate_language` varchar(254) NOT NULL default '',
  `translate_text` text,
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='text tranlation table' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_user`
-- 
--  
--  
-- 

CREATE TABLE IF NOT EXISTS `cmr_user` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `uid` varchar(254) NOT NULL default '',
  `name` varchar(100) NOT NULL default '',
  `last_name` varchar(254) default '',
  `nickname` varchar(254) NOT NULL default 'nickname',
  `sexe` enum('', 'M','F') default '',
  `role` varchar(254) default '',
  `sla` varchar(254) default '',
  `pw` varchar(254) default '',
  `email` varchar(254) default '',
  `email_sign` text,
  `tel` varchar(254) default '',
  `cel` varchar(254) default '',
  `home` varchar(254) NOT NULL default 'home/users/default',
  `adress` varchar(254) default '',
  `location` varchar(254) NOT NULL default '',
  `state` enum('', 'enable', 'disable','locked') NOT NULL default 'enable' COMMENT 'user state',
  `status` enum('', 'connect','disconnect')  NOT NULL default 'connect',
  `type` enum('', '0_guest','1_contact','1_forum','2_client','2_vip','3_user','4_tecnician','5_noc','5_soc','5_operator','6_admin','7_developer','7_database','0_read_only','1_read_only','2_read_only','3_read_only','4_read_only','5_read_only','6_read_only','7_read_only','0','1','2','3','4','5','6','7') NOT NULL default '0_guest',
  `lang` varchar(254) NOT NULL default 'italian',
  `style` varchar(254) NOT NULL default 'default',
  `login_script` text,
  `certificate` varchar(254) NOT NULL default 'extern_certificate.user_email',
  `photo` varchar(254) NOT NULL default '',
  `my_master`  varchar(254) NOT NULL default 'extern_user.email',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uid` (`uid`),
  UNIQUE KEY `email` (`email`)
) TYPE=MyISAM COMMENT='table of users' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_user_groups`
-- 
--  
--  
-- 

CREATE TABLE IF NOT EXISTS `cmr_user_groups` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_email` varchar(100) NOT NULL default 'extern_user.email',
  `group_name` varchar(50) NOT NULL default 'extern_groups.name',
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_email` (`user_email`,`group_name`)
) TYPE=MyISAM COMMENT='table of users groups' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_source_code`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_source_code` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `language` varchar(254) default 'html',
  `lang_version` varchar(254) default '',
  `code_version` varchar(254) default '1.0',
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `author` varchar(254) default '',
  `copyright` varchar(254) default '',
  `my_md5` varchar(254) NOT NULL default '',
  `license` text,
  `text` text,
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM COMMENT='table of source code' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_comment`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_comment` (
  `id` bigint(20) NOT NULL auto_increment,
  `title` varchar(254) NOT NULL default '',
  `table_name` varchar(254) NOT NULL default '',
  `line_id` varchar(254) NOT NULL default '',
  `text` text,
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `encoding` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='table of comments' AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
--  `cmr_policy`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_policy` (
  `id` bigint(20) NOT NULL auto_increment,
  `source` varchar(254) NOT NULL default '',
  `table` varchar(254) NOT NULL default '',
  `line` varchar(254) NOT NULL default '',
  `state` enum('', 'enable', 'enable', 'disable') NOT NULL default '',
  `type` enum('', 'allow', 'deny') NOT NULL default '',
  `privilege` enum('', '*', 'all', 'read', 'write', 'run', 'select', 'insert', 'update', 'delete', 'file', 'create', 'alter', 'index', 'drop', 'create temporary tables', 'create view', 'show view', 'create routine', 'alter routine', 'execute', 'grant', 'super', 'process', 'reload', 'shutdown', 'show databases', 'lock tables', 'references', 'replication client', 'replication slave', 'create user') NOT NULL default '',
  `allow_type` varchar(254) NOT NULL default 'extern_user.type',
  `allow_email` varchar(254) NOT NULL default 'extern_user.email',
  `allow_groups` varchar(254) NOT NULL default 'extern_groups.name',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='table of policy' AUTO_INCREMENT=1;


-- --------------------------------------------------------


-- 
-- 
--  `cmr_query`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_query` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `language` varchar(254) default '',
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `text` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='table of query' AUTO_INCREMENT=1 ;



CREATE TABLE  IF NOT EXISTS `cmr_cve` (
 `id` bigint(20) NOT NULL auto_increment,
 `number` varchar(254) NOT NULL,
 `title` varchar(254) NOT NULL,
 `severity` varchar(254) NOT NULL,
 `platform` varchar(254) NOT NULL, `problem` text NOT NULL,
 `solution` text NOT NULL,
 `references` text NOT NULL, `other` text NOT NULL,
 `release_date` datetime NOT NULL,
 `last_revision` datetime NOT NULL,
 `my_master` varchar(254) NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY (`id`) 
 ) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='table of vulnerabilities';



CREATE TABLE  IF NOT EXISTS `cmr_cve_action` (
 `id` bigint(20) NOT NULL auto_increment,
 `cve_number` varchar(254) NOT NULL default 'extern_cve.number',
 `group_name` varchar(254) NOT NULL default 'extern_groups.name',
 `user_email` varchar(254) NOT NULL default 'extern_user.email',
 `asset_ip` varchar(254) NOT NULL default 'extern_asset.ip',
 `service_name` varchar(254) NOT NULL default 'extern_service.name',
 `action` varchar(254) NOT NULL, 
 `ticket_number` varchar(254) NOT NULL default 'extern_ticket.number',
 `my_master` varchar(254) NOT NULL default 'extern_cve_actiom.cve_number',
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY (`id`) 
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='table of vulnerabilities';



--
--  `cmr_config`
--

CREATE TABLE IF NOT EXISTS `cmr_config` (
  `id` bigint(20) NOT NULL auto_increment,
  `file_name` varchar(254) NOT NULL COMMENT 'config file name',
  `key` varchar(254) NOT NULL,
  `value` varchar(254) default NULL,
  `type` enum('config','page','theme','constant') NOT NULL,
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `date_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `code` (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='table of text config value' AUTO_INCREMENT=1 ;



-- Host: localhost
-- Generato il: 16 Giu, 2007 at 12:45 PM
-- Versione MySQL: 4.1.9
-- 
-- Database: `camaroes`
-- 

-- --------------------------------------------------------

-- 
--  `cmr_user`
-- 
--  
--  
-- 
INSERT IGNORE INTO `cmr_user` VALUES ('', 'developer', 'developer', 'developer', 'developer', '', 'developer', '', MD5('developer'), 'developer@localhost', '', '', '', 'home/users/developer', '', '', 'locked', 'disconnect', '7_developer', 'english', 'default', '', 'extern_certificate.user_email', '', '', NOW());
INSERT IGNORE INTO `cmr_user` VALUES ('', 'admin', 'admin', 'admin', 'admin', '', 'admin', '', MD5('admin'), 'admin@localhost', '', '', '', 'home/users/default', '', '', 'enable', 'disconnect', '6_admin', 'english', 'default', '', 'extern_certificate.user_email', '', '', NOW());
INSERT IGNORE INTO `cmr_user` VALUES ('', 'operator', 'operator', 'operator', 'operator', '', 'operator', '', MD5('operator'), 'operator@localhost', '', '', '', 'home/users/operator', '', '', 'enable', 'disconnect', '5_operator', 'english', 'default', '', 'extern_certificate.user_email', '', '', NOW());
INSERT IGNORE INTO `cmr_user` VALUES ('', 'tecnician', 'tecnician', 'tecnician', 'tecnician', '', 'tecnician', '', MD5('tecnician'), 'tecnician@localhost', '', '', '', 'home/users/tecnician', '', '', 'locked', 'disconnect', '4_tecnician', 'english', 'default', '', 'extern_certificate.user_email', '', '', NOW());
INSERT IGNORE INTO `cmr_user` VALUES ('', 'guest', 'guest', 'guest', 'guest', '', 'guest', '', MD5('guest'), 'guest@localhost', '', '', '', 'home/users/guest', '', '', 'enable', 'disconnect', '0_guest', 'english', 'default', '', 'extern_certificate.user_email', '', '', NOW());
INSERT IGNORE INTO `cmr_user` VALUES ('', 'client', 'client', 'client', 'client', '', 'client', '', MD5('client'), 'client@localhost', '', '', '', 'home/users/client', '', '', 'locked', 'disconnect', '0_guest', 'english', 'default', '', 'extern_certificate.user_email', '', '', NOW());
INSERT IGNORE INTO `cmr_user` VALUES ('', 'demo', 'demo', 'demo', 'demo', '', 'demo', '', MD5('demo'), 'demo@localhost', '', '', '', 'home/users/demo', '', '', 'locked', 'disconnect', '0_guest', 'english', 'default', '', 'extern_certificate.user_email', '', '', NOW());



-- 
--  `cmr_groups`
-- 
--  
--  
-- 

INSERT IGNORE INTO `cmr_groups` VALUES ('', 'developer', 'enable', '7_developer', '', NOW(), '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/developer', 'by_email', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'admin', 'enable', '6_admin', '', NOW(), '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/admin', 'by_email', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'operator', 'enable', '5_operator', '', NOW(), '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/operator', 'by_email', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'first_level', 'enable', '5_noc', '', NOW(), '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/first_level', 'by_email', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'second_level', 'enable', '5_noc', '', NOW(), '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/second_level', 'by_email', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'tecnician', 'enable', '4_tecnician', '', NOW(), '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/tecnician', 'by_email', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'client', 'enable', '2_client', '', NOW(), '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/client', 'by_email', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'demo', 'enable', '0_guest', '', NOW(), '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/demo', 'by_email', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'guest', 'enable', '0_guest', '', NOW(), '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/guest', 'by_email', '', '', '', '', NOW());


-- 
--  `cmr_user_groups`
-- 
--  
--  
-- 

INSERT IGNORE INTO `cmr_user_groups` VALUES ('', 'admin@localhost', 'admin', 'enable', NOW());
INSERT IGNORE INTO `cmr_user_groups` VALUES ('', 'developer@localhost', 'developer', 'enable', NOW());
INSERT IGNORE INTO `cmr_user_groups` VALUES ('', 'operator@localhost', 'operator', 'enable', NOW());
INSERT IGNORE INTO `cmr_user_groups` VALUES ('', 'tecnician@localhost', 'tecnician', 'enable', NOW());
INSERT IGNORE INTO `cmr_user_groups` VALUES ('', 'client@localhost', 'client', 'enable', NOW());
INSERT IGNORE INTO `cmr_user_groups` VALUES ('', 'demo@localhost', 'demo', 'enable', NOW());
INSERT IGNORE INTO `cmr_user_groups` VALUES ('', 'guest@localhost', 'guest', 'enable', NOW());



-- 
--  `cmr_father_groups`
-- 
--  
--  
-- 

INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'admin', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'operator', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'tecnician', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'guest', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'client', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'first_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'second_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'last_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'default', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'operator', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'tecnician', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'guest', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'client', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'first_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'second_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'last_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'default', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'tecnician', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'guest', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'client', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'first_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'second_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'last_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'developer', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'admin', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'operator', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'guest', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'client', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'first_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'second_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'last_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'client', 'client', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'demo', 'demo', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'guest', 'guest', 'enable', NOW());

-- 
--  `cmr_asset`
-- 
--  
--  
-- 

INSERT IGNORE INTO `cmr_asset` VALUES ('', '', '', 'localhost', '', '127.0.0.1', '', '', '', '', '', 'pc', '', 'enable', '', '', 'extern_command.name', 'extern_certificate.to_cn', '', '', 'localhost', NOW());
-- 
--  `cmr_account`
-- 
--  
--  
-- 
INSERT IGNORE INTO `cmr_account` VALUES ('', 'http://localhost', 'admin@localhost', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'localhost', 'extern_service.name', 0, '', NOW());


-- 
--  `cmr_code`
-- 
--  
--  
-- 

INSERT IGNORE INTO `cmr_code` VALUES ('', '{{date_time}}', '$eval_result=date("Y-M-D H:i:s");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{date}}', '$eval_result=date("Y-m-d");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{time}}', '$eval_result=date("h:i:s");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{my_ip}}', '$eval_result=$_SERVER[''REMOTE_ADDR''];\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_email}}', '$eval_result=0;\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_name}}', '$eval_result=0;\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_last_name}}', '$eval_result=0;\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_lang}}', '$eval_result=0;\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_comment}}', '$eval_result=0;\r\nreturn $eval_result;', 'enable', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_tel}}', '$eval_result=0;\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_cel}}', '$eval_result=0;\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_function}}', '$eval_result=0;\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_location}}', '$eval_result=0;\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_email_sign}}', '$eval_result=0;\r\nreturn $eval_result;', '', NOW());

INSERT IGNORE INTO `cmr_code` VALUES ('', '{{groups_name}}', '$eval_result=0;\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{groups_email_sign}}', '$eval_result=0;\r\nreturn $eval_result;', '', NOW());

INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_number}}', '$eval_result=get_post("number");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_title}}', '$eval_result=get_post("title");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_text}}', '$eval_result=get_post("text");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_assign_to}}', '$eval_result=get_post("assign_to");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_severity}}', '$eval_result=get_post("severity");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_state}}', '$eval_result=get_post("state");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_type}}', '$eval_result=get_post("type");', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_list_user_inpact}}', '$eval_result=get_post("list_user_inpact");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_list_group_inpact}}', '$eval_result=get_post("list_group_inpact");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_list_asset_inpact}}', '$eval_result=get_post("ticket_asset_inpact");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_sla}}', '$eval_result=get_post("sla");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_lang}}', '$eval_result=get_post("lang");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_call_log_group}}', '$eval_result=get_post("call_log_group");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_comment}}', '$eval_result=get_post("comment");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_call_log_user}}', '$eval_result=get_post("call_log_group");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_mail_from}}', '$eval_result=get_post("mail_from");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_mail_to}}', '$eval_result=get_post("mail_to");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_mail_cc}}', '$eval_result=get_post("mail_cc");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_mail_bcc}}', '$eval_result=get_post("mail_bcc");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_list_user_impact}}', '$eval_result=get_post("list_user_impact");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_list_group_impact}}', '$eval_result=get_post("list_group_impact");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_list_asset_impact}}', '$eval_result=get_post("list_asset_impact");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_assign_to}}', '$eval_result=get_post("assign_to");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_attach1}}', '$eval_result=get_post("attach1");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_attach2}}', '$eval_result=get_post("attach2");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_attach3}}', '$eval_result=get_post("attach3");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_attach4}}', '$eval_result=get_post("attach4");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_attach}}', '$eval_result=get_post("attach1").",".get_post("attach2").",".get_post("attach3").",".get_post("attach4");\r\nreturn $eval_result;', '', NOW());

INSERT IGNORE INTO `cmr_code` VALUES ('', '{{iss_event_description}}', '$eval_result=0;\r\nreturn $eval_result;', '', NOW());


-- 
--  `cmr_ticket`
-- 
--  
--  
-- 

INSERT IGNORE INTO `cmr_ticket` VALUES ('1', '0507001', 'italian', 'Segnalazione Ticket Normal', '', '', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', 'Ticket [{{ticket_number}}] Segnalazione: {{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'normal', '(breve descrizione se segnalato dal cliente oppure\r\n     descrizione dettagliata se e'' stato rilevato da noi)', '-------------[{{date_time}}]-------------\r\n\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha preso in carico il problema con il\r\nTicket numero {{ticket_number}}.\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('2', '0507002', 'italian', 'Aggiornamento Ticket Normale', 'null', 'null', '', 'by_help_desk', 'update', 'update', 'null', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Aggiornamento: {{ticket_title}}', 'null', 'null', 'null', 'null', '', 'normal', '(breve descrizione dell''aggiornamento)\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha aggiornato lo stato del ticket gia''\r\naperto {{ticket_number}}.\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('3', '0507003', 'italian', 'Chiusura Ticket Normale', 'null', 'null', '', 'by_help_desk', 'close', 'close', '', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Chiusura: {{ticket_title}}', 'null', 'null', 'null', 'null', '', 'normal', '(spiegazioni della chiusura)\r\n', '-------------[{{date_time}}]-------------\r\n Spett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha provveduto a chiudere il ticket  {{ticket_number}}\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer riaprire il Ticket potete rispondere a questo messaggio (senza modificarne l''oggetto) oppure contattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('4', '0507004', 'italian', 'Segnalazione Ticket IDS', '', '', '', 'by_help_desk', 'open', 'open', '', '', '', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Segnalazione IDS: {{ticket_title}}', '', '', '', '', '', 'ids', 'Ticket numero : {{ticket_number}}\r\nNome Eventi :{{ticket_title}}\r\nSource IP : \r\nDestination IP : \r\nSeverity : {{ticket_severity}}\r\n\r\n\r\nPer maggiori dettagli sull''evento segnalato:\r\n{{download}}\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n    la presente per segnalare che il SOC di Camaroes ha rilevato un\r\nevento sospetto attraverso i nostri sistemi di monitoraggio.\r\n\r\n{{ticket_text}}\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer comunicare informazioni utili al declassamento del''evento (in caso\r\ndi falso positivo o a seguito di contromisure implementate al vostro\r\ninterno) rispondete a  questo messaggio (senza  modificarne l''oggetto)\r\noppure contattateci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('5', '0507005', 'italian', 'Aggiornamento Ticket IDS', 'null', 'null', '', 'NULL', 'update', 'update', 'null', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Aggiornamento IDS: {{ticket_title}}', 'null', '', 'null', 'null', '', 'ids', '  in merito all''evento segnalato con il ticket {{ticket_number}}, vi preghiamo di\r\nverificare se l''impatto per la vostra rete risulta essere rilevante.\r\n\r\n\r\n\r\nIn caso contrario o di una mancata vostra risposta considereremo\r\nl''evento non impattante e provvederemo ad abbassare la priorità    di tali\r\neventi mediante l''inserimento di un''event filter.', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere a questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{groups_email_sign}}\r\n', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('6', '0507001', 'italian', 'Chiusura Ticket IDS', 'null', 'null', '', 'NULL', 'close', 'close', 'null', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Chiusura IDS: {{ticket_title}}', 'null', 'null', 'null', 'null', '', 'ids', 'E'' stato inserito un event filter sull''evento segnalato, avente come\r\ncampo destinazione l''indirizzo IP dell''host target.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n  La presente per segnalare che il SOC di Camaroes ha provveduto a\r\nchiudere il ticket {{ticket_number}}.\r\n\r\n{{ticket_text}}.\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer riaprire il Ticket e rialzare la severità   dell''evento potete\r\nrispondere a questo messaggio (senza modificarne l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{groups_email_sign}}.', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('7', '0507008', 'italian', 'RealSecure XPU Update', 'operator@localhost', 'operator@localhost', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'xpu', 'Con la presente vi segnaliamo che Iss ha rilasciato la XPU xx.xx per\r\nRealSecure Network Sensor 7.0.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nRimaniamo a Vs. disposizione per ulteriori chiarimenti al riguardo.\r\n\r\nDistinti saluti.\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('8', '0507008', 'italian', 'SiteProtector - Aggiornamento XPU', 'operator@localhost', 'operator@localhost', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'xpu', '  le sonde di SiteProtector sono state aggiornate all''ultima release\r\ndell''XPU.\r\n\r\nInoltre, come concordato, sono stati attivati i ''drop'' sui seguenti\r\nattacchi con impatto classificato come HIGH.\r\nDi seguito viene fornito l''elenco delle nuove signature bloccate ed una\r\nloro breve descrizione, così come fornita da ISS:\r\n\r\n\r\n(descrizione dettagliata)\r\n', '-------------[{{date_time}}]-------------Buongiorno,\r\n{{ticket_text}}\r\nCordiali saluti\r\n\r\n-- \r\n{{groups_email_sign}}\r\n\r\n', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('9', '0507007', 'italian', 'Riepilogo eventi IDS del 20xx-xx-xx', 'operator@localhost', 'operator@localhost', '', 'normal', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'ids', 'In allegato potete trovare due documenti in formato PDF:\r\n\r\n    1. il primo inerente il report giornaliero degli eventi HIGH e MEDIUM;\r\n\r\n    2. il secondo riguarda il dettaglio degli eventi HIGH con i\r\n       relativi indirizzi IP sorgenti e di destinazione.\r\n', '-------------[{{date_time}}]-------------Buongiorno,\r\n{{ticket_text}}\r\n\r\nRimaniamo a disposizione per eventuali chiarimenti.\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('10', '0507007', 'italian', 'Vulnerability Assessment Richiesta IP', 'operator@localhost', 'operator@localhost', '', 'normal', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', '  al fine di effettuare il previsto Vulnerabilty Assessment, inizieremo le scansioni dopo le 22.00 di oggi verso gli indirizzi IP da voi comunicati.\r\n\r\nQualora non ci siano modifiche rispetto al mese precedente o in caso di\r\nmancato riscontro, porteremo avanti l''attività    con le stesse modalità   \r\ndel mese precedente, dandovi comunque comunicazione via email prima di\r\niniziare una sessione di scan e al termine della stessa.\r\n\r\nGli indirizzi da cui potremmo effettuare il VA saranno i seguenti:\r\n\r\n- \r\n- \r\n', '-------------[{{date_time}}]-------------\r\nBuongiorno,\r\n\r\n{{ticket_text}}\r\nCordiali saluti\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('11', '0507007', 'italian', 'Vulnerability Assessment Inizio', 'operator@localhost', 'operator@localhost', '', 'normal', 'update', 'update', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che alle ore 22.00 avrà    inizio il\r\nprevisto Vulnerability Assessment.\r\n\r\nVi invieremo un''e-mail di conferma a VA effettuato; qualora non dovesse\r\nterminare entro questa notte, il lavoro verrà    interrotto domattina alle\r\n8.00 e ripreso alle 22.00 di domani.', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}.\r\n\r\n\r\nCordiali saluti\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('12', '0507007', 'italian', 'Vulnerability Assessment File zip', 'operator@localhost', 'operator@localhost', '', 'normal', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Buongiorno,\r\n\r\n  in allegato il Vulnerability Assessment effettuato verso la vostra rete. Il file è compresso in formato ZIP e cifrato con password. Per ottenterla potete chiamare il SOC in qualsiasi momento al numero 011 0700912.\r\n\r\n', '-------------[{{date_time}}]-------------\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\n\r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('13', '0507007', 'italian', 'Vulnerability Assessment interotto', 'operator@localhost', 'operator@localhost', '', 'normal', 'update', 'update', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che alle ore 8.00  di questa mattina, è stato interotto come da accordi il Vulnerability Assessment, e vera ripreso soltanto\r\nalle 22.00 di questa notte.\r\n\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nCordiali saluti\r\n\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('14', '0507007', 'italian', 'Vulnerability Assessment continua', 'operator@localhost', 'operator@localhost', '', 'normal', 'update', 'update', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che dalle ore 22.00 continueremo il previsto Vulnerability Assessment a meno di un vostro contrordine.\r\nVi invieremo un''e-mail di conferma a VA effettuato; qualora non dovesse\r\nterminare entro questa notte, il lavoro verrà   interrotto domattina alle\r\n8.00 e ripreso alle 22.00 di domani.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nCordiali saluti\r\n-- \r\n\r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('15', '0507007', 'italian', 'Vulnerability Assessment fine', 'operator@localhost', 'operator@localhost', '', 'normal', 'close', 'close', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che è da poco terminato il previsto Vulnerability Assessment mensile.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nDistinti Saluti.\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('16', '0507007', 'italian', 'Vulnerability Assessment Richiesta IP e Periodo', 'operator@localhost', 'operator@localhost', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', '  al fine di effettuare il previsto Vulnerabilty Assessment mensile,\r\nchiediamo l''autorizzazione per iniziare l''attività   .\r\nQualora ci siano esigenze diverse rispetto al mese scorso vi chiediamo\r\ndi fornirci gli indirizzi IP delle macchine da sottoporre al security probing ed un''indicazione del periodo in cui poter operare.\r\n\r\nQualora non ci siano modifiche rispetto al mese precedente o in caso di mancato riscontro, porteremo avanti l''attività    con le stesse modalità    (indirizzi IP e orario) del mese precedente, dandovi comunque comunicazione via email prima di iniziare una sessione di scan e al termine della stessa.\r\n', '-------------[{{date_time}}]-------------\r\nBuongiorno,\r\n\r\n\r\n\r\nCordiali saluti\r\n\r\n-- \r\n-------------[{{groups_email_sign}}]-------------', 'cmr_model', 'model', NOW());

INSERT IGNORE INTO `cmr_ticket` VALUES ('17', '0507001', 'english', 'Open Normal Ticket', '', '', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', 'Ticket [{{ticket_number}}] Open: {{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'normal', '(Comment)', '-------------[{{date_time}}]-------------\r\n\r\nHi,\r\n Ticket was opened:\r\nTicket number {{ticket_number}}.\r\n\r\n{{ticket_text}}\r\n\r\nRegards,\r\n\r\n-- \r\n.\r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('18', '0507002', 'english', 'Update Normal Ticket', 'null', 'null', '', 'by_help_desk', 'update', 'update', 'null', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Update: {{ticket_title}}', 'null', 'null', 'null', 'null', '', 'normal', '(Comment)\r\n', '-------------[{{date_time}}]-------------\r\nHi,\r\nTicket was updated: {{ticket_number}}.\r\n\r\n{{ticket_text}}\r\n\r\nRegards,\r\n\r\n-- \r\n.\r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('19', '0507003', 'english', 'Close Normal Ticket ', 'null', 'null', '', 'by_help_desk', 'close', 'close', '', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Close: {{ticket_title}}', 'null', 'null', 'null', 'null', '', 'normal', '(Comment)\r\n', '-------------[{{date_time}}]-------------\r\n Hi,\r\nTicket was closed:  {{ticket_number}}\r\n\r\n{{ticket_text}}\r\n\r\nRegards,\r\n\r\n-- \r\n\r\n\r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());

INSERT IGNORE INTO `cmr_ticket` VALUES ('33', '0507009', 'null', 'null', 'null', 'null', '', 'NULL', 'NULL', 'NULL', 'null', 'null', 'null', 'null', '', '3 DAY', 'null', 'null', 'null', 'null', 'null', 'null', 'NULL', 'null', 'null', 'cmr_model', 'model', NOW());

INSERT IGNORE INTO `cmr_ticket` VALUES ('34', '0507001', 'french', 'Ouvrir Ticket Normal', '', '', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', 'Ticket [{{ticket_number}}] Ouvrir: {{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'normal', '(Commentaire)', '-------------[{{date_time}}]-------------\r\n\r\nBonjour,\r\n Ouverture Ticket:\r\nTicket numero {{ticket_number}}.\r\n\r\n{{ticket_text}}\r\n\r\nSalut,\r\n\r\n-- \r\n.\r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('35', '0507002', 'french', 'Ajourner Ticket Normal', 'null', 'null', '', 'by_help_desk', 'update', 'update', 'null', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Ajourner: {{ticket_title}}', 'null', 'null', 'null', 'null', '', 'normal', '(Commentaire)\r\n', '-------------[{{date_time}}]-------------\r\nBonjour,\r\nAjournement Ticket: {{ticket_number}}.\r\n\r\n{{ticket_text}}\r\n\r\nSalut,\r\n\r\n-- \r\n.\r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('36', '0507003', 'french', 'Fermer Ticket Normal', 'null', 'null', '', 'by_help_desk', 'close', 'close', '', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Fermer: {{ticket_title}}', 'null', 'null', 'null', 'null', '', 'normal', '(Commentaire)\r\n', '-------------[{{date_time}}]-------------\r\n Bonjour,\r\nFermeture Ticket:  {{ticket_number}}\r\n\r\n{{ticket_text}}\r\n\r\nSalut,\r\n\r\n-- \r\n\r\n\r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());

INSERT IGNORE INTO `cmr_ticket` VALUES ('51', '0507001', 'default', 'Open Normal Ticket', '', '', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', 'Ticket [{{ticket_number}}] Open: {{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'normal', '(Comment)', '-------------[{{date_time}}]-------------\r\n\r\nHi,\r\n Ticket was opened:\r\nTicket number {{ticket_number}}.\r\n\r\n{{ticket_text}}\r\n\r\nRegards,\r\n\r\n-- \r\n.\r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('52', '0507002', 'default', 'Update Normal Ticket', 'null', 'null', '', 'by_help_desk', 'update', 'update', 'null', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Update: {{ticket_title}}', 'null', 'null', 'null', 'null', '', 'normal', '(Comment)\r\n', '-------------[{{date_time}}]-------------\r\nHi,\r\nTicket was updated: {{ticket_number}}.\r\n\r\n{{ticket_text}}\r\n\r\nRegards,\r\n\r\n-- \r\n.\r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('53', '0507003', 'default', 'Close Normal Ticket ', 'null', 'null', '', 'by_help_desk', 'close', 'close', '', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Close: {{ticket_title}}', 'null', 'null', 'null', 'null', '', 'normal', '(Comment)\r\n', '-------------[{{date_time}}]-------------\r\n Hi,\r\nTicket was closed:  {{ticket_number}}\r\n\r\n{{ticket_text}}\r\n\r\nRegards,\r\n\r\n-- \r\n\r\n\r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());



INSERT IGNORE INTO `cmr_message` VALUES ('1', 'operator@localhost', 'Hello!', '', 'How are you? ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());
INSERT IGNORE INTO `cmr_message` VALUES ('2', 'operator@localhost', 'Simple Normal Message!', '', 'How are you? ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());
INSERT IGNORE INTO `cmr_message` VALUES ('3', 'operator@localhost', 'Simple Email Message!', '', 'How are you? ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());
INSERT IGNORE INTO `cmr_message` VALUES ('4', 'operator@localhost', 'New agenda event!', '', 'New agenda event text ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());
INSERT IGNORE INTO `cmr_message` VALUES ('5', 'operator@localhost', 'New appointment!', '', 'New appointment text ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());
INSERT IGNORE INTO `cmr_message` VALUES ('6', 'operator@localhost', 'New activity!', '', 'New activity text ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());
INSERT IGNORE INTO `cmr_message` VALUES ('7', 'operator@localhost', 'Daily Event!', '', 'Daily Event text ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());
INSERT IGNORE INTO `cmr_message` VALUES ('8', 'operator@localhost', 'Weekly Event!', '', 'Weekly text ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());
INSERT IGNORE INTO `cmr_message` VALUES ('9', 'operator@localhost', 'Mountly Event!', '', 'Mountly text ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());
INSERT IGNORE INTO `cmr_message` VALUES ('10', 'operator@localhost', 'New CLI Command!', '', 'New CLI Command text ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());
INSERT IGNORE INTO `cmr_message` VALUES ('11', 'operator@localhost', 'New SQL Command!', '', 'New SQL Command text ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());
INSERT IGNORE INTO `cmr_message` VALUES ('12', 'operator@localhost', 'New Module Command!', '', 'New Module Command text ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());


INSERT IGNORE INTO `cmr_message` VALUES ('', 'operator@localhost', 'Hello1!', '', 'How are you? ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());
INSERT IGNORE INTO `cmr_message` VALUES ('', 'operator@localhost', 'Hello2!', '', 'How are you? ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());
INSERT IGNORE INTO `cmr_message` VALUES ('', 'operator@localhost', 'Hello3!', '', 'How are you? ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());
INSERT IGNORE INTO `cmr_message` VALUES ('', 'operator@localhost', 'Hello4!', '', 'How are you? ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());
INSERT IGNORE INTO `cmr_message` VALUES ('', 'operator@localhost', 'Hello5!', '', 'How are you? ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());
INSERT IGNORE INTO `cmr_message` VALUES ('', 'operator@localhost', 'Hello6!', '', 'How are you? ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());
INSERT IGNORE INTO `cmr_message` VALUES ('', 'operator@localhost', 'Hello7!', '', 'How are you? ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW( ) , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());





INSERT IGNORE INTO `cmr_policy` VALUES ('' , '*', '*', '*', 'enable', 'deny', '*', '*', '*', '*', NOW());

INSERT IGNORE INTO `cmr_policy` VALUES ('' , '*', '*', '*', 'enable', 'allow', '*', '7', 'developer@localhost', 'developer', NOW());

INSERT IGNORE INTO `cmr_policy` VALUES ('' , '*', '*', '*', 'enable', 'allow', 'read', '4', 'tecnician@localhost', 'tecnician', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('' , '*', '*', '*', 'enable', 'allow', 'select', '4', 'tecnician@localhost', 'tecnician', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('' , '*', '*', '*', 'enable', 'allow', 'file', '5', 'operator@localhost', 'operator', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('' , '*', '*', '*', 'enable', 'allow', 'run', '5', 'operator@localhost', 'operator', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('' , '*', '*', '*', 'enable', 'allow', 'insert', '5', 'operator@localhost', 'operator', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('' , '*', '*', '*', 'enable', 'allow', 'update', '5', 'operator@localhost', 'operator', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('' , '*', '*', '*', 'enable', 'allow', 'delete', '6', 'admin@localhost', 'admin', NOW());

INSERT IGNORE INTO `cmr_policy` VALUES ('' , '*', 'ticket', '*', 'enable', 'allow', 'select', '2', 'client@localhost', 'client', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('' , '*', 'ticket', '*', 'enable', 'allow', 'insert', '2', 'client@localhost', 'client', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('' , '*', 'ticket', '*', 'enable', 'allow', 'update', '2', 'client@localhost', 'client', NOW());

INSERT IGNORE INTO `cmr_policy` VALUES ('' , '*', 'message', '*', 'enable', 'allow', 'select', '1', 'guest@localhost', 'guest', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('' , '*', 'message', '*', 'enable', 'allow', 'insert', '1', 'guest@localhost', 'guest', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('' , '*', 'message', '*', 'enable', 'allow', 'update', '1', 'guest@localhost', 'guest', NOW());


UPDATE cmr_ticket SET mail_from = CONCAT('|', mail_from, '|'), mail_to = CONCAT('|', mail_to, '|'), mail_cc = CONCAT('|', mail_cc, '|'), mail_bcc = CONCAT('|', mail_bcc, '|') where my_master='cmr_model' and state != 'open';
