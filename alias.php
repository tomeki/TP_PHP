<?php

require_once (dirname(__FILE__) . '/lib/structure.php');
require_once (dirname(__FILE__) . '/lib/managementalias.php');

class PageAlias extends Structure {
    private $_managementAlias = null;

    
    public function __construct() {
        parent::__construct();
        $this->initializeAlias();
        $this->setActiveLink('Alias');
    }
    
    protected function buildHTMLHead() {
        parent::buildHTMLHead();
       // echo '<link rel="stylesheet" type="text/css" href="css\alias.css" media="all" />';
    }

    private function initializeAlias() {
        $this->_managementAlias = new ManagementAlias();
       // $this->_managementAlias->addAlias('10.0.0.1', 22,'WebServer-1-SSH');
    }

    public function buildContent() {
        ?>
        <p>
            Voici la liste des alias du système :
        </p>
        <table id="myTab" class="table table-striped">
            <thead>
                <tr>
                    <th>Alias</th>
                    <th>Adresse IP</th>
                    <th>Port</th>
                </tr>
            </thead>
            <tbody>
                <?php $this->_managementAlias->buildAliasToHTML(); ?> 
            </tbody>
        </table>
        <?php
    }

}
$page = new PageAlias();
$page->setBreadCrumb('Accueil');
$page->start();

?>