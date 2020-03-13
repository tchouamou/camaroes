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
INSERT IGNORE INTO `cmr_user` VALUES ('', 'user', 'user', 'user', 'user', '', 'user', '', MD5('user'), 'user@localhost', '', '', '', 'home/users/user', '', '', 'locked', 'disconnect', '3_user', 'english', 'default', '', 'extern_certificate.user_email', '', '', NOW());
INSERT IGNORE INTO `cmr_user` VALUES ('', 'client', 'client', 'client', 'client', '', 'client', '', MD5('client'), 'client@localhost', '', '', '', 'home/users/client', '', '', 'locked', 'disconnect', '2_client', 'english', 'default', '', 'extern_certificate.user_email', '', '', NOW());
INSERT IGNORE INTO `cmr_user` VALUES ('', 'demo', 'demo', 'demo', 'demo', '', 'demo', '', MD5('demo'), 'demo@localhost', '', '', '', 'home/users/demo', '', '', 'locked', 'disconnect', '1_demo', 'english', 'default', '', 'extern_certificate.user_email', '', '', NOW());
INSERT IGNORE INTO `cmr_user` VALUES ('', 'guest', 'guest', 'guest', 'guest', '', 'guest', '', MD5('guest'), 'guest@localhost', '', '', '', 'home/users/guest', '', '', 'enable', 'disconnect', '0_guest', 'english', 'default', '', 'extern_certificate.user_email', '', '', NOW());



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
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'user', 'enable', '3_user', '', NOW(), '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/client', 'by_email', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'client', 'enable', '2_client', '', NOW(), '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/client', 'by_email', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'demo', 'enable', '1_demo', '', NOW(), '', '', '', '', 'extern_user.email', 'extern_user.email', 'home/groups/demo', 'by_email', '', '', '', '', NOW());
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
INSERT IGNORE INTO `cmr_user_groups` VALUES ('', 'user@localhost', 'user', 'enable', NOW());
INSERT IGNORE INTO `cmr_user_groups` VALUES ('', 'client@localhost', 'client', 'enable', NOW());
INSERT IGNORE INTO `cmr_user_groups` VALUES ('', 'demo@localhost', 'demo', 'enable', NOW());
INSERT IGNORE INTO `cmr_user_groups` VALUES ('', 'guest@localhost', 'guest', 'enable', NOW());



-- 
--  `cmr_father_groups`
-- 
--  
--  
-- 

INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'admin', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'operator', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'first_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'second_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'last_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'tecnician', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'user', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'client', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'demo', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'guest', 'enable', NOW());

INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'operator', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'tecnician', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'first_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'second_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'last_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'user', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'client', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'demo', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'guest', 'enable', NOW());

INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'tecnician', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'first_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'second_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'last_level', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'user', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'client', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'demo', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'guest', 'enable', NOW());

INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'user', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'client', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'guest', 'enable', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'client', 'enable', NOW());



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

INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_number}}', '$eval_result= get_post("number");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_title}}', '$eval_result= get_post("title");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_text}}', '$eval_result= get_post("text");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_assign_to}}', '$eval_result= get_post("assign_to");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_severity}}', '$eval_result= get_post("severity");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_state}}', '$eval_result= get_post("state");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_type}}', '$eval_result= get_post("type");', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_sla}}', '$eval_result= get_post("sla");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_lang}}', '$eval_result= get_post("lang");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_call_log_group}}', '$eval_result= get_post("call_log_group");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_comment}}', '$eval_result= get_post("comment");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_call_log_user}}', '$eval_result= get_post("call_log_group");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_mail_from}}', '$eval_result= get_post("mail_from");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_mail_to}}', '$eval_result= get_post("mail_to");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_mail_cc}}', '$eval_result= get_post("mail_cc");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_mail_bcc}}', '$eval_result= get_post("mail_bcc");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_list_user_impact}}', '$eval_result= get_post("list_user_impact");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_list_group_impact}}', '$eval_result= get_post("list_group_impact");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_list_asset_impact}}', '$eval_result= get_post("list_asset_impact");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_assing_to}}', '$eval_result= get_post("assing_to");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_attach1}}', '$eval_result= get_post("attach1");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_attach2}}', '$eval_result= get_post("attach2");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_attach3}}', '$eval_result= get_post("attach3");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_attach4}}', '$eval_result= get_post("attach4");\r\nreturn $eval_result;', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_attach}}', '$eval_result= get_post("attach1").",".get_post("attach2").",".get_post("attach3").",".get_post("attach4");\r\nreturn $eval_result;', '', NOW());

