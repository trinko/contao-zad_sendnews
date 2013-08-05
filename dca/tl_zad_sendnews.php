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
 * Table tl_zad_sendnews
 */
$GLOBALS['TL_DCA']['tl_zad_sendnews'] = array
(
	//---------- Configuration
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_zad_sendnews_rule'),		
		'switchToEdit'                => true,
		'enableVersioning'            => true,
		'onsubmit_callback' => array
		(
			array('tl_zad_sendnews', 'storeServerCommand')
		)
	),	
	//---------- List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('name'),
			'flag'                    => 1,
			'panelLayout'             => 'filter,search,limit'
		),
		'label' => array
		(
			'fields'                  => array('name','server_name'),
			'format'                  => '%s [%s]'
		),
		'global_operations' => array
		(
			'import' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['import'],
				'href'                => 'key=import',
				'attributes'          => 'onclick="Backend.getScrollOffset()"',
				'button_callback'     => array('tl_zad_sendnews', 'importIcon')
			),
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['edit'],
				'href'                => 'table=tl_zad_sendnews_rule',
				'icon'                => 'edit.gif',
				'attributes'          => 'class="contextmenu"'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif',
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"',
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			),
			'export' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['export'],
				'href'                => 'key=export',
				'icon'                => 'system/modules/zad_sendnews/html/export.gif'
			),
			'check' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['check'],
				'href'                => 'key=check',
				'icon'                => 'system/modules/zad_sendnews/html/check.gif'
			),
    	'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset(); return AjaxRequest.toggleIcon(this, %s);"',
				'button_callback'     => array('tl_zad_sendnews', 'toggleIcon')
			)
		)
	),
	//---------- Palettes
	'palettes' => array
	(
		'__selector__'                => array('enclosure','post_action'),
		'default'                     => '{title_legend},name;{server_legend},server_name,server_port,server_type,server_tls,server_user,server_password,server_mailbox;{news_legend},news_archive,news_author,enclosure;{advanced_legend:hide},time_check,auto_publish,post_action,active;' 
	),
	//---------- Subpalettes
	'subpalettes' => array
	(
	   'enclosure'                  => 'enclosure_dir,enclosure_dirtype,enclosure_images',
	   'post_action_move'           => 'move_mailbox'	   
  ),
	//---------- Fields
	'fields' => array
	(
		'name' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['name'],
			'search'                  => true,
			'exclude'                 => true,			
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'unique'=>true, 'maxlength'=>255, 'tl_class'=>'long')
		),
		'server_name' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_name'],
			'search'                  => true,
			'exclude'                 => true,			
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'server_port' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_port'],
			'exclude'                 => true,			
			'inputType'               => 'text',
			'default'                 => '0',
			'eval'                    => array('mandatory'=>true, 'rgxp'=>'digit', 'tl_class'=>'w50'),
			'save_callback' => array
			(
				array('tl_zad_sendnews', 'checkPort')
			)			
		),
		'server_type' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_type'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('pop3','imap'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_type_options'],
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
		),
		'server_tls' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('disable','validate','novalidate','tls_validate','tls_novalidate','ssl_validate','ssl_novalidate'),
			'default'                 => 'novalidate',			
			'reference'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_tls_options'],
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
		),		
		'server_user' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_user'],
			'exclude'                 => true,			
			'search'                  => true,			
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'server_password' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_password'],
			'exclude'                 => true,			
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'hideInput'=>true, 'tl_class'=>'w50')
		),
		'server_mailbox' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_mailbox'],
			'exclude'                 => true,			
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255)
		),
		'news_archive' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['news_archive'],
			'filter'                  => true,
			'exclude'                 => true,			
			'inputType'               => 'select',
			'foreignKey'              => 'tl_news_archive.title',
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
		),
		'news_author' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['news_author'],
			'exclude'                 => true,			
			'inputType'               => 'select',
			'foreignKey'              => 'tl_user.username',
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
		),
		'enclosure' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure'],
			'exclude'                 => true,			
			'inputType'               => 'checkbox',
			'default'                 => '',
			'eval'                    => array('isBoolean'=>true, 'submitOnChange'=>true, 'tl_class'=>'clr')			
		),
		'enclosure_dir' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dir'],
			'exclude'                 => true,		
			'inputType'               => 'fileTree',
			'eval'                    => array('fieldType'=>'radio', 'files'=>false, 'filesOnly'=>false, 'mandatory'=>true)
		),
		'enclosure_dirtype' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dirtype'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('year','month','day','none'),
			'default'                 => 'year',			
			'reference'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_dirtype_options'],
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
		),
		'enclosure_images' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('attached','inline','first'),
			'default'                 => 'first',			
			'reference'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['enclosure_images_options'],
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
		),
    'time_check' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('I','H','D','W','M'),
			'default'                 => 'H',			
			'reference'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['time_check_options'],
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
		),
		'auto_publish' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('pub0','pub1','pub2','pub3','pub4','pub5','susp'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['auto_publish_options'],
			'default'                 => 'pub0',
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50')
		),				
		'post_action' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('delete','log','move'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['post_action_options'],
			'default'                 => 'delete',
			'eval'                    => array('mandatory'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50')
		),
		'move_mailbox' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['move_mailbox'],
			'exclude'                 => true,			
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		),    				
		'active' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['active'],
			'exclude'                 => true,			
			'inputType'               => 'checkbox',
			'default'                 => false,
			'eval'                    => array('isBoolean'=>true, 'doNotCopy'=>true, 'tl_class'=>'clr')
		),
    'server_command' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['server_command'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('readonly'=>true, 'disabled'=>true)
		),
		'source' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews']['source'],
			'eval'                    => array('fieldType'=>'checkbox', 'files'=>true, 'filesOnly'=>true, 'extensions'=>'zip', 'class'=>'mandatory')
		)
  )
);

 
/**
 * Class tl_zad_sendnews
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 */
class tl_zad_sendnews extends Backend {
 
	/**
	 * Check the port value. 
	 */
	public function checkPort($value, $dc) {
    if (intval($value) > 65535 || intval($value) < 0) {
      throw new Exception($GLOBALS['TL_LANG']['tl_zad_sendnews']['err_port']);   
    }  
		return $value;
	}
  
	/**
	 * Create and store the server command string.
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
	 * Return the "toggle active mode" button
	 */
	public function toggleIcon($row, $href, $label, $title, $icon, $attributes) {	
		if (strlen($this->Input->get('tid'))) {
			$this->toggleActive($this->Input->get('tid'), ($this->Input->get('state') == 1));
			$this->redirect($this->getReferer());
		}
		$href .= '&amp;tid='.$row['id'].'&amp;state='.($row['active'] ? '' : 1);
		if (!$row['active']) {
			$icon = 'invisible.gif';
		}		
		return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ';
	}
 
	/**
	 * Toggle active mode  
	 */
	public function toggleActive($id, $active) {
		// save the new state 
		$this->Database->prepare("UPDATE tl_zad_sendnews SET active=? WHERE id=?")
					         ->execute(($active ? 1 : ''), $id);
	}
  
	/**
	 * Return the "import" button
	 */
	public function importIcon($href, $label, $title, $class, $attributes) {
    $style="background:url('system/modules/zad_sendnews/html/import.gif') no-repeat left center;padding:2px 0 3px 20px;";	
    return ' &#160; :: &#160; <a href="'.$this->addToUrl($href).'" style="'.$style.'" title="'.specialchars($title).'"'.$attributes.'>'.$label.'</a>';    
	}
 
}


?>