<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Zad_sendnews
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'zad_sendnews',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'zad_sendnews\ZadSendnews'        => 'system/modules/zad_sendnews/classes/ZadSendnews.php',
	'zad_sendnews\ZadSendnewsManager' => 'system/modules/zad_sendnews/classes/ZadSendnewsManager.php',

	// Models
	'zad_sendnews\ZadSendnewsModel'   => 'system/modules/zad_sendnews/models/ZadSendnewsModel.php',
));
