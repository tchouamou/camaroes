-- Host: localhost
-- Generato il: 16 Giu, 2007 at 12:45 PM
-- Versione MySQL: 4.1.9
-- 
-- Database: `camaroes`
-- 
-- --------------------------------------------------------

CREATE DATABASE IF NOT EXISTS `camaroes_db`;
USE `camaroes_db`;

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
) ENGINE=MyISAM COMMENT='table of accounts' AUTO_INCREMENT=1;

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
  `type` enum('', 'router', 'switch', 'printer', 'fax', 'telefone', 'screem', 'firewall', 'pc', 'model') NOT NULL default 'pc',
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
) ENGINE=MyISAM COMMENT='table of all asset' AUTO_INCREMENT=1;

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
  `status` enum('', 'valid', 'revocation') default '',
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
) ENGINE=MyISAM COMMENT='table of certificates' AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM COMMENT='table of text code' AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM COMMENT='table of commands' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
-- --------------------------------------------------------

-- 
--  `cmr_comment`
-- 
--  
-- 
-- 

CREATE TABLE IF NOT EXISTS `cmr_comment` (
  `id` bigint(20) NOT NULL auto_increment,
  `sender` varchar(254) NOT NULL default '',
  `title` varchar(254) NOT NULL default '',
  `text` text,
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `table_name` varchar(254) NOT NULL default '',
  `line_id` varchar(254) NOT NULL default '',
  `encoding` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM COMMENT='table of comments' AUTO_INCREMENT=1;


--
--  `cmr_config`
--

CREATE TABLE IF NOT EXISTS `cmr_config` (
  `id` bigint(20) NOT NULL auto_increment,
  `file_name` varchar(254) NOT NULL COMMENT 'config file name',
  `the_key` varchar(254) NOT NULL,
  `value` varchar(254) default NULL,
  `type` enum('config', 'page', 'theme', 'constant') NOT NULL,
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `date_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `the_key` (`the_key`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='table of text config value' AUTO_INCREMENT=1 ;




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
  `sexe` enum('', 'M', 'F') default '',
  `function` varchar(254) default '',
  `email` varchar(254) default '',
  `email_sign` text,
  `tel` varchar(254) default '',
  `cel` varchar(254) default '',
  `adress` varchar(254) default '',
  `location` varchar(254) NOT NULL default '',
  `country` varchar(254) NOT NULL default '',
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `status` enum('', 'connect', 'disconnect') default '',
  `lang` varchar(254) NOT NULL default 'italian',
  `style` varchar(254) NOT NULL default 'default',
  `public_key` text,
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM PACK_KEYS=0 COMMENT='table of contacts' AUTO_INCREMENT=1 ;

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
  `type` enum('', 'normal', 'php', 'windows', 'linux', 'unix', 'solaris', 'database') NOT NULL default 'normal',
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM COMMENT='table of cron job commands' AUTO_INCREMENT=1;



CREATE TABLE  IF NOT EXISTS `cmr_cve` (
 `id` bigint(20) NOT NULL auto_increment,
 `number` varchar(254) NOT NULL,
 `title` varchar(254) NOT NULL,
 `severity` varchar(254) NOT NULL,
 `platform` varchar(254) NOT NULL, `problem` text NOT NULL,
 `solution` text NOT NULL,
 `refer` text NOT NULL, `other` text NOT NULL,
 `release_date` datetime NOT NULL,
 `last_revision` datetime NOT NULL,
 `my_master` varchar(254) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `number` (`number`, `title`)
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
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`) 
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='table of vulnerabilities';


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
) ENGINE=MyISAM COMMENT='Table of file to download' AUTO_INCREMENT=1;

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
  `attach` enum('', 'yes', 'no') default 'no',
  `text` text,
  `my_master`  varchar(254) NOT NULL default 'extern_email.name',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM PACK_KEYS=0 COMMENT='table of emails' AUTO_INCREMENT=1;

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
) ENGINE=MyISAM COMMENT='table of faqs' AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM COMMENT='table of father groups' AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM COMMENT='table of forum' AUTO_INCREMENT=1;

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
  `table_name` varchar(254) NOT NULL default '0',
  `column` varchar(254) NOT NULL default '',
  `code1` enum('', '@_database_@', '@_show_create_db_@', '@_date_time_@', '@_db_date_time_@', '@_db_privileges_@', '@_db_caracter_set_@', '@_db_collation_@', '@_db_type_@', '@_pre_match_@', '@_form_name_@', '@_table_@', '@_table_name_@', '@_show_create_table_@', '@_table_engine_@', '@_table_version_@', '@_table_row_format_@', '@_table_rows_@', '@_table_avg_row_length_@', '@_table_data_length_@', '@_table_max_data_length_@', '@_table_index_length_@', '@_table_data_free_@', '@_table_auto_increment_@', '@_table_create_time_@', '@_table_update_time_@', '@_table_check_time_@', '@_table_collation_@', '@_table_checksum_@', '@_table_create_options_@', '@_table_comment_@', '@_table_index_@', '@_table_num_row_@', '@_table_num_column_@', '@_table_primary_@', '@_table_type_@', '@_table_privilege_@', '@_table_date_time_@', '@_table_non_unique_@', '@_table_key_name_@', '@_table_seq_in_index_@', '@_table_column_name_@', '@_table_cardinality_@', '@_table_sub_part_@', '@_table_packed_@', '@_table_index_type_@', '@_column_@', '@_column_id_@', '@_column_count_@', '@_column_null_@', '@_column_default_@', '@_column_extra_@', '@_column_field_@', '@_column_type_@', '@_column_collation_@', '@_column_key_@', '@_column_privileges_@', '@_column_comment_@', '@_column_index1_@', '@_column_unique1_@', '@_column_not_null1_@', '@_column_extern1_@', '@_column_comment1_@', '@_column_date_time1_@', '@_column_int1_@', '@_column_null1_@', '@_column_key1_@', '@_column_text1_@', '@_column_index2_@', '@_column_unique2_@', '@_column_not_null2_@', '@_column_extern2_@', '@_column_comment2_@', '@_column_date_time2_@', '@_column_int2_@', '@_column_null2_@', '@_column_key2_@', '@_column_text2_@', '@_column_index3_@', '@_column_unique3_@', '@_column_not_null3_@', '@_column_extern3_@', '@_column_comment3_@', '@_column_date_time3_@', '@_column_int3_@', '@_column_null3_@', '@_column_key3_@', '@_column_text3_@', '@_column0_@', '@_column1_@', '@_column2_@', '@_column3_@', '@_column4_@', '@_column5_@', '@_form_label_elmt_@', '@_form_box_elmt_@', '@_form_box_elmt_upd_@', '@_column[0-9]+_@', '@_table[0-9]+_@', '@_rown[0-9]+_@') NOT NULL default '@_database_@',
  `code2` enum('', '@_foreach_comment_@([^@]*)@@_foreach_comment_@@', '@_foreach_db_@([^@]*)@@_foreach_db_@@', '@_foreach_table_@([^@]*)@@_foreach_table_@@', '@_foreach_column_@([^@]*)@@_foreach_column_@@', '@_foreach_rown_@([^@]*)@@_foreach_rown_@@', '@_button_@)(.*)(@@_button_@@)') NOT NULL default '@_foreach_comment_@([^@]*)@@_foreach_comment_@@',
  `code3` enum('', '@@date_time@@', '@@date@@', '@@time@@', '@@my_ip@@', '@@my_name@@', '@@my_last_name@@', '@@my_lang@@', '@@my_comment@@', '@@my_tel@@', '@@my_cel@@', '@@my_group@@', '@@my_function@@', '@@my_location@@', '@@my_sign@@', '@@group_sign@@', '@@ticket_number@@', '@@ticket_title@@', '@@ticket_text@@', '@@ticket_assign_to@@', '@@ticket_severity@@', '@@ticket_state@@', '@@ticket_type@@', '@@ticket_list_user_inpact@@', '@@ticket_list_group_inpact@@', '@@ticket_list_asset_inpact@@', '@@ticket_sla@@', '@@ticket_lang@@', '@@ticket_call_log_group@@', '@@ticket_comment@@') NOT NULL default '@@date_time@@',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`db`)
) ENGINE=MyISAM COMMENT='table for generator' AUTO_INCREMENT=1;

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
  `type` enum('', '0_guest', '1_contact', '1_demo', '1_forum', '2_client', '2_vip', '3_user', '4_tecnician', '5_noc', '5_soc', '5_operator', '6_admin', '7_developer', '7_database', '0_read_only', '1_read_only', '2_read_only', '3_read_only', '4_read_only', '5_read_only', '6_read_only', '7_read_only', '0', '1', '2', '3', '4', '5', '6', '7') NOT NULL default '0_guest',
  `location` varchar(254) default '',
  `sla` timestamp NOT NULL default '2000-01-01 01:01:01',
  `public_key` text,
  `private_key` text,
  `pass_phrase` varchar(254) default '',
  `email_sign` text,
  `group_email` varchar(254) default 'extern_user.email',
  `admin_email` varchar(254) default 'extern_user.email',
  `home` varchar(254) NOT NULL default 'home/groups/default',
  `notify` enum('', 'by_email', 'by_sms', 'by_web', 'all', 'unknown') NOT NULL default 'by_email',
  `web_site` varchar(254) default '',
  `login_script` text,
  `adress` varchar(254) default '',
  `my_master`  varchar(254) NOT NULL default 'extern_groups.name',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM COMMENT='table of groups' AUTO_INCREMENT=1;

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
) ENGINE=MyISAM COMMENT='table of action history' AUTO_INCREMENT=1;

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
  `state` enum('', 'enable', 'disable', 'NULL') NOT NULL default 'enable',
  `my_master`  varchar(254) NOT NULL default 'extern_message.title',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM COMMENT='table of messages' AUTO_INCREMENT=1;

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
) ENGINE=MyISAM PACK_KEYS=0 COMMENT='table for monitor' AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Struttura della tabella `cmr_notify`
--

