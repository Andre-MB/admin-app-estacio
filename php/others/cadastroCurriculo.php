<?php
session_start();
include('db/conexao.php');

$usuario_id = $_SESSION['usuario_id'];

echo $usuario_id;

if(isset($_POST['enviar'])){

    $contato = $_POST['contato'];
    $habilidades = $_POST['habilidades'];


    $sql = $mysqli->prepare("INSERT INTO tb_curriculo VALUES (null,?,?,?)");
    $sql->execute(array($usuario_id,$contato, $habilidades));

    $exp_id = $mysqli->insert_id;
    $_SESSION['exp_id'] = $exp_id;

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
    <h1>EXPERIÊNCIA</h1>
  <form method="post">

    <div>
        <label for="">Contato:</label> <br>
        <input type="text" name="contato">
    </div> <br>

    <div>
        <label for="">Habilidades:</label> <br>
        <input type="text" name="habilidades">
    </div> <br>

    <button type="submit" name="enviar">Enviar</button>
  </form>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">