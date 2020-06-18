-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generato il: 13 Giu, 2007 at 07:21 PM
-- Versione MySQL: 4.1.9
-- Versione PHP: 4.3.10
-- 
-- Database: `camaroes_db`
-- 

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_account`
-- 

CREATE TABLE `cmr_account` (
  `id` bigint(20) NOT NULL default '0',
  `url` varchar(254) NOT NULL default '',
  `user_email` varchar(254) NOT NULL default '',
  `uid` varchar(254) NOT NULL default '',
  `pw` varchar(254) NOT NULL default '',
  `server` varchar(254) NOT NULL default '',
  `service` varchar(254) NOT NULL default 'extern_service.name',
  `port` int(11) NOT NULL default '0',
  `protocol` varchar(60) NOT NULL default '',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`pw`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_asset`
-- 

CREATE TABLE `cmr_asset` (
  `id` bigint(20) NOT NULL auto_increment,
  `serial` varchar(254) default NULL,
  `mac_adress` varchar(60) default NULL,
  `name` varchar(124) NOT NULL default 'localhost',
  `location` varchar(254) default NULL,
  `ip` varchar(60) NOT NULL default '127.0.0.1',
  `nat_ip` varchar(60) NOT NULL default '',
  `mask` varchar(254) default NULL,
  `gateway` varchar(254) default NULL,
  `dns1` varchar(254) default NULL,
  `dns2` varchar(254) default NULL,
  `type` enum('router','switch','printer','fax','telefone','screem','firewall','pc','model') NOT NULL default 'pc',
  `os` varchar(124) NOT NULL default '',
  `state` enum('active','diactivated') NOT NULL default 'active',
  `login_id` varchar(80) NOT NULL default '',
  `login_pw` varchar(124) NOT NULL default '',
  `check_command` varchar(254) NOT NULL default 'extern_command.name',
  `certificate` varchar(254) NOT NULL default 'extern_certificate.to_cn',
  `my_master` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `my_software` text NOT NULL,
  `my_service` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`,`ip`)
) TYPE=MyISAM COMMENT='Tabella di tutti gli host' AUTO_INCREMENT=183 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_certificate`
-- 

CREATE TABLE `cmr_certificate` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `serial` varchar(254) NOT NULL default '',
  `user_email` varchar(254) NOT NULL default '',
  `version` varchar(254) NOT NULL default '',
  `to_cn` varchar(254) default NULL,
  `to_o` varchar(254) default NULL,
  `to_ou` varchar(254) default NULL,
  `from_cn` varchar(254) default NULL,
  `from_o` varchar(254) default NULL,
  `from_ou` varchar(254) default NULL,
  `valid_from` datetime default NULL,
  `valid_to` datetime NOT NULL default '0000-00-00 00:00:00',
  `state` enum('active','disactivated') NOT NULL default 'active',
  `cert_pkcs` varchar(254) default NULL,
  `pub_key_pkcs` varchar(254) NOT NULL default '',
  `status` enum('valid','revocation') default NULL,
  `type` varchar(254) NOT NULL default 'default',
  `login_script` text NOT NULL,
  `public_key` text NOT NULL,
  `private_key` text NOT NULL,
  `pass_phrase` varchar(254) NOT NULL default '',
  `my_master` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uid` (`serial`),
  UNIQUE KEY `serial` (`serial`),
  UNIQUE KEY `email` (`from_cn`)
) TYPE=MyISAM AUTO_INCREMENT=124 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_code`
-- 

CREATE TABLE `cmr_code` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(254) NOT NULL default '',
  `script` text NOT NULL,
  `state` enum('active','diactivated') NOT NULL default 'active',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `code` (`code`)
) TYPE=MyISAM COMMENT='text code table' AUTO_INCREMENT=52 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_command`
-- 

CREATE TABLE `cmr_command` (
  `id` int(11) NOT NULL auto_increment,
  `command_name` varchar(254) NOT NULL default '',
  `command_line` varchar(254) NOT NULL default '',
  `state` enum('active','diactivated') NOT NULL default 'active',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`command_name`)
) TYPE=MyISAM AUTO_INCREMENT=69 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_contact`
-- 

