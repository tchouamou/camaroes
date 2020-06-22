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
        
        
        
        $PE_config["current_language"] = "default"; //--(italian, english, french, default)
        
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
{print_r($_GET);
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
                        move_uploaded_file($_FILES[$key]["tmp_name"], ($PE_thevar["current_dir"] . "/" . basename($_FILES[$key]["name"])));
                        $PE_upload[] = ($PE_thevar["current_dir"] . "/" . basename($_FILES[$key]["name"]));
                        print("<br />" . PE_translate("transf_file") . $_FILES[$key]["tmp_name"] . "==> " . ($PE_thevar["current_dir"] . "/" . basename($_FILES[$key]["name"])) . "<br />");
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
                    $destination = "." . $PE_thevar["current_dir"];
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
                            $fich = @ fopen($PE_thevar["current_stream"] . $destination . PE_path_separator() . $name, "w+");
                            if(@ fwrite($fich, $buf)){
                                print("<br /> File [$name] " . PE_translate("succ_create") . ".......<br />");
								$PE_unzip = $PE_thevar["current_stream"] . $destination . PE_path_separator() . $name;
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
    $PE_language["current_language"] = "english"; //--(italian, english, french, default)
    
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
    
    
    $_SESSION["current_lang"] = PE_getpost("PE_select_lang");
//     $PE_language["encoding"] = PE_getpost("PE_select_encoding");
    $_SESSION["current_encoding"] = PE_translate("encoding");
    

    
    if((!empty($_SESSION["current_lang"])) && file_exists($PE_config["lang_path"] . "/" . $_SESSION["current_lang"] . "/language.php")){
        include($PE_config["default_stream"] . $PE_config["lang_path"] . "/" . $_SESSION["current_lang"] . "/language.php"); //--language file
        $_SESSION["current_language"] = $_SESSION["current_lang"];
    } elseif(!empty($_SESSION["current_language"]) && (file_exists($PE_config["lang_path"] . "/" . $_SESSION["current_language"] . "/language.php"))){
        include($PE_config["default_stream"] . $PE_config["lang_path"] . "/" . $_SESSION["current_language"] . "/language.php"); //--language file
    } elseif(file_exists($PE_config["lang_path"] . "/" . $PE_config["current_language"] . "/language.php")){
        include($PE_config["default_stream"] . $PE_config["lang_path"] . "/" . $PE_config["current_language"] . "/language.php"); //--language file
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
                    $stream_data = PE_zipfiles(array($input_data), realpath($PE_thevar["current_dir"] . "/"), "UTF-8");
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
                    $stream_data = PE_zipfiles($array_files, realpath($PE_thevar["current_dir"] . "/../"), "UTF-8");
                    $final_name = basename($PE_thevar["current_dir"]) . ".zip";
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
                    $stream_data = file_get_contents($PE_thevar["current_stream"] . $input_data);
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
         <option value="<?php print($PE_thevar["current_stream"]);
            ?>" selected><?php print($PE_thevar["current_stream"]);?></option>
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