CREATE TABLE IF NOT EXISTS `cmr_notify` (
  `id` int(11) NOT NULL auto_increment,
  `source` varchar(254) NOT NULL,
  `destination` set('to_page','to_email','to_log','to_db','to_sms','to_rss','to_flux','to_other') NOT NULL default 'to_page',
  `action` set('new','update','delete','view','other') NOT NULL default 'other',
  `state` set('enable','disable') NOT NULL default 'disable',
  `language` varchar(64) NOT NULL,
  `mail_from` varchar(254) NOT NULL,
  `mail_to` varchar(254) NOT NULL,
  `mail_cc` varchar(254) NOT NULL,
  `mail_bcc` varchar(254) NOT NULL,
  `title` varchar(254) NOT NULL,
  `text` text NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `source` (`source`,`destination`,`action`)
) ENGINE=MyISAM COMMENT='table for notification' AUTO_INCREMENT=1;
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
  `table_name` varchar(254) NOT NULL default '',
  `line_id` varchar(254) NOT NULL default '',
  `state` enum('', 'enable', 'disable') NOT NULL default '',
  `type` enum('', 'allow', 'deny') NOT NULL default '',
  `privilege` enum('', '*', 'all', 'read', 'write', 'run', 'select', 'insert', 'update', 'delete', 'file', 'create', 'alter', 'index', 'drop', 'create temporary tables', 'create view', 'show view', 'create routine', 'alter routine', 'execute', 'grant', 'super', 'process', 'reload', 'shutdown', 'show databases', 'lock tables', 'references', 'replication client', 'replication slave', 'create user') NOT NULL default '',
  `allow_type` varchar(254) NOT NULL default 'extern_user.type',
  `allow_email` varchar(254) NOT NULL default 'extern_user.email',
  `allow_groups` varchar(254) NOT NULL default 'extern_groups.name',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM COMMENT='table of policy' AUTO_INCREMENT=1;

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
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM COMMENT='table of query' AUTO_INCREMENT=1 ;



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
  `type` enum('', 'normal', 'job', 'ids', 'xpu', 'va', 'rma', 'hardware_Move', 'hardware_remove', 'hardware_add', 'hardware_replace', 'new_account', 'new_group', 'hardware_install', 'hardware_request', 'hardware_restart', 'software_install', 'software_remove', 'software_update', 'software_request', 'model', 'NULL') NOT NULL default 'normal',
  `text` text,
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM PACK_KEYS=0 COMMENT='table of rss' AUTO_INCREMENT=1;

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
  `type` enum('', 'normal', 'job', 'ids', 'xpu', 'va', 'rma', 'hardware_Move', 'hardware_remove', 'hardware_add', 'hardware_replace', 'new_account', 'new_group', 'hardware_install', 'hardware_request', 'hardware_restart', 'software_install', 'software_remove', 'software_update', 'software_request', 'model', 'NULL') NOT NULL default 'normal',
  `call_method` set('normal', 'automatic', 'by_help_desk', 'by_email', 'by_phone', 'by_web', 'by_sms', 'unknown', 'SNMP', 'NULL') NOT NULL default 'by_email',
  `state` enum('', 'open', 'update', 'close', 'in_progress', 'pending', 'unknown', 'NULL') NOT NULL default 'open',
  `severity` enum('', 'info', 'low', 'normal', 'medium', 'high', 'critical', 'NULL') default 'normal',
  `assign_to` varchar(254) NOT NULL default '',
  `num_user_impact` bigint(20) default 0,
  `num_group_impact` bigint(20) default 0,
  `num_asset_impact` bigint(20) default 0,
  `sla` varchar(254) NOT NULL default '3 DAY',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM COMMENT='table of sla' AUTO_INCREMENT=1;


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
) ENGINE=MyISAM COMMENT='table of services' AUTO_INCREMENT=1;

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
) ENGINE=MyISAM COMMENT='table of sessions' AUTO_INCREMENT=1;

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
) ENGINE=MyISAM COMMENT='table of software' AUTO_INCREMENT=1;


