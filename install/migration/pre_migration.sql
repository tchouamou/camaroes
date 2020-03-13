-- phpMyAdmin SQL Dump
-- version 2.6.2-Debian-3sarge1
-- http://www.phpmyadmin.net
--
-- Host: castore:3306
-- Generato il: 22 Set, 2006 at 07:45 AM
-- Versione MySQL: 4.0.24
-- Versione PHP: 4.3.10-16
--
-- Database: tstm_db
--

-- --------------------------------------------------------

--
--  tstm_client
--
-- DROP (the) DATABASE IF NOT EXISTS tstm_new ;
--

CREATE DATABASE IF NOT EXISTS tstm_new ;

CREATE TABLE IF NOT EXISTS tstm_client (
  id bigint(20) NOT NULL auto_increment,
  uid varchar(60) NOT NULL default '',
  name varchar(40) NOT NULL default '',
  state enum('active','disactivated') NOT NULL default 'active',
  adress text,
  date_time timestamp(14) NOT NULL,
  rif_scc varchar(60) default NULL,
  contact text,
  tel text,
  cel text,
  email text NOT NULL,
  folder text,
  nagios_group varchar(80) default NULL,
  nessus_ip text,
  inf text,
  sla varchar(20) default NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY nome (name)
) TYPE=MyISAM AUTO_INCREMENT=71 ;

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_client
SELECT *
FROM tstm_db.tstm_client ;
--
--  tstm_command
--

CREATE TABLE IF NOT EXISTS tstm_command (
  id int(11) NOT NULL auto_increment,
  command_name varchar(254) NOT NULL default '',
  command_line varchar(254) NOT NULL default '',
  inf text NOT NULL,
  date_time timestamp(14) NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY name (command_name)
) TYPE=MyISAM AUTO_INCREMENT=69 ;

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_command
SELECT *
FROM tstm_db.tstm_command ;

--
--  tstm_father_group
--

CREATE TABLE IF NOT EXISTS tstm_father_group (
  id bigint(20) NOT NULL auto_increment,
  group_father varchar(60) NOT NULL default '',
  group_child varchar(60) NOT NULL default '',
  state enum('active','disactivated') NOT NULL default 'active',
  date_time timestamp(14) NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY group_father (group_father,group_child)
) TYPE=MyISAM AUTO_INCREMENT=358 ;

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_father_group
SELECT *
FROM tstm_db.tstm_father_group ;

--
--  tstm_groups
--

CREATE TABLE IF NOT EXISTS tstm_groups (
  id bigint(20) NOT NULL auto_increment,
  name varchar(60) NOT NULL default '',
  state enum('active','disactivated') NOT NULL default 'active',
  level enum('0','1','2','3','4','5') NOT NULL default '0',
  config text,
  inf text,
  nagios_group varchar(80) default NULL,
  date_time timestamp(14) NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY name (name)
) TYPE=MyISAM AUTO_INCREMENT=80 ;

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_groups
SELECT *
FROM tstm_db.tstm_group ;

--
--  tstm_host
--

CREATE TABLE IF NOT EXISTS tstm_host (
  id bigint(20) NOT NULL auto_increment,
  mac_adress varchar(60) default NULL,
  name varchar(124) NOT NULL default 'localhost',
  ip varchar(60) NOT NULL default '127.0.0.1',
  nat_ip varchar(60) NOT NULL default '',
  type varchar(124) NOT NULL default 'pc',
  os varchar(124) NOT NULL default '',
  state varchar(60) NOT NULL default 'active',
  login_id varchar(80) NOT NULL default '',
  login_pw varchar(124) NOT NULL default '',
  check_command varchar(254) NOT NULL default '',
  inf text NOT NULL,
  date_time timestamp(14) NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY name (name,ip)
) TYPE=MyISAM COMMENT='Tabella di tutti gli host' AUTO_INCREMENT=183 ;

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_host
SELECT *
FROM tstm_db.tstm_host ;


--
--  tstm_host_dependence
--

