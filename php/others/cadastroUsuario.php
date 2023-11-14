<?php
session_start();
include('db/conexao.php');

$endereco_id = $_SESSION['endereco_id'];
$exp_id = $_SESSION['exp_id'];

echo $endereco_id;
echo "\n";
echo $exp_id;

if(isset($_POST['enviar'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $idade = $_POST['idade'];
    $periodo = $_POST['periodo'];
    $sobre = $_POST['sobre'];
    $cargo = $_POST['cargo'];

    $sql = $mysqli->prepare("INSERT INTO tb_usuario VALUES (null,?,?,?,?,?,?,?,?,?)");
    $sql->execute(array($exp_id, $endereco_id, $nome, $email, $senha, $idade, $periodo, $sobre, $cargo));

    $usuario_id = $mysqli->insert_id;
    $_SESSION['usuario_id'] = $usuario_id;
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
    <h1>USUÁRIO</h1>
  <form method="post">

    <div>
        <label for="">Nome:</label> <br>
        <input type="text" name="nome">
    </div>

    <div>
        <label for="">Email:</label> <br>
        <input type="email" name="email">
    </div>

    <div>
        <label for="">Senha:</label> <br>
        <input type="text" name="senha">
    </div>

    <div>
        <label for="">Idade:</label> <br>
        <input type="number" name="idade">
    </div>

    <div>
        <label for="">Periodo:</label> <br>
        <input type="number" name="periodo">
    </div>

    <div>
        <label for="">Sobre:</label> <br>
        <input type="text" name="sobre">
    </div>

    <div>
        <label for="">Cargo:</label> <br>
        <input type="text" name="cargo">
    </div>

    <button type="submit" name="enviar">Enviar</button>
  </form>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">