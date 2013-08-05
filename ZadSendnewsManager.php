<?php

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
 * Class ZadSendnewsManager
 *
 * Provide methods to post news via email. This class is used by the cron job. 
 */
class ZadSendnewsManager extends Backend {

	/**
	 * Current sendnews manager.
	 */
  protected $manager;
 
	/**
	 * Attachment folder for the current manager.
	 */
  protected $folder;
 
	/**
	 * Filtering rules for the current manager.
	 */
  protected $rules;

	/**
	 * Mailbox for importing news.
	 */
  protected $mailbox;
 
	/**
	 * Header of current email.
	 */
  protected $header;
 
	/**
	 * Forwarded header of current email.
	 */
  protected $forwarded;

	/**
	 * Content in plain text format of the current email.
	 */
  protected $text;
 
	/**
	 * Content in HTML format of the current email.
	 */
  protected $html;
 
	/**
	 * File attachments list of the current email
	 */
  protected $attach;
 
	/**
	 * Image attachments list of the current email
	 */
  protected $images;
 
	/**
	 * News field list of the current email.
	 */
  protected $news;
 
	/**
	 * Status of the manager: 0=OK, 1=WARNING, 2=ERROR, 3=FATAL ERROR. 
	 */
  protected $status;
 
	/**
	 * Log every operation executed.
	 */
  protected $report;

	/**
	 * Initialize the object.
	 */
	public function __construct() {  	
		parent::__construct();
		$this->import('News');
		$this->loadLanguageFile('default');
		$this->manager = null;
		$this->folder = null;
		$this->rules = null;
		$this->mailbox = null;
		$this->header = null;
		$this->forwarded = null;
		$this->text = null;
		$this->html = null;
		$this->attach = array();
		$this->images = array();
		$this->news = array();
    $this->status = 0;		
    $this->report = '';		
	}

	/**
	 * Return status of the manager: 0=OK, 1=WARNING, 2=ERROR, 3=FATAL ERROR. 
	 */
	public function getStatus() {
	  return $this->status;
  }
 
	/**
	 * Return report.
	 */
	public function getReport() {
	  return $this->report;
  }
 
	/**
	 * Function used by the hourly cron job.
	 */
	public function cronJobHourly() {
	  $this->cronJob('H');
  }
 
	/**
	 * Function used by the dayly cron job.
	 */
	public function cronJobDaily() {
	  $this->cronJob('D');
  }
 
	/**
	 * Function used by the weekly cron job.
	 */
	public function cronJobWeekly() {
	  $this->cronJob('W');
  }
 
	/**
	 * Function used by the monthly cron job.
	 */
	public function cronJobMonthly() {
	  $this->cronJob('M');
  }
	
	/**
	 * Main function used by the cron job.
	 */
	public function cronJob($type) {
    // check IMAP library
		if (!function_exists('imap_open')) {
		  // fatal error
			$this->log('The IMAP library is required for using this module', 'ZadSendnewsManager cronJob()', TL_ERROR);
			$this->report .= $GLOBALS['TL_LANG']['tl_zad_sendnews']['err_imap'].'<br />';
			$this->signalFatal();			
			return;
		} 	
    // read managers with the required time check
    $this->manager = $this->Database->prepare("SELECT * FROM tl_zad_sendnews WHERE active=? AND time_check=?")
                                    ->execute('1', $type);
    if ($this->manager->numRows) {
      $this->check($type); 
  		$this->log($this->report, 'ZadSendnewsManager cronJob()', ZAD_REPORT_MULTILINE);
    }                                        
  } 
 
	/**
	 * Main function used by the cron job.
	 */
	public function checkManager($id) {
    // check IMAP library
		if (!function_exists('imap_open')) {
		  // fatal error
			$this->log('The IMAP library is required for using this module', 'ZadSendnewsManager checkManager()', TL_ERROR);
			$this->report .= $GLOBALS['TL_LANG']['tl_zad_sendnews']['err_imap'].'<br />';
			$this->signalFatal();			
			return;
		} 	
    // read manager
    $this->manager = $this->Database->prepare("SELECT * FROM tl_zad_sendnews WHERE id=?")
                                    ->execute($id);    
    $this->check('I');
  } 

