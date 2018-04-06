<?php

require_once (dirname(__FILE__).'/menu.php');

abstract class Structure {
  private $_title;
  private $_menu;
  private $_logo;
  private $_copyright;
  private $_breadCrumbTitle;

  public function __construct () {
    $this->initialize();
  }

  private function initialize() {
    $this->_title = 'IPTABLES';
    $this->_menu = new Menu();
    $this->_logo = Array(
      'title_image' => 'iptables.jpg',
      'alt' => 'Logo d\'Iptables',
      'id' => 'logo');
    $this->_copyright = 'Copyright Univ-Savoie';
    $this->_breadCrumbTitle = '';
    
    $this->_menu->addItem("Accueil", "index.php");
    $this->_menu->addItem("Alias", "alias.php");
    $this->_menu->addItem("Règles NAT", "nat.php");
    $this->_menu->addItem("Règles Filtrage", "firewall.php");
    $this->_menu->addItem("Ajout Alias", "alias_add.php");
    $this->_menu->addItem("Ajout règle NAT", "rules_nat_add.php");
    $this->_menu->addItem("Ajout règle Filtrage", "rules_filter_add.php");
    $this->_menu->addItem("Générer règle NAT", "rules_nat_generate.php");
   
  }

  private function buildTop() {
    echo '<header>';
    echo '<nav class="navbar navbar-default">';
    echo '<div class="container-fluid">';

    // Génération du Titre
    echo '
    <div class="navbar-header">
      <a class="navbar-brand" href="#">'.$this->_title.'</a>
    </div>';
    // Fin Génération du Titre

    // Génération du Menu
    echo '<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">';
    echo '<ul class="nav navbar-nav">';

    $this->_menu->buildMenu();

    echo '</ul>';

    // Génération du logo
    echo '<ul class="nav navbar-nav navbar-right">
      <li id="'.$this->_logo['id'].'"><img src="images/'.$this->_logo['title_image'].'" alt="'.$this->_logo['alt'].'" /></li>
    </ul>';

    echo '</div>';

    // Fin Génération du Menu

    echo '</div>';
    echo '</nav>';
    echo '</header>';
  }
  protected function buildHTMLHead() {
    $_bootStrapURI = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/";
    ?>
      <title><?php echo $this->_title; ?></title>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <link rel="stylesheet" type="text/css" href="css/common.css" media="all" />
      <link href="https://fonts.googleapis.com/css?family=Arsenal" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo $_bootStrapURI; ?>bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo $_bootStrapURI; ?>bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
      <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
      <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <?php
  }

  private function buildBottom() {
   ?>
   <footer>
     <nav class="navbar navbar-default navbar-yellow">
       <div class="container-fluid"><?php echo $this->_copyright; ?></div>
     </nav>
   </footer>
   <?php
  }
  
  public function setActiveLink($aLinkName) {
      $this->_menu->setActiveLink($aLinkName);
  }
  
  public function addClassLink($aLinkName, $aClass) {
      $this->_menu->addClassLink($aLinkName, $aClass);
  }
  
  public function buildContent() {
      
  }
  
  public function setBreadCrumb($aTitle) {
      $this->_breadCrumbTitle = $aTitle;
  }
  
  private function buildBreadCrumb() {
      ?>
      <ol class="breadcrumb">
          <li><?php echo $this->_breadCrumbTitle; ?></li>
      </ol>
    <?php
  }

  public function start() {
?>
<!DOCTYPE html>
<html>
<?php

    echo '<head>';
    $this->buildHTMLHead();
    echo '</head>';
    
    echo '<body>';

    $this->buildTop();
    
    echo '<section>';
    
    $this->buildBreadCrumb();
    
    echo '<div id="content">';
    $this->buildContent();
    echo '</div>';
    
    echo '</section>';
    
    $this->buildBottom();

    echo '</body>';

?>
</html>
<?php
}
}
?>
