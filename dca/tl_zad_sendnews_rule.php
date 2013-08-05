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
 * Table tl_zad_sendnews_rule
 */
$GLOBALS['TL_DCA']['tl_zad_sendnews_rule'] = array
(
	//---------- Configuration
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_zad_sendnews',		
		'enableVersioning'            => true,
		'onsubmit_callback' => array
		(
			array('tl_zad_sendnews_rule', 'storeTagList')
		)		
	),	
	//---------- List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('sorting'),
			'headerFields'            => array('name', 'server_name','news_archive'),
			'panelLayout'             => 'filter,search,limit',
			'child_record_callback'   => array('tl_zad_sendnews_rule', 'listRules')
		),
		'global_operations' => array
		(
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
				'label'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['copy'],
				'href'                => 'act=paste&amp;mode=copy',
				'icon'                => 'copy.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			),
    	'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset(); return AjaxRequest.toggleIcon(this, %s);"',
				'button_callback'     => array('tl_zad_sendnews_rule', 'toggleIcon')
			)
		)
	),
	//---------- Palettes
	'palettes' => array
	(
		'__selector__'                => array('action'),
		'default'                     => '{settings_legend},name,target;{action_legend},action;{advanced_legend},active;' 
	),
	//---------- Subpalettes
	'subpalettes' => array
	(
		'action_none'                => '', 	  
		'action_regex'               => 're_search,re_replace', 	  
		'action_replace'             => 'txt_replace', 	  
		'action_delete'              => '', 	  
		'action_intro'               => 'maxlen,taglist', 	  
		'action_striptags'           => 'taglist', 	  
		'action_deltags'             => 'taglist', 	  
		'action_rentags'             => 'taglist,tag_replace', 	  
		'action_voidtags'            => 'taglist', 	  
		'action_delparams'           => 'paramlist', 	  
		'action_allow'               => 'extlist', 	  
		'action_pdf'                 => 'extlist' 	  
  ),
	//---------- Fields
	'fields' => array
	(
		'name' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['name'],
			'search'                  => true,
			'exclude'                 => true,			
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'unique'=>true, 'maxlength'=>255, 'tl_class'=>'long')
		),
		'target' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target'],
			'filter'                  => true,
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('headline','subheadline','teaser','html','text','files'),       
			'reference'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target_options'],
			'default'                 => 'headline',
			'eval'                    => array('mandatory'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50')
		),
		'action' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options_callback'        => array('tl_zad_sendnews_rule', 'getActionOptions'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options'],
			'eval'                    => array('mandatory'=>true, 'submitOnChange'=>true, 'helpwizard'=>true, 'tl_class'=>'clr'),
			'save_callback' => array
			(
				array('tl_zad_sendnews_rule', 'checkAction')
			)
		),
		're_search' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['re_search'],
			'exclude'                 => true,			
			'inputType'               => 'text',
			'explanation'             => 'zad_sendnews_re',            
			'eval'                    => array('maxlength'=>255, 'preserveTags'=>true, 'helpwizard'=>true, 'doNotShow'=>true, 'tl_class'=>'long')
		),
		're_replace' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['re_replace'],
			'exclude'                 => true,			
			'inputType'               => 'text',
			'explanation'             => 'zad_sendnews_re_replace',            
			'eval'                    => array('maxlength'=>255, 'preserveTags'=>true, 'helpwizard'=>true, 'doNotShow'=>true, 'tl_class'=>'long')
		),
 		'txt_replace' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['txt_replace'],
			'exclude'                 => true,			
			'inputType'               => 'text',
			'explanation'             => 'zad_sendnews_params',            
			'eval'                    => array('maxlength'=>255, 'preserveTags'=>true, 'helpwizard'=>true, 'doNotShow'=>true, 'tl_class'=>'long')
		),    				
 		'maxlen' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['maxlen'],
			'exclude'                 => true,			
			'inputType'               => 'text',
			'default'                 => '255',
			'eval'                    => array('rgxp'=>'digit', 'doNotShow'=>true),
			'save_callback' => array
			(
				array('tl_zad_sendnews_rule', 'checkLength')
			)						
		),
 		'taglist' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['taglist'],
			'exclude'                 => true,			
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'doNotShow'=>true, 'tl_class'=>'long')
		),
 		'tag_replace' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['tag_replace'],
			'exclude'                 => true,			
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'preserveTags'=>true, 'doNotShow'=>true, 'tl_class'=>'long')
		),    				
 		'paramlist' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['paramlist'],
			'exclude'                 => true,			
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'doNotShow'=>true, 'tl_class'=>'long')
		),
 		'extlist' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['extlist'],
			'exclude'                 => true,			
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'doNotShow'=>true, 'tl_class'=>'long')
		),
    'active' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['active'],
			'exclude'                 => true,			
			'inputType'               => 'checkbox',
			'default'                 => false,
			'eval'                    => array('isBoolean'=>true, 'doNotCopy'=>true, 'tl_class'=>'long')
		),		
 		'list_exec' => array
		(
			'exclude'                 => true,			
			'inputType'               => 'text',
			'eval'                    => array('readonly'=>true, 'disabled'=>true, 'preserveTags'=>true, 'doNotShow'=>true)
		),
 		'list_exec_2' => array
		(
			'exclude'                 => true,			
			'inputType'               => 'text',
			'eval'                    => array('readonly'=>true, 'disabled'=>true, 'preserveTags'=>true, 'doNotShow'=>true)
		)
  )
);

 
/**
 * Class tl_zad_sendnews_rule
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 */
class tl_zad_sendnews_rule extends Backend { 

	/**
	 * Show item list
	 */
	public function listRules($arrRow) {
		$key = $arrRow['active'] ? 'published' : 'unpublished';		
		return '<div class="cte_type ' . $key . '"><strong>' . $arrRow['name'] . '</strong><br>' . 
      $GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['target_options'][$arrRow['target']] . ': ' . 
      $GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['action_options'][$arrRow['action']][0] .
      '</div>' . "\n";
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
		$this->Database->prepare("UPDATE tl_zad_sendnews_rule SET active=? WHERE id=?")
					         ->execute(($active ? 1 : ''), $id);
	}
  
	/**
	 * Get allowed actions for the current target. 
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
	 */
	public function checkLength($value, $dc) {
    if (intval($value) > 10000 || intval($value) < 50) {
      throw new Exception($GLOBALS['TL_LANG']['tl_zad_sendnews_rule']['err_length']);   
    }  
		return $value;
	}
  
	/**
	 * Save the tag list as regolar expression. 
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


?>