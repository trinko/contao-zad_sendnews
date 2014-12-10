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
 * Table tl_zad_sendnews
 */
$GLOBALS['TL_DCA']['tl_zad_sendnews'] = array(
	// Configuration
	'config' => array(
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_zad_sendnews_rule'),
		'enableVersioning'            => true,
    'onsubmit_callback' => array(
			array('tl_zad_sendnews', 'storeServerCommand')
		),
		'sql' => array(
      'keys'                        => array('id' => 'primary')
    )
	),
	// Listing
	'list' => array(
		'sorting' => array(
			'mode'                        => 1,
			'fields'                      => array('name'),
			'flag'                        => 1,
			'panelLayout'                 => 'filter,search,limit'
		),
		'label' => array(
			'fields'                      => array('name','server_name'),
			'format'                      => '%s [%s]'
		),
		'global_operations' => array(
			'import' => array(
				'label'                     => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['import'],
				'href'                      => 'key=import',
				'attributes'                => 'onclick="Backend.getScrollOffset()"',
        'icon'                      => 'system/modules/zad_sendnews/assets/import.gif'
			),
			'all' => array(
				'label'                     => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                      => 'act=select',
				'class'                     => 'header_edit_all',
				'attributes'                => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			)
		),
		'operations' => array(
			'edit' => array(
				'label'                     => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['edit'],
				'href'                      => 'table=tl_zad_sendnews_rule',
				'icon'                      => 'edit.gif'
			),
			'editheader' => array(
				'label'                     => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['editheader'],
				'href'                      => 'act=edit',
				'icon'                      => 'header.gif'
			),
			'copy' => array(
				'label'                     => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['copy'],
				'href'                      => 'act=copy',
				'icon'                      => 'copy.gif'
			),
			'delete' => array(
				'label'                     => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['delete'],
				'href'                      => 'act=delete',
				'icon'                      => 'delete.gif',
				'attributes'                => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'export' => array(
				'label'                     => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['export'],
				'href'                      => 'key=export',
				'icon'                      => 'system/modules/zad_sendnews/assets/export.gif'
			),
			'check' => array(
				'label'                     => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['check'],
				'href'                      => 'key=check',
				'icon'                      => 'system/modules/zad_sendnews/assets/check.gif'
			),
			'toggle' => array(
				'label'                     => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['toggle'],
				'icon'                      => 'visible.gif',
				'attributes'                => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
				'button_callback'           => array('tl_zad_sendnews', 'toggleIcon')
			),
			'show' => array(
				'label'                     => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['show'],
				'href'                      => 'act=show',
				'icon'                      => 'show.gif'
			)
		)
	),
	// Palettes
	'palettes' => array(
		'__selector__'                => array('enclosure','enclosure_images','post_action'),
		'default'                     => '{title_legend},name;{server_legend},server_name,server_port,server_type,server_tls,server_user,server_password,server_mailbox;{news_legend},news_archive,news_author;{enclosure_legend},enclosure;{advanced_legend:hide},time_check,auto_publish,post_action,active;'
	),
	// Subpalettes
	'subpalettes' => array(
    'enclosure'                   => 'enclosure_dir,enclosure_dirtype,enclosure_images',
    'enclosure_images_gallery'    => 'gallery_size,gallery_perRow,gallery_tpl',
    'post_action_move'            => 'move_mailbox'
	),
	// Fields
	'fields' => array(
		'id' => array(
			'sql'                         => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array(
			'sql'                         => "int(10) unsigned NOT NULL default '0'"
		),
		'name' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['name'],
			'search'                      => true,
			'exclude'                     => true,
			'inputType'                   => 'text',
			'eval'                        => array('mandatory'=>true, 'unique'=>true, 'maxlength'=>255, 'tl_class'=>'long'),
			'sql'                         => "varchar(255) NOT NULL default ''"
		),
		'server_name' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_name'],
			'search'                      => true,
			'exclude'                     => true,
			'inputType'                   => 'text',
			'eval'                        => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                         => "varchar(255) NOT NULL default ''"
		),
		'server_port' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_port'],
			'exclude'                     => true,
			'inputType'                   => 'text',
			'default'                     => '0',
			'eval'                        => array('mandatory'=>true, 'rgxp'=>'digit', 'tl_class'=>'w50'),
			'sql'                         => "int(6) unsigned NOT NULL default '0'",
			'save_callback' => array(
			 array('tl_zad_sendnews', 'checkPort')
			)
		),
		'server_type' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_type'],
			'exclude'                     => true,
			'inputType'                   => 'select',
			'options'                     => array('pop3','imap'),
			'reference'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_type_options'],
			'eval'                        => array('mandatory'=>true, 'tl_class'=>'w50'),
			'sql'                         => "varchar(16) NOT NULL default ''"
		),
		'server_tls' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls'],
			'exclude'                     => true,
			'inputType'                   => 'select',
			'options'                     => array('disable','validate','novalidate','tls_validate','tls_novalidate','ssl_validate','ssl_novalidate'),
			'default'                     => 'novalidate',
			'reference'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options'],
			'eval'                        => array('mandatory'=>true, 'tl_class'=>'w50'),
			'sql'                         => "varchar(16) NOT NULL default ''"
		),
		'server_user' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_user'],
			'exclude'                     => true,
			'search'                      => true,
			'inputType'                   => 'text',
			'eval'                        => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                         => "varchar(255) NOT NULL default ''"
		),
		'server_password' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_password'],
			'exclude'                     => true,
			'inputType'                   => 'text',
			'eval'                        => array('mandatory'=>true, 'maxlength'=>255, 'hideInput'=>true, 'tl_class'=>'w50'),
			'sql'                         => "varchar(255) NOT NULL default ''"
		),
		'server_mailbox' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_mailbox'],
			'exclude'                     => true,
			'inputType'                   => 'text',
			'eval'                        => array('maxlength'=>255),
			'sql'                         => "varchar(255) NOT NULL default ''"
		),
		'news_archive' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['news_archive'],
			'filter'                      => true,
			'exclude'                     => true,
			'inputType'                   => 'select',
			'foreignKey'                  => 'tl_news_archive.title',
			'eval'                        => array('mandatory'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
			'sql'                         => "int(10) unsigned NOT NULL default '0'",
			'relation'                    => array('type'=>'hasOne', 'load'=>'lazy')
		),
		'news_author' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['news_author'],
			'exclude'                     => true,
			'inputType'                   => 'select',
			'foreignKey'                  => 'tl_user.username',
			'eval'                        => array('mandatory'=>true, 'tl_class'=>'w50'),
			'sql'                         => "int(10) unsigned NOT NULL default '0'",
			'relation'                    => array('type'=>'hasOne', 'load'=>'lazy')
		),
		'enclosure' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure'],
			'exclude'                     => true,
			'inputType'                   => 'checkbox',
			'default'                     => '',
			'eval'                        => array('submitOnChange'=>true, 'tl_class'=>'clr'),
			'sql'                         => "char(1) NOT NULL default ''"
		),
		'enclosure_dir' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dir'],
			'exclude'                     => true,
			'inputType'                   => 'fileTree',
			'eval'                        => array('mandatory'=>true, 'fieldType'=>'radio', 'files'=>false, 'tl_class'=>'clr'),
			'sql'                         => "binary(16) NULL"
		),
		'enclosure_dirtype' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dirtype'],
			'exclude'                     => true,
			'inputType'                   => 'text',
			'default'                     => '',
      'explanation'                 => 'zad_sendnews_date',
			'eval'                        => array('helpwizard'=>true, 'tl_class'=>'w50'),
			'sql'                         => "varchar(255) NOT NULL default ''"
		),
		'enclosure_images' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images'],
			'exclude'                     => true,
			'inputType'                   => 'select',
			'options'                     => array('none','attached','inline','gallery'),
			'default'                     => 'inline',
			'reference'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options'],
			'eval'                        => array('mandatory'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50'),
			'sql'                         => "varchar(16) NOT NULL default ''"
		),
		'gallery_size' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['gallery_size'],
			'exclude'                     => true,
			'inputType'                   => 'imageSize',
			'options'                     => $GLOBALS['TL_CROP'],
			'reference'                   => &$GLOBALS['TL_LANG']['MSC'],
			'eval'                        => array('rgxp'=>'digit', 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50'),
			'sql'                         => "varchar(64) NOT NULL default ''"
		),
    'gallery_perRow' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['gallery_perRow'],
			'exclude'                     => true,
			'inputType'                   => 'select',
			'options'                     => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12),
			'default'                     => 4,
			'eval'                        => array('mandatory'=>true, 'tl_class'=>'w50'),
			'sql'                         => "smallint(5) unsigned NOT NULL default '0'"
		),
		'gallery_tpl' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['gallery_tpl'],
			'exclude'                     => true,
			'inputType'                   => 'select',
			'options_callback'            => array('tl_zad_sendnews', 'getGalleryTemplates'),
			'eval'                        => array('mandatory'=>true, 'tl_class'=>'w50'),
			'sql'                         => "varchar(64) NOT NULL default ''"
		),
    'time_check' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check'],
			'exclude'                     => true,
			'inputType'                   => 'select',
			'options'                     => array('I','H','D','W','M'),
			'default'                     => 'H',
			'reference'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options'],
			'eval'                        => array('mandatory'=>true, 'tl_class'=>'w50'),
			'sql'                         => "varchar(16) NOT NULL default ''"
		),
		'auto_publish' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish'],
			'exclude'                     => true,
			'inputType'                   => 'select',
			'options'                     => array('susp','pub','H1','H2','H3','H6','H12','D1','D2'),
			'reference'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options'],
			'default'                     => 'pub0',
			'eval'                        => array('mandatory'=>true, 'tl_class'=>'w50'),
			'sql'                         => "varchar(16) NOT NULL default ''"
		),
		'post_action' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action'],
			'exclude'                     => true,
			'inputType'                   => 'select',
			'options'                     => array('delete','log','move'),
			'reference'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action_options'],
			'default'                     => 'delete',
			'eval'                        => array('mandatory'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50'),
			'sql'                         => "varchar(16) NOT NULL default ''"
		),
		'move_mailbox' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['move_mailbox'],
			'exclude'                     => true,
			'inputType'                   => 'text',
			'eval'                        => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                         => "varchar(255) NOT NULL default ''"
		),
		'active' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['active'],
			'exclude'                     => true,
			'inputType'                   => 'checkbox',
			'default'                     => false,
			'eval'                        => array('doNotCopy'=>true, 'tl_class'=>'clr'),
			'sql'                         => "char(1) NOT NULL default ''"
		),
    'server_command' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_command'],
			'exclude'                     => true,
			'inputType'                   => 'text',
			'eval'                        => array('readonly'=>true, 'disabled'=>true),
			'sql'                         => "varchar(255) NOT NULL default ''"
		)
	)
);


