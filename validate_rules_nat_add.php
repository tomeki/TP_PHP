<?php

require_once (dirname(__FILE__) . '/lib/structure.php');
require_once (dirname(__FILE__) . '/lib/ManagementNAT.php');
require('/lib/pdo.php');

class PageRulesNatAdd extends Structure {
    private $_managementNat = null;

    
    public function __construct() {
        parent::__construct();
        $this->setActiveLink('Ajout règle NAT');
    }
    
    protected function buildHTMLHead() {
        parent::buildHTMLHead();
       // echo '<link rel="stylesheet" type="text/css" href="css\alias.css" media="all" />';
       echo"<meta http-equiv='refresh' content='2;URL=http://localhost/TP_PHP/rules_nat_add.php'>";
    }


    public function buildContent() {
        if(isset($_POST["name_option"]) && isset($_POST["type_option"]) && ($_POST["type_option"])!="vide" && isset($_POST["ip"]) && isset($_POST["port"])){
            $this->_managementNat = new ManagementNat();
            $this->_managementNat->addRule($_POST["name_option"],$_POST["ip"],$_POST["port"],$_POST["type_option"]);
           
        ?>
        <div class="alert alert-warning" role="alert">
        
          Votre règle a correctement été ajouté.
        </div>
        <?php
        }
        else{ ?>

            <div class="alert alert-warning" role="alert">
            <?php
            
            if(isset($_POST["name"])){
                echo"Le champ nom n'a pas été correctement rempli. \n";
            }
            if(isset($_POST["type_option"])){
                echo"Le champ type_option n'a pas été correctement renseigné. \n";
            }
            if(isset($_POST["ip"])){
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
$page = new PageRulesNatAdd();
$page->setBreadCrumb(' Formulaire d\'ajout de règles de NAT');
$page->start();

?>