INSERT IGNORE INTO `cmr_code` VALUES ('', '{{url_page_description}}', '$eval_result=0;\r\nreturn $eval_result;', '', NOW());


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
INSERT IGNORE INTO `cmr_ticket` VALUES ('10', '0507007', 'italian', 'Vulnerability Assessment Richiesta IP - [{{ticket_call_log_group}}]', 'operator@localhost', 'operator@localhost', '', 'normal', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', '  al fine di effettuare il previsto Vulnerabilty Assessment, inizieremo le scansioni dopo le 22.00 di oggi verso gli indirizzi IP da voi comunicati.\r\n\r\nQualora non ci siano modifiche rispetto al mese precedente o in caso di\r\nmancato riscontro, porteremo avanti l''attività    con le stesse modalità   \r\ndel mese precedente, dandovi comunque comunicazione via email prima di\r\niniziare una sessione di scan e al termine della stessa.\r\n\r\nGli indirizzi da cui potremmo effettuare il VA saranno i seguenti:\r\n\r\n- \r\n- \r\n', '-------------[{{date_time}}]-------------\r\nBuongiorno,\r\n\r\n{{ticket_text}}\r\nCordiali saluti\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('11', '0507007', 'italian', 'Vulnerability Assessment Inizio - [{{ticket_call_log_group}}]', 'operator@localhost', 'operator@localhost', '', 'normal', 'update', 'update', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che alle ore 22.00 avrà    inizio il\r\nprevisto Vulnerability Assessment.\r\n\r\nVi invieremo un''e-mail di conferma a VA effettuato; qualora non dovesse\r\nterminare entro questa notte, il lavoro verrà    interrotto domattina alle\r\n8.00 e ripreso alle 22.00 di domani.', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}.\r\n\r\n\r\nCordiali saluti\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('12', '0507007', 'italian', 'Vulnerability Assessment File zip - [{{ticket_call_log_group}}]', 'operator@localhost', 'operator@localhost', '', 'normal', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Buongiorno,\r\n\r\n  in allegato il Vulnerability Assessment effettuato verso la vostra rete. Il file è compresso in formato ZIP e cifrato con password. Per ottenterla potete chiamare il SOC in qualsiasi momento al numero 011 0700912.\r\n\r\n', '-------------[{{date_time}}]-------------\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\n\r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('13', '0507007', 'italian', 'Vulnerability Assessment interotto - [{{ticket_call_log_group}}]', 'operator@localhost', 'operator@localhost', '', 'normal', 'update', 'update', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che alle ore 8.00  di questa mattina, è stato interotto come da accordi il Vulnerability Assessment, e vera ripreso soltanto\r\nalle 22.00 di questa notte.\r\n\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nCordiali saluti\r\n\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('14', '0507007', 'italian', 'Vulnerability Assessment continua - [{{ticket_call_log_group}}]', 'operator@localhost', 'operator@localhost', '', 'normal', 'update', 'update', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che dalle ore 22.00 continueremo il previsto Vulnerability Assessment a meno di un vostro contrordine.\r\nVi invieremo un''e-mail di conferma a VA effettuato; qualora non dovesse\r\nterminare entro questa notte, il lavoro verrà   interrotto domattina alle\r\n8.00 e ripreso alle 22.00 di domani.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nCordiali saluti\r\n-- \r\n\r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('15', '0507007', 'italian', 'Vulnerability Assessment fine - [{{ticket_call_log_group}}]', 'operator@localhost', 'operator@localhost', '', 'normal', 'close', 'close', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che è da poco terminato il previsto Vulnerability Assessment mensile.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nDistinti Saluti.\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('16', '0507007', 'italian', 'Vulnerability Assessment Richiesta IP e Periodo - [{{ticket_call_log_group}}]', 'operator@localhost', 'operator@localhost', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', '  al fine di effettuare il previsto Vulnerabilty Assessment mensile,\r\nchiediamo l''autorizzazione per iniziare l''attività   .\r\nQualora ci siano esigenze diverse rispetto al mese scorso vi chiediamo\r\ndi fornirci gli indirizzi IP delle macchine da sottoporre al security probing ed un''indicazione del periodo in cui poter operare.\r\n\r\nQualora non ci siano modifiche rispetto al mese precedente o in caso di mancato riscontro, porteremo avanti l''attività    con le stesse modalità    (indirizzi IP e orario) del mese precedente, dandovi comunque comunicazione via email prima di iniziare una sessione di scan e al termine della stessa.\r\n', '-------------[{{date_time}}]-------------\r\nBuongiorno,\r\n\r\n\r\n\r\nCordiali saluti\r\n\r\n-- \r\n-------------[{{groups_email_sign}}]-------------', 'cmr_model', 'model', NOW());

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



INSERT IGNORE INTO `cmr_message` VALUES ('1', 'operator@localhost', 'Hello!', '', 'How are you? ', 'operator', 'operator', 'operator@localhost', '', '', '', NOW() , '20321001000000', '', '3', 'text', 'enable', 'cmr_model', NOW());




INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', '*', '*', 'enable', 'deny', '*', '*', '*', '*', NOW());

INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', '*', '*', 'enable', 'allow', '*', '7', 'developer@localhost', 'developer', NOW());

INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', '*', '*', 'enable', 'allow', 'read', '4', 'tecnician@localhost', 'tecnician', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', '*', '*', 'enable', 'allow', 'select', '4', 'tecnician@localhost', 'tecnician', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', '*', '*', 'enable', 'allow', 'file', '5', 'operator@localhost', 'operator', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', '*', '*', 'enable', 'allow', 'run', '5', 'operator@localhost', 'operator', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', '*', '*', 'enable', 'allow', 'insert', '5', 'operator@localhost', 'operator', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', '*', '*', 'enable', 'allow', 'update', '5', 'operator@localhost', 'operator', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', '*', '*', 'enable', 'allow', 'delete', '6', 'admin@localhost', 'admin', NOW());

INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'cmr_ticket', '*', 'enable', 'allow', 'select', '2', 'client@localhost', 'client', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'cmr_ticket', '*', 'enable', 'allow', 'insert', '2', 'client@localhost', 'client', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'cmr_ticket', '*', 'enable', 'allow', 'update', '2', 'client@localhost', 'client', NOW());

INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'cmr_message', '*', 'enable', 'allow', 'select', '1', 'contact@localhost', 'contact', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'cmr_message', '*', 'enable', 'allow', 'insert', '1', 'contact@localhost', 'contact', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'cmr_message', '*', 'enable', 'allow', 'update', '1', 'contact@localhost', 'contact', NOW());


INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'cmr_policy', '*', 'enable', 'allow', 'select', '4', 'tecnician@localhost', 'tecnician', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'cmr_policy', '*', 'enable', 'allow', 'insert', '5', 'noc@localhost', 'noc', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'cmr_policy', '*', 'enable', 'allow', 'update', '6', 'admin@localhost', 'admin', NOW());

INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'cmr_apache_auth', '', 'enable', 'allow', 'login', '0', 'guest@localhost', 'guest',  NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '192.168.1.*', 'cmr_normal_auth', '', 'enable', 'allow', 'login', '0', 'guest@localhost', 'guest',  NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '10.*', 'cmr_normal_auth', '', 'enable', 'allow', 'login', '0', 'guest@localhost', 'guest',  NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '172.[16-32].*', 'cmr_normal_auth', '', 'enable', 'allow', 'login', '0', 'guest@localhost', 'guest',  NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'cmr_url_auth', '', 'disable', 'allow', 'login', '0', 'guest@localhost', 'guest',  NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'cmr_cookies_auth', '', 'disable', 'allow', 'login', '0', 'guest@localhost', 'guest',  NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'cmr_radius_auth', '', 'disable', 'allow', 'login', '0', 'guest@localhost', 'guest',  NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'cmr_other_auth', '', 'disable', 'allow', 'login', '0', 'guest@localhost', 'guest',  NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'cmr_no_auth', '', 'disable', 'allow', 'login', '0', 'guest@localhost', 'guest',  NOW());

INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'page_header.php', '*', 'enable', 'allow', 'read', '0', 'guest@localhost', 'guest', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'page_footer.php', '*', 'enable', 'allow', 'read', '0', 'guest@localhost', 'guest', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'about.php', '*', 'enable', 'allow', 'read', '0', 'guest@localhost', 'guest', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'login_new.php', '*', 'enable', 'allow', 'read', '0', 'guest@localhost', 'guest', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'head_menu.php', '*', 'enable', 'allow', 'read', '0', 'guest@localhost', 'guest', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'desktop.php', '*', 'enable', 'allow', 'read', '0', 'guest@localhost', 'guest', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'chess.php', '*', 'enable', 'allow', 'read', '0', 'guest@localhost', 'guest', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'calendar.php', '*', 'enable', 'allow', 'read', '0', 'guest@localhost', 'guest', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'site_map.php', '*', 'enable', 'allow', 'read', '0', 'guest@localhost', 'guest', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'menu_tree.php', '*', 'enable', 'allow', 'read', '0', 'guest@localhost', 'guest', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'download.php', '*', 'enable', 'allow', 'read', '0', 'guest@localhost', 'guest', NOW());

INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'generator.php', '*', 'enable', 'deny', 'read', '5', 'operator@localhost', 'operator', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'explore.php', '*', 'enable', 'deny', 'read', '5', 'operator@localhost', 'operator', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'query.php', '*', 'enable', 'deny', 'read', '5', 'operator@localhost', 'operator', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'replace.php', '*', 'enable', 'deny', 'read', '5', 'operator@localhost', 'operator', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'login_db.php', '*', 'enable', 'deny', 'read', '5', 'operator@localhost', 'operator', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'config_policy.php', '*', 'enable', 'deny', 'read', '5', 'operator@localhost', 'operator', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'config_all.php', '*', 'enable', 'deny', 'read', '5', 'operator@localhost', 'operator', NOW());

INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'new_user.php', '*', 'enable', 'deny', 'read', '1', 'contact@localhost', 'contact', NOW());
INSERT IGNORE INTO `cmr_policy` VALUES ('', '*', 'new_groups.php', '*', 'enable', 'deny', 'read', '1', 'contact@localhost', 'contact', NOW());

INSERT IGNORE INTO `cmr_policy` VALUES ('', '127.0.0.1', 'login_db.php', '*', 'enable', 'allow', 'read', '5', 'operator@localhost', 'operator', NOW());







UPDATE cmr_ticket SET mail_from = CONCAT('|', mail_from, '|'), mail_to = CONCAT('|', mail_to, '|'), mail_cc = CONCAT('|', mail_cc, '|'), mail_bcc = CONCAT('|', mail_bcc, '|') where my_master='cmr_model' and state != 'open';



