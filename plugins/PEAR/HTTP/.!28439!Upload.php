<?php
// **********************************************
//
// This software is licensed by the LGPL
// -> http://www.gnu.org/copyleft/lesser.txt
// (c) 2001-2004 by Tomas Von Veschler Cox
//
// **********************************************
//
// $Id: Upload.php,v 1.42 2004/08/08 09:37:50 wenz Exp $

/*
 * Pear File Uploader class. Easy and secure managment of files
 * submitted via HTML Forms.
 *
 * Leyend:
 * - you can add error msgs in your language in the HTTP_Upload_Error class
 *
 * TODO:
 * - try to think a way of having all the Error system in other
 *   file and only include it when an error ocurrs
 *
 * -- Notes for users HTTP_Upload >= 0.9.0 --
 *
 *  Error detection was enhanced, so you no longer need to
 *  check for PEAR::isError() in $upload->getFiles() or call
 *  $upload->isMissing(). Instead you'll
 *  get the error when do a check for $file->isError().
 *
 *  Example:
 *
 *  $upload = new HTTP_Upload('en');
 *  $file = $upload->getFiles('i_dont_exist_in_form_definition');
 *  if ($file->isError()) {
 *      die($file->getMessage());
 *  }
 *
 *  --
 *
 */

require_once 'PEAR.php';

/**
 * defines default chmod
 */
define('HTTP_UPLOAD_DEFAULT_CHMOD', 0660);

/**
 * Error Class for HTTP_Upload
 *
 * @author  Tomas V.V.Cox <cox@idecnet.com>
 * @see http://vulcanonet.com/soft/index.php?pack=uploader
 * @package HTTP_Upload
 * @category HTTP
 * @access public
 */
class HTTP_Upload_Error extends PEAR
{
    /**
     * Selected language for error messages
     * @var string
     */
    var $lang = 'en';

    /**
     * Whether HTML entities shall be encoded automatically
     * @var boolean
     */
    var $html = false;

