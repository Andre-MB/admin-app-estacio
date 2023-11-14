<?php
include('db/conexao.php');

if(isset($_POST['enviar'])){

    $nome = $_POST['nome_adm'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = $mysqli->prepare("INSERT INTO adm VALUES (null,?,?,?)");
    $sql->execute(array($nome, $email, $senha));
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CADASTRO</title>
</head>
<body>
    <h1>ADMINISTRADOR</h1>
  <form method="post">

    <div>
        <label for="">Nome do Administrador:</label> <br>
        <input type="text" name="nome_adm">
    </div>

    <div>
        <label for="">Email:</label> <br>
        <input type="email" name="email">
    </div>

    <div>
        <label for="">Senha:</label> <br>
        <input type="text" name="senha">
    </div>

    <button type="submit" name="enviar">Enviar</button>
  </form>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">