<?php
require_once '../lib/config.php';
require_once '../lib/Database.class.php';
require_once 'login.php';
require_once '../lib/SmartySetup.class.php';

$smarty = new SmartySetup();
$smarty->display('../web/tpl/admin_panel.tpl');
?>
