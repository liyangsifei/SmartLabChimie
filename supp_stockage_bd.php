<?php

require 'mysql_connect.php';

$stockages_a_supp[] = isset($_POST['suppression']) ? $_POST['suppression'] : '';
var_dump($stockages_a_supp);

foreach ($stockages_a_supp as $s) {
	var_dump($s);
	$req_supp_stockage = 'DELETE FROM `stockage` WHERE nom_stockage="'.$s.'"';
	if ($connection->query($req_supp_stockage) === TRUE) {
    	echo "Record deleted successfully";
    	header('Location: index_admin.php');
	}else {
    echo "Error deleting record: " . $connection->error;
	}
}

$connection->close();

?>