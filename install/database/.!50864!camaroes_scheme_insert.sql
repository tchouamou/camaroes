INSERT IGNORE INTO `cmr_user` VALUES ('', 'developer', 'developer', 'developer', 'developer', NULL, 'developer', NULL, MD5('developer'), 'developer@localhost', NULL, NULL, NULL, 'home/users/developer', NULL, '', 'active', NULL, NULL, '', 'italian', 'default', '', 'extern_certificate.user_email', '', '', '5_noc,5_soc,5_operator,6_developer,7_programer', '', '', 'developer', NOW());
INSERT IGNORE INTO `cmr_user` VALUES ('', 'admin', 'admin', 'admin', 'admin', NULL, 'admin', NULL, MD5('admin'), 'admin@localhost', NULL, NULL, NULL, 'home/users/default', NULL, '', 'active', NULL, NULL, '6_admin', 'italian', 'default', '', 'extern_certificate.user_email', '', '', '5_noc,5_soc,5_operator,6_admin,7_programer', '', '', 'admin', NOW());
INSERT IGNORE INTO `cmr_user` VALUES ('', 'operator', 'operator', 'operator', 'operator', NULL, 'operator', NULL, MD5('operator'), 'operator@localhost', NULL, NULL, NULL, 'home/users/operator', NULL, '', 'active', NULL, NULL, '', 'italian', 'default', '', 'extern_certificate.user_email', '', '', '5_noc,5_soc,5_operator,6_operator,7_programer', '', '', 'operator', NOW());
INSERT IGNORE INTO `cmr_user` VALUES ('', 'tecnician', 'tecnician', 'tecnician', 'tecnician', NULL, 'tecnician', NULL, MD5('tecnician'), 'tecnician@localhost', NULL, NULL, NULL, 'home/users/tecnician', NULL, '', 'active', NULL, NULL, '', 'italian', 'default', '', 'extern_certificate.user_email', '', '', '5_noc,5_soc,5_operator,6_tecnician,7_programer', '', '', 'tecnician', NOW());
INSERT IGNORE INTO `cmr_user` VALUES ('', 'guest', 'guest', 'guest', 'guest', NULL, 'guest', NULL, MD5('guest'), 'guest@localhost', NULL, NULL, NULL, 'home/users/guest', NULL, '', 'active', NULL, NULL, '', 'italian', 'default', '', 'extern_certificate.user_email', '', '', '5_noc,5_soc,5_operator,6_guest,7_programer', '', '', 'guest', NOW());
INSERT IGNORE INTO `cmr_user` VALUES ('', 'client', 'client', 'client', 'client', NULL, 'client', NULL, MD5('client'), 'client@localhost', NULL, NULL, NULL, 'home/users/client', NULL, '', 'active', NULL, NULL, '', 'italian', 'default', '', 'extern_certificate.user_email', '', '', '5_noc,5_soc,5_operator,6_client,7_programer', '', '', 'client', NOW());
INSERT IGNORE INTO `cmr_user` VALUES ('', 'demo', 'demo', 'demo', 'demo', NULL, 'demo', NULL, MD5('demo'), 'demo@localhost', NULL, NULL, NULL, 'home/users/demo', NULL, '', 'active', NULL, NULL, '', 'italian', 'default', '', 'extern_certificate.user_email', '', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'demo', NOW());