/**
 * Class tl_zad_sendnews
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright Antonello Dessì 2012-2013
 * @author    Antonello Dessì
 * @package   zad_sendnews
 */
class tl_zad_sendnews extends Backend {

	/**
	 * Return the "toggle active mode" button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function toggleIcon($row, $href, $label, $title, $icon, $attributes) {
		if (strlen(Input::get('tid'))) {
			$this->toggleVisibility(Input::get('tid'), (Input::get('state') == 1));
			$this->redirect($this->getReferer());
		}
		$href .= '&amp;tid='.$row['id'].'&amp;state='.($row['active'] ? '' : 1);
		if (!$row['active']) {
			$icon = 'invisible.gif';
		}
		return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.Controller::generateImage($icon, $label).'</a> ';
	}

	/**
	 * Disable/enable
	 * @param integer
	 * @param boolean
	 */
	public function toggleVisibility($id, $active) {
		// Update the database
		$this->Database->prepare("UPDATE tl_zad_sendnews SET active=? WHERE id=?")
					         ->execute(($active ? 1 : ''), $id);
	}

	/**
	 * Check the port value.
	 * @param mixed
	 * @param \DataContainer
	 * @return mixed
	 * @throws \Exception
	 */
	public function checkPort($value, $dc) {
    if (intval($value) > 65535 || intval($value) < 0) {
      throw new Exception($GLOBALS['TL_LANG']['tl_zad_sendnews']['err_port']);
    }
		return $value;
	}

