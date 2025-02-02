<?php
/**
 * @package         Shawn.Module
 * @subpackage      mod_esweather
 * @copyright       Copyright (C) 2012 Shawn.com, Inc. All rights reserved.
 * @license         GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;


// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';


$ititle          = $module->title;
$id              = $module->id;

$cwaData = ModEsweatherHelper::getcwaData();

$pm25Data = ModEsweatherHelper::getpm25Data();

// Pass data to the template
require JModuleHelper::getLayoutPath('mod_esweather');
