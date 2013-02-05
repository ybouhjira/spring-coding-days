<?php
require_once '../lib/Database.class.php';
require_once '../lib/MessagePage.class.php';
require_once '../lib/Form.class.php';
require_once '../lib/Form/FormValidationException.class.php';
require_once '../lib/Form/PregIn.class.php';
require_once '../lib/Form/FileIn.class.php';
require_once '../lib/Form/DateIn.class.php';
require_once '../lib/HttpGetException.class.php';

try {
    // FORM VALIDATION ==========================================================
    $foRm = new Form('post');
    $form->addInput(new PregIn('/^(binome|monome)$/', 'equipe'));
    $form->validate();

    $count = (($_POST['equipe']=='binome')? 2:1);
    for($i=1; $i<=$count; $i++) {
        $form->addInput(array(
            new PregIn(PregIn::exp('ALSPC',45), "nom$i"),
            new PregIn(PregIn::exp('ALSPC',45), "prenom$i"),
            new DateIn('1/1/1900','1/1/2013', "date_naiss$i"),
            new PregIn('/.*/',"adresse$i"),
            new PregIn(PregIn::exp('TELNAT'), "tel$i"),
            new PregIn(PregIn::exp('EMAIL'), "email$i"),
            new PregIn(PregIn::exp('ALNUMSPC',45), "etab$i"),
            new PregIn(PregIn::exp('ALNUMSPC',100, "fillere$i")),
            new PregIn(PregIn::exp('ALNUMSPC',45, "niveau$i")),
            new FileIn(2 * 1024 * 1024, '/^image\/(png|jpeg)$/', "carte$i")
        ));
    }
    $form->validate();

    // INSERTING DATA ===========================================================
    $db = new Database();

    // generating random password
    $teamPass = ""; 

    // inserting in table Equipe
    $db->insert('Equipe',array(
        'mot_de_passe' => $teamPass,
        'pc' => isset($_POST['pc'])
    ));

    // inserting team members
    $teamId = $db->lastInsertId();
    for($i=1; $i <= $count; $i++ ) {
        $db->insert('Participant', array(
            "nom"=> $_POST["nom$i"],
            "prenom"=> $_POST["prenom$i"],
            "adresse"=> $_POST["adresse$i"],
            "tel"=> $_POST["tel$i"],
            "email"=> $_POST["email$i"],
            "etab"=> $_POST["etab$i"],
            "filliere"=> $_POST["filliere$i"],
            "niveau"=> $_POST["niveau$i"],
            "carte"=> $_POST["carte$i"],
            "id_equipe"=> $teamId
        ));
    }

     

} catch ( FormValidationException $exc) {

} catch ( PDOException $exc ) {

} catch ( HttpGetException $exc ) {

}
?>
