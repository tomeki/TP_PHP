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
		$stmt = $bdd->prepare("INSERT INTO nat (id_alias, name, ip, port, type) VALUES (:id_alias, :name, :ip, :port, :type)");
		$request = $bdd->prepare("SELECT * FROM alias where name = ?");
		if ($request->execute(array($aName))) {
  			while ($row = $request->fetch()) {
				$stmt->bindParam(':id_alias', $row["idAlias"]);
  			}
		}
		$request->bindParam(':name_select', $aName);
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
		$resultats->closeCursor();
	}
	
	public function generateNatToHTML() {
		require('pdo.php');
		$resultats=$bdd->query("SELECT * FROM nat");
		while( $resultat = $resultats->fetch() )
		{ ?>
		<tr>
		<?php
			if($resultat["type"]=="Source NAT"){
				?>
					<td><?php echo $resultat["name"] ?></td>
					<td><?php echo $resultat["type"] ?></td>
					<td><?php echo" iptables -t nat -A POSTROUTING -s ".$resultat['ip']." -p tcp -o eth0 -j SNAT --to: 195.115.90.1:".$resultat['port']; ?>
					
					</td>
				<?php
			}else {
				?>
				<td><?php echo $resultat["name"] ?></td>
				<td><?php echo $resultat["type"] ?></td>
				<td><?php echo" iptables -t nat -A PREROUTING -d 195.115.90.1 -p tcp --dport 80 -i eth0 -j DNAT --to ".$resultat['ip'].":".$resultat["port"]; ?>
				</td>
				<?php
			}
		?>
		</tr>
		<?php
		}
		$resultats->closeCursor();
	}

}

?>