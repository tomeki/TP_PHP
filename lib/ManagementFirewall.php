<?php

require (dirname(__FILE__) .'/../common/rules_filter.php');

class ManagementFirewall {

	private $_listFirewall;


	public function addFirewall($aName, $aSrcIp, $aSrcPort, $anIpDest, $aPortDest, $aState){
		require('pdo.php');
		$Firewall = new Rules_Filter();
		$Firewall->setName($aName);
        $Firewall->setIPSource($aSrcIp);
        $Firewall->setIPDest($anIpDest);
        $Firewall->setPortSource($aSrcPort);
        $Firewall->setPortDest($aPortDest);
        $Firewall->setState($aState);
		$this->_listFirewall[] = $Firewall;

		//AJOUT A LA BASE DE DONNES
		$stmt = $bdd->prepare("INSERT INTO firewall (name, ip_src, port_src, ip_dest, port_dest, state) VALUES (:aName, :aSrcIp, :aSrcPort, :anIpDest, :aPortDest, :aState)");
		$stmt->bindParam(':aName', $aName);
		$stmt->bindParam(':aSrcIp', $aSrcIp);
		$stmt->bindParam(':aSrcPort', $aSrcPort);
		$stmt->bindParam(':anIpDest', $anIpDest);
		$stmt->bindParam(':aPortDest', $aPortDest);
		$stmt->bindParam(':aState', $aState);
		$stmt->execute();

	}

	public function deleteFirewall($aName) {
		$key = array_search($aName, $this->_listAlias);
		unset($this->_listFirewall[$key]);
	}

	public function updateFirewall($aName, $aSrcIp, $aSrcPort, $anIpDest, $aPortDest, $aState) {
		foreach ($this->_listFirewall as $firewall) {
			if ($firewall->getName() == $aName) {
				if (($firewall->getIPSource() != $aSrcIp) && isset($aSrcIp))
					$firewall->setIPSource($aSrcIp);
				if (($firewall->getPortSource() != $aSrcPort) && isset($aSrcPort))
					$firewall->setPortSource($aSrcPort);
				if (($firewall->getIPDest() != $anIpDest) && isset($anIpDest))
					$firewall->setIPDest($anIpDest);
				if (($firewall->getPortDest() != $aPortDest) && isset($aPortDest))
					$firewall->setPortDest($aPortDest);
				if (($firewall->getState() != $aState) && isset($aState))
					$firewall->setState($aState);
			}
		}
	}

	/*public function listFirewall() {
		foreach ($this->_listFirewall as $firewall) {
			echo "Nom : " . $firewall->getName() . " | Adresse IP Source : " . $firewall->getSrcIp() . " | Port Source : " . $firewall->getSrcPort() . " | Adresse IP de Destination : " . $firewall->getIpDest() . " | Port de Destination : " . $firewall->getPortDest() . " | Etat : " . $firewall->getState() . "<br />";
		}
	}*/

	public function buildFirewallToHTML() {

		require('pdo.php');
        //foreach ($this->_listFirewall as $Firewall) {
		$resultats=$bdd->query("SELECT * FROM firewall");
		while( $resultat = $resultats->fetch() )
		{
		?>
		
			<tr>
				<td><?php echo $resultat["name"]; ?></td>
				<td><?php echo $resultat["ip_src"]; ?></td>
				<td><?php echo $resultat["port_src"]; ?></td>
				<td><?php echo $resultat["ip_dest"]; ?></td>
				<td><?php echo $resultat["port_dest"]; ?></td>
				<td><?php echo $resultat["state"]; ?></td>
			</tr>
		<?php
		}
		$resultats->closeCursor();
		/*
            <tr>
                <td><?php echo $Firewall->getName(); ?></td>
                <td><?php echo $Firewall->getIPSource(); ?></td>
                <td><?php echo $Firewall->getPortSource(); ?></td>
				<td><?php echo $Firewall->getIPDest(); ?></td>
                <td><?php echo $Firewall->getPortDest(); ?></td>
                <td><?php echo $Firewall->getState(); ?></td>
            </tr> */?>
            <?php  
        
	}
}

?>