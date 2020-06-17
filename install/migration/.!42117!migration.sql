
-- Generato il: 19 Ago, 2006 at 01:31 AM
-- Versione MySQL: 4.0.24
-- Versione PHP: 4.3.10-16
--
-- Database: `tstm_new`

-- --------------------------------------------------------
-- Procedura di migrazione del database tstm version 1.0 a versione 1.1

-- copiare tstm_db verso tstm_new
-- eseguire le comandi seguenti


DROP TABLE IF EXISTS `tstm_client` ;
DROP TABLE IF EXISTS `tstm_command` ;
DROP TABLE IF EXISTS `tstm_host` ;
DROP TABLE IF EXISTS `tstm_host_dependence` ;
DROP TABLE IF EXISTS `tstm_host_group` ;
DROP TABLE IF EXISTS `tstm_host_services` ;
DROP TABLE IF EXISTS `tstm_host_user` ;
DROP TABLE IF EXISTS `tstm_problem` ;
DROP TABLE IF EXISTS `tstm_resolv` ;
DROP TABLE IF EXISTS `tstm_services` ;
DROP TABLE IF EXISTS `tstm_solution` ;




--   Table Group
ALTER TABLE `tstm_groups` CHANGE `inf` `comment` TEXT NULL DEFAULT NULL ;
ALTER TABLE `tstm_groups` CHANGE `config` `login_script` TEXT NULL DEFAULT NULL ;
ALTER TABLE `tstm_groups` ADD `location` VARCHAR( 254 ) AFTER `level` ;
ALTER TABLE `tstm_groups` DROP `nagios_group` ;


ALTER TABLE `tstm_groups` ADD `type` VARCHAR(254)    NULL    DEFAULT NULL  AFTER `location` ;
ALTER TABLE `tstm_groups` ADD `sla` TIMESTAMP   NULL   AFTER `type` ;
ALTER TABLE `tstm_groups` ADD `public_key` TEXT  NULL    DEFAULT NULL  AFTER `sla` ;
ALTER TABLE `tstm_groups` ADD `private_key` TEXT NULL    DEFAULT NULL  AFTER `public_key` ;
ALTER TABLE `tstm_groups` ADD `pass_phrase` VARCHAR(254) NULL    DEFAULT NULL  AFTER `location` ;
ALTER TABLE `tstm_groups` ADD `email_sign` TEXT  NULL    DEFAULT NULL  AFTER `pass_phrase` ;
ALTER TABLE `tstm_groups` ADD `referent_email` VARCHAR(254)  NULL    DEFAULT NULL  AFTER `email_sign` ;
ALTER TABLE `tstm_groups` ADD `admin_email` VARCHAR(254) NULL    DEFAULT NULL  AFTER `referent_email` ;
ALTER TABLE `tstm_groups` ADD `folder` VARCHAR(254)  NULL    DEFAULT NULL  AFTER `admin_email` ;
ALTER TABLE `tstm_groups` ADD `notify` ENUM('by_email', 'by_sms', 'by_web', 'all', 'unknow') DEFAULT 'by_email'  AFTER `folder` ;
ALTER TABLE `tstm_groups` ADD `web_site` VARCHAR(254)    NULL    DEFAULT NULL  AFTER `notify` ;
ALTER TABLE `tstm_groups` ADD `adress` VARCHAR(254)  NULL  DEFAULT NULL  AFTER `login_script` ;

-- ALTER TABLE `tstm_groups`  CHANGE  `type` `type` VARCHAR(254)    NULL    DEFAULT NULL  AFTER `location` ;
-- ALTER TABLE `tstm_groups`  CHANGE  `sla` `sla` TIMESTAMP   NULL   AFTER `type` ;
-- ALTER TABLE `tstm_groups`  CHANGE  `public_key` `public_key` TEXT  NULL    DEFAULT NULL  AFTER `sla` ;
-- ALTER TABLE `tstm_groups`  CHANGE  `private_key` `private_key` TEXT NULL    DEFAULT NULL  AFTER `public_key` ;
-- ALTER TABLE `tstm_groups`  CHANGE  `pass_phrase` `pass_phrase` VARCHAR(254) NULL    DEFAULT NULL  AFTER `location` ;


