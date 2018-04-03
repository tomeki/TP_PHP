<?php

require_once (dirname(__FILE__) . '/lib/structure.php');

class Index extends Structure {
    
    public function __construct() {
        parent::__construct();
        $this->setActiveLink('Accueil');
    }
    
    public function buildContent() {
        ?>
        <p>
          Bonjour et bienvenue sur votre interface de gestion d'Iptables
          <br />
          <br />Vous pourrez retrouver sur le site :
          <br />- La liste des alias 
          <br />- La gestion des règles Nat et Firewall
        </p>
        <div class="alert alert-warning" role="alert">

        <p class="text-info">Attention avec cette interface !</p>
        </div>
        <?php
    }
}

$page = new Index();
$page->setBreadCrumb('Accueil');
$page->start();

?>