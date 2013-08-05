--  ***********************************************************************
--  * Zad Send News - A Contao CMS extension 
--  * 
--  * This program is free software: you can redistribute it and/or
--  * modify it under the terms of the GNU Lesser General Public
--  * License as published by the Free Software Foundation, either
--  * version 3 of the License, or (at your option) any later version.
--  * 
--  * This program is distributed in the hope that it will be useful,
--  * but WITHOUT ANY WARRANTY; without even the implied warranty of
--  * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
--  * Lesser General Public License for more details.
--  * 
--  * You should have received a copy of the GNU Lesser General Public
--  * License along with this program. If not, please visit the Free
--  * Software Foundation website at <http://www.gnu.org/licenses/>.
--  *
--  * Copyright:  Copyright (C) 2012 by Antonello Dessi'
--  * Author:     Antonello Dessi'
--  * Package:    zad_sendnews
--  * License:    LGPL 
--  ***********************************************************************


-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************


-- --------------------------------------------------------
-- 
-- Table `tl_zad_sendnews`
-- 
CREATE TABLE `tl_zad_sendnews` (
-- identifier
  `id` int(10) unsigned NOT NULL auto_increment,  
-- timestamp  
  `tstamp` int(10) unsigned NOT NULL default '0',
-- name
  `name` varchar(255) NOT NULL default '',
-- server name
  `server_name` varchar(255) NOT NULL default '',
-- server port
  `server_port` int(6) unsigned NOT NULL default '0',  
-- server type (imap/pop3)
  `server_type` varchar(16) NOT NULL default '',
-- server TLS
  `server_tls` varchar(16) NOT NULL default '',
-- server user
  `server_user` varchar(255) NOT NULL default '',
-- server password
  `server_password` varchar(255) NOT NULL default '',
-- server mailbox
  `server_mailbox` varchar(255) NOT NULL default '',  
-- server command
  `server_command` varchar(255) NOT NULL default '',  
-- news archive id
  `news_archive` int(10) unsigned NOT NULL default '0',
-- user_id for the default author  
  `news_author` int(10) unsigned NOT NULL default '0',
-- enclosure allowed  
  `enclosure` char(1) NOT NULL default '',
-- enclosure directory  
  `enclosure_dir` varchar(255) NOT NULL default '',
-- enclosure dir type  
  `enclosure_dirtype` varchar(16) NOT NULL default '',
-- enclosure images management  
  `enclosure_images` varchar(16) NOT NULL default '',
-- time interval for checking new emails 
  `time_check` varchar(16) NOT NULL default '',
-- automatic publishing
  `auto_publish` varchar(16) NOT NULL default '',
-- action to take after reading emails   
  `post_action` varchar(16) NOT NULL default '',
-- mailbox where to move emails
  `move_mailbox` varchar(255) NOT NULL default '',
-- active or not 
  `active` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------
-- 
-- Table `tl_zad_sendnews_rule`
-- 
CREATE TABLE `tl_zad_sendnews_rule` (
-- identifier
  `id` int(10) unsigned NOT NULL auto_increment,
-- parent identifier
  `pid` int(10) unsigned NOT NULL default '0',  
-- timestamp  
  `tstamp` int(10) unsigned NOT NULL default '0',
-- sorting  
  `sorting` int(10) unsigned NOT NULL default '0',
-- name
  `name` varchar(255) NOT NULL default '',  
-- news field target
  `target` varchar(32) NOT NULL default '',  
-- action to perform 
  `action` varchar(32) NOT NULL default '',    
-- regular expression for searching data
  `re_search` varchar(255) NOT NULL default '',  
-- regular expression for replacing data 
  `re_replace` varchar(255) NOT NULL default '',  
-- text for replacing data 
  `txt_replace` varchar(255) NOT NULL default '',  
-- comma separated list for tags 
  `taglist` varchar(255) NOT NULL default '',  
-- text for replacing tag 
  `tag_replace` varchar(255) NOT NULL default '',  
-- comma separated list for parameters 
  `paramlist` varchar(255) NOT NULL default '',  
-- max text length 
  `maxlen` smallint(5) unsigned NOT NULL default '0',  
-- comma separated list for file extensions 
  `extlist` varchar(255) NOT NULL default '',  
-- regular expression used for list 
  `list_exec` text NULL,  
-- second regular expression used for list 
  `list_exec_2` text NULL,  
-- active or not 
  `active` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)  
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

