<?php
require_once '../lib/Database.class.php';
require_once '../lib/SmartySetup.class.php';
require_once '../lib/Form/Form.class.php';
require_once '../lib/Form/PregIn.class.php';
require_once '../lib/Form/FormValidationException.class.php';
require_once '../lib/MessagePage.class.php';

try {
    // Form validation
    $form = new Form('post');
    $form->addInput(array(
        new PregIn(PregIn::exp('ALSPC',45) ,'nom'),
        new PregIn('/.*/','message'),
        new PregIn(PregIn::exp('EMAIL'),'email')
    ));
    $form->validate();

    // Database insertion
    $db = new Database();
    $db->insert('Message',array(
        'nom' => $_POST['nom'],
        'message' => $_POST['message'],
        'email' => $_POST['email']
    ));

    // Display success page
    $msg = "<h2>Message : </h2>"
        ."<div class='succes-message'>"
        ."Votre message a été envoyé avec succès</div>";
    $page = new Messagepage("../web/tpl/error.tpl");
    $page->display();

    // Exceptions handeling
} catch ( FormValidationException $exc ) {
    $message = "";

    switch($exc->getMessages()[0]) {
    case "message":
        $message = "Message invalide";
        break;
    case "email":
        $message = "Adresse e-mail invalide";
        break;
    case "nom":
        $message = "Nom invalide";
        break;
    }

    $errorPage = new MessagePage("../web/tpl/error.tpl",$message);
    $errorPage->display();
} catch ( PDOException $exc ) {
    $errorPage = new MessagePage('../web/tpl/error.tpl');
    $errorPage->display();
}
?>

