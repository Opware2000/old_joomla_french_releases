<?php
/**
* @version $Id: index.php 3478 2006-05-13 20:31:22Z stingrey $
* @package Joomla
* @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

if (file_exists( '../configuration.php' ) && filesize( '../configuration.php' ) > 10) {
	header( "Location: ../index.php" );
	exit();
}
require_once( '../includes/version.php' );

/** Include common.php */
include_once( 'common.php' );

function get_php_setting($val) {
	$r =  (ini_get($val) == '1' ? 1 : 0);
	return $r ? 'ON' : 'OFF';
}

function writableCell( $folder ) {
	echo '<tr>';
	echo '<td class="item">' . $folder . '/</td>';
	echo '<td align="left">';
	echo is_writable( "../$folder" ) ? '<b><font color="green">Modifiable</font></b>' : '<b><font color="red">Non modifiable</font></b>' . '</td>';
	echo '</tr>';
}

$sp = ini_get( 'session.save_path' );

echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Joomla - Web Installer</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="../images/favicon.ico" />
<link rel="stylesheet" href="install.css" type="text/css" />
</head>
<body>

<div id="wrapper">
<div id="header">
<div id="joomla"><img src="header_install.png" alt="Installation Joomla" /></div>
</div>
</div>

<div id="ctr" align="center">
<div class="install">
<div id="stepbar">
<div class="step-on">Pré-installation</div>
<div class="step-off">Licence</div>
<div class="step-off">Etape 1</div>
<div class="step-off">Etape 2</div>
<div class="step-off">Etape 3</div>
<div class="step-off">Etape 4</div>
</div>

<div id="right">

<div id="step">Pré-installation</div>

<div class="far-right">
	<input name="Button2" type="submit" class="button" value="Suivant >>" onclick="window.location='install.php';" />
	<br/>
	<br/>
	<input type="button" class="button" value="Vérifier à nouveau" onclick="window.location=window.location" />
</div>
<div class="clr"></div>

<h1>Vérification de pré-installation pour:<br/><?php echo $version; ?></h1>
<div class="install-text">
Si certains éléments sont écrits en rouge, alors veuillez prendre les mesures nécessaires pour les corriger. Sinon l'installation de Joomla peut ne pas fonctionner correctement.
<div class="ctr"></div>
</div>

<div class="install-form">
<div class="form-block">

<table class="content">
<tr>
	<td class="item">
	PHP version >= 4.1.0
	</td>
	<td align="left">
	<?php echo phpversion() < '4.1' ? '<b><font color="red">Non</font></b>' : '<b><font color="green">Oui</font></b>';?>
	</td>
</tr>
<tr>
	<td>
	&nbsp; - Compression ZLIB
	</td>
	<td align="left">
	<?php echo extension_loaded('zlib') ? '<b><font color="green">Oui</font></b>' : '<b><font color="red">Non</font></b>';?>
	</td>
</tr>
<tr>
	<td>
	&nbsp; - Support XML
	</td>
	<td align="left">
	<?php echo extension_loaded('xml') ? '<b><font color="green">Oui</font></b>' : '<b><font color="red">Non</font></b>';?>
	</td>
</tr>
<tr>
	<td>
	&nbsp; - Support MySQL
	</td>
	<td align="left">
	<?php echo function_exists( 'mysql_connect' ) ? '<b><font color="green">Oui</font></b>' : '<b><font color="red">Non</font></b>';?>
	</td>
</tr>
<tr>
	<td valign="top" class="item">
	configuration.php
	</td>
	<td align="left">
	<?php
	if (@file_exists('../configuration.php') &&  @is_writable( '../configuration.php' )){
		echo '<b><font color="green">Modifiable</font></b>';
	} else if (is_writable( '..' )) {
		echo '<b><font color="green">Modifiable</font></b>';
	} else {
		echo '<b><font color="red">Non modifiable</font></b><br /><span class="small">Vous pouvez poursuivre l\'installation, vous devrez toutefois copier et coller les données de configuration affichées à la fin de l\'installation dans un fichier configuration.php, que vous devrez ensuite uploader.</span>';
	} ?>
	</td>