-- 
--  `cmr_statistic`
-- 
--  
--  
-- 

CREATE TABLE IF NOT EXISTS `cmr_statistic` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `type` set('day', 'week', 'month', 'year', 'other') NOT NULL default '',
  `period_begin` timestamp NOT NULL default '2000-01-01 01:01:01',
  `period_end` timestamp NOT NULL default '2000-01-01 01:01:01',
  `data` text,
  `my_master`  varchar(254) NOT NULL default 'extern_statistic.name',
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM COMMENT='table of statistics' AUTO_INCREMENT=1;
-- --------------------------------------------------------
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
  `type` enum('', 'other', 'normal', 'modules',  'notify',  'button', 'class', 'function', 'get_date', 'library', 'config', 'css', 'system', 'javascript', 'cgi', 'templates', 'page', 'themes', 'home', 'doc', 'model', 'languages', 'help', 'images', 'tab') NOT NULL default 'normal',
  `state` enum('', 'enable', 'disable') NOT NULL default 'enable',
  `author` varchar(254) default '',
  `copyright` varchar(254) default '',
  `my_md5` varchar(254) NOT NULL default '',
  `license` text,
  `text` text,
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM COMMENT='table of source code' AUTO_INCREMENT=1;

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
  `call_method` set('normal', 'automatic', 'by_help_desk', 'by_email', 'by_phone', 'by_web', 'by_sms', 'unknown', 'SNMP', 'NULL') default '',
  `state` enum('', 'open', 'update', 'close', 'in_progress', 'pending', 'unknown', 'NULL') NOT NULL default 'open',
  `state_now` enum('', 'opened', 'updated', 'closed', 'open', 'update', 'close', 'in_progress', 'pending', 'unknown', 'NULL') NOT NULL default 'opened',
  `assign_to` varchar(254) default '',
  `list_user_impact` varchar(254) default '',
  `list_group_impact` varchar(124) default '',
  `list_asset_impact` varchar(254) default '',
  `severity` enum('', 'info', 'low', 'normal', 'medium', 'high', 'critical', 'NULL') default 'normal',
  `sla` varchar(64) NOT NULL default '3 DAY',
  `mail_title` varchar(254) NOT NULL default '',
  `mail_from` varchar(254) NOT NULL default 'operator@localhost',
  `mail_to` varchar(254) NOT NULL default 'soc@localhost',
  `mail_cc` varchar(254) NOT NULL default 'noc@localhost',
  `mail_bcc` varchar(254) NOT NULL default 'admin@localhost',
  `attach` varchar(254) NOT NULL default 'operator@localhost',
  `type` enum('', 'normal', 'job', 'ids', 'xpu', 'va', 'rma', 'hardware_Move', 'hardware_remove', 'hardware_add', 'hardware_replace', 'new_account', 'new_group', 'hardware_install', 'hardware_request', 'hardware_restart', 'software_install', 'software_remove', 'software_update', 'software_request', 'model', 'NULL') NOT NULL default 'normal',
  `text` text,
  `mail_text` text,
  `my_master` varchar(254) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `number` (`number`),
  FULLTEXT KEY `text` (`text`),
  FULLTEXT KEY `mail_text` (`mail_text`)
) ENGINE=MyISAM COMMENT='table of tickets' AUTO_INCREMENT=1 ;
        


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
) ENGINE=MyISAM COMMENT='text tranlation table' AUTO_INCREMENT=1;

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
  `sexe` enum('', 'M', 'F') default '',
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
  `state` enum('', 'enable', 'disable', 'locked') NOT NULL default 'enable' COMMENT 'user state',
  `status` enum('', 'connect', 'disconnect')  NOT NULL default 'connect',
  `type` enum('', '0_guest', '1_contact', '1_forum', '1_demo', '2_client', '2_vip', '3_user', '4_tecnician', '5_noc', '5_soc', '5_operator', '6_admin', '7_developer', '7_database', '0_read_only', '1_read_only', '2_read_only', '3_read_only', '4_read_only', '5_read_only', '6_read_only', '7_read_only', '0', '1', '2', '3', '4', '5', '6', '7') NOT NULL default '0_guest',
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
) ENGINE=MyISAM COMMENT='table of users' AUTO_INCREMENT=1;

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
) ENGINE=MyISAM COMMENT='table of users groups' AUTO_INCREMENT=1;


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
) ENGINE=MyISAM PACK_KEYS=0 COMMENT='table for va' AUTO_INCREMENT=1;

