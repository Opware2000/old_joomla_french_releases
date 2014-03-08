<?php
/**
 * @version $Id: horiz.php 8637 2007-08-30 16:25:06Z friesengeist $
 */

defined('_JEXEC') or die('Restricted access');

if (count($list) == 1) :
	$item = $list[0];
	modNewsFlashHelper::renderItem($item, $params, $access);
elseif (count($list) > 1) : ?>
<ul class="horiz<?php echo $params->get('moduleclass_sfx'); ?>">
	<?php foreach ($list as $item) : ?>
	<li>
		<?php modNewsFlashHelper::renderItem($item, $params, $access); ?>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif;
