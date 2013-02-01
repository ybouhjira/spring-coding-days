<?php

/**
 * Description of SmartySetup
 * This class inherits from Smarty class and configures the directories
 * for Smarty's cache and compilation in the constructor
 * @author Youssef Bouhjira
 */

require_once 'Smarty/Smarty.class.php';

class SmartySetup extends Smarty {

    public function __construct() {
        parent::__construct();

        $this->template_dir = SITEDIR . "/_smarty/templates";
        $this->compile_dir = SITEDIR ."/_smarty/templates_c";
        $this->cache_dir = SITEDIR ."/_smarty/cache";
        $this->config_dir = SITEDIR ."/_smarty/configs";

        // make these available in smarty templates for inheritence
        $this->assign(array(
            'SITEDIR' => SITEDIR,
            'SUBDIR' => SUBDIR,
            'HTDOCS' => HTDOCS
            )
        );
    }

}

?>
