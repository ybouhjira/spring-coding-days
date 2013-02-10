<?php
require_once '../lib/Database.class.php';
require_once '../lib/SmartySetup.class.php';
require_once '../lib/MessagePage.class.php';
require_once '../lib/HttpGetException.class.php';

try {
    if(empty($_GET['id']))
        throw new HttpGetException();

    $db = new Database();
    $stm = $db->prepare('SELECT * FROM  Participant WHERE id_participant = ? ');
    $stm->execute(array($_GET['id']));
    $particip = $stm->fetchAll(PDO::FETCH_OBJ);
    $particip = $particip[0];

    $smarty = new SmartySetup();
    $smarty->assign('particip',$particip);
    $smarty->display('../web/tpl/admin_particip_details.tpl');
  
} catch (PDOException $exc) {
    $pg = new MessagePage();
    $pg->display();
} catch (HttpGetException $exc) {
    header('Location: inscriptions.php');
}
?>
