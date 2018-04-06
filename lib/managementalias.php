<?php

require (dirname(__FILE__) .'/../common/alias.php');

class ManagementAlias {

    private $_listAlias;

    public function addAlias($anIP, $aPort, $aName) {
        require('pdo.php');
        $Alias = new Alias();
        $Alias->setName($aName);
        $Alias->setIP($anIP);
        $Alias->setPort($aPort);
        $this->_listAlias[] = $Alias;

        //AJOUT A LA BASE DE DONNES
        $stmt = $bdd->prepare("INSERT INTO alias (name, ip, port) VALUES (:name, :ip, :port)");
		$stmt->bindParam(':name', $aName);
		$stmt->bindParam(':ip', $anIP);
		$stmt->bindParam(':port', $aPort);
		$stmt->execute();

    }

    public function buildAliasToHTML() {
        require('pdo.php');

      //  foreach ($this->_listAlias as $Alias) {
        $resultats=$bdd->query("SELECT * FROM alias");
		while( $resultat = $resultats->fetch() )
		{
		?>
			<tr>
				<td><?php echo $resultat["name"]; ?></td>
				<td><?php echo $resultat["ip"]; ?></td>
				<td><?php echo $resultat["port"]; ?></td>
			</tr>
		<?php
		}
			//}
		$resultats->closeCursor();
             /* ?>
            <tr>
                <td><?php echo $Alias->getName(); ?></td>
                <td><?php echo $Alias->getIP(); ?></td>
                <td><?php echo $Alias->getPort(); ?></td>
            </tr>
            <?php  */
        
    }
}

?>