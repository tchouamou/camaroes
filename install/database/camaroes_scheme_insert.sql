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
INSERT IGNORE INTO `cmr_ticket` VALUES ('5', '0507005', 'italian', 'Aggiornamento Ticket IDS', 'null', 'null', '', 'NULL', 'update', 'update', 'null', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Aggiornamento IDS: {{ticket_title}}', 'null', '', 'null', 'null', '', 'ids', '  in merito all''evento segnalato con il ticket {{ticket_number}}, vi preghiamo di\r\nverificare se l''impatto per la vostra rete risulta essere rilevante.\r\n\r\n\r\n\r\nIn caso contrario o di una mancata vostra risposta considereremo\r\nl''evento non impattante e provvederemo ad abbassare la priorità    di tali\r\neventi mediante l''inserimento di un''event filter.', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere a questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{groups_email_sign}}\r\n', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('6', '0507001', 'italian', 'Chiusura Ticket IDS', 'null', 'null', '', 'NULL', 'close', 'close', 'null', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Chiusura IDS: {{ticket_title}}', 'null', 'null', 'null', 'null', '', 'ids', 'E'' stato inserito un event filter sull''evento segnalato, avente come\r\ncampo destinazione l''indirizzo IP dell''host target.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n  La presente per segnalare che il SOC di SecureGroup ha provveduto a\r\nchiudere il ticket {{ticket_number}}.\r\n\r\n{{ticket_text}}.\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer riaprire il Ticket e rialzare la severità   dell''evento potete\r\nrispondere a questo messaggio (senza modificarne l''oggetto) oppure\r\ncontattatarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{groups_email_sign}}.', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('7', '0507008', 'italian', 'RealSecure XPU Update', 'operator@localhost', 'operator@localhost', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'xpu', 'Con la presente vi segnaliamo che Iss ha rilasciato la XPU xx.xx per\r\nRealSecure Network Sensor 7.0.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nRimaniamo a Vs. disposizione per ulteriori chiarimenti al riguardo.\r\n\r\nDistinti saluti.\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('8', '0507008', 'italian', 'SiteProtector - Aggiornamento XPU', 'operator@localhost', 'operator@localhost', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'xpu', '  le sonde di SiteProtector sono state aggiornate all''ultima release\r\ndell''XPU.\r\n\r\nInoltre, come concordato, sono stati attivati i ''drop'' sui seguenti\r\nattacchi con impatto classificato come HIGH.\r\nDi seguito viene fornito l''elenco delle nuove signature bloccate ed una\r\nloro breve descrizione, così come fornita da ISS:\r\n\r\n\r\n(descrizione dettagliata)\r\n', '-------------[{{date_time}}]-------------Buongiorno,\r\n{{ticket_text}}\r\nCordiali saluti\r\n\r\n-- \r\n{{groups_email_sign}}\r\n\r\n', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('9', '0507007', 'italian', 'Riepilogo eventi IDS del 20xx-xx-xx', 'operator@localhost', 'operator@localhost', '', 'normal', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'ids', 'In allegato potete trovare due documenti in formato PDF:\r\n\r\n    1. il primo inerente il report giornaliero degli eventi HIGH e MEDIUM;\r\n\r\n    2. il secondo riguarda il dettaglio degli eventi HIGH con i\r\n       relativi indirizzi IP sorgenti e di destinazione.\r\n', '-------------[{{date_time}}]-------------Buongiorno,\r\n{{ticket_text}}\r\n\r\nRimaniamo a disposizione per eventuali chiarimenti.\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('10', '0507007', 'italian', 'Vulnerability Assessment Richiesta IP', 'operator@localhost', 'operator@localhost', '', 'normal', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', '  al fine di effettuare il previsto Vulnerabilty Assessment, inizieremo le scansioni dopo le 22.00 di oggi verso gli indirizzi IP da voi comunicati.\r\n\r\nQualora non ci siano modifiche rispetto al mese precedente o in caso di\r\nmancato riscontro, porteremo avanti l''attività    con le stesse modalità   \r\ndel mese precedente, dandovi comunque comunicazione via email prima di\r\niniziare una sessione di scan e al termine della stessa.\r\n\r\nGli indirizzi da cui potremmo effettuare il VA saranno i seguenti:\r\n\r\n- \r\n- \r\n', '-------------[{{date_time}}]-------------\r\nBuongiorno,\r\nCordiali saluti\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('11', '0507007', 'italian', 'Vulnerability Assessment Inizio', 'operator@localhost', 'operator@localhost', '', 'normal', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che alle ore 22.00 avrà    inizio il\r\nprevisto Vulnerability Assessment.\r\n\r\nVi invieremo un''e-mail di conferma a VA effettuato; qualora non dovesse\r\nterminare entro questa notte, il lavoro verrà    interrotto domattina alle\r\n8.00 e ripreso alle 22.00 di domani.', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}.\r\n\r\n\r\nCordiali saluti\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('12', '0507007', 'italian', 'Vulnerability Assessment File zip', 'operator@localhost', 'operator@localhost', '', 'normal', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Buongiorno,\r\n\r\n  in allegato il Vulnerability Assessment effettuato verso la vostra rete. Il file è compresso in formato ZIP e cifrato con password. Per ottenterla potete chiamare il SOC in qualsiasi momento al numero 011 0700912.\r\n\r\n', '-------------[{{date_time}}]-------------\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\n\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('13', '0507007', 'italian', 'Vulnerability Assessment interotto', 'operator@localhost', 'operator@localhost', '', 'normal', 'update', 'update', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che alle ore 8.00  di questa mattina, è stato interotto come da accordi il Vulnerability Assessment, e vera ripreso soltanto\r\nalle 22.00 di questa notte.\r\n\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nCordiali saluti\r\n\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('14', '0507007', 'italian', 'Vulnerability Assessment continua', 'operator@localhost', 'operator@localhost', '', 'normal', 'update', 'update', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che dalle ore 22.00 continueremo il previsto Vulnerability Assessment a meno di un vostro contrordine.\r\nVi invieremo un''e-mail di conferma a VA effettuato; qualora non dovesse\r\nterminare entro questa notte, il lavoro verrà   interrotto domattina alle\r\n8.00 e ripreso alle 22.00 di domani.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nCordiali saluti\r\n-- \r\n\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('15', '0507007', 'italian', 'Vulnerability Assessment fine', 'operator@localhost', 'operator@localhost', '', 'normal', 'close', 'close', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che è da poco terminato il previsto Vulnerability Assessment mensile.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nDistinti Saluti.\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('16', '0507007', 'italian', 'Vulnerability Assessment Richiesta IP e Periodo', 'operator@localhost', 'operator@localhost', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', '  al fine di effettuare il previsto Vulnerabilty Assessment mensile,\r\nchiediamo l''autorizzazione per iniziare l''attività   .\r\nQualora ci siano esigenze diverse rispetto al mese scorso vi chiediamo\r\ndi fornirci gli indirizzi IP delle macchine da sottoporre al security probing ed un''indicazione del periodo in cui poter operare.\r\n\r\nQualora non ci siano modifiche rispetto al mese precedente o in caso di mancato riscontro, porteremo avanti l''attività    con le stesse modalità    (indirizzi IP e orario) del mese precedente, dandovi comunque comunicazione via email prima di iniziare una sessione di scan e al termine della stessa.\r\n', '-------------[{{date_time}}]-------------\r\nBuongiorno,\r\n\r\n\r\n\r\nCordiali saluti\r\n\r\n-- \r\n-------------[{{groups_email_sign}}]-------------', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('17', '0507001', 'english', 'Segnalazione Ticket Normal', '', '', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', 'Ticket [{{ticket_number}}] Segnalazione: {{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'normal', '(breve descrizione se segnalato dal cliente oppure\r\n     descrizione dettagliata se e'' stato rilevato da noi)', '-------------[{{date_time}}]-------------\r\n\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di SecureGroup ha preso in carico il problema con il\r\nTicket numero {{ticket_number}}.\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('18', '0507002', 'english', 'Aggiornamento Ticket Normale', 'null', 'null', '', 'by_help_desk', 'update', 'updated', 'null', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Aggiornamento: {{ticket_title}}', 'null', 'null', 'null', 'null', '', 'normal', '(breve descrizione dell''aggiornamento)\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di SecureGroup ha aggiornato lo stato del ticket gia''\r\naperto {{ticket_number}}.\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('19', '0507003', 'english', 'Chiusura Ticket Normale', 'null', 'null', '', 'by_help_desk', 'close', 'closed', '', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Chiusura: {{ticket_title}}', 'null', 'null', 'null', 'null', '', 'normal', '(spiegazioni della chiusura)\r\n', '-------------[{{date_time}}]-------------\r\n Spett.le cliente,\r\nLa presente per segnalare che il SOC di SecureGroup ha provveduto a chiudere il ticket  {{ticket_number}}\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer riaprire il Ticket potete rispondere a questo messaggio (senza modificarne l''oggetto) oppure contattatarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('20', '0507004', 'english', 'Segnalazione Ticket IDS', '', '', '', 'by_help_desk', 'open', 'open', '', '', '', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Segnalazione IDS: {{ticket_title}}', '', '', '', '', '', 'ids', 'Ticket numero : {{ticket_number}}\r\nNome Eventi :{{ticket_title}}\r\nSource IP : \r\nDestination IP : \r\nSeverity : {{ticket_severity}}\r\n\r\n\r\nPer maggiori dettagli sull''evento segnalato:\r\n{{download}}\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n    la presente per segnalare che il SOC di SecureGroup ha rilevato un\r\nevento sospetto attraverso i nostri sistemi di monitoraggio.\r\n\r\n{{ticket_text}}\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer comunicare informazioni utili al declassamento del''evento (in caso\r\ndi falso positivo o a seguito di contromisure implementate al vostro\r\ninterno) rispondete a  questo messaggio (senza  modificarne l''oggetto)\r\noppure contattateci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('21', '0507005', 'english', 'Aggiornamento Ticket IDS', 'null', 'null', '', 'NULL', 'update', 'update', 'null', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Aggiornamento IDS: {{ticket_title}}', 'null', '', 'null', 'null', '', 'ids', '  in merito all''evento segnalato con il ticket {{ticket_number}}, vi preghiamo di\r\nverificare se l''impatto per la vostra rete risulta essere rilevante.\r\n\r\n\r\n\r\nIn caso contrario o di una mancata vostra risposta considereremo\r\nl''evento non impattante e provvederemo ad abbassare la priorità    di tali\r\neventi mediante l''inserimento di un''event filter.', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere a questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{groups_email_sign}}\r\n', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('22', '0507001', 'english', 'Chiusura Ticket IDS', 'null', 'null', '', 'NULL', 'close', 'close', 'null', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Chiusura IDS: {{ticket_title}}', 'null', 'null', 'null', 'null', '', 'ids', 'E'' stato inserito un event filter sull''evento segnalato, avente come\r\ncampo destinazione l''indirizzo IP dell''host target.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n  La presente per segnalare che il SOC di SecureGroup ha provveduto a\r\nchiudere il ticket {{ticket_number}}.\r\n\r\n{{ticket_text}}.\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer riaprire il Ticket e rialzare la severità   dell''evento potete\r\nrispondere a questo messaggio (senza modificarne l''oggetto) oppure\r\ncontattatarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{groups_email_sign}}.', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('23', '0507008', 'english', 'RealSecure XPU Update', 'operator@localhost', 'operator@localhost', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'xpu', 'Con la presente vi segnaliamo che Iss ha rilasciato la XPU xx.xx per\r\nRealSecure Network Sensor 7.0.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nRimaniamo a Vs. disposizione per ulteriori chiarimenti al riguardo.\r\n\r\nDistinti saluti.\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('24', '0507008', 'english', 'SiteProtector - Aggiornamento XPU', 'operator@localhost', 'operator@localhost', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'xpu', '  le sonde di SiteProtector sono state aggiornate all''ultima release\r\ndell''XPU.\r\n\r\nInoltre, come concordato, sono stati attivati i ''drop'' sui seguenti\r\nattacchi con impatto classificato come HIGH.\r\nDi seguito viene fornito l''elenco delle nuove signature bloccate ed una\r\nloro breve descrizione, così come fornita da ISS:\r\n\r\n\r\n(descrizione dettagliata)\r\n', '-------------[{{date_time}}]-------------Buongiorno,\r\n{{ticket_text}}\r\nCordiali saluti\r\n\r\n-- \r\n{{groups_email_sign}}\r\n\r\n', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('25', '0507007', 'english', 'Riepilogo eventi IDS del 20xx-xx-xx', 'operator@localhost', 'operator@localhost', '', 'normal', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'ids', 'In allegato potete trovare due documenti in formato PDF:\r\n\r\n    1. il primo inerente il report giornaliero degli eventi HIGH e MEDIUM;\r\n\r\n    2. il secondo riguarda il dettaglio degli eventi HIGH con i\r\n       relativi indirizzi IP sorgenti e di destinazione.\r\n', '-------------[{{date_time}}]-------------Buongiorno,\r\n{{ticket_text}}\r\n\r\nRimaniamo a disposizione per eventuali chiarimenti.\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('26', '0507007', 'english', 'Vulnerability Assessment Richiesta IP', 'operator@localhost', 'operator@localhost', '', 'normal', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', '  al fine di effettuare il previsto Vulnerabilty Assessment, inizieremo le scansioni dopo le 22.00 di oggi verso gli indirizzi IP da voi comunicati.\r\n\r\nQualora non ci siano modifiche rispetto al mese precedente o in caso di\r\nmancato riscontro, porteremo avanti l''attività    con le stesse modalità   \r\ndel mese precedente, dandovi comunque comunicazione via email prima di\r\niniziare una sessione di scan e al termine della stessa.\r\n\r\nGli indirizzi da cui potremmo effettuare il VA saranno i seguenti:\r\n\r\n- \r\n- \r\n', '-------------[{{date_time}}]-------------\r\nBuongiorno,\r\nCordiali saluti\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('27', '0507007', 'english', 'Vulnerability Assessment Inizio', 'operator@localhost', 'operator@localhost', '', 'normal', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che alle ore 22.00 avrà    inizio il\r\nprevisto Vulnerability Assessment.\r\n\r\nVi invieremo un''e-mail di conferma a VA effettuato; qualora non dovesse\r\nterminare entro questa notte, il lavoro verrà    interrotto domattina alle\r\n8.00 e ripreso alle 22.00 di domani.', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}.\r\n\r\n\r\nCordiali saluti\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('28', '0507007', 'english', 'Vulnerability Assessment File zip', 'operator@localhost', 'operator@localhost', '', 'normal', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Buongiorno,\r\n\r\n  in allegato il Vulnerability Assessment effettuato verso la vostra rete. Il file è compresso in formato ZIP e cifrato con password. Per ottenterla potete chiamare il SOC in qualsiasi momento al numero 011 0700912.\r\n\r\n', '-------------[{{date_time}}]-------------\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\n\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('29', '0507007', 'english', 'Vulnerability Assessment interotto', 'operator@localhost', 'operator@localhost', '', 'normal', 'update', 'update', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che alle ore 8.00  di questa mattina, è stato interotto come da accordi il Vulnerability Assessment, e vera ripreso soltanto\r\nalle 22.00 di questa notte.\r\n\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nCordiali saluti\r\n\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('30', '0507007', 'english', 'Vulnerability Assessment continua', 'operator@localhost', 'operator@localhost', '', 'normal', 'update', 'update', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che dalle ore 22.00 continueremo il previsto Vulnerability Assessment a meno di un vostro contrordine.\r\nVi invieremo un''e-mail di conferma a VA effettuato; qualora non dovesse\r\nterminare entro questa notte, il lavoro verrà   interrotto domattina alle\r\n8.00 e ripreso alle 22.00 di domani.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nCordiali saluti\r\n-- \r\n\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('31', '0507007', 'english', 'Vulnerability Assessment fine', 'operator@localhost', 'operator@localhost', '', 'normal', 'close', 'close', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che è da poco terminato il previsto Vulnerability Assessment mensile.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nDistinti Saluti.\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('32', '0507007', 'english', 'Vulnerability Assessment Richiesta IP e Periodo', 'operator@localhost', 'operator@localhost', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', '  al fine di effettuare il previsto Vulnerabilty Assessment mensile,\r\nchiediamo l''autorizzazione per iniziare l''attività   .\r\nQualora ci siano esigenze diverse rispetto al mese scorso vi chiediamo\r\ndi fornirci gli indirizzi IP delle macchine da sottoporre al security probing ed un''indicazione del periodo in cui poter operare.\r\n\r\nQualora non ci siano modifiche rispetto al mese precedente o in caso di mancato riscontro, porteremo avanti l''attività    con le stesse modalità    (indirizzi IP e orario) del mese precedente, dandovi comunque comunicazione via email prima di iniziare una sessione di scan e al termine della stessa.\r\n', '-------------[{{date_time}}]-------------\r\nBuongiorno,\r\n\r\n\r\n\r\nCordiali saluti\r\n\r\n-- \r\n-------------[{{groups_email_sign}}]-------------', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('33', '0507009', 'null', 'null', 'null', 'null', '', 'NULL', 'NULL', 'NULL', 'null', 'null', 'null', 'null', '', '3 DAY', 'null', 'null', 'null', 'null', 'null', 'null', 'NULL', 'null', 'null', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('34', '0507001', 'french', 'Segnalazione Ticket Normal', '', '', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', 'Ticket [{{ticket_number}}] Segnalazione: {{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'normal', '(breve descrizione se segnalato dal cliente oppure\r\n     descrizione dettagliata se e'' stato rilevato da noi)', '-------------[{{date_time}}]-------------\r\n\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di SecureGroup ha preso in carico il problema con il\r\nTicket numero {{ticket_number}}.\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('35', '0507002', 'french', 'Aggiornamento Ticket Normale', 'null', 'null', '', 'by_help_desk', 'update', 'updated', 'null', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Aggiornamento: {{ticket_title}}', 'null', 'null', 'null', 'null', '', 'normal', '(breve descrizione dell''aggiornamento)\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\nLa presente per segnalare che il SOC di SecureGroup ha aggiornato lo stato del ticket gia''\r\naperto {{ticket_number}}.\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere  a  questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('36', '0507003', 'french', 'Chiusura Ticket Normale', 'null', 'null', '', 'by_help_desk', 'close', 'closed', '', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Chiusura: {{ticket_title}}', 'null', 'null', 'null', 'null', '', 'normal', '(spiegazioni della chiusura)\r\n', '-------------[{{date_time}}]-------------\r\n Spett.le cliente,\r\nLa presente per segnalare che il SOC di SecureGroup ha provveduto a chiudere il ticket  {{ticket_number}}\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer riaprire il Ticket potete rispondere a questo messaggio (senza modificarne l''oggetto) oppure contattatarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('37', '0507004', 'french', 'Segnalazione Ticket IDS', '', '', '', 'by_help_desk', 'open', 'open', '', '', '', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Segnalazione IDS: {{ticket_title}}', '', '', '', '', '', 'ids', 'Ticket numero : {{ticket_number}}\r\nNome Eventi :{{ticket_title}}\r\nSource IP : \r\nDestination IP : \r\nSeverity : {{ticket_severity}}\r\n\r\n\r\nPer maggiori dettagli sull''evento segnalato:\r\n{{download}}\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n    la presente per segnalare che il SOC di SecureGroup ha rilevato un\r\nevento sospetto attraverso i nostri sistemi di monitoraggio.\r\n\r\n{{ticket_text}}\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer comunicare informazioni utili al declassamento del''evento (in caso\r\ndi falso positivo o a seguito di contromisure implementate al vostro\r\ninterno) rispondete a  questo messaggio (senza  modificarne l''oggetto)\r\noppure contattateci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('38', '0507005', 'french', 'Aggiornamento Ticket IDS', 'null', 'null', '', 'NULL', 'update', 'update', 'null', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Aggiornamento IDS: {{ticket_title}}', 'null', '', 'null', 'null', '', 'ids', '  in merito all''evento segnalato con il ticket {{ticket_number}}, vi preghiamo di\r\nverificare se l''impatto per la vostra rete risulta essere rilevante.\r\n\r\n\r\n\r\nIn caso contrario o di una mancata vostra risposta considereremo\r\nl''evento non impattante e provvederemo ad abbassare la priorità    di tali\r\neventi mediante l''inserimento di un''event filter.', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer avere informazioni sullo stato  di  avanzamento dei lavori potrete\r\nrispondere a questo messaggio (senza  modificarne  l''oggetto) oppure\r\ncontattarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{groups_email_sign}}\r\n', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('39', '0507001', 'french', 'Chiusura Ticket IDS', 'null', 'null', '', 'NULL', 'close', 'close', 'null', 'null', 'null', 'null', '', '3 DAY', 'Ticket [{{ticket_number}}] Chiusura IDS: {{ticket_title}}', 'null', 'null', 'null', 'null', '', 'ids', 'E'' stato inserito un event filter sull''evento segnalato, avente come\r\ncampo destinazione l''indirizzo IP dell''host target.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n  La presente per segnalare che il SOC di SecureGroup ha provveduto a\r\nchiudere il ticket {{ticket_number}}.\r\n\r\n{{ticket_text}}.\r\n\r\nDistinti saluti\r\n\r\n-- \r\nPer riaprire il Ticket e rialzare la severità   dell''evento potete\r\nrispondere a questo messaggio (senza modificarne l''oggetto) oppure\r\ncontattatarci telefonicamente facendo riferimento al numero di Ticket.\r\n\r\n{{groups_email_sign}}.', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('40', '0507008', 'french', 'RealSecure XPU Update', 'operator@localhost', 'operator@localhost', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'xpu', 'Con la presente vi segnaliamo che Iss ha rilasciato la XPU xx.xx per\r\nRealSecure Network Sensor 7.0.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nRimaniamo a Vs. disposizione per ulteriori chiarimenti al riguardo.\r\n\r\nDistinti saluti.\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('41', '0507008', 'french', 'SiteProtector - Aggiornamento XPU', 'operator@localhost', 'operator@localhost', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'xpu', '  le sonde di SiteProtector sono state aggiornate all''ultima release\r\ndell''XPU.\r\n\r\nInoltre, come concordato, sono stati attivati i ''drop'' sui seguenti\r\nattacchi con impatto classificato come HIGH.\r\nDi seguito viene fornito l''elenco delle nuove signature bloccate ed una\r\nloro breve descrizione, così come fornita da ISS:\r\n\r\n\r\n(descrizione dettagliata)\r\n', '-------------[{{date_time}}]-------------Buongiorno,\r\n{{ticket_text}}\r\nCordiali saluti\r\n\r\n-- \r\n{{groups_email_sign}}\r\n\r\n', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('42', '0507007', 'french', 'Riepilogo eventi IDS del 20xx-xx-xx', 'operator@localhost', 'operator@localhost', '', 'normal', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'ids', 'In allegato potete trovare due documenti in formato PDF:\r\n\r\n    1. il primo inerente il report giornaliero degli eventi HIGH e MEDIUM;\r\n\r\n    2. il secondo riguarda il dettaglio degli eventi HIGH con i\r\n       relativi indirizzi IP sorgenti e di destinazione.\r\n', '-------------[{{date_time}}]-------------Buongiorno,\r\n{{ticket_text}}\r\n\r\nRimaniamo a disposizione per eventuali chiarimenti.\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('43', '0507007', 'french', 'Vulnerability Assessment Richiesta IP', 'operator@localhost', 'operator@localhost', '', 'normal', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', '  al fine di effettuare il previsto Vulnerabilty Assessment, inizieremo le scansioni dopo le 22.00 di oggi verso gli indirizzi IP da voi comunicati.\r\n\r\nQualora non ci siano modifiche rispetto al mese precedente o in caso di\r\nmancato riscontro, porteremo avanti l''attività    con le stesse modalità   \r\ndel mese precedente, dandovi comunque comunicazione via email prima di\r\niniziare una sessione di scan e al termine della stessa.\r\n\r\nGli indirizzi da cui potremmo effettuare il VA saranno i seguenti:\r\n\r\n- \r\n- \r\n', '-------------[{{date_time}}]-------------\r\nBuongiorno,\r\nCordiali saluti\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('44', '0507007', 'french', 'Vulnerability Assessment Inizio', 'operator@localhost', 'operator@localhost', '', 'normal', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che alle ore 22.00 avrà    inizio il\r\nprevisto Vulnerability Assessment.\r\n\r\nVi invieremo un''e-mail di conferma a VA effettuato; qualora non dovesse\r\nterminare entro questa notte, il lavoro verrà    interrotto domattina alle\r\n8.00 e ripreso alle 22.00 di domani.', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}.\r\n\r\n\r\nCordiali saluti\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('45', '0507007', 'french', 'Vulnerability Assessment File zip', 'operator@localhost', 'operator@localhost', '', 'normal', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Buongiorno,\r\n\r\n  in allegato il Vulnerability Assessment effettuato verso la vostra rete. Il file è compresso in formato ZIP e cifrato con password. Per ottenterla potete chiamare il SOC in qualsiasi momento al numero 011 0700912.\r\n\r\n', '-------------[{{date_time}}]-------------\r\n\r\n{{ticket_text}}\r\n\r\nDistinti saluti\r\n\r\n-- \r\n\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('46', '0507007', 'french', 'Vulnerability Assessment interotto', 'operator@localhost', 'operator@localhost', '', 'normal', 'update', 'update', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che alle ore 8.00  di questa mattina, è stato interotto come da accordi il Vulnerability Assessment, e vera ripreso soltanto\r\nalle 22.00 di questa notte.\r\n\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nCordiali saluti\r\n\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('47', '0507007', 'french', 'Vulnerability Assessment continua', 'operator@localhost', 'operator@localhost', '', 'normal', 'update', 'update', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che dalle ore 22.00 continueremo il previsto Vulnerability Assessment a meno di un vostro contrordine.\r\nVi invieremo un''e-mail di conferma a VA effettuato; qualora non dovesse\r\nterminare entro questa notte, il lavoro verrà   interrotto domattina alle\r\n8.00 e ripreso alle 22.00 di domani.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nCordiali saluti\r\n-- \r\n\r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('48', '0507007', 'french', 'Vulnerability Assessment fine', 'operator@localhost', 'operator@localhost', '', 'normal', 'close', 'close', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', 'Con la presente intendiamo comunicarvi che è da poco terminato il previsto Vulnerability Assessment mensile.\r\n', '-------------[{{date_time}}]-------------\r\nSpett.le cliente,\r\n\r\n{{ticket_text}}\r\n\r\nDistinti Saluti.\r\n\r\n-- \r\n{{groups_email_sign}}', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());
INSERT IGNORE INTO `cmr_ticket` VALUES ('49', '0507007', 'french', 'Vulnerability Assessment Richiesta IP e Periodo', 'operator@localhost', 'operator@localhost', '', 'by_help_desk', 'open', 'open', 'soc', '', '', '', 'normal', '3 DAY', '{{ticket_title}}', 'Operation Center <operator@localhost>', '', 'Tecnician<tecnician@localhost>', 'Soc <operator@localhost>', '', 'va', '  al fine di effettuare il previsto Vulnerabilty Assessment mensile,\r\nchiediamo l''autorizzazione per iniziare l''attività   .\r\nQualora ci siano esigenze diverse rispetto al mese scorso vi chiediamo\r\ndi fornirci gli indirizzi IP delle macchine da sottoporre al security probing ed un''indicazione del periodo in cui poter operare.\r\n\r\nQualora non ci siano modifiche rispetto al mese precedente o in caso di mancato riscontro, porteremo avanti l''attività    con le stesse modalità    (indirizzi IP e orario) del mese precedente, dandovi comunque comunicazione via email prima di iniziare una sessione di scan e al termine della stessa.\r\n', '-------------[{{date_time}}]-------------\r\nBuongiorno,\r\n\r\n\r\n\r\nCordiali saluti\r\n\r\n-- \r\n-------------[{{groups_email_sign}}]-------------', 'cmr_model', '5_noc,5_soc,5_operator,6_demo,7_programer', '', '', 'model', NOW());






-- INSERT IGNORE INTO `cmr_ticket` ( 
-- `id` , `number` , `lang` , `title` , `work_by` , `call_log_user` , `call_log_group` , `call_method` , `state` , `state_now` , `assign_to` , `list_user_impact` , `list_group_impact` , `list_asset_impact` , `severity` , `sla` , `mail_title` , `mail_from` , `mail_to` , `mail_cc` , `mail_bcc` , `attach` , `type` , `text` , `mail_text` , `my_master` , `allow_level` , `allow_email` , `allow_groups` , `comment` , `date_time` )
-- SELECT  
-- `id` , `number` , NULL , `title` , `by` , `mail_to` , `group` , NULL , `state` , `state_now` , `assign_to` , `mail_to` , `group` , NULL , `priority` , NULL , `title` , `mail_from` , `mail_to` , `mail_cc` , `mail_bcc` , `allegato` , `type` , `text` , `text` , NULL ,  NULL , `mail_to` , `group` , NULL , `date_time` 
-- FROM `tstm_db`.`tstm_ticket`;


-- INSERT IGNORE INTO `cmr_asset` ( `id` , `serial` , `mac_adress` , `name` , `location` , `ip` , `nat_ip` , `mask` , `gateway` , `dns1` , `dns2` , `type` , `os` , `state` , `login_id` , `login_pw` , `check_command` , `certificate` , `my_master` , `allow_level` , `allow_email` , `allow_groups` , `my_software` , `my_service` , `comment` , `date_time` )
-- SELECT  
--  `id` , NULL , `mac_adress` , `name` , NULL , `ip` , `nat_ip` , NULL , NULL , NULL , NULL , `type` , `os` , `state` , `login_id` , `login_pw` , `check_command` , NULL , NULL , NULL , NULL , NULL , NULL , NULL , `inf` , `date_time` 
-- FROM `tstm_db`.`tstm_host`;


-- INSERT IGNORE INTO `cmr_services` (
-- `id` ,`name` ,`port` ,`protocol` ,`check_command` ,`my_master` ,`my_slave` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- SELECT  
-- `id` ,`name` ,`port` ,`protocol` ,`check_command` ,NULL ,NULL ,NULL ,NULL ,NULL ,`inf` ,`date_time`
-- FROM `tstm_db`.`tstm_services`;


--  INSERT IGNORE INTO `cmr_command` (
-- `id` ,`command_name` ,`command_line` ,`state` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- SELECT  
-- `id` ,`command_name` ,`command_line` ,NULL ,NULL ,NULL ,NULL ,`inf` , `date_time` 
-- FROM `tstm_db`.`tstm_command`;


-- INSERT IGNORE INTO `cmr_contact` (
-- `id` ,`uid` ,`name` ,`last_name` ,`sexe` ,`function` ,`email` ,`email_sign` ,`tel` ,`cel` ,`adress` ,`location` ,`country` ,`type` ,`state` ,`status` ,`lang` ,`style` ,`public_key` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- SELECT  
-- `id` ,`uid` ,`name` ,`last_name` ,NULL ,NULL ,`email` ,NULL ,`tel` ,`cel` ,NULL ,NULL ,NULL ,NULL ,`state` ,NULL ,`lang` ,`style` ,`public_key` ,NULL ,NULL ,NULL ,`inf` , `date_time` 
-- FROM `tstm_db`.`tstm_user`;


-- INSERT IGNORE INTO `cmr_email` (
-- `id` ,`encoding` ,`lang` ,`header` ,`mail_title` ,`mail_from` ,`mail_to` ,`mail_cc` ,`mail_bcc` ,`attach` ,`text` ,`my_master` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- SELECT  
-- `id` ,NULL ,NULL ,NULL ,`title` ,`mail_from` ,`mail_to` ,`mail_cc` ,`mail_bcc` ,`allegato` ,`text` ,NULL ,NULL ,NULL ,NULL ,NULL , `date_time` 
-- FROM `tstm_db`.`tstm_ticket`;



-- INSERT IGNORE INTO `cmr_escalation` (
-- `id` ,`ticket_number` ,`action` ,`id_ticket` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- SELECT  
-- `id` ,`number` ,`state_now` ,`id` ,NULL ,NULL ,NULL ,NULL , `date_time` 
-- FROM `tstm_db`.`tstm_ticket`;



-- INSERT IGNORE INTO `cmr_father_groups` (
-- `id` ,`group_father` ,`group_child` ,`state` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- SELECT  
-- `id` ,`group_father` ,`group_child` ,`state` ,NULL ,NULL ,NULL ,NULL , `date_time` 
-- FROM `tstm_db`.`tstm_father_group`;



-- INSERT IGNORE INTO `cmr_groups` (
-- `id` ,`name` ,`state` ,`level` ,`location` ,`type` ,`sla` ,`public_key` ,`private_key` ,`pass_phrase` ,`email_sign` ,`referent_email` ,`admin_email` ,`home` ,`notify` ,`web_site` ,`login_script` ,`adress` ,`my_master` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- SELECT  
-- `id` ,`name` ,`state` ,`level` ,NULL ,NULL ,NULL ,NULL ,NULL ,NULL ,NULL ,NULL ,NULL ,NULL ,NULL ,NULL ,`config` ,NULL ,NULL ,NULL ,NULL ,NULL ,`inf` , `date_time` 
-- FROM `tstm_db`.`tstm_group`;



-- INSERT IGNORE INTO `cmr_message` (
-- `id` ,`sender` ,`title` ,`lang` ,`text` ,`groups_dest` ,`users_dest` ,`modules_dest` ,`ripetitive` ,`repeat_end` ,`begin_time` ,`end_time` ,`intervale` ,`priority` ,`type` ,`state` ,`my_master` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- SELECT  
-- `id` ,`sender` ,`title` ,NULL ,`text` ,`groups_dest` ,`user_dest` ,`modules_dest` ,`ripetitive` ,`ripeat_end` ,`begin_time` ,`end_time` ,`intervale` ,`priority` ,NULL ,`state` ,NULL ,NULL ,NULL ,NULL ,NULL , `date_time` 
-- FROM `tstm_db`.`tstm_message`;



-- INSERT IGNORE INTO `cmr_message_read` (
-- `id` ,`user_email` ,`message_id` ,`date_time`)
-- SELECT  
-- `id` ,`user_email` ,`id_message` , `date_time` 
-- FROM `tstm_db`.`tstm_message_read`;



-- INSERT IGNORE INTO `cmr_nagios` (
-- `id` ,`group_name` ,`nagios_group` ,`config` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- SELECT  
-- `id` ,`name` ,`nagios_group` ,NULL ,NULL ,`rif_scc` ,`name` ,`inf` , `date_time` 
-- FROM `tstm_db`.`tstm_client`;



-- INSERT IGNORE INTO `cmr_nessus` (
-- `id` ,`group_name` ,`nessus_ip` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- SELECT  
-- `id` ,`name` ,`nessus_ip` ,NULL ,`rif_scc` ,`name` ,`inf` , `date_time` 
-- FROM `tstm_db`.`tstm_client`;


-- INSERT IGNORE INTO `cmr_session` (
-- `id` ,`sessionid` ,`sessionip` ,`user_email` ,`status` ,`state` ,`time_out` ,`session_end` ,`date_time`)
-- SELECT  
-- `id` ,`session_id` ,NULL ,`user_email` ,NULL ,`state` ,NULL ,NULL , `date_time` 
-- FROM `tstm_db`.`tstm_session`;


-- INSERT IGNORE INTO `cmr_ticket_read` (
-- `id` ,`user_email` ,`ticket_id` ,`date_time`)
-- SELECT  
-- `id` ,`user_email` ,`ticket_id` ,`date_time`
-- FROM `tstm_db`.`tstm_ticket_read`;



-- INSERT IGNORE INTO `cmr_user` (
-- `id` ,`uid` ,`name` ,`last_name` ,`nickname` ,`sexe` ,`role` ,`sla` ,`pw` ,`email` ,`email_sign` ,`tel` ,`cel` ,`home` ,`adress` ,`location` ,`state` ,`type` ,`status` ,`level` ,`lang` ,`style` ,`login_script` ,`certificate` ,`photo` ,`my_master` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- SELECT  
-- `id` ,`uid` ,`name` ,`last_name` ,`uid` ,NULL ,NULL ,NULL ,`pw` ,`email` ,NULL ,`tel` ,`cel` ,NULL ,NULL ,NULL ,`state` ,NULL ,NULL ,`level` ,`lang` ,`style` ,`config` ,`private_key` ,NULL ,NULL ,NULL ,`email` ,NULL ,`inf` , `date_time` 
-- FROM `tstm_db`.`tstm_user`;



-- INSERT IGNORE INTO `cmr_user_groups` (
-- `id` ,`user_email` ,`group_name` ,`type` ,`state` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- SELECT  
-- `id` ,`user_email` ,`group_name` ,`type` ,`state` ,NULL ,NULL ,`group_name` ,NULL , `date_time` 
-- FROM `tstm_db`.`tstm_user_group`;





























--`tstm_host_dependence` `id` ,`first_host_id` ,`second_host_id` ,`first_host_name` ,`second_host_name` ,`state` ,`date_time`)
--`tstm_host_group` `id` ,`host_id` ,`host_name` ,`group_name` ,`date_time`)
--`tstm_host_services` `id` ,`host_id` ,`host_name` ,`service_name` ,`state` ,`date_time`)
--`tstm_host_user` `id` ,`user_email` ,`host_id` ,`host_ip` ,`date_time`)


--`tstm_client` `id` ,`uid` ,`name` ,`state` ,`adress` ,`date_time` ,`rif_scc` ,`contact` ,`tel` ,`cel` ,`email` ,`folder` ,`nagios_group` ,`nessus_ip` ,`inf` ,`sla`)
--`tstm_ticket_read` `id` ,`user_email` ,`ticket_id` ,`date_time`)
--`tstm_user_group` `id` ,`user_email` ,`group_name` ,`type` ,`state` ,`date_time`)
--`tstm_user` `id` ,`uid` ,`name` ,`last_name` ,`pw` ,`email` ,`tel` ,`cel` ,`state` ,`level` ,`lang` ,`style` ,`config` ,`public_key` ,`private_key` ,`pass_phrase` ,`inf` ,`date_time`)
--`tstm_session` `id` ,`session_id` ,`user_email` ,`state` ,`auto_login` ,`date_time`)
--`tstm_client` `id` ,`uid` ,`name` ,`state` ,`adress` ,`date_time` ,`rif_scc` ,`contact` ,`tel` ,`cel` ,`email` ,`folder` ,`nagios_group` ,`nessus_ip` ,`inf` ,`sla`)
--`tstm_message_read` `id` ,`user_email` ,`id_message` ,`date_time`)
--`tstm_message` `id` ,`sender` ,`title` ,`text` ,`groups_dest` ,`user_dest` ,`modules_dest` ,`ripetitive` ,`ripeat_end` ,`begin_time` ,`end_time` ,`intervale` ,`priority` ,`state` ,`date_time`)
--`tstm_group` `id` ,`name` ,`state` ,`level` ,`config` ,`inf` ,`nagios_group` ,`date_time`)
--`tstm_father_group` `id` ,`group_father` ,`group_child` ,`state` ,`date_time`)
--`tstm_ticket` `id` , `number` , `title` , `group` , `by` , `date_time` , `state` , `state_now` , `assign_to` , `priority` , `expire` , `mail_from` , `mail_to` , `mail_cc` , `mail_bcc` , `allegato` , `type` , `resolv_id` , `text` 
--`tstm_ticket` `id` , `number` , `title` , `group` , `by` , `date_time` , `state` , `state_now` , `assign_to` , `priority` , `expire` , `mail_from` , `mail_to` , `mail_cc` , `mail_bcc` , `allegato` , `type` , `resolv_id` , `text` 
--`tstm_user` `id` ,`uid` ,`name` ,`last_name` ,`pw` ,`email` ,`tel` ,`cel` ,`state` ,`level` ,`lang` ,`style` ,`config` ,`public_key` ,`private_key` ,`pass_phrase` ,`inf` ,`date_time`)
--`tstm_command` `id` ,`command_name` ,`command_line` ,`inf` ,`date_time`)
--`tstm_services` `id` ,`name` ,`port` ,`protocol` ,`check_command` ,`inf` ,`date_time`)
--`tstm_host` `id` ,`mac_adress` ,`name` ,`ip` ,`nat_ip` ,`type` ,`os` ,`state` ,`login_id` ,`login_pw` ,`check_command` ,`inf` ,`date_time`)
--`tstm_ticket` `id` , `number` , `title` , `group` , `by` , `date_time` , `state` , `state_now` , `assign_to` , `priority` , `expire` , `mail_from` , `mail_to` , `mail_cc` , `mail_bcc` , `allegato` , `type` , `resolv_id` , `text` 






-- INSERT IGNORE INTO `cmr_asset` ( `id` , `serial` , `mac_adress` , `name` , `location` , `ip` , `nat_ip` , `mask` , `gateway` , `dns1` , `dns2` , `type` , `os` , `state` , `login_id` , `login_pw` , `check_command` , `certificate` , `my_master` , `allow_level` , `allow_email` , `allow_groups` , `my_software` , `my_service` , `comment` , `date_time` 
-- VALUES (
-- '', NULL , NULL , 'localhost', NULL , '127.0.0.1', '', NULL , NULL , NULL , NULL , 'pc', '', 'active', '', '', 'extern_command.name', 'extern_certificate.to_cn', '', '5_noc,5_soc,5_operator,6_admin,7_programer', '', '', '', '', 'localhost', NOW( )
-- );

-- INSERT IGNORE INTO `cmr_account` ( `id` , `url` , `user_email` , `uid` , `pw` , `server` , `service` , `port` , `protocol` , `allow_level` , `allow_email` , `allow_groups` , `comment` , `date_time` )
-- VALUES (
-- '', 'http://localhost', 'admin@localhost', 'admin', MD5( 'admin' ) , 'localhost', 'extern_service.name', '0', '', '5_noc,5_soc,5_operator,6_admin,7_programer', '', '', '', NOW( )
-- );




-- INSERT IGNORE INTO `cmr_certificate` (
-- `id` ,`serial` ,`user_email` ,`version` ,`to_cn` ,`to_o` ,`to_ou` ,`from_cn` ,`from_o` ,`from_ou` ,`valid_from` ,`valid_to` ,`state` ,`cert_pkcs` ,`pub_key_pkcs` ,`status` ,`type` ,`login_script` ,`public_key` ,`private_key` ,`pass_phrase` ,`my_master` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- VALUES (
-- NULL , 'null', '', '', NULL , NULL , NULL , NULL , NULL , NULL , NULL , '0000-00-00 00:00:00', 'active', NULL , '', NULL , 'default', '', '', '', '', '', '5_noc,5_soc,5_operator,6_admin,7_programer', '', '', '', NOW( )
-- );




-- INSERT IGNORE INTO `cmr_cron` (
-- `id` ,`name` ,`command` ,`at` ,`type` ,`state` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- VALUES (
-- NULL , 'null', 'extern_command.name', NOW( ) , 'normal', 'active', '5_noc,5_soc,5_operator,6_admin,7_programer', '', '', '', '00000000000000'
-- );



-- INSERT IGNORE INTO `cmr_download` (
-- `id` ,`url` ,`path` ,`file_name` ,`file_type` ,`file_size` ,`state` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- VALUES (
-- NULL , 'null', NULL , NULL , NULL , NULL , 'active', '5_noc,5_soc,5_operator,6_admin,7_programer', '', '', '', NOW( )
-- );




-- INSERT IGNORE INTO `cmr_faq` (
-- `id` ,`name` ,`argoment` ,`question` ,`response` ,`state` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- VALUES (
-- NULL , '', '', NULL , '', 'active', '5_noc,5_soc,5_operator,6_admin,7_programer', '', '', '', NOW( )
-- );



-- INSERT IGNORE INTO `cmr_forum` (
-- `id` ,`name` ,`argoment` ,`text` ,`my_master` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- VALUES (
-- NULL , 'null', '', '', '', '5_noc,5_soc,5_operator,6_admin,7_programer', '', '', '', NOW( )
-- );



-- INSERT IGNORE INTO `cmr_generator` (
-- `id` ,`db` ,`table` ,`column` ,`code1` ,`code2` ,`code3` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- VALUES (
-- NULL , '', '0', '', '@_database_@', '?_foreach_comment_?([^?]*)??_foreach_comment_??', '{{date_time}}', '5_noc,5_soc,5_operator,6_admin,7_programer', '', '', '', NOW( )
-- );



-- INSERT IGNORE INTO `cmr_rss` (
-- `id` ,`version` ,`title` ,`link` ,`language` ,`rating` ,`state` ,`feed_adress` ,`type` ,`text` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- VALUES (
-- '0', '', 'No title', '', '', '', 'active', NULL , 'normal', NULL , '5_noc,5_soc,5_operator,6_admin,7_programer', '', '', '', NOW( )
-- );



-- INSERT IGNORE INTO `cmr_sla` (
-- `id` ,`user_email` ,`group_name` ,`asset_ip` ,`user_type` ,`group_type` ,`asset_type` ,`ticket_type` ,`ticket_call_method` ,`ticket_state` ,`ticket_severity` ,`ticket_assign_to` ,`num_user_impact` ,`num_group_impact` ,`num_asset_impact` ,`sla` ,`comment` ,`date_time`)
-- VALUES (
-- NULL , 'extern_user.email', 'extern_groups.name', '', 'user', 'tstm', 'tstm', 'normal', 'by_email', 'open', 'normal', NULL , NULL , NULL , NULL , '3 DAY', '', NOW( )
-- );



-- INSERT IGNORE INTO `cmr_software` (
-- `id` ,`name` ,`type` ,`copyrigth` ,`certificate` ,`my_master` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- VALUES (
-- NULL , '', '', '', 'extern_certificate.to_cn', '', '5_noc,5_soc,5_operator,6_admin,7_programer', '', '', '', NOW( )
-- );



-- INSERT IGNORE INTO `cmr_statistic` (
-- `id` ,`name` ,`type` ,`period_begin` ,`period_end` ,`data` ,`my_master` ,`allow_level` ,`allow_email` ,`allow_groups` ,`comment` ,`date_time`)
-- VALUES (
-- NULL , '', '', NOW( ) , '00000000000000', '', '', '5_noc,5_soc,5_operator,6_admin,7_programer', '', '', '', NOW( )
-- );


