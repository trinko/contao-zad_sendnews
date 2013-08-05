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


$GLOBALS['TL_LANG']['tl_zad_sendnews']['title_void'] = 'Novit&agrave;'; 
$GLOBALS['TL_LANG']['tl_zad_sendnews']['text_void'] = '...';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['text_void_attach'] = 'Vedi allegati.';

$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_xml'] = 'Il file %s non è integro e non può essere importato';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['ok_imported'] = 'Il file %s è stato importato';

$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_ok'] = 'Tutte le operazioni sono state eseguite senza errori.';  
$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_warning'] = 'Si sono verificate delle situazioni anomale, ma nessun dato è andato perso.';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_error'] = 'Si sono verificati degli errori imprevisti, con probabile perdita di dati.';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_fatal'] = 'Si è verificato un problema che ha reso impossibile completare la procedura.';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['report'] = 'Lista delle operazioni eseguite:';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_polling'] = '--- Scansione della posta per il gestore delle news via email \'%s\' (%s)';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_type_H'] = 'orario';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_type_D'] = 'giornalierio';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_type_W'] = 'settimanale';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_type_M'] = 'mensile';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_type_I'] = 'immediato';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_msgs'] = '--- %d messaggi trovati';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_del'] = 'messaggio saltato (risulta segnato per la cancellazione)';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_nummsg'] = 'Messaggio %d: \'%s\'';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_text'] = 'aggiunto testo semplice';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_html'] = 'aggiunto testo html';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_maxsize'] = 'file \'%s\' escluso: dimensione oltre il limite ammesso';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_notype'] = 'file \'%s\' escluso: tipo del file non permesso';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_attach'] = 'file \'%s\' allegato';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_4pdf'] = 'file \'%s\' segnato per la conversione in PDF';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_2pdf'] = 'file \'%s\' convertito in PDF \'%s\'';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_insert'] = 'messaggio inserito con id %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_rule'] = 'regola \'%s\' eseguita';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_image'] = 'immagine \'%s\' inserita nel testo html';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['warn_move'] = 'ATTENZIONE: impossibile spostare il messaggio %d nella cartella %s';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['warn_open'] = 'ATTENZIONE: impossibile aprire il file per memorizzare il messaggio %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['warn_write'] = 'ATTENZIONE: impossibile scrivere su file il il messaggio %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['warn_pdf'] = 'ATTENZIONE: impossibile convertire in PDF il file \'%s\'';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_imap'] = 'ERRORE FATALE: la libreria IMAP è indispensabile per usare questo modulo';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_open'] = 'ERRORE FATALE: impossibile aprire la mailbox [%s]: %s';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_head'] = 'ERRORE: impossibile leggere le intestazioni del messaggio %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_fetch'] = 'ERRORE: impossibile leggere il messaggio %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_encode'] = 'ERRORE: codifica sconosciuta (%s)';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_type'] = 'ERRORE: tipo TEXT/%s non implementato';


?>