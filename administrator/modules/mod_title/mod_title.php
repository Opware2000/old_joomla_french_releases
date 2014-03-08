<?php
/**
* @version		$Id: mod_title.php 8295 2007-08-01 23:05:25Z eddieajau $
* @package		Joomla
* @copyright	Copyright (C) 2005 - 2007 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Get the component title div
$title = $mainframe->get('JComponentTitle');

// Echo title if it exists
if (!empty($title)) {
	echo $title;
}