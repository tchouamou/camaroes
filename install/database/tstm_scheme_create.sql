
-- Host: localhost
-- Generato il: 04 Ott, 2006 at 07:42 AM
-- Versione MySQL: 4.1.9
-- Versione PHP: 4.3.10
--
-- Database: `tstm_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_asset`
--

-- DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
-- USE tstm_db;


CREATE TABLE IF NOT EXISTS `tstm_asset` (
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
  `state` varchar(60) NOT NULL default 'active',
  `login_id` varchar(80) NOT NULL default '',
  `login_pw` varchar(124) NOT NULL default '',
  `check_command` varchar(254) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`,`ip`)
) TYPE=MyISAM COMMENT='Tabella di tutti gli host' AUTO_INCREMENT=183 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_asset_group`
--

CREATE TABLE IF NOT EXISTS `tstm_asset_group` (
  `id` bigint(20) NOT NULL auto_increment,
  `host_id` bigint(20) NOT NULL default '0',
  `host_name` varchar(124) NOT NULL default '',
  `group_name` varchar(60) NOT NULL default '0',
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `host_name` (`host_name`,`group_name`)
) TYPE=MyISAM COMMENT='Tabella del raporto host e gruppo (cliente)' AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_asset_services`
--

CREATE TABLE IF NOT EXISTS `tstm_asset_services` (
  `id` bigint(20) NOT NULL auto_increment,
  `host_id` bigint(20) NOT NULL default '0',
  `host_name` varchar(124) NOT NULL default '',
  `service_name` varchar(124) NOT NULL default '0',
  `state` varchar(60) NOT NULL default '',
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `host_name` (`host_name`,`service_name`)
) TYPE=MyISAM AUTO_INCREMENT=154 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_asset_software`
--

CREATE TABLE IF NOT EXISTS `tstm_asset_software` (
  `id` bigint(20) NOT NULL auto_increment,
  `host_id` bigint(20) NOT NULL default '0',
  `host_name` varchar(124) NOT NULL default '',
  `service_name` varchar(124) NOT NULL default '0',
  `state` varchar(60) NOT NULL default '',
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `host_name` (`host_name`,`service_name`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_asset_tree`
--

CREATE TABLE IF NOT EXISTS `tstm_asset_tree` (
  `id` bigint(20) NOT NULL auto_increment,
  `first_host_id` bigint(20) NOT NULL default '0',
  `second_host_id` bigint(20) NOT NULL default '0',
  `first_host_name` varchar(124) NOT NULL default '',
  `second_host_name` varchar(124) NOT NULL default '',
  `state` varchar(60) default 'active',
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=331 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_asset_user`
--

CREATE TABLE IF NOT EXISTS `tstm_asset_user` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_email` varchar(124) NOT NULL default '0',
  `host_id` bigint(20) NOT NULL default '0',
  `host_ip` varchar(60) NOT NULL default '',
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_id` (`user_email`,`host_id`)
) TYPE=MyISAM COMMENT='Tabella del rapporto host e utente' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_chat`
--

CREATE TABLE IF NOT EXISTS `tstm_chat` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `text` text,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_code`
--

CREATE TABLE IF NOT EXISTS `tstm_code` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(254) NOT NULL default '',
  `script` text NOT NULL,
  `description` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `code` (`code`)
) TYPE=MyISAM COMMENT='text code table' AUTO_INCREMENT=50 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_command`
--

CREATE TABLE IF NOT EXISTS `tstm_command` (
  `id` int(11) NOT NULL auto_increment,
  `command_name` varchar(254) NOT NULL default '',
  `command_line` varchar(254) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`command_name`)
) TYPE=MyISAM AUTO_INCREMENT=69 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_download`
--

CREATE TABLE IF NOT EXISTS `tstm_download` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(254) NOT NULL default '',
  `path` varchar(254) default NULL,
  `file_name` varchar(254) default NULL,
  `file_type` varchar(64) default NULL,
  `file_size` varchar(64) default NULL,
  `comment` text,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='Table of file to download' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_download_group`
--

CREATE TABLE IF NOT EXISTS `tstm_download_group` (
  `id` int(11) NOT NULL auto_increment,
  `download_id` int(11) NOT NULL default '0',
  `group_name` varchar(254) NOT NULL default '',
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `download_id` (`download_id`,`group_name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_escalation`
--

CREATE TABLE IF NOT EXISTS `tstm_escalation` (
  `id` int(11) NOT NULL default '0',
  `ticket_number` varchar(64) NOT NULL default '',
  `action` set('open','update','close','in_progress','pending','unknow','sospend','waiting_for','deleted','escalate') NOT NULL default 'update',
  `id_ticket` int(11) NOT NULL default '0',
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_faq`
--

CREATE TABLE IF NOT EXISTS `tstm_faq` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `text` text,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_father_group`
--

CREATE TABLE IF NOT EXISTS `tstm_father_group` (
  `id` bigint(20) NOT NULL auto_increment,
  `group_father` varchar(60) NOT NULL default '',
  `group_chield` varchar(60) NOT NULL default '',
  `state` enum('active','disactivated') NOT NULL default 'active',
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `group_father` (`group_father`,`group_chield`)
) TYPE=MyISAM AUTO_INCREMENT=357 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_forum`
--

CREATE TABLE IF NOT EXISTS `tstm_forum` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `text` text,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_forum_argoment`
--

CREATE TABLE IF NOT EXISTS `tstm_forum_argoment` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `text` text,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_forum_group`
--

CREATE TABLE IF NOT EXISTS `tstm_forum_group` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_forum_message`
--

CREATE TABLE IF NOT EXISTS `tstm_forum_message` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `comment` text NOT NULL,
  `text` text,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_forum_user`
--

CREATE TABLE IF NOT EXISTS `tstm_forum_user` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_group`
--

CREATE TABLE IF NOT EXISTS `tstm_group` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(60) NOT NULL default '',
  `state` enum('active','disactivated') NOT NULL default 'active',
  `level` enum('0','1','2','3','4','5') NOT NULL default '0',
  `location` varchar(254) default NULL,
  `type` set('tstm','forum','chat','web','database','demo','helpdesk','crm','object','software','hardware','sevrices') default NULL,
  `sla` timestamp NOT NULL default '0000-00-00 00:00:00',
  `public_key` text,
  `private_key` text,
  `pass_phrase` varchar(254) default NULL,
  `email_sign` text,
  `referent_email` varchar(254) default NULL,
  `admin_email` varchar(254) default NULL,
  `folder` varchar(254) default NULL,
  `notify` enum('by_email','by_sms','by_web','all','unknow') NOT NULL default 'by_email',
  `web_site` varchar(254) default NULL,
  `login_script` text,
  `adress` varchar(254) default NULL,
  `comment` text,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=77 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_message`
--

CREATE TABLE IF NOT EXISTS `tstm_message` (
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
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_message_read`
--

CREATE TABLE IF NOT EXISTS `tstm_message_read` (
  `id` bigint(20) NOT NULL default '0',
  `user_email` varchar(124) NOT NULL default '',
  `message_id` int(11) NOT NULL default '0',
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id_user` (`user_email`,`message_id`)
) TYPE=MyISAM COMMENT='Tabella dei messaggi gia letti per utente';

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_nagios`
--

CREATE TABLE IF NOT EXISTS `tstm_nagios` (
  `id` int(11) NOT NULL auto_increment,
  `group_name` varchar(124) NOT NULL default '',
  `nagios_group` varchar(124) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `group_name` (`group_name`,`nagios_group`)
) TYPE=MyISAM PACK_KEYS=0 COMMENT='Tabella per la gestione del modulo nagios' AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_nessus`
--

CREATE TABLE IF NOT EXISTS `tstm_nessus` (
  `id` int(11) NOT NULL auto_increment,
  `group_name` varchar(124) NOT NULL default '',
  `nessus_ip` text,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM PACK_KEYS=0 COMMENT='Tabella per la gestione del modulo nagios' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_news`
--

CREATE TABLE IF NOT EXISTS `tstm_news` (
  `id` bigint(20) NOT NULL auto_increment,
  `text` text,
  `name` varchar(124) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_services`
--

CREATE TABLE IF NOT EXISTS `tstm_services` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `port` int(11) NOT NULL default '0',
  `protocol` varchar(60) NOT NULL default '',
  `check_command` varchar(254) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=72 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_session`
--

CREATE TABLE IF NOT EXISTS `tstm_session` (
  `id` int(11) NOT NULL auto_increment,
  `sessionid` varchar(254) NOT NULL default '',
  `sessionip` varchar(64) NOT NULL default '',
  `user_email` varchar(254) NOT NULL default '',
  `status` varchar(64) NOT NULL default 'disconnect',
  `state` varchar(64) NOT NULL default 'active',
  `time_out` varchar(64) default NULL,
  `session_end` timestamp NOT NULL default '0000-00-00 00:00:00',
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `sessionid` (`sessionid`,`sessionip`,`user_email`)
) TYPE=MyISAM COMMENT='Tabella per la gestione delle sessioni' AUTO_INCREMENT=698 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_sla`
--

CREATE TABLE IF NOT EXISTS `tstm_sla` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_email` varchar(254) default NULL,
  `group_name` varchar(60) NOT NULL default 'noc',
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
-- Struttura della tabella `tstm_software`
--

CREATE TABLE IF NOT EXISTS `tstm_software` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `type` varchar(254) NOT NULL default '',
  `copyrigth` varchar(254) NOT NULL default '',
  `inf` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_statistic`
--

CREATE TABLE IF NOT EXISTS `tstm_statistic` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `type` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='Tabelle delle statisciche di tstm' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_template`
--

CREATE TABLE IF NOT EXISTS `tstm_template` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `language` varchar(254) default NULL,
  `type` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='Tabella dei template per i ticket e per la mail' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_template_group`
--

CREATE TABLE IF NOT EXISTS `tstm_template_group` (
  `id` bigint(20) NOT NULL auto_increment,
  `template_name` varchar(254) NOT NULL default '',
  `template_group` varchar(254) NOT NULL default '',
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_ticket`
--

CREATE TABLE IF NOT EXISTS `tstm_ticket` (
  `id` bigint(20) NOT NULL auto_increment,
  `number` varchar(20) NOT NULL default '',
  `lang` varchar(20) NOT NULL default '',
  `model_number` varchar(20) NOT NULL default '',
  `model_title` varchar(254) NOT NULL default '',
  `title` varchar(254) NOT NULL default 'No title',
  `work_by` varchar(60) NOT NULL default 'noc@localhost',
  `call_log_user` varchar(254) default NULL,
  `call_log_groups` varchar(60) NOT NULL default 'noc',
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
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1581 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_ticket_read`
--

CREATE TABLE IF NOT EXISTS `tstm_ticket_read` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_email` varchar(60) NOT NULL default '0',
  `ticket_id` bigint(20) NOT NULL default '0',
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_id` (`user_email`,`ticket_id`)
) TYPE=MyISAM COMMENT='tabella dei ticket gia letti per ogni utente' AUTO_INCREMENT=2124 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_user`
--

CREATE TABLE IF NOT EXISTS `tstm_user` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `uid` varchar(60) NOT NULL default '',
  `name` text,
  `last_name` varchar(40) default NULL,
  `sexe` enum('M','F') default NULL,
  `function` varchar(254) default NULL,
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
  `level` enum('0','1','2','3','4','5') NOT NULL default '0',
  `lang` varchar(20) NOT NULL default 'italian',
  `style` varchar(40) NOT NULL default 'default',
  `login_script` text NOT NULL,
  `public_key` text NOT NULL,
  `private_key` text NOT NULL,
  `pass_phrase` varchar(254) NOT NULL default '',
  `comment` text,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uid` (`uid`),
  UNIQUE KEY `email` (`email`)
) TYPE=MyISAM AUTO_INCREMENT=120 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_user_group`
--

CREATE TABLE IF NOT EXISTS `tstm_user_group` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_email` varchar(60) NOT NULL default '',
  `group_name` varchar(60) NOT NULL default 'all_user',
  `type` enum('normal','contact','vip','admin') default 'normal',
  `state` enum('active','disactivated') NOT NULL default 'active',
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_email` (`user_email`,`group_name`)
) TYPE=MyISAM AUTO_INCREMENT=206 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_x_code_source`
--

CREATE TABLE IF NOT EXISTS `tstm_x_code_source` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(128) NOT NULL default '',
  `language` varchar(128) default 'html',
  `lang_version` varchar(64) default NULL,
  `code_version` varchar(64) default '1.0',
  `state` enum('active','disactivated') NOT NULL default 'active',
  `path` varchar(254) default NULL,
  `author` varchar(254) default NULL,
  `copyrigth` varchar(254) default NULL,
  `license` text,
  `text` text NOT NULL,
  `comment` text,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='table of source code' AUTO_INCREMENT=1922 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_x_contents`
--

CREATE TABLE IF NOT EXISTS `tstm_x_contents` (
  `id` int(11) NOT NULL auto_increment,
  `text` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_x_file`
--

CREATE TABLE IF NOT EXISTS `tstm_x_file` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_x_images`
--

CREATE TABLE IF NOT EXISTS `tstm_x_images` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(16) NOT NULL default '',
  `state` enum('actve','disactivated') NOT NULL default 'actve',
  `path` varchar(254) NOT NULL default '',
  `x_dim` varchar(16) NOT NULL default '',
  `y_dim` varchar(16) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_x_links`
--

CREATE TABLE IF NOT EXISTS `tstm_x_links` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_x_menu`
--

CREATE TABLE IF NOT EXISTS `tstm_x_menu` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_x_modules`
--

CREATE TABLE IF NOT EXISTS `tstm_x_modules` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_x_object`
--

CREATE TABLE IF NOT EXISTS `tstm_x_object` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_x_pages`
--

CREATE TABLE IF NOT EXISTS `tstm_x_pages` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;
