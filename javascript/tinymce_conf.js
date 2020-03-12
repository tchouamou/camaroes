tinyMCE.init(
{
	mode : "exact",
	elements : "html_text, module_text",
	theme : "advanced",
// 	mode : "textareas",


// 	mode : "specific_textareas",
// // 	textarea_trigger : "convert_this",
// 	editor_selector : "mceEditor",
// 	editor_deselector : "mceNoEditor",
// // 	<textarea id="myarea1" class="mceNoEditor">


	preformatted : true,
	apply_source_formatting : true,
	convert_newlines_to_brs : true,
	remove_linebreaks : false,

	fix_list_elements : true,
	fix_table_elements : true,
	//language : "en",
        plugins : "devkit,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras",
        theme_advanced_buttons1_add_before : "save,newdocument,separator",
        theme_advanced_buttons1_add : "fontselect,fontsizeselect",
        theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,separator,forecolor,backcolor,advsearchreplace",
        theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
        theme_advanced_buttons3_add_before : "tablecontrols,separator",
        theme_advanced_buttons3_add : "emotions,iespell,media,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,|,visualchars,nonbreaking",
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
        theme_advanced_resize_horizontal : true,
        theme_advanced_resizing : true,
        nonbreaking_force_tab : true,
        apply_source_formatting : true,
// 	plugin_preview_width : "750",
// 	plugin_preview_height : "550",
// 	document_base_url : "http://127.0.0.1/",
// 	relative_urls : false,
// 	remove_script_host : false,
// 	content_css : "http://127.0.0.1/tinymce/docs/css/template_css.css",
// 	invalid_elements : "script,applet,iframe",
// 	directionality: "ltr",
	force_br_newlines : "true",
	force_p_newlines : "true",
	width : "100%",
	height : "600",

// 	save_callback : "TinyMCE_Save",
	onchange_callback : "myCustomOnChangeHandler",
	add_form_submit_trigger : false,

// 	debug : false,
// 	cleanup : true,
// 	cleanup_on_startup : false,
// 	safari_warning : false,

	extended_valid_elements : "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
	external_link_list_url : "example_data/example_link_list.js",
	external_image_list_url : "example_data/example_image_list.js",
	flash_external_list_url : "example_data/example_flash_list.js",


	fullpage_fontsizes : '13px,14px,15px,18pt,xx-large',
	fullpage_default_xml_pi : true,
	fullpage_default_langcode : 'en',
// 	fullpage_default_title : "My document title",
		fullscreen_settings : {
			theme_advanced_path_location : "top"
		}
}
);
	function TinyMCE_Save(editor_id, content, node)
	{
// 		base_url = tinyMCE.settings['document_base_url'];
		var vHTML = content;
		if (true == true){
// 			vHTML = tinyMCE.regexpReplace(vHTML, 'href\s*=\s*"?'+base_url+'', 'href="', 'gi');
// 			vHTML = tinyMCE.regexpReplace(vHTML, 'src\s*=\s*"?'+base_url+'', 'src="', 'gi');
// 			vHTML = tinyMCE.regexpReplace(vHTML, 'mce_real_src\s*=\s*"?', '', 'gi');
// 			vHTML = tinyMCE.regexpReplace(vHTML, 'mce_real_href\s*=\s*"?', '', 'gi');
		}
 	document.getElementById('mail_text').value=vHTML;
	alert(node + "The HTML is now:" + editor_id + vHTML);
	confirm(document.getElementById('mail_text').value);
		return vHTML;
	}


	function myCustomOnChangeHandler(inst) {
 	document.getElementById('back_text').value=inst.getBody().innerHTML;
}