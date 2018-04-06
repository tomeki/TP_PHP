<?php

require_once (dirname(__FILE__) . '/lib/structure.php');
require_once (dirname(__FILE__) . '/lib/Managementalias.php');

class PageRulesFirewallAdd extends Structure {
    private $_managementAlias = null;

    
    public function __construct() {
        parent::__construct();
        $this->setActiveLink('Alias');
    }
    
    protected function buildHTMLHead() {
        parent::buildHTMLHead();
       // echo '<link rel="stylesheet" type="text/css" href="css\alias.css" media="all" />';
      echo"<meta http-equiv='refresh' content='3;URL=http://localhost/TP_PHP/alias.php'>";
    }


    public function buildContent() {
        if(isset($_POST['submit'])){
            if(isset($_POST["name"]) && isset($_POST["ip"]) && isset($_POST["port"])){
                $this->_managementAlias = new ManagementAlias();
                $this->_managementAlias->addAlias($_POST["name"],$_POST["ip"],$_POST["port"]);
            
            ?>
            <div class="alert alert-warning" role="alert">
            
            Votre alias a correctement été ajouté.
            </div>
            <?php
            }
            else{ ?>

                <div class="alert alert-warning" role="alert">
                <?php
                
                if(isset($_POST["name"])){
                    echo"Le champ nom n'a pas été correctement rempli. \n";
                }
                if(isset($_POST["state_option"])){
                    echo"Le champ d'état n'a pas été correctement renseigné. \n";
                }
                if(isset($_POST["ip_src"])){
                    echo"Le champ adresse ip source n'a pas été correctement rempli. \n";
                }
                if(isset($_POST["port_src"])){
                    echo"Le champ port source n'a pas été correctement rempli. \n";
                }
                if(isset($_POST["ip_dest"])){
                    echo"Le champ adresse ip destination n'a pas été correctement rempli. \n";
                }
                if(isset($_POST["port_dest"])){
                    echo"Le champ port destination n'a pas été correctement rempli. \n";
                }
                ?>
                </div>
            <?php
            }
        }
    }

}
$page = new PageRulesFirewallAdd();
$page->setBreadCrumb(' Formulaire d\'ajout de règles de Firewall');
$page->start();

?>