--   Table Session
ALTER TABLE `tstm_session` DROP `auto_login` ;
ALTER TABLE `tstm_session` CHANGE `session_id` `sessionid` VARCHAR(254) NOT NULL;
ALTER TABLE `tstm_session` ADD `sessionip` VARCHAR(64)  NOT  NULL  AFTER `sessionid` ;
ALTER TABLE `tstm_session` ADD `status` VARCHAR(254)  NULL  DEFAULT NULL  AFTER `user_email` ;
ALTER TABLE `tstm_session` ADD `time_out` VARCHAR(64)  NULL  DEFAULT NULL  AFTER `state` ;
ALTER TABLE `tstm_session` ADD `session_end` TIMESTAMP   NULL   AFTER `time_out` ;



--   Table Ticket
ALTER TABLE `tstm_ticket` ADD `lang` VARCHAR(20)  NULL  DEFAULT 'italian' AFTER `number` ;
ALTER TABLE `tstm_ticket` ADD `model_number` VARCHAR(20)  NULL  DEFAULT NULL AFTER `lang` ;
ALTER TABLE `tstm_ticket` ADD `model_title` VARCHAR(254)  NULL  DEFAULT NULL AFTER `model_number` ;

ALTER TABLE `tstm_ticket` CHANGE `group` `call_log_groups` VARCHAR(254) NOT NULL;
ALTER TABLE `tstm_ticket` CHANGE `by` `work_by` VARCHAR(60) NOT NULL AFTER `title` ;
-- ALTER TABLE `tstm_ticket` CHANGE `work_by` `work_by` VARCHAR(60) NOT NULL AFTER `title` ;

ALTER TABLE `tstm_ticket` ADD `call_log_user` VARCHAR(254)  NULL  DEFAULT NULL AFTER `work_by` ;
-- ALTER TABLE `tstm_ticket` CHANGE `call_log_user` `call_log_user` VARCHAR(254)  NULL  DEFAULT NULL AFTER `work_by` ;
ALTER TABLE `tstm_ticket` ADD `call_method` set('normal', 'automatic', 'by_help_desk', 'by_email', 'by_phone', 'by_web', 'by_sms', 'unknow', 'SNMP', 'NULL') NOT  NULL  DEFAULT 'by_email' AFTER `call_log_groups` ;

ALTER TABLE `tstm_ticket` ADD `list_user_impact` TEXT  NULL    DEFAULT NULL  AFTER `assign_to` ;
ALTER TABLE `tstm_ticket` ADD `list_group_impact` TEXT  NULL    DEFAULT NULL  AFTER `list_user_impact` ;
ALTER TABLE `tstm_ticket` ADD `list_asset_impact` TEXT  NULL    DEFAULT NULL  AFTER `list_group_impact` ;

ALTER TABLE `tstm_ticket` CHANGE `priority` `severity` ENUM('info', 'low', 'normal', 'medium', 'high', 'NULL') NOT NULL DEFAULT 'normal'  ;
ALTER TABLE `tstm_ticket` CHANGE `state` `state` ENUM('open', 'update', 'close', 'in_progress', 'pending', 'unknow', 'NULL') NOT NULL DEFAULT 'open'  ;
ALTER TABLE `tstm_ticket` CHANGE `state_now` `state_now` ENUM('opened', 'updated', 'closed', 'unknow', 'open', 'update', 'close','in_progress','pending','unknow','NULL') NOT NULL DEFAULT 'open'  ;

ALTER TABLE `tstm_ticket` ADD `sla` VARCHAR(64)  NULL  DEFAULT '15' AFTER `severity` ;
ALTER TABLE `tstm_ticket` ADD `mail_title` VARCHAR(254)  NULL  DEFAULT NULL AFTER `sla` ;

ALTER TABLE `tstm_ticket` CHANGE `allegato` `attach` TEXT  NULL;

ALTER TABLE `tstm_ticket` CHANGE `type` `type` ENUM('normal', 'job', 'ids', 'xpu', 'va', 'asset_Move', 'asset_remove', 'asset_add', 'asset_replace', 'new_account', 'new_group', 'asset_install', 'asset_request', 'asset_restart', 'software_install', 'software_remove', 'software_update', 'software_request', 'model', 'NULL') NOT NULL DEFAULT 'normal'  ;

