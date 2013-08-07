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
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_import_xml'] = 'Il file %s non è integro e non può essere importato';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_imap'] = 'La libreria IMAP è indispensabile per usare questo modulo';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_folder'] = 'Impossibile trovare la cartella per i file allegati';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_open'] = 'Impossibile aprire la mailbox [%s]: %s';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_head'] = 'Impossibile leggere le intestazioni del messaggio %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_fetch'] = 'Impossibile leggere il messaggio %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_encode'] = 'Codifica sconosciuta (%s)';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_type'] = 'Tipo TEXT/%s non implementato';

$GLOBALS['TL_LANG']['tl_zad_sendnews']['wrn_import_version'] = 'Il file %s è stato creato con una versione differente, l\'importazione potrebbe non essere corretta.';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['wrn_move'] = 'Impossibile spostare il messaggio %d nella cartella %s';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['wrn_open'] = 'Impossibile aprire il file per memorizzare il messaggio %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['wrn_write'] = 'Impossibile scrivere su file il il messaggio %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['wrn_pdf'] = 'Impossibile convertire in PDF il file \'%s\'';

$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_polling'] = '--- Scansione della posta per il gestore di news via email \'%s\' (%s)';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_type_H'] = 'orario';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_type_D'] = 'giornalierio';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_type_W'] = 'settimanale';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_type_M'] = 'mensile';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_type_I'] = 'immediato';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_msgs'] = '--- %d messaggi trovati';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_nummsg'] = 'Messaggio %d: \'%s\'';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_del'] = 'messaggio saltato (risulta segnato per la cancellazione)';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_text'] = 'aggiunto testo semplice';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_html'] = 'aggiunto testo html';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_noattach'] = 'file \'%s\' escluso: allegati non ammessi';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_maxsize'] = 'file \'%s\' escluso: dimensione oltre il limite ammesso';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_notype'] = 'file \'%s\' escluso: tipo del file non permesso';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_attach'] = 'file \'%s\' allegato';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_insert'] = 'messaggio inserito con id %d';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_2pdf'] = 'file \'%s\' convertito in PDF \'%s\'';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_rule'] = 'regola \'%s\' eseguita';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_4pdf'] = 'file \'%s\' segnato per la conversione in PDF';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['inf_image'] = 'immagine \'%s\' inserita nel testo html';

$GLOBALS['TL_LANG']['tl_zad_sendnews']['ok_imported'] = 'Il file %s è stato importato';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_ok'] = 'Tutte le operazioni sono state eseguite senza errori.';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_warning'] = 'Si sono verificate delle situazioni anomale, ma nessun dato è andato perso.';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_error'] = 'Si sono verificati degli errori imprevisti, con probabile perdita di dati.';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_fatal'] = 'Si è verificato un problema che ha reso impossibile completare la procedura.';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['report'] = 'Lista delle operazioni eseguite:';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['title_void'] = 'Novit&agrave;';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['text_void'] = '...';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['text_void_attach'] = 'Vedi allegati.';

