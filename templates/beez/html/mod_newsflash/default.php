<?php
/**
 * @version $Id: default.php 8637 2007-08-30 16:25:06Z friesengeist $
 */

defined('_JEXEC') or die('Restricted access');

srand((double) microtime() * 1000000);
$flashnum = rand(0, $items - 1);
$item = $list[$flashnum];
modNewsFlashHelper::renderItem($item, $params, $access);
