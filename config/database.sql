-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************


--
-- Table `tl_calendar_imagelist`
--

CREATE TABLE `tl_calendar_imagelist` (
	`id` int(10) unsigned NOT NULL auto_increment,
	`pid` int(10) unsigned NOT NULL default '0',
	`sorting` int(10) unsigned NOT NULL default '0',
	`tstamp` int(10) unsigned NOT NULL default '0',
	`name` varchar(255) NOT NULL default '',
	`description` text NULL,
	`image` varchar(255) NOT NULL default '',
	`imageUrl` varchar(255) NOT NULL default '',
	`target` char(1) NOT NULL default '',
	PRIMARY KEY  (`id`),
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
