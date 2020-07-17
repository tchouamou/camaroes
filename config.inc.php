<?php
#
#this is the first Configuration file ./config.inc.php
#
    #the first configuration file is ./config.inc.php
    #the general dynamic configuration files are ./conf.d/conf.ini, ./config.inc.php
    #the group configuration file is ./home/groups/{group_name}/config.ini
    #the user configuration file is ./home/groups/{user_name}/config.ini


    #to configure the interface (module windows position) for all user, see ./page/page.ini or ./themes/themes.ini or ./css/camaroes.css
    #to configure the interface (module windows position) for a group, see ./home/{group_name}/page.ini or ./home/{user_name}/page.ini

    #the language file is ./language.ini or ./language/lang_to_use/language.ini
    #the default windows themes configuration file ./themes/themes.ini or ./themes/{themes_folder}/themes.ini

    #the database connection configuation can_be ./conf.d/conf.ini or ./config.inc.php or ./conf.d/conf.ini or ./home/{group_name}/login_rc.php  or ./home/{group_name}/config.ini  or ./home/{user_name}/config.ini (the default one is in ./conf.d/conf.ini )

    # the database connection configuation is in ./home/{group}/connect.php (the default one is in config.inc.php, ./conf.d/conf.ini )

//####################################################
define("cmr_version", "3.0");

//---------[Initial files Settings]-------------
$cmr->config["cmr_main_config"] = dirname(__FILE__) . "/conf.d/conf.ini"; //-- es: /etc/camaroes/camaroes.conf
$cmr->config["cmr_database_config"] = dirname(__FILE__) . "/conf.d/conf_database.ini"; //-- es: /etc/camaroes/camaroes.conf
$cmr->config["cmr_compagny_config"] = dirname(__FILE__) . "/conf.d/conf_compagny.ini"; //-- es: /etc/camaroes/camaroes.conf
$cmr->config["cmr_smtp_config"] = dirname(__FILE__) . "/conf.d/conf_smtp.ini"; //-- es: /etc/camaroes/camaroes.conf
//---------[Initial files Settings]-------------

//---------[Database Settings]-------------
$cmr->config["cmr_use_db"] = "1";
$cmr->config["cmr_guest_mode"] = "1";
$cmr->config["cmr_table_prefix"] = "cmr_";
$cmr->config["cmr_default_table"] = "ticket";
//---------[Database Settings]-------------

//---------[Database Settings]-------------
$cmr->config["db_type"] = "mysqli";
$cmr->config["db_name"] = "camaroes_db";
$cmr->config["db_host"] = "localhost";
$cmr->config["db_port"] = "3306";
$cmr->config["db_socket"] = "";
$cmr->config["db_user"] = "root";
$cmr->config["db_pw"] = "";
//---------[Database Settings]-------------




//---------[Path Settings]-------------
//$cmr->config["cmr_www_path"]=substr($_SERVER["SCRIPT_URI"], 0, strrpos($_SERVER["SCRIPT_URI"], "/")) . "/";// es: http://my_web/
$cmr->config["cmr_www_path"]= "";// es: http://my_web/


$cmr->config["cmr_path"] = dirname(__FILE__) . "/";// es: /usr/share/camaroes/
$cmr->config["cmr_engine_path"] = dirname(__FILE__) . "/";// es: /usr/share/camaroes/
$cmr->config["cmr_home_path"] = dirname(__FILE__) . "/";// es: /home/
$cmr->config["cmr_log_path"] = dirname(__FILE__) . "/"; // es: /var/log/camaroes/
$cmr->config["cmr_module_path"] = dirname(__FILE__) . "/";// es: /usr/share/camaroes/
$cmr->config["cmr_db_path"] = dirname(__FILE__) . "/";// es: /var/spool/camaroes/
$cmr->config["cmr_help_path"] = dirname(__FILE__) . "/";// es: /usr/share/camaroes/
$cmr->config["cmr_func_path"] = dirname(__FILE__) . "/";// es: /usr/share/camaroes/
$cmr->config["cmr_class_path"] = dirname(__FILE__) . "/";// es: /usr/share/camaroes/
$cmr->config["cmr_conf_path"] = dirname(__FILE__) . "/";// es: /etc/camaroes/
$cmr->config["cmr_image_path"] = dirname(__FILE__) . "/";// es: /usr/share/camaroes/
$cmr->config["cmr_lang_path"] = dirname(__FILE__) . "/";// es: /usr/share/camaroes/
$cmr->config["cmr_theme_path"] = dirname(__FILE__) . "/";// es: /usr/share/camaroes/
$cmr->config["cmr_tab_path"] = dirname(__FILE__) . "/";// es: /usr/share/camaroes/
$cmr->config["cmr_get_data_path"] = dirname(__FILE__) . "/";// es: /usr/get_data/camaroes/
$cmr->config["cmr_notify_path"] = dirname(__FILE__) . "/";// es: /usr/share/camaroes/
$cmr->config["cmr_template_path"] = dirname(__FILE__) . "/";// es: /usr/share/camaroes/
$cmr->config["cmr_model_path"] = dirname(__FILE__) . "/";// es: /usr/share/camaroes/
$cmr->config["cmr_install_path"] = dirname(__FILE__) . "/";// es: /usr/share/camaroes/
$cmr->config["cmr_font_path"] = dirname(__FILE__) . "/";// es: /usr/share/camaroes/
$cmr->config["cmr_gd_font_path"] = dirname(__FILE__) . "/fonts/";// es: /usr/share/camaroes/fonts/
$cmr->config["cmr_session_path"] = dirname(__FILE__) . "/temp/";// es: /temp/
$cmr->config["cmr_temp_path"] = dirname(__FILE__) . "/temp/";// es: /temp/
//---------[Database Settings]-------------
