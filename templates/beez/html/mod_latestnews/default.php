<?php
/**
 * @version $Id: default.php 8637 2007-08-30 16:25:06Z friesengeist $
 */
defined('_JEXEC') or die('Restricted access');

if (count($list)) : ?>
<ul class="latestnews<?php echo $params->get('pageclass_sfx'); ?>">
	<?php foreach ($list as $item) : ?>
	<li class="latestnews<?php echo $params->get('pageclass_sfx'); ?>">
		<a href="<?php echo $item->link; ?>" class="latestnews<?php echo $params->get('pageclass_sfx'); ?>">
			<?php echo $item->text; ?>
		</a>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif;
