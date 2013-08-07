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


$GLOBALS['TL_LANG']['XPL']['zad_sendnews_re'][0] = array('Regular Expression Syntax', 'For the syntax of regular expressions you can see the page: <a href="http://en.wikipedia.org/wiki/Regular_expression" title="Go to Wikipedia" target="_blank">http://en.wikipedia.org/wiki/Regular_expression</a>.');

$GLOBALS['TL_LANG']['XPL']['zad_sendnews_params'][0] = array('Special Parameters', 
'You can use the following special parameters: <br />
<ul>
<li><strong>{{headline}}</strong><br />This parameter will be replaced by the current content of the news headline.</li>
<li><strong>{{subheadline}}</strong><br />This parameter will be replaced by the current content of the news subheadline.</li>
<li><strong>{{html}}</strong><br />This parameter will be replaced by the current content of the news formatted text.</li>
<li><strong>{{text}}</strong><br />This parameter will be replaced by the current content of the news plain text.</li>
<li><strong>{{teaser}}</strong><br />This parameter will be replaced by the current content of the news teaser.</li>
<li><strong>{{email_subject}}</strong><br />This parameter will be replaced by the original content of the email subject.</li>
<li><strong>{{email_sender}}</strong><br />This parameter will be replaced by the original content of the email sender.</li>
</ul>');

$GLOBALS['TL_LANG']['XPL']['zad_sendnews_re_replace'][0] = &$GLOBALS['TL_LANG']['XPL']['zad_sendnews_re'][0];
$GLOBALS['TL_LANG']['XPL']['zad_sendnews_re_replace'][1] = &$GLOBALS['TL_LANG']['XPL']['zad_sendnews_params'][0];


?>