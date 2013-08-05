<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Zad Send News - A Contao CMS extension 
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Copyright (C) 2012 by Antonello Dessi'
 * @author     Antonello Dessi'
 * @package    zad_sendnews
 * @license    LGPL 
 * @filesource
 */


$GLOBALS['TL_LANG']['tl_zad_sendnews']['title_void'] = 'News'; 
$GLOBALS['TL_LANG']['tl_zad_sendnews']['text_void'] = '...';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['text_void_attach'] = 'See attached files.';

$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_xml'] = 'File "%s" is corrupt and cannot be imported.';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['ok_imported'] = 'File "%s" has been imported.';

$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_ok'] = 'No errors during execution.';  
$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_warning'] = 'There were abnormal situations, but no data is lost.';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_error'] = 'Unexpected errors found, with probable loss of data.';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_fatal'] = 'A serious error made impossible to complete the procedure.';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['report'] = 'Report:';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_polling'] = '--- Polling sendnews manager \'%s\' (%s)';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_type_H'] = 'hourly';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_type_D'] = 'dayly';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_type_W'] = 'weekly';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_type_M'] = 'monthly';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_type_I'] = 'immediatly';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_msgs'] = '--- %d messages found';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_del'] = 'message skipped (delete flag present)';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_nummsg'] = 'Message %d: \'%s\'';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_text'] = 'plain text added';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_html'] = 'html text added';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_maxsize'] = 'file \'%s\' excluded: size exceeds limit';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_notype'] = 'file \'%s\' excluded: file type not allowed';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_attach'] = 'attached file \'%s\'';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_4pdf'] = 'file \'%s\' flagged to be converted to PDF';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_2pdf'] = 'file \'%s\' converted to PDF \'%s\'';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_insert'] = 'message inserted with id %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_rule'] = 'rule \'%s\' executed';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_image'] = 'image \'%s\' inserted in html text';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['warn_move'] = 'WARNING: can\'t move message %d to folder %s';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['warn_open'] = 'WARNING: can\'t open the log file for message %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['warn_write'] = 'WARNING: can\'t write to file the message %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['warn_pdf'] = 'WARNING: can\'t convert to PDF the file \'%s\'';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_imap'] = 'FATAL ERROR: the IMAP library is required for using this module';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_open'] = 'FATAL ERROR: error while opening mailbox [%s]: %s';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_head'] = 'ERROR: impossible to read headers for message %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_fetch'] = 'ERROR: impossible to fetch message %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_encode'] = 'ERROR: data encoded with an unknown method (%s)';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_type'] = 'ERROR: type TEXT/%s not implemented';


?>