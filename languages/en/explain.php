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
 * Help wizard messages
 */
$GLOBALS['TL_LANG']['XPL']['zad_sendnews_date'] = array(
  array('Formato date',
    'Sono supportati tutti i formati date usati nel linguaggio PHP, inoltre si può usare la barra "/" per creare un percorso gerarchico.<br />
    Ogni formato è indicato da una lettera: nel seguito sono indicati quelli più usati.<br />
    '),
  array('Giorno',
    '<dl>
    <dt><strong>d</strong></dt>
    <dd>Giorno del mese a due cifre, da 01 a 31.</dd>
    <dt><strong>j</strong></dt>
    <dd>Giorno del mese senza zeri davanti alle cifre, da 1 a 31.</dd>
    </dl>'),
  array('Mese',
    '<dl>
    <dt><strong>m</strong></dt>
    <dd>Mese come numero a due cifre, da 01 a 12.</dd>
    <dt><strong>n</strong></dt>
    <dd>Mese come numero senza zeri davanti alle cifre, da 1 a 12.</dd>
    </dl>'),
  array('Anno',
    '<dl>
    <dt><strong>Y</strong></dt>
    <dd>Anno a quattro cifre, es. 2013.</dd>
    <dt><strong>y</strong></dt>
    <dd>Anno a due cifre, es. 13.</dd>
    </dl>'),
  array('Percorso gerarchico',
    '<dl>
    <dt><strong>/</strong></dt>
    <dd>Vengono create più sottocartelle.</dd>
    </dl>'),
  array('Esempi',
    '<dl>
    <dt><strong>Y-m-d</strong></dt>
    <dd>Raggruppa i file per giorno, creando sottocartelle del tipo "2013-03-29".</dd>
    <dt><strong>Y-m</strong></dt>
    <dd>Raggruppa i file per mese, creando sottocartelle del tipo "2013-03".</dd>
    <dt><strong>Y</strong></dt>
    <dd>Raggruppa i file per anno, creando sottocartelle del tipo "2013".</dd>
    <dt><strong>Y/m</strong></dt>
    <dd>Raggruppa i file per mese, creando sottocartelle per gli anni (es. "2013") e al loro interno cartelle per i mesi (es. "03").</dd>
    </dl>')
);
$GLOBALS['TL_LANG']['XPL']['zad_sendnews_re'] = array(
  array('Sintassi delle espressioni regolari',
    'Per informazioni sulla sintassi delle espressioni regolari visita la pagina: <a href="http://it.wikipedia.org/wiki/Espressione_regolare" title="Vai al sito Wikipedia" target="_blank">http://it.wikipedia.org/wiki/Espressione_regolare</a>.')
);
$GLOBALS['TL_LANG']['XPL']['zad_sendnews_params'] = array(
  array('Parametri speciali',
    'Si possono utilizzare i seguenti parametri speciali:<br />
    <dl>
    <dt><strong>{{headline}}</strong></dt><dd>Questo parametro verrà sostituito dal contenuto attuale del titolo della news.</dd>
    <dt><strong>{{subheadline}}</strong></dt><dd>Questo parametro verrà sostituito dal contenuto attuale del sottotitolo della news.</dd>
    <dt><strong>{{html}}</strong></dt><dd>Questo parametro verrà sostituito dal contenuto attuale del testo formattato della news.</dd>
    <dt><strong>{{text}}</strong></dt><dd>Questo parametro verrà sostituito dal contenuto attuale del testo semplice (non formattato) della news.</dd>
    <dt><strong>{{teaser}}</strong></dt><dd>Questo parametro verrà sostituito dal contenuto attuale del testo introduttivo della news.</dd>
    <dt><strong>{{email_subject}}</strong></dt><dd>Questo parametro verrà sostituito dal contenuto originale dell\'oggetto dell\'email.</dd>
    <dt><strong>{{email_sender}}</strong></dt><dd>Questo parametro verrà sostituito dal contenuto originale del mittente dell\'email.</dd>
    </dl>')
);
$GLOBALS['TL_LANG']['XPL']['zad_sendnews_re_replace'] = array(
  &$GLOBALS['TL_LANG']['XPL']['zad_sendnews_re'][0],
  &$GLOBALS['TL_LANG']['XPL']['zad_sendnews_params'][0]
);

