# camaroes
Camaroes is a professional and modular Trouble Shooting Ticket system(TSTM).</br>
Camaroes Include: Database tool, File manager, Calendar, Webmail, a generator of module class button. Use a dynamique web interface.</br>

info</br>
Default admin User: 	admin</br>
Default admin Password: 	admin</br>
Default operator User: 	operator</br>
Default operator Password: 	operator</br>
Default Visitatore User: 	guest</br>
Default Visitatore Password: 	guest</br>

REQUIREMENTS
------------

First you must have the base environment for Camaroes.
We have thoroughly tested Camaroes! on: Linux, Free BSD, Mac OS X and Windows.</br>
Linux or one of the BSD's are recommended, but anything else that can run the
3 pieces of software listed below should do it.

Apache	-> http://www.apache.org
MySQL	-> http://www.mysql.com
PHP	-> http://www.php.net

for install goto:</br>
http://your_server/camaroes/index.php?cmr_mode=install</br>

after install</br>

- login at [admin]</br>
- run generator by going to the [Admin]menu and [generator]
- Choose this:</br>
   Database Type: mysql</br>
   Database source : From server</br>
   model source : From server</br>
   Output: In application auto folders</br>
   ....etc  -> don't change</br>
   Tabella Prefix : cmr_</br>
      ....etc  -> don't change</br>
   Tabella Of [ camaroes_db ] -> select all</br>
   Models Group : [ php ] -> select all</br>
      ....etc  -> don't change</br>
   Click on [generate] </br>
  To complete at all the install procedure</br>


   

SERVER CONFIGURATION
--------------------

You MUST ensure that PHP has been compiled with support for MySQL</br>

this is the general static configuration file ./conf.d/conf.ini</br>
the first configuration file is ./config.inc.php</br>
the compagny configuration file is ./conf.d/conf_compagny.ini</br>
the database configuration file is ./conf.d/conf_database.ini</br>
the login configuration file is ./conf.d/conf_login.ini</br>
the security configuration file is ./conf.d/conf_security.ini</br>
the smtp configuration file is ./conf.d/conf_smtp.ini</br>
the group configuration file is ./home/groups/{group_name}/config.ini</br>
the user configuration file is ./home/groups/{user_name}/config.ini</br>
	
	
to configure the interface (module windows position) for all user, see ./page/page.ini or ./themes/themes.ini or ./css/camaroes.css</br>
to configure the interface (module windows position) for a group, see ./home/{group_name}/page.ini or ./home/{user_name}/page.ini</br>
	
the language file is ./language.ini or ./language/lang_to_use/language.ini</br>
the default windows themes configuration file ./themes/themes.ini or ./themes/{themes_folder}/themes.ini</br>

the database connection configuation can_be ./conf.d/conf.ini or ./config.inc.php or ./conf.d/conf.ini or ./home/{group_name}/login_rc.php  or ./home/{group_name}/config.ini  or ./home/{user_name}/config.ini (the default one is in ./conf.d/conf.ini )</br>

the database connection configuation is  (the default one is in ./conf.d/conf_database.ini, ./config.inc.php)</br>


While we have reports that Camaroes! works on IIS server we recommend Apache
for running Camaroes! on Windows.