	/**
	 * Used by 'addLogEntry' hook to avoid HTML tags conversion to entities 
	 */
	public function addLogEntryHook($text, $function, $action) {
    if ($action == ZAD_REPORT_MULTILINE) {
      // insert original text
      $this->Database->prepare("UPDATE tl_log SET text=?,action=? WHERE action=?")
                     ->execute($text, ZAD_REPORT, ZAD_REPORT_MULTILINE);
    }
	}

	/**
	 * Signal warning status. 
	 */
	private function signalWarning() {
    if ($this->status < 1) {  
      $this->status = 1;
    }    	 
	}
	
	/**
	 * Signal error status. 
	 */
	private function signalError() {
    if ($this->status < 2) {  
      $this->status = 2;
    }    	 
	}

	/**
	 * Signal fatal error status. 
	 */
	private function signalFatal() {
    if ($this->status < 3) {  
      $this->status = 3;
    }    	 
	}

	/**
	 * Check emails.
	 */
	private function check($type) {
    while ($this->manager->next()) {
  		$this->log('Polling sendnews manager \''.$this->manager->name.'\'', 'ZadSendnewsManager check()', TL_CRON);
  		$this->report .= sprintf('<br />'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_polling'].'<br />', 
        $this->manager->name, $GLOBALS['TL_LANG']['tl_zad_sendnews']['info_type_'.$type]); 
      // set attachment folder
      $this->folder = $this->manager->enclosure_dir;
      switch ($this->manager->enclosure_dirtype) {
        case 'year':
          $this->folder .= '/' . date('Y', time());
          break;
        case 'month':
          $this->folder .= '/' . date('Y-m', time());
          break;
        case 'day':
          $this->folder .= '/' . date('Y-m-d', time());
          break;          
      }
      if (!file_exists($this->folder)) {
        // create directory
        mkdir($this->folder);
      }      
      // read filtering rules
      $rules = $this->Database->prepare("SELECT * FROM tl_zad_sendnews_rule WHERE pid=? AND active=? ORDER BY sorting")
                              ->execute($this->manager->id, '1');    
      $this->rules = $rules->fetchAllAssoc();
      // open mailbox
      $this->mailbox = imap_open($this->manager->server_command, $this->manager->server_user, $this->manager->server_password); 
      if (!$this->mailbox) {
        // error, go to next
        $this->log('Error while opening mailbox ['.$this->manager->server_command.']: '.imap_last_error(), 'ZadSendnewsManager check()', TL_ERROR);
			  $this->report .= sprintf($GLOBALS['TL_LANG']['tl_zad_sendnews']['err_open'].'<br />', $this->manager->server_command, imap_last_error());
			  $this->signalFatal();			
        return;
      }
      // scan mailbox for importing news
      $this->scanMailbox();
      // close mailbox and expunge deleted messages 
      imap_close($this->mailbox, CL_EXPUNGE);
      // update feeds
      if ($this->manager->auto_publish == 'pub0') {
        // generate feed for this news archive 
        $this->News->generateFeed($this->manager->news_archive);        
      }
    }
  }
  
