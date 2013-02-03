<?php
require_once '../lib/config.php';
require_once '../lib/SmartySetup.class.php';

$smarty = new SmartySetup();
if(isset($_GET['error']) )
    $smarty->assign('displayError',true);
else
    $smarty->assign('displayError',false);

$smarty->display('../web/tpl/admin_index.tpl');
?>
