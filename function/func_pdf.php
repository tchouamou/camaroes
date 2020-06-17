<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * func_pdf.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























func_pdf.php,Ver 3.0  2011-Sep 22:32:38  
*/

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// ----------------------
if(!(function_exists("CleanFiles"))){
function CleanFiles($dir)
{
    $t=time();
    $h=opendir($dir);
    while($file=readdir($h))
    {
        if(substr($file,0,3)=='tmp' and substr($file,-4)=='.pdf')
        {
            $path=$dir.'/'.$file;
            if($t-filemtime($path)>3600)
                @unlink($path);
        }
    }
    closedir($h);
}
}
// ----------------------

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// ----------------------
if(!(function_exists("getpdf"))){
function getpdf($f)
{
 
// $f=$HTTP_GET_VARS['f'];
if(substr($f,0,3)!='tmp' or strpos($f,'/') or strpos($f,'\\'))
    die('Incorrect file name');
if(!file_exists($f))
    die('File does not exist');
//Handle special IE request if needed
if($HTTP_SERVER_VARS['HTTP_USER_AGENT']=='contype')
{
    Header('Content-Type: application/pdf');
    exit;
}
//Output PDF

session_cache_limiter('private');
Header('Pragma: public');

Header('Content-Type: application/pdf');
Header('Content-Length: '.filesize($f));
readfile($f);
//Cancella il file
unlink($f);
CleanFiles(dirname($f));
exit; 
}
}
// ----------------------

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

if(!(function_exists("echo_pdf"))){
function echo_pdf($filename)
{
    $len = filesize($filename);
    cmr_header("Content-type: application/pdf");
    cmr_header("Content-Length: $len");
    cmr_header("Content-Disposition: inline; filename=foo.pdf");
    readfile($filename);
    exit;
}
}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


?>