	/**
	 * Scan mailbox to import news.
	 */
	private function scanMailbox() {
		// check available emails
		$count = imap_num_msg($this->mailbox);
		$this->report .= sprintf($GLOBALS['TL_LANG']['tl_zad_sendnews']['info_msgs'].'<br />', $count);    
		for ($msg = 1; $msg <= $count; $msg++) {
      // init 
  		$this->header = null;
		  $this->forwarded = null;
  		$this->text = null;
  		$this->html = null;
  		$this->attach = array();
  		$this->images = array();
      // read header
      $this->readHeader($msg);      
	    $this->report .= sprintf($GLOBALS['TL_LANG']['tl_zad_sendnews']['info_nummsg'].'<br />', $msg, $this->header->subject);
			if ($this->header->Deleted == 'D') {
			  // skip deleted emails
			  $this->report .= '&nbsp;&nbsp;&nbsp;&nbsp;'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_del'].'<br />';
        continue;
      }            
      // read content
      $this->readContent($msg);
      // import news
      $this->importNews();      
      // do post action
      if ($this->manager->post_action == 'move') {
        // move email
        $res = imap_mail_move($this->mailbox, $msg, $this->manager->move_mailbox);
        if (!$res) {
          // error, do nothing
          $this->log('Can\'t move email '.$msg.' to '.$this->manager->move_mailbox.' for the sendnews manager \''.$this->manager->name.'\'', 'ZadSendnewsManager scanMailbox()', TL_ERROR);
			    $this->report .= sprintf($GLOBALS['TL_LANG']['tl_zad_sendnews']['warn_move'].'<br />', $msg, $this->manager->move_mailbox);
    			$this->signalWarning();			
        }
      } elseif ($this->manager->post_action == 'log') {
        // log and delete email
        $fl = fopen(TL_ROOT.'/system/logs/zad_sendnews_'.$this->manager->id.'.log', 'ab');
        if (!$fl) {
          // error, do nothing
          $this->log('Can\'t write log file for the sendnews manager \''.$this->manager->name.'\'', 'ZadSendnewsManager scanMailbox()', TL_ERROR);
          $this->report .= sprintf($GLOBALS['TL_LANG']['tl_zad_sendnews']['warn_open'].'<br />', $msg);           
    			$this->signalWarning();			
        } else {
          fwrite($fl, "\n\n###---[[[EMAIL START]]]---###\n");
          $res = imap_savebody($this->mailbox, $fl, $msg);
          if (!$res) {
            // error, do nothing
            $this->log('Can\'t log email '.$msg.' for the sendnews manager \''.$this->manager->name.'\'', 'ZadSendnewsManager scanMailbox()', TL_ERROR);
            $this->report .= sprintf($GLOBALS['TL_LANG']['tl_zad_sendnews']['warn_write'].'<br />', $msg);          
    			  $this->signalWarning();			
          }        
          fclose($fl);
        }
        imap_delete($this->mailbox, $msg);
      } else {
        // delete email
        imap_delete($this->mailbox, $msg);
      }
    }
  }		
 
	/**
	 * Read header of an email.
	 */
	private function readHeader($msg) {
    $this->header = imap_headerinfo($this->mailbox, $msg);
    if (!is_object($this->header)) {
      // error, exit
      $this->log('Error while reading header of the email '.$msg.' for the sendnews manager \''.$this->manager->name.'\'', 'ZadSendnewsManager readHeader()', TL_ERROR);
		  $this->report .= sprintf($GLOBALS['TL_LANG']['tl_zad_sendnews']['err_head'].'<br />', $msg);
			$this->signalError();			
      return;
    }
    // convert to UTF-8
    $this->convertToUtf8($this->header);
	} 
 
	/**
	 * Convert object/array/string to UTF-8.
	 */
	private function convertToUtf8(&$value) {
    if (is_string($value)) {
      // convert string
	    $value = iconv_mime_decode($value, 0, 'UTF-8');
    } elseif (is_array($value)) {
      // convert array
      foreach ($value as $key=>$val) {
        $this->convertToUtf8($value[$key]);      	
      }
    } elseif (is_object($value)) {
      // convert object
  		$array = get_object_vars($value);
  		foreach ($array as $key => $val) {
        $this->convertToUtf8($value->$key);      	
      }
    }
	} 
 
	/**
	 * Read content of an email. 
	 */
	private function readContent($msg) {
    // get content structure
		$struct = imap_fetchstructure($this->mailbox, $msg);
		if (!is_object($struct)) {
      // error, exit
      $this->log('Error while fetching structure of the email '.$msg.' for the sendnews manager \''.$this->manager->name.'\'', 'ZadSendnewsManager readContent()', TL_ERROR);
		  $this->report .= sprintf($GLOBALS['TL_LANG']['tl_zad_sendnews']['err_fetch'].'<br />', $msg);
			$this->signalError();			
      return;
    }
    // read partitions
    if (!$struct->parts) {
      // no multipart
      $data = imap_body($this->mailbox, $msg);
      $this->readData($data, $struct);      
    } else {  
      // multipart: iterate through parts
      $this->readPartition($msg, $struct->parts);
    }        
  }
 
