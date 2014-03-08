<?php defined('_JEXEC') or die;

// temporary fix
$hlevel = 2;
$ptlevel = 1;
 echo '<h'.$ptlevel.' class="componentheading">'. JText::_( 'FORGOT_YOUR_PASSWORD' ).'</h'.$ptlevel.'>';
?>



<form action="index.php?option=com_user&amp;task=requestreset" method="post" class="josForm form-validate">
	<p><?php echo JText::_('RESET_PASSWORD_REQUEST_DESCRIPTION'); ?></p>

	<label for="email" class="hasTip" title="<?php echo JText::_('RESET_PASSWORD_EMAIL_TIP_TITLE'); ?>::<?php echo JText::_('RESET_PASSWORD_EMAIL_TIP_TEXT'); ?>"><?php echo JText::_('Email Address'); ?>:</label>
	<input id="email" name="email" type="text" class="required validate-email" />

	<input type="hidden" name="<?php echo JUtility::getToken(); ?>" value="1" />
	<button type="submit" class="validate"><?php echo JText::_('Submit'); ?></button>
</form>