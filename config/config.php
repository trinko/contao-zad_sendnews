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
 * BACK END MODULES
 */
$GLOBALS['BE_MOD']['content']['zad_sendnews'] = array(
	'tables'		   =>	array('tl_zad_sendnews', 'tl_zad_sendnews_rule'),
	'icon'			   =>	'system/modules/zad_sendnews/assets/icon.png',
	'export'		   =>	array('ZadSendnews', 'exportManager'),
	'import'		   =>	array('ZadSendnews', 'importManager'),
	'check'		     =>	array('ZadSendnews', 'checkEmails')
);


/**
 * CRON JOBS
 */
$GLOBALS['TL_CRON']['hourly'][] = array('ZadSendnewsManager', 'cronJobHourly');
$GLOBALS['TL_CRON']['daily'][] = array('ZadSendnewsManager', 'cronJobDaily');
$GLOBALS['TL_CRON']['weekly'][] = array('ZadSendnewsManager', 'cronJobWeekly');
$GLOBALS['TL_CRON']['monthly'][] = array('ZadSendnewsManager', 'cronJobMonthly');


/**
 * HOOKS
 */
$GLOBALS['TL_HOOKS']['addLogEntry'][] = array('ZadSendnewsManager', 'addLogEntryHook');


/**
 * CONSTANTS
 */
define('ZAD_REPORT_MULTILINE', 'ZAD_REPORT_MULTILINE');
define('ZAD_REPORT', 'REPORT');

