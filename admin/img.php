<?php
header('Content-Type: image/jpeg');
require_once '../lib/Database.class.php';

try {
    $db = new Database();
    $st = $db->prepare('SELECT carte FROM Participant WHERE id_participant = ?');
    $img = $st->fetchAll(PDO::FETCH_OBJ)[0]->carte;
    echo $img;
} catch ( PDOException $exc ) {
    $pg = new MessagePage();
    $pg->display();
}
?>
