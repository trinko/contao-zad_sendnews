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


$GLOBALS['TL_LANG']['tl_zad_sendnews']['title_legend'] = 'Title';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['name'] = array('Title', 'Name of the send news manager.');

$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_legend'] = 'Mail Server';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_name'] = array('Server Name', 'Name of the mail server (i.e. pop.gmail.com).');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_port'] = array('Server Port', 'Port number of the mail server (0 for default).');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_type'] = array('Server Type', 'Type of the mail server.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_type_options']['pop3'] = 'POP3';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_type_options']['imap'] = 'IMAP';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls'] = array('Security', 'Choose the security protocol to use.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['disable'] = 'None';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['validate'] = 'TLS if available, with certificate validation';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['novalidate'] = 'TLS if available, without certificate validation';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['tls_validate'] = 'TLS with certificate validation';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['tls_novalidate'] = 'TLS without certificate validation';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['ssl_validate'] = 'SSL with certificate validation';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options']['ssl_novalidate'] = 'SSL without certificate validation';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_user'] = array('Username', 'The username of the mailbox.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_password'] = array('Password', 'The password of the mailbox.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_mailbox'] = array('Folder', 'Folder name in the mailbox (blank for default).');
  
$GLOBALS['TL_LANG']['tl_zad_sendnews']['news_legend'] = 'News Archive';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['news_archive'] = array('News Archive', 'Choose a news archive.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['news_author'] = array('Author', 'Choose an author for the news.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure'] = array('Attachments Allowed', 'Enable file attachments in news.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dir'] = array('Attachments Folder', 'Choose the folder where to save attached files.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dirtype'] = array('Grouping by Date', 'Choose whether to group attachments by year (using \'YYYY\' subfolders), by month (using \'YYYY-MM\' subfolders), by day (using \'YYYY-MM-DD\' subfolders) or not at all (using no subfolders).');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dirtype_options']['year'] = 'Grouping by year: \'YYYY\'';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dirtype_options']['month'] = 'Grouping by month: \'YYYY-MM\'';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dirtype_options']['day'] = 'Grouping by day: \'YYYY-MM-DD\'';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images'] = array('Image Management', 'Choose how to manage images.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options']['attached'] = 'All images attached as files';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options']['inline'] = 'Use inline images';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options']['first'] = 'First image as news thumbnail';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options']['gallery'] = 'Use News Gallery';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options']['gallery_first'] = 'Use News Gallery, with first image as news thumbnail';

$GLOBALS['TL_LANG']['tl_zad_sendnews']['advanced_legend'] = 'Advanced Settings';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check'] = array('Check time', 'Choose how often to check email.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['I'] = 'Only manually';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['H'] = 'Once an hour';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['D'] = 'Once a day';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['W'] = 'Once a week';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options']['M'] = 'Once a month';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish'] = array('Automatic Publishing', 'Choose when to publish news.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['pub0'] = 'Immediately';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['pub1'] = '1 day after';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['pub2'] = '2 days after';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['pub3'] = '3 days after';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['pub4'] = '4 days after';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['pub5'] = '5 days after';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options']['susp'] = 'Never, insert unpublished news';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action'] = array('Final Action', 'Choose what to do after entering the news.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action_options']['delete'] = 'Delete emails';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action_options']['log'] = 'Delete emails, but save contents in log files';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action_options']['move'] = 'Move emails to another folder';
$GLOBALS['TL_LANG']['tl_zad_sendnews']['move_mailbox'] = array('Destination Folder', 'Folder name in the mailbox, where to move emails.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['active'] = array('Enable', 'Enable the send news manager.');

$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_command'] = array('Command String', 'Command string for the mail server.');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['source'] = array('Source files', 'Choose one or more ".zip" files from the files directory.');

$GLOBALS['TL_LANG']['tl_zad_sendnews']['import'] = array('Import', 'Import a send news manager');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['new'] = array('New', 'Create a send news manager');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['edit'] = array('Edit', 'Edit the send news manager with ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['copy'] = array('Copy', 'Copy the send news manager with ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['delete'] = array('Delete', 'Delete send news manager with ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['show'] = array('Show', 'Show details of send news manager with ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['export'] = array('Export', 'Export send news manager with ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['check'] = array('Check emails', 'Check emails for send news manager with ID %s');
$GLOBALS['TL_LANG']['tl_zad_sendnews']['toggle'] = array('Toggle', 'Enable/Disable the send news manager with ID %s');

$GLOBALS['TL_LANG']['tl_zad_sendnews']['err_port'] = 'Port number must be between 0 and 65535.';


?>