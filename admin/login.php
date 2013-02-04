<?php
require_once "../lib/Database.class.php";
require_once "../lib/HttpGetException.class.php";
require_once "../lib/AdminErrorPage.class.php";

/**
 * This Script check the username and password from POST and SESSION
 * include it in every Admin script
 */
try {
    $user="";
    $pass="";

    // Get the login and password from POST or SESSION
    if(!isset($_SESSION))
        session_start();

    if(!empty($_POST['user']) && !empty($_POST['pass'])) {
        $user = $_POST['user'];
        $pass = sha1($_POST['pass']);
    } else if(!empty($_SESSION['user']) && !empty($_SESSION['pass'])){
        $user = $_SESSION['user'];
        $pass = $_SESSION['pass'];
    } else {
        throw new HttpGetException();
    }

    // Check against data from the database
    $db = new Database();
    $stm = $db->prepare('SELECT 1 FROM Admin WHERE username=? AND password=?');
    $stm->execute(array($user, $pass));
    if($stm->rowCount() == 0) {
        die("dfgkjfg");
        throw new HttpGetException();
    }

    // Save the username and password in the session
    $_SESSION['user'] = $user ;
    $_SESSION['pass'] = $pass ;

} catch (HttpGetException $e) {
    header('Location: index.php?error');
} catch (PDOException $e) {
    $errorPage = new AdminErrorPage();
    $errorPage->display();
}
?>
