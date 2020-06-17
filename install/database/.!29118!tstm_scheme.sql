
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



INSERT INTO `tstm_father_group` VALUES (16, 'admin', 'all_user', 'active', '2006-01-01 12:40:45'),
(117, 'root', 'all_user', 'active', '2005-10-05 22:36:14'),
(19, 'admin', 'root', 'active', '2006-01-01 12:40:45'),
(21, 'admin', 'guest', 'active', '2006-01-01 12:40:45'),
(22, 'admin', 'soc', 'active', '2006-01-01 12:40:45'),
(23, 'admin', 'test', 'active', '2006-01-01 12:40:45'),
(24, 'admin', 'default', 'active', '2006-01-01 12:40:45'),
(25, 'admin', 'cliente', 'active', '2006-01-01 12:40:45'),
(40, 'admin', 'last_level', 'active', '2006-01-01 12:40:45'),
(41, 'admin', 'Null', 'active', '2006-01-01 12:40:45'),
(84, 'soc', 'all_user', 'active', '2005-10-13 18:49:03'),
(85, 'soc', 'guest', 'active', '2005-10-13 18:49:03'),
(349, 'admin', 'admin', 'active', '2006-01-01 12:40:45'),
(88, 'soc', 'default', 'active', '2005-10-13 18:49:03'),
(104, 'soc', 'last_level', 'active', '2005-10-13 18:49:03'),
(105, 'soc', 'Null', 'active', '2005-10-13 18:49:03'),
(118, 'root', 'guest', 'active', '2005-10-05 22:36:14'),
(119, 'root', 'soc', 'active', '2005-10-05 22:36:14'),
(120, 'root', 'test', 'active', '2005-10-05 22:36:14'),
(121, 'root', 'default', 'active', '2005-10-05 22:36:14'),
(122, 'root', 'cliente', 'active', '2005-10-05 22:36:14'),
(137, 'root', 'last_level', 'active', '2005-10-05 22:36:14'),
(138, 'root', 'Null', 'active', '2005-10-05 22:36:14'),
(356, 'admin', 'model', 'active', '2006-04-26 09:38:54'),
(355, 'admin', 'web', 'active', '2006-04-20 19:49:30'),
(354, 'admin', 'noc', 'active', '2006-04-17 08:32:07'),
(345, 'admin', 'demo', 'active', '2006-01-01 12:40:45'),
(346, 'demo', 'cliente', 'active', '2005-10-12 13:06:08'),
(347, 'root', 'demo', 'active', '2005-10-11 11:31:08');




