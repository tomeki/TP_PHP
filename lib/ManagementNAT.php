<?php

require (dirname(__FILE__) .'/../common/rules_nat.php');


class ManagementNat {

	private $_listRule;

	public function addRule($aName,$anIp,$aPort,$aType){
		require('pdo.php');
		$Rule = new Rule_Nat();
        $Rule->setName($aName);
        $Rule->setIP($anIp);
		$Rule->setPort($aPort);
		$Rule->setType($aType);
		$this->_listRule[] = $Rule;
		
		//AJOUT A LA BASE DE DONNES
		$stmt = $bdd->prepare("INSERT INTO nat (name, ip, port,type) VALUES (:name, :ip, :port, :type)");
		$stmt->bindParam(':name', $aName);
		$stmt->bindParam(':ip', $anIp);
		$stmt->bindParam(':port', $aPort);
		$stmt->bindParam(':type', $aType);
		$stmt->execute();

	}

	public function deleteRule($aName) {
		$key = array_search($aName, $this->_listRule);
		unset($this->_listRule[$key]);
	}

	public function updateRule($aName, $aType, $anIp, $aPort) {
		foreach ($this->_listRule as $rule) {
			if ($rule->getName() == $aName) {
				if (($rule->getType() != $aType) && isset($aType))
					$rule->setType($aType);
				if (($rule->getIp() != $anIp) && isset($anIp))
					$rule->setIp($anIp);
				if (($rule->getPort() != $aPort) && isset($aPort))
					$rule->setPort($aPort);		
			}
		}
	}


	public function buildRuleToHTML() {
		require('pdo.php');
       // foreach ($this->_listRule as $rule) {
		$resultats=$bdd->query("SELECT * FROM nat");
		while( $resultat = $resultats->fetch() )
		{
		?>
			<tr>
				<td><?php echo $resultat["name"]; ?></td>
				<td><?php echo $resultat["ip"]; ?></td>
				<td><?php echo $resultat["port"]; ?></td>
				<td><?php echo $resultat["type"]; ?></td>
			</tr>
		<?php
		}
			//}
		$resultats->closeCursor();
           /* ?>
            <tr>
			
                <td><?php echo $rule->getName(); ?></td>
                <td><?php echo $rule->getIP(); ?></td>
                <td><?php echo $rule->getPort(); ?></td>
				<td><?php echo $rule->getType(); ?></td>
            </tr>
            <?php  */
        
    }
}

?>