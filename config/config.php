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


/**
 * Back end modules
 */
$GLOBALS['BE_MOD']['content']['zad_sendnews'] = array
(
	'tables'		   =>	array('tl_zad_sendnews', 'tl_zad_sendnews_rule'),
	'icon'			   =>	'system/modules/zad_sendnews/html/icon.png',
	'export'		   =>	array('ZadSendnews', 'exportManager'),
	'import'		   =>	array('ZadSendnews', 'importManager'),
	'check'		     =>	array('ZadSendnews', 'checkEmails')
);


/**
 * Cron jobs
 */
$GLOBALS['TL_CRON']['hourly'][] = array('ZadSendnewsManager', 'cronJobHourly');
$GLOBALS['TL_CRON']['daily'][] = array('ZadSendnewsManager', 'cronJobDaily');
$GLOBALS['TL_CRON']['weekly'][] = array('ZadSendnewsManager', 'cronJobWeekly');
$GLOBALS['TL_CRON']['monthly'][] = array('ZadSendnewsManager', 'cronJobMonthly');


/**
 * Register hook to avoid HTML tags conversion to entities 
 */
// removed: there is a BUG in addLogEntry hook in Contao 2.11.x!!  
//$GLOBALS['TL_HOOKS']['addLogEntry'][] = array('ZadSendnewsManager', 'addLogEntryHook');


/**
 * Constant used in 'addLogEntry' hook  
 */
define('ZAD_REPORT_MULTILINE', 'ZAD_REPORT_MULTILINE');
define('ZAD_REPORT', 'REPORT');


?>