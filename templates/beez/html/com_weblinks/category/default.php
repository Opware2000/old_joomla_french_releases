<?php
/**
 * @version $Id: default.php 8635 2007-08-30 13:20:35Z friesengeist $
 */
defined('_JEXEC') or die('Restricted access');
?>

<?php if ($this->params->get('show_page_title', 1)) : ?>
<h1 class="componentheading<?php echo $this->params->get('pageclass_sfx'); ?>">
	<?php echo $this->category->title; ?>
</h1>
<?php endif; ?>


<div class="weblinks<?php echo $this->params->get('pageclass_sfx'); ?>">

	<?php if ( $this->category->image || $this->category->description) : ?>
	<div class="contentdescription<?php echo $this->params->get('pageclass_sfx'); ?>">

		<?php if ($this->category->image) :
			echo $this->category->image;
		endif; ?>

		<?php echo $this->category->description; ?>

		<?php if ($this->category->image) : ?>
		<div class="wrap_image">&nbsp;</div>
		<?php endif; ?>

	</div>
	<?php endif; ?>

	<?php echo $this->loadTemplate('items'); ?>

</div>
