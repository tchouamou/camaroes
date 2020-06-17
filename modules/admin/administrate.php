<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href='index.php?cmr_mode=login' > Here </a>  to login before continue ");
/**
 * administrate.php
 *         ---------
 * begin    : July 2004 - Febuary 2011
 * copyright   : Camaroes Ver 3.0 (C) 2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
// * @package cmr
// * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
// * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL,
// * This version may have been modified pursuant
// * to the GNU General Public License, and as distributed it includes or
// * is derivative of works licensed under the GNU General Public License or
// * other free or open source software licenses.
// */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// open_box($cmr->config, $cmr->language, $mod->name, $mod->rown_position, $mod->col_position, " Administrate");
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate($mod->base_name); //$division->module["title"] = " Administrate";
// $division->module["text"] = "";

if(($cmr->get_user("authorisation")) < $cmr->get_conf("cmr_admin_type")) die($cmr->translate("Admin privilege needed, click ") . "<a href=\"index.php?cmr_mode=login\" >" .  $cmr->translate("Here") . "</a>" . $cmr->translate(" to login with [admin] account "));




// 












print($division->show_noclose());

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/administrate.php?conf_name=conf.d/modules/conf_administrate.ini", 1);;
$lk->add_link("modules/admin/config_front_page.php?conf_name=conf.d/modules/conf_front_page.ini", 1);;
$lk->add_link("modules/admin/config_menu.php?conf_name=conf.d/modules/conf_menu.ini", 1);;
$lk->add_link("modules/menu_config.php?conf_name=conf.d/modules/conf_config.ini", 1);;

$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=tab&middle2=", 1);;
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=query&middle2=", 1);;
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=module&middle2=", 1);;
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=lib&middle2=", 1);;

$lk->add_link("modules/admin/config_default_conf.php?conf_name=conf.d/modules/conf_default_conf.ini", 1);;
$lk->add_link("modules/admin/config_default_page.php?conf_name=conf.d/modules/conf_default_page.ini", 1);;
$lk->add_link("modules/admin/config_default_lang.php?conf_name=conf.d/modules/conf_default_lang.ini", 1);;
$lk->add_link("modules/admin/config_default_theme.php?conf_name=conf.d/modules/conf_default_theme.ini", 1);;

$lk->add_link("modules/admin/configure_conf.php?conf_name=conf.d/modules/conf_configure_conf.ini", 1);;
$lk->add_link("modules/admin/configure_page.php?conf_name=conf.d/modules/conf_configure_page.ini", 1);;
$lk->add_link("modules/admin/configure_lang.php?conf_name=conf.d/modules/conf_configure_lang.ini", 1);;
$lk->add_link("modules/admin/configure_theme.php?conf_name=conf.d/modules/conf_configure_theme.ini", 1);;
$lk->add_link("modules/menu_db.php?conf_name=conf.d/modules/conf_db.ini", 1);;
print($lk->list_link());


?>
<div id="Administrate_div">

<br />




<form action="index.php" method="post">
<?php print(input_hidden("<input type=\"hidden\" value=\"get_data/get_administrate.php\" name=\"cmr_get_data\" />"));?>
<p align="center">
<b><?php print($cmr->translate('action'));
?>:</b><br />
[<?php print($cmr->translate('view'));
?>:<input type="radio" name="action" value="view" checked></input>]&nbsp&nbsp
[<?php print($cmr->translate('search'));
?>:<input type="radio" name="action" value="search" ></input>]&nbsp&nbsp
[<?php print($cmr->translate('report'));
?>:<input type="radio" name="action" value="report" ></input>]&nbsp&nbsp
[<?php print($cmr->translate('new'));
?>:<input type="radio" name="action" value="new"></input>]&nbsp&nbsp
[<?php print($cmr->translate('update'));
?>:<input type="radio" name="action" value="update"></input>]&nbsp&nbsp
[<?php print($cmr->translate('delete'));
?>:<input type="radio" name="action" value="delete"></input>]&nbsp&nbsp
<br />



<b><?php print($cmr->translate('select_dest'));
?></b>
</p>

