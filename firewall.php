<?php

require_once (dirname(__FILE__) . '/lib/structure.php');
require_once (dirname(__FILE__) . '/lib/ManagementFirewall.php');

class PageFirewall extends Structure{
    private $_ManagementFirewall = null;

    public function __construct(){
        parent::__construct();
        $this->initializeFirewall();
        $this->setActiveLink('Règles Filtrage');

    }

    protected function buildHTMLHead() {
        parent::buildHTMLHead();
       // echo '<link rel="stylesheet" type="text/css" href="css\alias.css" media="all" />';
    }
    private function initializeFirewall() {
        $this->_ManagementFirewall = new ManagementFirewall();
        $this->_ManagementFirewall->addFirewall('nom', "10.0.0.1",22,"195.125.2.2",22,"active");
    }

    public function buildContent() {
        ?>
        <p>
            Voici la liste des règles de firewall du système :
        </p>
        <table id="myTab" class="table table-striped">
            <thead>
                <tr>
                    <th>Règle</th>
                    <th>IP Source</th>
                    <th>Port Source</th>
                    <th>IP Dest</th>
                    <th>Port Dest</th>
                    <th>State</th>

                </tr>
            </thead>
            <tbody>
                <?php $this->_ManagementFirewall->buildFirewallToHTML(); ?> 
            </tbody>
        </table>
        <?php
    }

}
$page = new PageFirewall();
$page->setBreadCrumb('Accueil');
$page->start();
/*
$ManagementFirewall = new ManagementFirewall();
$ManagementFirewall->addAlias('Refuser tout', '*', '*', '*', '*', 'DENY');
$ManagementFirewall->addAlias('Autoriser le port 22 sur le serveur Web1', '*', '*', '10.0.0.1', '22', 'ACCEPT');
$ManagementFirewall->addAlias('Autoriser le port 443 sur le serveur Web1', '*', '*', '10.0.0.1', '443', 'ACCEPT');
$ManagementFirewall->addAlias('Autoriser le port 80 sur le serveur Web1', '*', '*', ' 	10.0.0.1', '80', 'ACCEPT');
$ManagementFirewall->addAlias('Autoriser le port 22 sur le serveur Web2', '*', '*', '10.0.0.2', '22', 'ACCEPT');
$ManagementFirewall->addAlias('Autoriser le port 443 sur le serveur Web2', '*', '*', '10.0.0.2', '443', 'ACCEPT');
$ManagementFirewall->listAlias();
$ManagementFirewall->deleteAlias('Refuser tout');
echo '---------------------------------------------------------------------------------------------------------------------------------------------- <br />';
$ManagementFirewall->listAlias();
echo '---------------------------------------------------------------------------------------------------------------------------------------------- <br />';
$ManagementFirewall->updateAlias('Autoriser le port 443 sur le serveur Web2', '*', '*', '*', '*', 'DENY');
$ManagementFirewall->listAlias();
*/


?>