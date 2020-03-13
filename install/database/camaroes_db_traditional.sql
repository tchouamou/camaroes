<?xml version="1.0" encoding="utf-8"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it" dir="ltr">

<head>
<title>phpMyAdmin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="http://127.0.0.1/mysql/" />
<script language="JavaScript" type="text/javascript">
<!--
    /* added 2004-06-10 by Michael Keck
     *       we need this for Backwards-Compatibility and resolving problems
     *       with non DOM browsers, which may have problems with css 2 (like NC 4)
    */
    var isDOM      = (typeof(document.getElementsByTagName) != 'undefined'
                      && typeof(document.createElement) != 'undefined')
                   ? 1 : 0;
    var isIE4      = (typeof(document.all) != 'undefined'
                      && parseInt(navigator.appVersion) >= 4)
                   ? 1 : 0;
    var isNS4      = (typeof(document.layers) != 'undefined')
                   ? 1 : 0;
    var capable    = (isDOM || isIE4 || isNS4)
                   ? 1 : 0;
    // Uggly fix for Opera and Konqueror 2.2 that are half DOM compliant
    if (capable) {
        if (typeof(window.opera) != 'undefined') {
            var browserName = ' ' + navigator.userAgent.toLowerCase();
            if ((browserName.indexOf('konqueror 7') == 0)) {
                capable = 0;
            }
        } else if (typeof(navigator.userAgent) != 'undefined') {
            var browserName = ' ' + navigator.userAgent.toLowerCase();
            if ((browserName.indexOf('konqueror') > 0) && (browserName.indexOf('konqueror/3') == 0)) {
                capable = 0;
            }
        } // end if... else if...
    } // end if
    document.writeln('<link rel="stylesheet" type="text/css" href="./css/phpmyadmin.css.php?lang=it-utf-8&amp;js_frame=right&amp;js_isDOM=' + isDOM + '" />');
//-->
</script>
<noscript>
    <link rel="stylesheet" type="text/css" href="./css/phpmyadmin.css.php?lang=it-utf-8&amp;js_frame=right" />
</noscript>
    <script type="text/javascript" language="javascript">
    <!--
    // Updates the title of the frameset if possible (ns4 does not allow this)
    if (typeof(parent.document) != 'undefined' && typeof(parent.document) != 'unknown'
        && typeof(parent.document.title) == 'string') {
        parent.document.title = '127.0.0.1 >> localhost >> camaroes_db | phpMyAdmin 2.6.1';
    }
    
    //-->
    </script>
        
        <meta name="OBGZip" content="true" />
    </head>


        <body bgcolor="#F5F5F5">
    <table border="0" cellpadding="0" cellspacing="0" id="serverinfo">
    <tr>
        <td class="serverinfo">Server:&nbsp;<a href="main.php?lang=it-utf-8&amp;server=1&amp;collation_connection=utf8_general_ci"><img src="./themes/original/img/s_host.png" width="16" height="16" border="0" alt="localhost" />localhost</a>
</td>

        <td class="serverinfo"><div></div></td>
            <td class="serverinfo">Database:&nbsp;<a href="db_details_structure.php?lang=it-utf-8&amp;server=1&amp;collation_connection=utf8_general_ci&amp;db=camaroes_db"><img src="./themes/original/img/s_db.png" width="16" height="16" border="0" alt="camaroes_db" />camaroes_db</a>
</td>

    </tr>
</table>
<!-- PMA-SQL-ERROR -->
    <table border="0" cellpadding="2" cellspacing="1">        <tr>
            <th class="tblHeadError"><div class="errorhead">Errore</div></th>
        </tr>
        <tr>
            <td><div class="tblWarn"><p>
    <b>query SQL:</b>
<a href="db_details.php?lang=it-utf-8&amp;server=1&amp;collation_connection=utf8_general_ci&amp;db=camaroes_db&amp;sql_query=SET+%40%40SQL_MODE%3D%22TRADITIONAL%22&amp;show_query=1"><img src=" ./themes/original/img/b_edit.png" width="16" height="16" border="0" hspace="2" align="middle" alt="Modifica" /></a></p>
<p>
    <span class="syntax"><span class="syntax_alpha syntax_alpha_reservedWord">SET</span> <span class="syntax_alpha syntax_alpha_variable">@</span> <span class="syntax_alpha syntax_alpha_variable">@SQL_MODE</span>  <span class="syntax_punct">=</span>  <span class="syntax_quote syntax_quote_double">&quot;TRADITIONAL&quot;</span></span>
</p></div>
<div class="tblWarn"><p>
    <b>Messaggio di MySQL: </b><a href="http://dev.mysql.com/doc/mysql/en/Error-returns.html" target="mysql_doc"><img src="./themes/original/img/b_help.png" width="11" height="11" border="0" alt="Documentazione" title="Documentazione" hspace="2" align="middle" /></a>
</p>
<code>
#1231 - Variable 'sql_mode' can't be set to the value of 'TRADITIONAL'
</code><br />
</div>            </td>
        </tr>
    </table>


<script type="text/javascript">
<!--

    function reload_querywindow () {
        if (parent.frames.queryframe && parent.frames.queryframe.querywindow && !parent.frames.queryframe.querywindow.closed && parent.frames.queryframe.querywindow.location) {
                        // no submit, query was invalid
                    }
    }

    function focus_querywindow(sql_query) {
        if (parent.frames.queryframe && parent.frames.queryframe.querywindow && !parent.frames.queryframe.querywindow.closed && parent.frames.queryframe.querywindow.location) {
            if (parent.frames.queryframe.querywindow.document.querywindow.querydisplay_tab != 'sql') {
                parent.frames.queryframe.querywindow.document.querywindow.querydisplay_tab.value = "sql";
                parent.frames.queryframe.querywindow.document.querywindow.query_history_latest.value = sql_query;
                parent.frames.queryframe.querywindow.document.querywindow.submit();
                parent.frames.queryframe.querywindow.focus();
            } else {
                parent.frames.queryframe.querywindow.focus();
            }

            return false;
        } else if (parent.frames.queryframe) {
            new_win_url = 'querywindow.php?sql_query=' + sql_query + '&lang=it-utf-8&server=1&collation_connection=utf8_general_ci&db=camaroes_db';
            parent.frames.queryframe.querywindow=window.open(new_win_url, '','toolbar=0,location=0,directories=0,status=1,menubar=0,scrollbars=yes,resizable=yes,width=550,height=310');

            if (!parent.frames.queryframe.querywindow.opener) {
               parent.frames.queryframe.querywindow.opener = parent.frames.queryframe;
            }

            // reload_querywindow();
            return false;
        }
    }

    reload_querywindow();

//-->
</script>


</body>

</html>