</tr>
<tr>
	<td class="item">
	Session save path
	</td>
	<td align="left" valign="top">
	<?php echo is_writable( $sp ) ? '<b><font color="green">Writeable</font></b>' : '<b><font color="red">Unwriteable</font></b>';?>
	</td>
</tr>
<tr>
	<td class="item" colspan="2">
	<b><?php echo $sp ? $sp : 'Not set'; ?></b>
	</td>
</tr>
</table>
</div>
</div>
<div class="clr"></div>

<h1> Configuration recommandée:</h1>
<div class="install-text">
Ces paramètres PHP sont recommandés afin d'assurer une pleine compatibilité avec Joomla.
<br />
Toutefois, Joomla devrait quand même fonctionner correctement s'ils ne sont pas activés.<div class="ctr"></div>
</div>

<div class="install-form">
<div class="form-block">

<table class="content">
<tr>
	<td class="toggle">
	Directive
	</td>
	<td class="toggle">
	Recommandé
	</td>
	<td class="toggle">
	Actuel
	</td>
</tr>
<?php
$php_recommended_settings = array(array ('Safe Mode','safe_mode','OFF'),
array ('Display Errors','display_errors','ON'),
array ('File Uploads','file_uploads','ON'),
array ('Magic Quotes GPC','magic_quotes_gpc','ON'),
array ('Magic Quotes Runtime','magic_quotes_runtime','OFF'),
array ('Register Globals','register_globals','OFF'),
array ('Output Buffering','output_buffering','OFF'),
array ('Session auto start','session.auto_start','OFF'),
);

foreach ($php_recommended_settings as $phprec) {
?>
<tr>
	<td class="item"><?php echo $phprec[0]; ?>:</td>
	<td class="toggle"><?php echo $phprec[2]; ?>:</td>
	<td>
	<?php
	if ( get_php_setting($phprec[1]) == $phprec[2] ) {
	?>
		<font color="green"><b>
	<?php
	} else {
	?>
		<font color="red"><b>
	<?php
	}
	echo get_php_setting($phprec[1]);
	?>
	</b></font>
	<td>
</tr>
<?php
}
?>
</table>
</div>
</div>
<div class="clr"></div>

<h1> Permissions des répertoires:</h1>
<div class="install-text">
Pour que Joomla fonctionne correctement, certains répertoires doivent être accessibles en lecture et écriture. Si certains des répertoires listés co-contre sont dans l'état "Non modifiable", alors vous devrez changer les CHMODer pour les rendre "Modifiables".
<div class="clr">&nbsp;&nbsp;</div>
<div class="ctr"></div>
</div>

<div class="install-form">
<div class="form-block">

<table class="content">
<?php
writableCell( 'administrator/backups' );
writableCell( 'administrator/components' );
writableCell( 'administrator/modules' );
writableCell( 'administrator/templates' );
writableCell( 'cache' );
writableCell( 'components' );
writableCell( 'images' );
writableCell( 'images/banners' );
writableCell( 'images/stories' );
writableCell( 'language' );
writableCell( 'mambots' );
writableCell( 'mambots/content' );
writableCell( 'mambots/editors' );
writableCell( 'mambots/editors-xtd' );
writableCell( 'mambots/search' );
writableCell( 'mambots/system' );
writableCell( 'media' );
writableCell( 'modules' );
writableCell( 'templates' );
?>
</table>
</div>
<div class="clr"></div>
</div>
<div class="clr"></div>
</div>
<div class="clr"></div>
</div>
</div>

<div class="ctr">
	<a href="http://www.joomla.org" target="_blank">Joomla</a> is Free Software released under the GNU/GPL License.
</div>

</body>
</html>
