<?php
require_once '../../lib/Database.class.php';
require_once '../../lib/MessagePage.class.php';
require_once '../../lib/Form/Form.class.php';
require_once '../../lib/Form/PregIn.class.php';
require_once '../../lib/Form/FormValidationException.class.php';
require_once '../../lib/HttpGetException.class.php';

try {

    // FORM VALIDATION =========================================================
    $form = new Form('post');
    $form->addInput(array(
        new PregIn(PregIn::exp('ALSPC',45,5), 'username'),
        new PregIn('/^.{8,45}$/', 'password')
    ));
    if(!empty($_POST['new_username']))
        $form->addInput(new PregIn(PregIn::exp('ALSPC',45,5), 'new_username'));
    if(!empty($_POST['new_password'])) {
        $form->addInput(new PregIn('/^.{8,45}$/','new_password'));
        $form->addInput(new PregIn(
            "/^{$_POST['new_password']}$/",
            'confirm_password'
        ));
    }
    $form->validate();

    // DATABASE ================================================================
    $db = new Database();

    // get sha1 of the passwords
    $pass = sha1($_POST['password']);
    if(!empty($_POST['new_password']))
        $newPass = sha1($_POST['new_password']);

    // CHECK OLD USERNAME AND PASSWORD
    $checkStm = $db->prepare(
        'SELECT 1 FROM Admin '.
        'WHERE username = ? '.
        'AND password = ?'
    );
    $checkStm->execute(array($_POST['username'],$pass));
    if($checkStm->rowCount() == 0 )
        throw new HttpGetException();

    $params = array();
    // Construnct the query
    $query = 'UPDATE Admin SET ';
    if(!empty($_POST['new_username'])) {
        $query .= 'username = ? ';
        array_push($params, $_POST['new_username']);
    }
    if(!empty($_POST['new_password'])) {
        $query .= ',password = ? ';
        array_push($params, $newPass);
    }
    $query .= 'WHERE username = ? AND password = ?';
    array_push($params, $_POST['username']);
    array_push($params, $pass);

    //execute the query
    $stm = $db->prepare($query);
    $stm->execute($params);

    header('Location: ../panel.php');
} catch (PDOException $exc) {
    $pg = new MessagePage();
    $pg->display();
} catch(FormValidationException $exc) {
    $message = '';
    switch($exc->getMessages()[0]) {
    case 'username':
        $message = "Le nom d'utilisateur est incorrect";
        break;
    case 'password':
        $message = 'Le mot de passe est incorrect';
        break;
    case 'new_username':
        $message = "Le nom d'utilisateur doit comporter entre 5 et 45 caractères";
        break;
    case 'new_password':
        $message = 'Le mot de passe doit comporter entre 8 et 45 caractères'; 
        break;
    case 'confirm_password':
        $message = 'Vous n\'vez pas retapé le même mot de passe';
        break;
    }
    $pg = new MessagePage('../../web/tpl/admin_error.tpl',$message);
    $pg->display();
} catch(HttpGetException $exc) {
    $msg  = 'Le nom d\'utilisateur ou le mot de passe sont incorrecte';
    $pg = new MessagePage('../../web/tpl/admin_error.tpl',$msg);
    $pg->display();
}