<table  border="0" class="normal_text" align="center" >





<tr>
	<td align='left'>
		<input type='radio' name='on' value='ticket' id='ticket' />
		<?php print($cmr->translate('ticket'));
?>:
	</td>
	<td align='left'>
		<select class='select_class' name='ticket' width='200' onclick=radio_select('ticket')>
			<option>?</option>
			<option><?php print($cmr->translate('all'));
?></option>
			<?php 
			
// print($cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "name", "column", "", "id", $cmr->get_conf("cmr_max_view")));
print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'ticket', 'number,title', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );

?>
		</select>
	</td>
</tr>


<tr>
	<td align='left'>
		<input type='radio' name='on' value='user' id='user' />
		<?php print($cmr->translate('user'));
?>:
	</td>
	<td align='left'>
		<select class='select_class' name='user' width='200' onclick=radio_select('user')>
			<option>?</option>
			<option><?php print($cmr->translate('all'));
?></option>
			<?php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'user', 'email,state', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'email', '35') );
?>
		</select>
	</td>
</tr>


<tr>
	<td align='left'>
		<input type='radio' name='on' value='account' id='account' />
		<?php print($cmr->translate('account'));
?>:
	</td>
	<td align='left'>
		<select class='select_class' name='account' width='200' onclick=radio_select('account')>
			<option>?</option>
			<option><?php print($cmr->translate('all'));
?></option>
			<?php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'account', 'email,state', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
?>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='groups' id='groups' />
		<?php print($cmr->translate('groups'));
?>:
	</td>
	<td align='left'>
		<select class='select_class' name='groups' width='200' onclick=radio_select('groups')>
			<option>?</option>
			<option><?php print($cmr->translate('all'));
?></option>
			<?php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'groups', 'name,state', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'name', '35') );
?>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='father_groups' id='father_groups' />
		<?php print($cmr->translate('father_groups'));
?>:
	</td>
	<td align='left'>
		<select class='select_class' name='father_groups' width='200' onclick=radio_select('father_groups')>
			<option>?</option>
			<option><?php print($cmr->translate('all'));
?></option>
			<?php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'father_groups', 'group_father,group_chield', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'group_father', '35') );
?>
		</select>
	</td>
</tr>



<tr>
	<td align='left'>
		<input type='radio' name='on' value='user_groups' id='user_groups' />
		<?php print($cmr->translate('user_groups'));
?>:
	</td>
	<td align='left'>
		<select class='select_class' name='user_groups' width='200' onclick=radio_select('user_groups')>
			<option>?</option>
			<option><?php print($cmr->translate('all'));
?></option>
			<?php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'user_groups', 'user_email,group_name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'user_email', '35') );
?>
		</select>
	</td>
</tr>


<tr>
	<td align='left'>
		<input type='radio' name='on' value='asset' id='asset' />
		<?php print($cmr->translate('asset'));
?>:
	</td>
	<td align='left'>
		<select class='select_class' name='asset' width='200' onclick=radio_select('asset')>
			<option>?</option>
			<option><?php print($cmr->translate('all'));
?></option>
			<?php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'asset', 'ip,type', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'ip', '35') );
?>
		</select>
	</td>
</tr>
<tr>
	<td align='left'>
		<input type='radio' name='on' value='message' id='message' />
		<?php print($cmr->translate('message'));
?>:
	</td>
	<td align='left'>
		<select class='select_class' name='message' width='200' onclick=radio_select('message')>
			<option>?</option>
			<option><?php print($cmr->translate('all'));
?></option>
			<?php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'message', 'sender,title', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
?>
		</select>
	</td>
</tr>


<tr>
	<td align='left'>
		<input type='radio' name='on' value='faq' id='faq' />
		<?php print($cmr->translate('faq'));
?>:
	</td>
	<td align='left'>
		<select class='select_class' name='faq' width='200' onclick=radio_select('faq')>
			<option>?</option>
			<option><?php print($cmr->translate('all'));
?></option>
			<?php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'faq', 'name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
?>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='email' id='email' />
		<?php print($cmr->translate('email'));
