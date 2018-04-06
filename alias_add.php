<?php

require_once (dirname(__FILE__) . '/lib/structure.php');
require_once (dirname(__FILE__) . '/lib/Managementalias.php');

class PageAliasAdd extends Structure {
    private $_managementAlias = null;

    
    public function __construct() {
        parent::__construct();
        $this->setActiveLink('Ajout Alias');
    }
    
    protected function buildHTMLHead() {
        parent::buildHTMLHead();
       // echo '<link rel="stylesheet" type="text/css" href="css\alias.css" media="all" />';
    }


    public function buildContent() {
        ?>
        <form action="validate_alias_add.php" method="POST" id="new_alias">
            <div class="form-group">
                <label for="formNameInput">Nom de l'alias</label>
                <input type="text" class="form-control" id="formNameInput" placeholder="Nom de l'alias" name="name">
            </div>
            <div class="form-group">
                <label for="formAdresseIPInput">Adresse IP</label>
                <input type="text" class="form-control" id="formAdresseIPInput" placeholder="Adresse IP" name="ip">
            </div>
            <div class="form-group">
                <label for="formPortInput">Port</label>
                <input type="text" class="form-control" id="formPortInput" placeholder="Port" name="port">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Ajouter l'alias</button>
        </form>
        <?php
    }

}
$page = new PageAliasAdd();
$page->setBreadCrumb(' Formulaire d\'ajout d\'alias');
$page->start();

?>