INSERT IGNORE INTO `cmr_groups` VALUES ('', 'developer', 'active', '', NULL, NULL, NOW(), NULL, NULL, NULL, NULL, 'extern_user.email', 'extern_user.email', 'home/groups/developer', 'by_email', NULL, NULL, NULL, '', '5_noc,5_soc,5_operator,6_developer,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'admin', 'active', '6_admin', NULL, NULL, NOW(), NULL, NULL, NULL, NULL, 'extern_user.email', 'extern_user.email', 'home/groups/admin', 'by_email', NULL, NULL, NULL, '', '5_noc,5_soc,5_operator,6_admin,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'operator', 'active', '5_operator', NULL, NULL, NOW(), NULL, NULL, NULL, NULL, 'extern_user.email', 'extern_user.email', 'home/groups/operator', 'by_email', NULL, NULL, NULL, '', '5_noc,5_soc,5_operator,6_operator,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'soc', 'active', '5_soc', NULL, NULL, NOW(), NULL, NULL, NULL, NULL, 'extern_user.email', 'extern_user.email', 'home/groups/soc', 'by_email', NULL, NULL, NULL, '', '5_noc,5_soc,5_operator,6_soc,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'noc', 'active', '5_noc', NULL, NULL, NOW(), NULL, NULL, NULL, NULL, 'extern_user.email', 'extern_user.email', 'home/groups/noc', 'by_email', NULL, NULL, NULL, '', '5_noc,5_soc,5_operator,6_noc,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'first_level', 'active', '', NULL, NULL, NOW(), NULL, NULL, NULL, NULL, 'extern_user.email', 'extern_user.email', 'home/groups/first_level', 'by_email', NULL, NULL, NULL, '', '5_noc,5_soc,5_operator,6_first_level,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'second_level', 'active', '', NULL, NULL, NOW(), NULL, NULL, NULL, NULL, 'extern_user.email', 'extern_user.email', 'home/groups/second_level', 'by_email', NULL, NULL, NULL, '', '5_noc,5_soc,5_operator,6_second_level,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'tecnician', 'active', '4_tecnician', NULL, NULL, NOW(), NULL, NULL, NULL, NULL, 'extern_user.email', 'extern_user.email', 'home/groups/tecnician', 'by_email', NULL, NULL, NULL, '', '5_noc,5_soc,5_operator,6_tecnician,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'client', 'active', '', NULL, NULL, NOW(), NULL, NULL, NULL, NULL, 'extern_user.email', 'extern_user.email', 'home/groups/client', 'by_email', NULL, NULL, NULL, '', '5_noc,5_soc,5_operator,6_client,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'all_user', 'active', '', NULL, NULL, NOW(), NULL, NULL, NULL, NULL, 'extern_user.email', 'extern_user.email', 'home/groups/all_user', 'by_email', NULL, NULL, NULL, '', '5_noc,5_soc,5_operator,6_all_user,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'forum', 'active', '', NULL, NULL, NOW(), NULL, NULL, NULL, NULL, 'extern_user.email', 'extern_user.email', 'home/groups/forum', 'by_email', NULL, NULL, NULL, '', '5_noc,5_soc,5_operator,6_forum,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'chat', 'active', '', NULL, NULL, NOW(), NULL, NULL, NULL, NULL, 'extern_user.email', 'extern_user.email', 'home/groups/chat', 'by_email', NULL, NULL, NULL, '', '5_noc,5_soc,5_operator,6_chat,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'default', 'active', '', NULL, NULL, NOW(), NULL, NULL, NULL, NULL, 'extern_user.email', 'extern_user.email', 'home/groups/default', 'by_email', NULL, NULL, NULL, '', '5_noc,5_soc,5_operator,6_default,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'no_db', 'active', '', NULL, NULL, NOW(), NULL, NULL, NULL, NULL, 'extern_user.email', 'extern_user.email', 'home/groups/no_db', 'by_email', NULL, NULL, NULL, '', '5_noc,5_soc,5_operator,6_no_db,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'demo', 'active', '', NULL, NULL, NOW(), NULL, NULL, NULL, NULL, 'extern_user.email', 'extern_user.email', 'home/groups/demo', 'by_email', NULL, NULL, NULL, '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_groups` VALUES ('', 'guest', 'active', '0_guest', NULL, NULL, NOW(), NULL, NULL, NULL, NULL, 'extern_user.email', 'extern_user.email', 'home/groups/guest', 'by_email', NULL, NULL, NULL, '', '5_noc,5_soc,5_operator,6_guest,7_programer', '', '', '', NOW());



INSERT IGNORE INTO `cmr_user_groups` VALUES ('', 'admin@localhost', 'admin', 'normal', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_user_groups` VALUES ('', 'operator@localhost', 'operator', 'normal', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_user_groups` VALUES ('', 'tecnician@localhost', 'tecnician', 'normal', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_user_groups` VALUES ('', 'developer@localhost', 'developer', 'normal', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_user_groups` VALUES ('', 'client@localhost', 'client', 'normal', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_user_groups` VALUES ('', 'demo@localhost', 'demo', 'normal', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_user_groups` VALUES ('', 'guest@localhost', 'guest', 'normal', 'active', '', '', '', '', NOW());




INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'admin', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'operator', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'tecnician', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'guest', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'client', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'all_user', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'first_level', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'second_level', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'last_level', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'chat', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'forum', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'default', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'null', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'model', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'web', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'noc', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'admin', 'soc', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'operator', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'tecnician', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'guest', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'client', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'all_user', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'first_level', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'second_level', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'last_level', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'chat', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'forum', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'default', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'null', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'model', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'web', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'noc', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'operator', 'soc', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'tecnician', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'guest', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'client', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'all_user', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'first_level', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'second_level', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'last_level', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'chat', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'forum', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'default', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'null', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'model', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'web', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'noc', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'tecnician', 'soc', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'developer', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'admin', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'operator', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'guest', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'client', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'all_user', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'first_level', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'second_level', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'last_level', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'chat', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'forum', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'default', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'null', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'model', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'web', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'noc', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'developer', 'soc', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'client', 'client', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'demo', 'demo', 'active', '', '', '', '', NOW());
INSERT IGNORE INTO `cmr_father_groups` VALUES ('', 'guest', 'guest', 'active', '', '', '', '', NOW());


INSERT IGNORE INTO `cmr_asset` VALUES ('', NULL, NULL, 'localhost', NULL, '127.0.0.1', '', NULL, NULL, NULL, NULL, 'pc', '', 'active', '', '', 'extern_command.name', 'extern_certificate.to_cn', '', '5_noc,5_soc,5_operator,6_admin,7_programer', '', '', '', '', 'localhost', NOW());
INSERT IGNORE INTO `cmr_account` VALUES ('', 'http://localhost', 'admin@localhost', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'localhost', 'extern_service.name', 0, '', '5_noc,5_soc,5_operator,6_admin,7_programer', '', '', '', NOW());



INSERT IGNORE INTO `cmr_code` VALUES ('', '{{date_time}}', '$eval_result=date("Y-m-d D H:i:s");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{date}}', '$eval_result=date("Y-m-d");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{time}}', '$eval_result=date("h:i:s");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{my_ip}}', '$eval_result=$_SERVER[''REMOTE_ADDR''];\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_email}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_name}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_last_name}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_lang}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_comment}}', '$eval_result=0;\r\nreturn $eval_result;', 'active', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_tel}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_cel}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_function}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_location}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{user_email_sign}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());

