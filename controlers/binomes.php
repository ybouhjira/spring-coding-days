<?php
require_once '../lib/Database.class.php';
require_once '../lib/MessagePage.class.php';
require_once '../lib/Form/Form.class.php';
require_once '../lib/Form/FormValidationException.class.php';
require_once '../lib/Form/PregIn.class.php';
require_once '../lib/Form/FileIn.class.php';
require_once '../lib/Form/DateIn.class.php';
require_once '../lib/HttpGetException.class.php';

try {
    // FORM VALIDATION ==========================================================
    $form = new Form('post');
    $form->addInput(new PregIn('/^(binome|monome)$/', 'equipe'));
    $form->validate();

    $count = (($_POST['equipe']=='binome')? 2:1);
    for($i=1; $i<=$count; $i++) {
        $form->addInput(array(
            new PregIn(PregIn::exp('ALSPC',45), "nom$i"),
            new PregIn(PregIn::exp('ALSPC',45), "prenom$i"),
            new DateIn('1900/1/1','2013/1/1', "date_naiss$i"),
            new PregIn('/^.{5,45}$/',"adresse$i"),
            new PregIn(PregIn::exp('ALSPC',45),"ville$i"),
            new PregIn(PregIn::exp('TELNAT'), "tel$i"),
            new PregIn(PregIn::exp('EMAIL'), "email$i"),
            new PregIn('/^.{3,45}$/', "etab$i"),
            new PregIn('/^.{3,45}$/', "filliere$i"),
            new PregIn('/^.{1,45}$/', "niveau$i"),
            new PregIn(PregIn::exp('ALSPC',45),"ville$i")
        ));
    }
    $form->validate();

    // INSERTING DATA ===========================================================
    $db = new Database();

    // inserting in table Equipe
    $db->insert('Equipe',array(
        'pc' => isset($_POST['pc'])
    ));

    // inserting team members
    $teamId = $db->lastInsertId();
    for($i=1; $i <= $count; $i++ ) {
        $db->insert('Participant', array (
            "nom" => $_POST["nom$i"],
            "prenom" => $_POST["prenom$i"],
            "adresse" => $_POST["adresse$i"],
            "ville" => $_POST["ville$i"],
            "tel" => $_POST["tel$i"],
            "email" => $_POST["email$i"],
            "etab" => $_POST["etab$i"],
            "filliere" => $_POST["filliere$i"],
            "niveau" => $_POST["niveau$i"],
            "id_equipe" => $teamId
        ));
        
    }

    $pg = new MessagePage('../web/tpl/error.tpl',
        '<h2>Inscription</h2>'
        .'<div class="succes-message">Merci pour votre inscription.</div>');
    $pg->display();

} catch ( FormValidationException $exc) {
    $message = $exc->getMessages()[0];
    $err = $exc->getMessages()[0] ;
    if(preg_match('/^tel/', $err)) {
        $message ="Téléphone invalide";
    } elseif(preg_match('/^nom/', $err)) {
        $message ="Nom invalide";
    } elseif(preg_match('/^date_naiss/', $err)) {
        $message = "Date de naissance invalide";
    } elseif(preg_match('/^prenom/', $err)) {
        $message ="Prénom invalide";
    } elseif(preg_match('/^adresse/', $err)) {
        $message ="Adresse invalide";
    } elseif(preg_match('/^email/', $err)) {
        $message ="e-mail invalide";
    } elseif(preg_match('/^etab/', $err)) {
        $message ="Etablissement invalide";
    } elseif(preg_match('/^filliere/', $err)) {
        $message ="Fillière invalide";
    } elseif(preg_match('/^niveau/', $err)) {
        $message ="Niveau invalide";
    }
     
    $message = "<h2>Inscription : </h2><div class='error'>$message</div>";
    $errorPg = new MessagePage('../web/tpl/error.tpl',$message);
    $errorPg->display();
} catch ( PDOException $exc ) {
    $errorPg = new MessagePage();
    $errorPg->display();
}
?>
