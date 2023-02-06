{
  "data": [
 <?php
$FichierCSV="commande.csv";
$csv= file_get_contents($FichierCSV);
$array = array_map("str_getcsv", explode("\n", $csv));
array_shift($array);
	$DonneesAEffacer= array(1, 2, 3, 4, 5, 6, 7, 13, 14, 15);
	for ($i = 1; $i <= (count($array)-1); $i++) {
			foreach ($DonneesAEffacer as $aEffacer) {
			unset($array[$i][$aEffacer]);
			};
			if ($i === (count($array)-1)) {
				$virgule = '';
				} else {
				$virgule = ',';
					};
			$Ncommande = isset($array[$i][0]) ? $array[$i][0] : 'Pas de données';
			$Nom = isset($array[$i][9]) ? $array[$i][9] : 'Pas de données';
			$Prenom = isset($array[$i][8]) ? $array[$i][8] : 'Pas de données';
			$Telephone = isset($array[$i][12]) ? $array[$i][12] : 'Pas de données';
			 echo  '["'.$Ncommande.'","'.$Nom.'","'.$Prenom.'","'.$Telephone.'"]'.$virgule.'';
		};
		// print_r($array);
?> ]
}