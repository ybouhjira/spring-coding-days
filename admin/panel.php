<?php
require_once '../lib/config.php';
require_once '../lib/Database.class.php';
require_once 'login.php';
require_once '../lib/SmartySetup.class.php';
require_once '../lib/MessagePage.class.php';

try {
    $db = new Database();

    $msgC = $db->fetchObjects('SELECT COUNT(id_message) cnt FROM Message')[0]->cnt;
    $inscripC = $db->fetchObjects('SELECT COUNT(id_participant) cnt FROM Participant')[0]->cnt;
    $eqpC = $db->fetchObjects('SELECT COUNT(id_equipe) cnt FROM Equipe')[0]->cnt;

    $smarty = new SmartySetup();
    $smarty->assign(array(
        'msgCount' => $msgC,
        'inscripCount' => $inscripC,
        'eqpCount' => $eqpC
    ));
    $smarty->display('../web/tpl/admin_panel.tpl');

} catch(PDOException $exc) {
    $pg = new MessagePage();
    $pg->display();
}
?>
