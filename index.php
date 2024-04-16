<?php

require_once("config.php");
//carrega um usuario
//$danielle = new Usuario();
//$danielle->loadbyId(5);
//echo $danielle;
//$sql = new sql();
//$usuarios = $sql->select("SELECT * FROM tb_usuarios");
//echo json_encode($usuarios);

//carrega uma lista de usuarios
//$lista = Usuario::getList();
//echo json_encode($lista);

//carrega uma lista de usuarios buscando pelo login
//$search = Usuario::search("fla");
//echo json_encode($search);

//carrega um usuario usando o login e a senha
$usuario = new Usuario();
$usuario->login("danielle", "270898");

echo $usuario;
?>