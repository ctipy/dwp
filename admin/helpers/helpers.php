<?php 
  function v_email($var, $id = null)
  {
  	require '../conexion/conexion.php';

  	if($id == null){
  		$sql = "SELECT email FROM usuarios WHERE email = '$var'";
  	} else {
  		$sql = "SELECT email FROM usuarios WHERE email = '$var' AND id != ". $id;
  	}
  	
  	$query = $connection->prepare($sql);
    $query->execute();
    $total = $query->rowCount();
    return $total;
  }
?>