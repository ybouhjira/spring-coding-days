<?php
require_once '../../lib/config.php';
require_once '../login.php';
require_once '../../lib/Database.class.php';
require_once '../../lib/MessagePage.class.php';
require_once '../../lib/HttpGetException.class.php';

try {
    if(empty($_GET['id']))
        throw new HttpGetException;
    $db = new Database();
    $id = $db->quote($_GET['id']);
    $db->query("DELETE FROM Message WHERE id_message = $id");
    header('Location: ../messages.php');
} catch (PDOException $exc) {
    header('Location: ../messages.php');
} catch (HttpGetException $exc) {
    header('Location: ../index.php');
}
?>