CREATE TABLE IF NOT EXISTS tstm_host_dependence (
  id bigint(20) NOT NULL auto_increment,
  first_host_id bigint(20) NOT NULL default '0',
  second_host_id bigint(20) NOT NULL default '0',
  first_host_name varchar(124) NOT NULL default '',
  second_host_name varchar(124) NOT NULL default '',
  state varchar(60) default 'active',
  date_time timestamp(14) NOT NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM AUTO_INCREMENT=331 ;

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_host_dependence
SELECT *
FROM tstm_db.tstm_host_dependence ;


--
--  tstm_host_group
--

CREATE TABLE IF NOT EXISTS tstm_host_group (
  id bigint(20) NOT NULL auto_increment,
  host_id bigint(20) NOT NULL default '0',
  host_name varchar(124) NOT NULL default '',
  group_name varchar(60) NOT NULL default '0',
  date_time timestamp(14) NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY host_name (host_name,group_name)
) TYPE=MyISAM COMMENT='Tabella del raporto host e gruppo (cliente)' AUTO_INCREMENT=24 ;

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_host_group
SELECT *
FROM tstm_db.tstm_host_group ;

--
--  tstm_host_services
--

CREATE TABLE IF NOT EXISTS tstm_host_services (
  id bigint(20) NOT NULL auto_increment,
  host_id bigint(20) NOT NULL default '0',
  host_name varchar(124) NOT NULL default '',
  service_name varchar(124) NOT NULL default '0',
  state varchar(60) NOT NULL default '',
  date_time timestamp(14) NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY host_name (host_name,service_name)
) TYPE=MyISAM AUTO_INCREMENT=154 ;

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_host_services
SELECT *
FROM tstm_db.tstm_host_services ;


--
--  tstm_host_user
--

CREATE TABLE IF NOT EXISTS tstm_host_user (
  id bigint(20) NOT NULL auto_increment,
  user_email varchar(124) NOT NULL default '0',
  host_id bigint(20) NOT NULL default '0',
  host_ip varchar(60) NOT NULL default '',
  date_time timestamp(14) NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY user_id (user_email,host_id)
) TYPE=MyISAM COMMENT='Tabella del rapporto host e utente' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_host_user
SELECT *
FROM tstm_db.tstm_host_user ;

--
--  tstm_message
--

CREATE TABLE IF NOT EXISTS tstm_message (
  id bigint(20) NOT NULL auto_increment,
  sender varchar(80) NOT NULL default '',
  title varchar(254) NOT NULL default 'No title',
  text text,
  groups_dest text,
  user_dest text NOT NULL,
  modules_dest text NOT NULL,
  ripetitive int(11) NOT NULL default '0',
  ripeat_end timestamp(14) NOT NULL,
  begin_time timestamp(14) NOT NULL default '00000000000000',
  end_time timestamp(14) NOT NULL default '00000000000000',
  intervale timestamp(14) NOT NULL default '00000000000000',
  priority int(11) NOT NULL default '0',
  state enum('active','disactivated') NOT NULL default 'active',
  date_time timestamp(14) NOT NULL default '00000000000000',
  PRIMARY KEY  (id)
) TYPE=MyISAM AUTO_INCREMENT=6 ;

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_message
SELECT *
FROM tstm_db.tstm_message ;

--
--  tstm_message_read
--

CREATE TABLE IF NOT EXISTS tstm_message_read (
  id bigint(20) NOT NULL default '0',
  user_email varchar(124) NOT NULL default '',
  id_message int(11) NOT NULL default '0',
  date_time timestamp(14) NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY id_user (user_email,id_message)
) TYPE=MyISAM COMMENT='Tabella dei messaggi gia letti per utente';

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_message_read
SELECT *
FROM tstm_db.tstm_message_read ;


--
--  tstm_problem
--

CREATE TABLE IF NOT EXISTS tstm_problem (
  id int(11) NOT NULL auto_increment,
  title varchar(124) NOT NULL default '',
  text text NOT NULL,
  count int(11) NOT NULL default '0',
  date_time timestamp(14) NOT NULL,
  PRIMARY KEY  (id),
  FULLTEXT KEY text (text)
) TYPE=MyISAM COMMENT='tabella dei problemi' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_problem
SELECT *
FROM tstm_db.tstm_problem ;

--
--  tstm_resolv
--

CREATE TABLE IF NOT EXISTS tstm_resolv (
  id int(11) NOT NULL auto_increment,
  problem_id int(11) NOT NULL default '0',
  problem_title varchar(124) NOT NULL default '',
  solution_id int(11) NOT NULL default '0',
  solution_title varchar(124) NOT NULL default '',
  date_time timestamp(14) NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY problem_id (problem_id,solution_id)
) TYPE=MyISAM COMMENT='relazione tra plroblemi e soluzioni' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_resolv
SELECT *
FROM tstm_db.tstm_resolv ;


--
--  tstm_services
--

CREATE TABLE IF NOT EXISTS tstm_services (
  id bigint(20) NOT NULL auto_increment,
  name varchar(124) NOT NULL default '',
  port int(11) NOT NULL default '0',
  protocol varchar(60) NOT NULL default '',
  check_command varchar(254) NOT NULL default '',
  inf text NOT NULL,
  date_time timestamp(14) NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY name (name)
) TYPE=MyISAM AUTO_INCREMENT=72 ;

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_services
SELECT *
FROM tstm_db.tstm_services ;

--
--  tstm_session
--

CREATE TABLE IF NOT EXISTS tstm_session (
  id int(11) NOT NULL auto_increment,
  session_id varchar(254) NOT NULL default '',
  user_email varchar(254) NOT NULL default '',
  state varchar(64) NOT NULL default 'disconnect',
  auto_login varchar(64) NOT NULL default 'no',
  date_time timestamp(14) NOT NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM COMMENT='Tabella per la gestione delle sessioni' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_session
SELECT *
FROM tstm_db.tstm_session ;

--
--  tstm_solution
--

CREATE TABLE IF NOT EXISTS tstm_solution (
  id int(11) NOT NULL auto_increment,
  title varchar(124) NOT NULL default '',
  text text NOT NULL,
  count int(11) NOT NULL default '0',
  date_time timestamp(14) NOT NULL,
  PRIMARY KEY  (id),
  FULLTEXT KEY text (text)
) TYPE=MyISAM COMMENT='tabelle delle soluzioni' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_solution
SELECT *
FROM tstm_db.tstm_solution ;

--
--  tstm_ticket
--

CREATE TABLE IF NOT EXISTS tstm_ticket (
  id bigint(20) NOT NULL auto_increment,
  number varchar(20) NOT NULL default '',
  title varchar(254) NOT NULL default 'No title',
  group varchar(60) NOT NULL default 'soc',
  by varchar(60) NOT NULL default 'soc@sg.it',
  date_time timestamp(14) NOT NULL,
  state enum('open','update','close','unknow') NOT NULL default 'open',
  state_now enum('opened','updated','closed','unknow','open','update','close') NOT NULL default 'opened',
  assign_to text,
  priority enum('info','low','normal','medium','high') default 'normal',
  expire timestamp(14) NOT NULL default '00000000000000',
  mail_from text,
  mail_to text,
  mail_cc text,
  mail_bcc text,
  allegato text,
  type enum('normal','job','ids','xpu','va','va_inizio','va_interotto','va_concluso','xpu_new','xpu_update') NOT NULL default 'normal',
  resolv_id int(11) NOT NULL default '0',
  text longtext,
  PRIMARY KEY  (id),
  FULLTEXT KEY text (text)
) TYPE=MyISAM AUTO_INCREMENT=2721 ;

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_ticket
SELECT *
FROM tstm_db.tstm_ticket ;


--
--  tstm_ticket_read
--

CREATE TABLE IF NOT EXISTS tstm_ticket_read (
  id bigint(20) NOT NULL auto_increment,
  user_email varchar(60) NOT NULL default '0',
  ticket_id bigint(20) NOT NULL default '0',
  date_time timestamp(14) NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY user_id (user_email,ticket_id)
) TYPE=MyISAM COMMENT='tabella dei ticket gia letti per ogni utente' AUTO_INCREMENT=3688 ;

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_ticket_read
SELECT *
FROM tstm_db.tstm_ticket_read ;


--
--  tstm_user
--

CREATE TABLE IF NOT EXISTS tstm_user (
  id bigint(20) unsigned NOT NULL auto_increment,
  uid varchar(60) NOT NULL default '',
  name text,
  last_name varchar(40) default NULL,
  pw varchar(124) default NULL,
  email varchar(60) default NULL,
  tel varchar(40) default NULL,
  cel varchar(40) default NULL,
  state enum('active','disactivated') NOT NULL default 'active',
  level enum('0','1','2','3','4','5') NOT NULL default '0',
  lang varchar(20) NOT NULL default 'italian',
  style varchar(40) NOT NULL default 'default',
  config text NOT NULL,
  public_key text NOT NULL,
  private_key text NOT NULL,
  pass_phrase varchar(254) NOT NULL default '',
  inf text,
  date_time timestamp(14) NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY uid (uid),
  UNIQUE KEY email (email)
) TYPE=MyISAM AUTO_INCREMENT=130 ;

-- --------------------------------------------------------
INSERT INTO tstm_new.tstm_user
SELECT *
FROM tstm_db.tstm_user ;


--
--  tstm_user_group
--

CREATE TABLE IF NOT EXISTS tstm_user_group (
  id bigint(20) NOT NULL auto_increment,
  user_email varchar(60) NOT NULL default '',
  group_name varchar(60) NOT NULL default 'all_user',
  type enum('normal','contact','vip','admin') default 'normal',
  state enum('active','disactivated') NOT NULL default 'active',
  date_time timestamp(14) NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY user_email (user_email,group_name)
) TYPE=MyISAM AUTO_INCREMENT=221 ;

INSERT INTO tstm_new.tstm_user_group
SELECT *
FROM tstm_db.tstm_user_group ;