ALTER TABLE `tstm_ticket` DROP `expire` ;
ALTER TABLE `tstm_ticket` DROP `resolv_id` ;

ALTER TABLE `tstm_ticket` ADD `mail_text` TEXT  NULL DEFAULT NULL  AFTER `text` ;
ALTER TABLE `tstm_ticket` ADD `comment` TEXT  NULL DEFAULT NULL  AFTER `mail_text` ;

ALTER TABLE `tstm_ticket` CHANGE `date_time` `date_time`  TIMESTAMP  NOT NULL   AFTER `comment`;
ALTER TABLE `tstm_ticket` CHANGE `text` `text` TEXT NULL DEFAULT NULL;


--   Table User
ALTER TABLE `tstm_user` ADD `sexe` ENUM('M', 'F')  NULL  DEFAULT NULL AFTER `last_name` ;
ALTER TABLE `tstm_user` ADD `function` VARCHAR(254)  NULL  DEFAULT NULL AFTER `sexe` ;
ALTER TABLE `tstm_user` ADD `sla` VARCHAR(64)  NULL  DEFAULT NULL AFTER `function` ;
ALTER TABLE `tstm_user` ADD `email_sign` TEXT  NULL  DEFAULT NULL AFTER `email` ;
ALTER TABLE `tstm_user` ADD `adress` VARCHAR(254)  NULL  DEFAULT NULL AFTER `cel` ;
ALTER TABLE `tstm_user` ADD `location` VARCHAR(254)  NULL  DEFAULT NULL AFTER `adress` ;

ALTER TABLE `tstm_user` ADD `type` ENUM('vip', 'admin', 'user', 'custumer', 'web', 'model')  NULL  DEFAULT 'user' AFTER `state` ;
ALTER TABLE `tstm_user` ADD `status` ENUM('connect', 'disconnect')  NULL  DEFAULT 'disconnect' AFTER `type` ;

ALTER TABLE `tstm_user` CHANGE `inf` `comment` TEXT NULL DEFAULT NULL ;
ALTER TABLE `tstm_user` CHANGE `config` `login_script` TEXT NULL DEFAULT NULL ;





update `tstm_ticket` set lang='italian' WHERE (lang='');

update `tstm_ticket` set model_number='0507001' WHERE (type='normal') and  (model_number='');
update `tstm_ticket` set model_number='0507004' WHERE (type='ids') and  (model_number='');
update `tstm_ticket` set model_number='No_num_xpu[7]' WHERE (type='xpu') and  (model_number='');
update `tstm_ticket` set model_number='No_num_va[10]' WHERE (type='va') and  (model_number='');

update `tstm_ticket` set model_title='Segnalazione Ticket Normal' WHERE (type='normal') and (model_title='');
update `tstm_ticket` set model_title='Segnalazione Ticket IDS' WHERE (type='ids') and (model_title='');
update `tstm_ticket` set model_title='RealSecure XPU Update' WHERE (type='xpu') and (model_title='');
update `tstm_ticket` set model_title='Vulnerability Assessment Richiesta IP' WHERE (type='va') and (model_title='');
update `tstm_ticket` set model_number=number WHERE (model_number='');

update `tstm_ticket` set sla='3 DAY' WHERE 1;



INSERT INTO `tstm_ticket` VALUES (1, '0507001', 'italian', '0507001', 'Segnalazione Ticket Normal', '', '', '', '', 'by_help_desk', 'open', 'closed', 'soc', '', '', '', 'normal', '3 DAY', 'Ticket [{{ticket_number}}] Segnalazione: {{ticket_title}}', 'Security Operation Center <soc@sg.it>', '', 'A G <a.s@sg.it>', 'soc-staff <soc-staff@sg.it>', '', 'normal', '(breve descrizione se segnalato dal cliente oppure\r\n     descrizione dettagliata se e'' stato rilevato da noi)', '-------------[{{date_time}}]-------------\r\n\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di sg ha preso in carico il problema con il ticket numero {{ticket_number}}.\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{group_sign}}', 'model', '2006-10-13 15:22:30');
