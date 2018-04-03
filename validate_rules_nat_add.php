<?php

require_once (dirname(__FILE__) . '/lib/structure.php');
require_once (dirname(__FILE__) . '/lib/ManagementNAT.php');

class PageValidateRulesNat extends Structure {
    private $_managementNat = null;

    
    public function __construct() {
        parent::__construct();
        $this->initializeAlias();
        $this->setActiveLink('Ajout règle NAT');
    }
    
    protected function buildHTMLHead() {
        parent::buildHTMLHead();
        //echo '<link rel="stylesheet" type="text/css" href="css\alias.css" media="all" />';
    }

    private function initializeNat() {
        $this->_managementNat = new ManagementNat();

        $this->_managementNat->addRule('NOM1', '10.0.0.1',22,"type" );
      }

      public function buildContent() {
        ?>
        <p>
        BONJOUR
        </p>
      
        <?php
    }
}
$page = new PageNat();
$page->setBreadCrumb('Accueil');
$page->start();

?>