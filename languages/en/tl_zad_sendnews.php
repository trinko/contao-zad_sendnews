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
$GLOBALS['TL_LANG']['tl_zad_sendnews']['name'] = array('Title', 'Enter a name for the send news manager.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_name'] = array('Server Name', 'Enter the address of the mail server (i.e. pop.gmail.com).');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_port'] = array('Server Port', 'Enter the port number of the mail server (0 for default).');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_type'] = array('Server Type', 'Choose the type of the mail server.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls'] = array('Security', 'Choose the security protocol to use.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_user'] = array('Username', 'Enter the username of the mailbox.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_password'] = array('Password', 'enter the password of the mailbox.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_mailbox'] = array('Folder', 'Enter the folder name of the mailbox (blank for default folder).');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['news_archive'] = array('News Archive', 'Choose a news archive.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['news_author'] = array('Author', 'Choose an author for the news.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure'] = array('Attachments Allowed', 'Enable file attachments in news.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dir'] = array('Attachments Folder', 'Choose the folder where to save attached files.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dirtype'] = array('Grouping by Date', 'Enter the date format to group attachment files in subfolders; for example, "Y-m" create a subfolder for each month (leave blank to not use subfolders).');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_icon'] = array('News Icon', 'Use first image as news icon.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images'] = array('Image Management', 'Choose how to manage images.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['gallery_size'] = array('Image width and height', 'Here you can set the image dimensions and the resize mode.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['gallery_perRow'] = array('Thumbnails per row', 'The number of image thumbnails per row.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['gallery_tpl'] = array('Gallery template', 'Here you can select the gallery template.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check'] = array('Check time', 'Choose how often to check email.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish'] = array('Automatic Publishing', 'Choose when to publish news.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action'] = array('Final Action', 'Choose what to do after entering the news.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['move_mailbox'] = array('Destination Folder', 'Enter the mailbox folder name where to move emails.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['active'] = array('Enable', 'Enable the send news manager.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_command'] = array('Command String', 'Command string for the mail server.');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_zad_sendnews']['title_legend'] = 'Title';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_legend'] = 'Mail Server';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['news_legend'] = 'News Archive';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_legend'] = 'Attachments';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['advanced_legend'] = 'Advanced Settings';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_zad_sendnews']['import'] = array('Import', 'Import a send news manager');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['new'] = array('New', 'Create a send news manager');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['edit'] = array('Edit', 'Edit the send news manager with ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['editheader'] = array('Settings', 'Change settings of the send news manager with ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['copy'] = array('Copy', 'Copy the send news manager with ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['delete'] = array('Delete', 'Delete the send news manager with ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['export'] = array('Export', 'Export the send news manager with ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['check'] = array('Check emails', 'Check emails for the send news manager with ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['toggle'] = array('Toggle', 'Enable/Disable the send news manager with ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['show'] = array('Show', 'Show details of the send news manager with ID %s');


/**
 * Labels
 */
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_type_options']['pop3'] = 'POP3';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_type_options']['imap'] = 'IMAP';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['disable'] = 'None';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['validate'] = 'TLS if available, with certificate validation';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['novalidate'] = 'TLS if available, without certificate validation';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['tls_validate'] = 'TLS with certificate validation';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['tls_novalidate'] = 'TLS without certificate validation';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['ssl_validate'] = 'SSL with certificate validation';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['ssl_novalidate'] = 'SSL without certificate validation';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options']['none'] = 'Delete all images';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options']['attached'] = 'All images as attached files';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options']['inline'] = 'Images inserted inline';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options']['gallery'] = 'Use image gallery';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['I'] = 'Only manually';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['H'] = 'Once an hour';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['D'] = 'Once a day';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['W'] = 'Once a week';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['M'] = 'Once a month';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['susp'] = 'Never, insert unpublished news';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['pub'] = 'Immediately';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['H1'] = '1 hour after';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['H2'] = '2 hours after';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['H3'] = '3 hours after';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['H6'] = '6 hours after';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['H12'] = '12 hours after';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['D1'] = '1 day after';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['D2'] = '2 days after';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action_options']['delete'] = 'Delete emails';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action_options']['log'] = 'Delete emails, but save contents in log files';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action_options']['move'] = 'Move emails to another mailbox folder';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['import_source'] = array('Source files', 'Choose one or more ".zip" files.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['lbl_gallery'] = 'Image Gallery';


/**
 * Messages
 */
$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_port'] = 'Port number must be between 0 and 65535.';

