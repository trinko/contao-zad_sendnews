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
 * Namespace
 */
namespace zad_sendnews;


/**
 * Class ZadSendnews
 *
 * @copyright  Antonello Dessì 2012-2013
 * @author     Antonello Dessì
 * @package    zad_sendnews
 */
class ZadSendnews extends \Backend {

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = '';


	/**
	 * Export a ZAD Send News manager to XML file.
	 * @param \DataContainer
	 */
	public function exportManager($dc) {
    // get the manager data
    $manager = $this->Database->prepare("SELECT * FROM tl_zad_sendnews WHERE id=?")
                              ->execute($dc->id);
	  if ($manager->numRows < 1) {
		  // error, exit
			return;
		}
		// create a new XML document
		$xml = new \DOMDocument('1.0', 'UTF-8');
		$xml->formatOutput = true;
		// root element
		$tables = $xml->createElement('tables');
		$tables->setAttribute('version', '2.0');
		$tables = $xml->appendChild($tables);
		// add manager table
	  $this->exportTable('tl_zad_sendnews', $xml, $tables, $manager);
		// add rules table
    $rules = $this->Database->prepare("SELECT * FROM tl_zad_sendnews_rule WHERE pid=? ORDER BY sorting")
    							          ->execute($manager->id);
	  $this->exportTable('tl_zad_sendnews_rule', $xml, $tables, $rules);
		// add news_archive table
    $news = $this->Database->prepare("SELECT id,title FROM tl_news_archive WHERE id=?")
    							         ->execute($manager->news_archive);
	  $this->exportTable('tl_news_archive', $xml, $tables, $news);
		// add user table
    $user = $this->Database->prepare("SELECT id,username,name,email FROM tl_user WHERE id=?")
    							         ->execute($manager->news_author);
	  $this->exportTable('tl_user', $xml, $tables, $user);
		// create a zip archive
		$tmp = md5(uniqid(mt_rand(), true));
		$zip = new \ZipWriter('system/tmp/'. $tmp);
		// add XML document
		$zip->addString($xml->saveXML(), 'sendnews.xml');
		// close archive
		$zip->close();
		// romanize the file name
		$name = utf8_romanize($manager->name);
		$name = strtolower(str_replace(' ', '_', $name));
		$name = preg_replace('/[^A-Za-z0-9\._-]/', '', $name);
		$name = basename($name);
		// open the "save as …" dialogue
		$file = new \File('system/tmp/'. $tmp, true);
    // send file
		header('Content-Type: application/octet-stream');
		header('Content-Transfer-Encoding: binary');
		header('Content-Disposition: attachment; filename="' . $name . '.zip"');
		header('Content-Length: ' . $file->filesize);
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Expires: 0');
		$fl = fopen(TL_ROOT . '/system/tmp/'. $tmp, 'rb');
		fpassthru($fl);
		fclose($fl);
		exit;
  }

	/**
	 * Import ZAD Send News managers from XML files.
	 * @param \DataContainer
	 */
	public function importManager($dc) {
		if (\Input::get('key') != 'import') {
      // error
			return '';
		}
    // init
		$this->import('BackendUser', 'User');
		$class = $this->User->uploader;
		if (!class_exists($class)) {
			$class = 'FileUpload';
		}
		$uploader = new $class();
    // import data
		if (\Input::post('FORM_SUBMIT') == 'tl_sendnews_import') {
			$uploaded = $uploader->uploadTo('system/tmp');
			if (empty($uploaded)) {
				\Message::addError($GLOBALS['TL_LANG']['ERR']['emptyUpload']);
				$this->reload();
			}
      // skip invalid entries
      $files = array();
      foreach ($uploaded as $zipfile) {
				// skip folders
				if (is_dir(TL_ROOT . '/' . $zipfile)) {
					\Message::addError(sprintf($GLOBALS['TL_LANG']['ERR']['importFolder'], basename($zipfile)));
					continue;
				}
				// skip anything but .zip files
				$fl = new \File($zipfile, true);
				if ($fl->extension != 'zip') {
					\Message::addError(sprintf($GLOBALS['TL_LANG']['ERR']['filetype'], $fl->extension));
					continue;
				}
        $files[] = $zipfile;
			}
			// check whether there are any files
			if (empty($files)) {
				\Message::addError($GLOBALS['TL_LANG']['ERR']['emptyUpload']);
				$this->reload();
			}
			// import all files
			return $this->importFiles($files);
		}
		// return the form
		return '
<div id="tl_buttons">
<a href="'.ampersand(str_replace('&key=import', '', \Environment::get('request'))).'" class="header_back" title="'.specialchars($GLOBALS['TL_LANG']['MSC']['backBTTitle']).'" accesskey="b">'.$GLOBALS['TL_LANG']['MSC']['backBT'].'</a>
</div>
<h2 class="sub_headline">'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['import'][1].'</h2>
'.\Message::generate().'
<form action="'.ampersand(\Environment::get('request'), true).'" id="tl_sendnews_import" class="tl_form" method="post" enctype="multipart/form-data">
<div class="tl_formbody_edit">
<input type="hidden" name="FORM_SUBMIT" value="tl_sendnews_import">
<input type="hidden" name="REQUEST_TOKEN" value="'.REQUEST_TOKEN.'">
<input type="hidden" name="MAX_FILE_SIZE" value="'.$GLOBALS['TL_CONFIG']['maxFileSize'].'">
<div class="tl_tbox">
  <h3>'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['import_source'][0].'</h3>'.$uploader->generateMarkup().(isset($GLOBALS['TL_LANG']['tl_zad_sendnews']['import_source'][1]) ? '
  <p class="tl_help tl_tip">'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['import_source'][1].'</p>' : '').'
</div>
</div>
<div class="tl_formbody_submit">
<div class="tl_submit_container">
  <input type="submit" name="save" id="save" class="tl_submit" accesskey="s" value="'.specialchars($GLOBALS['TL_LANG']['tl_zad_sendnews']['import'][0]).'">
</div>
</div>
</form>';
  }

