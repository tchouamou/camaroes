<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/********************************************************************
 *        func_session.php
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



























func_session.php,Ver 3.0  2011-Nov-Wed 22:19:05  
*/

// function sid_gc($maxlifetime)
// function sid_destroy($id)
// function sid_write($id, $sess_data)
// function sid_read($id)
// function sid_close($cmr_config = array())
// function sid_open($save_path, $session_name)
// function cmr_load_session($cmr_object, $cmr_config = array())
// function cmr_save_session($cmr_config = array(), $cmr_themes = array(), $cmr_page = array(), $cmr_language = array(), $cmr_db = array(), $cmr_imap = array(), $cmr_user = array(), $cmr_group = array(), $cmr_post_var = array(), $cmr_session = array(), $cmr_others=array())
// function cmr_load_session_mode($cmr_config = array()) // --constructor--


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_load_session_mode"))){
function cmr_load_session_mode($cmr_config = array()) // --constructor--
    {
	    
if(empty($cmr_config)) $cmr_config = cmr_get_config();

if(!(empty($cmr_config["cmr_save_session"]))){
	    switch($cmr_config["cmr_save_session"]){
		    case "database":break;
		    case "cookies":break;
		    case "files":
			 session_save_path(cmr_get_path("session"));// for good session work
		    break;
		    case "normal":
		    default:
		    break;
	    }
	 }
	 
	 
            /* set the cache limiter to 'nocache' */
            session_cache_limiter($cmr_config["cmr_session_cache"]);
            /* set the cache expire to 300 minutes */
            session_cache_expire(intval($cmr_config["cmr_cache_expire"]));
	 
	 
   return true;
    }
    }
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_save_session"))){
function cmr_put_session($cmr_config = array(), $cmr_save = array(), $param = "")
    {
       $_SESSION["cmr_array_" . $param] = $cmr_save;
       

		if($cmr_config["cmr_save_session"]=="files"){
		}elseif($cmr_config["cmr_save_session"]=="database"){
		}elseif($cmr_config["cmr_save_session"]=="cookies"){
		if(!empty($cmr_config["cmr_use_cookie"])){
       		cmr_setcookie ("cmr_" . $param . "[]", strval($cmr_save) , time() - intval($cmr_config["cmr_cookie_time_out"]));
       		cmr_setcookie ("cmr_" . $param . "[]", strval($cmr_save) , time() + intval($cmr_config["cmr_cookie_time_out"]));
		}else{
		}
		
		}
   return  true;
    }
    }
/*=================================================================*/
/*=================================================================*/
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_save_session"))){
function cmr_save_session($cmr_config = array(), $cmr_themes = array(), $cmr_page = array(), $cmr_language = array(), $cmr_db = array(), $cmr_imap = array(), $cmr_user = array(), $cmr_group = array(), $cmr_post_var = array(), $cmr_session = array(), $cmr_others=array())
{
	    
	cmr_put_session($cmr_config, $cmr_config, "config");
	cmr_put_session($cmr_config, $cmr_themes, "themes");
	cmr_put_session($cmr_config, $cmr_page, "page");
	cmr_put_session($cmr_config, $cmr_language, "language");
	cmr_put_session($cmr_config, $cmr_db, "db");
	cmr_put_session($cmr_config, $cmr_imap, "imap");
	cmr_put_session($cmr_config, $cmr_user, "user");
	cmr_put_session($cmr_config, $cmr_group, "group");
	cmr_put_session($cmr_config, $cmr_post_var, "post_var");
	cmr_put_session($cmr_config, $cmr_session, "session");
	cmr_put_session($cmr_config, $cmr_others, "others");
       
    return  true;
  }
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("cmr_load_session"))){
function cmr_load_session($cmr_object, $cmr_config = array())
    {
       $cmr_return = "";
       if(!empty($_SESSION["cmr_array_".$cmr_object])) $cmr_return = $_SESSION["cmr_array_".$cmr_object];
			
		if($cmr_config["cmr_save_session"]=="files"){
		}
		elseif($cmr_config["cmr_save_session"]=="database"){
		}
		elseif($cmr_config["cmr_save_session"]=="cookies"){
		if(!empty($cmr_config["cmr_use_cookie"])){
			$cmr_return=$_COOKIE["cmr_".$cmr_object];
		}
			
		}else{
			}
   return $cmr_return;
    }
    }
/*=================================================================*/
/*=================================================================*/
/**
 * sid_open()
 *
 * @param mixed $save_path
 * @param mixed $session_name
 * @return
 **/
if(!(function_exists("sid_open"))){
function sid_open($save_path, $session_name)
{
  global $sess_save_path;

  $sess_save_path = $save_path;
  return(true);
}
}

/**
 * sid_close()
 *
 * @return
 **/
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("sid_close"))){
function sid_close($cmr_config = array())
{
  return(true);
}
}

/**
 * sid_read()
 *
 * @return
 **/
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("sid_read"))){
function sid_read($id)
{
  global $sess_save_path;

  $sess_file = "$sess_save_path/sess_$id";
  return (string) @file_get_contents($sess_file);
}
}

/**
 * sid_write()
 *
 * @param mixed $id
 * @param mixed $sess_data
 * @return
 **/
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("sid_write"))){
function sid_write($id, $sess_data)
{
  global $sess_save_path;

  $sess_file = "$sess_save_path/sess_$id";
  if($fp = @fopen($sess_file, "w")){
   fwrite($fp, $sess_data);
   fclose($fp);
   return (true);
  }else{
   return(false);
  }

}
}

/**
 * sid_destroy()
 *
 * @param mixed $id
 * @return
 **/
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("sid_destroy"))){
function sid_destroy($id)
{
  global $sess_save_path;

  $sess_file = "$sess_save_path/sess_$id";
  return(@unlink($sess_file));
}
}

/**
 * sid_gc()
 *
 * @param mixed $maxlifetime
 * @return
 **/
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("sid_gc"))){
function sid_gc($maxlifetime)
{
  global $sess_save_path;

  foreach (glob("$sess_save_path/sess_*") as $filename){
   if(filemtime($filename) + $maxlifetime < time()){
     @unlink($filename);
   }
  }
  return true;
}
}

// session_set_save_handler("sid_open", "sid_close", "sid_read", "sid_write", "sid_destroy", "sid_gc");
// session_start();

// proceed to use sessions normally

/*=================================================================*/
/*=================================================================*/
?>