	/**
	 * Read partition data of an email. 
	 */
	private function readData(&$data, &$struct) {
    // any part may be encoded    
		switch($struct->encoding) {
			case 0: // 7BIT       
			case 1: // 8BIT
			case 2: // BINARY
        break;
      case 3: // BASE64 
        $data = imap_base64($data);
        break;    
			case 4: // QUOTED PRINTABLE 
        $data = imap_qprint($data);    
        break;    
			default:
        // error, exit
        $this->log('Error: data encoding '.$struct->encoding.' not implemented', 'ZadSendnewsManager readData()', TL_ERROR);
        $this->report .= sprintf($GLOBALS['TL_LANG']['tl_zad_sendnews']['err_encode'].'<br />', $struct->encoding);
			  $this->signalError();			
        return;
		}
    // get all parameters
    $params = array();
    if ($struct->parameters) {
      foreach ($struct->parameters as $p) {
        $params[strtolower($p->attribute)] = iconv_mime_decode($p->value, 0, 'UTF-8');
      }
    }
    if ($struct->dparameters) {
      foreach ($struct->dparameters as $p) {
        $params[strtolower($p->attribute)] = iconv_mime_decode($p->value, 0, 'UTF-8');
      }
    }    
    // any part with a filename is an attachment (email part excluded)
    if (($params['filename'] || $params['name']) && $struct->type != 2) {
        // add new file attachment
        $filename = ($params['filename']) ? $params['filename'] : $params['name'];
        $cid = isset($struct->id) ? str_replace(array('<','>'), '', $struct->id) : $filename;
        $this->saveAttachment($struct->type, $cid, $filename, $data);
    } elseif ($struct->type == 0) {   // TEXT
      $charset = strtoupper($params['charset']);
      if (strtolower($struct->subtype) == 'plain') {
        // plain text
        if (strlen($this->text)) {
          // inline text attachment: add a separator
          $this->text .= "\n\n========================================\n\n";
        }
        // add plain text data
        $this->text .= ($charset != 'UTF-8') ? utf8_encode($data) : $data;
        $this->report .= '&nbsp;&nbsp;&nbsp;&nbsp;'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_text'].'<br />';         
      } elseif (strtolower($struct->subtype) == 'html') {
        // html text
        if (strlen($this->html)) {
          // inline html attachment: add a separator
          $this->html .= "<br /><br /><hr /><br /><br />";
        }      
        // add html text data
        $this->html .= $this->extractBody(($charset != 'UTF-8') ? utf8_encode($data) : $data);         
        $this->report .= '&nbsp;&nbsp;&nbsp;&nbsp;'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_html'].'<br />';         
      } else {
        // error, exit
        $this->log('Error: type TEXT/'.$struct->subtype.' not implemented', 'ZadSendnewsManager readData()', TL_ERROR);
        $this->report .= sprintf($GLOBALS['TL_LANG']['tl_zad_sendnews']['err_type'].'<br />', $struct->subtype);
			  $this->signalError();			
        return;
      }
    } elseif ($struct->type > 2) {
      // inline attachment
      $type_name = array('text','multipart','message','application','audio','image','video','other');
      $filename = strtolower($type_name[$struct->type].'.'.$struct->subtype);      
      $cid = isset($struct->id) ? str_replace(array('<','>'), '', $struct->id) : '--NO-CID--';
      $this->saveAttachment($struct->type, $cid, $filename, $data);
    }
  }
 
