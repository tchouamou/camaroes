<?php
/**
 * about.php
 *        ---------
 * begin    : July 2004 - July 2011
 * copyright   : Camaroes Ver 3.0 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve , tchouamou@gmail.com
All rights reserved.


about.php, Ver 3.0   
*/

/**
 * Information about
 *
 * Is used for keeping
 * $t object istance of the class windowss
 *
 * @windowss (design for the layer usefull when running a module)

 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access in the module
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);



// $division->load_themes($cmr->themes);

$division->module["name"] = $cmr->module["name"]; 




$division->module["title"] = $cmr->translate($mod->base_name);
// $division->module["text"] = "";



















print($division->show_noclose());

// print("<b>");
// print($cmr->translate("" . $mod->base_name . "_title"));
// print("</b><br /><p class=\"normal_text\">");
// print($cmr->translate("" . $mod->base_name . "_text"));
// print("</p>");
// open_finestra($cmr->config, $cmr->language, $module_name, $module_positionx, $module_positiony,"<img alt=\"=> \" src=\"".$cmr->get_path("www") ."images/pallino_blue.gif\">"." about");
?>
<div id="about_div">

<p align="center">
<img src="<?php print($cmr->get_path("www"));?>images/camaroes.png" width="80" />
</p>
<pre>
<p align="left">
Copyright (c) 2011, Tchouamou Eric Herve , tchouamou@gmail.com
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions
are met:

1. Redistributions of source code must retain the above copyright
 notice, this list of conditions and the following disclaimer.
2. Redistributions in binary form must reproduce the above copyright
 notice, this list of conditions and the following disclaimer in the
 documentation and/or other materials provided with the distribution.
3. The names of the authors may not be used to endorse or promote products
 derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS AS IS AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT,
INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY
OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE,
EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

This code cannot simply be copied and put under the GNU Public License or
any other GPL-like (LGPL, GPL2) License.
</p>
</pre>

<p align="center">
<a href="http://sourceforge.net/donate/index.php?group_id=181945">
<img src="http://images.sourceforge.net/images/project-support.jpg" alt="Support This Project" border="0" height="32" width="88"> 
</a>

<a href="http://sourceforge.net/projects/camaroes/">
<img src="http://sflogo.sourceforge.net/sflogo.php?group_id=181945&amp;type=1" alt="SourceForge.net Logo" border="0" height="31" width="88">
</a>

 <!--a href="http://www.php.net/">
 <img src="{match_cmr_www_path}images/php.png" alt="|PHP|" height="30" width="70" border="0">
 </a>

 <a href="http://validator.w3.org/check?uri=referer">
 <img src="{match_cmr_www_path}images/xhtml.bmp" height="30" width="70" border="0" alt="|Valid XHTML 1.0!|" />
 </a>

 <a href="http://jigsaw.w3.org/css-validator">
 <img src="{match_cmr_www_path}images/w3c.bmp" height="30" width="70" border="0" alt="|Valid CSS 1.0!|">
 </a-->
 
</p>

</div>


<?php  

print($division->close());
?>


