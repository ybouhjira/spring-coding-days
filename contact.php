<?php
require_once 'lib/config.php';
require_once 'lib/SmartySetup.class.php';

$smarty = new SmartySetup();
$smarty->display('web/tpl/contact.tpl');
?>
