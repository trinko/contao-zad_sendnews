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


$GLOBALS['TL_LANG']['tl_zad_sendnews']['title_legend'] = 'Titolo';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['name'] = array('Titolo', 'Inserisci un nome identificativo per il gestore delle news via email.');
  
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_legend'] = 'Server di posta';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_name'] = array('Nome del server', 'Inserisci il nome del server di posta (ad esempio: pop.gmail.com).');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_port'] = array('Porta del server', 'Inserisci il numero di porta del server di posta (0 per usare la porta predefinita).');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_type'] = array('Tipo del server', 'Seleziona il tipo del server di posta.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_type_options']['pop3'] = 'POP3';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_type_options']['imap'] = 'IMAP';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls'] = array('Sicurezza', 'Seleziona il protocollo di sicurezza da usare nell\'autenticazione.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['disable'] = 'Nessuno';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['validate'] = 'Usa TLS se disponibile, con validazione dei certificati';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['novalidate'] = 'Usa TLS se disponibile, senza validazione dei certificati';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['tls_validate'] = 'Usa TLS con validazione dei certificati';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['tls_novalidate'] = 'Usa TLS senza validazione dei certificati';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['ssl_validate'] = 'Usa SSL con validazione dei certificati';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['ssl_novalidate'] = 'Usa SSL senza validazione dei certificati';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_user'] = array('Utente', 'Inserisci il nome dell\'utente della casella di posta.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_password'] = array('Password', 'Inserisci la password della casella di posta.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_mailbox'] = array('Cartella', 'Inserisci il nome della cartella all\'interno della casella di posta (lascia vuoto per indicare la cartella predefinita).');

$GLOBALS['TL_LANG']['tl_zad_sendnews']['news_legend'] = 'Archivio news';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['news_archive'] = array('Archivio news', 'Seleziona l\'archivio in cui inserire le news.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['news_author'] = array('Autore', 'Seleziona l\'autore delle news.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure'] = array('Consenti allegati', 'Abilita l\'inserimento di allegati nelle news.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dir'] = array('Cartella degli allegati', 'Seleziona la cartella dove memorizzare gli allegati.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dirtype'] = array('Raggruppamento per data', 'Scegli se raggruppare gli allegati per anno (usando sottocartelle \'AAAA\'), per mese (usando sottocartelle \'AAAA-MM\'), per giorno (usando sottocartelle \'AAAA-MM-GG\') o non raggrupparli affatto (non usando sottocartelle).');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dirtype_options']['year'] = 'Raggruppamento per anno: \'AAAA\'';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dirtype_options']['month'] = 'Raggruppamento per mese: \'AAAA-MM\'';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dirtype_options']['day'] = 'Raggruppamento per giorno: \'AAAA-MM-GG\'';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dirtype_options']['none'] = 'Nessun raggruppamento';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images'] = array('Gestione delle immagini', 'Scegli in che modo gestire le immagini.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options']['attached'] = 'Tutte le immagini come file allegati';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options']['inline'] = 'Immagini con collegamenti interni';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options']['first'] = 'La prima immagine come icona della news';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options']['gallery'] = 'Usa l\'estensione News Gallery';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options']['gallery_first'] = 'Usa l\'estensione News Gallery, con la prima immagine come icona';

$GLOBALS['TL_LANG']['tl_zad_sendnews']['advanced_legend'] = 'Impostazioni avanzate';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check'] = array('Controllo della posta', 'Indica ogni quanto tempo effettuare il controllo della casella di posta.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['I'] = 'Solo manuale';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['H'] = 'Una volta all\'ora';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['D'] = 'Una volta al giorno';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['W'] = 'Una volta alla settimana';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['M'] = 'Una volta al mese';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish'] = array('Pubblicazione automatica', 'Seleziona il tipo di pubblicazione automatica delle news.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['pub0'] = 'Immediata';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['pub1'] = '1 giorno dopo';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['pub2'] = '2 giorni dopo';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['pub3'] = '3 giorni dopo';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['pub4'] = '4 giorni dopo';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['pub5'] = '5 giorni dopo';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['susp'] = 'Nessuna, solo inserimento';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action'] = array('Azione finale', 'Seleziona che azione eseguire al termine dell\'inserimento delle news.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action_options']['delete'] = 'Cancella le email';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action_options']['log'] = 'Cancella le email, ma salva il contenuto nei file di log';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action_options']['move'] = 'Sposta le email in un\'altra cartella';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['move_mailbox'] = array('Cartella di destinazione', 'Inserisci il nome della cartella, presente all\'interno della casella di posta, in cui spostare le email.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['active'] = array('Abilita', 'Abilita o meno il gestore delle news via email.');

$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_command'] = array('Stringa di comando', 'Stringa di comando usata per il collegamento con il server di posta.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['source'] = array('File di importazione', 'Seleziona uno o più file di importazione (.zip).');
  
$GLOBALS['TL_LANG']['tl_zad_sendnews']['import'] = array('Importa', 'Importa un gestore delle news via email');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['new'] = array('Nuovo', 'Crea un nuovo gestore delle news via email');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['edit'] = array('Modifica', 'Modifica il gestore delle news via email con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['copy'] = array('Duplica', 'Duplica il gestore delle news via email con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['delete'] = array('Cancella', 'Cancella il gestore delle news via email con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['show'] = array('Dettagli', 'Mostra dettagli per il gestore delle news via email con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['export'] = array('Esporta', 'Esporta il gestore delle news via email con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['check'] = array('Controlla la posta', 'Controlla la posta del gestore delle news via email con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['toggle'] = array('Abilita/Disabilita', 'Abilita/Disabilita il gestore delle news via email con ID %s');
  
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_port'] = 'Il numero di porta deve essere compreso tra 0 e 65535.';


?>