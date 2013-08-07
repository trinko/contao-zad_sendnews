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
  array('Date Format',
    'All PHP date formats are supported. Besides, you can use the slash "/" to create a recursive path.<br />
    For each format is used a character: the following are the most used ones.<br />
    '),
  array('Day',
    '<dl>
    <dt><strong>d</strong></dt>
    <dd>Day of the month, 2 digits with leading zeros, from 01 to 31.</dd>
    <dt><strong>j</strong></dt>
    <dd>Day of the month without leading zeros, from 1 to 31.</dd>
    </dl>'),
  array('Month',
    '<dl>
    <dt><strong>m</strong></dt>
    <dd>Numeric representation of a month, with leading zeros, from 01 to 12.</dd>
    <dt><strong>n</strong></dt>
    <dd>Numeric representation of a month, without leading zeros, from 1 to 12.</dd>
    </dl>'),
  array('Year',
    '<dl>
    <dt><strong>Y</strong></dt>
    <dd>A full numeric representation of a year, 4 digits, for example 2013.</dd>
    <dt><strong>y</strong></dt>
    <dd>A two digit representation of a year, for example 13.</dd>
    </dl>'),
  array('Recursive path',
    '<dl>
    <dt><strong>/</strong></dt>
    <dd>It will be created subfolders.</dd>
    </dl>'),
  array('Examples',
    '<dl>
    <dt><strong>Y-m-d</strong></dt>
    <dd>It groups files by day, creating subfolders named as "2013-03-29".</dd>
    <dt><strong>Y-m</strong></dt>
    <dd>It groups files by month, creating subfolders named as "2013-03".</dd>
    <dt><strong>Y</strong></dt>
    <dd>It groups files by year, creating subfolders named as "2013".</dd>
    <dt><strong>Y/m</strong></dt>
    <dd>It groups files by month, creating subfolders for years (i.e. "2013") and, recursively, subfolders for months (i.e. "03").</dd>
    </dl>')
);
$GLOBALS['TL_LANG']['XPL']['zad_sendnews_re'] = array(
  array('Regular Expression Syntax',
    'For the syntax of regular expressions you can see the page: <a href="http://en.wikipedia.org/wiki/Regular_expression" title="Go to Wikipedia" target="_blank">http://en.wikipedia.org/wiki/Regular_expression</a>.')
);
$GLOBALS['TL_LANG']['XPL']['zad_sendnews_params'] = array(
  array('Special Parameters',
    'You can use the following special parameters:<br />
    <dl>
    <dt><strong>{{headline}}</strong></dt><dd>This parameter will be replaced by the current content of the news headline.</dd>
    <dt><strong>{{subheadline}}</strong></dt><dd>This parameter will be replaced by the current content of the news subheadline.</dd>
    <dt><strong>{{html}}</strong></dt><dd>This parameter will be replaced by the current content of the news formatted text.</dd>
    <dt><strong>{{text}}</strong></dt><dd>This parameter will be replaced by the current content of the news plain text.</dd>
    <dt><strong>{{teaser}}</strong></dt><dd>This parameter will be replaced by the current content of the news teaser.</dd>
    <dt><strong>{{email_subject}}</strong></dt><dd>This parameter will be replaced by the original content of the email subject.</dd>
    <dt><strong>{{email_sender}}</strong></dt><dd>This parameter will be replaced by the original content of the email sender.</dd>
    </dl>')
);
$GLOBALS['TL_LANG']['XPL']['zad_sendnews_re_replace'] = array(
  &$GLOBALS['TL_LANG']['XPL']['zad_sendnews_re'][0],
  &$GLOBALS['TL_LANG']['XPL']['zad_sendnews_params'][0]
);