INSERT IGNORE INTO `cmr_code` VALUES ('', '{{groups_name}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{groups_email_sign}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());

INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_number}}', '$eval_result=get_post("number");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_title}}', '$eval_result=get_post("title");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_text}}', '$eval_result=get_post("text");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_assign_to}}', '$eval_result=get_post("assign_to");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_severity}}', '$eval_result=get_post("severity");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_state}}', '$eval_result=get_post("state");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_type}}', '$eval_result=get_post("type");', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_list_user_inpact}}', '$eval_result=get_post("list_user_inpact");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_list_group_inpact}}', '$eval_result=get_post("list_group_inpact");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_list_asset_inpact}}', '$eval_result=get_post("ticket_asset_inpact");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_sla}}', '$eval_result=get_post("sla");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_lang}}', '$eval_result=get_post("lang");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_call_log_group}}', '$eval_result=get_post("call_log_group");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_comment}}', '$eval_result=get_post("comment");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_call_log_user}}', '$eval_result=get_post("call_log_group");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_mail_from}}', '$eval_result=get_post("mail_from");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_mail_to}}', '$eval_result=get_post("mail_to");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_mail_cc}}', '$eval_result=get_post("mail_cc");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_mail_bcc}}', '$eval_result=get_post("mail_bcc");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_list_user_impact}}', '$eval_result=get_post("list_user_impact");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_list_group_impact}}', '$eval_result=get_post("list_group_impact");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_list_asset_impact}}', '$eval_result=get_post("list_asset_impact");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_assing_to}}', '$eval_result=get_post("assing_to");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_attach1}}', '$eval_result=get_post("attach1");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_attach2}}', '$eval_result=get_post("attach2");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_attach3}}', '$eval_result=get_post("attach3");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_attach4}}', '$eval_result=get_post("attach4");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());
INSERT IGNORE INTO `cmr_code` VALUES ('', '{{ticket_attach}}', '$eval_result=get_post("attach1").",".get_post("attach2").",".get_post("attach3").",".get_post("attach4");\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());

INSERT IGNORE INTO `cmr_code` VALUES ('', '{{iss_event_description}}', '$eval_result=0;\r\nreturn $eval_result;', '', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', '', NOW());



INSERT IGNORE INTO `cmr_ticket` VALUES ('1', '0507001', 'italian', 'Segnalazione Ticket Normal', '', '', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', 'Ticket [{{ticket_number}}] Segnalazione: {{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'normal', '(breve descrizione se segnalato dal cliente oppure\r\n     descrizione dettagliata se e'' stato rilevato da noi)', '-------------[{{date_time}}]-------------\r\n\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di SecureGroup ha preso in carico il problema con il\r\nTicket numero {{ticket_number}}.\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('2', '0507002', 'italian', 'Aggiornamento Ticket Normale', 'null', 'null', '', 'by_help_desk', 'update', 'updated', 'null', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Aggiornamento: {{ticket_title}}', 'null', 'null', 'null', 'null', '', 'normal', '(breve descrizione dell''aggiornamento)\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di SecureGroup ha aggiornato lo stato del ticket gia''\r\naperto {{ticket_number}}.\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('3', '0507003', 'italian', 'Chiusura Ticket Normale', 'null', 'null', '', 'by_help_desk', 'close', 'closed', '', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Chiusura: {{ticket_title}}', 'null', 'null', 'null', 'null', '', 'normal', '(spiegazioni della chiusura)\r\n', '-------------[{{date_time}}]-------------\r\n Spett.le cliente,\r\nLa presente per segnalare che il SOC di SecureGroup ha provveduto a chiudere il ticket  {{ticket_number}}\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer riaprire il Ticket potete rispondere a questo messaggio (senza modificarne l''oggetto) oppure contattatarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('4', '0507004', 'italian', 'Segnalazione Ticket IDS', '', '', '', 'by_help_desk', 'open', 'open', '', '', '', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Segnalazione IDS: {{ticket_title}}', '', '', '', '', '', 'ids', 'Ticket numero : {{ticket_number}}\r\nNome Eventi :{{ticket_title}}\r\nSource IP : \r\nDestination IP : \r\nSeverity : {{ticket_severity}}\r\n\r\n\r\nPer maggiori dettagli sull''evento segnalato:\r\n{{download}}\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n    la presente per segnalare che il SOC di SecureGroup ha rilevato un\r\nevento sospetto attraverso i nostri sistemi di monitoraggio.\r\n\r\n{{ticket_text}}\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer comunicare informazioni utili al declassamento del''evento (in caso\r\ndi falso positivo o a seguito di contromisure implementate al vostro\r\ninterno) rispondete a  questo messaggio (senza  modificarne l''oggetto)\r\noppure contattateci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