    /**
     * Constructor
     *
     * Creates a new PEAR_Error
     *
     * @param string $lang The language selected for error code messages
     * @access public
     */
    function HTTP_Upload_Error($lang = null, $html = false)
    {
        $this->lang = ($lang !== null) ? $lang : $this->lang;
        $this->html = ($html !== false) ? $html : $this->html;
        $ini_size = preg_replace('/m/i', '000000', ini_get('upload_max_filesize'));

        if (function_exists('version_compare') &&
            version_compare(phpversion(), '4.1', 'ge')) {
            $maxsize = (isset($_POST['MAX_FILE_SIZE'])) ?
                $_POST['MAX_FILE_SIZE'] : null;
        } else {
            global $HTTP_POST_VARS;
            $maxsize = (isset($HTTP_POST_VARS['MAX_FILE_SIZE'])) ?
                $HTTP_POST_VARS['MAX_FILE_SIZE'] : null;
        }

        if (empty($maxsize) || ($maxsize > $ini_size)) {
            $maxsize = $ini_size;
        }
        // XXXXX Add here error messages in your language
        $this->error_codes = array(
            'TOO_LARGE' => array(
                'es'    => "Fichero demasiado largo. El maximo permitido es: $maxsize bytes.",
                'en'    => "File size too large. The maximum permitted size is: $maxsize bytes.",
                'de'    => "Datei zu gro&szlig;. Die zul&auml;ssige Maximalgr&ouml;&szlig;e ist: $maxsize Bytes.",
                'nl'    => "Het bestand is te groot, de maximale grootte is: $maxsize bytes.",
                'fr'    => "Le fichier est trop gros. La taille maximum autoris&eacute;e est: $maxsize bytes.",
                'it'    => "Il file &eacute; troppo grande. Il massimo permesso &eacute: $maxsize bytes.",
                'pt_BR' => "Arquivo muito grande. O tamanho m&aacute;ximo permitido &eacute; $maxsize bytes."
                ),
            'MISSING_DIR' => array(
                'es'    => 'Falta directorio destino.',
                'en'    => 'Missing destination directory.',
                'de'    => 'Kein Zielverzeichnis definiert.',
                'nl'    => 'Geen bestemmings directory.',
                'fr'    => 'Le r&eacute;pertoire de destination n\'est pas d&eacute;fini.',
                'it'    => 'Manca la directory di destinazione.',
                'pt_BR' => 'Aus&ecirc;ncia de diret&oacute;rio de destino.'
                ),
            'IS_NOT_DIR' => array(
                'es'    => 'El directorio destino no existe o es un fichero regular.',
                'en'    => 'The destination directory doesn\'t exist or is a regular file.',
                'de'    => 'Das angebene Zielverzeichnis existiert nicht oder ist eine Datei.',
                'nl'    => 'De doeldirectory bestaat niet, of is een gewoon bestand.',
                'fr'    => 'Le r&eacute;pertoire de destination n\'existe pas ou il s\'agit d\'un fichier r&eacute;gulier.',
                'it'    => 'La directory di destinazione non esiste o &eacute; un file.',
                'pt_BR' => 'O diret&oacute;rio de destino n&atilde;o existe ou &eacute; um arquivo.'
                ),
            'NO_WRITE_PERMS' => array(
                'es'    => 'El directorio destino no tiene permisos de escritura.',
                'en'    => 'The destination directory doesn\'t have write perms.',
                'de'    => 'Fehlende Schreibrechte f&uuml;r das Zielverzeichnis.',
                'nl'    => 'Geen toestemming om te schrijven in de doeldirectory.',
                'fr'    => 'Le r&eacute;pertoire de destination n\'a pas les droits en &eacute;criture.',
                'it'    => 'Non si hanno i permessi di scrittura sulla directory di destinazione.',
                'pt_BR' => 'O diret&oacute;rio de destino n&atilde;o possui permiss&atilde;o para escrita.'
                ),
            'NO_USER_FILE' => array(
                'es'    => 'No se ha escogido fichero para el upload.',
                'en'    => 'You haven\'t selected any file for uploading.',
                'de'    => 'Es wurde keine Datei f&uuml;r den Upload ausgew&auml;hlt.',
                'nl'    => 'Er is geen bestand opgegeven om te uploaden.',
                'fr'    => 'Vous n\'avez pas s&eacute;lectionn&eacute; de fichier &agrave; envoyer.',
                'it'    => 'Nessun file selezionato per l\'upload.',
                'pt_BR' => 'Nenhum arquivo selecionado para upload.'
                ),
            'BAD_FORM' => array(
                'es'    => 'El formulario no contiene method="post" enctype="multipart/form-data" requerido.',
                'en'    => 'The html form doesn\'t contain the required method="post" enctype="multipart/form-data".',
                'de'    => 'Das HTML-Formular enth&auml;lt nicht die Angabe method="post" enctype="multipart/form-data" '.
                           'im &gt;form&lt;-Tag.',
                'nl'    => 'Het HTML-formulier bevat niet de volgende benodigde '.
                           'eigenschappen: method="post" enctype="multipart/form-data".',
                'fr'    => 'Le formulaire HTML ne contient pas les attributs requis : '.
                           ' method="post" enctype="multipart/form-data".',
                'it'    => 'Il modulo HTML non contiene gli attributi richiesti: "'.
                           ' method="post" enctype="multipart/form-data".',
                'pt_BR' => 'O formul&aacute;rio HTML n&atilde;o possui o method="post" enctype="multipart/form-data" requerido.'
                ),
            'E_FAIL_COPY' => array(
                'es'    => 'Fallo al copiar el fichero temporal.',
                'en'    => 'Failed to copy the temporary file.',
                'de'    => 'Tempor&auml;re Datei konnte nicht kopiert werden.',
                'nl'    => 'Het tijdelijke bestand kon niet gekopieerd worden.',
                'fr'    => 'L\'enregistrement du fichier temporaire a &eacute;chou&eacute;.',
                'it'    => 'Copia del file temporaneo fallita.',
                'pt_BR' => 'Falha ao copiar o arquivo tempor&aacute;rio.'
                ),
            'E_FAIL_MOVE' => array(
                'es'    => 'No puedo mover el fichero.',
                'en'    => 'Impossible to move the file.',
                'de'    => 'Datei kann nicht verschoben werden.',
                'nl'    => 'Het bestand kon niet verplaatst worden.',
                'fr'    => 'Impossible de d&eacute;placer le fichier.',
                'pt_BR' => 'N&atilde;o foi poss&iacute;vel mover o arquivo.'
                ),
            'FILE_EXISTS' => array(
                'es'    => 'El fichero destino ya existe.',
                'en'    => 'The destination file already exists.',
                'de'    => 'Die zu erzeugende Datei existiert bereits.',
                'nl'    => 'Het doelbestand bestaat al.',
                'fr'    => 'Le fichier de destination existe d&eacute;j&agrave;.',
                'it'    => 'File destinazione gi&agrave; esistente.',
                'pt_BR' => 'O arquivo de destino j&aacute; existe.'
                ),
            'CANNOT_OVERWRITE' => array(
                'es'    => 'El fichero destino ya existe y no se puede sobreescribir.',
                'en'    => 'The destination file already exists and could not be overwritten.',
                'de'    => 'Die zu erzeugende Datei existiert bereits und konnte nicht &uuml;berschrieben werden.',
                'nl'    => 'Het doelbestand bestaat al, en kon niet worden overschreven.',
                'fr'    => 'Le fichier de destination existe d&eacute;j&agrave; et ne peux pas &ecirc;tre remplac&eacute;.',
                'it'    => 'File destinazione gi&agrave; esistente e non si pu&ograve; sovrascrivere.',
                'pt_BR' => 'O arquivo de destino j&aacute; existe e n&atilde;o p&ocirc;de ser sobrescrito.'
                ),
            'NOT_ALLOWED_EXTENSION' => array(
                'es'    => 'Extension de fichero no permitida.',
                'en'    => 'File extension not permitted.',
                'de'    => 'Unerlaubte Dateiendung.',
                'nl'    => 'Niet toegestane bestands-extensie.',
                'fr'    => 'Le fichier a une extension non autoris&eacute;e.',
                'it'    => 'Estensione del File non permessa.',
                'pt_BR' => 'Extens&atilde;o de arquivo n&atilde;o permitida.'
                ),
            'PARTIAL' => array(
                'es'    => 'El fichero fue parcialmente subido',
                'en'    => 'The file was only partially uploaded.',
                'de'    => 'Die Datei wurde unvollst&auml;ndig &uuml;bertragen.',
                'nl'    => 'Het bestand is slechts gedeeltelijk geupload.',
