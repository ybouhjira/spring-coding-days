<?php
require_once '../lib/Database.class.php';
require_once '../lib/SmartySetup.class.php';
require_once '../lib/MessagePage.class.php';

try {
    $smarty = new SmartySetup();
    $smarty->display('../web/tpl/admin_edit_admin.tpl');

} catch(PDOException $exc ) {
    $pg = new MessagePage();
    $pg->display();
}
?>