CREATE TABLE `cmr_contact` (
  `id` bigint(20) unsigned NOT NULL default '0',
  `uid` varchar(60) NOT NULL default '',
  `name` text,
  `last_name` varchar(40) default NULL,
  `sexe` enum('M','F') default NULL,
  `function` varchar(254) default NULL,
  `email` varchar(60) default NULL,
  `email_sign` text,
  `tel` varchar(40) default NULL,
  `cel` varchar(40) default NULL,
  `adress` varchar(254) default NULL,
  `location` varchar(254) NOT NULL default '',
  `country` varchar(254) NOT NULL default 'active',
  `type` enum('vip','admin','user','custumer','web','model','system','forum','auto','chat','tstm','database','demo','application') default NULL,
  `state` enum('active','diactivated') NOT NULL default 'active',
  `status` enum('connect','disconnect') default NULL,
  `lang` varchar(20) NOT NULL default 'italian',
  `style` varchar(40) NOT NULL default 'default',
  `public_key` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uid` (`uid`),
  UNIQUE KEY `email` (`email`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_cron`
-- 

CREATE TABLE `cmr_cron` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `command` varchar(254) NOT NULL default 'extern_command.name',
  `at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `type` enum('normal','php','windows','linux','unix','solaris','database') NOT NULL default 'normal',
  `state` enum('active','diactivated') NOT NULL default 'active',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM COMMENT='cron command to be robn' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_download`
-- 

CREATE TABLE `cmr_download` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(254) NOT NULL default '',
  `path` varchar(254) default NULL,
  `file_name` varchar(254) default NULL,
  `file_type` varchar(64) default NULL,
  `file_size` varchar(64) default NULL,
  `state` enum('active','diactivated') NOT NULL default 'active',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='Table of file to download' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_email`
-- 

CREATE TABLE `cmr_email` (
  `id` bigint(20) NOT NULL default '0',
  `encoding` varchar(254) NOT NULL default '',
  `lang` varchar(20) NOT NULL default '',
  `header` text NOT NULL,
  `title` varchar(254) NOT NULL default 'No title',
  `mail_title` varchar(254) NOT NULL default '',
  `mail_from` text,
  `mail_to` text,
  `mail_cc` text,
  `mail_bcc` text,
  `attach` enum('yes','no') default 'no',
  `text` text,
  `my_master` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_escalation`
-- 

CREATE TABLE `cmr_escalation` (
  `id` int(11) NOT NULL default '0',
  `ticket_number` varchar(254) NOT NULL default 'extern_ticket.number',
  `action` set('open','update','close','in_progress','pending','unknow','sospend','waiting_for','deleted','move') NOT NULL default 'update',
  `id_ticket` int(11) NOT NULL default '0',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_faq`
-- 

CREATE TABLE `cmr_faq` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `argoment` varchar(254) NOT NULL default '',
  `question` text,
  `response` text NOT NULL,
  `state` enum('active','diactivated') NOT NULL default 'active',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_father_groups`
-- 

CREATE TABLE `cmr_father_groups` (
  `id` bigint(20) NOT NULL auto_increment,
  `group_father` varchar(254) NOT NULL default 'extern_groups.name',
  `group_child` varchar(254) NOT NULL default 'extern_groups.name',
  `state` enum('active','disactivated') NOT NULL default 'active',
  `date_time` timestamp NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `group_father` (`group_father`,`group_child`)
) TYPE=MyISAM AUTO_INCREMENT=366 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_forum`
-- 

CREATE TABLE `cmr_forum` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `argoment` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `my_master` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_generator`
-- 

CREATE TABLE `cmr_generator` (
  `id` bigint(20) NOT NULL auto_increment,
  `db` varchar(124) NOT NULL default '',
  `table` varchar(254) NOT NULL default '0',
  `column` varchar(254) NOT NULL default '',
  `code1` enum('@_database_@','@_show_create_db_@','@_date_time_@','@_db_date_time_@','@_db_privileges_@','@_db_caracter_set_@','@_db_collation_@','@_db_type_@','@_pre_match_@','@_form_name_@','@_table_@','@_table_name_@','@_show_create_table_@','@_table_engine_@','@_table_version_@','@_table_row_format_@','@_table_rows_@','@_table_avg_row_length_@','@_table_data_length_@','@_table_max_data_length_@','@_table_index_length_@','@_table_data_free_@','@_table_auto_increment_@','@_table_create_time_@','@_table_update_time_@','@_table_check_time_@','@_table_collation_@','@_table_checksum_@','@_table_create_options_@','@_table_comment_@','@_table_index_@','@_table_num_row_@','@_table_num_column_@','@_table_primary_@','@_table_type_@','@_table_privilege_@','@_table_date_time_@','@_table_non_unique_@','@_table_key_name_@','@_table_seq_in_index_@','@_table_column_name_@','@_table_collation_@','@_table_cardinality_@','@_table_sub_part_@','@_table_packed_@','@_table_index_type_@','@_column_@','@_column_id_@','@_column_count_@','@_column_null_@','@_column_default_@','@_column_extra_@','@_column_field_@','@_column_type_@','@_column_collation_@','@_column_key_@','@_column_privileges_@','@_column_comment_@','@_column_index1_@','@_column_unique1_@','@_column_not_null1_@','@_column_extern1_@','@_column_comment1_@','@_column_date_time1_@','@_column_int1_@','@_column_null1_@','@_column_key1_@','@_column_text1_@','@_column_index2_@','@_column_unique2_@','@_column_not_null2_@','@_column_extern2_@','@_column_comment2_@','@_column_date_time2_@','@_column_int2_@','@_column_null2_@','@_column_key2_@','@_column_text2_@','@_column_index3_@','@_column_unique3_@','@_column_not_null3_@','@_column_extern3_@','@_column_comment3_@','@_column_date_time3_@','@_column_int3_@','@_column_null3_@','@_column_key3_@','@_column_text3_@','@_column0_@','@_column1_@','@_column2_@','@_column3_@','@_column4_@','@_column5_@','@_form_label_elmt_@','@_form_box_elmt_@','@_form_box_elmt_upd_@','@_column[0-9]+_@','@_table[0-9]+_@','@_rown[0-9]+_@') NOT NULL default '@_database_@',
  `code2` enum('£_foreach_comment_£([^£]*)££_foreach_comment_££','£_foreach_db_£([^£]*)££_foreach_db_££','£_foreach_table_£([^£]*)££_foreach_table_££','£_foreach_column_£([^£]*)££_foreach_column_££','£_foreach_rown_£([^£]*)££_foreach_rown_££','£_button_£)(.*)(££_button_££)') NOT NULL default '£_foreach_comment_£([^£]*)££_foreach_comment_££',
  `code3` enum('{{date_time}}','{{date}}','{{time}}','{{my_ip}}','{{my_name}}','{{my_last_name}}','{{my_lang}}','{{my_comment}}','{{my_tel}}','{{my_cel}}','{{my_group}}','{{my_function}}','{{my_location}}','{{my_sign}}','{{group_sign}}','{{ticket_number}}','{{ticket_title}}','{{ticket_text}}','{{ticket_assign_to}}','{{ticket_severity}}','{{ticket_state}}','{{ticket_type}}','{{ticket_list_user_inpact}}','{{ticket_list_group_inpact}}','{{ticket_list_asset_inpact}}','{{ticket_sla}}','{{ticket_lang}}','{{ticket_call_log_group}}','{{ticket_comment}}') NOT NULL default '{{date_time}}',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`db`)
) TYPE=MyISAM AUTO_INCREMENT=72 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_groups`
-- 

CREATE TABLE `cmr_groups` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(60) NOT NULL default '',
  `state` enum('active','disactivated') NOT NULL default 'active',
  `level` enum('0_guest','1_contact','2_client','3_user','4_tecnician','5_noc','5_soc','5_operator','6_admin','7_programer','0','1','2','3','4','5','6','7') NOT NULL default '0_guest',
  `location` varchar(254) default NULL,
  `type` set('tstm','forum','chat','web','database','demo','helpdesk','crm','object','software','hardware','sevrices') default NULL,
  `sla` timestamp NOT NULL default '0000-00-00 00:00:00',
  `public_key` text,
  `private_key` text,
  `pass_phrase` varchar(254) default NULL,
  `email_sign` text,
  `referent_email` varchar(254) default 'extern_user.email',
  `admin_email` varchar(254) default 'extern_user.email',
  `folder` varchar(254) default NULL,
  `notify` enum('by_email','by_sms','by_web','all','unknow') NOT NULL default 'by_email',
  `web_site` varchar(254) default NULL,
  `login_script` text,
  `adress` varchar(254) default NULL,
  `my_master` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=81 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_message`
-- 

CREATE TABLE `cmr_message` (
  `id` bigint(20) NOT NULL auto_increment,
  `sender` varchar(80) NOT NULL default '',
  `title` varchar(254) NOT NULL default 'No title',
  `model_id` varchar(20) NOT NULL default '',
  `model_title` varchar(254) NOT NULL default '',
  `lang` varchar(124) NOT NULL default '',
  `text` text,
  `groups_dest` text,
  `users_dest` text NOT NULL,
  `modules_dest` text,
  `ripetitive` int(11) NOT NULL default '0',
  `repeat_end` timestamp NOT NULL default '0000-00-00 00:00:00',
  `begin_time` timestamp NOT NULL default '0000-00-00 00:00:00',
  `end_time` timestamp NOT NULL default '0000-00-00 00:00:00',
  `intervale` varchar(64) default '1',
  `priority` int(11) NOT NULL default '0',
  `type` enum('text','html','php','email','normal','news','work','java_script','NULL') NOT NULL default 'text',
  `state` enum('active','disactivated','NULL') NOT NULL default 'active',
  `my_master` text NOT NULL,
  `my_slave` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_message_read`
-- 

CREATE TABLE `cmr_message_read` (
  `id` bigint(20) NOT NULL default '0',
  `user_email` varchar(254) NOT NULL default 'extern_user.email',
  `message_id` int(11) NOT NULL default '0',
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id_user` (`user_email`,`message_id`)
) TYPE=MyISAM COMMENT='Tabella dei messaggi gia letti per utente';

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_nagios`
-- 

CREATE TABLE `cmr_nagios` (
  `id` int(11) NOT NULL auto_increment,
  `group_name` varchar(254) NOT NULL default 'extern_groups.name',
  `nagios_group` varchar(124) NOT NULL default '',
  `config` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `group_name` (`group_name`,`nagios_group`)
) TYPE=MyISAM PACK_KEYS=0 COMMENT='Tabella per la gestione del modulo nagios' AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_nessus`
-- 

CREATE TABLE `cmr_nessus` (
  `id` int(11) NOT NULL auto_increment,
  `group_name` varchar(254) NOT NULL default 'extern_groups.name',
  `nessus_ip` text,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM PACK_KEYS=0 COMMENT='Tabella per la gestione del modulo nagios' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_rss`
-- 

CREATE TABLE `cmr_rss` (
  `id` bigint(20) NOT NULL default '0',
  `version` varchar(254) NOT NULL default '',
  `title` varchar(254) NOT NULL default 'No title',
  `link` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `rating` varchar(254) NOT NULL default '',
  `state` enum('active','diactivated') NOT NULL default 'active',
  `feed_adress` varchar(254) default NULL,
  `type` enum('normal','job','ids','xpu','va','hardware_Move','hardware_remove','hardware_add','hardware_replace','new_account','new_group','hardware_install','hardware_request','hardware_restart','software_install','software_remove','software_update','software_request','model','NULL') NOT NULL default 'normal',
  `text` text,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_services`
-- 

CREATE TABLE `cmr_services` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `port` int(11) NOT NULL default '0',
  `protocol` varchar(60) NOT NULL default '',
  `check_command` varchar(254) NOT NULL default 'extern_command.command_line',
  `my_master` text NOT NULL,
  `my_slave` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=72 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_session`
-- 

CREATE TABLE `cmr_session` (
  `id` int(11) NOT NULL auto_increment,
  `sessionid` varchar(254) NOT NULL default '',
  `sessionip` varchar(64) NOT NULL default '',
  `user_email` varchar(254) NOT NULL default 'extern_user.email',
  `status` varchar(64) NOT NULL default 'disconnect',
  `state` varchar(64) NOT NULL default 'active',
  `time_out` varchar(64) default NULL,
  `session_end` timestamp NOT NULL default '0000-00-00 00:00:00',
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `sessionid` (`sessionid`,`sessionip`,`user_email`)
) TYPE=MyISAM COMMENT='Tabella per la gestione delle sessioni' AUTO_INCREMENT=1595 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_sla`
-- 

CREATE TABLE `cmr_sla` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_email` varchar(254) default 'extern_user.email',
  `group_name` varchar(254) NOT NULL default 'extern_groups.name',
  `asset_ip` varchar(254) NOT NULL default '',
  `user_type` enum('vip','admin','user','custumer','web','model','system','forum','auto','chat','tstm','database','demo','application') NOT NULL default 'user',
  `group_type` enum('tstm','forum','chat','web','database','demo','helpdesk','crm','object','software','hardware','sevrices') NOT NULL default 'tstm',
  `asset_type` enum('tstm','forum','chat','web','database','demo','helpdesk','crm','object','software','hardware','sevrices') NOT NULL default 'tstm',
  `ticket_type` enum('normal','job','ids','xpu','va','hardware_Move','hardware_remove','hardware_add','hardware_replace','new_account','new_group','hardware_install','hardware_request','hardware_restart','software_install','software_remove','software_update','software_request','model','NULL') NOT NULL default 'normal',
  `ticket_call_method` set('normal','automatic','by_help_desk','by_email','by_phone','by_web','by_sms','unknow','SNMP','NULL') NOT NULL default 'by_email',
  `ticket_state` enum('open','update','close','in_progress','pending','unknow','NULL') NOT NULL default 'open',
  `ticket_severity` enum('info','low','normal','medium','higth','NULL') default 'normal',
  `ticket_assign_to` text,
  `num_user_impact` int(11) default NULL,
  `num_group_impact` int(11) default NULL,
  `num_asset_impact` int(11) default NULL,
  `sla` varchar(64) NOT NULL default '3 DAY',
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_software`
-- 

CREATE TABLE `cmr_software` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `type` varchar(254) NOT NULL default '',
  `copyrigth` varchar(254) NOT NULL default '',
  `certificate` varchar(254) NOT NULL default 'extern_certificate.to_cn',
  `my_master` text NOT NULL,
  `my_slave` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_statistic`
-- 

CREATE TABLE `cmr_statistic` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `type` set('day','week','month','year','other') NOT NULL default '',
  `period_begin` timestamp NOT NULL default '0000-00-00 00:00:00',
  `period_end` timestamp NOT NULL default '0000-00-00 00:00:00',
  `data` text NOT NULL,
  `my_master` text NOT NULL,
  `my_slave` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='Tabelle delle statisciche di tstm' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_ticket`
-- 

CREATE TABLE `cmr_ticket` (
  `id` bigint(20) NOT NULL auto_increment,
  `number` varchar(20) NOT NULL default '',
  `lang` varchar(20) NOT NULL default '',
  `model_number` varchar(20) NOT NULL default '',
  `model_title` varchar(254) NOT NULL default '',
  `title` varchar(254) NOT NULL default 'No title',
  `work_by` varchar(254) NOT NULL default 'extern_user.email',
  `call_log_user` varchar(254) default 'extern_user.email',
  `call_log_group` varchar(254) NOT NULL default 'extern_groups.name',
  `call_method` set('normal','automatic','by_help_desk','by_email','by_phone','by_web','by_sms','unknow','SNMP','NULL') default NULL,
  `state` enum('open','update','close','in_progress','pending','unknow','NULL') NOT NULL default 'open',
  `state_now` enum('opened','updated','closed','unknow','open','update','close','in_progress','pending','unknow','NULL') NOT NULL default 'opened',
  `assign_to` text,
  `list_user_impact` text,
  `list_group_impact` text,
  `list_asset_impact` text,
  `severity` enum('info','low','normal','medium','higth','NULL') default 'normal',
  `sla` varchar(64) NOT NULL default '3 DAY',
  `mail_title` varchar(254) NOT NULL default '',
  `mail_from` text,
  `mail_to` text,
  `mail_cc` text,
  `mail_bcc` text,
  `attach` text,
  `type` enum('normal','job','ids','xpu','va','hardware_Move','hardware_remove','hardware_add','hardware_replace','new_account','new_group','hardware_install','hardware_request','hardware_restart','software_install','software_remove','software_update','software_request','model','NULL') NOT NULL default 'normal',
  `text` text,
  `mail_text` text,
  `my_master` text NOT NULL,
  `my_slave` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1607 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_ticket_read`
-- 

CREATE TABLE `cmr_ticket_read` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_email` varchar(254) NOT NULL default 'extern_user.email',
  `ticket_id` bigint(20) NOT NULL default '0',
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_id` (`user_email`,`ticket_id`)
) TYPE=MyISAM COMMENT='tabella dei ticket gia letti per ogni utente' AUTO_INCREMENT=2139 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_translate`
-- 

CREATE TABLE `cmr_translate` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `translate_language` varchar(254) NOT NULL default '',
  `translate_text` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `code` (`code`,`language`)
) TYPE=MyISAM COMMENT='text tranlation table' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_user`
-- 

CREATE TABLE `cmr_user` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `uid` varchar(60) NOT NULL default '',
  `name` text,
  `last_name` varchar(40) default NULL,
  `nickname` varchar(254) NOT NULL default 'nickname',
  `sexe` enum('M','F') default NULL,
  `role` varchar(254) default NULL,
  `sla` varchar(64) default NULL,
  `pw` varchar(124) default NULL,
  `email` varchar(60) default NULL,
  `email_sign` text,
  `tel` varchar(40) default NULL,
  `cel` varchar(40) default NULL,
  `adress` varchar(254) default NULL,
  `location` varchar(254) NOT NULL default '',
  `state` enum('active','disactivated') NOT NULL default 'active',
  `type` enum('vip','admin','user','custumer','web','model','system','forum','auto','chat','tstm','database','demo','application') default NULL,
  `status` enum('connect','disconnect') default NULL,
  `level` enum('0_guest','1_contact','2_client','3_user','4_tecnician','5_noc','5_soc','5_operator','6_admin','7_programer','0','1','2','3','4','5','6','7') NOT NULL default '0_guest',
  `lang` varchar(20) NOT NULL default 'italian',
  `style` varchar(40) NOT NULL default 'default',
  `login_script` text NOT NULL,
  `certificate` varchar(254) NOT NULL default 'extern_certificate.user_email',
  `photo` varchar(254) NOT NULL default '',
  `my_master` text NOT NULL,
  `my_slave` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uid` (`uid`),
  UNIQUE KEY `email` (`email`)
) TYPE=MyISAM AUTO_INCREMENT=124 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_user_groups`
-- 

CREATE TABLE `cmr_user_groups` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_email` varchar(254) NOT NULL default 'extern_user.email',
  `group_name` varchar(254) NOT NULL default 'extern_groups.name',
  `type` enum('normal','contact','vip','admin') default 'normal',
  `state` enum('active','disactivated') NOT NULL default 'active',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_email` (`user_email`,`group_name`)
) TYPE=MyISAM AUTO_INCREMENT=216 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_x_code_source`
-- 

CREATE TABLE `cmr_x_code_source` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(128) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `language` varchar(128) default 'html',
  `lang_version` varchar(64) default NULL,
  `code_version` varchar(64) default '1.0',
  `state` enum('active','disactivated') NOT NULL default 'active',
  `author` varchar(254) default NULL,
  `copyrigth` varchar(254) default NULL,
  `my_md5` varchar(254) NOT NULL default '',
  `license` text,
  `text` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM COMMENT='table of source code' AUTO_INCREMENT=1170 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_x_comment`
-- 

CREATE TABLE `cmr_x_comment` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `encoding` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `state` enum('active','diactivated') NOT NULL default 'active',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_x_contents`
-- 

CREATE TABLE `cmr_x_contents` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `template` varchar(254) NOT NULL default '',
  `title` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `state` enum('active','diactivated') NOT NULL default 'active',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_x_files`
-- 

CREATE TABLE `cmr_x_files` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `type` varchar(254) NOT NULL default '',
  `state` enum('active','diactivated') NOT NULL default 'active',
  `mine` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `my_md5` varchar(254) NOT NULL default '',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_x_images`
-- 

CREATE TABLE `cmr_x_images` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `type` varchar(16) NOT NULL default '',
  `state` enum('actve','disactivated') NOT NULL default 'actve',
  `x_dim` varchar(16) NOT NULL default '',
  `y_dim` varchar(16) NOT NULL default '',
  `my_md5` varchar(254) NOT NULL default '',
  `base64` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_x_links`
-- 

CREATE TABLE `cmr_x_links` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `state` enum('active','diactivated') NOT NULL default 'active',
  `date_time` timestamp NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_x_menu`
-- 

CREATE TABLE `cmr_x_menu` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `template` varchar(254) NOT NULL default '',
  `list_link` text NOT NULL,
  `language` varchar(254) NOT NULL default '',
  `state` enum('active','diactivated') NOT NULL default 'active',
  `text` text NOT NULL,
  `date_time` timestamp NOT NULL,
  `my_master` text NOT NULL,
  `my_slave` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_x_modules`
-- 

CREATE TABLE `cmr_x_modules` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `template` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `state` enum('active','diactivated') NOT NULL default 'active',
  `text` text NOT NULL,
  `date_time` timestamp NOT NULL,
  `my_master` text NOT NULL,
  `my_slave` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_x_object`
-- 

CREATE TABLE `cmr_x_object` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `state` enum('active','diactivated') NOT NULL default 'active',
  `text` text NOT NULL,
  `my_md5` varchar(254) NOT NULL default '',
  `date_time` timestamp NOT NULL,
  `my_master` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_x_pages`
-- 

CREATE TABLE `cmr_x_pages` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `template` varchar(254) NOT NULL default '',
  `header` varchar(254) NOT NULL default '',
  `footer` varchar(254) NOT NULL default '',
  `list_module` text NOT NULL,
  `language` varchar(254) NOT NULL default '',
  `my_master` text NOT NULL,
  `my_slave` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_x_sites`
-- 

CREATE TABLE `cmr_x_sites` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `state` enum('active','diactivated') NOT NULL default 'active',
  `index` varchar(254) NOT NULL default '',
  `list_page` text NOT NULL,
  `my_master` text NOT NULL,
  `my_slave` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_x_template`
-- 

CREATE TABLE `cmr_x_template` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `language` varchar(254) default NULL,
  `state` enum('active','diactivated') NOT NULL default 'active',
  `type` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='Tabella dei template per i ticket e per la mail' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_x_text`
-- 

CREATE TABLE `cmr_x_text` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `encoding` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `state` enum('active','diactivated') NOT NULL default 'active',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` text NOT NULL,
  `allow_groups` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;
