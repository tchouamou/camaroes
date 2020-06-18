
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
(28, 'root', 'active', '5', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'a.s@sg.it', 'client root', 'root', 'by_email', NULL, NULL, 'no adress', 'test user only', '2005-10-05 22:36:14'),
(27, 'all_user', 'active', '1', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'a.s@sg.it', 'all_user_email@localhost', '', 'by_email', NULL, '\n\n$inf["page_title"]="TSTM ver.1.0 (2005)";\n$inf["layer"]="3";\n$inf["refresh"]="120";\n\n\n$inf["head1"]="page_logo.php";\n$inf["head2"]="head_menu.php";\n\n\n$inf["left1"]="";\n$inf["left2"]="";\n$inf["left3"]="";\n$inf["left4"]="";\n$inf["left5"]="";\n$inf["left6"]="";\n\n\n$inf["middle1"]="";\n$inf["middle3"]="";\n$inf["middle4"]="";\n$inf["middle5"]="";\n$inf["middle6"]="";\n\n\n$inf["rigth1"]="search.php";\n$inf["rigth3"]="view_working_ticket.php";\n$inf["rigth4"]="view_close_ticket.php";\n$inf["rigth5"]="view_message.php";\n$inf["rigth6"]="";\n$inf["rigth2"]="view_new_ticket.php";\n\n\n$inf["foot1"]="foot1.php";\n\n\n$inf["menu_head1"]="report.php?refresh=3600&layer=3&left1=&middle2=services.php&middle3=";\n$inf["menu_head2"]="tickets.php?refresh=3600&layer=3&left1=&middle2=&middle3=";\n$inf["menu_head3"]="resources.php?refresh=3600&layer=3&left1=&middle2=&middle3=&rigth1=resources_info.php&rigth2=&rigth3=&rigth4=";\n$inf["menu_head4"]="my_account.php?refresh=3600&layer=3&left1=&middle2=&middle3=";\n$inf["menu_head5"]="search_ticket.php";\n$inf["menu_head6"]="";\n$inf["menu_head7"]="";\n\n\n$inf["menu_left1"]="preview_all_ticket.php";\n$inf["menu_left2"]="search_ticket.php";\n$inf["menu_left3"]="view_new_ticket.php";\n$inf["menu_left4"]="view_working_ticket.php";\n$inf["menu_left5"]="view_close_ticket.php";\n$inf["menu_left6"]="view_message.php";\n$inf["menu_left7"]="services.php";\n$inf["menu_left8"]="report.php";\n$inf["menu_left9"]="my_account.php";\n$inf["menu_left10"]="new_user.php";\n$inf["menu_left11"]="new_group.php";\n$inf["menu_left12"]="user_to_group.php";\n$inf["menu_left13"]="remove_user.php";\n$inf["menu_left14"]="remove_group.php";\n$inf["menu_left15"]="search.php";\n$inf["menu_left16"]="";\n$inf["menu_left17"]="";\n$inf["menu_left18"]="";\n$inf["menu_left19"]="";\n$inf["menu_left20"]="";\n$inf["menu_left21"]="";\n$inf["menu_left22"]="";\n$inf["menu_left23"]="";\n$inf["menu_left24"]="";\n$inf["menu_left25"]="";\n$inf["menu_left26"]="";\n\n\n$inf["resources_refresh"]="";\n\n\n\n\n\n\n\n\n', '', 'all_user', '2005-11-09 16:23:59'),
(23, 'soc', 'active', '4', NULL, NULL, '2006-05-20 10:41:38', NULL, NULL, NULL, '\r\n\r\nDistinti saluti\r\n\r\n-- \r\nSecurity Operation Center\r\nS G s.r.l. Corso Svizzera, 185 - xxxxx Torino - Italy\r\nphone: +39 0110700912    fax: +39 0110700010\r\nwebsite: http://www.sg.it\r\n\r\n\r\n', 'a.s@sg.it', 'soc@sg.it', 'soc', 'by_email', NULL, NULL, 'corso svizzera 185 Torino', 'security operation center', '2005-10-13 18:49:03'),
(24, 'test', 'active', '3', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'a.s@sg.it', 'test@localhost', '', 'by_email', NULL, NULL, '', '<b>sg </b> <br />Corso Svizzera 185 xxxxx Torino <br />Recapiti fornitori: COLT (FIBRE) <br />Luca Testore 3492352135 Numero Verde Colt 800-909324 <br />per apertura ticket Support Trendmicro Maurizio Martinozzi (rif. Tecnico)06/4090181 <br />maurizio_martinozzi@trendmicro.it Angelica Alivesi (rif. di canale) 02/925931 <br />angelica_alivesi@trendmicro.it Supporto tecnico via mail support.trendmicro@itwayvad.com <br />virus_doctor@trendmicro.it FAX DEL SOC 011/07000010 <br />', '2005-10-25 11:07:13'),
(35, 'default', 'active', '0', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'a.s@sg.it', '', '', 'by_email', NULL, NULL, '', 'default', '2005-08-26 06:02:50'),
(37, 'cliente', 'active', '2', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'soc@sg.it', 'cliente@localhost', '', 'by_email', NULL, NULL, '', '', '2005-10-07 04:18:05'),
(59, 'last_level', 'active', '4', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'a.s@sg.it', 'last_level_mail@localhost', 'last_level', 'by_email', NULL, NULL, '', '', '2005-09-06 23:11:24'),
