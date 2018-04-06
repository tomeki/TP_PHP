<?php

require_once (dirname(__FILE__) . '/lib/structure.php');
require_once (dirname(__FILE__) . '/lib/Managementalias.php');

class PageAliasAdd extends Structure {
    private $_managementAlias = null;

    
    public function __construct() {
        parent::__construct();
        $this->setActiveLink('Alias');
    }
    
    protected function buildHTMLHead() {
        parent::buildHTMLHead();
       // echo '<link rel="stylesheet" type="text/css" href="css\alias.css" media="all" />';
      echo"<meta http-equiv='refresh' content='2;URL=http://localhost/TP_PHP/alias.php'>";
    }


    public function buildContent() {
        if(isset($_POST['submit'])){
            if(isset($_POST["name"]) && isset($_POST["ip"]) && isset($_POST["port"])){
                $this->_managementAlias = new ManagementAlias();
                $this->_managementAlias->addAlias($_POST["ip"],$_POST["port"],$_POST["name"]);
            
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
                if(isset($_POST["ip_"])){
                    echo"Le champ adresse ip n'a pas été correctement rempli. \n";
                }
                if(isset($_POST["port"])){
                    echo"Le champ port n'a pas été correctement rempli. \n";
                }
                ?>
                </div>
            <?php
            }
        }
    }

}
$page = new PageAliasAdd();
$page->setBreadCrumb(' Formulaire d\'ajout d\'alias');
$page->start();

?>