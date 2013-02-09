<?php
require_once '../lib/config.php';
require_once 'login.php';
require_once '../lib/Database.class.php';
require_once '../lib/SmartySetup.class.php';
require_once '../lib/MessagePage.class.php';

try {
    $db = new Database();
    $particips = $db->fetchObjects(
       'SELECT * FROM Participant '.
       'ORDER BY id_equipe');
    
    $smarty = new SmartySetup();
    $smarty->assign('particips',$particips);
    $smarty->display('../web/tpl/admin_inscriptions.tpl');

} catch ( PDOException $exc ) {
    $pg = new MessagePage();
    $pg->display();
}
?>

