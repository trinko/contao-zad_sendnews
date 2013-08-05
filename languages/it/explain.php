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


$GLOBALS['TL_LANG']['XPL']['zad_sendnews_re'][0] = array('Sintassi delle espressioni regolari', 'Per informazioni sulla sintassi delle espressioni regolari visita la pagina: <a href="http://it.wikipedia.org/wiki/Espressione_regolare" title="Vai al sito Wikipedia" target="_blank">http://it.wikipedia.org/wiki/Espressione_regolare</a>.');

$GLOBALS['TL_LANG']['XPL']['zad_sendnews_params'][0] = array('Parametri speciali', 
'Si possono utilizzare i seguenti parametri speciali:<br />
<ul>
<li><strong>{{headline}}</strong><br />Questo parametro verrà sostituito dal contenuto attuale del titolo della news.</li>
<li><strong>{{subheadline}}</strong><br />Questo parametro verrà sostituito dal contenuto attuale del sottotitolo della news.</li>
<li><strong>{{html}}</strong><br />Questo parametro verrà sostituito dal contenuto attuale del testo formattato della news.</li>
<li><strong>{{text}}</strong><br />Questo parametro verrà sostituito dal contenuto attuale del testo semplice (non formattato) della news.</li>
<li><strong>{{teaser}}</strong><br />Questo parametro verrà sostituito dal contenuto attuale del testo introduttivo della news.</li>
<li><strong>{{email_subject}}</strong><br />Questo parametro verrà sostituito dal contenuto originale dell\'oggetto dell\'email.</li>
<li><strong>{{email_sender}}</strong><br />Questo parametro verrà sostituito dal contenuto originale del mittente dell\'email.</li>
</ul>');

$GLOBALS['TL_LANG']['XPL']['zad_sendnews_re_replace'][0] = &$GLOBALS['TL_LANG']['XPL']['zad_sendnews_re'][0];
$GLOBALS['TL_LANG']['XPL']['zad_sendnews_re_replace'][1] = &$GLOBALS['TL_LANG']['XPL']['zad_sendnews_params'][0];


?>