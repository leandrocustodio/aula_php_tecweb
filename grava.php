<?php

  if(isset($_POST['Nome']) && isset($_POST['Email']) && isset($_POST['Senha']) && isset($_FILES["arquivo"]))
  {
    $nome = $_POST['Nome'];
    $email = $_POST['Email'];
    $senha = $_POST['Senha'];

    $dir $target_file = 'uploads/' . basename($_FILES["arquivo"]["name"]);

    if (!move_uploaded_file($_FILES["arquivo"]["tmp_name"], $dir)) {
        die 'Ocorreu um erro ao fazer upload do arquivo';
    }

    $ip = 'localhost';
    $user = 'root'
    $senha = ''
    $banco = 'tec_web_cadastro'

    mysql_connect($ip, $user, $senha) or die('Não foi possivel conectar ao banco de dados '. mysql_error());
    mysql_select_db($banco) or die("Não foi possível selecionar a base de dados => $banco". mysql_error());

    mysql_query("INSERT INTO usuario('nome', 'email', 'senha') VALUES('$nome','$email','$senha')")
      or die ('Ocorreu um erro ao inserir usuário!!');

    $resultado = "usuario adicionado com sucesso!!!!!";

}else{
  $resultado = "Os dados não foram recebidos";
}

 ?>

 <html>
   <head>
     <title>Cadastro de usuários</title>
   </head>
   <body>
     <h1><?php echo $resultado; ?></h1>
   </body>
 </html>
