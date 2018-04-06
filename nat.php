<?php

require_once (dirname(__FILE__) . '/lib/structure.php');
require_once (dirname(__FILE__) . '/lib/ManagementNAT.php');

class PageNat extends Structure{
private $_managementNat = null;

public function __construct(){
    parent::__construct();
    $this->initializeNat("test","10.0.0.0",12,"type");
    $this->setActiveLink('Règles NAT');

}
protected function buildHTMLHead() {
    parent::buildHTMLHead();
    //echo '<link rel="stylesheet" type="text/css" href="css\alias.css" media="all" />';
}

private function initializeNat($aNom, $anIp,$aPort,$aType) {
    $this->_managementNat = new ManagementNat();
   // $this->_managementNat->addRule($aNom, $anIp,$aPort,$aType);
    }

    public function buildContent() {
        require('/lib/pdo.php');
        ?>
        <p>
            Voici la liste des règles du système :
        </p>
        <table id="myTab" class="table table-striped">
            <thead>
                <tr>
                    <th>Règle</th>
                    <th>Adresse IP</th>
                    <th>Port</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                <?php $this->_managementNat->buildRuleToHTML();  ?>
            </tbody>
        </table>
        <?php
    }
}
$page = new PageNat();
$page->setBreadCrumb('Accueil');
$page->start();

/*
$ManagementNat->addRule('Rule le port 22 sur le serveur Web1', 'Source Rule', '10.0.0.1', '22');
$ManagementNat->addRule('Rule le port 443 sur le serveur Web1', 'Source Rule', '10.0.0.1', '443');
$ManagementNat->addRule('Rule le port 80 sur le serveur Web1', 'Dest Rule', '10.0.0.1', '80');
$ManagementNat->addRule('Rule le port 22 sur le serveur Web2', 'Source Rule', '10.0.0.2', '22');
$ManagementNat->addRule('Rule le port 443 sur le serveur Web2', 'Dest Rule', '10.0.0.2', '443');
$ManagementNat->addRule('Rule le port 80 sur le serveur Web2', 'Dest Rule', '10.0.0.2', '80');
$ManagementNat->listRule();
$ManagementNat->deleteRule('Rule le port 22 sur le serveur Web1');
echo '--------------------------------------------------------------------------------------------------------------------------- <br />';
$ManagementNat->listRule();
echo '--------------------------------------------------------------------------------------------------------------------------- <br />';
$ManagementNat->updateRule('Rule le port 80 sur le serveur Web2', 'Source Rule', '10.0.0.2', '443');
$ManagementNat->listRule();
*/


?>