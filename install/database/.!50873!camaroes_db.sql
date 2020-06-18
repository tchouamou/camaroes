-- phpMyAdmin SQL Dump
-- version 2.6.2-Debian-3sarge6
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generato il: 29 Set, 2008 at 12:28 PM
-- Versione MySQL: 4.0.24
-- Versione PHP: 4.3.10-22
-- 
-- Database: `camaroes_db`
-- 

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_account`
-- 

CREATE TABLE IF NOT EXISTS `cmr_account` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(254) NOT NULL default '',
  `user_email` varchar(254) NOT NULL default '',
  `uid` varchar(254) NOT NULL default '',
  `pw` varchar(254) NOT NULL default '',
  `server` varchar(254) NOT NULL default '',
  `service` varchar(254) NOT NULL default 'extern_service.name',
  `port` int(11) NOT NULL default '0',
  `protocol` varchar(254) NOT NULL default '',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`pw`)
) TYPE=MyISAM COMMENT='table of accounts' AUTO_INCREMENT=2 ;

-- 
-- Dump dei dati per la tabella `cmr_account`
-- 

INSERT IGNORE INTO `cmr_account` VALUES (1, 'http://localhost', 'admin@localhost', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'localhost', 'extern_service.name', 0, '', '5_noc,5_soc,5_operator,6_admin,7_programer', '', '', '', '20080929095600');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_asset`
-- 

CREATE TABLE IF NOT EXISTS `cmr_asset` (
  `id` bigint(20) NOT NULL auto_increment,
  `serial` varchar(254) default '',
  `mac_adress` varchar(254) default '',
  `name` varchar(254) NOT NULL default 'localhost',
  `location` varchar(254) default '',
  `ip` varchar(100) NOT NULL default '127.0.0.1',
  `nat_ip` varchar(254) NOT NULL default '',
  `mask` varchar(254) default '',
  `gateway` varchar(254) default '',
  `dns1` varchar(254) default '',
  `dns2` varchar(254) default '',
  `type` enum('','router','switch','printer','fax','telefone','screem','firewall','pc','model') NOT NULL default 'pc',
  `os` varchar(254) NOT NULL default '',
  `state` enum('','active','diactivated') NOT NULL default 'active',
  `login_id` varchar(254) NOT NULL default '',
  `login_pw` varchar(254) NOT NULL default '',
  `check_command` varchar(254) NOT NULL default 'extern_command.name',
  `certificate` varchar(254) NOT NULL default 'extern_certificate.name',
  `my_master` varchar(254) NOT NULL default 'extern_asset.name',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `my_software` varchar(254) NOT NULL default 'extern_software.name',
  `my_service` varchar(254) NOT NULL default 'extern_service.name',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`,`ip`),
  KEY `ip` (`ip`)
) TYPE=MyISAM COMMENT='table of all asset' AUTO_INCREMENT=2 ;

-- 
-- Dump dei dati per la tabella `cmr_asset`
-- 

INSERT IGNORE INTO `cmr_asset` VALUES (1, '', '', 'localhost', '', '127.0.0.1', '', '', '', '', '', 'pc', '', 'active', '', '', 'extern_command.name', 'extern_certificate.to_cn', '', '5_noc,5_soc,5_operator,6_admin,7_programer', '', '', '', '', 'localhost', '20080929095600');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_certificate`
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
  `valid_from` datetime default '0000-00-00 00:00:00',
  `valid_to` datetime NOT NULL default '0000-00-00 00:00:00',
  `state` enum('','active','disactivated') NOT NULL default 'active',
  `cert_pkcs` varchar(254) default '',
  `pub_key_pkcs` varchar(254) NOT NULL default '',
  `status` enum('','valid','revocation') default '',
  `type` varchar(254) NOT NULL default 'default',
  `login_script` text,
  `public_key` text,
  `private_key` text,
  `pass_phrase` varchar(254) NOT NULL default '',
  `my_master` varchar(254) NOT NULL default 'extern_certificate.name',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uid` (`serial`),
  UNIQUE KEY `serial` (`serial`),
  UNIQUE KEY `email` (`from_cn`)
) TYPE=MyISAM COMMENT='table of certificates' AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `cmr_certificate`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_code`
-- 

CREATE TABLE IF NOT EXISTS `cmr_code` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(254) NOT NULL default '',
  `script` text,
  `state` enum('','active','diactivated') NOT NULL default 'active',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `code` (`code`)
) TYPE=MyISAM COMMENT='table of text code' AUTO_INCREMENT=46 ;

-- 
-- Dump dei dati per la tabella `cmr_code`
-- 

