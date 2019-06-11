<?php

require 'mysql_connect.php';

$poubelles_a_supp[] = isset($_POST['suppression']) ? $_POST['suppression'] : '';
var_dump($poubelles_a_supp);

foreach ($poubelles_a_supp as $p) {
	var_dump($p);
	$req_supp_poubelle = 'DELETE FROM `poubelle` WHERE nom="'.$p.'"';
	if ($connection->query($req_supp_poubelle) === TRUE) {
    	echo "Record deleted successfully";
    	header('Location: index_admin.php');
	}else {
    echo "Error deleting record: " . $connection->error;
	}
}

$connection->close();

?>