	/**
	 * Create and store the server command string.
	 * @param \DataContainer
	 */
	public function storeServerCommand($dc) {
		if (!$dc->activeRecord) {
		  // return if there is no active record
			return;
		}
    // create command string
		$server = $dc->activeRecord->server_name;
		$type = $dc->activeRecord->server_type;
		$mailbox = $dc->activeRecord->server_mailbox;
		switch ($dc->activeRecord->server_tls) {
		  case 'disable':
				$tls = '/notls';
				$cert = '';
				break;
			case 'validate':
				$tls = '';
				$cert = '';
				break;
			case 'novalidate':
				$tls = '';
				$cert = '/novalidate-cert';
				break;
			case 'tls_validate':
				$tls = '/tls';
				$cert = '';
				break;
			case 'tls_novalidate':
				$tls = '/tls';
				$cert = '/novalidate-cert';
				break;
			case 'ssl_validate':
				$tls = '/ssl';
				$cert = '';
				break;
			case 'ssl_novalidate':
				$tls = '/ssl';
				$cert = '/novalidate-cert';
				break;
		}
		$port = $dc->activeRecord->server_port;
		if ($port == 0) {
			if ($type == 'pop3')
				$port = ($tls == '/ssl') ? 995 : 110;
			else
				$port = ($tls == '/ssl') ? 993 : 143;
		}
    $cmd = '{' . $server . ':' . $port . '/' . $type . $tls . $cert . '}' . $mailbox;
    // update
		$this->Database->prepare('UPDATE tl_zad_sendnews SET server_command=? WHERE id=?')
					         ->execute($cmd, $dc->id);
	}

	/**
	 * Return all gallery templates as array
	 * @return array
	 */
	public function getGalleryTemplates() {
		return $this->getTemplateGroup('gallery_');
	}

}

