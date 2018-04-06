<?php

require_once (dirname(__FILE__) . '/lib/structure.php');
require_once (dirname(__FILE__) . '/lib/ManagementNAT.php');

class PageRulesNatAdd extends Structure {
    private $_managementNat = null;

    
    public function __construct() {
        parent::__construct();
        $this->setActiveLink('Ajout règle NAT');
    }
    
    protected function buildHTMLHead() {
        parent::buildHTMLHead();
       // echo '<link rel="stylesheet" type="text/css" href="css\alias.css" media="all" />';
    }


    public function buildContent() {
        ?>
        <div class="alert alert-warning" role="alert">
          Attention à la règle que vous ajoutez !
        </div>
       <form action="validate_rules_nat_add.php" method="POST" id="new_nat">
          <div class="form-group">
            <label for="formNameInput">Nom de la règle</label>
            <input type="text" class="form-control" id="formNameInput" placeholder="Nom de la règle de Nat" name="name">
          </div>
          <div class="form-group">
            <label for="formTypeSelect">Type</label><br>
            <select id="formTypeSelect" class="form-control" form="new_nat" name="type_option">
            <option value="vide">----</option>
              <option value="Source NAT">Source NAT</option>
              <option value="Destination NAT">Destination NAT</option>
            </select>
          </div>
          <div class="form-group">
            <label for="formAdresseIPInput">Adresse IP</label>
            <input type="text" class="form-control" id="formAdresseIPInput" placeholder="Adresse IP" name="ip">
          </div>
          <div class="form-group">
            <label for="formPortInput">Port</label>
            <input type="text" class="form-control" id="formPortInput" placeholder="Port" name="port">
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Ajouter la règle</button>
        </form>
        <?php
    }

}
$page = new PageRulesNatAdd();
$page->setBreadCrumb(' Formulaire d\'ajout de règles de NAT');
$page->start();

?>