?>:
	</td>
	<td align='left'>
		<select class='select_class' name='email' width='200' onclick=radio_select('email')>
			<option>?</option>
			<option><?php print($cmr->translate('all'));
?></option>
			<?php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'email', 'name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
?>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='code' id='code' />
		<?php print($cmr->translate('code'));
?>:
	</td>
	<td align='left'>
		<select class='select_class' name='code' width='200' onclick=radio_select('code')>
			<option>?</option>
			<option><?php print($cmr->translate('all'));
?></option>
			<?php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'code', 'code,state', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
?>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='command' id='command' />
		<?php print($cmr->translate('command'));
?>:
	</td>
	<td align='left'>
		<select class='select_class' name='command' width='200' onclick=radio_select('command')>
			<option>?</option>
			<option><?php print($cmr->translate('all'));
?></option>
			<?php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'command', 'command_name,state', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
?>
		</select>
	</td>
</tr>


<tr>
	<td align='left'>
		<input type='radio' name='on' value='download' id='download' />
		<?php print($cmr->translate('download'));
?>:
	</td>
	<td align='left'>
		<select class='select_class' name='download' width='200' onclick=radio_select('download')>
			<option>?</option>
			<option><?php print($cmr->translate('all'));
?></option>
			<?php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'download', 'url', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
?>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='email' id='email' />
		<?php print($cmr->translate('email'));
?>:
	</td>
	<td align='left'>
		<select class='select_class' name='email' width='200' onclick=radio_select('email')>
			<option>?</option>
			<option><?php print($cmr->translate('all'));
?></option>
			<?php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'email', 'title', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
?>
		</select>
	</td>
</tr>

