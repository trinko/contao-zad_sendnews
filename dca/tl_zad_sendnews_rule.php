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
 * Table tl_zad_sendnews_rule
 */
$GLOBALS['TL_DCA']['tl_zad_sendnews_rule'] = array(
	// Configuration
	'config' => array(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_zad_sendnews',
		'enableVersioning'            => true,
		'switchToEdit'                => true,
    'onsubmit_callback' => array(
			array('tl_zad_sendnews_rule', 'storeTagList')
		),
		'sql' => array(
			'keys' => array(
				'id' => 'primary',
				'pid' => 'index'
			)
		)
	),
	// Listing
	'list' => array(
		'sorting' => array(
			'mode'                        => 4,
			'fields'                      => array('sorting'),
			'headerFields'                => array('name','server_name','news_archive'),
			'panelLayout'                 => 'filter,search,limit',
			'child_record_callback'       => array('tl_zad_sendnews_rule', 'listRules')
		),
		'global_operations' => array(
			'all' => array(
				'label'                     => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                      => 'act=select',
				'class'                     => 'header_edit_all',
				'attributes'                => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array(
			'edit' => array(
				'label'                     => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['edit'],
				'href'                      => 'act=edit',
				'icon'                      => 'edit.gif'
			),
			'copy' => array(
				'label'                     => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['copy'],
				'href'                      => 'act=paste&amp;mode=copy',
				'icon'                      => 'copy.gif'
			),
			'cut' => array(
				'label'                     => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['cut'],
				'href'                      => 'act=paste&amp;mode=cut',
				'icon'                      => 'cut.gif'
			),
			'delete' => array(
				'label'                     => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['delete'],
				'href'                      => 'act=delete',
				'icon'                      => 'delete.gif',
				'attributes'                => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'toggle' => array(
				'label'                     => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['toggle'],
				'icon'                      => 'visible.gif',
				'attributes'                => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
				'button_callback'           => array('tl_zad_sendnews_rule', 'toggleIcon')
			),
			'show' => array(
				'label'                     => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['show'],
				'href'                      => 'act=show',
				'icon'                      => 'show.gif'
			)
		)
	),
	// Palettes
	'palettes' => array(
		'__selector__'                => array('action'),
		'default'                     => '{settings_legend},name,target;{action_legend},action;{advanced_legend},active;'
	),
	// Subpalettes
	'subpalettes' => array(
		'action_none'                 => '',
		'action_regex'                => 're_search,re_replace',
		'action_replace'              => 'txt_replace',
		'action_delete'               => '',
		'action_intro'                => 'maxlen,taglist',
		'action_striptags'            => 'taglist',
		'action_deltags'              => 'taglist',
		'action_rentags'              => 'taglist,tag_replace',
		'action_voidtags'             => 'taglist',
		'action_delparams'            => 'paramlist',
		'action_allow'                => 'extlist',
		'action_pdf'                  => 'extlist'
  ),
	// Fields
	'fields' => array(
		'id' => array(
			'sql'                         => "int(10) unsigned NOT NULL auto_increment"
		),
		'pid' => array(
			'foreignKey'                  => 'tl_zad_sendnews.name',
			'sql'                         => "int(10) unsigned NOT NULL default '0'",
			'relation'                    => array('type'=>'hasOne', 'load'=>'lazy')
		),
    'sorting' => array(
			'sql'                         => "int(10) unsigned NOT NULL default '0'"
		),
    'tstamp' => array(
			'sql'                         => "int(10) unsigned NOT NULL default '0'"
		),
		'name' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['name'],
			'search'                      => true,
			'exclude'                     => true,
			'inputType'                   => 'text',
			'eval'                        => array('mandatory'=>true, 'unique'=>true, 'maxlength'=>255, 'tl_class'=>'long'),
			'sql'                         => "varchar(255) NOT NULL default ''"
		),
		'target' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target'],
			'filter'                      => true,
			'exclude'                     => true,
			'inputType'                   => 'select',
			'options'                     => array('headline','subheadline','teaser','html','text','files'),
			'reference'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target_options'],
			'default'                     => 'headline',
			'eval'                        => array('mandatory'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50'),
			'sql'                         => "varchar(32) NOT NULL default ''"
		),
		'action' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action'],
			'exclude'                     => true,
			'inputType'                   => 'select',
			'options_callback'            => array('tl_zad_sendnews_rule', 'getActionOptions'),
			'reference'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options'],
			'eval'                        => array('mandatory'=>true, 'submitOnChange'=>true, 'helpwizard'=>true, 'tl_class'=>'clr'),
			'sql'                         => "varchar(32) NOT NULL default ''",
			'save_callback' => array(
        array('tl_zad_sendnews_rule', 'checkAction')
			)
		),
		're_search' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['re_search'],
			'exclude'                     => true,
			'inputType'                   => 'text',
			'explanation'                 => 'zad_sendnews_re',
			'eval'                        => array('maxlength'=>255, 'preserveTags'=>true, 'helpwizard'=>true, 'doNotShow'=>true, 'tl_class'=>'long'),
			'sql'                         => "varchar(255) NOT NULL default ''"
		),
		're_replace' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['re_replace'],
			'exclude'                     => true,
			'inputType'                   => 'text',
			'explanation'                 => 'zad_sendnews_re_replace',
			'eval'                        => array('maxlength'=>255, 'preserveTags'=>true, 'helpwizard'=>true, 'doNotShow'=>true, 'tl_class'=>'long'),
			'sql'                         => "varchar(255) NOT NULL default ''"
		),
 		'txt_replace' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['txt_replace'],
			'exclude'                     => true,
			'inputType'                   => 'text',
			'explanation'                 => 'zad_sendnews_params',
			'eval'                        => array('maxlength'=>255, 'preserveTags'=>true, 'helpwizard'=>true, 'doNotShow'=>true, 'tl_class'=>'long'),
			'sql'                         => "varchar(255) NOT NULL default ''"
		),
 		'maxlen' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['maxlen'],
			'exclude'                     => true,
			'inputType'                   => 'text',
			'default'                     => '255',
			'eval'                        => array('rgxp'=>'digit', 'doNotShow'=>true),
			'sql'                         => "smallint(5) unsigned NOT NULL default '0'",
			'save_callback' => array(
				array('tl_zad_sendnews_rule', 'checkLength')
			)
		),
 		'taglist' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['taglist'],
			'exclude'                     => true,
			'inputType'                   => 'text',
			'eval'                        => array('maxlength'=>255, 'doNotShow'=>true, 'tl_class'=>'long'),
			'sql'                         => "varchar(255) NOT NULL default ''"
		),
 		'tag_replace' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['tag_replace'],
			'exclude'                     => true,
			'inputType'                   => 'text',
			'eval'                        => array('maxlength'=>255, 'preserveTags'=>true, 'doNotShow'=>true, 'tl_class'=>'long'),
			'sql'                         => "varchar(255) NOT NULL default ''"
		),
 		'paramlist' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['paramlist'],
			'exclude'                     => true,
			'inputType'                   => 'text',
			'eval'                        => array('maxlength'=>255, 'doNotShow'=>true, 'tl_class'=>'long'),
			'sql'                         => "varchar(255) NOT NULL default ''"
		),
 		'extlist' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['extlist'],
			'exclude'                     => true,
			'inputType'                   => 'text',
			'eval'                        => array('maxlength'=>255, 'doNotShow'=>true, 'tl_class'=>'long'),
			'sql'                         => "varchar(255) NOT NULL default ''"
		),
    'active' => array(
			'label'                       => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['active'],
			'exclude'                     => true,
			'inputType'                   => 'checkbox',
			'default'                     => false,
			'eval'                        => array('doNotCopy'=>true, 'tl_class'=>'long'),
			'sql'                         => "char(1) NOT NULL default ''"
		),
 		'list_exec' => array(
			'exclude'                     => true,
			'inputType'                   => 'text',
			'eval'                        => array('readonly'=>true, 'disabled'=>true, 'preserveTags'=>true, 'doNotShow'=>true),
			'sql'                         => "text NULL"
		),
 		'list_exec_2' => array(
			'exclude'                     => true,
			'inputType'                   => 'text',
			'eval'                        => array('readonly'=>true, 'disabled'=>true, 'preserveTags'=>true, 'doNotShow'=>true),
			'sql'                         => "text NULL"
		)
  )
);


