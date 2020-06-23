# camaroes
Camaroes is a professional and modular Trouble Shooting Ticket system(TSTM).

REQUIREMENTS
------------

First you must have the base environment for Camaroes.
We have thoroughly tested Camaroes! on: Linux, Free BSD, Mac OS X and Windows.
Linux or one of the BSD's are recommended, but anything else that can run the
3 pieces of software listed below should do it.

Apache	-> http://www.apache.org
MySQL	-> http://www.mysql.com
PHP	-> http://www.php.net

for install goto:
http://your_server/camaroes/index.php?cmr_mode=install

after install

- login at [admin]
- run generator by going to the [Admin]menu and [generator]
- Choose this:
   Database Type: mysql
   Database source : From server
   model source : From server
   Output: In application auto folders
   ....etc  -> don't change
   Tabella Prefix : cmr_
      ....etc  -> don't change
   Tabella Of [ camaroes_db ] -> select all
   Models Group : [ php ] -> select all
      ....etc  -> don't change
   Click on [generate] 
  To complete at all the install procedure


   

SERVER CONFIGURATION
--------------------

You MUST ensure that PHP has been compiled with support for MySQL

this is the general static configuration file ./conf.d/conf.ini
the first configuration file is ./config.inc.php
the compagny configuration file is ./conf.d/conf_compagny.ini
the database configuration file is ./conf.d/conf_database.ini
the login configuration file is ./conf.d/conf_login.ini
the security configuration file is ./conf.d/conf_security.ini
the smtp configuration file is ./conf.d/conf_smtp.ini
the group configuration file is ./home/groups/{group_name}/config.ini
the user configuration file is ./home/groups/{user_name}/config.ini
	
	
to configure the interface (module windows position) for all user, see ./page/page.ini or ./themes/themes.ini or ./css/camaroes.css
to configure the interface (module windows position) for a group, see ./home/{group_name}/page.ini or ./home/{user_name}/page.ini
	
the language file is ./language.ini or ./language/lang_to_use/language.ini
the default windows themes configuration file ./themes/themes.ini or ./themes/{themes_folder}/themes.ini

the database connection configuation can_be ./conf.d/conf.ini or ./config.inc.php or ./conf.d/conf.ini or ./home/{group_name}/login_rc.php  or ./home/{group_name}/config.ini  or ./home/{user_name}/config.ini (the default one is in ./conf.d/conf.ini )

the database connection configuation is  (the default one is in ./conf.d/conf_database.ini, ./config.inc.php)


While we have reports that Camaroes! works on IIS server we recommend Apache
for running Camaroes! on Windows.
