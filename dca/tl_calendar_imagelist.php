<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
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
 * @copyright  Nothing Interactive 2012 <https://www.nothing.ch/>
 * @author     Fabian Gander <cyclodex@nothing.ch>
 * @author     Weyert de Boer <sprog@nothing.ch>
 * @author     Stefan Pfister <red@nothing.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */


$GLOBALS['TL_DCA']['tl_calendar_imagelist'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'                 => 'Table',
		'enableVersioning'              => false,
		'ptable'                        => 'tl_calendar_events',
		'panelLayout'                   => 'filter;search,limit',
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                      => 4,
			'fields'                    => array('sorting'),
			'flag'                      => 1,
			'headerFields'              => array('name', 'description'),
			'panelLayout'               => 'filter;search,limit',
			'child_record_callback'     => array('tl_calendar_imagelist', 'getList'),
		),
		'label' => array
		(
			'fields'                    => array('name', "id", "description"),
			'format'                    => '%s',
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'             	=> &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                  => 'act=select',
				'class'                 => 'header_edit_all',
				'attributes'            => 'onclick="Backend.getScrollOffset();"'
			),
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_calendar_imagelist']['edit'],
				'href'                  => 'act=edit',
				'icon'                  => 'edit.gif'
			),
			'copy' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_calendar_imagelist']['copy'],
				'href'                  => 'act=copy',
				'icon'                  => 'copy.gif'
			),
			'delete' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_calendar_imagelist']['delete'],
				'href'                  => 'act=delete',
				'icon'                  => 'delete.gif',
				'attributes'            => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'move' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_calendar_imagelist']['move'],
				'href'                  => 'act=move',
				'icon'                  => 'move.gif'
			),
			'show' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_calendar_imagelist']['show'],
				'href'                  => 'act=show',
				'icon'                  => 'show.gif'
			),
		)
	),

	// Palettes
	'palettes' => array
	(
		'default'                       => 'name;{images_legend},image;{optional_legend:hide},description,imageUrl,target;',
	),

	// Fields
	'fields' => array
	(
		'name' => array
		(
			'label'                     => &$GLOBALS['TL_LANG']['tl_calendar_imagelist']['name'],
			'inputType'                 => 'text',
			'eval'                      => array('mandatory'=> true, 'maxlength'=> 255, 'tl_class' => 'w50'),
		),
		'image' => array
		(
			'label'                     => &$GLOBALS['TL_LANG']['tl_calendar_imagelist']['image'],
			'inputType'                 => 'fileTree',
			'eval'                      => array('mandatory' => true, 'fieldType' => 'radio', 'files' => true, 'filesOnly' => true, 'extensions'=> 'jpg, gif, png', 'tl_class' => 'clr'),
		),
		'imageUrl' => array
		(
			'label'                     => &$GLOBALS['TL_LANG']['tl_calendar_imagelist']['imageURL'],
			'inputType'                 => 'text',
			'eval'                      => array('rgxp' => 'url', 'decodeEntities'=> true, 'maxlength' => 255, 'tl_class' => 'w50 wizard'),
		),
		'target' => array
		(
			'label'                   	=> &$GLOBALS['TL_LANG']['MSC']['target'],
			'inputType'               	=> 'checkbox',
			'eval'                    	=> array('tl_class' => 'w50 m12')
		),
		'description' => array
		(
			'label'                     => &$GLOBALS['TL_LANG']['tl_calendar_imagelist']['description'],
			'inputType'                 => 'text',
			'eval'                      => array('mandatory'=> false, 'tl_class' => 'clr'),
		),
	)
);


class tl_calendar_imagelist extends Backend
{


	/**
	 * Get all fractions and return them as array
	 * @return array
	 */
	public function getList($arrRow)
	{
		print_r($arrRow, true);
		return "<div><i>[" . $arrRow["sorting"] . "]</i> <strong>" . $arrRow["name"] . "</strong></div>";
	}
}
