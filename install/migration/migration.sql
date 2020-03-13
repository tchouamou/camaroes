
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
INSERT INTO `tstm_ticket` VALUES (2, '0507002', 'italian', '0507002', 'Aggiornamento Ticket Normale', 'NULL', 'NULL', 'NULL', 'NULL', 'by_help_desk', 'update', 'closed', 'NULL', 'NULL', 'NULL', 'NULL', 'normal', '3 DAY', 'Ticket [{{ticket_number}}] Aggiornamento: {{ticket_title}}', 'NULL', 'NULL', 'NULL', 'NULL', '', 'normal', '(breve descrizione dell''aggiornamento)\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di sg ha aggiornato lo stato del ticket gi‡ aperto {{ticket_number}}.\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{group_sign}}', 'model', '2006-10-13 15:22:30');
INSERT INTO `tstm_ticket` VALUES (3, '0507003', 'italian', '0507003', 'Chiusura Ticket Normale', 'NULL', 'NULL', 'NULL', 'NULL', 'by_help_desk', 'close', 'close', 'NULL', 'NULL', 'NULL', 'NULL', 'normal', '3 DAY', 'Ticket [{{ticket_number}}] Chiusura: {{ticket_title}}', 'NULL', 'NULL', 'NULL', 'NULL', '', 'normal', '(spiegazioni della chiusura)\r\n', '-------------[{{date_time}}]-------------\r\n Spett.le cliente,\r\nLa presente per segnalare che il SOC di sg ha provveduto a chiudere il ticket  {{ticket_number}}\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer riaprire il Ticket potete rispondere a questo messaggio (senza modificarne l''oggetto) oppure contattatarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{group_sign}}', 'model', '2006-10-01 00:32:34');
INSERT INTO `tstm_ticket` VALUES (4, '0507004', 'italian', '0507004', 'Segnalazione Ticket IDS', '', '', '', 'NULL', 'by_help_desk', 'open', 'closed', 'NULL', '', '', '', 'normal', '3 DAY', 'ticket [{{ticket_number}}] Segnalazione IDS: {{ticket_title}}', 'NULL', 'NULL', 'NULL', 'NULL', '', 'ids', '    la presente per segnalare che il SOC di sg ha rilevato un\r\nevento sospetto attraverso i nostri sistemi di monitoraggio.\r\n\r\nTicket numero : {{ticket_number}}\r\nNome Eventi :{{ticket_title}}\r\nSource IP : \r\nDestination IP : \r\nSeverity : {{ticket_severity}}\r\n\r\n\r\nPer maggiori dettagli sull''evento segnalato:\r\n\r\n{{iss_event_description}}\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer comunicare informazioni utili al declassamento del''evento (in caso\r\ndi falso positivo o a seguito di contromisure implementate al vostro\r\ninterno) rispondete a  questo messaggio (senza  modificarne l''oggetto)\r\noppure contattateci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{group_sign}}', 'model', '2006-10-13 15:22:30');
INSERT INTO `tstm_ticket` VALUES (5, '0507005', 'italian', '0507005', 'Aggiornamento Ticket IDS', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'update', 'closed', 'NULL', 'NULL', 'NULL', 'NULL', 'normal', '3 DAY', 'Ticket [{{ticket_number}}] Aggiornamento IDS: {{ticket_title}}', 'NULL', '', 'NULL', 'NULL', '', 'ids', '  in merito all''evento segnalato con il ticket {{ticket_number}}, vi preghiamo di\r\nverificare se l''impatto per la vostra rete risulta essere rilevante.\r\n\r\n\r\n\r\nIn caso contrario o di una mancata vostra risposta considereremo\r\nl''evento non impattante e provvederemo ad abbassare la priorit‡   di tali\r\neventi mediante l''inserimento di un''event filter.', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere a questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{group_sign}}\r\n', 'model', '2006-10-13 15:22:30');
INSERT INTO `tstm_ticket` VALUES (6, '0507006', 'italian', '0507001', 'Chiusura Ticket IDS', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'close', 'close', 'NULL', 'NULL', 'NULL', 'NULL', 'normal', '3 DAY', 'Ticket [{{ticket_number}}] Chiusura IDS: {{ticket_title}}', 'NULL', 'NULL', 'NULL', 'NULL', '', 'ids', 'E'' stato inserito un event filter sull''evento segnalato, avente come\r\ncampo destinazione l''indirizzo IP dell''host target.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n  La presente per segnalare che il SOC di sg ha provveduto a\r\nchiudere il ticket {{ticket_number}}.\r\n\r\n{{ticket_text}}.\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer riaprire il Ticket e rialzare la severit‡  dell''evento potete\r\nrispondere a questo messaggio (senza modificarne l''oggetto) oppure\r\ncontattatarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{group_sign}}.', 'model', '2006-10-01 00:33:21');
INSERT INTO `tstm_ticket` VALUES (7, '0507007', 'italian', '0507007', 'RealSecure XPU Update', 'RealSecure XPU Update', 'soc@sg.it', 'soc@sg.it', 'soc', 'by_help_desk', 'close', 'close', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Security Operation Center <soc@sg.it>', '', 'A G <a.s@sg.it>', 'soc-staff <soc-staff@sg.it>', '', 'xpu', 'Con la presente vi segnaliamo che Iss ha rilasciato la XPU xx.xx per\r\nRealSecure Network Sensor 7.0.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nRimaniamo a Vs. disposizione per ulteriori chiarimenti al riguardo.\r\n\r\nDistinti saluti.\r\n\r\n-- \r\n{{group_sign}}', 'model', '2006-09-30 22:54:26');
INSERT INTO `tstm_ticket` VALUES (8, '0507007', 'italian', '0507007', 'SiteProtector - Aggiornamento XPU', 'SiteProtector - Aggiornamento XPU', 'soc@sg.it', 'soc@sg.it', 'soc', 'by_help_desk', 'open', 'closed', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Security Operation Center <soc@sg.it>', '', 'A G <a.s@sg.it>', 'soc-staff <soc-staff@sg.it>', '', 'xpu', '  le sonde di SiteProtector sono state aggiornate all''ultima release\r\ndell''XPU.\r\n\r\nInoltre, come concordato, sono stati attivati i ''drop'' sui seguenti\r\nattacchi con impatto classificato come HIGH.\r\nDi seguito viene fornito l''elenco delle nuove signature bloccate ed una\r\nloro breve descrizione, cosi come fornita da ISS:\r\n\r\n\r\n(descrizione dettagliata)\r\n', '-------------[{{date_time}}]-------------Buongiorno,\r\n{{ticket_text}}\r\nCordiali saluti\r\n\r\n-- \r\n{{group_sign}}\r\n\r\n', 'model', '2006-10-13 15:22:30');
INSERT INTO `tstm_ticket` VALUES (9, '0507007', 'italian', '0507007', 'Riepilogo eventi IDS del 20xx-xx-xx', 'Riepilogo eventi IDS del 20xx-xx-xx', '', 'soc@sg.it', 'soc', 'normal', 'close', 'close', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Security Operation Center <soc@sg.it>', '', 'A G <a.s@sg.it>', 'soc-staff <soc-staff@sg.it>', '', 'ids', 'In allegato potete trovare due documenti in formato PDF:\r\n\r\n    1. il primo inerente il report giornaliero degli eventi HIGH e MEDIUM;\r\n\r\n    2. il secondo riguarda il dettaglio degli eventi HIGH con i\r\n       relativi indirizzi IP sorgenti e di destinazione.\r\n', '-------------[{{date_time}}]-------------Buongiorno,\r\n{{ticket_text}}\r\n\r\nRimaniamo a disposizione per eventuali chiarimenti.\r\n\r\n-- \r\n{{group_sign}}', 'model', '2006-09-30 22:43:27');
INSERT INTO `tstm_ticket` VALUES (10, '0507008', 'italian', '0507008', 'Vulnerability Assessment Richiesta IP', 'Vulnerability Assessment Richiesta IP', 'soc@sg.it', 'soc@sg.it', 'soc', 'normal', 'open', 'closed', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Security Operation Center <soc@sg.it>', '', 'A G <a.s@sg.it>', 'soc-staff <soc-staff@sg.it>', '', 'va', '  al fine di effettuare il previsto Vulnerabilty Assessment, inizieremo le scansioni dopo le 22.00 di oggi verso gli indirizzi IP da voi comunicati.\r\n\r\nQualora non ci siano modifiche rispetto al mese precedente o in caso di\r\nmancato riscontro, porteremo avanti l''attivit√   con le stesse modalit√  \r\ndel mese precedente, dandovi comunque comunicazione via email prima di\r\niniziare una sessione di scan e al termine della stessa.\r\n\r\nGli indirizzi da cui potremmo effettuare il VA saranno i seguenti:\r\n\r\n- \r\n- \r\n', '-------------[{{date_time}}]-------------\r\nBuongiorno,\r\nCordiali saluti\r\n\r\n-- \r\n{{group_sign}}', 'model', '2006-10-13 15:22:30');
INSERT INTO `tstm_ticket` VALUES (11, '0507008', 'italian', '0507008', 'Vulnerability Assessment Inizio', 'Vulnerability Assessment Inizio', 'soc@sg.it', 'soc@sg.it', 'soc', 'normal', 'open', 'closed', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Security Operation Center <soc@sg.it>', '', 'A G <a.s@sg.it>', 'soc-staff <soc-staff@sg.it>', '', 'va', 'Con la presente intendiamo comunicarvi che alle ore 22.00 avr√   inizio il\r\nprevisto Vulnerability Assessment.\r\n\r\nVi invieremo un''e-mail di conferma a VA effettuato; qualora non dovesse\r\nterminare entro questa notte, il lavoro verr√   interrotto domattina alle\r\n8.00 e ripreso alle 22.00 di domani.', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}.\r\n\r\n\r\nCordiali saluti\r\n\r\n-- \r\n{{group_sign}}', 'model', '2006-10-13 15:22:30');
INSERT INTO `tstm_ticket` VALUES (12, '0507008', 'italian', '0507008', 'Vulnerability Assessment File zip', 'Vulnerability Assessment File zip', 'soc@sg.it', 'soc@sg.it', 'soc', 'normal', 'open', 'closed', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Security Operation Center <soc@sg.it>', '', 'A G <a.s@sg.it>', 'soc-staff <soc-staff@sg.it>', '', 'va', 'Buongiorno,\r\n\r\n  in allegato il Vulnerability Assessment effettuato verso la vostra rete. Il file ‡ compresso in formato ZIP e cifrato con password. Per ottenterla potete chiamare il SOC in qualsiasi momento al numero 011 0700912.\r\n\r\n', '-------------[{{date_time}}]-------------\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\n\r\n{{group_sign}}', 'model', '2006-10-13 15:22:30');
INSERT INTO `tstm_ticket` VALUES (13, '0507008', 'italian', '0507008', 'Vulnerability Assessment interotto', 'Vulnerability Assessment interotto', 'soc@sg.it', 'soc@sg.it', 'soc', 'normal', 'update', 'closed', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Security Operation Center <soc@sg.it>', '', 'A G <a.s@sg.it>', 'soc-staff <soc-staff@sg.it>', '', 'va', 'Con la presente intendiamo comunicarvi che alle ore 8.00  di questa mattina, √® stato interotto come da accordi il Vulnerability Assessment, e vera ripreso soltanto\r\nalle 22.00 di questa notte.\r\n\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nCordiali saluti\r\n\r\n\r\n-- \r\n{{group_sign}}', 'model', '2006-10-13 15:22:30');
INSERT INTO `tstm_ticket` VALUES (14, '0507008', 'italian', '0507008', 'Vulnerability Assessment continua', 'Vulnerability Assessment continua', 'soc@sg.it', 'soc@sg.it', 'soc', 'normal', 'update', 'closed', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Security Operation Center <soc@sg.it>', '', 'A G <a.s@sg.it>', 'soc-staff <soc-staff@sg.it>', '', 'va', 'Con la presente intendiamo comunicarvi che dalle ore 22.00 continueremo il previsto Vulnerability Assessment a meno di un vostro contrordine.\r\nVi invieremo un''e-mail di conferma a VA effettuato; qualora non dovesse\r\nterminare entro questa notte, il lavoro verr√É  interrotto domattina alle\r\n8.00 e ripreso alle 22.00 di domani.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nCordiali saluti\r\n-- \r\n\r\n{{group_sign}}', 'model', '2006-10-13 15:22:30');
INSERT INTO `tstm_ticket` VALUES (15, '0507008', 'italian', '0507008', 'Vulnerability Assessment fine', 'Vulnerability Assessment fine', 'soc@sg.it', 'soc@sg.it', 'soc', 'normal', 'close', 'close', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Security Operation Center <soc@sg.it>', '', 'A G <a.s@sg.it>', 'soc-staff <soc-staff@sg.it>', '', 'va', 'Con la presente intendiamo comunicarvi che √® da poco terminato il previsto Vulnerability Assessment mensile.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nDistinti Saluti.\r\n\r\n-- \r\n{{group_sign}}', 'model', '2006-07-26 09:41:57');
INSERT INTO `tstm_ticket` VALUES (16, '0507008', 'italian', '0507008', 'Vulnerability Assessment Richiesta IP e Periodo', 'Vulnerability Assessment Richiesta IP e Periodo', 'soc@sg.it', 'soc@sg.it', 'soc', 'by_help_desk', 'open', 'closed', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Security Operation Center <soc@sg.it>', '', 'A G <a.s@sg.it>', 'soc-staff <soc-staff@sg.it>', '', 'va', '  al fine di effettuare il previsto Vulnerabilty Assessment mensile,\r\nchiediamo l''autorizzazione per iniziare l''attivit√  .\r\nQualora ci siano esigenze diverse rispetto al mese scorso vi chiediamo\r\ndi fornirci gli indirizzi IP delle macchine da sottoporre al security probing ed un''indicazione del periodo in cui poter operare.\r\n\r\nQualora non ci siano modifiche rispetto al mese precedente o in caso di mancato riscontro, porteremo avanti l''attivit√   con le stesse modalit√   (indirizzi IP e orario) del mese precedente, dandovi comunque comunicazione via email prima di iniziare una sessione di scan e al termine della stessa.\r\n', '-------------[{{date_time}}]-------------\r\nBuongiorno,\r\n\r\n\r\n\r\nCordiali saluti\r\n\r\n-- \r\n-------------[{{group_sign}}]-------------', 'model', '2006-10-13 15:22:30');
INSERT INTO `tstm_ticket` VALUES (17, '0507009', 'NULL', '0507009', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'closed', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '3 DAY', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'model', '2006-10-13 15:22:30');






-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: 01 Ott, 2006 at 01:01 AM
-- Versione MySQL: 4.1.9
-- Versione PHP: 4.3.10
--
-- Database: `tstm_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_code`
--

DROP TABLE IF EXISTS `tstm_code`;
CREATE TABLE IF NOT EXISTS `tstm_code` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(254) NOT NULL default '',
  `script` text NOT NULL,
  `description` text NOT NULL,
  `date_time` timestamp NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `code` (`code`)
) TYPE=MyISAM COMMENT='text code table' AUTO_INCREMENT=50 ;

--
-- Dump dei dati per la tabella `tstm_code`
--

INSERT INTO `tstm_code` (`id`, `code`, `script`, `description`, `date_time`) VALUES (1, '{{date_time}}', '$eval_result=date("Y-M-D H:i:s");\r\nreturn $eval_result;', '', '2006-09-16 03:07:05'),
(2, '{{date}}', '$eval_result=date("Y-m-d");\r\nreturn $eval_result;', '', '2006-09-16 03:07:24'),
(3, '{{time}}', '$eval_result=date("h:i:s");\r\nreturn $eval_result;', '', '2006-09-16 03:07:34'),
(4, '{{my_ip}}', '$eval_result=$_SERVER[''REMOTE_ADDR''];\r\nreturn $eval_result;', '', '2006-09-16 03:08:15'),
(5, '{{my_email}', '$eval_result=$_SESSION["auth_email"];\r\nreturn $eval_result;', '', '2006-09-16 03:08:01'),
(6, '{{my_name}}', '$eval_result=$_SESSION["auth_name"];\r\nreturn $eval_result;', '', '2006-09-16 03:08:25'),
(7, '{{my_last_name}}', '$eval_result=$_SESSION["auth_last_name"];\r\nreturn $eval_result;', '', '2006-09-16 03:08:36'),
(8, '{{my_lang}}', '$eval_result=$_SESSION["auth_lang"];\r\nreturn $eval_result;', '', '2006-09-16 03:08:44'),
(9, '{{my_comment}}', '$eval_result=$_SESSION["auth_user_comment"];\r\nreturn $eval_result;', '', '2006-09-24 13:28:27'),
(10, '{{my_tel}}', '$eval_result=$_SESSION["auth_tel"];\r\nreturn $eval_result;', '', '2006-09-16 03:09:03'),
(11, '{{my_cel}}', '$eval_result=$_SESSION["auth_tel"];\r\nreturn $eval_result;', '', '2006-09-16 03:09:13'),
(12, '{{my_group}}', '$eval_result=$_SESSION["auth_group"];\r\nreturn $eval_result;', '', '2006-09-16 03:09:24'),
(13, '{{my_function}}', '$eval_result=$_SESSION["auth_function"];\r\nreturn $eval_result;', '', '2006-09-16 03:09:35'),
(14, '{{my_location}}', '$eval_result=$_SESSION["auth_location"];\r\nreturn $eval_result;', '', '2006-09-16 03:09:45'),
(15, '{{my_sign}}', '$eval_result=$_SESSION["auth_user_sign"];\r\nreturn $eval_result;', '', '2006-09-24 13:27:11'),
(16, '{{group_sign}}', '$eval_result=$_SESSION["auth_group_sign"];\r\nreturn $eval_result;', '', '2006-09-24 13:28:47'),
(17, '{{ticket_number}}', '$eval_result=get_post("number");\r\nreturn $eval_result;', '', '2006-09-16 03:10:34'),
(18, '{{ticket_title}}', '$eval_result=get_post("title");\r\nreturn $eval_result;', '', '2006-09-16 03:11:15'),
(19, '{{ticket_text}}', '$eval_result=get_post("text");\r\nreturn $eval_result;', '', '2006-09-16 03:06:37'),
(20, '{{ticket_assign_to}}', '$eval_result=get_post("assign_to");\r\nreturn $eval_result;', '', '2006-09-16 03:10:10'),
(21, '{{ticket_severity}}', '$eval_result=get_post("severity");\r\nreturn $eval_result;', '', '2006-09-16 03:10:44'),
(22, '{{ticket_state}}', '$eval_result=get_post("state");\r\nreturn $eval_result;', '', '2006-09-16 03:10:55'),
(23, '{{ticket_type}}', '$eval_result=get_post("type");', '', '2006-07-22 03:01:24'),
(24, '{{ticket_list_user_inpact}}', '$eval_result=get_post("list_user_inpact");\r\nreturn $eval_result;', '', '2006-09-16 03:11:04'),
(25, '{{ticket_list_group_inpact}}', '$eval_result=get_post("list_group_inpact");\r\nreturn $eval_result;', '', '2006-09-16 03:11:25'),
(26, '{{ticket_list_asset_inpact}}', '$eval_result=get_post("ticket_asset_inpact");\r\nreturn $eval_result;', '', '2006-09-16 03:11:36'),
(27, '{{ticket_sla}}', '$eval_result=get_post("sla");\r\nreturn $eval_result;', '', '2006-09-16 03:11:47'),
(31, '{{ticket_lang}}', '$eval_result=get_post("lang");\r\nreturn $eval_result;', '', '2006-09-16 03:11:56'),
(33, '{{ticket_call_log_groups}}', '$eval_result=get_post("call_log_groups");\r\nreturn $eval_result;', '', '2006-09-16 03:12:08'),
(32, '{{ticket_comment}}', '$eval_result=get_post("comment");\r\nreturn $eval_result;', '', '2006-09-16 03:12:18'),
(34, '{{ticket_call_log_user}}', '$eval_result=get_post("call_log_groups");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(35, '{{ticket_mail_from}}', '$eval_result=get_post("mail_from");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(36, '{{ticket_mail_to}}', '$eval_result=get_post("mail_to");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(37, '{{ticket_mail_cc}}', '$eval_result=get_post("mail_cc");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(38, '{{ticket_mail_bcc}}', '$eval_result=get_post("mail_bcc");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(39, '{{ticket_list_user_impact}}', '$eval_result=get_post("list_user_impact");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(40, '{{ticket_list_group_impact}}', '$eval_result=get_post("list_group_impact");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(41, '{{ticket_list_asset_impact}}', '$eval_result=get_post("list_asset_impact");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(42, '{{ticket_assing_to}}', '$eval_result=get_post("assing_to");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(43, '{{ticket_attach1}}', '$eval_result=get_post("attach1");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(44, '{{ticket_attach2}}', '$eval_result=get_post("attach2");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(45, '{{ticket_attach3}}', '$eval_result=get_post("attach3");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(46, '{{ticket_attach4}}', '$eval_result=get_post("attach4");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(47, '{{ticket_model_number}}', '$eval_result=get_post("model_number");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(48, '{{ticket_model_id}}', '$eval_result=get_post("model_id");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(49, '{{ticket_model_title}}', '$eval_result=get_post("model_title");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(50, '{{iss_event_description}}', '$eval_result="{{iss_event_description}}";\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(51, '{{ticket_attach}}', '$eval_result=$attach;\r\nreturn $eval_result;', '', '2006-07-25 20:36:58');

        -- --------------------------------------------------------

--
-- Struttura della tabella `tstm_command`
--

DROP TABLE IF EXISTS `tstm_command`;
CREATE TABLE `tstm_command` (
  `id` int(11) NOT NULL auto_increment,
  `c(27, '{{ticket_sla}}', '$eval_result=get_post("sla");\r\nreturn $eval_result;', '', '2006-09-16 03:11:47'),
(31, '{{ticket_lang}}', '$eval_result=get_post("lang");\r\nreturn $eval_result;', '', '2006-09-16 03:11:56'),
(33, '{{ticket_call_log_groups}}', '$eval_result=get_post("call_log_groups");\r\nreturn $eval_result;', '', '2006-09-16 03:12:08'),
(32, '{{ticket_comment}}', '$eval_result=get_post("comment");\r\nreturn $eval_result;', '', '2006-09-16 03:12:18'),
(34, '{{ticket_call_log_user}}', '$eval_result=get_post("call_log_groups");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(35, '{{ticket_mail_from}}', '$eval_result=get_post("mail_from");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(36, '{{ticket_mail_to}}', '$eval_result=get_post("mail_to");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(37, '{{ticket_mail_cc}}', '$eval_result=get_post("mail_cc");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(38, '{{ticket_mail_bcc}}', '$eval_result=get_post("mail_bcc");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(39, '{{ticket_list_user_impact}}', '$eval_result=get_post("list_user_impact");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(40, '{{ticket_list_group_impact}}', '$eval_result=get_post("list_group_impact");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(41, '{{ticket_list_asset_impact}}', '$eval_result=get_post("list_asset_impact");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(42, '{{ticket_assing_to}}', '$eval_result=get_post("assing_to");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(43, '{{ticket_attach1}}', '$eval_result=get_post("attach1");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(44, '{{ticket_attach2}}', '$eval_result=get_post("attach2");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(45, '{{ticket_attach3}}', '$eval_result=get_post("attach3");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(46, '{{ticket_attach4}}', '$eval_result=get_post("attach4");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(47, '{{ticket_model_number}}', '$eval_result=get_post("model_number");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(48, '{{ticket_model_id}}', '$eval_result=get_post("model_id");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(49, '{{ticket_model_title}}', '$eval_result=get_post("model_title");\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(50, '{{iss_event_description}}', '$eval_result="{{iss_event_description}}";\r\nreturn $eval_result;', '', '2006-07-25 20:36:58'),
(51, '{{ticket_attach}}', '$eval_result=$attach;\r\nreturn $eval_result;', '', '2006-07-25 20:36:58');

        -- --------------------------------------------------------

--
-- Struttura della tabella `tstm_command`
--

DROP TABLE IF EXISTS `tstm_command`;
CREATE TABLE `tstm_command` (
  `id` int(11) NOT NULL auto_increment,
  `command_name` varchar(254) NOT NULL default '',
  `command_line` varchar(254) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`command_name`)
) TYPE=MyISAM AUTO_INCREMENT=69 ;

--
-- Dump dei dati per la tabella `tstm_command`
--

INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (1, 'check_host_alive', '$USER1$/check_ping', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (2, 'check_far_host_alive', '$USER1$/check_ping', 'Nota:', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (3, 'check_ping_altra_interfaccia', '$USER1$/check_ping', 'command_line', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (4, 'check_ping', '$USER1$/check_ping', 'command_line', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (5, 'check_host_fittizio', 'exit', 'Utile', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (6, 'check_tcp', '$USER1$/check_tcp', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (7, 'check_udp', '$USER1$/check_udp', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (8, 'check_telnet', '$USER1$/check_tcp', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (9, 'check_ssh', '$USER1$/check_ssh', 'command_line', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (10, 'check_ftp', '$USER1$/check_ftp', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (11, 'check_http', '$USER1$/check_http', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (12, 'check_http_on_port', '$USER1$/check_http', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (13, 'check_http_on_address', '$USER1$/check_http', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (14, 'check_https', '$USER1$/check_tcp', 'command_line', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (15, 'check_proxy', '$USER1$/nostre/controllo/check_proxy', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (16, 'check_deface', '$USER1$/nostre/controllo/check_deface', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (17, 'check_smtp', '$USER1$/check_smtp', 'command_line', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (18, 'check_pop', '$USER1$/check_pop', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (19, 'check_imap', '$USER1$/check_imap', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (20, 'check_nntp', '$USER1$/check_nntp', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (21, 'check_snmp', '$USER1$/check_snmp', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (22, 'check_snmp_spazio_disco', '$USER1$/nostre/controllo/check_snmp_spazio_disco', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (23, 'check_snmp_cpu', '$USER1$/nostre/controllo/check_snmp_cpu', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (24, 'check_snmp_ram', '$USER1$/nostre/controllo/check_snmp_ram', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (25, 'check_snmp_uptime', '$USER1$/check_snmp', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (26, 'check_snmp_processi', '$USER1$/nostre/controllo/check_snmp_processi', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (27, 'check_vrrp', '$USER1$/nostre/controllo/check_vrrp_weight', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (28, 'check_dns', '/usr/bin/dig', 'VerificaParametriNota:', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (29, 'check_snmp_interfacce', '$USER1$/check_ifstatus', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (30, 'check_snmp_interfacce_con_esclusione', '$USER1$/nostre/controllo/check_snmp_interfacce', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (31, 'check_nt_disk', '$USER1$/check_nt', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (32, 'check_ssh_spazio_disco', '$USER1$/nostre/controllo/check_ssh_spazio_disco', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (33, 'check_ssh_chiavi_autorizzate', '$USER1$/nostre/controllo/check_ssh_chiavi_autorizzate', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (34, 'check_ssh_configurazione_sshd', '$USER1$/nostre/controllo/check_ssh_configurazione_sshd', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (35, 'check_nt_process', '$USER1$/check_nt', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (36, 'check_iss_xpu', '$USER1$/nostre/controllo/check_iss_xpu', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (37, 'check_rtsp', '$USER1$/check_rtsp', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (38, 'check_solo_passivo', '$USER1$/nostre/controllo/check_solo_passivo', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (39, 'check_antitrap', '$USER1$/nostre/recupero/antitrap', 'QuestodallanuovaParametri:', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (40, 'check_vnc', '$USER1$/check_tcp', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (41, 'check_rdp', '$USER1$/check_tcp', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (42, 'recovery_snmp_trap_subsystem', '$USER1$/nostre/recupero/snmp_trap_subsystem', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (43, 'notifica_servizio_via_email', '$USER1$/nostre/notifica/servizio_via_email', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (44, 'notifica_host_via_email', '$USER1$/nostre/notifica/host_via_email', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (45, 'check_juniper_snmp_uptime', '$USER1$/check_snmp', 'Controllo', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (46, 'check_netscreen_snmp_uptime', '$USER1$/check_snmp', 'Controllo', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (47, 'check_netscreen_snmp_cpu', '$USER1$/check_snmp', 'ControlloParametri', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (48, 'check_netscreen_snmp_nsrp_c2_master', '$USER1$/check_snmp', 'ControlloParametri', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (49, 'check_netscreen_snmp_nsrp_c2_backup', '$USER1$/check_snmp', 'ControlloParametri', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (50, 'check_netscreen_snmp_nsrp_c2_priorita', '$USER1$/check_snmp', 'ControlloParametri', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (51, 'check_netscreen_snmp_ram', '$USER1$/check_snmp', 'ControlloParametriNota:', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (52, 'check_nokia_voyager_interfacce', '$USER1$/nostre/controllo/check_nokia_voyager_interfacce', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (53, 'check_nokia_voyager_vrrp', '$USER1$/nostre/controllo/check_nokia_voyager_vrrp', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (54, 'check_stonegate_snmp_uptime', '$USER1$/check_snmp', 'Controllo', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (55, 'check_stonegate_snmp_cpu', '$USER1$/check_snmp', 'Controllo', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (56, 'check_stonegate_snmp_stato', '$USER1$/check_snmp', 'Controllo', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (57, 'check_windows_snmp_uptime', '$USER1$/check_snmp', 'Controllo', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (58, 'notify-by-email', '/usr/bin/printf', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (59, 'host-notify-by-email', '/usr/bin/printf', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (60, 'check-host-alive', '/bin/check_ping', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (61, 'check_disk', '$USER1$/check_disk', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (62, 'check_users', '$USER1$/check_users', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (63, 'check_procs', '$USER1$/check_procs', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (64, 'check_load', '$USER1$/check_load', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (65, 'notify-by-epager', '/usr/bin/printf', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (66, 'host-notify-by-epager', '/usr/bin/printf', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (67, 'process-host-perfdata', '/usr/bin/printf', '', '20051101160206');
INSERT INTO `tstm_command` (`id`, `command_name`, `command_line`, `comment`, `date_time`) VALUES (68, 'process-service-perfdata', '/usr/bin/printf', '', '20051101160206');

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_download`
--

DROP TABLE IF EXISTS `tstm_download`;
CREATE TABLE `tstm_download` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(254) NOT NULL default '',
  `path` varchar(254) default NULL,
  `file_name` varchar(254) default NULL,
  `file_type` varchar(64) default NULL,
  `file_size` varchar(64) default NULL,
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='Table of file to download' AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `tstm_download`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_download_group`
--

DROP TABLE IF EXISTS `tstm_download_group`;
CREATE TABLE `tstm_download_group` (
  `id` int(11) NOT NULL auto_increment,
  `download_id` int(11) NOT NULL default '0',
  `group_name` varchar(254) NOT NULL default '',
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `download_id` (`download_id`,`group_name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `tstm_download_group`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_escalation`
--

DROP TABLE IF EXISTS `tstm_escalation`;
CREATE TABLE `tstm_escalation` (
  `id` int(11) NOT NULL default '0',
  `ticket_number` varchar(64) NOT NULL default '',
  `action` set('open','update','close','in_progress','pending','unknow','sospend','waiting_for','deleted','escalate') NOT NULL default 'update',
  `id_ticket` int(11) NOT NULL default '0',
  `comment` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

--
-- Dump dei dati per la tabella `tstm_escalation`
--

INSERT INTO `tstm_escalation` (`id`, `ticket_number`, `action`, `id_ticket`, `comment`, `date_time`) VALUES (0, '', 'update', 0, 'escalation', '20060321104617');

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_asset`
--

DROP TABLE IF EXISTS `tstm_asset`;
CREATE TABLE `tstm_asset` (
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
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`,`ip`)
) TYPE=MyISAM COMMENT='Tabella di tutti gli host' AUTO_INCREMENT=183 ;

--
-- Dump dei dati per la tabella `tstm_asset`
--

INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (1, NULL, '', 'Agos_Access_router', NULL, '10.1.1.26', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Agos, [use]=AGOS_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (2, NULL, '', 'Agos_FW_SG_VRRP_1', NULL, '10.1.24.1', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Agos, [use]=AGOS_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (3, NULL, '', 'Agos_FW_SG_VRRP_2', NULL, '10.1.24.11', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Agos, [use]=AGOS_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (4, NULL, '', 'Agos_FW_SG_1', NULL, '10.1.24.2', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Agos, [use]=AGOS_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (5, NULL, '', 'Agos_FW_SG_2', NULL, '10.1.24.3', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Agos, [use]=AGOS_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (6, NULL, '', 'Agos_FW_SG_3', NULL, '10.1.24.12', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Agos, [use]=AGOS_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (7, NULL, '', 'Agos_FW_SG_4', NULL, '10.1.24.13', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Agos, [use]=AGOS_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (8, NULL, '', 'Agos_Management_SG', NULL, '10.1.24.129', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Agos, [use]=AGOS_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (9, NULL, '', 'Agos_IPS_Sensore_1', NULL, '10.1.24.151', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Agos, [use]=AGOS_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (10, NULL, '', 'Agos_IPS_Sensore_2', NULL, '10.1.24.152', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Agos, [use]=AGOS_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (11, NULL, '', 'Agos_IPS_Sensore_3', NULL, '10.1.24.153', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Agos, [use]=AGOS_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (12, NULL, '', 'Agos_IPS_Sensore_4', NULL, '10.1.24.154', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Agos, [use]=AGOS_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (13, NULL, '', 'Agos_IPS_Analizer', NULL, '10.1.24.155', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Agos, [use]=AGOS_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (14, NULL, '', 'Agos_www.agositafinco.it', NULL, '213.215.179.132', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', '0 [Alias]=Agos, [use]=AGOS_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (15, NULL, '', 'BasicNet_FW_FortiGate_60', NULL, '172.30.1.91', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=BasicNet, [use]=BasicNet_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (16, NULL, '', 'BasicNet_FW_FortiGate_200', NULL, '172.30.1.90', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=BasicNet, [use]=BasicNet_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (17, NULL, '', 'BasicNet_Cisco_3640', NULL, '172.30.0.1', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=BasicNet, [use]=BasicNet_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (18, NULL, '', 'Iss_XPU', NULL, '127.0.0.1', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=ISS, [use]=ISS_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (19, NULL, '', 'Lloyd_Management_SP', NULL, '172.30.8.27', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Lloyd, [use]=LLOYD_host,', '20051101160205');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (20, NULL, '', 'Lss_Acc_Rout_SCC', NULL, '10.1.1.21', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', 'address [Alias]=Lss, [use]=LSS_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (21, NULL, '', 'Lss_Acc_Rout_Cliente', NULL, '10.1.1.22', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', 'address [Alias]=Lss, [use]=LSS_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (22, NULL, '', 'Lss_Acc_Rout_SCC', NULL, '10.1.0.100', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', 'address [Alias]=Lss, [use]=LSS_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (23, NULL, '', 'NAAA_FW_NetScr_5GT', NULL, '192.168.252.1', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=NAAA, [use]=NAAA_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (24, NULL, '', 'NAAA_Web_Server', NULL, '192.168.252.10', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=NAAA, [use]=NAAA_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (25, NULL, '', 'NMS_Router_Albacom_HA', NULL, '217.220.17.129', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=NMS, [use]=NMS_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (26, NULL, '', 'NMS_Router_Albacom_1', NULL, '217.220.17.157', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=NMS, [use]=NMS_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (27, NULL, '', 'NMS_Router_Albacom_2', NULL, '217.220.17.158', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=NMS, [use]=NMS_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (28, NULL, '', 'NMS_FW_NetScr_208_HA', NULL, '192.168.206.1', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=NMS, [use]=NMS_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (29, NULL, '', 'NMS_FW_NetScr_208_1', NULL, '192.168.206.2', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=NMS, [use]=NMS_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (30, NULL, '', 'NMS_FW_NetScr_208_2', NULL, '192.168.206.3', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=NMS, [use]=NMS_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (31, NULL, '', 'NMS_Antivirus_server_interno', NULL, '10.206.81.125', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=NMS, [use]=NMS_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (32, NULL, '', 'NMS_Antivirus_server_DMZ', NULL, '192.168.206.4', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=NMS, [use]=NMS_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (33, NULL, '', 'NMS_Mail_Filter_DMZ', NULL, '192.168.206.5', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=NMS, [use]=NMS_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (34, NULL, '', 'NMS_URL_filtering_interno', NULL, '10.206.81.132', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=NMS, [use]=NMS_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (35, NULL, '', 'NMS_Reverse_Proxy_DMZ', NULL, '192.168.206.6', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=NMS, [use]=NMS_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (36, NULL, '', 'NMS_SAP_Router_DMZ', NULL, '192.168.206.7', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=NMS, [use]=NMS_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (37, NULL, '', 'NI_Server_Web', NULL, '81.208.89.200', '', NULL, NULL, NULL, NULL, '', '', '', '', '', 'check_host_fittizio', 'parents0 [Alias]=Nuovi, [use]=NUOVIINVESTIMENTI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (38, NULL, '', 'NI_Server_Mail', NULL, '81.208.89.221', '', NULL, NULL, NULL, NULL, '', '', '', '', '', 'check_host_fittizio', 'parents0 [Alias]=Nuovi, [use]=NUOVIINVESTIMENTI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (39, NULL, '', 'NI_Server_Mail_Relay1', NULL, '81.208.89.221', '', NULL, NULL, NULL, NULL, '', '', '', '', '', 'check_host_fittizio', 'parents0 [Alias]=Nuovi, [use]=NUOVIINVESTIMENTI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (40, NULL, '', 'NI_Cluster_StoneGate', NULL, '192.168.224.1', '', NULL, NULL, NULL, NULL, '', '', '', '', '', 'check_host_fittizio', ' [Alias]=Nuovi, [use]=NUOVIINVESTIMENTI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (41, NULL, '', 'NI_Backbone_Netscreen', NULL, '192.168.224.254', '', NULL, NULL, NULL, NULL, '', '', '', '', '', 'check_host_fittizio', ' [Alias]=Nuovi, [use]=NUOVIINVESTIMENTI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (42, NULL, '', 'NI_SiteProtector', NULL, '192.168.224.167', '', NULL, NULL, NULL, NULL, '', '', '', '', '', 'check_host_fittizio', ' [Alias]=Nuovi, [use]=NUOVIINVESTIMENTI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (43, NULL, '', 'NI_PDC', NULL, '192.168.224.168', '', NULL, NULL, NULL, NULL, '', '', '', '', '', 'check_host_fittizio', ' [Alias]=Nuovi, [use]=NUOVIINVESTIMENTI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (44, NULL, '', 'NI_switch_multicast', NULL, '192.168.224.169', '', NULL, NULL, NULL, NULL, '', '', '', '', '', 'check_host_fittizio', ' [Alias]=Nuovi, [use]=NUOVIINVESTIMENTI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (45, NULL, '', 'NI_Server_Relay-1', NULL, '194.244.10.221', '', NULL, NULL, NULL, NULL, '', '', '', '', '', 'check_host_fittizio', ' [Alias]=Nuovi, [use]=NUOVIINVESTIMENTI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (46, NULL, '', 'PinInd_Access_router', NULL, '10.1.1.14', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (47, NULL, '', 'PinInd_FW_NetScr500', NULL, '10.1.14.3', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (48, NULL, '', 'PinInd_FW_Mitsubishi', NULL, '10.1.14.1', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (49, NULL, '', 'PinInd_FW_Fiat', NULL, '10.1.14.67', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (50, NULL, '', 'PinInd_Proxy', NULL, '10.1.14.5', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (51, NULL, '', 'PinInd_FW_Internet', NULL, '10.1.14.65', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (52, NULL, '', 'PinInd_GW_Internet', NULL, '10.1.14.66', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (53, NULL, '', 'PinInd_Web_Trends', NULL, '10.1.14.11', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (54, NULL, '', 'PinInd_FW_Ford', NULL, '10.1.14.2', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (55, NULL, '', 'PinInd_Router_Gru_verso_Bairo', NULL, '10.1.14.68', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (56, NULL, '', 'PinInd_Bairo_Router', NULL, '10.1.14.34', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (57, NULL, '', 'PinInd_Bairo_Core', NULL, '10.1.14.35', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (58, NULL, '', 'PinInd_Bairo_Ford', NULL, '10.1.14.33', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (59, NULL, '', 'PinInd_Reverse_Proxy', NULL, '10.1.14.50', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (60, NULL, '', 'PinInd_Bairo_Mitsubishi', NULL, '10.1.14.32', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (61, NULL, '', 'PinReD_Router_Gru_verso_Camb', NULL, '10.1.14.6', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (62, NULL, '', 'PinReD_Router_Cambiano', NULL, '10.1.13.69', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (63, NULL, '', 'PinReD_FW_NetScr_500', NULL, '10.1.13.70', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (64, NULL, '', 'PinReD_FW_NetScr_FIAT', NULL, '10.1.13.40', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (65, NULL, '', 'PinReD_FW_NetScr5XP_Enx', NULL, '10.1.13.48', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (66, NULL, '', 'PinReD_FW_NetScr5XP_Cilea', NULL, '10.1.13.72', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (67, NULL, '', 'PinReD_FW_NetScr5XP_OASYS', NULL, '10.1.13.46', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (68, NULL, '', 'PinReD_FW_NetScr5XP_China', NULL, '10.1.13.24', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (69, NULL, '', 'PinReD_Attrav_Cilea', NULL, '10.1.13.130', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (70, NULL, '', 'PinReD_FW_NetScr_PRG', NULL, '10.1.13.73', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (71, NULL, '', 'PinReD_Attrav_NetScr_PRG', NULL, '10.1.13.131', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (72, NULL, '', 'PinReD_Attrav_NetScr_Enx', NULL, '10.1.13.49', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (73, NULL, '', 'PinReD_Attrav_PRG_HF3', NULL, '10.1.13.132', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (74, NULL, '', 'PinReD_Proxy_Internet', NULL, '10.1.13.134', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (75, NULL, '', 'PinReD_FW_Volvo', NULL, '10.1.13.75', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (76, NULL, '', 'PinReD_Attrav_Volvo', NULL, '10.1.13.133', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (77, NULL, '', 'PinReD_FW_Extra', NULL, '10.1.13.150', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (78, NULL, '', 'PinReD_FW_PRG_HF3', NULL, '10.1.13.74', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (79, NULL, '', 'PinReD_FW_NetScr_PSA', NULL, '10.1.13.36', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (80, NULL, '', 'PinReD_Attrav_NetScr_PSA', NULL, '10.1.13.37', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (81, NULL, '', 'PinReD_booo', NULL, '10.1.13.34', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (82, NULL, '', 'PinInd_FW_Bull', NULL, '10.1.14.28', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (83, NULL, '', 'PinReD_FW_China', NULL, '10.1.13.24', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (84, NULL, '', 'PinReD_FW_Cilea', NULL, '10.1.13.72', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (85, NULL, '', 'PinReD_FW_Core', NULL, '10.1.13.70', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (86, NULL, '', 'PinReD_FW_Enx', NULL, '10.1.13.48', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (87, NULL, '', 'PinReD_FW_FIAT', NULL, '10.1.13.40', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (88, NULL, '', 'PinReD_FW_PSA', NULL, '10.1.13.36', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (89, NULL, '', 'PinReD_FW_Oasys', NULL, '10.1.13.46', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (90, NULL, '', 'PinReD_FW_PRG_GR', NULL, '10.1.13.73', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (91, NULL, '', 'PinReD_Attrav_PRG', NULL, '10.1.13.131', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (92, NULL, '', 'PinReD_Attrav_Enx', NULL, '10.1.13.49', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (93, NULL, '', 'PinReD_Attrav_PSA', NULL, '10.1.13.37', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (94, NULL, '', 'PinInd_FW_NetScr500_ext', NULL, '10.1.14.3', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (95, NULL, '', 'PinInd_FW_Cluster1_NetScr500', NULL, '10.1.14.13', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (96, NULL, '', 'PinInd_FW_Cluster2_NetScr500', NULL, '10.1.14.14', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (97, NULL, '', 'PinInd_FW_NetScr500_int', NULL, '10.1.14.3', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (98, NULL, '', 'PinInd_FW_Bull', NULL, '10.1.14.17', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (99, NULL, '', 'PinInd_FW_Bull_Pregnana', NULL, '10.1.14.228', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (100, NULL, '', 'PinInd_FW_Ford_Bairo', NULL, '10.1.14.33', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (101, NULL, '', 'PinInd_FW_Mitsubishi_Bairo', NULL, '10.1.14.32', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (102, NULL, '', 'PinInd_Router_Accesso', NULL, '10.1.1.14', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (103, NULL, '', 'PinInd_Router_Bairo', NULL, '10.1.14.34', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (104, NULL, '', 'PinInd_Switch_Bairo', NULL, '10.1.14.35', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (105, NULL, '', 'PinReD_FW_FIAT_Fornitori', NULL, '10.1.13.34', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (106, NULL, '', 'PinInd_FW_NetScr_500_HA', NULL, '10.1.14.3', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (107, NULL, '', 'PinInd_FW_NetScr_500_1', NULL, '10.1.14.13', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (108, NULL, '', 'PinInd_FW_NetScr_500_2', NULL, '10.1.14.14', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (109, NULL, '', 'PinReD_Router_Cambiano_Backup', NULL, '10.1.13.76', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Pininfarina, [use]=PININFARINA_host_RAND,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (110, NULL, '', 'Seceti_Acc_Rout_SCC', NULL, '192.168.1.98', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Seceti, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (111, NULL, '', 'Seceti_Acc_Rout_Cliente', NULL, '10.1.1.18', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Seceti, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (112, NULL, '', 'Seceti_FW_NCEXT1', NULL, '10.1.16.17', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Firewall, [use]=SECETI_host_FW,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (113, NULL, '', 'Seceti_FW_NCEXT2', NULL, '10.1.16.18', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Firewall, [use]=SECETI_host_FW,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (114, NULL, '', 'Seceti_FW_NCINT1', NULL, '10.1.16.1', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Firewall, [use]=SECETI_host_FW,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (115, NULL, '', 'Seceti_FW_NCINT2', NULL, '10.1.16.2', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Firewall, [use]=SECETI_host_FW,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (116, NULL, '', 'Seceti_FW_CREXT1', NULL, '10.1.16.49', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Firewall, [use]=SECETI_host_FW,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (117, NULL, '', 'Seceti_FW_CREXT2', NULL, '10.1.16.50', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Firewall, [use]=SECETI_host_FW,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (118, NULL, '', 'Seceti_FW_CRINT1', NULL, '10.1.16.33', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Firewall, [use]=SECETI_host_FW,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (119, NULL, '', 'Seceti_FW_CRINT2', NULL, '10.1.16.34', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Firewall, [use]=SECETI_host_FW,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (120, NULL, '', 'Seceti_l3sw_nc_int1', NULL, '10.1.16.27', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Attraversamento, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (121, NULL, '', 'Seceti_l3sw_nc_int2', NULL, '10.1.16.28', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Attraversamento, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (122, NULL, '', 'Seceti_l3sw_nc_ext1', NULL, '10.1.16.87', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Attraversamento, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (123, NULL, '', 'Seceti_l3sw_nc_ext2', NULL, '10.1.16.88', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Attraversamento, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (124, NULL, '', 'Seceti_l3sw_cr_int1', NULL, '10.1.16.127', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Attraversamento, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (125, NULL, '', 'Seceti_l3sw_cr_int2', NULL, '10.1.16.128', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Attraversamento, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (126, NULL, '', 'Seceti_l3sw_cr_ext1', NULL, '10.1.16.187', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Attraversamento, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (127, NULL, '', 'Seceti_l3sw_cr_ext2', NULL, '10.1.16.188', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Attraversamento, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (128, NULL, '', 'Seceti_Web_Trends', NULL, '10.1.16.19', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Seceti, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (129, NULL, '', 'Seceti_Acc_Rout_SCC', NULL, '10.1.1.17', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Seceti, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (130, NULL, '', 'Seceti_FW_Settimo_EXT_1', NULL, '10.1.16.11', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Firewall, [use]=SECETI_host_FW,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (131, NULL, '', 'Seceti_FW_Settimo_EXT_2', NULL, '10.1.16.12', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Firewall, [use]=SECETI_host_FW,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (132, NULL, '', 'Seceti_l3sw_Settimo_DMZ_1', NULL, '10.1.16.133', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Attraversamento, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (133, NULL, '', 'Seceti_l3sw_Settimo_DMZ_2', NULL, '10.1.16.134', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Attraversamento, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (134, NULL, '', 'Seceti_l3sw_Settimo_BEND_1', NULL, '10.1.16.197', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Attraversamento, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (135, NULL, '', 'Seceti_l3sw_Settimo_BEND_2', NULL, '10.1.16.198', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Attraversamento, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (136, NULL, '', 'Seceti_Management_NC', NULL, '10.1.16.20', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Seceti, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (137, NULL, '', 'Seceti_Management_CR', NULL, '10.1.16.21', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Seceti, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (138, NULL, '', 'Seceti_Management_Settimo', NULL, '10.1.16.23', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Seceti, [use]=SECETI_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (139, NULL, '', 'Village_www', NULL, '212.70.232.11', '', NULL, NULL, NULL, NULL, '', '', '', '', '', 'check_host_fittizio', '0 [Alias]=Village, [use]=VILLAGE_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (140, NULL, '', 'Village_smsc-wind', NULL, '212.70.232.22', '', NULL, NULL, NULL, NULL, '', '', '', '', '', 'check_host_fittizio', '0 [Alias]=Village, [use]=VILLAGE_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (141, NULL, '', 'Village_wap', NULL, '212.70.232.28', '', NULL, NULL, NULL, NULL, '', '', '', '', '', 'check_host_fittizio', '0 [Alias]=Village, [use]=VILLAGE_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (142, NULL, '', 'Village_eomer', NULL, '212.70.232.4', '', NULL, NULL, NULL, NULL, '', '', '', '', '', 'check_host_fittizio', '0 [Alias]=Village, [use]=VILLAGE_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (143, NULL, '', 'Village_smsc-infotim', NULL, '212.70.232.52', '', NULL, NULL, NULL, NULL, '', '', '', '', '', 'check_host_fittizio', '0 [Alias]=Village, [use]=VILLAGE_host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (144, NULL, '', 'gw', NULL, '192.168.1.1', '', NULL, NULL, NULL, NULL, '', '', '', '', '', 'check-host-alive', '206024x7d,u,r [Alias]=Default, [use]=generic-host,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (145, NULL, '', 'switch_1', NULL, '192.168.1.48', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', 'firewall [Alias]=Switch, [use]=INTERNO_host_APPARATI_RETE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (146, NULL, '', 'switch_3', NULL, '192.168.1.47', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', 'switch_1 [Alias]=Switch, [use]=INTERNO_host_APPARATI_RETE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (147, NULL, '', 'switch_4', NULL, '192.168.1.49', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', 'switch_1 [Alias]=Switch, [use]=INTERNO_host_APPARATI_RETE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (148, NULL, '', 'switch_2', NULL, '127.0.0.1', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', 'switch_1 [Alias]=Switch, [use]=INTERNO_host_APPARATI_RETE_STUPIDI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (149, NULL, '', 'hub01', NULL, '127.0.0.1', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', 'firewall [Alias]=Hub, [use]=INTERNO_host_APPARATI_RETE_STUPIDI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (150, NULL, '', 'hub02', NULL, '127.0.0.1', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', 'firewall [Alias]=Switch, [use]=INTERNO_host_APPARATI_RETE_STUPIDI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (151, NULL, '', 'hub03', NULL, '127.0.0.1', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', 'Router_Noicom [Alias]=Switch, [use]=INTERNO_host_APPARATI_RETE_STUPIDI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (152, NULL, '', 'firewall', NULL, '192.168.1.1', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Firewall, [use]=INTERNO_host_APPARATI_RETE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (153, NULL, '', 'IDS', NULL, '192.168.1.81', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', 'switch_1,hub01 [Alias]=Intrusion, [use]=INTERNO_host_APPARATI_RETE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (154, NULL, '', 'Gateway_2', NULL, '62.152.110.65', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=sg, [use]=INTERNO_host_APPARATI_RETE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (155, NULL, '', 'Router_HDSL_Colt', NULL, '62.152.121.217', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=HDSL, [use]=INTERNO_host_APPARATI_RETE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (156, NULL, '', 'Router_verso_Agos', NULL, '10.1.0.99', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Router, [use]=INTERNO_host_APPARATI_RETE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (157, NULL, '', 'Router_verso_LSS', NULL, '10.1.0.100', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Router, [use]=INTERNO_host_APPARATI_RETE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (158, NULL, '', 'Router_verso_Pininfarina', NULL, '10.1.0.97', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Router, [use]=INTERNO_host_APPARATI_RETE,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (159, NULL, '', 'Router_Noicom', NULL, '194.153.211.17', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Router, [use]=INTERNO_host_APPARATI_RETE_STUPIDI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (160, NULL, '', 'Aldebaran', NULL, '192.168.0.40', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=HTTP, [use]=INTERNO_host_SERVENTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (161, NULL, '', 'Shaula', NULL, '10.10.0.35', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Server, [use]=INTERNO_host_SERVENTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (162, NULL, '', 'Bellatrix', NULL, '192.168.1.36', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Server, [use]=INTERNO_host_SERVENTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (163, NULL, '', 'Antares', NULL, '192.168.1.36', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Management, [use]=INTERNO_host_SERVENTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (164, NULL, '', 'Sirio', NULL, '192.168.1.37', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Server, [use]=INTERNO_host_SERVENTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (165, NULL, '', 'NTServ02', NULL, '192.168.1.2', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Windows, [use]=INTERNO_host_SERVENTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (166, NULL, '', 'NTServ05', NULL, '192.168.1.80', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Windows, [use]=INTERNO_host_SERVENTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (167, NULL, '', 'Serv2000', NULL, '192.168.1.5', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Server, [use]=INTERNO_host_SERVENTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (168, NULL, '', 'Mercurio', NULL, '192.168.1.3', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Server, [use]=INTERNO_host_SERVENTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (169, NULL, '', 'File-srv', NULL, '192.168.1.9', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=File, [use]=INTERNO_host_SERVENTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (170, NULL, '', 'Melipal', NULL, '192.168.1.42', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Melipal, [use]=INTERNO_host_SERVENTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (171, NULL, '', 'Plutone', NULL, '192.168.0.2', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Plutone, [use]=INTERNO_host_SERVENTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (172, NULL, '', 'Sonda1', NULL, '192.168.2.101', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Sonda, [use]=INTERNO_host_SERVENTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (173, NULL, '', 'Sonda2', NULL, '192.168.2.102', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Sonda, [use]=INTERNO_host_SERVENTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (174, NULL, '', 'Router_Albacom_Sonda_1', NULL, '85.20.80.75', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Router, [use]=INTERNO_host_SERVENTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (175, NULL, '', 'Router_Albacom_Sonda_2', NULL, '85.20.80.74', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Router, [use]=INTERNO_host_SERVENTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (176, NULL, '', 'scc-soc-1', NULL, '10.10.0.190', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=SOC, [use]=INTERNO_host_SOC,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (177, '', '', 'scc-soc-2', '', '10.10.0.191', '', '', '', '', '', 'pc', '', '', '', '', '', ' [Alias]=SOC, [use]=INTERNO_host_SOC,', '20060810134152');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (178, NULL, '', 'scc-prn-ope-1', NULL, '192.168.1.7', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Stampante, [use]=INTERNO_host_STAMPANTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (179, NULL, '', 'print-fiery', NULL, '192.168.1.50', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Stampante, [use]=INTERNO_host_STAMPANTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (180, NULL, '', 'techdirectprint', NULL, '192.168.1.15', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Stampante, [use]=INTERNO_host_STAMPANTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (181, NULL, '', 'scc-prn-soc-1', NULL, '192.168.1.8', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', ' [Alias]=Stampante, [use]=INTERNO_host_STAMPANTI,', '20051101160206');
INSERT INTO `tstm_asset` (`id`, `serial`, `mac_adress`, `name`, `location`, `ip`, `nat_ip`, `mask`, `gateway`, `dns1`, `dns2`, `type`, `os`, `state`, `login_id`, `login_pw`, `check_command`, `comment`, `date_time`) VALUES (182, NULL, '', 'localhost', NULL, '127.0.0.1', '', NULL, NULL, NULL, NULL, '', '', '', '', '', 'check-host-alive', '1012024x7d,r [Alias]=localhost, [use]=generic-host,', '20051101160206');

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_asset_group`
--

DROP TABLE IF EXISTS `tstm_asset_group`;
CREATE TABLE `tstm_asset_group` (
  `id` bigint(20) NOT NULL auto_increment,
  `host_id` bigint(20) NOT NULL default '0',
  `host_name` varchar(124) NOT NULL default '',
  `group_name` varchar(60) NOT NULL default '0',
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `host_name` (`host_name`,`group_name`)
) TYPE=MyISAM COMMENT='Tabella del raporto host e gruppo (cliente)' AUTO_INCREMENT=24 ;

--
-- Dump dei dati per la tabella `tstm_asset_group`
--

INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (1, 0, 'Agos_Access_router,Agos_FW_SG_VRRP_1,Agos_FW_SG_VRRP_2,Agos_FW_SG_1,Agos_FW_SG_2,Agos_FW_SG_3,Agos_FW_SG_4,Agos_Management_S', 'Gruppo_Agos', '20051101220850');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (2, 0, 'BasicNet_FW_FortiGate_60,BasicNet_FW_FortiGate_200,BasicNet_Cisco_3640', 'Gruppo_BasicNet', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (3, 0, 'Iss_XPU', 'Gruppo_ISS', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (4, 0, 'Lloyd_Management_SP', 'Gruppo_Lloyd', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (5, 0, 'Lss_Acc_Rout_SCC,Lss_Acc_Rout_Cliente', 'Gruppo_Lss', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (6, 0, 'NAAA_FW_NetScr_5GT,NAAA_Web_Server', 'Gruppo_NAAA', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (7, 0, 'NMS_FW_NetScr_208_HA,NMS_FW_NetScr_208_1,NMS_FW_NetScr_208_2,NMS_Antivirus_server_DMZ,NMS_Mail_Filter_DMZ,NMS_Reverse_Proxy_', 'Gruppo_NMS', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (8, 0, 'NI_Server_Web,NI_Server_Mail,NI_Server_Mail_Relay1', 'Gruppo_NuoviInvestimenti', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (9, 0, 'NI_Cluster_StoneGate,NI_Backbone_Netscreen,NI_SiteProtector,NI_PDC,NI_switch_multicast,NI_Server_Web,NI_Server_Mail,NI_Serve', 'Gruppo_NuoviInvestimenti', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (10, 0, 'PinInd_FW_NetScr500,PinInd_FW_Mitsubishi,PinInd_Access_router,PinInd_FW_Fiat,PinInd_FW_Ford,PinInd_Bairo_Ford,PinInd_FW_Inte', 'Gruppo_Pininfarina_Industrie', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (11, 0, 'PinReD_Router_Gru_verso_Camb,PinReD_Router_Cambiano,PinReD_FW_NetScr_500,PinReD_FW_NetScr5XP_Cilea,PinReD_Attrav_Cilea,PinRe', 'Gruppo_Pininfarina_RanD', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (12, 0, 'PinReD_Router_Gru_verso_Camb,PinReD_Router_Cambiano,PinReD_FW_Core,PinReD_FW_Cilea,PinReD_Attrav_Cilea,PinReD_FW_PRG_GR,PinR', 'Gruppo_Pininfarina_RanD', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (13, 0, 'PinInd_FW_NetScr500_ext,PinInd_FW_Mitsubishi,PinInd_Router_Accesso,PinInd_FW_FIAT,PinInd_FW_Ford,PinInd_FW_Ford_Bairo,PinInd', 'Gruppo_Pininfarina_Industrie', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (14, 0, 'PinReD_Router_Gru_verso_Camb,PinReD_Router_Cambiano,PinReD_FW_Core,PinReD_Proxy_Internet,PinReD_FW_Volvo,PinReD_Attrav_Volvo', 'Gruppo_Pininfarina_RanD', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (15, 0, 'PinInd_FW_NetScr_500_HA,PinInd_FW_Mitsubishi,PinInd_Router_Accesso,PinInd_FW_FIAT,PinInd_FW_Ford,PinInd_FW_Ford_Bairo,PinInd', 'Gruppo_Pininfarina_Industrie', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (16, 0, 'Seceti_Acc_Rout_SCC,Seceti_Acc_Rout_Cliente,Seceti_FW_NCEXT1,Seceti_FW_NCEXT2,Seceti_FW_NCINT1,Seceti_FW_NCINT2,Seceti_FW_CR', 'Gruppo_Seceti', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (17, 0, 'Village_www,Village_smsc-wind,Village_wap,Village_eomer,Village_smsc-infotim', 'Gruppo_Village', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (18, 0, 'gw', 'gateways', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (19, 0, 'switch_1,switch_3,switch_4,firewall,IDS,Gateway_2,Router_verso_Agos,Router_verso_LSS,Router_verso_Pininfarina,Router_Noicom,', '~Gruppo_Apparati_Rete', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (20, 0, 'Melipal,Bellatrix,Aldebaran,Mercurio,Plutone,Sirio,NTServ05,NTServ02,File-srv,Serv2000,Shaula,Antares,Sonda1,Sonda2,Router_A', '~Gruppo_Serventi', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (21, 0, 'scc-soc-1,scc-soc-2', '~Gruppo_SOC', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (22, 0, 'scc-prn-ope-1,scc-prn-soc-1,print-fiery,techdirectprint', '~Gruppo_Stampanti', '20051101221423');
INSERT INTO `tstm_asset_group` (`id`, `host_id`, `host_name`, `group_name`, `date_time`) VALUES (23, 0, 'localhost', 'test', '20051101221423');

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_asset_services`
--

DROP TABLE IF EXISTS `tstm_asset_services`;
CREATE TABLE `tstm_asset_services` (
  `id` bigint(20) NOT NULL auto_increment,
  `host_id` bigint(20) NOT NULL default '0',
  `host_name` varchar(124) NOT NULL default '',
  `service_name` varchar(124) NOT NULL default '0',
  `state` varchar(60) NOT NULL default '',
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `host_name` (`host_name`,`service_name`)
) TYPE=MyISAM AUTO_INCREMENT=154 ;

--
-- Dump dei dati per la tabella `tstm_asset_services`
--

INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (1, 0, 'Agos_Access_router,Agos_FW_SG_VRRP_1,Agos_FW_SG_VRRP_2,Agos_FW_SG_1,Agos_FW_SG_2,Agos_FW_SG_3,Agos_FW_SG_4,Agos_Management_S', 'Ping', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (2, 0, 'Agos_FW_SG_1,Agos_FW_SG_2,Agos_FW_SG_3,Agos_FW_SG_4', 'SSH', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (3, 0, 'Agos_Management_SG', 'StoneGate', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (4, 0, 'Agos_www.agositafinco.it', 'HTTP', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (5, 0, 'Agos_Management_SG', 'RDP', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (6, 0, 'Agos_FW_SG_1,Agos_FW_SG_2,Agos_FW_SG_3,Agos_FW_SG_4', 'Carico', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (7, 0, 'Agos_FW_SG_1,Agos_FW_SG_2,Agos_FW_SG_3,Agos_FW_SG_4', 'Uptime', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (8, 0, 'Agos_FW_SG_1,Agos_FW_SG_2,Agos_FW_SG_3,Agos_FW_SG_4', 'Stato', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (9, 0, '', 'AGOS_servizio', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (10, 0, '', 'ICMP', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (11, 0, 'BasicNet_FW_FortiGate_60,BasicNet_FW_FortiGate_200', 'HTTPS', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (12, 0, '', 'BasicNet_servizio', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (13, 0, 'Iss_XPU', 'Aggiornamenti', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (14, 0, '', 'ISS_servizio', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (15, 0, '', 'LLOYD_servizio', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (16, 0, '', 'LSS_servizio', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (17, 0, '', 'NAAA_servizio', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (18, 0, 'NMS_Antivirus_server_DMZ', 'Processi', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (19, 0, 'NMS_Antivirus_server_DMZ,NMS_Antivirus_server_interno,NMS_Mail_Filter_DMZ,NMS_URL_filtering_interno', 'Spazio', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (20, 0, 'NMS_Antivirus_server_DMZ,NMS_Antivirus_server_interno,NMS_Mail_Filter_DMZ,NMS_URL_filtering_interno', 'RAM', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (21, 0, 'NMS_Antivirus_server_DMZ,NMS_Antivirus_server_interno,NMS_Mail_Filter_DMZ,NMS_URL_filtering_interno', 'Grado', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (22, 0, 'NMS_Antivirus_server_DMZ,NMS_Antivirus_server_interno,NMS_Mail_Filter_DMZ,NMS_URL_filtering_interno', 'Connessioni', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (23, 0, 'NMS_FW_NetScr_208_1', 'Valore', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (24, 0, '', 'NMS_servizio', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (25, 0, '', 'NMS_servizio_15min', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (26, 0, '', 'NMS_servizio_3ore', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (27, 0, 'NI_Server_Mail,NI_Server_Mail_Relay1', 'SMTP', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (28, 0, 'NI_PDC', 'DNS', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (29, 0, '', 'NUOVIINVESTIMENTI_servizio', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (30, 0, '', 'CLIENTI_servizio', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (31, 0, '', 'PININFARINA_servizio_INDUSTRIE', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (32, 0, 'PinInd_FW_NetScr500', 'TrapSNMP', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (33, 0, '', 'PININFARINA_servizio_RAND', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (34, 0, '', 'PININFARINA_servizio', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (35, 0, 'PinInd_FW_NetScr_500_1', 'Trap', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (36, 0, 'Seceti_FW_NCEXT2,Seceti_FW_NCINT1,Seceti_FW_NCINT2,Seceti_FW_NCEXT1,Seceti_FW_CREXT1,Seceti_FW_CREXT2,Seceti_FW_CRINT1,Secet', 'VRRP', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (37, 0, '', 'SECETI_servizio', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (38, 0, 'Seceti_Management_NC,Seceti_Management_CR,Seceti_Management_Settimo', 'Servizio', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (39, 0, 'Village_wap,Village_www', 'VNC', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (40, 0, 'Village_wap,Village_www', 'Terminal', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (41, 0, 'Village_wap', 'RTSP', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (42, 0, 'Village_www', 'Gateway', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (43, 0, 'Village_smsc-wind', 'Monitor', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (44, 0, '', 'VILLAGE_servizio', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (45, 0, '', 'VILLAGE_servizio_configurazione_ssh', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (46, 0, '', 'VILLAGE_servizio_monitor', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (47, 0, 'firewall', 'SNMP', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (48, 0, '', 'INTERNO_servizio_APPARATI_RETE', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (49, 0, '', 'INTERNO_servizio', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (50, 0, '', 'INTERNO_servizio_SERVENTI', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (51, 0, 'File-srv', 'INTERNO_servizio_SERVENTI_FILESRV', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (52, 0, 'File-srv,NTServ02,NTServ05', 'NetBIOS', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (53, 0, 'Mercurio', 'POP3', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (54, 0, 'Mercurio', 'IMAP', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (55, 0, 'Plutone,Mercurio', 'DNS:', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (56, 0, 'Plutone', 'Controllo', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (57, 0, 'Aldebaran', 'PROXY:', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (58, 0, 'Aldebaran', 'PROXY', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (59, 0, '', 'INTERNO_servizio_SOC', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (60, 0, '', 'INTERNO_servizio_STAMPANTI', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (61, 0, '', 'generic-service', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (62, 0, 'localhost', 'Root', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (63, 0, 'localhost', 'Current', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (64, 0, 'localhost', 'Total', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (65, 0, '', 'PADRE_servizio', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (66, 0, '', 'Echo', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (67, 0, '', 'Hyper', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (68, 0, '', 'Secure', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (69, 0, '', 'CheckPoint', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (70, 0, '', 'Unicenter', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (71, 0, '', 'Virtual', 'state', '20051101220850');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (72, 0, 'Agos_Access_router', 'Ping', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (73, 0, 'Agos_FW_SG_3,Agos_FW_SG_4', 'Stato', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (74, 0, 'Agos_FW_SG_1,Agos_FW_SG_2', 'Stato', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (75, 0, 'BasicNet_FW_FortiGate_60,BasicNet_FW_FortiGate_200', 'SSH', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (76, 0, 'NAAA_FW_NetScr_5GT', 'SSH', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (77, 0, 'NAAA_Web_Server', 'HTTPS', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (78, 0, '', 'Ping', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (79, 0, 'NMS_FW_NetScr_208_1,NMS_FW_NetScr_208_2,NMS_SAP_Router_DMZ,NMS_Reverse_Proxy_DMZ', 'SSH', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (80, 0, 'NMS_Reverse_Proxy_DMZ', 'HTTP', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (81, 0, 'NMS_FW_NetScr_208_1,NMS_FW_NetScr_208_2', 'HTTPS', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (82, 0, 'NMS_Mail_Filter_DMZ', 'Processi', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (83, 0, 'NMS_Antivirus_server_interno', 'Processi', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (84, 0, 'NMS_Reverse_Proxy_DMZ', 'Processi', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (85, 0, 'NMS_SAP_Router_DMZ', 'Processi', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (86, 0, 'NMS_URL_filtering_interno', 'Processi', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (87, 0, 'NMS_SAP_Router_DMZ,NMS_Reverse_Proxy_DMZ', 'Spazio', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (88, 0, 'NMS_Antivirus_server_DMZ,NMS_Antivirus_server_interno,NMS_Mail_Filter_DMZ,NMS_URL_filtering_interno', 'Uptime', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (89, 0, 'NMS_SAP_Router_DMZ,NMS_Reverse_Proxy_DMZ', 'Uptime', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (90, 0, 'NMS_FW_NetScr_208_1,NMS_FW_NetScr_208_2', 'Uptime', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (91, 0, 'NMS_Antivirus_server_DMZ,NMS_Antivirus_server_interno,NMS_Mail_Filter_DMZ,NMS_FW_NetScr_208_1,NMS_FW_NetScr_208_2,NMS_URL_fi', 'Stato', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (92, 0, 'NMS_Antivirus_server_interno,NMS_Antivirus_server_DMZ,NMS_Mail_Filter_DMZ,NMS_URL_filtering_interno', 'Carico', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (93, 0, 'NMS_FW_NetScr_208_1,NMS_FW_NetScr_208_2', 'Carico', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (94, 0, 'NMS_FW_NetScr_208_1', 'Stato', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (95, 0, 'NMS_FW_NetScr_208_2', 'Stato', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (96, 0, 'NMS_FW_NetScr_208_2', 'Valore', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (97, 0, 'NI_Server_Web', 'HTTP', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (98, 0, 'NI_Cluster_StoneGate,NI_Backbone_Netscreen,NI_SiteProtector,NI_PDC,NI_switch_multicast', 'Ping', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (99, 0, 'NI_Backbone_Netscreen', 'SSH', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (100, 0, 'NI_Backbone_Netscreen', 'HTTPS', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (101, 0, 'NI_Server_Mail,NI_Server_Relay-1', 'SMTP', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (102, 0, 'PinInd_FW_Fiat,PinInd_FW_NetScr500,PinInd_FW_Mitsubishi,PinInd_Bairo_Ford,PinInd_FW_Ford,PinInd_FW_Internet,PinInd_Bairo_Mit', 'HTTPS', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (103, 0, 'PinInd_FW_NetScr500', 'SSH', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (104, 0, 'PinInd_FW_Fiat,PinInd_Reverse_Proxy', 'SSH', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (105, 0, 'PinInd_Web_Trends', 'Spazio', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (106, 0, 'PinInd_Web_Trends', 'Processi', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (107, 0, 'PinReD_FW_NetScr_500,PinReD_FW_NetScr_FIAT,PinReD_FW_NetScr5XP_Enx,PinReD_FW_NetScr5XP_Cilea,PinReD_FW_NetScr5XP_OASYS,PinRe', 'HTTPS', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (108, 0, 'PinReD_FW_NetScr_500,PinReD_FW_NetScr_FIAT,PinReD_FW_NetScr5XP_Enx,PinReD_FW_NetScr5XP_Cilea,PinReD_FW_NetScr5XP_OASYS,PinRe', 'SSH', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (109, 0, 'PinInd_FW_Fiat,PinInd_Reverse_Proxy,PinInd_FW_Bull', 'SSH', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (110, 0, 'PinReD_FW_Core,PinReD_FW_FIAT,PinReD_FW_Enx,PinReD_FW_Cilea,PinReD_FW_Oasys,PinReD_FW_China,PinReD_FW_PRG_GR,PinReD_FW_Volvo', 'HTTPS', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (111, 0, 'PinReD_FW_Core,PinReD_FW_FIAT,PinReD_FW_Enx,PinReD_FW_Cilea,PinReD_FW_Oasys,PinReD_FW_China,PinReD_FW_PRG_GR,PinReD_FW_Volvo', 'SSH', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (112, 0, 'PinInd_FW_FIAT,PinInd_FW_Mitsubishi,PinInd_FW_Ford_Bairo,PinInd_FW_Ford,PinInd_FW_Internet,PinInd_FW_Bull_Pregnana,PinInd_FW', 'HTTPS', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (113, 0, 'PinInd_FW_FIAT,PinInd_FW_Mitsubishi,PinInd_FW_Ford_Bairo,PinInd_FW_Ford,PinInd_FW_Internet,PinInd_FW_Bull_Pregnana,PinInd_FW', 'SSH', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (114, 0, 'PinReD_FW_Core,PinReD_FW_FIAT,PinReD_FW_Enx,PinReD_FW_Oasys,PinReD_FW_China,PinReD_FW_Volvo,PinReD_FW_Extra,PinReD_FW_FIAT_F', 'HTTPS', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (115, 0, 'PinReD_FW_Core,PinReD_FW_FIAT,PinReD_FW_Enx,PinReD_FW_Oasys,PinReD_FW_China,PinReD_FW_Volvo,PinReD_FW_Extra,PinReD_FW_FIAT_F', 'SSH', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (116, 0, 'PinInd_FW_NetScr_500_2', 'Trap', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (117, 0, 'PinInd_FW_NetScr_500_1,PinInd_FW_NetScr_500_2', 'Uptime', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (118, 0, 'PinInd_FW_NetScr_500_1,PinInd_FW_NetScr_500_2', 'Stato', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (119, 0, 'PinInd_FW_NetScr_500_1,PinInd_FW_NetScr_500_2', 'Carico', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (120, 0, 'PinInd_FW_NetScr_500_1', 'Stato', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (121, 0, 'PinInd_FW_NetScr_500_2', 'Stato', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (122, 0, 'PinInd_FW_NetScr_500_1', 'Valore', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (123, 0, 'PinInd_FW_NetScr_500_2', 'Valore', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (124, 0, 'PinReD_FW_Core,PinReD_FW_FIAT,PinReD_FW_Oasys,PinReD_FW_Volvo,PinReD_FW_Extra,PinReD_FW_FIAT_Fornitori', 'HTTPS', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (125, 0, 'PinReD_FW_Core,PinReD_FW_FIAT,PinReD_FW_Oasys,PinReD_FW_Volvo,PinReD_FW_Extra,PinReD_FW_FIAT_Fornitori', 'SSH', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (126, 0, 'PinReD_FW_Core', 'Uptime', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (127, 0, 'PinReD_FW_Core', 'Stato', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (128, 0, 'PinReD_FW_Core', 'Carico', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (129, 0, 'Seceti_Acc_Rout_Cliente,Seceti_Acc_Rout_SCC,Seceti_l3sw_nc_int2,Seceti_l3sw_nc_int1,Seceti_l3sw_nc_ext1,Seceti_l3sw_nc_ext2,', 'ICMP', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (130, 0, 'Seceti_FW_NCEXT2,Seceti_FW_NCINT1,Seceti_FW_NCINT2,Seceti_FW_NCEXT1,Seceti_FW_CREXT1,Seceti_FW_CREXT2,Seceti_FW_CRINT1,Secet', 'Stato', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (131, 0, 'Seceti_Web_Trends', 'Spazio', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (132, 0, 'Seceti_Web_Trends', 'Processi', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (133, 0, 'Seceti_Acc_Rout_Cliente,Seceti_Acc_Rout_SCC,Seceti_l3sw_nc_int2,Seceti_l3sw_nc_int1,Seceti_l3sw_nc_ext1,Seceti_l3sw_nc_ext2,', 'Ping', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (134, 0, 'Village_wap,Village_www', 'Spazio', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (135, 0, 'Village_smsc-infotim', 'Monitor', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (136, 0, 'Village_eomer', 'Monitor', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (137, 0, 'firewall', 'ICMP', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (138, 0, 'Gateway_2', 'SNMP', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (139, 0, 'Melipal,NTServ05', 'HTTPS', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (140, 0, 'Melipal,Plutone', 'HTTP', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (141, 0, 'Mercurio,Sirio,Plutone', 'SMTP', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (142, 0, 'Sirio,Mercurio,Aldebaran', 'SSH', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (143, 0, 'Plutone', 'HTTP', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (144, 0, 'Aldebaran', 'HTTP', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (145, 0, 'Sirio', 'HTTP', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (146, 0, 'Mercurio,Plutone,Shaula,Sonda1,Sonda2', 'Spazio', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (147, 0, 'Mercurio,Plutone,Shaula', 'Spazio', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (148, 0, 'Bellatrix,Antares', 'Spazio', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (149, 0, '', 'Spazio', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (150, 0, 'localhost', 'PING', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (151, 0, 'gw', 'PING', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (152, 0, '', 'StoneGate', 'state', '20051101221423');
INSERT INTO `tstm_asset_services` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (153, 0, '', 'RDP', 'state', '20051101221423');

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_asset_software`
--

DROP TABLE IF EXISTS `tstm_asset_software`;
CREATE TABLE `tstm_asset_software` (
  `id` bigint(20) NOT NULL auto_increment,
  `host_id` bigint(20) NOT NULL default '0',
  `host_name` varchar(124) NOT NULL default '',
  `service_name` varchar(124) NOT NULL default '0',
  `state` varchar(60) NOT NULL default '',
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `host_name` (`host_name`,`service_name`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `tstm_asset_software`
--

INSERT INTO `tstm_asset_software` (`id`, `host_id`, `host_name`, `service_name`, `state`, `date_time`) VALUES (1, 1, 'host', '0', '', '20060321104750');

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_asset_tree`
--

DROP TABLE IF EXISTS `tstm_asset_tree`;
CREATE TABLE `tstm_asset_tree` (
  `id` bigint(20) NOT NULL auto_increment,
  `first_host_id` bigint(20) NOT NULL default '0',
  `second_host_id` bigint(20) NOT NULL default '0',
  `first_host_name` varchar(124) NOT NULL default '',
  `second_host_name` varchar(124) NOT NULL default '',
  `state` varchar(60) default 'active',
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=331 ;

--
-- Dump dei dati per la tabella `tstm_asset_tree`
--

INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (1, 0, 0, 'Agos_Access_router', 'Router_verso_Agos', '', '20051101220418');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (2, 0, 0, 'Agos_Access_router', 'Router_verso_Agos', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (3, 0, 0, 'Agos_FW_SG_VRRP_1', 'Agos_Access_router', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (4, 0, 0, 'Agos_FW_SG_VRRP_2', 'Agos_FW_SG_VRRP_1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (5, 0, 0, 'Agos_FW_SG_1', 'Agos_FW_SG_VRRP_1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (6, 0, 0, 'Agos_FW_SG_2', 'Agos_FW_SG_VRRP_1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (7, 0, 0, 'Agos_FW_SG_3', 'Agos_FW_SG_VRRP_2', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (8, 0, 0, 'Agos_FW_SG_4', 'Agos_FW_SG_VRRP_2', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (9, 0, 0, 'Agos_Management_SG', 'Agos_FW_SG_VRRP_1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (10, 0, 0, 'Agos_IPS_Sensore_1', 'Agos_FW_SG_VRRP_1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (11, 0, 0, 'Agos_IPS_Sensore_2', 'Agos_FW_SG_VRRP_1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (12, 0, 0, 'Agos_IPS_Sensore_3', 'Agos_FW_SG_VRRP_1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (13, 0, 0, 'Agos_IPS_Sensore_4', 'Agos_FW_SG_VRRP_1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (14, 0, 0, 'Agos_IPS_Analizer', 'Agos_FW_SG_VRRP_1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (15, 0, 0, 'Agos_www.agositafinco.it', 'Agos_FW_SG_VRRP_1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (16, 0, 0, 'BasicNet_FW_FortiGate_60', 'Router_HDSL_Colt', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (17, 0, 0, 'BasicNet_FW_FortiGate_200', 'BasicNet_FW_FortiGate_60', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (18, 0, 0, 'BasicNet_Cisco_3640', 'BasicNet_FW_FortiGate_200', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (19, 0, 0, 'BasicNet_FW_FortiGate_60', 'Router_HDSL_Colt', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (20, 0, 0, 'BasicNet_FW_FortiGate_200', 'BasicNet_FW_FortiGate_60', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (21, 0, 0, 'BasicNet_Cisco_3640', 'BasicNet_FW_FortiGate_200', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (22, 0, 0, 'Iss_XPU', 'Router_HDSL_Colt', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (23, 0, 0, 'Iss_XPU', 'Router_HDSL_Colt', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (24, 0, 0, 'Lloyd_Management_SP', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (25, 0, 0, 'Lloyd_Management_SP', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (26, 0, 0, 'Lss_Acc_Rout_SCC', 'switch_3', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (27, 0, 0, 'Lss_Acc_Rout_Cliente', 'Lss_Acc_Rout_SCC', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (28, 0, 0, 'Lss_Acc_Rout_SCC', 'switch_3', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (29, 0, 0, 'Lss_Acc_Rout_Cliente', 'Lss_Acc_Rout_SCC', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (30, 0, 0, 'NAAA_FW_NetScr_5GT', 'Router_HDSL_Colt', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (31, 0, 0, 'NAAA_Web_Server', 'NAAA_FW_NetScr_5GT', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (32, 0, 0, 'NAAA_FW_NetScr_5GT', 'Router_HDSL_Colt', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (33, 0, 0, 'NAAA_Web_Server', 'NAAA_FW_NetScr_5GT', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (34, 0, 0, 'NMS_Router_Albacom_HA', 'Router_HDSL_Colt', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (35, 0, 0, 'NMS_Router_Albacom_1', 'NMS_Router_Albacom_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (36, 0, 0, 'NMS_Router_Albacom_2', 'NMS_Router_Albacom_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (37, 0, 0, 'NMS_FW_NetScr_208_HA', 'NMS_Router_Albacom_1,NMS_Router_Albacom_2', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (38, 0, 0, 'NMS_FW_NetScr_208_1', 'NMS_FW_NetScr_208_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (39, 0, 0, 'NMS_FW_NetScr_208_2', 'NMS_FW_NetScr_208_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (40, 0, 0, 'NMS_Antivirus_server_interno', 'NMS_FW_NetScr_208_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (41, 0, 0, 'NMS_Antivirus_server_DMZ', 'NMS_FW_NetScr_208_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (42, 0, 0, 'NMS_Mail_Filter_DMZ', 'NMS_FW_NetScr_208_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (43, 0, 0, 'NMS_URL_filtering_interno', 'NMS_FW_NetScr_208_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (44, 0, 0, 'NMS_Reverse_Proxy_DMZ', 'NMS_FW_NetScr_208_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (45, 0, 0, 'NMS_SAP_Router_DMZ', 'NMS_FW_NetScr_208_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (46, 0, 0, 'NI_Server_Web', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (47, 0, 0, 'NI_Server_Mail', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (48, 0, 0, 'NI_Server_Mail_Relay1', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (49, 0, 0, 'NI_Cluster_StoneGate', 'NI_Backbone_Netscreen', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (50, 0, 0, 'NI_Backbone_Netscreen', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (51, 0, 0, 'NI_SiteProtector', 'NI_Cluster_StoneGate', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (52, 0, 0, 'NI_PDC', 'NI_Cluster_StoneGate', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (53, 0, 0, 'NI_switch_multicast', 'NI_Cluster_StoneGate', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (54, 0, 0, 'NI_Server_Web', 'NI_Backbone_Netscreen', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (55, 0, 0, 'NI_Server_Mail', 'NI_Backbone_Netscreen', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (56, 0, 0, 'NI_Server_Relay-1', 'NI_Backbone_Netscreen', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (57, 0, 0, 'PinInd_Access_router', 'router_pininfarina', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (58, 0, 0, 'PinInd_FW_NetScr500', 'PinInd_Access_router', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (59, 0, 0, 'PinInd_FW_Mitsubishi', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (60, 0, 0, 'PinInd_FW_Fiat', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (61, 0, 0, 'PinInd_Proxy', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (62, 0, 0, 'PinInd_FW_Internet', 'PinInd_Proxy', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (63, 0, 0, 'PinInd_GW_Internet', 'PinInd_FW_Internet', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (64, 0, 0, 'PinInd_Web_Trends', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (65, 0, 0, 'PinInd_FW_Ford', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (66, 0, 0, 'PinInd_Router_Gru_verso_Bairo', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (67, 0, 0, 'PinInd_Bairo_Router', 'PinInd_Router_Gru_verso_Bairo', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (68, 0, 0, 'PinInd_Bairo_Core', 'PinInd_Bairo_Router', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (69, 0, 0, 'PinInd_Bairo_Ford', 'PinInd_Bairo_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (70, 0, 0, 'PinInd_Reverse_Proxy', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (71, 0, 0, 'PinInd_Bairo_Mitsubishi', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (72, 0, 0, 'PinReD_Router_Gru_verso_Camb', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (73, 0, 0, 'PinReD_Router_Cambiano', 'PinReD_Router_Gru_verso_Camb', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (74, 0, 0, 'PinReD_FW_NetScr_500', 'PinReD_Router_Cambiano', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (75, 0, 0, 'PinReD_FW_NetScr_FIAT', 'PinReD_Router_Cambiano', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (76, 0, 0, 'PinReD_FW_NetScr5XP_Enx', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (77, 0, 0, 'PinReD_FW_NetScr5XP_Cilea', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (78, 0, 0, 'PinReD_FW_NetScr5XP_OASYS', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (79, 0, 0, 'PinReD_FW_NetScr5XP_China', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (80, 0, 0, 'PinReD_Attrav_Cilea', 'PinReD_FW_NetScr5XP_Cilea', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (81, 0, 0, 'PinReD_FW_NetScr_PRG', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (82, 0, 0, 'PinReD_Attrav_NetScr_PRG', 'PinReD_FW_NetScr_PRG', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (83, 0, 0, 'PinReD_Attrav_NetScr_Enx', 'PinReD_FW_NetScr5XP_Enx', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (84, 0, 0, 'PinReD_Attrav_PRG_HF3', 'PinReD_FW_PRG_HF3', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (85, 0, 0, 'PinReD_Proxy_Internet', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (86, 0, 0, 'PinReD_FW_Volvo', 'PinReD_Router_Cambiano', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (87, 0, 0, 'PinReD_Attrav_Volvo', 'PinReD_FW_Volvo', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (88, 0, 0, 'PinReD_FW_Extra', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (89, 0, 0, 'PinReD_FW_PRG_HF3', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (90, 0, 0, 'PinReD_FW_NetScr_PSA', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (91, 0, 0, 'PinReD_Attrav_NetScr_PSA', 'PinReD_FW_NetScr_PSA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (92, 0, 0, 'PinReD_booo', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (93, 0, 0, 'PinInd_Access_router', 'router_pininfarina', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (94, 0, 0, 'PinInd_FW_NetScr500', 'PinInd_Access_router', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (95, 0, 0, 'PinInd_FW_Mitsubishi', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (96, 0, 0, 'PinInd_FW_Fiat', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (97, 0, 0, 'PinInd_Proxy', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (98, 0, 0, 'PinInd_FW_Internet', 'PinInd_Proxy', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (99, 0, 0, 'PinInd_GW_Internet', 'PinInd_FW_Internet', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (100, 0, 0, 'PinInd_Web_Trends', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (101, 0, 0, 'PinInd_FW_Ford', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (102, 0, 0, 'PinInd_FW_Bull', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (103, 0, 0, 'PinInd_Router_Gru_verso_Bairo', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (104, 0, 0, 'PinInd_Bairo_Router', 'PinInd_Router_Gru_verso_Bairo', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (105, 0, 0, 'PinInd_Bairo_Core', 'PinInd_Bairo_Router', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (106, 0, 0, 'PinInd_Bairo_Ford', 'PinInd_Bairo_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (107, 0, 0, 'PinInd_Reverse_Proxy', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (108, 0, 0, 'PinInd_Bairo_Mitsubishi', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (109, 0, 0, 'PinReD_Router_Gru_verso_Camb', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (110, 0, 0, 'PinReD_Router_Cambiano', 'PinReD_Router_Gru_verso_Camb', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (111, 0, 0, 'PinReD_FW_NetScr_500', 'PinReD_Router_Cambiano', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (112, 0, 0, 'PinReD_FW_NetScr_FIAT', 'PinReD_Router_Cambiano', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (113, 0, 0, 'PinReD_FW_NetScr5XP_Enx', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (114, 0, 0, 'PinReD_FW_NetScr5XP_Cilea', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (115, 0, 0, 'PinReD_FW_NetScr5XP_OASYS', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (116, 0, 0, 'PinReD_FW_NetScr5XP_China', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (117, 0, 0, 'PinReD_Attrav_Cilea', 'PinReD_FW_NetScr5XP_Cilea', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (118, 0, 0, 'PinReD_FW_NetScr_PRG', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (119, 0, 0, 'PinReD_Attrav_NetScr_PRG', 'PinReD_FW_NetScr_PRG', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (120, 0, 0, 'PinReD_Attrav_NetScr_Enx', 'PinReD_FW_NetScr5XP_Enx', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (121, 0, 0, 'PinReD_Attrav_PRG_HF3', 'PinReD_FW_PRG_HF3', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (122, 0, 0, 'PinReD_Proxy_Internet', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (123, 0, 0, 'PinReD_FW_Volvo', 'PinReD_Router_Cambiano', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (124, 0, 0, 'PinReD_Attrav_Volvo', 'PinReD_FW_Volvo', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (125, 0, 0, 'PinReD_FW_Extra', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (126, 0, 0, 'PinReD_FW_PRG_HF3', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (127, 0, 0, 'PinReD_FW_NetScr_PSA', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (128, 0, 0, 'PinReD_Attrav_NetScr_PSA', 'PinReD_FW_NetScr_PSA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (129, 0, 0, 'PinReD_booo', 'PinReD_FW_NetScr_500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (130, 0, 0, 'PinReD_FW_China', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (131, 0, 0, 'PinReD_FW_Cilea', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (132, 0, 0, 'PinReD_FW_Core', 'PinReD_Router_Cambiano', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (133, 0, 0, 'PinReD_FW_Enx', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (134, 0, 0, 'PinReD_FW_FIAT', 'PinReD_Router_Cambiano', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (135, 0, 0, 'PinReD_FW_PSA', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (136, 0, 0, 'PinReD_FW_Oasys', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (137, 0, 0, 'PinReD_FW_PRG_GR', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (138, 0, 0, 'PinReD_FW_PRG_HF3', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (139, 0, 0, 'PinReD_FW_Volvo', 'PinReD_Router_Cambiano', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (140, 0, 0, 'PinReD_FW_Extra', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (141, 0, 0, 'PinReD_Router_Gru_verso_Camb', 'PinInd_FW_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (142, 0, 0, 'PinReD_Router_Cambiano', 'PinReD_Router_Gru_verso_Camb', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (143, 0, 0, 'PinReD_Attrav_Cilea', 'PinReD_FW_Cilea', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (144, 0, 0, 'PinReD_Attrav_PRG', 'PinReD_FW_PRG_GR', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (145, 0, 0, 'PinReD_Attrav_Enx', 'PinReD_FW_Enx', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (146, 0, 0, 'PinReD_Attrav_PRG_HF3', 'PinReD_FW_PRG_HF3', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (147, 0, 0, 'PinReD_Proxy_Internet', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (148, 0, 0, 'PinReD_Attrav_Volvo', 'PinReD_FW_Volvo', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (149, 0, 0, 'PinReD_Attrav_PSA', 'PinReD_FW_PSA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (150, 0, 0, 'PinInd_FW_NetScr500_ext', 'PinInd_Router_Accesso', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (151, 0, 0, 'PinInd_FW_Cluster1_NetScr500', 'PinInd_FW_NetScr500_ext', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (152, 0, 0, 'PinInd_FW_Cluster2_NetScr500', 'PinInd_FW_NetScr500_ext', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (153, 0, 0, 'PinInd_FW_NetScr500_int', 'PinInd_FW_Cluster1_NetScr500,PinInd_FW_Cluster2_NetScr500', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (154, 0, 0, 'PinInd_FW_Mitsubishi', 'PinInd_FW_NetScr500_int', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (155, 0, 0, 'PinInd_FW_FIAT', 'PinInd_FW_NetScr500_int', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (156, 0, 0, 'PinInd_FW_Internet', 'PinInd_Proxy', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (157, 0, 0, 'PinInd_FW_Ford', 'PinInd_FW_NetScr500_int', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (158, 0, 0, 'PinInd_FW_Bull', 'PinInd_FW_NetScr500_int', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (159, 0, 0, 'PinInd_FW_Bull_Pregnana', 'PinInd_FW_NetScr500_int', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (160, 0, 0, 'PinInd_FW_Ford_Bairo', 'PinInd_Router_Bairo', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (161, 0, 0, 'PinInd_FW_Mitsubishi_Bairo', 'PinInd_FW_NetScr500_int', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (162, 0, 0, 'PinInd_Router_Accesso', 'router_pininfarina', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (163, 0, 0, 'PinInd_GW_Internet', 'PinInd_FW_Internet', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (164, 0, 0, 'PinInd_Router_Gru_verso_Bairo', 'PinInd_FW_NetScr500_int', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (165, 0, 0, 'PinInd_Router_Bairo', 'PinInd_Router_Gru_verso_Bairo', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (166, 0, 0, 'PinInd_Switch_Bairo', 'PinInd_Router_Bairo', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (167, 0, 0, 'PinInd_Proxy', 'PinInd_FW_NetScr500_int', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (168, 0, 0, 'PinInd_Web_Trends', 'PinInd_FW_NetScr500_int', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (169, 0, 0, 'PinInd_Reverse_Proxy', 'PinInd_FW_NetScr500_int', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (170, 0, 0, 'PinReD_FW_China', 'PinReD_FW_Enx', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (171, 0, 0, 'PinReD_FW_Core', 'PinReD_Router_Cambiano', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (172, 0, 0, 'PinReD_FW_Enx', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (173, 0, 0, 'PinReD_FW_FIAT', 'PinReD_Router_Cambiano', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (174, 0, 0, 'PinReD_FW_PSA', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (175, 0, 0, 'PinReD_FW_Oasys', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (176, 0, 0, 'PinReD_FW_FIAT_Fornitori', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (177, 0, 0, 'PinReD_FW_Volvo', 'PinReD_Router_Cambiano', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (178, 0, 0, 'PinReD_FW_Extra', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (179, 0, 0, 'PinReD_Router_Gru_verso_Camb', 'PinInd_FW_NetScr500_int', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (180, 0, 0, 'PinReD_Router_Cambiano', 'PinReD_Router_Gru_verso_Camb', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (181, 0, 0, 'PinReD_Attrav_Enx', 'PinReD_FW_Enx', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (182, 0, 0, 'PinReD_Proxy_Internet', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (183, 0, 0, 'PinReD_Attrav_Volvo', 'PinReD_FW_Volvo', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (184, 0, 0, 'PinReD_Attrav_PSA', 'PinReD_FW_PSA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (185, 0, 0, 'PinInd_FW_NetScr_500_HA', 'PinInd_Router_Accesso', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (186, 0, 0, 'PinInd_FW_NetScr_500_1', 'PinInd_FW_NetScr_500_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (187, 0, 0, 'PinInd_FW_NetScr_500_2', 'PinInd_FW_NetScr_500_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (188, 0, 0, 'PinInd_FW_Mitsubishi', 'PinInd_FW_NetScr_500_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (189, 0, 0, 'PinInd_FW_FIAT', 'PinInd_FW_NetScr_500_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (190, 0, 0, 'PinInd_FW_Internet', 'PinInd_Proxy', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (191, 0, 0, 'PinInd_FW_Ford', 'PinInd_FW_NetScr_500_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (192, 0, 0, 'PinInd_FW_Bull', 'PinInd_FW_NetScr_500_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (193, 0, 0, 'PinInd_FW_Bull_Pregnana', 'PinInd_FW_NetScr_500_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (194, 0, 0, 'PinInd_FW_Ford_Bairo', 'PinInd_Router_Bairo', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (195, 0, 0, 'PinInd_FW_Mitsubishi_Bairo', 'PinInd_FW_NetScr_500_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (196, 0, 0, 'PinInd_Router_Accesso', 'Router_verso_Pininfarina', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (197, 0, 0, 'PinInd_GW_Internet', 'PinInd_FW_Internet', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (198, 0, 0, 'PinInd_Router_Gru_verso_Bairo', 'PinInd_FW_NetScr_500_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (199, 0, 0, 'PinInd_Router_Bairo', 'PinInd_Router_Gru_verso_Bairo', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (200, 0, 0, 'PinInd_Switch_Bairo', 'PinInd_Router_Bairo', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (201, 0, 0, 'PinInd_Proxy', 'PinInd_FW_NetScr_500_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (202, 0, 0, 'PinInd_Web_Trends', 'PinInd_FW_NetScr_500_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (203, 0, 0, 'PinInd_Reverse_Proxy', 'PinInd_FW_NetScr_500_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (204, 0, 0, 'PinReD_FW_Core', 'PinReD_Router_Cambiano', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (205, 0, 0, 'PinReD_FW_FIAT', 'PinReD_Router_Cambiano', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (206, 0, 0, 'PinReD_FW_PSA', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (207, 0, 0, 'PinReD_FW_Oasys', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (208, 0, 0, 'PinReD_FW_FIAT_Fornitori', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (209, 0, 0, 'PinReD_FW_Volvo', 'PinReD_Router_Cambiano', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (210, 0, 0, 'PinReD_FW_Extra', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (211, 0, 0, 'PinReD_Router_Gru_verso_Camb', 'PinInd_FW_NetScr_500_HA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (212, 0, 0, 'PinReD_Router_Cambiano', 'PinReD_Router_Gru_verso_Camb', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (213, 0, 0, 'PinReD_Router_Cambiano_Backup', 'PinReD_Router_Gru_verso_Camb', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (214, 0, 0, 'PinReD_Proxy_Internet', 'PinReD_FW_Core', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (215, 0, 0, 'PinReD_Attrav_Volvo', 'PinReD_FW_Volvo', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (216, 0, 0, 'PinReD_Attrav_PSA', 'PinReD_FW_PSA', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (217, 0, 0, 'Seceti_Acc_Rout_SCC', 'switch_3', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (218, 0, 0, 'Seceti_Acc_Rout_Cliente', 'Seceti_Acc_Rout_SCC', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (219, 0, 0, 'Seceti_FW_NCEXT1', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (220, 0, 0, 'Seceti_FW_NCEXT2', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (221, 0, 0, 'Seceti_FW_NCINT1', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (222, 0, 0, 'Seceti_FW_NCINT2', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (223, 0, 0, 'Seceti_FW_CREXT1', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (224, 0, 0, 'Seceti_FW_CREXT2', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (225, 0, 0, 'Seceti_FW_CRINT1', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (226, 0, 0, 'Seceti_FW_CRINT2', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (227, 0, 0, 'Seceti_l3sw_nc_int1', 'Seceti_FW_NCINT1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (228, 0, 0, 'Seceti_l3sw_nc_int2', 'Seceti_FW_NCINT2', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (229, 0, 0, 'Seceti_l3sw_nc_ext1', 'Seceti_FW_NCEXT1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (230, 0, 0, 'Seceti_l3sw_nc_ext2', 'Seceti_FW_NCEXT2', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (231, 0, 0, 'Seceti_l3sw_cr_int1', 'Seceti_FW_CRINT1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (232, 0, 0, 'Seceti_l3sw_cr_int2', 'Seceti_FW_CRINT2', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (233, 0, 0, 'Seceti_l3sw_cr_ext1', 'Seceti_FW_CREXT1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (234, 0, 0, 'Seceti_l3sw_cr_ext2', 'Seceti_FW_CREXT2', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (235, 0, 0, 'Seceti_Web_Trends', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (236, 0, 0, 'Seceti_Acc_Rout_SCC', 'switch_3', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (237, 0, 0, 'Seceti_Acc_Rout_Cliente', 'Seceti_Acc_Rout_SCC', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (238, 0, 0, 'Seceti_FW_Settimo_EXT_1', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (239, 0, 0, 'Seceti_FW_Settimo_EXT_2', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (240, 0, 0, 'Seceti_FW_NCEXT1', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (241, 0, 0, 'Seceti_FW_NCEXT2', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (242, 0, 0, 'Seceti_FW_NCINT1', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (243, 0, 0, 'Seceti_FW_NCINT2', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (244, 0, 0, 'Seceti_FW_CREXT1', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (245, 0, 0, 'Seceti_FW_CREXT2', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (246, 0, 0, 'Seceti_FW_CRINT1', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (247, 0, 0, 'Seceti_FW_CRINT2', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (248, 0, 0, 'Seceti_l3sw_Settimo_DMZ_1', 'Seceti_FW_Settimo_EXT_1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (249, 0, 0, 'Seceti_l3sw_Settimo_DMZ_2', 'Seceti_FW_Settimo_EXT_2', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (250, 0, 0, 'Seceti_l3sw_Settimo_BEND_1', 'Seceti_FW_Settimo_EXT_1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (251, 0, 0, 'Seceti_l3sw_Settimo_BEND_2', 'Seceti_FW_Settimo_EXT_2', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (252, 0, 0, 'Seceti_l3sw_nc_int1', 'Seceti_FW_NCINT1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (253, 0, 0, 'Seceti_l3sw_nc_int2', 'Seceti_FW_NCINT2', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (254, 0, 0, 'Seceti_l3sw_nc_ext1', 'Seceti_FW_NCEXT1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (255, 0, 0, 'Seceti_l3sw_nc_ext2', 'Seceti_FW_NCEXT2', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (256, 0, 0, 'Seceti_l3sw_cr_int1', 'Seceti_FW_CRINT1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (257, 0, 0, 'Seceti_l3sw_cr_int2', 'Seceti_FW_CRINT2', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (258, 0, 0, 'Seceti_l3sw_cr_ext1', 'Seceti_FW_CREXT1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (259, 0, 0, 'Seceti_l3sw_cr_ext2', 'Seceti_FW_CREXT2', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (260, 0, 0, 'Seceti_Web_Trends', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (261, 0, 0, 'Seceti_Management_NC', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (262, 0, 0, 'Seceti_Management_CR', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (263, 0, 0, 'Seceti_Management_Settimo', 'Seceti_Acc_Rout_Cliente', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (264, 0, 0, 'Village_www', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (265, 0, 0, 'Village_smsc-wind', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (266, 0, 0, 'Village_wap', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (267, 0, 0, 'Village_eomer', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (268, 0, 0, 'Village_smsc-infotim', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (269, 0, 0, 'Village_www', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (270, 0, 0, 'Village_smsc-wind', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (271, 0, 0, 'Village_wap', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (272, 0, 0, 'Village_eomer', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (273, 0, 0, 'Village_smsc-infotim', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (274, 0, 0, 'Village_www', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (275, 0, 0, 'Village_smsc-wind', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (276, 0, 0, 'Village_wap', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (277, 0, 0, 'Village_eomer', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (278, 0, 0, 'Village_smsc-infotim', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (279, 0, 0, 'gw', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (280, 0, 0, 'switch_1', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (281, 0, 0, 'switch_3', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (282, 0, 0, 'switch_4', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (283, 0, 0, 'switch_2', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (284, 0, 0, 'hub01', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (285, 0, 0, 'hub02', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (286, 0, 0, 'hub03', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (287, 0, 0, 'firewall', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (288, 0, 0, 'IDS', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (289, 0, 0, 'Gateway_2', 'hub02', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (290, 0, 0, 'Router_HDSL_Colt', 'Gateway_2', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (291, 0, 0, 'Router_verso_Agos', 'switch_3', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (292, 0, 0, 'Router_verso_LSS', 'switch_3', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (293, 0, 0, 'Router_verso_Pininfarina', 'switch_3', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (294, 0, 0, 'Router_Noicom', 'Router_HDSL_Colt', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (295, 0, 0, 'Aldebaran', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (296, 0, 0, 'Shaula', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (297, 0, 0, 'Bellatrix', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (298, 0, 0, 'Antares', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (299, 0, 0, 'Sirio', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (300, 0, 0, 'NTServ02', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (301, 0, 0, 'NTServ05', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (302, 0, 0, 'Serv2000', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (303, 0, 0, 'Mercurio', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (304, 0, 0, 'File-srv', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (305, 0, 0, 'Melipal', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (306, 0, 0, 'Plutone', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (307, 0, 0, 'Sonda1', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (308, 0, 0, 'Sonda2', 'firewall', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (309, 0, 0, 'Router_Albacom_Sonda_1', 'Sonda1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (310, 0, 0, 'Router_Albacom_Sonda_2', 'Sonda2', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (311, 0, 0, 'scc-soc-1', 'switch_1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (312, 0, 0, 'scc-soc-2', 'switch_1', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (313, 0, 0, 'scc-prn-ope-1', 'switch_2', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (314, 0, 0, 'print-fiery', 'switch_3', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (315, 0, 0, 'techdirectprint', 'switch_3', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (316, 0, 0, 'scc-prn-soc-1', 'switch_2', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (317, 0, 0, 'gw', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (318, 0, 0, 'gw', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (319, 0, 0, 'gw', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (320, 0, 0, 'gw', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (321, 0, 0, 'gw', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (322, 0, 0, 'gw', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (323, 0, 0, 'gw', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (324, 0, 0, 'gw', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (325, 0, 0, 'gw', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (326, 0, 0, 'gw', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (327, 0, 0, 'gw', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (328, 0, 0, 'gw', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (329, 0, 0, 'localhost', '', '', '20051101221423');
INSERT INTO `tstm_asset_tree` (`id`, `first_host_id`, `second_host_id`, `first_host_name`, `second_host_name`, `state`, `date_time`) VALUES (330, 0, 0, 'localhost', '', '', '20051101221423');

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_asset_user`
--

DROP TABLE IF EXISTS `tstm_asset_user`;
CREATE TABLE `tstm_asset_user` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_email` varchar(124) NOT NULL default '0',
  `host_id` bigint(20) NOT NULL default '0',
  `host_ip` varchar(60) NOT NULL default '',
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_id` (`user_email`,`host_id`)
) TYPE=MyISAM COMMENT='Tabella del rapporto host e utente' AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `tstm_asset_user`
--

INSERT INTO `tstm_asset_user` (`id`, `user_email`, `host_id`, `host_ip`, `date_time`) VALUES (1, 'admin@localhost', 1, '127.0.0.1', '20060112143931');

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_message`
--

DROP TABLE IF EXISTS `tstm_message`;
CREATE TABLE `tstm_message` (
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
  `repeat_end` timestamp(14) NOT NULL,
  `begin_time` timestamp(14) NOT NULL default '00000000000000',
  `end_time` timestamp(14) NOT NULL default '00000000000000',
  `intervale` varchar(64) default '1',
  `priority` int(11) NOT NULL default '0',
  `type` enum('text','html','php','email','normal','news','work','java_script','NULL') NOT NULL default 'text',
  `state` enum('active','disactivated','NULL') NOT NULL default 'active',
  `comment` text NOT NULL,
  `date_time` timestamp(14) NOT NULL default '00000000000000',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=30 ;

--
-- Dump dei dati per la tabella `tstm_message`
--

INSERT INTO `tstm_message` (`id`, `sender`, `title`, `model_id`, `model_title`, `lang`, `text`, `groups_dest`, `users_dest`, `modules_dest`, `ripetitive`, `repeat_end`, `begin_time`, `end_time`, `intervale`, `priority`, `type`, `state`, `comment`, `date_time`) VALUES (21, 'noc', 'bonjour', '', '', '', '<font face="impact,chicago" size="3" color="#cc0066"><strong><u><em>bonjour mon amie</em></u></strong></font>', 'admin', 'admin@localhost', 'search.php', 1, '20060422080436', '20060322080436', '20060522080436', '1 DAY', 0, 'text', 'disactivated', '', '20060425095947');
INSERT INTO `tstm_message` (`id`, `sender`, `title`, `model_id`, `model_title`, `lang`, `text`, `groups_dest`, `users_dest`, `modules_dest`, `ripetitive`, `repeat_end`, `begin_time`, `end_time`, `intervale`, `priority`, `type`, `state`, `comment`, `date_time`) VALUES (20, 'noc', 'Go to work', '', '', '', 'We have to go', 'admin', 'noc@sg.it', '', 1, '20060426084145', '20060421060420', '20060421075020', '1 DAY', 1, 'text', 'active', '', '20060421064150');
INSERT INTO `tstm_message` (`id`, `sender`, `title`, `model_id`, `model_title`, `lang`, `text`, `groups_dest`, `users_dest`, `modules_dest`, `ripetitive`, `repeat_end`, `begin_time`, `end_time`, `intervale`, `priority`, `type`, `state`, `comment`, `date_time`) VALUES (19, 'noc', 'test', '', '', '', 'echo date(''Y-m-d H:i:s'');', 'admin', 'soc@localhost', 'search.php,page_header.php,left_menu.php, view_pending_ticket.php,faq.php', 1, '20060424095621', '20060321030448', '20060621030448', '1 DAY', 0, 'php', 'disactivated', '', '20060425100121');
INSERT INTO `tstm_message` (`id`, `sender`, `title`, `model_id`, `model_title`, `lang`, `text`, `groups_dest`, `users_dest`, `modules_dest`, `ripetitive`, `repeat_end`, `begin_time`, `end_time`, `intervale`, `priority`, `type`, `state`, `comment`, `date_time`) VALUES (22, 'noc', 'time', '', '', '', 'echo ''Data Ora: ''.date(''Y-m-d H:i:s'');', 'admin', 'soc@localhost', 'page_header.php, search.php, new_ticket.php', 1, '20080424113230', '20060611181200', '20060611181400', '1 MINUTE', 0, 'php', 'disactivated', '', '20060425100048');
INSERT INTO `tstm_message` (`id`, `sender`, `title`, `model_id`, `model_title`, `lang`, `text`, `groups_dest`, `users_dest`, `modules_dest`, `ripetitive`, `repeat_end`, `begin_time`, `end_time`, `intervale`, `priority`, `type`, `state`, `comment`, `date_time`) VALUES (23, 'noc', 'menu', '', '', '', '<script language="Javascript1.1" type="text/javascript">\r\n<!--\r\nvar tz_rnd = Math.random();\r\nvar tz_redirector_00006622 = "";\r\nvar tz_vc_00006622 = "";\r\nvar tz_force_00006622=-1;\r\nvar tz_pv_00006622 = "";\r\nvar tz_bit1 = "<scr";var tz_bit2 = "</";\r\nvar tz_tag = tz_bit1 + ''ipt language="javascript1.1" type="text/javascript" '';\r\ntz_tag += ''src="http://ad.uk.tangozebra.com/a/aj/s/6622/8422;'' + tz_rnd + ''?ad_manzoni_repubblica_cuoco.js'';\r\ntz_tag += ''">'' + tz_bit2 + ''script>'';\r\ndocument.write(tz_tag);\r\n//-->\r\n</script>\r\n', 'admin', 'noc@sg.it', 'head_menu.php', 1, '20100426084128', '20060811060933', '20060811060959', '5 MINUTE', 0, 'text', 'active', '', '20060426134832');
INSERT INTO `tstm_message` (`id`, `sender`, `title`, `model_id`, `model_title`, `lang`, `text`, `groups_dest`, `users_dest`, `modules_dest`, `ripetitive`, `repeat_end`, `begin_time`, `end_time`, `intervale`, `priority`, `type`, `state`, `comment`, `date_time`) VALUES (29, 'noc', '', '', '', '', '<table class="ex" border="1" cellspacing="0" width="100%">\r\n<tbody><tr>\r\n<th align="left" width="25%">Color Name</th>\r\n<th align="left" width="25%">Color HEX</th>\r\n<th align="left" width="50%">Color</th>\r\n</tr>\r\n\r\n<tr>\r\n\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=AliceBlue">AliceBlue</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=F0F8FF">#F0F8FF</a></td>\r\n<td bgcolor="#f0f8ff">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=AntiqueWhite">AntiqueWhite</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=FAEBD7">#FAEBD7</a></td>\r\n<td bgcolor="#faebd7">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=Aqua">Aqua</a>&nbsp;</td>\r\n\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=00FFFF">#00FFFF</a></td>\r\n<td bgcolor="#00ffff">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=Aquamarine">Aquamarine</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=7FFFD4">#7FFFD4</a></td>\r\n<td bgcolor="#7fffd4">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=Azure">Azure</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=F0FFFF">#F0FFFF</a></td>\r\n\r\n<td bgcolor="#f0ffff">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=Beige">Beige</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=F5F5DC">#F5F5DC</a></td>\r\n<td bgcolor="#f5f5dc">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=Bisque">Bisque</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=FFE4C4">#FFE4C4</a></td>\r\n<td bgcolor="#ffe4c4">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=Black">Black</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=000000">#000000</a></td>\r\n<td bgcolor="#000000">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=BlanchedAlmond">BlanchedAlmond</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=FFEBCD">#FFEBCD</a></td>\r\n<td bgcolor="#ffebcd">&nbsp;</td></tr>\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=Blue">Blue</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=0000FF">#0000FF</a></td>\r\n<td bgcolor="#0000ff">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=BlueViolet">BlueViolet</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=8A2BE2">#8A2BE2</a></td>\r\n<td bgcolor="#8a2be2">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=Brown">Brown</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=A52A2A">#A52A2A</a></td>\r\n<td bgcolor="#a52a2a">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=BurlyWood">BurlyWood</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=DEB887">#DEB887</a></td>\r\n<td bgcolor="#deb887">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.a











sp?color=CadetBlue">CadetBlue</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=5F9EA0">#5F9EA0</a></td>\r\n<td bgcolor="#5f9ea0">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=Chartreuse">Chartreuse</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=7FFF00">#7FFF00</a></td>\r\n<td bgcolor="#7fff00">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=Chocolate">Chocolate</a>&nbsp;</td>\r\n\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=D2691E">#D2691E</a></td>\r\n<td bgcolor="#d2691e">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=Coral">Coral</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=FF7F50">#FF7F50</a></td>\r\n<td bgcolor="#ff7f50">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=CornflowerBlue">CornflowerBlue</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=6495ED">#6495ED</a></td>\r\n\r\n<td bgcolor="#6495ed">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=Cornsilk">Cornsilk</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=FFF8DC">#FFF8DC</a></td>\r\n<td bgcolor="#fff8dc">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=Crimson">Crimson</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=DC143C">#DC143C</a></td>\r\n<td bgcolor="#dc143c">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=Cyan">Cyan</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=00FFFF">#00FFFF</a></td>\r\n<td bgcolor="#00ffff">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=DarkBlue">DarkBlue</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=00008B">#00008B</a></td>\r\n<td bgcolor="#00008b">&nbsp;</td></tr>\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=DarkCyan">DarkCyan</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=008B8B">#008B8B</a></td>\r\n<td bgcolor="#008b8b">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=DarkGoldenRod">DarkGoldenRod</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=B8860B">#B8860B</a></td>\r\n<td bgcolor="#b8860b">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=DarkGray">DarkGray</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=A9A9A9">#A9A9A9</a></td>\r\n<td bgcolor="#a9a9a9">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=DarkGreen">DarkGreen</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=006400">#006400</a></td>\r\n<td bgcolor="#006400">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=DarkKhaki">DarkKhaki</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=BDB76B">#BDB76B</a></td>\r\n<td bgcolor="#bdb76b">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=DarkMagenta">DarkMagenta</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=8B008B">#8B008B</a></td>\r\n<td bgcolor="#8b008b">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=DarkOliveGreen">Dar











kOliveGreen</a>&nbsp;</td>\r\n\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=556B2F">#556B2F</a></td>\r\n<td bgcolor="#556b2f">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=Darkorange">Darkorange</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=FF8C00">#FF8C00</a></td>\r\n<td bgcolor="#ff8c00">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=DarkOrchid">DarkOrchid</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=9932CC">#9932CC</a></td>\r\n\r\n<td bgcolor="#9932cc">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=DarkRed">DarkRed</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=8B0000">#8B0000</a></td>\r\n<td bgcolor="#8b0000">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=DarkSalmon">DarkSalmon</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=E9967A">#E9967A</a></td>\r\n<td bgcolor="#e9967a">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=DarkSeaGreen">DarkSeaGreen</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=8FBC8F">#8FBC8F</a></td>\r\n<td bgcolor="#8fbc8f">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=DarkSlateBlue">DarkSlateBlue</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=483D8B">#483D8B</a></td>\r\n<td bgcolor="#483d8b">&nbsp;</td></tr>\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=DarkSlateGray">DarkSlateGray</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=2F4F4F">#2F4F4F</a></td>\r\n<td bgcolor="#2f4f4f">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=DarkTurquoise">DarkTurquoise</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=00CED1">#00CED1</a></td>\r\n<td bgcolor="#00ced1">&nbsp;</td></tr>\r\n\r\n\r\n<tr>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?color=DarkViolet">DarkViolet</a>&nbsp;</td>\r\n<td align="left"><a target="_blank" href="/tags/ref_color_tryit.asp?hex=94', 'admin', 'noc@sg.it', 'right.php', 1, '20060428195958', '20060428195720', '20060428195820', '1 MINUTE', 0, 'text', 'disactivated', '', '20060428180245');
INSERT INTO `tstm_message` (`id`, `sender`, `title`, `model_id`, `model_title`, `lang`, `text`, `groups_dest`, `users_dest`, `modules_dest`, `ripetitive`, `repeat_end`, `begin_time`, `end_time`, `intervale`, `priority`, `type`, `state`, `comment`, `date_time`) VALUES (26, 'noc', 'hello word', '', '', '', '<font color="#cc0000"><strong><font size="5">By eric Hello to the new word</font></strong></font><br />', '', '', 'index.php', 1, '20060426110350', '20060426110200', '20060426110300', '1 MINUTE', 0, 'html', 'active', '', '20060426100710');
INSERT INTO `tstm_message` (`id`, `sender`, `title`, `model_id`, `model_title`, `lang`, `text`, `groups_dest`, `users_dest`, `modules_dest`, `ripetitive`, `repeat_end`, `begin_time`, `end_time`, `intervale`, `priority`, `type`, `state`, `comment`, `date_time`) VALUES (28, 'noc', 'test.php', '', '', '', 'include(''modules/test.php'');', 'admin', 'noc@sg.it', '', 1, '20060426112518', '20060426110410', '20060426120410', '1 DAY', 0, 'php', 'active', '', '20060426110952');

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_message_read`
--

DROP TABLE IF EXISTS `tstm_message_read`;
CREATE TABLE `tstm_message_read` (
  `id` bigint(20) NOT NULL default '0',
  `user_email` varchar(124) NOT NULL default '',
  `message_id` int(11) NOT NULL default '0',
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id_user` (`user_email`,`message_id`)
) TYPE=MyISAM COMMENT='Tabella dei messaggi gia letti per utente';

--
-- Dump dei dati per la tabella `tstm_message_read`
--

INSERT INTO `tstm_message_read` (`id`, `user_email`, `message_id`, `date_time`) VALUES (0, 'admin@localhost', 15, '20060421022928');

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_nagios`
--

DROP TABLE IF EXISTS `tstm_nagios`;
CREATE TABLE `tstm_nagios` (
  `id` int(11) NOT NULL auto_increment,
  `group_name` varchar(124) NOT NULL default '',
  `nagios_group` varchar(124) NOT NULL default '',
  `date_time` timestamp(14) NOT NULL,
  `comment` text,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `group_name` (`group_name`,`nagios_group`)
) TYPE=MyISAM PACK_KEYS=0 COMMENT='Tabella per la gestione del modulo nagios' AUTO_INCREMENT=40 ;

--
-- Dump dei dati per la tabella `tstm_nagios`
--

INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (3, 'admin', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (4, 'agos', 'Gruppo_Agos', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (5, 'root', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (6, 'all_user', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (7, 'guest', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (8, 'soc', '~Gruppo_SOC', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (9, 'test', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (10, 'default', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (11, 'cliente', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (12, 'banca_marche', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (13, 'banca_sella', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (14, 'basic_net', 'Gruppo_BasicNet', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (15, 'cedacri', 'Gruppo_Cedacri', '20060407162230', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (16, 'lss', 'Gruppo_Lss', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (17, 'naaa', 'Gruppo_NAAA', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (18, 'nms', 'Gruppo_NMS', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (19, 'nuovi_investimenti', 'Gruppo_NuoviInvestimenti', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (20, 'pininfarina', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (21, 'trw', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (22, 'sg', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (23, 'seceti', 'Gruppo_Seceti', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (24, 'sec_servizi', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (25, 'second_level', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (26, 'last_level', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (27, 'Null', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (28, 'lloyd', 'Gruppo_Lloyd', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (29, 'iss', 'Gruppo_ISS', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (30, 'pininfarina_industrie', 'Gruppo_Pininfarina_Industrie', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (31, 'pininfarina_cambiano', 'Gruppo_Pininfarina_RanD', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (32, 'stampanti', '~Gruppo_Stampanti', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (33, 'serventi', '~Gruppo_Serventi', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (34, 'apparati_rete', '~Gruppo_Apparati_Rete', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (35, 'testa', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (36, 'demo', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (37, 'gruppo_prova_email', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (38, 'client_test', '', '20060403060439', NULL);
INSERT INTO `tstm_nagios` (`id`, `group_name`, `nagios_group`, `date_time`, `comment`) VALUES (39, 'piccolo_test', '', '20060403060439', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_nessus`
--

DROP TABLE IF EXISTS `tstm_nessus`;
CREATE TABLE `tstm_nessus` (
  `id` int(11) NOT NULL auto_increment,
  `group_name` varchar(124) NOT NULL default '',
  `nessus_ip` text,
  `date_time` timestamp(14) NOT NULL,
  `comment` text,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM PACK_KEYS=0 COMMENT='Tabella per la gestione del modulo nagios' AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `tstm_nessus`
--

INSERT INTO `tstm_nessus` (`id`, `group_name`, `nessus_ip`, `date_time`, `comment`) VALUES (1, 'group', 'nessus', '20060518091015', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_services`
--

DROP TABLE IF EXISTS `tstm_services`;
CREATE TABLE `tstm_services` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `port` int(11) NOT NULL default '0',
  `protocol` varchar(60) NOT NULL default '',
  `check_command` varchar(254) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=72 ;

--
-- Dump dei dati per la tabella `tstm_services`
--

INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (1, 'Ping', 0, '', 'check_far_host_alive', ' [Use]=AGOS_servizio,', '20051101160205');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (2, 'SSH', 0, '', 'check_ssh', ' [Use]=AGOS_servizio,', '20051101160205');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (3, 'StoneGate', 0, '', 'check_tcp!3020', ' [Use]=AGOS_servizio,', '20051101160205');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (4, 'HTTP', 0, '', 'check_http!-s', ' [Use]=AGOS_servizio,', '20051101160205');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (5, 'RDP', 0, '', 'check_rdp', ' [Use]=AGOS_servizio,', '20051101160205');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (6, 'Carico', 0, '', 'check_stonegate_snmp_cpu!SecureGCom', ' [Use]=AGOS_servizio,', '20051101160205');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (7, 'Uptime', 0, '', 'check_stonegate_snmp_uptime!SecureGCom', ' [Use]=AGOS_servizio,', '20051101160205');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (8, 'Stato', 0, '', 'check_stonegate_snmp_stato!SecureGCom', ' [Use]=AGOS_servizio,', '20051101160205');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (9, 'AGOS_servizio', 0, '', '', 'AGOS_gruppo_responsabili00 [Use]=CLIENTI_servizio,', '20051101160205');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (10, 'ICMP', 0, '', 'check_far_host_alive', 'Gruppo_BasicNet [Use]=BasicNet_servizio,', '20051101160205');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (11, 'HTTPS', 0, '', 'check_https', ' [Use]=BasicNet_servizio,', '20051101160205');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (12, 'BasicNet_servizio', 0, '', '', 'BasicNet_gruppo_responsabili0 [Use]=CLIENTI_servizio,', '20051101160205');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (13, 'Aggiornamenti', 0, '', 'check_iss_xpu!server', ' [Use]=ISS_servizio,', '20051101160205');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (14, 'ISS_servizio', 0, '', '', '1080010800ISS_gruppo_responsabili0 [Use]=CLIENTI_servizio,', '20051101160205');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (15, 'LLOYD_servizio', 0, '', '', 'LLOYD_gruppo_responsabili0 [Use]=CLIENTI_servizio,', '20051101160205');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (16, 'LSS_servizio', 0, '', '', 'LSS_gruppo_responsabili0 [Use]=CLIENTI_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (17, 'NAAA_servizio', 0, '', '', 'NAAA_gruppo_responsabili0 [Use]=CLIENTI_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (18, 'Processi', 0, '', 'check_snmp_processi!SecureGCom!IsntSmtp.exe!IWSSHttpMain.exe!sqlservr.exe!ISNTSysMonitor.exe', ' [Use]=NMS_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (19, 'Spazio', 0, '', 'check_snmp_spazio_disco!SecureGCom!c!70!80', ' [Use]=NMS_servizio_3ore,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (20, 'RAM', 0, '', 'check_snmp_ram!SecureGCom', ' [Use]=NMS_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (21, 'Grado', 0, '', 'check_snmp!-C', ' [Use]=NMS_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (22, 'Connessioni', 0, '', 'check_snmp!-C', ' [Use]=NMS_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (23, 'Valore', 0, '', 'check_netscreen_snmp_nsrp_c2_priorita!SecureGCom!50', ' [Use]=NMS_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (24, 'NMS_servizio', 0, '', '', 'NMS_gruppo_responsabili70 [Use]=CLIENTI_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (25, 'NMS_servizio_15min', 0, '', '', '9000 [Use]=NMS_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (26, 'NMS_servizio_3ore', 0, '', '', '108000 [Use]=NMS_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (27, 'SMTP', 0, '', 'check_smtp', ' [Use]=NUOVIINVESTIMENTI_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (28, 'DNS', 0, '', 'check_dns!www.nuoviinvestimenti.it!web.nuoviinvestimenti.it', ' [Use]=NUOVIINVESTIMENTI_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (29, 'NUOVIINVESTIMENTI_servizio', 0, '', '', 'NUOVIINVESTIMENTI_gruppo_responsabili0 [Use]=CLIENTI_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (30, 'CLIENTI_servizio', 0, '', '', '0 [Use]=PADRE_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (31, 'PININFARINA_servizio_INDUSTRIE', 0, '', '', '0 [Use]=PININFARINA_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (32, 'TrapSNMP', 0, '', 'check_solo_passivo', '01mai [Use]=PININFARINA_servizio_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (33, 'PININFARINA_servizio_RAND', 0, '', '', '0 [Use]=PININFARINA_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (34, 'PININFARINA_servizio', 0, '', '', 'PININFARINA_gruppo_responsabili0 [Use]=CLIENTI_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (35, 'Trap', 0, '', 'check_antitrap!PinInd_FW_NetScr_500_1!2', '111800 [Use]=PININFARINA_servizio_INDUSTRIE,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (36, 'VRRP', 0, '', 'check_vrrp_voyager!etc/clienti/seceti', ' [Use]=SECETI_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (37, 'SECETI_servizio', 0, '', '', 'SECETI_gruppo_responsabili6000 [Use]=CLIENTI_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (38, 'Servizio', 0, '', 'check_tcp!18190', '900 [Use]=SECETI_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (39, 'VNC', 0, '', 'check_vnc', ' [Use]=VILLAGE_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (40, 'Terminal', 0, '', 'check_terminal_services', ' [Use]=VILLAGE_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (41, 'RTSP', 0, '', 'check_rtsp!7070', ' [Use]=VILLAGE_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (42, 'Gateway', 0, '', '"/usr/local/nagios/libexec/check_village_smsgateway"', ' [Use]=VILLAGE_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (43, 'Monitor', 0, '', 'check_village_monitor!43122!3122!/usr/local/UCPMonitor/43122/logs', ' [Use]=VILLAGE_servizio_monitor,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (44, 'VILLAGE_servizio', 0, '', '', '1800VILLAGE_gruppo_responsabili0 [Use]=CLIENTI_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (45, 'VILLAGE_servizio_configurazione_ssh', 0, '', '', '216000 [Use]=VILLAGE_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (46, 'VILLAGE_servizio_monitor', 0, '', '', '1recovery_village_monitorVisto51200 [Use]=VILLAGE_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (47, 'SNMP', 0, '', 'check_snmp_uptime!SecureGCom', ' [Use]=INTERNO_servizio_APPARATI_RETE,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (48, 'INTERNO_servizio_APPARATI_RETE', 0, '', '', '0 [Use]=INTERNO_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (49, 'INTERNO_servizio', 0, '', '', 'INTERNO_gruppo_responsabili0 [Use]=PADRE_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (50, 'INTERNO_servizio_SERVENTI', 0, '', '', '0 [Use]=INTERNO_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (51, 'INTERNO_servizio_SERVENTI_FILESRV', 0, '', '', 'una_volta_al_giorno331120semprew,u,c,r0 [Use]=INTERNO_servizio_SERVENTI,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (52, 'NetBIOS', 0, '', 'check_tcp!139', '10 [Use]=INTERNO_servizio_SERVENTI,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (53, 'POP3', 0, '', 'check_pop', ' [Use]=INTERNO_servizio_SERVENTI,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (54, 'IMAP', 0, '', 'check_imap', ' [Use]=INTERNO_servizio_SERVENTI,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (55, 'DNS:', 0, '', 'check_dns!www.sg.it!www.scc-it.it', ' [Use]=INTERNO_servizio_SERVENTI,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (56, 'Controllo', 0, '', 'check_deface', ' [Use]=INTERNO_servizio_SERVENTI,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (57, 'PROXY:', 0, '', 'check_tcp!3128', ' [Use]=INTERNO_servizio_SERVENTI,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (58, 'PROXY', 0, '', 'check_proxy!www.nic.it,www.virgilio.it,libero.iol.it,www.polito.it', ' [Use]=INTERNO_servizio_SERVENTI,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (59, 'INTERNO_servizio_SOC', 0, '', '', '0 [Use]=INTERNO_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (60, 'INTERNO_servizio_STAMPANTI', 0, '', '', 'sempre351240semprec,r0 [Use]=INTERNO_servizio,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (61, 'generic-service', 0, '', '', '0011000001110 [Use]=,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (62, 'Root', 0, '', 'check_disk!20%!10%!/', '024x7451admins96024x7 [Use]=generic-service,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (63, 'Current', 0, '', 'check_users!20!50', '024x7451admins96024x7 [Use]=generic-service,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (64, 'Total', 0, '', 'check_procs!250!400', '024x7451admins96024x7 [Use]=generic-service,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (65, 'PADRE_servizio', 0, '', '', '10110111111sempre360312012700semprew,u,c,r00 [Use]=,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (66, 'Echo', 0, '', 'check_far_host_alive', '0 [Use]=,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (67, 'Hyper', 0, '', 'check_tcp!443', '0 [Use]=,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (68, 'Secure', 0, '', 'check_ssh', '0 [Use]=,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (69, 'CheckPoint', 0, '', 'check_tcp!3020', '0 [Use]=,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (70, 'Unicenter', 0, '', 'check_tcp!799', '0 [Use]=,', '20051101160206');
INSERT INTO `tstm_services` (`id`, `name`, `port`, `protocol`, `check_command`, `comment`, `date_time`) VALUES (71, 'Virtual', 0, '', 'check_vnc', '0 [Use]=,', '20051101160206');

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_software`
--

DROP TABLE IF EXISTS `tstm_software`;
CREATE TABLE `tstm_software` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `type` varchar(254) NOT NULL default '',
  `copyright` varchar(254) NOT NULL default '',
  `inf` text NOT NULL,
  `date_time` varchar(254) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `tstm_software`
--

INSERT INTO `tstm_software` (`id`, `name`, `type`, `copyright`, `inf`, `date_time`) VALUES (1, 'soft', 'type', '', '', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_statistic`
--

DROP TABLE IF EXISTS `tstm_statistic`;
CREATE TABLE `tstm_statistic` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `type` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='Tabelle delle statisciche di tstm' AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `tstm_statistic`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_template`
--

DROP TABLE IF EXISTS `tstm_template`;
CREATE TABLE `tstm_template` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `language` varchar(254) default NULL,
  `type` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='Tabella dei template per i ticket e per la mail' AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `tstm_template`
--

INSERT INTO `tstm_template` (`id`, `name`, `path`, `language`, `type`, `text`, `date_time`) VALUES (1, '', '', 'lang', 'temp', '', '20060321105135');

-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_template_group`
--

DROP TABLE IF EXISTS `tstm_template_group`;
CREATE TABLE `tstm_template_group` (
  `id` bigint(20) NOT NULL auto_increment,
  `template_name` varchar(254) NOT NULL default '',
  `template_group` varchar(254) NOT NULL default '',
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `tstm_template_group`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_x_code_source`
--

DROP TABLE IF EXISTS `tstm_x_code_source`;
CREATE TABLE `tstm_x_code_source` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(128) NOT NULL default '',
  `language` varchar(128) default 'html',
  `lang_version` varchar(64) default NULL,
  `code_version` varchar(64) default '1.0',
  `state` enum('active','disactivated') NOT NULL default 'active',
  `path` varchar(254) default NULL,
  `author` varchar(254) default NULL,
  `copyright` varchar(254) default NULL,
  `license` text,
  `text` text NOT NULL,
  `comment` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM COMMENT='table of source code' AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `tstm_x_code_source`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_x_contents`
--

DROP TABLE IF EXISTS `tstm_x_contents`;
CREATE TABLE `tstm_x_contents` (
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `tstm_x_contents`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_x_images`
--

DROP TABLE IF EXISTS `tstm_x_images`;
CREATE TABLE `tstm_x_images` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(16) NOT NULL default '',
  `state` enum('actve','disactivated') NOT NULL default 'actve',
  `path` varchar(254) NOT NULL default '',
  `x_dim` varchar(16) NOT NULL default '',
  `y_dim` varchar(16) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `tstm_x_images`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_x_links`
--

DROP TABLE IF EXISTS `tstm_x_links`;
CREATE TABLE `tstm_x_links` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `tstm_x_links`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_x_menu`
--

DROP TABLE IF EXISTS `tstm_x_menu`;
CREATE TABLE `tstm_x_menu` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `tstm_x_menu`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_x_modules`
--

DROP TABLE IF EXISTS `tstm_x_modules`;
CREATE TABLE `tstm_x_modules` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `tstm_x_modules`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_x_object`
--

DROP TABLE IF EXISTS `tstm_x_object`;
CREATE TABLE `tstm_x_object` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `text` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `tstm_x_object`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `tstm_x_pages`
--

DROP TABLE IF EXISTS `tstm_x_pages`;
CREATE TABLE `tstm_x_pages` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(254) NOT NULL default '',
  `path` varchar(254) NOT NULL default '',
  `language` varchar(254) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `tstm_x_pages`
--

ALTER TABLE `tstm_user` CHANGE `type` `type` ENUM('vip','admin','user','custumer','web','model','system','forum','auto','chat','tstm','database','demo') DEFAULT NULL;
ALTER TABLE `tstm_groups` CHANGE `type` `type` SET( 'tstm', 'forum', 'chat', 'web', 'database', 'demo', 'helpdesk', 'crm', 'object', 'software', 'asset', 'sevrices' ) DEFAULT NULL;


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
  `group_type` enum('tstm','forum','chat','web','database','demo','helpdesk','crm','object','software','asset','sevrices') NOT NULL default 'tstm',
  `asset_type` enum('tstm','forum','chat','web','database','demo','helpdesk','crm','object','software','asset','sevrices') NOT NULL default 'tstm',
  `ticket_type` enum('normal','job','ids','xpu','va','asset_Move','asset_remove','asset_add','asset_replace','new_account','new_group','asset_install','asset_request','asset_restart','software_install','software_remove','software_update','software_request','model','NULL') NOT NULL default 'normal',
  `ticket_call_method` set('normal','automatic','by_help_desk','by_email','by_phone','by_web','by_sms','unknow','SNMP','NULL') NOT NULL default 'by_email',
  `ticket_state` enum('open','update','close','in_progress','pending','unknow','NULL') NOT NULL default 'open',
  `ticket_severity` enum('info','low','normal','medium','high','NULL') default 'normal',
  `ticket_assign_to` text,
  `num_user_impact` int(11) default NULL,
  `num_group_impact` int(11) default NULL,
  `num_asset_impact` int(11) default NULL,
  `sla` varchar(64) NOT NULL default '3 DAY',
  `comment` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
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


UPDATE `tstm_ticket` SET `model_title`=`title`, `model_number`=`number`,
`mail_title`=`title`, `mail_text`=`text`,
`comment`='Import from Tstm Ver 1.0 database'
where (`id` > 18);

-- ALTER TABLE `tstm_ticket` PACK_KEYS =0 CHECKSUM =0 DELAY_KEY_WRITE =0 AUTO_INCREMENT =18










UPDATE `tstm_groups` SET `location` = 'soc',
`pass_phrase` = NULL ,
`email_sign` = ' Security Operation Center S G s.r.l. Corso Svizzera, 185 - xxxxx Torino - Italy phone: +39 0110700912 fax: +39 0110700010 website: http://www.sg.it ',
`referent_email` = 'soc@sg.it',
`admin_email` = 'soc@sg.it',
`folder` = 'soc',
`web_site` = NULL ,
`type` = 'tstm',
`sla` = NOW( ) ,
`public_key` = NULL ,
`private_key` = NULL ,
`login_script` = NULL ,
`adress` = 'S G s.r.l. Corso Svizzera, 185 - xxxxx Torino - Italy',
`comment` = 'Security Operation Center',
`date_time` = '20051013184903' WHERE `id` =23 LIMIT 1 ;


UPDATE `tstm_groups` SET `location` = NULL ,
`pass_phrase` = NULL ,
`email_sign` = ' Security Operation Center S G s.r.l. Corso Svizzera, 185 - xxxxx Torino - Italy phone: +39 0110700912 fax: +39 0110700010 website: http://www.sg.it ',
`referent_email` = NULL ,
`admin_email` = NULL ,
`folder` = NULL ,
`web_site` = NULL ,
`type` = 'tstm',
`sla` = NOW( ) ,
`public_key` = NULL ,
`private_key` = NULL ,
`adress` = NULL ,
`date_time` = '20060101124045' WHERE `id` =14 LIMIT 1 ;

UPDATE `tstm_groups` SET `location` = NULL ,
`pass_phrase` = NULL ,
`email_sign` = ' Security Operation Center S G s.r.l. Corso Svizzera, 185 - xxxxx Torino - Italy phone: +39 0110700912 fax: +39 0110700010 website: http://www.sg.it ',
`referent_email` = NULL ,
`admin_email` = NULL ,
`folder` = NULL ,
`web_site` = NULL ,
`type` = NULL ,
`sla` = NOW( ) ,
`public_key` = NULL ,
`private_key` = NULL ,
`login_script` = NULL ,
`adress` = NULL ,
`comment` = 'root user only',
`date_time` = '20051005223614' WHERE `id` =28 LIMIT 1 ;

UPDATE `tstm_user` SET `sexe` = NULL ,
`function` = NULL ,
`sla` = NULL ,
`email_sign` = ' Security Operation Center S G s.r.l. Corso Svizzera, 185 - xxxxx Torino - Italy phone: +39 0110700912 fax: +39 0110700010 website: http://www.sg.it ',
`adress` = NULL ,
`location` = NULL ,
`comment` = 'Security Operation Center',
`date_time` = NOW( ) WHERE `id` =14 LIMIT 1 ;


UPDATE `tstm_user` SET `sexe` = NULL ,
`function` = NULL ,
`sla` = NULL ,
`email_sign` = ' Security Operation Center S G s.r.l. Corso Svizzera, 185 - xxxxx Torino - Italy phone: +39 0110700912 fax: +39 0110700010 website: http://www.sg.it ',
`adress` = NULL ,
`location` = NULL ,
`login_script` = '',
`date_time` = NOW( ) WHERE `id` =18 LIMIT 1 ;


UPDATE `tstm_user` SET `sexe` = NULL ,
`function` = NULL ,
`sla` = NULL ,
`email_sign` = ' Security Operation Center S G s.r.l. Corso Svizzera, 185 - xxxxx Torino - Italy phone: +39 0110700912 fax: +39 0110700010 website: http://www.sg.it ',
`adress` = NULL ,
`location` = NULL ,
`login_script` = ' ',
`date_time` = NOW( ) WHERE `id` =17 LIMIT 1 ;




CREATE TABLE  IF NOT EXISTS `tstm_forum` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `text` text,
  `comment` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;


CREATE TABLE  IF NOT EXISTS `tstm_faq` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `text` text,
  `comment` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

CREATE TABLE  IF NOT EXISTS `tstm_news` (
  `id` bigint(20) NOT NULL auto_increment,
  `text` text,
  `name` varchar(124) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

CREATE TABLE  IF NOT EXISTS `tstm_chat` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `text` text,
  `comment` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

CREATE TABLE  IF NOT EXISTS `tstm_forum_argoment` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `text` text,
  `comment` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

CREATE TABLE  IF NOT EXISTS `tstm_forum_message` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `comment` text NOT NULL,
  `text` text,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

CREATE TABLE  IF NOT EXISTS `tstm_forum_user` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

CREATE TABLE  IF NOT EXISTS `tstm_forum_group` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(124) NOT NULL default '',
  `comment` text NOT NULL,
  `date_time` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `tstm_download_group`;
CREATE TABLE IF NOT EXISTS `tstm_download_group` (
  `id` int(11) NOT NULL auto_increment,
  `download_id` int(11) NOT NULL default '0',
  `group_name` varchar(254) NOT NULL default 'extern_groups.name',
  `date_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `download_id` (`download_id`,`group_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;





ALTER TABLE `tstm_asset_user` CHANGE `host_ip` `host_name` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_asset.name' NOT NULL ;
ALTER TABLE `tstm_asset_user` CHANGE `user_email` `user_email` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_user.email' NOT NULL ;
ALTER TABLE `tstm_asset_group` CHANGE `host_name` `host_name` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_asset.name' NOT NULL ;
ALTER TABLE `tstm_asset_group` CHANGE `group_name` `group_name` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_groups.name' NOT NULL ;
ALTER TABLE `tstm_asset_services` CHANGE `host_name` `host_name` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_asset.name' NOT NULL ;
ALTER TABLE `tstm_asset_services` CHANGE `service_name` `service_name` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_service.name' NOT NULL ;
ALTER TABLE `tstm_asset_tree` CHANGE `second_host_name` `second_host_name` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_asset.name' NOT NULL ;
ALTER TABLE `tstm_asset_tree` CHANGE `state` `state` ENUM( 'active', 'disactivated' ) DEFAULT 'active';
ALTER TABLE `tstm_download_group` CHANGE `group_name` `group_name` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_groups.name' NOT NULL;
ALTER TABLE `tstm_escalation` CHANGE `ticket_number` `ticket_number` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_ticket.number' NOT NULL ;
ALTER TABLE `tstm_father_group` CHANGE `group_father` `group_father` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_groups.name' NOT NULL;
ALTER TABLE `tstm_father_group` CHANGE `group_child` `group_child` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_groups.name' NOT NULL ;
ALTER TABLE `tstm_groups` CHANGE `referent_email` `referent_email` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_user.email';
ALTER TABLE `tstm_groups` CHANGE `admin_email` `admin_email` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_user.email';
ALTER TABLE `tstm_message_read` CHANGE `user_email` `user_email` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_user.email' NOT NULL;
ALTER TABLE `tstm_nagios` CHANGE `group_name` `group_name` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_groups.name' NOT NULL ;
ALTER TABLE `tstm_nessus` CHANGE `group_name` `group_name` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_groups.name' NOT NULL ;
ALTER TABLE `tstm_services` CHANGE `check_command` `check_command` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_command.command_line' NOT NULL ;
ALTER TABLE `tstm_session` CHANGE `user_email` `user_email` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_user.email' NOT NULL;
ALTER TABLE `tstm_sla` CHANGE `user_email` `user_email` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_user.email';
ALTER TABLE `tstm_sla` CHANGE `group_name` `group_name` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_groups.name' NOT NULL ;
ALTER TABLE `tstm_template_group` CHANGE `template_group` `template_group` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_groups.name' NOT NULL ;
ALTER TABLE `tstm_ticket` CHANGE `work_by` `work_by` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_user.email' NOT NULL ;
ALTER TABLE `tstm_ticket` CHANGE `call_log_user` `call_log_user` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_user.email';
ALTER TABLE `tstm_ticket` CHANGE `call_log_groups` `call_log_groups` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_groups.name' NOT NULL ;
ALTER TABLE `tstm_ticket_read` CHANGE `user_email` `user_email` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_user.email' NOT NULL ;
ALTER TABLE `tstm_user` CHANGE `function` `role` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL ;
ALTER TABLE `tstm_user_group` CHANGE `user_email` `user_email` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_user.email' NOT NULL ;
ALTER TABLE `tstm_user_group` CHANGE `group_name` `group_name` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'extern_groups.name' NOT NULL ;
