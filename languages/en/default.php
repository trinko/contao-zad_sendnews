<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package   zad_sendnews
 * @author    Antonello Dessì
 * @license   LGPL
 * @copyright Antonello Dessì 2012-2013
 */


/**
 * Miscellaneous
 */
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_import_xml'] = 'Can\'t import file %s';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_imap'] = 'The IMAP library is required for using this module';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_folder'] = 'Impossible to find the attachment folder';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_open'] = 'Error while opening mailbox [%s]: %s';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_head'] = 'Impossible to read headers for message %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_fetch'] = 'Impossible to fetch message %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_encode'] = 'Data encoded with an unknown method (%s)';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_type'] = 'Type TEXT/%s not implemented';

$GLOBALS['TL_LANG']['tl_zad_sendnews']['wrn_import_version'] = 'File %s was created with a different version, imported data may be wrong.';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['wrn_move'] = 'Can\'t move message %d to folder %s';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['wrn_open'] = 'Can\'t open the log file for message %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['wrn_write'] = 'Can\'t write to file the message %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['wrn_pdf'] = 'Can\'t convert to PDF the file \'%s\'';

$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_polling'] = '--- Polling sendnews manager \'%s\' (%s)';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_type_H'] = 'hourly';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_type_D'] = 'dayly';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_type_W'] = 'weekly';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_type_M'] = 'monthly';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_type_I'] = 'immediatly';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_msgs'] = '--- %d messages found';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_nummsg'] = 'Message %d: \'%s\'';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_del'] = 'message skipped (delete flag present)';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_text'] = 'plain text added';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_html'] = 'html text added';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_noattach'] = 'file \'%s\' excluded: attachments not allowed';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_maxsize'] = 'file \'%s\' excluded: size exceeds limit';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_notype'] = 'file \'%s\' excluded: file type not allowed';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_attach'] = 'attached file \'%s\'';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_insert'] = 'message inserted with id %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_2pdf'] = 'file \'%s\' converted to PDF \'%s\'';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_rule'] = 'rule \'%s\' executed';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_4pdf'] = 'file \'%s\' flagged to be converted to PDF';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_image'] = 'image \'%s\' inserted in html text';

$GLOBALS['TL_LANG']['tl_zad_sendnews']['ok_imported'] = 'File "%s" has been imported.';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_ok'] = 'No errors during execution.';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_warning'] = 'There were abnormal situations, but no data was lost.';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_error'] = 'Unexpected errors found, with probable loss of data.';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_fatal'] = 'A serious error made impossible to complete the procedure.';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['report'] = 'Report:';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['title_void'] = 'News';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['text_void'] = '...';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['text_void_attach'] = 'See attached files.';