<!--tr>
	<td align='left'>
		<input type='radio' name='on' value='certificate' id='certificate' />
		<_php print($cmr->translate('certificate'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='certificate' width='200' onclick=radio_select('certificate')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'certificate', 'serial', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='contact' id='contact' />
		<_php print($cmr->translate('contact'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='contact' width='200' onclick=radio_select('contact')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'contact', 'email', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='cron' id='cron' />
		<_php print($cmr->translate('cron'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='cron' width='200' onclick=radio_select('cron')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'cron', 'name,state', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='escalation' id='escalation' />
		<_php print($cmr->translate('escalation'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='escalation' width='200' onclick=radio_select('escalation')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'escalation', 'ticket_number,type', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>
<tr>
	<td align='left'>
		<input type='radio' name='on' value='generator' id='generator' />
		<_php print($cmr->translate('generator'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='generator' width='200' onclick=radio_select('generator')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'generator', 'db', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='message_read' id='message_read' />
		<_php print($cmr->translate('message_read'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='message_read' width='200' onclick=radio_select('message_read')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'message_read', 'user_email,date_time', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='nagios' id='nagios' />
		<_php print($cmr->translate('nagios'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='nagios' width='200' onclick=radio_select('nagios')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'nagios', 'group_name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='nessus' id='nessus' />
		<_php print($cmr->translate('nessus'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='nessus' width='200' onclick=radio_select('nessus')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'nessus', 'group_name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='rss' id='rss' />
		<_php print($cmr->translate('rss'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='rss' width='200' onclick=radio_select('rss')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'rss', 'version', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='services' id='services' />
		<_php print($cmr->translate('services'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='services' width='200' onclick=radio_select('services')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'services', 'name,port', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='session' id='session' />
		<_php print($cmr->translate('session'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='session' width='200' onclick=radio_select('session')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'session', 'sessionid,date_time', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='sla' id='sla' />
		<_php print($cmr->translate('sla'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='sla' width='200' onclick=radio_select('sla')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'sla', 'user_email', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='software' id='software' />
		<_php print($cmr->translate('software'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='software' width='200' onclick=radio_select('software')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'software', 'name,type', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='statistic' id='statistic' />
		<_php print($cmr->translate('statistic'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='statistic' width='200' onclick=radio_select('statistic')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'statistic', 'name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='ticket_read' id='ticket_read' />
		<_php print($cmr->translate('ticket_read'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='ticket_read' width='200' onclick=radio_select('ticket_read')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'ticket_read', 'user_email,date_time', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='translate' id='translate' />
		<_php print($cmr->translate('translate'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='translate' width='200' onclick=radio_select('translate')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'translate', 'code', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>
<tr>
	<td align='left'>
		<input type='radio' name='on' value='x_code_source' id='x_code_source' />
		<_php print($cmr->translate('x_code_source'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='x_code_source' width='200' onclick=radio_select('x_code_source')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'x_code_source', 'name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='x_comment' id='x_comment' />
		<_php print($cmr->translate('x_comment'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='x_comment' width='200' onclick=radio_select('x_comment')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'x_comment', 'name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='x_contents' id='x_contents' />
		<_php print($cmr->translate('x_contents'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='x_contents' width='200' onclick=radio_select('x_contents')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'x_contents', 'name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='x_files' id='x_files' />
		<_php print($cmr->translate('x_files'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='x_files' width='200' onclick=radio_select('x_files')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'x_files', 'name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='x_images' id='x_images' />
		<_php print($cmr->translate('x_images'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='x_images' width='200' onclick=radio_select('x_images')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'x_images', 'name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='x_links' id='x_links' />
		<_php print($cmr->translate('x_links'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='x_links' width='200' onclick=radio_select('x_links')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'x_links', 'name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='x_menu' id='x_menu' />
		<_php print($cmr->translate('x_menu'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='x_menu' width='200' onclick=radio_select('x_menu')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'x_menu', 'name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='x_modules' id='x_modules' />
		<_php print($cmr->translate('x_modules'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='x_modules' width='200' onclick=radio_select('x_modules')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'x_modules', 'name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='x_object' id='x_object' />
		<_php print($cmr->translate('x_object'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='x_object' width='200' onclick=radio_select('x_object')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'x_object', 'name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='x_pages' id='x_pages' />
		<_php print($cmr->translate('x_pages'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='x_pages' width='200' onclick=radio_select('x_pages')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'x_pages', 'name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='x_sites' id='x_sites' />
		<_php print($cmr->translate('x_sites'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='x_sites' width='200' onclick=radio_select('x_sites')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'x_sites', 'name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='x_template' id='x_template' />
		<_php print($cmr->translate('x_template'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='x_template' width='200' onclick=radio_select('x_template')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'x_template', 'name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr>

<tr>
	<td align='left'>
		<input type='radio' name='on' value='x_text' id='x_text' />
		<_php print($cmr->translate('x_text'));
_>:
	</td>
	<td align='left'>
		<select class='select_class' name='x_text' width='200' onclick=radio_select('x_text')>
			<option>?</option>
			<option><_php print($cmr->translate('all'));
_></option>
			<_php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'x_text', 'name', 'column', $cmr->config['db_name'], 'id', $cmr->config['cmr_max_view'], 'id', '35') );
_>
		</select>
	</td>
</tr-->





</table>

<br />
<p align="center">
<select name="show" id="show" width="200" onchange="add_to_textarea('sql', 'show')">
<option>?</option>
<?php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'query', 'name', 'column', $cmr->config['db_name'], 'text', $cmr->config['cmr_max_view'], 'id', '35') );
// cmrprint_select();

?>
</select>
<br />
<?php
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")){
    print("<input type='radio' name='on' value='sql' id='sql_on' /><big>");
    print($cmr->translate('sql_query'));
    print("</big><br />");
    print("<textarea  onclick=\"radio_select('sql_on')\" name=\"sql\" id=\"sql\" cols=\"60\" rows=\"4\">");
    print("select * from cmr_user procedure analyse()");
    print("</textarea>");
}

?>

<br />
<input type="reset" onclick="return confirm('<?php print($cmr->translate("confirm that you want to empty this form"));?>')" />
<input class="submit" type="submit" value=<?php print("'" . $cmr->translate('go') . "'");
?> onclick="return confirm('<?php print($cmr->translate("confirm that you want to run this action"));?>')" />
</p>
</form>
</div>

<?php  print($division->close());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 
// if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php")
// include_once($cmr->get_path("index") . "system/loader/loader_get.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
