<?php
/**
 * @package         Shawn.Module
 * @subpackage      mod_esweather
 * @copyright       Copyright (C) 2012 Shawn.com, Inc. All rights reserved.
 * @license         GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

$base_url = JUri::root();
?>

<div class="row row-cols-1 row-cols-sm-2 esweather">
    <div class="col">
        <img src="<?php echo $base_url; ?>/modules/mod_esweather/images/weather-icon.png" alt="天氣標誌" />
        <p class="side-title weather">新北今日天氣</p>
        <p><?php echo $cwaData['ci'] . "，" . $cwaData['minT'] . "°" . $cwaData['unit'] . "~" . $cwaData['maxT'] . "°" . $cwaData['unit']; ?></p>
    </div>
    <div class="col">
        <img src="<?php echo $base_url; ?>/modules/mod_esweather/images/dust-icon.png" alt="空氣品質標誌" />
        <p class="side-title airquality">園區空氣品質</p>
        <p class="text"><?php echo $pm25Data['status'] . "，細懸浮微粒每小時濃度" . $pm25Data['pm2.5'] . "μg/m3"; ?><br><?php echo date('m-d h:i', strtotime($cwaData['endTime'])); ?></p>
    </div>
</div>



