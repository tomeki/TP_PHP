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
        <button  type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Ajouter un alias</button>
            
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajout d'un alias</h4>
      </div>
      <div class="modal-body">
        <form action="validate_alias_add.php" method="POST" id="new_alias">
            <div class="form-group">
                <label for="formNameInput">Nom de l'alias</label>
                <input type="text" class="form-control" id="formNameInput" placeholder="Nom d'alias" name="name">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
      </div>
    </div>

  </div>
</div>
        <?php
    }

}
$page = new PageAlias();
$page->setBreadCrumb('Accueil');
$page->start();

?>