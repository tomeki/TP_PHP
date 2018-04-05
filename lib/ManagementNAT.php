<?php

require (dirname(__FILE__) .'/../common/rules_nat.php');


class ManagementNat {

	private $_listRule;

	public function addRule($aName,$anIp,$aPort,$aType){
		
		$Rule = new Rule_Nat();
        $Rule->setName($aName);
        $Rule->setIP($anIp);
		$Rule->setPort($aPort);
		$Rule->setType($aType);
		$this->_listRule[] = $Rule;

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
        foreach ($this->_listRule as $rule) {
            ?>
            <tr>
                <td><?php echo $rule->getName(); ?></td>
                <td><?php echo $rule->getIP(); ?></td>
                <td><?php echo $rule->getPort(); ?></td>
				<td><?php echo $rule->getType(); ?></td>
            </tr>
            <?php  
        }
    }
}

?>