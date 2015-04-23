<?php

if(!isset($_POST['email']) || !isset($_POST['senha']))
{
  redirect
}
  var $email = $_POST['email'];
  var $senha = $_POST['senha'];

  $ip = 'localhost';
  $user = 'root'
  $senha = ''
  $banco = 'tec_web_cadastro'

  mysql_connect($ip, $user, $senha) or die('Não foi possivel conectar ao banco de dados '. mysql_error());
  mysql_select_db($banco) or die("Não foi possível selecionar a base de dados => $banco". mysql_error());

  $usuario = mysql_query("SELECT * FROM usuario WHERE email = '$email' and senha ='$senha'")
    or die ('Ocorreu um erro ao inserir usuário!!');

  session_start();
  $_SESSION['usuario'] = $usuario['usuario'];

?>

<html>
  <head>
    <title></title>
  </head>
  <body>
    <?php $_SESSION['usuario'] ?>
  </body>
</html>
