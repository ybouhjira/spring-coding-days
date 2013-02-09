<?php
require_once '../lib/config.php';
require_once 'login.php';
require_once '../lib/Database.class.php';
require_once '../lib/MessagePage.class.php';
require_once '../lib/SmartySetup.class.php';

try {
    // Database
    $db = new Database();
    $messages = $db->fetchObjects('SELECT * FROM Message'); 

    // View
    $smarty = new SmartySetup();
    $smarty->assign('messages',$messages);
    $smarty->display('../web/tpl/admin_messages.tpl');

} catch( PDOException $exc) {
    $pg = new MessagePage();
    $pg->display();
}
