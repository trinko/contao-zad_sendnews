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
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['name'] = array('Name', 'The rule name.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target'] = array('Target', 'Choose the target field for the rule.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action'] = array('Action', 'Choose the action to take.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['re_search'] = array('Search', 'Enter text to search, using regular expression syntax without delimiters (i.e. [a-z]+@.*). Search is case insensitive.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['re_replace'] = array('Replace', 'Enter text to replace, using regular expression syntax. You can use some special parameters, which refer to news fields and email ones.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['txt_replace'] = array('Replace', 'Enter text to replace. You can use some special parameters, which refer to news fields and email ones.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['maxlen'] = array('Max length', 'Enter the max length for the automatic teaser. The value must an integer between 50 and 10000.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['taglist'] = array('HTML tag list', 'Enter HTML tags as a comma separated list (i.e. em,strong,p,table).');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['tag_replace'] = array('Replace HTML tag', 'Enter the HTML tag and its attributes, which will be used for replace any specified tag (i.e. strong class="bold").');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['paramlist'] = array('HTML attribute list', 'Enter HTML attributes as a comma separated list (i.e. style,class,title).');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['extlist'] = array('File type list', 'Enter file types as a comma separated list (i.e. doc,rtf,txt,xls).');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['active'] = array('Enable', 'Enable the rule.');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['settings_legend'] = 'General Settings';
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_legend'] = 'Action Settings';
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['advanced_legend'] = 'Advanced settings';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['new'] = array('New', 'Create a new rule');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['pastenew'] = array('Add a rule as first', 'Add a new rule after ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['pasteafter'] = array('Paste the rule as first', 'Paste the rule after ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['edit'] = array('Edit', 'Edit the rule with ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['copy'] = array('Copy', 'Copy the rule with ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['cut'] = array('Move', 'Move the rule with ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['delete'] = array('Delete', 'Delete the rule with ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['toggle'] = array('Toggle', 'Enable/Disable the rule with ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['show'] = array('Show', 'Show details of the rule with ID %s');


/**
 * Labels
 */
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target_options']['headline'] = 'Headline';
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target_options']['subheadline'] = 'Subheadline';
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target_options']['teaser'] = 'Teaser';
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target_options']['html'] = 'Formatted Text';
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target_options']['text'] = 'Plain Text';
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target_options']['files'] = 'Attachments';
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['none'] = array('No action', 'No field is changed.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['regex'] = array('Search and replace', 'Search some text and replace it with another one. You can use the regular expression syntax. In the replace text you can use some special parameters, which refer to news fields and email ones.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['replace'] = array('Replace content', 'Replace all contents of the specified field. In the replace text you can use some special parameters, which refer to news fields and email ones.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['delete'] = array('Delete content', 'Delete all contents of the specified field.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['intro'] = array('Automatic teaser', 'Create automatically a teaser for the news. You can set the max lenght and the allowed HTML tag list.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['striptags'] = array('Strip HTML tags', 'Strip the specified HTML tags, without changing the text inside them.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['deltags'] = array('Remove HTML tags with content', 'Delete the specified HTML tags, removing all the text inside them.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['rentags'] = array('Rename HTML tags', 'Change the specified HTML tags, replacing with a new tag and new attributes.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['voidtags'] = array('Remove void HTML tags', 'Delete recursively the specified HTML tags, only if they do not contain any text inside them.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['delparams'] = array('Remove HTML attributes', 'Delete the specified attributes from all HTML tags.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['allow'] = array('List allowed files', 'List file types allowed for attachments.');
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options']['pdf'] = array('List files to convert to PDF', 'List file types which will be converted to PDF documents. Depending on system configuration, this option may not be active.');


/**
 * Messages
 */
$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['err_length'] = 'Max length value must be between 50 and 10000.';