INSERT INTO `tstm_group` VALUES (14, 'admin', 'active', '5', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'a.s@sg.it', 'admin@localhost', 'admin', 'by_email', NULL, '$inf["page_title"]="Tstm ver. 1.0";\r\n$inf["layer"]="3";\r\n$inf["refresh"]="120";\r\n$inf["style"]="Normal";\r\n\r\n\r\n$inf["head1"]="page_logo1.php";\r\n$inf["head2"]="head_menu.php";\r\n$inf["head3"]="";\r\n\r\n\r\n$inf["left1"]="left_menu.php";\r\n$inf["left2"]="";\r\n$inf["left3"]="";\r\n$inf["left4"]="";\r\n$inf["left5"]="";\r\n$inf["left6"]="";\r\n\r\n\r\n$inf["middle1"]="calendar.php";\r\n$inf["middle2"]="administrate.php";\r\n$inf["middle3"]="";\r\n$inf["middle4"]="";\r\n$inf["middle5"]="";\r\n$inf["middle6"]="";\r\n\r\n\r\n$inf["rigth1"]="search.php";\r\n$inf["rigth2"]="view_my_ticket.php";\r\n$inf["rigth3"]="view_new_ticket.php";\r\n$inf["rigth4"]="view_working_ticket.php";\r\n$inf["rigth5"]="view_close_ticket.php";\r\n$inf["rigth6"]="";\r\n$inf["rigth7"]="";\r\n\r\n\r\n$inf["foot1"]="task_bar.php";\r\n$inf["foot2"]="foot1.php";\r\n\r\n\r\n$inf["menu_head1"]="services.php?refresh=3600&layer=3&left1=&middle2=&middle3=";\r\n$inf["menu_head2"]="report.php?refresh=3600&layer=3&left1=&middle2=services.php&middle3=";\r\n$inf["menu_head3"]="tickets.php?refresh=3600&layer=3&left1=&middle2=&middle3=";\r\n$inf["menu_head4"]="resources.php";\r\n$inf["menu_head5"]="my_account.php?refresh=3600&layer=3&left1=&middle2=new_user.php&middle3=";\r\n$inf["menu_head6"]="administrate.php";\r\n$inf["menu_head7"]="search_ticket.php?refresh=360&layer=3&left1=&middle2=&middle3=";\r\n\r\n\r\n$inf["menu_left1"]="administrate.php";\r\n$inf["menu_left2"]="search_ticket.php";\r\n$inf["menu_left3"]="new_client.php?refresh=3600&layer=1&middle2=&middle3=";\r\n$inf["menu_left4"]="new_group.php?refresh=3600&layer=3&middle2=";\r\n$inf["menu_left5"]="new_user.php?refresh=3600&layer=3&middle2=";\r\n$inf["menu_left6"]="user_to_group.php?refresh=3600&layer=3&middle2=";\r\n$inf["menu_left7"]="father_group.php";\r\n$inf["menu_left8"]="remove_user.php";\r\n$inf["menu_left9"]="remove_group.php";\r\n$inf["menu_left10"]="rm_user_to_group.php";\r\n$inf["menu_left11"]="rm_father_group.php";\r\n$inf["menu_left12"]="preview_all_client.php";\r\n$inf["menu_left13"]="preview_all_group.php";\r\n$inf["menu_left14"]="preview_all_ticket.php";\r\n$inf["menu_left15"]="preview_all_user_group.php";\r\n$inf["menu_left16"]="preview_all_father_group.php";\r\n$inf["menu_left17"]="preview_all_module";\r\n$inf["menu_left18"]="test.php?layer=1&left1=&middle2=&middle3=";\r\n$inf["menu_left19"]="view_close_ticket.php";\r\n$inf["menu_left20"]="services.php";\r\n$inf["menu_left21"]="view_message.php";\r\n$inf["menu_left22"]="view_working_ticket.php";\r\n$inf["menu_left23"]="view_attack_graph.php";\r\n$inf["menu_left24"]="resources.php";\r\n$inf["menu_left25"]="report.php";\r\n$inf["menu_left26"]="resources_info.php";\r\n$inf["menu_left27"]="my_account.php";\r\n\r\n\r\n$inf["resources_refresh"]="";\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'corso svizzera 185 Torino', 'Administrator of the sistem', '2006-01-01 12:40:45'),
(26, 'admin', 'active', '5', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'a.s@sg.it', 'client root', 'root', 'by_email', NULL, NULL, 'no adress', 'test user only', '2005-10-05 22:36:14'),
(28, 'root', 'active', '5', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'a.s@sg.it', 'client root', 'root', 'by_email', NULL, NULL, 'no adress', 'test user only', '2005-10-05 22:36:14'),
(27, 'all_user', 'active', '1', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'a.s@sg.it', 'all_user_email@localhost', '', 'by_email', NULL, '\n\n$inf["page_title"]="TSTM ver.1.0 (2005)";\n$inf["layer"]="3";\n$inf["refresh"]="120";\n\n\n$inf["head1"]="page_logo.php";\n$inf["head2"]="head_menu.php";\n\n\n$inf["left1"]="";\n$inf["left2"]="";\n$inf["left3"]="";\n$inf["left4"]="";\n$inf["left5"]="";\n$inf["left6"]="";\n\n\n$inf["middle1"]="";\n$inf["middle3"]="";\n$inf["middle4"]="";\n$inf["middle5"]="";\n$inf["middle6"]="";\n\n\n$inf["rigth1"]="search.php";\n$inf["rigth3"]="view_working_ticket.php";\n$inf["rigth4"]="view_close_ticket.php";\n$inf["rigth5"]="view_message.php";\n$inf["rigth6"]="";\n$inf["rigth2"]="view_new_ticket.php";\n\n\n$inf["foot1"]="foot1.php";\n\n\n$inf["menu_head1"]="report.php?refresh=3600&layer=3&left1=&middle2=services.php&middle3=";\n$inf["menu_head2"]="tickets.php?refresh=3600&layer=3&left1=&middle2=&middle3=";\n$inf["menu_head3"]="resources.php?refresh=3600&layer=3&left1=&middle2=&middle3=&rigth1=resources_info.php&rigth2=&rigth3=&rigth4=";\n$inf["menu_head4"]="my_account.php?refresh=3600&layer=3&left1=&middle2=&middle3=";\n$inf["menu_head5"]="search_ticket.php";\n$inf["menu_head6"]="";\n$inf["menu_head7"]="";\n\n\n$inf["menu_left1"]="preview_all_ticket.php";\n$inf["menu_left2"]="search_ticket.php";\n$inf["menu_left3"]="view_new_ticket.php";\n$inf["menu_left4"]="view_working_ticket.php";\n$inf["menu_left5"]="view_close_ticket.php";\n$inf["menu_left6"]="view_message.php";\n$inf["menu_left7"]="services.php";\n$inf["menu_left8"]="report.php";\n$inf["menu_left9"]="my_account.php";\n$inf["menu_left10"]="new_user.php";\n$inf["menu_left11"]="new_group.php";\n$inf["menu_left12"]="user_to_group.php";\n$inf["menu_left13"]="remove_user.php";\n$inf["menu_left14"]="remove_group.php";\n$inf["menu_left15"]="search.php";\n$inf["menu_left16"]="";\n$inf["menu_left17"]="";\n$inf["menu_left18"]="";\n$inf["menu_left19"]="";\n$inf["menu_left20"]="";\n$inf["menu_left21"]="";\n$inf["menu_left22"]="";\n$inf["menu_left23"]="";\n$inf["menu_left24"]="";\n$inf["menu_left25"]="";\n$inf["menu_left26"]="";\n\n\n$inf["resources_refresh"]="";\n\n\n\n\n\n\n\n\n', '', 'all_user', '2005-11-09 16:23:59'),
(23, 'soc', 'active', '4', NULL, NULL, '2006-05-20 10:41:38', NULL, NULL, NULL, '\r\n\r\nDistinti saluti\r\n\r\n-- \r\nSecurity Operation Center\r\nS G s.r.l. Corso Svizzera, 185 - xxxxx Torino - Italy\r\nphone: +39 0110700912    fax: +39 0110700010\r\nwebsite: http://www.sg.it\r\n\r\n\r\n', 'a.s@sg.it', 'soc@sg.it', 'soc', 'by_email', NULL, NULL, 'corso svizzera 185 Torino', 'security operation center', '2005-10-13 18:49:03'),
(24, 'test', 'active', '3', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'a.s@sg.it', 'test@localhost', '', 'by_email', NULL, NULL, '', '<b>sg </b> <br />Corso Svizzera 185 xxxxx Torino <br />Recapiti fornitori: COLT (FIBRE) <br />Luca Testore 3492352135 Numero Verde Colt 800-909324 <br />per apertura ticket Support Trendmicro Maurizio Martinozzi (rif. Tecnico)06/4090181 <br />maurizio_martinozzi@trendmicro.it Angelica Alivesi (rif. di canale) 02/925931 <br />angelica_alivesi@trendmicro.it Supporto tecnico via mail support.trendmicro@itwayvad.com <br />virus_doctor@trendmicro.it FAX DEL SOC 011/07000010 <br />', '2005-10-25 11:07:13'),
(35, 'default', 'active', '0', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'a.s@sg.it', '', '', 'by_email', NULL, NULL, '', 'default', '2005-08-26 06:02:50'),
(37, 'cliente', 'active', '2', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'soc@sg.it', 'cliente@localhost', '', 'by_email', NULL, NULL, '', '', '2005-10-07 04:18:05'),
(59, 'last_level', 'active', '4', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'a.s@sg.it', 'last_level_mail@localhost', 'last_level', 'by_email', NULL, NULL, '', '', '2005-09-06 23:11:24'),
