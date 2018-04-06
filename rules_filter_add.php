<?php

require_once (dirname(__FILE__) . '/lib/structure.php');
require_once (dirname(__FILE__) . '/lib/ManagementFIREWALL.php');

class PageRulesFirewallAdd extends Structure {
    private $_managementFirewall = null;

    
    public function __construct() {
        parent::__construct();
        $this->setActiveLink('Ajout règle Filtrage');
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
       <form action="validate_rules_filter_add.php" method="POST" id="new_filter">
          <div class="form-group">
            <label for="formNameInput">Nom de la règle</label>
            <input type="text" class="form-control" id="formNameInput" placeholder="Nom de la règle de Filtrage" name="name">
          </div>
          <div class="form-group">
            <label for="formTypeSelect">Etat</label><br>
            <select id="formTypeSelect" class="form-control" form="new_filter" name="state_option">
            <option value="vide">----</option>
              <option value="Actif">Actif</option>
              <option value="Innactif">Inactif</option>
            </select>
          </div>
          <div class="form-group">
            <label for="formAdresseIPInput">Adresse IP Source</label>
            <input type="text" class="form-control" id="formAdresseIPInput" placeholder="Adresse IP Source" name="ip_src">
          </div>
          <div class="form-group">
            <label for="formPortInput">Port Source</label>
            <input type="text" class="form-control" id="formPortInput" placeholder="Port Source" name="port_src">
          </div>
          <div class="form-group">
            <label for="formAdresseIPInput">Adresse IP Destination</label>
            <input type="text" class="form-control" id="formAdresseIPInput" placeholder="Adresse IP Destination" name="ip_dest">
          </div>
          <div class="form-group">
            <label for="formPortInput">Port Destination</label>
            <input type="text" class="form-control" id="formPortInput" placeholder="Port Destination" name="port_dest">
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Ajouter la règle</button>
        </form>
        <?php
    }

}
$page = new PageRulesFirewallAdd();
$page->setBreadCrumb(' Formulaire d\'ajout de règles de filtrage');
$page->start();

?>