INSERT IGNORE INTO `cmr_code` VALUES (1, '{{date_time}}', '$eval_result=date("Y-M-D H:i:s");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (2, '{{date}}', '$eval_result=date("Y-m-d");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (3, '{{time}}', '$eval_result=date("h:i:s");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (4, '{{my_ip}}', '$eval_result=$_SERVER[''REMOTE_ADDR''];\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (5, '{{user_email}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (6, '{{user_name}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (7, '{{user_last_name}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (8, '{{user_lang}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (9, '{{user_comment}}', '$eval_result=0;\r\nreturn $eval_result;', 'active', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (10, '{{user_tel}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (11, '{{user_cel}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (12, '{{user_function}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (13, '{{user_location}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (14, '{{user_email_sign}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (15, '{{groups_name}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (16, '{{groups_email_sign}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (17, '{{ticket_number}}', '$eval_result=get_post("number");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (18, '{{ticket_title}}', '$eval_result=get_post("title");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (19, '{{ticket_text}}', '$eval_result=get_post("text");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (20, '{{ticket_assign_to}}', '$eval_result=get_post("assign_to");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (21, '{{ticket_severity}}', '$eval_result=get_post("severity");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (22, '{{ticket_state}}', '$eval_result=get_post("state");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (23, '{{ticket_type}}', '$eval_result=get_post("type");', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (24, '{{ticket_list_user_inpact}}', '$eval_result=get_post("list_user_inpact");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (25, '{{ticket_list_group_inpact}}', '$eval_result=get_post("list_group_inpact");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (26, '{{ticket_list_asset_inpact}}', '$eval_result=get_post("ticket_asset_inpact");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (27, '{{ticket_sla}}', '$eval_result=get_post("sla");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (28, '{{ticket_lang}}', '$eval_result=get_post("lang");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (29, '{{ticket_call_log_group}}', '$eval_result=get_post("call_log_group");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (30, '{{ticket_comment}}', '$eval_result=get_post("comment");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (31, '{{ticket_call_log_user}}', '$eval_result=get_post("call_log_group");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (32, '{{ticket_mail_from}}', '$eval_result=get_post("mail_from");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (33, '{{ticket_mail_to}}', '$eval_result=get_post("mail_to");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (34, '{{ticket_mail_cc}}', '$eval_result=get_post("mail_cc");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (35, '{{ticket_mail_bcc}}', '$eval_result=get_post("mail_bcc");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (36, '{{ticket_list_user_impact}}', '$eval_result=get_post("list_user_impact");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (37, '{{ticket_list_group_impact}}', '$eval_result=get_post("list_group_impact");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (38, '{{ticket_list_asset_impact}}', '$eval_result=get_post("list_asset_impact");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (39, '{{ticket_assing_to}}', '$eval_result=get_post("assing_to");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (40, '{{ticket_attach1}}', '$eval_result=get_post("attach1");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (41, '{{ticket_attach2}}', '$eval_result=get_post("attach2");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (42, '{{ticket_attach3}}', '$eval_result=get_post("attach3");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (43, '{{ticket_attach4}}', '$eval_result=get_post("attach4");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (44, '{{ticket_attach}}', '$eval_result=get_post("attach1").",".get_post("attach2").",".get_post("attach3").",".get_post("attach4");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_code` VALUES (45, '{{iss_event_description}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_command`
-- 

CREATE TABLE IF NOT EXISTS `cmr_command` (
  `id` int(11) NOT NULL auto_increment,
  `command_name` varchar(254) NOT NULL default '',
  `command_line` varchar(254) NOT NULL default '',
  `state` enum('','active','diactivated') NOT NULL default 'active',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`command_name`)
) TYPE=MyISAM COMMENT='table of commands' AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `cmr_command`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_contact`
-- 

CREATE TABLE IF NOT EXISTS `cmr_contact` (
  `id` int(11) NOT NULL auto_increment,
  `uid` varchar(254) NOT NULL default '',
  `name` varchar(254) NOT NULL default '',
  `last_name` varchar(254) default '',
  `sexe` enum('','M','F') default '',
  `function` varchar(254) default '',
  `email` varchar(254) default '',
  `email_sign` text,
  `tel` varchar(254) default '',
  `cel` varchar(254) default '',
  `adress` varchar(254) default '',
  `location` varchar(254) NOT NULL default '',
  `country` varchar(254) NOT NULL default 'active',
  `type` enum('','vip','admin','user','custumer','web','model','system','forum','auto','chat','tstm','database','demo','application') default '',
  `state` enum('','active','diactivated') NOT NULL default 'active',
  `status` enum('','connect','disconnect') default '',
  `lang` varchar(254) NOT NULL default 'italian',
  `style` varchar(254) NOT NULL default 'default',
  `public_key` text,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uid` (`uid`),
  UNIQUE KEY `email` (`email`)
) TYPE=MyISAM PACK_KEYS=0 COMMENT='table of contacts' AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `cmr_contact`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_cron`
-- 

CREATE TABLE IF NOT EXISTS `cmr_cron` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `command` varchar(254) NOT NULL default 'extern_command.command_name',
  `at` timestamp(14) NOT NULL,
  `type` enum('','normal','php','windows','linux','unix','solaris','database') NOT NULL default 'normal',
  `state` enum('','active','diactivated') NOT NULL default 'active',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL default '00000000000000',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM COMMENT='table of cron job commands' AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `cmr_cron`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_download`
-- 

CREATE TABLE IF NOT EXISTS `cmr_download` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(254) NOT NULL default '',
  `path` varchar(254) default '',
  `file_name` varchar(254) default '',
  `file_type` varchar(254) default '',
  `file_size` varchar(254) default '',
  `state` enum('','active','diactivated') NOT NULL default 'active',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='Table of file to download' AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `cmr_download`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_email`
-- 

CREATE TABLE IF NOT EXISTS `cmr_email` (
  `id` int(11) NOT NULL auto_increment,
  `encoding` varchar(254) NOT NULL default '',
  `lang` varchar(254) NOT NULL default '',
  `header` text,
  `mail_title` varchar(254) NOT NULL default '',
  `mail_from` varchar(254) NOT NULL default '',
  `mail_to` varchar(254) NOT NULL default '',
  `mail_cc` varchar(254) NOT NULL default '',
  `mail_bcc` varchar(254) NOT NULL default '',
  `attach` enum('','yes','no') default 'no',
  `text` text,
  `my_master` varchar(254) NOT NULL default 'extern_email.name',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM PACK_KEYS=0 COMMENT='table of emails' AUTO_INCREMENT=10 ;

-- 
-- Dump dei dati per la tabella `cmr_email`
-- 

INSERT IGNORE INTO `cmr_email` VALUES (1, '', 'italian', '', '[0809001] Hello word', 'Security Operation Center <etchouamou@sourceforge.net>', 'etchouamou@sourceforge.net', '', 'tchouamoueric@yahoo.com', '', '-------------[2008-Sep-Mon 10:02:54]-------------\r\n\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha preso in carico il problema con il\r\nTicket numero 0809001.\r\n\r\nHello Word;\r\nOnly a test\r\n\r\n\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n\r\n\r\n', '', '', '', '', '\r\n(*) 29-09-2008 10:01:38 Aperto Da [ admin@localhost] \r\n\r\n', '20080929100254');
INSERT IGNORE INTO `cmr_email` VALUES (2, '', 'italian', '', '[0809001] Hello word', 'Security Operation Center <etchouamou@sourceforge.net>', 'etchouamou@sourceforge.net', '', 'tchouamoueric@yahoo.com', '', '-------------[2008-Sep-Mon 10:07:32]-------------\r\n\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha preso in carico il problema con il\r\nTicket numero 0809001.\r\n\r\nHello Word;\r\nOnly a test\r\n\r\n\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n\r\n\r\n', '', '', '', '', '\r\n(*) 29-09-2008 10:01:38 Aperto Da [ admin@localhost] \r\n\r\n', '20080929100732');
INSERT IGNORE INTO `cmr_email` VALUES (3, '', 'italian', '', '[0809001] Hello word', 'Security Operation Center <etchouamou@sourceforge.net>', 'etchouamou@sourceforge.net', '', 'tchouamoueric@yahoo.com', '', '-------------[2008-Sep-Mon 10:26:47]-------------\r\n\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha preso in carico il problema con il\r\nTicket numero 0809001.\r\n\r\nHello Word;\r\nOnly a test\r\n\r\n\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n\r\n\r\n', '', '', '', '', '\r\n(*) 29-09-2008 10:01:38 Aperto Da [ admin@localhost] \r\n\r\n', '20080929102648');
INSERT IGNORE INTO `cmr_email` VALUES (4, '', 'italian', '', '[0809001] Hello word', 'Security Operation Center <etchouamou@sourceforge.net>', 'etchouamou@sourceforge.net', '', 'tchouamoueric@yahoo.com', '', '-------------[2008-Sep-Mon 10:34:42]-------------\r\n\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha preso in carico il problema con il\r\nTicket numero 0809001.\r\n\r\nHello Word;\r\nOnly a test\r\n\r\n\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n\r\n\r\n', '', '', '', '', '\r\n(*) 29-09-2008 10:01:38 Aperto Da [ admin@localhost] \r\n\r\n', '20080929103442');
INSERT IGNORE INTO `cmr_email` VALUES (5, '', 'italian', '', '[0809001] Hello word', 'Security Operation Center <etchouamou@sourceforge.net>', 'etchouamou@sourceforge.net', '', 'tchouamoueric@yahoo.com', '', '-------------[2008-Sep-Mon 10:35:24]-------------\r\n\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha preso in carico il problema con il\r\nTicket numero 0809001.\r\n\r\nHello Word;\r\nOnly a test\r\n\r\n\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n\r\n\r\n', '', '', '', '', '\r\n(*) 29-09-2008 10:01:38 Aperto Da [ admin@localhost] \r\n\r\n', '20080929103524');
INSERT IGNORE INTO `cmr_email` VALUES (6, '', 'italian', '', '[0809004] Hello word', 'etchouamou@sourceforge.net', 'etchouamou@sourceforge.net', '', 'tchouamoueric@yahoo.com', '', '-------------[2008-Sep-Mon 10:41:15]-------------\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha aggiornato lo stato del ticket gia''\r\naperto 0809004.\r\n\r\nUpdate test\r\n\r\n\r\n\r\n\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n\r\n--\r\n\r\n-------------[2008-Sep-Mon 10:34:42]-------------\r\n\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha preso in carico il problema con il\r\nTicket numero 0809001.\r\n\r\nHello Word;\r\nOnly a test\r\n\r\n\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n\r\n\r\n\r\n', '', '', '', '', '\r\n(*) 29-09-2008 10:01:38 Aperto Da [ admin@localhost] \r\n\r\n\r\n(*) 29-09-2008 10:40:52 Aggiornato Da [ admin@localhost]\r\n\r\n', '20080929104115');
INSERT IGNORE INTO `cmr_email` VALUES (7, '', 'italian', '', '[0809001] Hello word', 'etchouamou@sourceforge.net', 'etchouamou@sourceforge.net', '', 'tchouamoueric@yahoo.com', '', '-------------[2008-Sep-Mon 10:42:01]-------------\r\n Spett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha provveduto a chiudere il ticket  0809001\r\n\r\nClose test\r\n\r\n\r\n\r\n\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer riaprire il Ticket potete rispondere a questo messaggio (senza modificarne l''oggetto) oppure contattatarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n\r\n\r\n--\r\n\r\n-------------[2008-Sep-Mon 10:02:54]-------------\r\n\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha preso in carico il problema con il\r\nTicket numero 0809001.\r\n\r\nHello Word;\r\nOnly a test\r\n\r\n\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n\r\n\r\n\r\n', '', '', '', '', '\r\n(*) 29-09-2008 10:01:38 Aperto Da [ admin@localhost] \r\n\r\n\r\n(*) 29-09-2008 10:41:36 Chiuso Da [ admin@localhost]\r\n\r\n', '20080929104202');
INSERT IGNORE INTO `cmr_email` VALUES (8, '', 'italian', '', '[0809003] Hello word', 'etchouamou@sourceforge.net', 'etchouamou@sourceforge.net', '', 'tchouamoueric@yahoo.com', '', '-------------[2008-Sep-Mon 10:50:53]-------------\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha aggiornato lo stato del ticket gia''\r\naperto 0809003.\r\n\r\nUpdate test\r\n\r\n\r\n\r\n\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n\r\n--\r\n\r\n-------------[2008-Sep-Mon 10:26:47]-------------\r\n\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha preso in carico il problema con il\r\nTicket numero 0809001.\r\n\r\nHello Word;\r\nOnly a test\r\n\r\n\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n\r\n\r\n\r\n', '', '', '', '', '\r\n(*) 29-09-2008 10:01:38 Aperto Da [ admin@localhost] \r\n\r\n\r\n(*) 29-09-2008 10:50:31 Aggiornato Da [ admin@localhost]\r\n\r\n', '20080929105054');
INSERT IGNORE INTO `cmr_email` VALUES (9, '', 'default', '', '[0809004] Hello word', 'etchouamou@sourceforge.net', 'etchouamou@sourceforge.net', '', 'tchouamoueric@yahoo.com', '', '-------------[2008-Sep-Mon 10:59:15]-------------\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha aggiornato lo stato del ticket gia''\r\naperto 0809004.\r\n\r\n(breve descrizione dell''aggiornamento)\r\n\r\n\r\n\r\n\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n\r\n--\r\n\r\n-------------[2008-Sep-Mon 10:41:15]-------------\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha aggiornato lo stato del ticket gia''\r\naperto 0809004.\r\n\r\nUpdate test\r\n\r\n\r\n\r\n\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n\r\n--\r\n\r\n-------------[2008-Sep-Mon 10:34:42]-------------\r\n\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha preso in carico il problema con il\r\nTicket numero 0809001.\r\n\r\nHello Word;\r\nOnly a test\r\n\r\n\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n\r\n\r\n\r\n\r\n', '', '', '', '', '\r\n(*) 29-09-2008 10:01:38 Aperto Da [ admin@localhost] \r\n\r\n\r\n(*) 29-09-2008 10:40:52 Aggiornato Da [ admin@localhost]\r\n\r\n\r\n(*) 29-09-2008 10:59:06 Aggiornato Da [ admin@localhost]\r\n\r\n', '20080929105915');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_escalation`
-- 

CREATE TABLE IF NOT EXISTS `cmr_escalation` (
  `id` int(11) NOT NULL auto_increment,
  `ticket_number` varchar(254) NOT NULL default 'extern_ticket.number',
  `action` varchar(254) NOT NULL default 'update',
  `id_ticket` int(11) NOT NULL default '0',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='table of escalations' AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `cmr_escalation`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_faq`
-- 

CREATE TABLE IF NOT EXISTS `cmr_faq` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `argoment` varchar(254) NOT NULL default '',
  `question` text,
  `response` text,
  `state` enum('','active','diactivated') NOT NULL default 'active',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM COMMENT='table of faqs' AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `cmr_faq`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_father_groups`
-- 

CREATE TABLE IF NOT EXISTS `cmr_father_groups` (
  `id` bigint(20) NOT NULL auto_increment,
  `group_father` varchar(240) NOT NULL default 'extern_groups.name',
  `group_child` varchar(240) NOT NULL default 'extern_groups.name',
  `state` enum('','active','disactivated') NOT NULL default 'active',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `group_father` (`group_father`,`group_child`)
) TYPE=MyISAM COMMENT='table of father groups' AUTO_INCREMENT=69 ;

-- 
-- Dump dei dati per la tabella `cmr_father_groups`
-- 

INSERT IGNORE INTO `cmr_father_groups` VALUES (1, 'admin', 'admin', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (2, 'admin', 'operator', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (3, 'admin', 'tecnician', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (4, 'admin', 'guest', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (5, 'admin', 'client', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (6, 'admin', 'all_user', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (7, 'admin', 'first_level', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (8, 'admin', 'second_level', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (9, 'admin', 'last_level', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (10, 'admin', 'chat', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (11, 'admin', 'forum', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (12, 'admin', 'default', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (13, 'admin', 'null', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (14, 'admin', 'model', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (15, 'admin', 'web', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (16, 'admin', 'noc', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (17, 'admin', 'soc', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (18, 'operator', 'operator', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (19, 'operator', 'tecnician', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (20, 'operator', 'guest', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (21, 'operator', 'client', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (22, 'operator', 'all_user', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (23, 'operator', 'first_level', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (24, 'operator', 'second_level', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (25, 'operator', 'last_level', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (26, 'operator', 'chat', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (27, 'operator', 'forum', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (28, 'operator', 'default', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (29, 'operator', 'null', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (30, 'operator', 'model', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (31, 'operator', 'web', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (32, 'operator', 'noc', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (33, 'operator', 'soc', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (34, 'tecnician', 'tecnician', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (35, 'tecnician', 'guest', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (36, 'tecnician', 'client', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (37, 'tecnician', 'all_user', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (38, 'tecnician', 'first_level', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (39, 'tecnician', 'second_level', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (40, 'tecnician', 'last_level', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (41, 'tecnician', 'chat', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (42, 'tecnician', 'forum', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (43, 'tecnician', 'default', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (44, 'tecnician', 'null', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (45, 'tecnician', 'model', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (46, 'tecnician', 'web', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (47, 'tecnician', 'noc', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (48, 'tecnician', 'soc', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (49, 'developer', 'developer', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (50, 'developer', 'admin', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (51, 'developer', 'operator', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (52, 'developer', 'guest', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (53, 'developer', 'client', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (54, 'developer', 'all_user', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (55, 'developer', 'first_level', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (56, 'developer', 'second_level', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (57, 'developer', 'last_level', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (58, 'developer', 'chat', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (59, 'developer', 'forum', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (60, 'developer', 'default', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (61, 'developer', 'null', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (62, 'developer', 'model', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (63, 'developer', 'web', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (64, 'developer', 'noc', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (65, 'developer', 'soc', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (66, 'client', 'client', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (67, 'demo', 'demo', 'active', '', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_father_groups` VALUES (68, 'guest', 'guest', 'active', '', '', '', '', '20080929095600');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_forum`
-- 

CREATE TABLE IF NOT EXISTS `cmr_forum` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `argoment` varchar(254) NOT NULL default '',
  `text` text,
  `my_master` varchar(254) NOT NULL default 'extern_forum.name',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM COMMENT='table of forum' AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `cmr_forum`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_generator`
-- 

CREATE TABLE IF NOT EXISTS `cmr_generator` (
  `id` bigint(20) NOT NULL auto_increment,
  `db` varchar(254) NOT NULL default '',
  `table` varchar(254) NOT NULL default '0',
  `column` varchar(254) NOT NULL default '',
  `code1` enum('','@_database_@','@_show_create_db_@','@_date_time_@','@_db_date_time_@','@_db_privileges_@','@_db_caracter_set_@','@_db_collation_@','@_db_type_@','@_pre_match_@','@_form_name_@','@_table_@','@_table_name_@','@_show_create_table_@','@_table_engine_@','@_table_version_@','@_table_row_format_@','@_table_rows_@','@_table_avg_row_length_@','@_table_data_length_@','@_table_max_data_length_@','@_table_index_length_@','@_table_data_free_@','@_table_auto_increment_@','@_table_create_time_@','@_table_update_time_@','@_table_check_time_@','@_table_collation_@','@_table_checksum_@','@_table_create_options_@','@_table_comment_@','@_table_index_@','@_table_num_row_@','@_table_num_column_@','@_table_primary_@','@_table_type_@','@_table_privilege_@','@_table_date_time_@','@_table_non_unique_@','@_table_key_name_@','@_table_seq_in_index_@','@_table_column_name_@','@_table_collation_@','@_table_cardinality_@','@_table_sub_part_@','@_table_packed_@','@_table_index_type_@','@_column_@','@_column_id_@','@_column_count_@','@_column_null_@','@_column_default_@','@_column_extra_@','@_column_field_@','@_column_type_@','@_column_collation_@','@_column_key_@','@_column_privileges_@','@_column_comment_@','@_column_index1_@','@_column_unique1_@','@_column_not_null1_@','@_column_extern1_@','@_column_comment1_@','@_column_date_time1_@','@_column_int1_@','@_column_null1_@','@_column_key1_@','@_column_text1_@','@_column_index2_@','@_column_unique2_@','@_column_not_null2_@','@_column_extern2_@','@_column_comment2_@','@_column_date_time2_@','@_column_int2_@','@_column_null2_@','@_column_key2_@','@_column_text2_@','@_column_index3_@','@_column_unique3_@','@_column_not_null3_@','@_column_extern3_@','@_column_comment3_@','@_column_date_time3_@','@_column_int3_@','@_column_null3_@','@_column_key3_@','@_column_text3_@','@_column0_@','@_column1_@','@_column2_@','@_column3_@','@_column4_@','@_column5_@','@_form_label_elmt_@','@_form_box_elmt_@','@_form_box_elmt_upd_@','@_column[0-9]+_@','@_table[0-9]+_@','@_rown[0-9]+_@') NOT NULL default '@_database_@',
  `code2` enum('','@_foreach_comment_@([^@]*)@@_foreach_comment_@@','@_foreach_db_@([^@]*)@@_foreach_db_@@','@_foreach_table_@([^@]*)@@_foreach_table_@@','@_foreach_column_@([^@]*)@@_foreach_column_@@','@_foreach_rown_@([^@]*)@@_foreach_rown_@@','@_button_@)(.*)(@@_button_@@)') NOT NULL default '@_foreach_comment_@([^@]*)@@_foreach_comment_@@',
  `code3` enum('','@@date_time@@','@@date@@','@@time@@','@@my_ip@@','@@my_name@@','@@my_last_name@@','@@my_lang@@','@@my_comment@@','@@my_tel@@','@@my_cel@@','@@my_group@@','@@my_function@@','@@my_location@@','@@my_sign@@','@@group_sign@@','@@ticket_number@@','@@ticket_title@@','@@ticket_text@@','@@ticket_assign_to@@','@@ticket_severity@@','@@ticket_state@@','@@ticket_type@@','@@ticket_list_user_inpact@@','@@ticket_list_group_inpact@@','@@ticket_list_asset_inpact@@','@@ticket_sla@@','@@ticket_lang@@','@@ticket_call_log_group@@','@@ticket_comment@@') NOT NULL default '@@date_time@@',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`db`)
) TYPE=MyISAM COMMENT='table for generator' AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `cmr_generator`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_groups`
-- 

CREATE TABLE IF NOT EXISTS `cmr_groups` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `state` enum('','active','disactivated') NOT NULL default 'active',
  `level` enum('','0_guest','1_contact','2_client','3_user','4_tecnician','5_noc','5_soc','5_operator','6_admin','7_programer','0','1','2','3','4','5','6','7') NOT NULL default '0_guest',
  `location` varchar(254) default '',
  `type` set('tstm','forum','chat','web','database','demo','helpdesk','crm','object','software','hardware','sevrices','normal','read_only') NOT NULL default 'normal',
  `sla` timestamp(14) NOT NULL,
  `public_key` text,
  `private_key` text,
  `pass_phrase` varchar(254) default '',
  `email_sign` text,
  `referent_email` varchar(254) default 'extern_user.email',
  `admin_email` varchar(254) default 'extern_user.email',
  `home` varchar(254) NOT NULL default 'home/groups/default',
  `notify` enum('','by_email','by_sms','by_web','all','unknow') NOT NULL default 'by_email',
  `web_site` varchar(254) default '',
  `login_script` text,
  `adress` varchar(254) default '',
  `my_master` varchar(254) NOT NULL default 'extern_groups.name',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL default '00000000000000',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM COMMENT='table of groups' AUTO_INCREMENT=17 ;

-- 
-- Dump dei dati per la tabella `cmr_groups`
-- 

INSERT IGNORE INTO `cmr_groups` VALUES (1, 'developer', 'active', '', '', 'normal', '20080929095600', '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/developer', 'by_email', '', '', '', '', '5_noc,5_soc,5_operator,6_developer,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_groups` VALUES (2, 'admin', 'active', '6_admin', '', 'normal', '20080929095600', '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/admin', 'by_email', '', '', '', '', '5_noc,5_soc,5_operator,6_admin,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_groups` VALUES (3, 'operator', 'active', '5_operator', '', 'normal', '20080929095600', '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/operator', 'by_email', '', '', '', '', '5_noc,5_soc,5_operator,6_operator,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_groups` VALUES (4, 'soc', 'active', '5_soc', '', 'normal', '20080929095600', '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/soc', 'by_email', '', '', '', '', '5_noc,5_soc,5_operator,6_soc,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_groups` VALUES (5, 'noc', 'active', '5_noc', '', 'normal', '20080929095600', '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/noc', 'by_email', '', '', '', '', '5_noc,5_soc,5_operator,6_noc,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_groups` VALUES (6, 'first_level', 'active', '5_noc', '', 'normal', '20080929095600', '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/first_level', 'by_email', '', '', '', '', '5_noc,5_soc,5_operator,6_first_level,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_groups` VALUES (7, 'second_level', 'active', '5_noc', '', 'normal', '20080929095600', '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/second_level', 'by_email', '', '', '', '', '5_noc,5_soc,5_operator,6_second_level,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_groups` VALUES (8, 'tecnician', 'active', '4_tecnician', '', 'normal', '20080929095600', '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/tecnician', 'by_email', '', '', '', '', '5_noc,5_soc,5_operator,6_tecnician,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_groups` VALUES (9, 'client', 'active', '2_client', '', 'normal', '20080929095600', '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/client', 'by_email', '', '', '', '', '5_noc,5_soc,5_operator,6_client,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_groups` VALUES (10, 'all_user', 'active', '0_guest', '', 'normal', '20080929095600', '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/all_user', 'by_email', '', '', '', '', '5_noc,5_soc,5_operator,6_all_user,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_groups` VALUES (11, 'forum', 'active', '0_guest', '', 'normal', '20080929095600', '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/forum', 'by_email', '', '', '', '', '5_noc,5_soc,5_operator,6_forum,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_groups` VALUES (12, 'chat', 'active', '0_guest', '', 'normal', '20080929095600', '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/chat', 'by_email', '', '', '', '', '5_noc,5_soc,5_operator,6_chat,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_groups` VALUES (13, 'default', 'active', '0_guest', '', 'normal', '20080929095600', '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/default', 'by_email', '', '', '', '', '5_noc,5_soc,5_operator,6_default,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_groups` VALUES (14, 'no_db', 'active', '0_guest', '', 'normal', '20080929095600', '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/no_db', 'by_email', '', '', '', '', '5_noc,5_soc,5_operator,6_no_db,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_groups` VALUES (15, 'demo', 'active', '0_guest', '', 'normal', '20080929095600', '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/demo', 'by_email', '', '', '', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', '20080929095600');
INSERT IGNORE INTO `cmr_groups` VALUES (16, 'guest', 'active', '0_guest', '', 'normal', '20080929095600', '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/guest', 'by_email', '', '', '', '', '5_noc,5_soc,5_operator,6_guest,7_programer', '', '', '', '20080929095600');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_logging`
-- 

CREATE TABLE IF NOT EXISTS `cmr_logging` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_email` varchar(254) NOT NULL default 'extern_user.email',
  `table_name` varchar(64) NOT NULL default '',
  `line_id` varchar(64) NOT NULL default '0',
  `action` varchar(64) NOT NULL default 'read',
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='table of action logging' AUTO_INCREMENT=41 ;

-- 
-- Dump dei dati per la tabella `cmr_logging`
-- 

INSERT IGNORE INTO `cmr_logging` VALUES (1, 'admin@localhost', 'cmr_user', '07a20bea8e92733d3991ef6c47e21d75', 'login', '20080929100126');
INSERT IGNORE INTO `cmr_logging` VALUES (2, 'admin@localhost', 'cmr_ticket', '0809001', 'new', '20080929100254');
INSERT IGNORE INTO `cmr_logging` VALUES (3, 'admin@localhost', 'cmr_ticket', '0809002', 'new', '20080929100732');
INSERT IGNORE INTO `cmr_logging` VALUES (4, 'admin@localhost', 'cmr_ticket', '0809003', 'new', '20080929102647');
INSERT IGNORE INTO `cmr_logging` VALUES (5, 'admin@localhost', 'cmr_ticket', '0809004', 'new', '20080929103442');
INSERT IGNORE INTO `cmr_logging` VALUES (6, 'admin@localhost', 'cmr_ticket', '0809005', 'new', '20080929103524');
INSERT IGNORE INTO `cmr_logging` VALUES (7, 'admin@localhost', 'cmr_ticket', '56', 'read', '20080929103554');
INSERT IGNORE INTO `cmr_logging` VALUES (8, 'admin@localhost', 'cmr_ticket', '56', 'read', '20080929103557');
INSERT IGNORE INTO `cmr_logging` VALUES (9, 'admin@localhost', 'cmr_ticket', '56', 'read', '20080929103559');
INSERT IGNORE INTO `cmr_logging` VALUES (10, 'admin@localhost', 'cmr_ticket', '57', 'read', '20080929104045');
INSERT IGNORE INTO `cmr_logging` VALUES (11, 'admin@localhost', 'cmr_ticket', '57', 'read', '20080929104048');
INSERT IGNORE INTO `cmr_logging` VALUES (12, 'admin@localhost', 'cmr_ticket', '57', 'read', '20080929104050');
INSERT IGNORE INTO `cmr_logging` VALUES (13, 'admin@localhost', 'cmr_ticket', '57', 'update', '20080929104115');
INSERT IGNORE INTO `cmr_logging` VALUES (14, 'admin@localhost', 'cmr_ticket', '54', 'read', '20080929104129');
INSERT IGNORE INTO `cmr_logging` VALUES (15, 'admin@localhost', 'cmr_ticket', '54', 'read', '20080929104132');
INSERT IGNORE INTO `cmr_logging` VALUES (16, 'admin@localhost', 'cmr_ticket', '54', 'read', '20080929104134');
INSERT IGNORE INTO `cmr_logging` VALUES (17, 'admin@localhost', 'cmr_ticket', '54', 'close', '20080929104201');
INSERT IGNORE INTO `cmr_logging` VALUES (18, 'admin@localhost', 'cmr_ticket', '55', 'read', '20080929104221');
INSERT IGNORE INTO `cmr_logging` VALUES (19, 'admin@localhost', 'cmr_ticket', '55', 'read', '20080929104224');
INSERT IGNORE INTO `cmr_logging` VALUES (20, 'admin@localhost', 'cmr_ticket', '55', 'read', '20080929104226');
INSERT IGNORE INTO `cmr_logging` VALUES (21, 'admin@localhost', 'cmr_ticket', '56', 'read', '20080929105023');
INSERT IGNORE INTO `cmr_logging` VALUES (22, 'admin@localhost', 'cmr_ticket', '56', 'read', '20080929105026');
INSERT IGNORE INTO `cmr_logging` VALUES (23, 'admin@localhost', 'cmr_ticket', '56', 'read', '20080929105028');
INSERT IGNORE INTO `cmr_logging` VALUES (24, 'admin@localhost', 'cmr_ticket', '56', 'update', '20080929105053');
INSERT IGNORE INTO `cmr_logging` VALUES (25, 'admin@localhost', '{match_label_default_table>', '07a20bea8e92733d3991ef6c47e21d75', 'search 0809004', '20080929105345');
INSERT IGNORE INTO `cmr_logging` VALUES (26, 'admin@localhost', 'cmr_ticket', '07a20bea8e92733d3991ef6c47e21d75', 'search 0809004', '20080929105837');
INSERT IGNORE INTO `cmr_logging` VALUES (27, 'admin@localhost', 'cmr_ticket', '59', 'read', '20080929105846');
INSERT IGNORE INTO `cmr_logging` VALUES (28, 'admin@localhost', 'cmr_ticket', '59', 'read', '20080929105849');
INSERT IGNORE INTO `cmr_logging` VALUES (29, 'admin@localhost', 'cmr_ticket', '59', 'read', '20080929105851');
INSERT IGNORE INTO `cmr_logging` VALUES (30, 'admin@localhost', 'cmr_ticket', '59', 'update', '20080929105915');
INSERT IGNORE INTO `cmr_logging` VALUES (31, 'admin@localhost', 'report', '07a20bea8e92733d3991ef6c47e21d75', 'new', '20080929110600');
INSERT IGNORE INTO `cmr_logging` VALUES (32, 'admin@localhost', 'report', '07a20bea8e92733d3991ef6c47e21d75', 'new', '20080929110602');
INSERT IGNORE INTO `cmr_logging` VALUES (33, 'admin@localhost', 'report', '07a20bea8e92733d3991ef6c47e21d75', 'new', '20080929110602');
INSERT IGNORE INTO `cmr_logging` VALUES (34, 'admin@localhost', 'report', '07a20bea8e92733d3991ef6c47e21d75', 'new', '20080929110602');
INSERT IGNORE INTO `cmr_logging` VALUES (35, 'admin@localhost', 'report', '07a20bea8e92733d3991ef6c47e21d75', 'new', '20080929110602');
INSERT IGNORE INTO `cmr_logging` VALUES (36, 'admin@localhost', 'cmr_user', 'd30471d09614cbcc1634ecebf26dc7b2', 'login', '20080929113407');
INSERT IGNORE INTO `cmr_logging` VALUES (37, 'admin@localhost', 'cmr_user', '1b3cf91b8de489d27171b179a6cc53d6', 'login', '20080929114431');
INSERT IGNORE INTO `cmr_logging` VALUES (38, 'admin@localhost', 'cmr_ticket', '''', 'delete', '20080929122341');
INSERT IGNORE INTO `cmr_logging` VALUES (39, 'admin@localhost', 'cmr_ticket', '''', '', '20080929122343');
INSERT IGNORE INTO `cmr_logging` VALUES (40, 'admin@localhost', 'cmr_ticket', '''', '', '20080929122346');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_message`
-- 

CREATE TABLE IF NOT EXISTS `cmr_message` (
  `id` bigint(20) NOT NULL auto_increment,
  `sender` varchar(254) NOT NULL default '',
  `title` varchar(254) NOT NULL default 'No title',
  `attach` varchar(254) NOT NULL default '',
  `text` text,
  `groups_dest` varchar(254) NOT NULL default '',
  `users_dest` varchar(254) NOT NULL default '',
  `modules_dest` varchar(254) NOT NULL default '',
  `mail_to` varchar(254) NOT NULL default '',
  `mail_cc` varchar(254) NOT NULL default '',
  `mail_bcc` varchar(254) NOT NULL default '',
  `begin_time` timestamp(14) NOT NULL,
  `end_time` timestamp(14) NOT NULL default '00000000000000',
  `intervale` varchar(254) NOT NULL default '',
  `priority` int(11) NOT NULL default '0',
  `type` enum('','text','html','php','email','normal','news','work','java_script','NULL') NOT NULL default 'text',
  `state` enum('','active','disactivated','NULL') NOT NULL default 'active',
  `my_master` varchar(254) NOT NULL default 'extern_message.title',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL default '00000000000000',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='table of messages' AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `cmr_message`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_nagios`
-- 

CREATE TABLE IF NOT EXISTS `cmr_nagios` (
  `id` int(11) NOT NULL auto_increment,
  `group_name` varchar(240) NOT NULL default 'extern_groups.name',
  `nagios_group` varchar(240) NOT NULL default '',
  `config` text,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `group_name` (`group_name`,`nagios_group`)
) TYPE=MyISAM PACK_KEYS=0 COMMENT='table for nagios' AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `cmr_nagios`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_query`
-- 

CREATE TABLE IF NOT EXISTS `cmr_query` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `language` varchar(254) default '',
  `state` enum('','active','diactivated') NOT NULL default 'active',
  `text` text,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='table of query' AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `cmr_query`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_rss`
-- 

CREATE TABLE IF NOT EXISTS `cmr_rss` (
  `id` int(11) NOT NULL auto_increment,
  `version` varchar(254) NOT NULL default '',
  `title` varchar(254) NOT NULL default 'No title',
  `link` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `rating` varchar(254) NOT NULL default '',
  `state` enum('','active','diactivated') NOT NULL default 'active',
  `feed_adress` varchar(254) default '',
  `type` enum('','normal','job','ids','xpu','va','rma','hardware_Move','hardware_remove','hardware_add','hardware_replace','new_account','new_group','hardware_install','hardware_request','hardware_restart','software_install','software_remove','software_update','software_request','model','NULL') NOT NULL default 'normal',
  `text` text,
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM PACK_KEYS=0 COMMENT='table of rss' AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `cmr_rss`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_services`
-- 

CREATE TABLE IF NOT EXISTS `cmr_services` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `port` int(11) NOT NULL default '0',
  `protocol` varchar(254) NOT NULL default '',
  `check_command` varchar(254) NOT NULL default 'extern_command.command_line',
  `my_master` varchar(254) NOT NULL default 'extern_services.name',
  `my_slave` varchar(254) NOT NULL default 'extern_services.name',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM COMMENT='table of services' AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `cmr_services`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_session`
-- 

CREATE TABLE IF NOT EXISTS `cmr_session` (
  `id` int(11) NOT NULL auto_increment,
  `sessionid` varchar(50) NOT NULL default '',
  `sessionip` varchar(50) NOT NULL default '',
  `user_email` varchar(254) NOT NULL default 'extern_user.email',
  `status` varchar(254) NOT NULL default 'disconnect',
  `state` varchar(254) NOT NULL default 'active',
  `time_out` varchar(254) default '',
  `session_end` timestamp(14) NOT NULL,
  `date_time` timestamp(14) NOT NULL default '00000000000000',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `sessionid` (`sessionid`,`sessionip`,`user_email`)
) TYPE=MyISAM COMMENT='table of sessions' AUTO_INCREMENT=4 ;

-- 
-- Dump dei dati per la tabella `cmr_session`
-- 

INSERT IGNORE INTO `cmr_session` VALUES (1, '07a20bea8e92733d3991ef6c47e21d75', '192.168.1.186', 'admin@localhost', 'connect', 'active', '600 MINUTE', '00000000000000', '20080929100126');
INSERT IGNORE INTO `cmr_session` VALUES (2, 'd30471d09614cbcc1634ecebf26dc7b2', '192.168.1.186', 'admin@localhost', 'connect', 'active', '600 MINUTE', '00000000000000', '20080929113407');
INSERT IGNORE INTO `cmr_session` VALUES (3, '1b3cf91b8de489d27171b179a6cc53d6', '192.168.1.186', 'admin@localhost', 'connect', 'active', '600 MINUTE', '00000000000000', '20080929114431');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_sla`
-- 

CREATE TABLE IF NOT EXISTS `cmr_sla` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_email` varchar(254) default 'extern_user.email',
  `group_name` varchar(254) NOT NULL default 'extern_groups.name',
  `asset_ip` varchar(254) NOT NULL default '',
  `user_type` enum('','vip','admin','user','custumer','web','model','system','forum','auto','chat','tstm','database','demo','application') NOT NULL default 'user',
  `group_type` enum('','tstm','forum','chat','web','database','demo','helpdesk','crm','object','software','hardware','sevrices') NOT NULL default 'tstm',
  `asset_type` enum('','tstm','forum','chat','web','database','demo','helpdesk','crm','object','software','hardware','sevrices') NOT NULL default 'tstm',
  `ticket_type` enum('','normal','job','ids','xpu','va','rma','hardware_Move','hardware_remove','hardware_add','hardware_replace','new_account','new_group','hardware_install','hardware_request','hardware_restart','software_install','software_remove','software_update','software_request','model','NULL') NOT NULL default 'normal',
  `ticket_call_method` set('normal','automatic','by_help_desk','by_email','by_phone','by_web','by_sms','unknow','SNMP','NULL') NOT NULL default 'by_email',
  `ticket_state` enum('','open','update','close','in_progress','pending','unknow','NULL') NOT NULL default 'open',
  `ticket_severity` enum('','info','low','normal','medium','high','critical','NULL') default 'normal',
  `ticket_assign_to` varchar(254) NOT NULL default '',
  `num_user_impact` int(11) default '0',
  `num_group_impact` int(11) default '0',
  `num_asset_impact` int(11) default '0',
  `sla` varchar(254) NOT NULL default '3 DAY',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='table of sla' AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `cmr_sla`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_software`
-- 

CREATE TABLE IF NOT EXISTS `cmr_software` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `type` varchar(254) NOT NULL default '',
  `copyrigth` varchar(254) NOT NULL default '',
  `certificate` varchar(254) NOT NULL default 'extern_certificate.name',
  `my_master` varchar(254) NOT NULL default 'extern_software.name',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='table of software' AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `cmr_software`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_statistic`
-- 

CREATE TABLE IF NOT EXISTS `cmr_statistic` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `type` set('day','week','month','year','other') NOT NULL default '',
  `period_begin` timestamp(14) NOT NULL,
  `period_end` timestamp(14) NOT NULL default '00000000000000',
  `data` text,
  `my_master` varchar(254) NOT NULL default 'extern_statistic.name',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default 'noc@localhost,soc@localhost,operator@localhost,admin@localhost,programer@localhost',
  `allow_groups` varchar(254) NOT NULL default 'noc,soc,operator,admin,programer',
  `comment` text,
  `date_time` timestamp(14) NOT NULL default '00000000000000',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='table of statistics' AUTO_INCREMENT=1 ;

-- 
-- Dump dei dati per la tabella `cmr_statistic`
-- 


-- --------------------------------------------------------

-- 
-- Struttura della tabella `cmr_ticket`
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
  `state` enum('','open','update','close','in_progress','pending','unknow','NULL') NOT NULL default 'open',
  `state_now` enum('','opened','updated','closed','unknow','open','update','close','in_progress','pending','unknow','NULL') NOT NULL default 'opened',
  `assign_to` varchar(254) default '',
  `list_user_impact` varchar(254) default '',
  `list_group_impact` varchar(124) default '',
  `list_asset_impact` varchar(254) default '',
  `severity` enum('','info','low','normal','medium','high','critical','NULL') default 'normal',
  `sla` varchar(64) NOT NULL default '3 DAY',
  `mail_title` varchar(254) NOT NULL default '',
  `mail_from` varchar(254) NOT NULL default 'operator@localhost',
  `mail_to` varchar(254) NOT NULL default 'soc@localhost',
  `mail_cc` varchar(254) NOT NULL default 'noc@localhost',
  `mail_bcc` varchar(254) NOT NULL default 'admin@localhost',
  `attach` varchar(254) NOT NULL default 'operator@localhost',
  `type` enum('','normal','job','ids','xpu','va','rma','hardware_Move','hardware_remove','hardware_add','hardware_replace','new_account','new_group','hardware_install','hardware_request','hardware_restart','software_install','software_remove','software_update','software_request','model','NULL') NOT NULL default 'normal',
  `text` text,
  `mail_text` text,
  `my_master` varchar(254) NOT NULL default '',
  `allow_level` varchar(254) NOT NULL default '5_noc,5_soc,5_operator,6_admin,7_programer',
  `allow_email` varchar(254) NOT NULL default '',
  `allow_groups` varchar(254) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `number` (`number`),
  KEY `title` (`title`),
  FULLTEXT KEY `text` (`text`),
  FULLTEXT KEY `mail_text` (`mail_text`)
) TYPE=MyISAM COMMENT='table of tickets' AUTO_INCREMENT=63 ;

-- 
-- Dump dei dati per la tabella `cmr_ticket`
-- 

INSERT IGNORE INTO `cmr_ticket` VALUES (1, '0507001', 'italian', 'Segnalazione Ticket Normal', '', '', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', 'Ticket [{{ticket_number}}] Segnalazione: {{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'normal', '(breve descrizione se segnalato dal cliente oppure\r\n     descrizione dettagliata se e'' stato rilevato da noi)', '-------------[{{date_time}}]-------------\r\n\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha preso in carico il problema con il\r\nTicket numero {{ticket_number}}.\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', '20080929095600');
INSERT IGNORE INTO `cmr_ticket` VALUES (2, '0507002', 'italian', 'Aggiornamento Ticket Normale', 'null', 'null', '', 'by_help_desk', 'update', 'update', 'null', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Aggiornamento: {{ticket_title}}', '|null|', '|null|', '|null|', '|null|', '', 'normal', '(breve descrizione dell''aggiornamento)\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha aggiornato lo stato del ticket gia''\r\naperto {{ticket_number}}.\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', '20080929095600');
INSERT IGNORE INTO `cmr_ticket` VALUES (3, '0507003', 'italian', 'Chiusura Ticket Normale', 'null', 'null', '', 'by_help_desk', 'close', 'close', '', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Chiusura: {{ticket_title}}', '|null|', '|null|', '|null|', '|null|', '', 'normal', '(spiegazioni della chiusura)\r\n', '-------------[{{date_time}}]-------------\r\n Spett.le cliente,\r\nLa presente per segnalare che il SOC di Camaroes ha provveduto a chiudere il ticket  {{ticket_number}}\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer riaprire il Ticket potete rispondere a questo messaggio (senza modificarne l''oggetto) oppure contattatarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', '20080929095600');
INSERT IGNORE INTO `cmr_ticket` VALUES (4, '0507004', 'italian', 'Segnalazione Ticket IDS', '', '', '', 'by_help_desk', 'open', 'open', '', '', '', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Segnalazione IDS: {{ticket_title}}', '', '', '', '', '', 'ids', 'Ticket numero : {{ticket_number}}\r\nNome Eventi :{{ticket_title}}\r\nSource IP : \r\nDestination IP : \r\nSeverity : {{ticket_severity}}\r\n\r\n\r\nPer maggiori dettagli sull''evento segnalato:\r\n{{download}}\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n    la presente per segnalare che il SOC di Camaroes ha rilevato un\r\nevento sospetto attraverso i nostri sistemi di monitoraggio.\r\n\r\n{{ticket_text}}\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer comunicare informazioni utili al declassamento del''evento (in caso\r\ndi falso positivo o a seguito di contromisure implementate al vostro\r\ninterno) rispondete a  questo messaggio (senza  modificarne l''oggetto)\r\noppure contattateci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', '20080929095600');
