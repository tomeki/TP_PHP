<?php

require (dirname(__FILE__) .'/../common/rules_filter.php');

class ManagementFirewall {

	private $_listFirewall;


	public function addFirewall($aName, $aSrcIp, $aSrcPort, $anIpDest, $aPortDest, $aState){
		$Firewall = new Rules_Filter();
		$Firewall->setName($aName);
        $Firewall->setIPSource($aSrcIp);
        $Firewall->setIPDest($anIpDest);
        $Firewall->setPortSource($aSrcPort);
        $Firewall->setPortDest($aPortDest);
        $Firewall->setState($aState);
        $this->_listFirewall[] = $Firewall;

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
        foreach ($this->_listFirewall as $Firewall) {
            ?>
            <tr>
                <td><?php echo $Firewall->getName(); ?></td>
                <td><?php echo $Firewall->getIPSource(); ?></td>
                <td><?php echo $Firewall->getPortSource(); ?></td>
				<td><?php echo $Firewall->getIPDest(); ?></td>
                <td><?php echo $Firewall->getPortDest(); ?></td>
                <td><?php echo $Firewall->getState(); ?></td>
            </tr>
            <?php  
        }
    }
}

?>