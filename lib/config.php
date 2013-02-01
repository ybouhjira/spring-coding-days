<?php
define('HTDOCS', $_SERVER["DOCUMENT_ROOT"].'/');
define("SUBDIR", "spring_coding_days");
define("SITEDIR", HTDOCS . SUBDIR);

// AUTOLOAD FUNCTION 
function my_autoload($className) {
    $filename = SITEDIR . "lib/$className.class.php";
    if (file_exists($filename))
        require_once $filename;
}
spl_autoload_register('my_autoload');

require_once 'Form/form_autoload.php';

?>
