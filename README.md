# CONTAO CONETEN EXTENSION: CALENDAR IMAGE LIST
Extends the Contao calendar events with an image gallery. The images can be sorted in the backend using drag and drop and support an optional image caption and link. The frontend module renders the images in an unsorted list.

## SETUP AND USAGE
### Prerequisites
* Contao Version 2.10+
* dcawizard [https://github.com/isotope/dcawizard](https://github.com/isotope/dcawizard)

### Installation
1. Make sure the `dcawizard` extension is installed and running properly
2. Copy the files into the _modules_ folder from Contao
3. Update the database (e.g. with the _Extension manager_)
4. Display specific setup:
   event-reader: To show the images in the _event-reader_ be sure to place the "Events Imagelist" _Frontend module_ accordingly in your page layout
   event-list:   If you want to show the images in the _event-list_ be sure to select the proper template in the module `event_list_imagelist`
5. Extend the events with images
6. Enjoy!

## VERSION HISTORY
### 1.0.1 (2012-08-16)
#### Added support for event list
### 1.0.0 (2012-07-17)
#### initial release

## LICENSE

* Author:		Nothing Interactive, Switzerland
* Website: 		[https://www.nothing.ch/](https://www.nothing.ch/)
* Version: 		1.0.1
* Date: 		2012-08-16
* License: 		[GNU Lesser General Public License (LGPL)](http://www.gnu.org/licenses/lgpl.html)