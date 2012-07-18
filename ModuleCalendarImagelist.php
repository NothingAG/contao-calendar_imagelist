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

class ModuleCalendarImagelist extends Module
{

	protected $strTemplate = 'mod_calendar_imagelist';


	protected function compile()
	{
		$time = time();

		// Get the current event
		$objEvent = $this->Database->prepare("SELECT *, author AS authorId, (SELECT title FROM tl_calendar WHERE tl_calendar.id=tl_calendar_events.pid) AS calendar, (SELECT name FROM tl_user WHERE id=author) author FROM tl_calendar_events WHERE (id=? OR alias=?)" . (!BE_USER_LOGGED_IN ? " AND (start='' OR start<?) AND (stop='' OR stop>?) AND published=1" : ""))
								   ->limit(1)
								   ->execute((is_numeric($this->Input->get('events')) ? $this->Input->get('events') : 0), $this->Input->get('events'), $time, $time);

		if ($objEvent->numRows < 1)
		{
			// No events found
			return;
		}

		// Id of element
		$ID = $objEvent->id;

		// Generate image array for template
		$objImagelist = $this->Database->prepare("SELECT * FROM tl_calendar_imagelist WHERE pid=? ORDER BY sorting")
										->execute($ID);
		
		if ($objImagelist->numRows < 1)
		{
			// No images found
			return;
		}

		while ($objImagelist->next())
		{
			// Resize image
			$image = $this->getImage($objImagelist->image, 184, 0, 'center_center');

			$arrImagelist[] = array
			(
				'name'        	=> $objImagelist->name,
				'description'	=> $objImagelist->description,
				'image'       	=> $image,
				'imageUrl'		=> $objImagelist->imageUrl,
				'target'      	=> $objImagelist->target,
			);
		}

		$this->Template->images = $arrImagelist;
	}

}