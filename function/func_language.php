<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/********************************************************************
 *        function_language.php
 *       ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 *
 *********************************************************************/


/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.









function_language.php,Ver 3.0  2011-Nov-Wed 22:19:05  
*/

// function remote_tranlator($word_list, $from_language, $to_language){
// function auto_language($cmr_config = array(), $cmr_language = array(), $cmr_db_connection)
// function cmr_translate($text, $from_language = "english", $to_language = "", $cmr_language=array())
// function cmr_global_translate($text, $next = "", $from_language = "english", $to_language = "italian")


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_global_translate"))){
function cmr_global_translate($text, $next = "", $from_language = "english", $to_language = "italian")
    {
	   @ $t_text = cmr_get_language(strtolower(substr($text,0,25)));
	    if(!empty($t_text)){
		        $r_text = $t_text;
		    }elseif(function_exists("remote_tranlator")){
			    $r_text = remote_tranlator($text, $from_language, $to_language);
			    }else{
					   $r_text = $text;
				    }
   return $r_text . $next;
    }
    }
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_translate"))){
function cmr_translate($text, $from_language = "english", $to_language = "", $cmr_language=array())
    {
	    if(empty($cmr_language)) $cmr_language = cmr_get_language();
	    if(empty($to_language)) $to_language = "italian";
	    if((cmr_get_page("language"))) $to_language = cmr_get_page("language");
		$cut_text = str_replace(" ", "_", strtolower(trim(substr($text,0,25))));
	 	if(isset($cmr_language[$cut_text])) $r_text = $cmr_language[$cut_text];

	 	if(empty($r_text)){
			    $r_text = preg_replace("/([a-z]+)([^a-z])/sieU", "cmr_global_translate('\\1','\\2','$from_language','$to_language')", str_replace("_", " ", $text) . " ");
		    }else{
// 			    	 	echo "[" . str_replace(" ", "_", strtolower(trim(substr($text,0,25)))) . "]=[$r_text]";
			    }
   return $r_text;
    }
    }
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("auto_language"))){
function auto_language($cmr_config = array(), $cmr_language = array(), $cmr_db_connection)
{
    // =============================================
    // =============================================
    // =============================================
    // ============language==========================
    // ==automatic load default values==============
    // =============================================
    if((isset($cmr_config["cmr_generate_defaul_lang"])) && ($cmr_config["cmr_generate_defaul_lang"])){
        if($dir = @ opendir(cmr_get_path("module") . "modules/")){
            while ($file = readdir($dir)){
                $file_name = strtolower(substr($file, 0, strrpos($file, ".")));
//                 print("\$file_name=$file_name<br />");
                if(($file != ".") && ($file != "..")){
                    $key_inf = $file_name;
//                      print("<br />//-- in module $file ---"."<br />");
                    if(!isset($cmr_language[$key_inf])){
                        $cmr_language[$key_inf] = ucfirst(str_replace("_", " ", $file_name));
//                          print("\$cmr_language[\"".$key_inf."\"]=\"".$cmr_language[$key_inf]."\";<br />");
                    }

                    $key_inf = $file_name . "_title";
                    if(!isset($cmr_language[$key_inf])){
                        $cmr_language[$key_inf] = "";
//                          print("\$cmr_language[\"".$key_inf."\"]=\"".$cmr_language[$key_inf]."\";<br />");
                    }

                    $key_inf = $file_name . "_text";
                    if(!isset($cmr_language[$key_inf])){
                        $cmr_language[$key_inf] = "";
//                          print("\$cmr_language[\"".$key_inf."\"]=\"".$cmr_language[$key_inf]."\";<br />");
                    }
                }
            }
            closedir($dir);
        }
        
        
        if($dir = @ opendir(cmr_get_path("module") . "modules/auto/")){
            while ($file = readdir($dir)){
                $file_name = strtolower(substr($file, 0, strrpos($file, ".")));
//                 print("\$file_name=$file_name<br />");
                if(($file != ".") && ($file != "..")){
                    $key_inf = $file_name;
//                      print("<br />//-- in module $file ---"."<br />");
                    if(!isset($cmr_language[$key_inf])){
                        $cmr_language[$key_inf] = ucfirst(str_replace("_", " ", $file_name));
//                          print("\$cmr_language[\"".$key_inf."\"]=\"".$cmr_language[$key_inf]."\";<br />");
                    }

                    $key_inf = $file_name . "_title";
                    if(!isset($cmr_language[$key_inf])){
                        $cmr_language[$key_inf] = "";
//                          print("\$cmr_language[\"".$key_inf."\"]=\"".$cmr_language[$key_inf]."\";<br />");
                    }

                    $key_inf = $file_name . "_text";
                    if(!isset($cmr_language[$key_inf])){
                        $cmr_language[$key_inf] = "";
//                          print("\$cmr_language[\"".$key_inf."\"]=\"".$cmr_language[$key_inf]."\";<br />");
                    }
                }
            }
            closedir($dir);
        }

        if($cmr_db_connection){
            // --------------------
//              print("<br />// <strong > bigining work with datatbase [".$cmr_config["db_name"] ."]...... </b><br />");
            $table = sql_run("array", $cmr_db_connection, "show_tables", "", $cmr_config["db_name"]);

            foreach($table[0] as $table_name){
//                  print("<br />// <strong > bigining work with table [$table_name]...... </b><br />");
                // -----------
                $table_n = cmr_search_replace("^".$cmr_config["cmr_table_prefix"], "", $table_name);
                $key_inf = $table_n;
                $cmr_language[$key_inf] = ucfirst(cmr_search_replace("_", " ", $table_n));
//                   print("\$cmr_language[\"".$key_inf."\"]=\"".$cmr_language[$key_inf]."\";<br />");
                // -----------
                $tab = sql("array", $cmr_db_connection, "show_columns", "", $cmr_config["db_name"], $table_name);

                $fields = sizeof($tab['Field']);
//                 print("\$fields =".sizeof($tab['field'])."<br />");
//                 print("<br />// <strong > bigining work with table [$table_name] \$fields [$fields]... \$rows [$rows]... </b><br />");
                foreach($tab['Field'] as $im => $c){
                    $col_name = $tab['Field'][$im + 1];
                    $col_Default = $tab['Default'][$im + 1];
                    $col_Extra = $tab['Extra'][$im + 1];
                    $col_Key = $tab['Key'][$im + 1];
                    $col_type = $tab['Type'][$im + 1];
                    $im--;
                    // print("\$col_default= ".$tab['default'][$im+1]);
                    // print("<br />");
                    // print("\$col_extra= ".$tab['extra'][$im+1]);
                    // print("<br />");
                    // print("\$col_key= ".$tab['key'][$im+1]);
                    // print("<br />");
                    // print("\$col_field= ".$tab['field'][$im+1]);
                    // print("<br />");
                    // print("\$col_null= ".$tab['null'][$im+1]);
                    // print("<br />");
                    // print("\$col_type= ".$tab['type'][$im+1]);
                    // print("<hr />");
                    // print("<br />");
                    if(cmr_search("'", $col_type)){
                        $val = substr($col_type, strpos($col_type, "(") + 1);
                        $val = substr($val, 0, strrpos($val, ")"));

                        $array_val = explode(",", $val);

                        foreach($array_val as $val1){
                            $val1 = str_replace("'", "", $val1);
                            $key_inf = trim($val1);

                            if(!isset($cmr_language[$key_inf])){
                                $cmr_language[$key_inf] = ucfirst($val1);
//                                  print("\$cmr_language[\"".$key_inf."\"]===\"".ucfirst(str_replace("_", " ", $val1))."\";<br />");
                            }
                        }
                    }else{
                        $key_inf = $col_name;
//                          print("\$cmr_language[\"".$key_inf."\"]=\"".ucfirst($col_name)."\";<br />");
                        if(!isset($cmr_language[$key_inf])){
                            $cmr_language[$key_inf] = ucfirst(str_replace("_", " ", $col_name));
//                              print("\$cmr_language[\"".$key_inf."\"]=\"".ucfirst($col_name)."\";<br />");
                        }
                    }
                }
            }
        }
    }
//  exit;
    return $cmr_language;
}
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("remote_tranlator"))){

	/**
	 * remote_tranlator()
	 *
	 * @param mixed $word_list
	 * @param mixed $from_language
	 * @param mixed $to_language
	 * @return
	 **/
	function remote_tranlator($word_list, $from_language, $to_language){
	return $word_list;
        $server = "www.google.com";
        $port = 443;
        $path = "/tbproxy/spell?lang=" . $from_language . "&hl=" . $to_language;
        $host = "www.google.com";
        $url = "https://" . $server;

		// define XML request
		$xml = '<?xml version="1.0" encoding="utf-8" ?><spellrequest textalreadyclipped="0" ignoredups="0" ignoredigits="1" ignoreallcaps="1"><text>' . $word_list . '</text></spellrequest>';

        $header  = "POST ".$path." HTTP/1.0 \r\n";
        $header .= "MIME-Version: 1.0 \r\n";
        $header .= "Content-type: application/PTI26 \r\n";
        $header .= "Content-length: ".strlen($xml)." \r\n";
        $header .= "Content-transfer-encoding: text \r\n";
        $header .= "Request-number: 1 \r\n";
        $header .= "Document-type: Request \r\n";
        $header .= "In   terface-Version: Test 1.4 \r\n";
        $header .= "Connection: close \\n\\n ";
        $header .= $xml;
        if(function_exists("curl_init")){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $header);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $xml = curl_exec($ch);
        curl_close($ch);
		}else{
			   return $word_list;
			}

		// match and parse content
		preg_match_all('/<c o="([^"]*)" l="([^"]*)" s="([^"]*)">([^<]*)<\/c>/', $xml, $matches, PREG_SET_ORDER);

   return $matches;
	}
}
/*=================================================================*/
/*=================================================================*/
?>