<?php

require_once("config.php");

$danielle = new Usuario();

$danielle->loadbyId(5);

echo $danielle;

//$sql = new sql();

//$usuarios = $sql->select("SELECT * FROM tb_usuarios");

//echo json_encode($usuarios);

?>