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