	/**
	 * Check emails for a ZAD Send News manager.
	 * @param \DataContainer
	 */
	public function checkEmails($dc) {
    // check emails
	  $this->import('ZadSendnewsManager');
	  $this->ZadSendnewsManager->checkManager($dc->id);
    $title = sprintf($GLOBALS['TL_LANG']['tl_zad_sendnews']['check'][1],$_GET['id']);
    $report = $this->ZadSendnewsManager->getReport();
    $status = $this->ZadSendnewsManager->getStatus();
    if ($status == 0) {
      $message = '<p class="tl_confirm">'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_ok'].'</p>';
    } elseif ($status == 1) {
      $message = '<p class="tl_info">'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_warning'].'</p>';
    } elseif ($status == 2) {
      $message = '<p class="tl_error">'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_error'].'</p>';
    } else {
      $message = '<p class="tl_error">'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['status_fatal'].'</p>';
    }
		return '
<div id="tl_buttons">
<a href="'.ampersand(str_replace('&key=check', '', \Environment::get('request'))).'" class="header_back" title="'.specialchars($GLOBALS['TL_LANG']['MSC']['backBTTitle']).'" accesskey="b">'.$GLOBALS['TL_LANG']['MSC']['backBT'].'</a>
</div>
<h2 class="sub_headline">'.$title.'</h2>
<div class="tl_message">
'.$message.'
</div>
<form action="'.ampersand(str_replace('&key=check', '', \Environment::get('request'))).'" id="tl_sendnews_check" class="tl_form" method="post">
<div class="tl_formbody_edit">
<input type="hidden" name="FORM_SUBMIT" value="tl_sendnews_check">
<input type="hidden" name="REQUEST_TOKEN" value="'.REQUEST_TOKEN.'">
<h2>'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['report'].'</h2>
<div class="tl_tbox" style="border:1px solid #ccc;margin-bottom:2em;padding:0">
<div style="padding:5px">'.$report.'</div>
</div>
</div>
<div class="tl_formbody_submit">
<div class="tl_submit_container">
  <input type="submit" name="continue" id="continue" class="tl_submit" accesskey="c" value="'.specialchars($GLOBALS['TL_LANG']['MSC']['continue']).'">
</div>
</div>
</form>';
  }

