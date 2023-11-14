<?php
session_start();
include('db/conexao.php');


if(isset($_POST['enviar'])){

    $cep = $_POST['cep'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $complemento = $_POST['complemento'];
    $numero = $_POST['numero'];

    $sql = $mysqli->prepare("INSERT INTO tb_endereco VALUES (null,?,?,?,?,?,?)");
    $sql->execute(array($cep, $estado, $cidade, $bairro, $complemento, $numero));

    $endereco_id = $mysqli->insert_id;
    $_SESSION['endereco_id'] = $endereco_id;

    echo $_SESSION['endereco_id'];
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
    <h1>ENDERECO</h1>
  <form method="post">

    <div>
        <label for="">CEP:</label> <br>
        <input type="text" name="cep">
    </div>

    <div>
        <label for="">Estado:</label> <br>
        <input type="text" name="estado">
    </div>

    <div>
        <label for="">Cidade:</label> <br>
        <input type="text" name="cidade">
    </div>

    <div>
        <label for="">Bairro:</label> <br>
        <input type="text" name="bairro">
    </div>

    <div>
        <label for="">Complemento:</label> <br>
        <input type="text" name="complemento">
    </div>

    <div>
        <label for="">Numero:</label> <br>
        <input type="number" name="numero">
    </div>

    <button type="submit" name="enviar">Enviar</button>
  </form>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">