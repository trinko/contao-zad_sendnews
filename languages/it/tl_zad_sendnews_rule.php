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
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['name'] = array('Titolo', 'Inserisci un nome identificativo per la regola.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target'] = array('Obiettivo', 'Seleziona l\'obiettivo della regola, scelto tra i campi della notizia.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action'] = array('Azione', 'Seleziona l\'azione da eseguire.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['re_search'] = array('Cerca', 'Inserisci il testo da cercare, usando la sintassi delle espressioni regolari ma senza delimitatori (ad esempio: [a-z]+@.*). La ricerca ignora le differenze tra maiuscolo e minuscolo.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['re_replace'] = array('Sostituisci', 'Inserisci il testo da sostituire a quello cercato, usando la sintassi delle espressioni regolari. Si possono usare anche alcuni parametri speciali, che si riferiscono ai campi della news e dell\'email.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['txt_replace'] = array('Rimpiazza', 'Inserisci il testo da usare al posto del contenuto indicato. Si possono usare anche alcuni parametri speciali, che si riferiscono ai campi della news e dell\'email.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['maxlen'] = array('Lunghezza massima', 'Inserisci la lunghezza massima per il testo introduttivo. Il valore deve essere compreso tra 50 e 10000.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['taglist'] = array('Lista dei tag HTML', 'Inserisci la lista dei tag HTML, usando la virgola come separatore (ad esempio: em,strong,p,table).');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['tag_replace'] = array('Rimpiazza tag HTML', 'Inserisci il tag HTML ed i relativi attributi, da usare al posto di ognuno degli elementi della lista (ad esempio: strong class="bold").');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['paramlist'] = array('Lista degli attributi dei tag HTML', 'Inserisci la lista degli attributi presenti nei tag HTML, usando la virgola come separatore (ad esempio: style,class,title).');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['extlist'] = array('Lista dei tipi di file', 'Inserisci la lista delle estensioni dei file, usando la virgola come separatore (ad esempio: doc,rtf,txt,xls).');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['active'] = array('Abilita', 'Abilita o meno la regola.');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['settings_legend'] = 'Impostazioni principali';
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_legend'] = 'Impostazioni azione';
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['advanced_legend'] = 'Impostazioni avanzate';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['new'] = array('Nuovo', 'Crea una nuova regola');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['pastenew'] = array('Aggiunge una nuova regola all\'inizio', 'Aggiunge una nuova regola dopo quella con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['pasteafter'] = array('Incolla la regola all\'inizio', 'Incolla la regola dopo quella con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['edit'] = array('Modifica', 'Modifica la regola con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['copy'] = array('Duplica', 'Duplica la regola con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['cut'] = array('Sposta', 'Cambia la posizione della regola con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['delete'] = array('Cancella', 'Cancella la regola con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['toggle'] = array('Abilita/Disabilita', 'Abilita o disabilita la regola con ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['show'] = array('Dettagli', 'Mostra i dettagli della regola con ID %s');


/**
 * Labels
 */
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target_options']['headline'] = 'Titolo';
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target_options']['subheadline'] = 'Sottotitolo';
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target_options']['teaser'] = 'Introduzione';
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target_options']['html'] = 'Testo formattato';
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target_options']['text'] = 'Testo semplice, non formattato';
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target_options']['files'] = 'Allegati';
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['none'] = array('Nessuna azione', 'Non viene eseguita nessuna modifica.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['regex'] = array('Cerca e sostituisci', 'Permette di cercare e sostituire un testo. Sia per la ricerca che per la sostituzione si usa la sintassi delle espressioni regolari. Nel testo da sostituire è possibile usare alcuni parametri speciali, che si riferiscono ai campi della news e dell\'email.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['replace'] = array('Rimpiazza il contenuto del campo', 'Sostituisce l\'intero contenuto del campo con il testo indicato. Nel testo da inserire è possibile usare alcuni parametri speciali, che si riferiscono ai campi della news e dell\'email.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['delete'] = array('Cancella il contenuto del campo', 'Elimina l\'intero contenuto del campo.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['intro'] = array('Crea testo introduttivo', 'Crea automaticamente il testo introduttivo, della dimensione massima indicata e con la lista dei tag HTML ammessi.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['striptags'] = array('Cancella tag HTML', 'Elimina i tag HTML indicati, senza modificare il testo contenuto.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['deltags'] = array('Cancella e svuota tag HTML', 'Elimina i tag HTML indicati, cancellando anche tutto il testo contenuto.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['rentags'] = array('Rinomina tag HTML', 'Modifica i tag HTML indicati, sostituindoli con il nome e gli attributi indicati.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['voidtags'] = array('Elimina tag HTML vuoti', 'Elimina i tag HTML elencati purché non contengano del testo al loro interno.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['delparams'] = array('Elimina attributi dei tag HTML', 'Elimina gli attributi elencati presenti nei tag HTML.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['allow'] = array('Indica i tipi di file ammessi', 'Permette di indicare una lista di tipi di file ammessi come allegati.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['pdf'] = array('Indica i tipi di file da convertire in PDF', 'Permette di indicare una lista di tipi di file che saranno convertiti in formato PDF. A seconda della configurazione del sistema, questa opzione potrebbe non essere attiva.');


/**
 * Messages
 */
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['err_length'] = 'La lunghezza massima deve essere compresa tra 50 e 10000.';