	/**
	 * Import ZAD Send News managers from XML files.
	 * @param Array
	 */
	protected function importFiles($files) {
    foreach ($files as $zipfile) {
			$xml = null;
			// open zip file
			$zip = new \ZipReader($zipfile);
			// extract XML file
			if ($zip->next() && $zip->file_name == 'sendnews.xml') {
				// load the XML file
				$xml = new \DOMDocument();
				$xml->preserveWhiteSpace = false;
				$xml->loadXML($zip->unzip());
			}
			// if there is no XML file, skip to next zip file
			if (!$xml instanceof \DOMDocument) {
				\Message::addError(sprintf($GLOBALS['TL_LANG']['tl_zad_sendnews']['err_import_xml'], basename($zipfile)));
				continue;
			}
      // read XML
      $tab = array();
			$version = $xml->getElementsByTagName('tables')->item($i)->getAttribute('version');
      if (!$version || $version != '2.0') {
        // warning: version is different!
        \Message::addInfo(sprintf($GLOBALS['TL_LANG']['tl_zad_sendnews']['wrn_import_version'], basename($zipfile)));
      }
			$tables = $xml->getElementsByTagName('table');
			for ($i=0; $i < $tables->length; $i++) {
  			// loop through tables
        $rows = $tables->item($i)->childNodes;
				$table = $tables->item($i)->getAttribute('name');
				for ($j=0; $j < $rows->length; $j++) {
	   			// loop through rows
					$fields = $rows->item($j)->childNodes;
					for ($k=0; $k < $fields->length; $k++) {
					  // loop through fields
						$value = $fields->item($k)->nodeValue;
						$name = $fields->item($k)->getAttribute('name');
					  $tab[$table][$j][$name] = $value;
          }
        }
      }
      // get current news archive id
      $news = $this->Database->prepare("SELECT id FROM tl_news_archive WHERE title=?")
                             ->limit(1)
    							           ->execute($tab['tl_news_archive'][0]['title']);
      if ($news->numRows < 1) {
        // set first news archive
        $news = $this->Database->prepare("SELECT id FROM tl_news_archive ORDER BY id")
                               ->limit(1)
      							           ->execute();
        if ($news->numRows < 1) {
          // no news archive
          $news->id = 0;
      	}
      }
      // set news archive id
      $tab['tl_zad_sendnews'][0]['news_archive'] = $news->id;
      // get current news author id
      $user = $this->Database->prepare("SELECT id FROM tl_user WHERE username=? OR name=? OR email=?")
                             ->limit(1)
    							           ->execute($tab['tl_user'][0]['username'], $tab['tl_user'][0]['name'], $tab['tl_user'][0]['email']);
      if ($user->numRows < 1) {
        // set first user
        $user = $this->Database->prepare("SELECT id FROM tl_user ORDER BY id")
                               ->limit(1)
      							           ->execute();
        if ($user->numRows < 1) {
          // no news author
          $user->id = 0;
      	}
      }
      // set news author id
      $tab['tl_zad_sendnews'][0]['news_author'] = $user->id;
      // set send news manager name
      $name = $this->Database->prepare("SELECT count(*) AS cnt FROM tl_zad_sendnews WHERE name LIKE ?")
    							           ->execute($tab['tl_zad_sendnews'][0]['name'].'%');
      $tab['tl_zad_sendnews'][0]['name'] .= ($name->cnt > 0) ? (' - '.$name->cnt) : '';
			// lock tables
			$locks = array('tl_zad_sendnews' => 'WRITE', 'tl_zad_sendnews_rule' => 'WRITE');
			$this->Database->lockTables($locks);
			// get current values
			$tab['tl_zad_sendnews'][0]['id'] = $this->Database->getNextId('tl_zad_sendnews');
			$tab['tl_zad_sendnews'][0]['tstamp'] = time();
			$tab['tl_zad_sendnews'][0]['active'] = '';
      // insert imported manager
			$this->Database->prepare("INSERT INTO tl_zad_sendnews %s")
                     ->set($tab['tl_zad_sendnews'][0])
                     ->execute();
      // insert imported rules
      foreach ($tab['tl_zad_sendnews_rule'] as $rule) {
  			// get current values
  			$rule['id'] = $this->Database->getNextId('tl_zad_sendnews_rule');
  			$rule['pid'] = $tab['tl_zad_sendnews'][0]['id'];
  			$rule['tstamp'] = time();
  			$this->Database->prepare("INSERT INTO tl_zad_sendnews_rule %s")
                       ->set($rule)
                       ->execute();
      }
			// unlock tables
			$this->Database->unlockTables();
			// notify the user
			\Message::addConfirmation(sprintf($GLOBALS['TL_LANG']['tl_zad_sendnews']['ok_imported'], basename($zipfile)));
    }
		// redirect
		\System::setCookie('BE_PAGE_OFFSET', 0, 0);
		$this->redirect(str_replace('&key=import', '', \Environment::get('request')));
  }

	/**
	 * Export a table to XML.
	 * @param String
	 * @param \Object
	 * @param \Object
	 * @param \Object
	 */
	protected function exportTable($table_name, &$xml, &$tables, &$data) {
		// add table
		$table = $xml->createElement('table');
		$table->setAttribute('name', $table_name);
		$table = $tables->appendChild($table);
		// add rows
		while ($data->next()) {
			$this->exportRow($xml, $table, $data);
		}
	}

	/**
	 * Export a table row to XML.
	 * @param \Object
	 * @param \Object
	 * @param \Object
	 */
	protected function exportRow(&$xml, &$table, &$data) {
    // add row
		$row = $xml->createElement('row');
		$row = $table->appendChild($row);
    // add data
		foreach ($data->row() as $k=>$v) {
		  // add field
			$field = $xml->createElement('field');
			$field->setAttribute('name', $k);
			$field = $row->appendChild($field);
      // add value
			if ($v === null) {
				$v = 'NULL';
			}
			$value = $xml->createTextNode($v);
			$value = $field->appendChild($value);
		}
	}

}

