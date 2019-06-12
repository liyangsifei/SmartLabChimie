<?php
require __DIR__.'/tools/cURL.php';

$poubelles_a_supp[] = isset($_POST['suppression']) ? $_POST['suppression'] : '';
var_dump($poubelles_a_supp);

foreach ($poubelles_a_supp as $p) {
	try {
		curlDelete(poubellesURL.$p);
		header('Location: index_admin.php');
	} catch(Exception $e) {
		echo("ERROR");
	}
}
/*
require 'mysql_connect.php';
foreach ($poubelles_a_supp as $p) {
	var_dump($p);
	$req_supp_poubelle = 'DELETE FROM `poubelle` WHERE ID="'.$p.'"';
	if ($connection->query($req_supp_poubelle) === TRUE) {
    	echo "Record deleted successfully";
    	header('Location: index_admin.php');
	}else {
    echo "Error deleting record: " . $connection->error;
	}
}
$connection->close();
*/


?>
