<?php

require_once (dirname(__FILE__) . '/lib/structure.php');
require_once (dirname(__FILE__) . '/lib/ManagementNAT.php');

class PageGenerateRulesNat extends Structure {
    private $_managementNat = null;

    
    public function __construct() {
        parent::__construct();
        $this->initializeNat();

        $this->setActiveLink('Générer règle NAT');
    }
    
    protected function buildHTMLHead() {
        parent::buildHTMLHead();
       // echo '<link rel="stylesheet" type="text/css" href="css\alias.css" media="all" />';
    }

    private function initializeNat() {
      $this->_managementNat = new ManagementNAT();
  }


    public function buildContent() {

        ?>
        <div class="alert alert-warning" role="alert">
          Configuration Iptables
        </div>
        <table id="myTab" class="table table-striped">
            <thead>
                <tr>
                    <th>Alias de la règle</th>
                    <th>Type</th>
                    <th>Ligne Iptables</th>
                </tr>
            </thead>
            <tbody>
                <?php $this->_managementNat->generateNatToHTML(); ?> 
            </tbody>
        </table>
        <?php
    }

}
$page = new PageGenerateRulesNat();
$page->setBreadCrumb(' Génère des règles NAT');
$page->start();

?>