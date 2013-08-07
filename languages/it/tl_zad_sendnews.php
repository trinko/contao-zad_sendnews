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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_zad_sendnews']['name'] = array('Titolo', 'Inserisci un nome identificativo per il gestore di news via email.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_name'] = array('Nome del server', 'Inserisci il nome del server di posta (ad esempio: pop.gmail.com).');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_port'] = array('Porta del server', 'Inserisci il numero di porta del server di posta (0 per usare la porta predefinita).');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_type'] = array('Tipo del server', 'Seleziona il tipo del server di posta.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls'] = array('Sicurezza', 'Seleziona il protocollo di sicurezza da usare nell\'autenticazione.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_user'] = array('Utente', 'Inserisci il nome dell\'utente della casella di posta.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_password'] = array('Password', 'Inserisci la password della casella di posta.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_mailbox'] = array('Cartella', 'Inserisci il nome della cartella all\'interno della casella di posta (lascia vuoto per indicare la cartella predefinita).');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['news_archive'] = array('Archivio news', 'Seleziona l\'archivio news in cui inserire le notizie spedite per posta elettronica.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['news_author'] = array('Autore', 'Seleziona l\'autore delle notizie.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure'] = array('Consenti allegati', 'Abilita l\'inserimento di allegati nelle notizie.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dir'] = array('Cartella degli allegati', 'Seleziona la cartella dove memorizzare gli allegati.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dirtype'] = array('Raggruppamento allegati per data', 'Inserisci il formato della data da usare per raggruppare gli allegati in sottocartelle; ad es., "Y-m" crea una sottocartella per ogni mese (lascia il campo vuoto per non usare sottocartelle).');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_icon'] = array('Inserisce icona news', 'La prima immagine sarà usata come icona della notizia.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images'] = array('Gestione delle immagini', 'Scegli in che modo gestire le immagini.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check'] = array('Controllo della posta', 'Indica ogni quanto tempo effettuare il controllo della casella di posta.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish'] = array('Pubblicazione automatica', 'Seleziona il tipo di pubblicazione automatica delle notizie.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action'] = array('Azione finale', 'Seleziona che azione eseguire al termine dell\'inserimento delle notizie.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['move_mailbox'] = array('Cartella di destinazione', 'Inserisci il nome della cartella, presente all\'interno della casella di posta, in cui spostare le email.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['active'] = array('Abilita', 'Abilita o meno il gestore di news via email.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_command'] = array('Stringa di comando', 'Stringa di comando usata per il collegamento con il server di posta.');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_zad_sendnews']['title_legend'] = 'Titolo';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_legend'] = 'Server di posta';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['news_legend'] = 'Archivio news';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_legend'] = 'Allegati';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['advanced_legend'] = 'Impostazioni avanzate';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_zad_sendnews']['import'] = array('Importa', 'Importa un gestore di news via email');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['new'] = array('Nuovo', 'Crea un nuovo gestore di news via email');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['edit'] = array('Modifica', 'Modifica il gestore di news via email con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['editheader'] = array('Impostazioni', 'Cambia le impostazioni del gestore di news via email con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['copy'] = array('Duplica', 'Duplica il gestore di news via email con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['delete'] = array('Cancella', 'Cancella il gestore di news via email con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['export'] = array('Esporta', 'Esporta il gestore di news via email con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['check'] = array('Controlla la posta', 'Controlla la posta del gestore di news via email con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['toggle'] = array('Abilita/Disabilita', 'Abilita o disabilita il gestore di news via email con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['show'] = array('Dettagli', 'Mostra i dettagli per il gestore di news via email con ID %s');


/**
 * Labels
 */
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_type_options']['pop3'] = 'POP3';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_type_options']['imap'] = 'IMAP';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['disable'] = 'Nessuno';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['validate'] = 'Usa TLS se disponibile, con validazione dei certificati';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['novalidate'] = 'Usa TLS se disponibile, senza validazione dei certificati';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['tls_validate'] = 'Usa TLS con validazione dei certificati';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['tls_novalidate'] = 'Usa TLS senza validazione dei certificati';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['ssl_validate'] = 'Usa SSL con validazione dei certificati';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['ssl_novalidate'] = 'Usa SSL senza validazione dei certificati';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options']['none'] = 'Scarta le immagini';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options']['attached'] = 'Immagini come file allegati';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options']['inline'] = 'Immagini inserite all\'interno del testo';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options']['gallery'] = 'Usa la galleria di immagini';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['I'] = 'Solo manuale';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['H'] = 'Una volta all\'ora';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['D'] = 'Una volta al giorno';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['W'] = 'Una volta alla settimana';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['M'] = 'Una volta al mese';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['susp'] = 'Nessuna, solo inserimento';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['pub'] = 'Immediata';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['H1'] = '1 ora dopo';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['H2'] = '2 ore dopo';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['H3'] = '3 ore dopo';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['H6'] = '6 ore dopo';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['H12'] = '12 ore dopo';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['D1'] = '1 giorno dopo';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['D2'] = '2 giorni dopo';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action_options']['delete'] = 'Cancella le email';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action_options']['log'] = 'Cancella le email, ma salva il contenuto nei file di log';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action_options']['move'] = 'Sposta le email in un\'altra cartella';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['import_source'] = array('File di importazione', 'Seleziona uno o più file di importazione (.zip).');


/**
 * Messages
 */
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_port'] = 'Il numero di porta deve essere compreso tra 0 e 65535.';

