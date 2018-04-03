<?php

require (dirname(__FILE__) .'/../common/alias.php');

class ManagementAlias {

    private $_listAlias;

    public function addAlias($anIP, $aPort, $aName) {
        $Alias = new Alias();
        $Alias->setName($aName);
        $Alias->setIP($anIP);
        $Alias->setPort($aPort);
        $this->_listAlias[] = $Alias;
    }

    public function buildAliasToHTML() {
        foreach ($this->_listAlias as $Alias) {
            ?>
            <tr>
                <td><?php echo $Alias->getName(); ?></td>
                <td><?php echo $Alias->getIP(); ?></td>
                <td><?php echo $Alias->getPort(); ?></td>
            </tr>
            <?php  
        }
    }
}

?>