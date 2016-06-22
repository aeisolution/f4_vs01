<?php
include('../inc/dbconfig.php');

// Includiamo JSON/PEAR
include "../libs/pear/JSON.php";
$json = new Services_JSON();

include('../models/Cliente.php');


global $connection;
$sql_query = "SELECT * FROM vClienti";
$result = $connection->query($sql_query);


  $list = array();

  while($row = $result->fetch_Array() ){
    //echo "ID = ". $row['id'] . "\n";

    $item = new Cliente;
    $item->setId($row['ID']);
    $item->setCognome($row['Cognome']);
    $item->setNome($row['Nome']);
    $item->setComuneId($row['ComuneId']);
    $item->setComune($row['Comune']);

    $list[] = $item;
  }
  //echo "Operation done successfully\n\n";
  //print_r($list);
  $connection->close();

  // WebAPI Json Response Header
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  // codifico e mostro gli articoli
  $json_string = $json->encode($list);
  //echo "JSON Encode \n\n";
  echo $json_string;
?>