/**
 * Class tl_zad_sendnews_rule
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright Antonello Dessì 2012-2013
 * @author    Antonello Dessì
 * @package   zad_sendnews
 */
class tl_zad_sendnews_rule extends Backend {

	/**
	 * Show item list
	 * @param array
	 * @return string
	 */
	public function listRules($row) {
		$key = $row['active'] ? 'published' : 'unpublished';
		return '<div class="cte_type ' . $key . '"><strong>' . $row['name'] . '</strong><br>' .
      $GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target_options'][$row['target']] . ': ' .
      $GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options'][$row['action']][0] .
      '</div>' . "\n";
	}

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
		$this->Database->prepare("UPDATE tl_zad_sendnews_rule SET active=? WHERE id=?")
					         ->execute(($active ? 1 : ''), $id);
	}

	/**
	 * Get allowed actions for the current target.
	 * @param \DataContainer
	 * @return array
	 */
	public function getActionOptions($dc) {
		switch ($dc->activeRecord->target) {
      case 'headline':
        $list = array('none', 'regex', 'replace', 'delete');
        break;
      case 'subheadline':
        $list = array('none', 'regex', 'replace', 'delete');
        break;
      case 'teaser':
        $list = array('none', 'regex', 'replace', 'delete', 'intro');
        break;
      case 'html':
        $list = array('none', 'regex', 'replace', 'delete', 'striptags', 'deltags', 'rentags', 'voidtags', 'delparams');
        break;
      case 'text':
        $list = array('none', 'regex', 'replace', 'delete');
        break;
      case 'files':
        $list = array('none', 'allow', 'pdf');
        break;
      default:
        $list = array('none');
        break;
    }
    return $list;
	}

	/**
	 * Check allowed actions for the current target.
	 * @param mixed
	 * @param \DataContainer
	 * @return mixed
	 */
	public function checkAction($value, $dc) {
    $list = $this->getActionOptions($dc);
    if (!in_array($value, $list)) {
      return 'none';
    }
	  return $value;
	}

	/**
	 * Check the max lenght value.
   * @param mixed
	 * @param \DataContainer
	 * @return mixed
	 * @throws \Exception
	 */
	public function checkLength($value, $dc) {
    if (intval($value) > 10000 || intval($value) < 50) {
      throw new Exception($GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['err_length']);
    }
		return $value;
	}

	/**
	 * Save the tag list as regolar expression.
	 * @param \DataContainer
	 */
	public function storeTagList($dc) {
    switch ($dc->activeRecord->action) {
      case 'intro':
        // intro
        $pattern = '';
        $pattern2 = '';
        $list = explode(',', $dc->activeRecord->taglist);
        foreach ($list as $tag) {
          $tag = trim($tag);
          if (strlen($tag) > 0) {
            $pattern .= ((strlen($pattern) > 0) ? ',' : '') . '<'.$tag.'>';
          }
        }
        break;
      case 'striptags':
        // strip tags
        $pattern = '';
        $pattern2 = '';
        $list = explode(',', $dc->activeRecord->taglist);
        foreach ($list as $tag) {
          $tag = trim($tag);
          if (strlen($tag) > 0) {
            $pattern .= ((strlen($pattern) > 0) ? '|' : '') . $tag;
          }
        }
        $pattern = '/<\/?(' . $pattern . ')(\s[^>]*)?\/?\>/is';
        break;
      case 'deltags':
        // remove tags with content
        $pattern = '';
        $pattern2 = '';
        $list = explode(',', $dc->activeRecord->taglist);
        foreach ($list as $tag) {
          $tag = trim($tag);
          if (strlen($tag) > 0) {
            $pattern .= ((strlen($pattern) > 0) ? '|' : '') . '(<' . $tag . '(\s[^>]*)?\>(((?!<' . $tag . '(>|\s)).)*)<\/' . $tag . '\s*>)';
          }
        }
        $pattern = '/' . $pattern . '/isU';
        break;
      case 'rentags':
        // rename tags
        $pattern = '';
        $pattern2 = '';
        $list = explode(',', $dc->activeRecord->taglist);
        foreach ($list as $tag) {
          $tag = trim($tag);
          if (strlen($tag) > 0) {
            $pattern .= ((strlen($pattern) > 0) ? '|' : '') . $tag;
            $pattern2 .= ((strlen($pattern2) > 0) ? '|' : '') . $tag;
          }
        }
        $pattern = '/<(' . $pattern . ')(\s[^>]*)?\/?\>/is';
        $pattern2 = '/<\/(' . $pattern2 . ')\s*>/is';
        break;
      case 'voidtags':
        // delete void tags
        $pattern = '';
        $pattern2 = '';
        $list = explode(',', $dc->activeRecord->taglist);
        foreach ($list as $tag) {
          $tag = trim($tag);
          if (strlen($tag) > 0) {
            $pattern .= ((strlen($pattern) > 0) ? '|' : '') . '(<' . $tag . '(\s[^>]*)?\>(\s|&nbsp;)*<\/' . $tag . '\s*>)';
          }
        }
        $pattern = '/' . $pattern . '/is';
        break;
      case 'delparams':
        // delete HTML parameters
        $pattern = '';
        $pattern2 = '';
        $list = explode(',', $dc->activeRecord->paramlist);
        foreach ($list as $param) {
          $param = trim($param);
          if (strlen($param) > 0) {
            $pattern .= ((strlen($pattern) > 0) ? '|' : '') . $param;
          }
        }
        $pattern = '/(<[a-z]+[^>]*)\s(' . $pattern . ')\s*=\s*"[^"]*"([^>]*>)/is';
        break;
      default:
        $pattern = '';
        $pattern2 = '';
        break;
    }
    // update
		$this->Database->prepare('UPDATE tl_zad_sendnews_rule SET list_exec=?,list_exec_2=? WHERE id=?')
					         ->execute($pattern, $pattern2, $dc->id);
	}

}