	/**
	 * Save file attachment. 
	 */
  private function saveAttachment($type, $cid, $filename, &$data) {
    // check size
    if (strlen($data) > $GLOBALS['TL_CONFIG']['maxFileSize']) {
      // file excluded
      $this->report .= sprintf('&nbsp;&nbsp;&nbsp;&nbsp;'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_maxsize'].'<br />', $filename);
      return;    
    }
    // check type
    $pathinfo = pathinfo($filename);		
    $allowed = trimsplit(',', strtolower($GLOBALS['TL_CONFIG']['uploadTypes']));
    if (!in_array(strtolower($pathinfo['extension']), $allowed)) {
      // file excluded
      $this->report .= sprintf('&nbsp;&nbsp;&nbsp;&nbsp;'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_notype'].'<br />', $filename);
      return;        
    }    
    // create unique filename
    $name = standardize($pathinfo['filename']) . '_' . str_replace('.', '-', microtime(true));
    $filename = $this->folder . '/' . $name;
    // save attachment
    if ($type == 5) {
      // image 
      $this->images[] = array(
        'filename' => $filename,
        'ext' => $pathinfo['extension'],  
        'data' => $data,
        'cid' => $cid);
    } else {
      // any other file 
      $this->attach[] = array(
        'filename' => $filename,
        'ext' => $pathinfo['extension'],  
        'data' => $data);
    }
    $this->report .= sprintf('&nbsp;&nbsp;&nbsp;&nbsp;'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_attach'].'<br />', $filename.'.'.$pathinfo['extension']);
  }

	/**
	 * Read partition of a multipart email. 
	 */
  private function readPartition($msg, &$parts, $prefix='', $index=1, $fullPrefix=true) {
    // iterate through parts
		foreach($parts as $part) {			
			$partno = $prefix . $index;			
      // read data
      $data = imap_fetchbody($this->mailbox, $msg, $partno);
      $this->readData($data, $part);
      // recurse into inner parts      
			if ($part->type == 2) {
			  // email forwarded
			  $this->forwarded = $data;
				$this->readPartition($msg, $part->parts, $partno.'.', 0, false);                
			} elseif (isset($part->parts)) {
			  // iterate through inner parts 
				if($fullPrefix) {
				  // a new level added in prefix 
					$this->readPartition($msg, $part->parts, $partno.'.');
				} else {
				  // same level in prefix 
					$this->readPartition($msg, $part->parts, $prefix);
				}
			}
			$index++;			
		}		
	}

	/**
	 * Return html body part. 
	 */
	private function extractBody($html) {
	  // extract body part
		if (preg_match('#<body(\s[^>]*)?\>(.*)</body\s*>#is', $html, $matches)) {
			return $matches[2];
    }
		return $html;	
  }
  
	/**
	 * Import news from email. 
	 */
	private function importNews() {
	  // init news fields
    $this->news = array();
    $this->news['headline'] = $this->header->subject;        
    $this->news['subheadline'] = '';        
    $this->news['html'] = $this->html;        
    $this->news['text'] = $this->text;  
    $this->news['teaser'] = '';
    $this->news['files'] = &$this->attach;
    $this->news['images'] = &$this->images;
    $this->news['email_subject'] = $this->header->subject; 	  
    $this->news['email_sender'] = $this->header->fromaddress;    	  
    // filter news fields using custom rules
    $this->filterByRules();
    // set array to import news fields
    $import = array();
    // file/image attachments
    if ($this->manager->enclosure) {
      // manage images
      $this->imageManagement($import);
      // attach files
      if (count($this->news['files'])) {
        $list = $this->fileAttachments();      
        // addEnclosure: checkbox, boolean  
        $import['addEnclosure'] = '1';
        // enclosure: file list
        $import['enclosure'] = serialize($list);
      }    
    }
    // pid: news archive id, mandatory
    $import['pid'] = $this->manager->news_archive;
    // tstamp: timestamp, mandatory
    $import['tstamp'] = time();                             
    // author: tl_user.id, mandatory, 
    $import['author'] = $this->manager->news_author;     	  
	  // date: date, mandatory  
    $import['date'] = $import['tstamp']; 
	  // time: time, mandatory  
    $import['time'] = $import['tstamp'];     
	  // headline: text, mandatory, maxlength=255
    $import['headline'] = $this->validateText($this->news['headline'], $GLOBALS['TL_LANG']['tl_zad_sendnews']['title_void'], 255);        
	  // subheadline: text, maxlength=255
    $import['subheadline'] = $this->validateText($this->news['subheadline'], '', 255);
	  // text: textarea, HTML, mandatory
	  $text = trim($this->news['html']);
	  if (!strlen($text)) {
	    // use simple text
	    $text = trim(strip_tags($this->news['text']));
      if (strlen($text) > 0) {
        $text = '<pre>' . $text . '</pre>';  
      }      	    
    }	  	 	  	      
    $msg = (isset($import['addEnclosure']) && $import['addEnclosure']) ? 
      $GLOBALS['TL_LANG']['tl_zad_sendnews']['text_void_attach'] : 
      $GLOBALS['TL_LANG']['tl_zad_sendnews']['text_void'];            
    $import['text'] = $this->validateHtml($text, $msg);    
    // teaser: textarea, HTML 
    $import['teaser'] = $this->validateHtml($this->news['teaser'], '');
    // automatic publishing
    switch ($this->manager->auto_publish) {
      case 'pub0':
        // publish now
        $import['published'] = '1';
        break;        
      case 'pub1':
        // publish 1 day after 
        $import['published'] = '1';        
        $import['start'] = $this->dateAdd(1);        
        break;
      case 'pub2':
        // publish 2 days after 
        $import['published'] = '1';        
        $import['start'] = $this->dateAdd(2);        
        break;
      case 'pub3':
        // publish 3 days after 
        $import['published'] = '1';        
        $import['start'] = $this->dateAdd(3);        
        break;
      case 'pub4':
        // publish 4 days after 
        $import['published'] = '1';        
        $import['start'] = $this->dateAdd(4);        
        break;
      case 'pub5':
        // publish 5 days after 
        $import['published'] = '1';        
        $import['start'] = $this->dateAdd(5);        
        break;
      default:
        // news is unpublished
        break;
    }
    // source: default  
    $import['source'] = 'default';
    // add news    
    $news_id = $this->Database->prepare("INSERT INTO tl_news %s")->set($import)->execute()->insertId;
	  // alias: text, alnum, unique, spaceToUnderscore, maxlength=128, generateAlias()
    $alias = $this->setAlias($import['headline'], $news_id); 
    // update alias news    
    $this->Database->prepare("UPDATE tl_news %s WHERE id=?")->set(array('alias'=>$alias))->execute($news_id);
    $this->report .= sprintf('&nbsp;&nbsp;&nbsp;&nbsp;'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_insert'].'<br />', $news_id);
  }

	/**
	 * Validate a text field. 
	 */
	private function validateText(&$value, $mandatory, $maxlen) {
	  // standard validation for text fields
    $value = strip_tags($value);
    $value = trim($value);
    $len = strlen($value); 
    if ($len > $maxlen) {
      // truncate string to max length
      $value = substr($value, 0, strrpos($value, ' ', $maxlen - $len - 4)) . ' ...';      
    } elseif ($value == '' && $mandatory != '') {
      // set default value
      $value = $mandatory;
    }
    // return validated text
    return $value;
  }

	/**
	 * Validate a textarea field, in HTML format. 
	 */
	private function validateHtml(&$value, $mandatory) {
	  // standard validation for textarea fields
    $value = strip_tags($value, $GLOBALS['TL_CONFIG']['allowedTags']);    
    $value = trim($value);
    if ($value == '' && $mandatory != '') {
      // set default value
      $value = $mandatory;
    }
    // return validated text
    return $value;
  }
  
	/**
	 * Add days to current date. 
	 */
	private function dateAdd($value) {
    $now = getdate();
    $date = mktime(0, 0, 0, $now['mon'], $now['mday'] + $value, $now['year']);
    return $date; 
  }    	

	/**
	 * Set and return the news alias. 
	 */
	private function setAlias($value, $id) {
		$value = standardize($value);
    $val_id = '-' . $id;
	  // check max size
    if (strlen($value) + strlen($val_id) > 128) {
      // truncate 
      $value = substr($value, 0, 128 - strlen($val_id));      
    }
    // check if alias already exists 
		$alias = $this->Database->prepare("SELECT id FROM tl_news WHERE alias=?")
								            ->execute($value);
		if ($alias->numRows) {
		  // create a unique alias
			$value .= $val_id;
		}
    // return value
    return $value; 
  }    	
    	
	/**
	 * Save the attached file. 
	 */
	private function saveFile(&$attach) {
    $filename = $attach['filename'] . '.' . $attach['ext'];
    $fl = new File($filename);
	  $fl->write($attach['data']);         
	  $fl->close(); 
	  $fl->chmod(0644);
    return $filename; 	
  }
  
	/**
	 * Manage images.  
	 */
	private function imageManagement(&$import) {
    $first = true;
    foreach ($this->news['images'] as $img) {
      switch ($this->manager->enclosure_images) {
        case 'first':
          if ($first) {
            // save as news icon
            $filename = $this->saveFile($img);
            $import['addImage'] = '1';
            $import['singleSRC'] = $filename;
            $import['floating'] = 'left';
          } else {
            // save as file attachment
            $this->news['files'][] = $img;
          }          
          break;
        case 'inline':
          // inline image
          $search = array(
            '#<img(\s[^>]*)?\ssrc\s*=\s*"cid:'.$img['cid'].'"#is',
            '#<img(\s[^>]*)?\ssrc\s*=\s*"'.$img['cid'].'"#is');
          $replace = '<img$1 src="'.$img['filename'].'.'.$img['ext'].'"';
          $count = 0;
          $this->news['html'] = preg_replace($search, $replace, $this->news['html'], -1, $count);
          if ($count) {
            // FOUND: save as inline image 
            $filename = $this->saveFile($img);       
            $this->report .= sprintf('&nbsp;&nbsp;&nbsp;&nbsp;'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_image'].'<br />', $filename);            
          } else {
            // NOT FOUND: save as file attachment
            $this->news['files'][] = $img;
          }
          break;        
        default:
          // save as file attachment
          $this->news['files'][] = $img;
          break;          
      }
      $first = false;      
    }
	}

	/**
	 * Attach files to news. 
	 */
	private function fileAttachments() {
    $list = array();
    foreach ($this->news['files'] as $att) {
      // write file
      $filename = $this->saveFile($att);
		  // convert to PDF
		  if ($att['pdf']) {			    
		    $filename_pdf = $att['filename'] . '.pdf';			    
        $cmd = 'python ' . dirname(__FILE__).'/DocumentConverter.py "' . $filename . '" "' . $filename_pdf . '"';
        $res = exec($cmd);
        if (strlen($res) == 0 && file_exists($filename_pdf)) {
          // PDF file created, remove original one
          unlink($filename);           
          $filename = $filename_pdf;
          $this->report .= sprintf('&nbsp;&nbsp;&nbsp;&nbsp;'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_2pdf'].'<br />', $filename, $filename_pdf);            
        } else {
          // error
          $this->log('Can\'t convert to PDF the file '.$filename.' for the sendnews manager \''.$this->manager->name.'\'', 'ZadSendnewsManager importNews()', TL_ERROR);
		      $this->report .= sprintf($GLOBALS['TL_LANG']['tl_zad_sendnews']['warn_pdf'].'<br />', $filename);
          $this->signalWarning();            
        }			    
      }
      // add file to enclosure list
      $list[] = $filename;                    
    }
    // return attached files
    return $list;     
	}
  
  /**
	 * Filter news fields using custom rules. 
	 */
	private function filterByRules() {
    // set alias	
    $headline = &$this->news['headline'];
    $subheadline = &$this->news['subheadline'];
    $html = &$this->news['html'];
    $text = &$this->news['text'];
    $teaser = &$this->news['teaser'];
    $email_subject = &$this->news['email_subject'];
    $email_sender = &$this->news['email_sender'];
    $files = &$this->news['files'];
    // init vars
    $tag_search = array('{{headline}}', '{{subheadline}}', '{{html}}', '{{text}}', '{{teaser}}', '{{email_subject}}', '{{email_sender}}');
    $tag_replace = array(&$headline, &$subheadline, &$html, &$text, &$teaser, &$email_subject, &$email_sender);
	  // execute all filtering rules
    foreach ($this->rules as $rule) {
      $target = &$$rule['target'];
      $this->report .= sprintf('&nbsp;&nbsp;&nbsp;&nbsp;'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_rule'].'<br />', $rule['name']);
      switch ($rule['action']) {
        case 'regex':
          // regular expression replace
          $pattern = '/' . $rule['re_search'] . '/is';                               
          $replacement = str_replace($tag_search, $tag_replace, $rule['re_replace']);
          $count = 0;
          do {
            $tmp = $target; 
            $target = preg_replace($pattern, $replacement, $target, -1, $count);
          } while ($count > 0);
          if ($target == NULL) {
            // error: recover last target string
            $target = $tmp;
          }
          break;          
        case 'replace':          
          // text replace
          $target = str_replace($tag_search, $tag_replace, $rule['txt_replace']);
          break;          
        case 'delete':          
          // remove text
          $target = '';
          break;          
        case 'intro':          
          // create intro text
          $this->import('String');
          $target = trim(strip_tags($target, $rule['list_exec']));
          $target = $this->String->substrHtml($target, $rule['maxlen'] - 4).' ...';
          break;          
        case 'striptags':          
          // strip tags
          $target = preg_replace($rule['list_exec'], '', $target);          
          break;          
        case 'deltags':          
          // remove tags with content                    
          $count = 0;
          do {
            $target = preg_replace($rule['list_exec'], '', $target, -1, $count);
          } while ($count > 0);
          break;          
        case 'rentags':          
          // rename tags
          $replacement = trim($rule['tag_replace']); 
          $target = preg_replace($rule['list_exec'], '<' . $replacement . '>', $target);                               
          $replacement = '</' 
            . ((strpos($replacement, ' ') > 0) ? substr($replacement, 0, strpos($replacement, ' ')) : $replacement)  
            . '>';           
          $target = preg_replace($rule['list_exec_2'], $replacement, $target);          
          break;          
        case 'voidtags':          
          // delete void tags 
          $count = 0;
          do {
            $target = preg_replace($rule['list_exec'], '', $target, -1, $count);
          } while ($count > 0);
          break;          
        case 'delparams':          
          // delete HTML parameters
          $count = 0;
          do {
            $target = preg_replace($rule['list_exec'], '$1$3', $target, -1, $count);
          } while ($count > 0);
          break;          
        case 'allow':
          // file extensions allowed          
          $list = trimsplit(',', strtolower($rule['extlist']));
          foreach ($this->news['files'] as $key=>$value) {
            if (!in_array(strtolower($value['ext']), $list)) {
              unset($this->news['files'][$key]);
              $this->report .= sprintf('&nbsp;&nbsp;&nbsp;&nbsp;'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_notype'].'<br />', $value['filename'].'.'.$value['ext']);
            }
          }
          foreach ($this->news['images'] as $key=>$value) {
            if (!in_array(strtolower($value['ext']), $list)) {
              unset($this->news['images'][$key]);
              $this->report .= sprintf('&nbsp;&nbsp;&nbsp;&nbsp;'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_notype'].'<br />', $value['filename'].'.'.$value['ext']);
            }
          }          
          break;          
        case 'pdf':
          // file extensions for PDF conversion          
          $list = trimsplit(',', strtolower($rule['extlist']));
          foreach ($this->news['files'] as $key=>$value) {
            $this->news['files'][$key]['pdf'] = in_array(strtolower($value['ext']), $list) ? true : false;
            if ($this->news['files'][$key]['pdf']) {
              $this->report .= sprintf('&nbsp;&nbsp;&nbsp;&nbsp;'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_4pdf'].'<br />', $value['filename'].'.'.$value['ext']);
            }
          }
          foreach ($this->news['images'] as $key=>$value) {
            $this->news['images'][$key]['pdf'] = in_array(strtolower($value['ext']), $list) ? true : false;
            if ($this->news['images'][$key]['pdf']) {
              $this->report .= sprintf('&nbsp;&nbsp;&nbsp;&nbsp;'.$GLOBALS['TL_LANG']['tl_zad_sendnews']['info_4pdf'].'<br />', $value['filename'].'.'.$value['ext']);
            }
          }
          break;          
        default:
          // nothing to do
          break;
      }
    }    	
  }    	

}


?>