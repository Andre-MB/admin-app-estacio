<?php
session_start();
include('db/conexao.php');

if(isset($_POST['enviar'])){

    $business_name = $_POST['business_name'];
    $business_role = $_POST['business_role'];
    $start_date = $_POST['start_date'];
    $start_end = $_POST['start_end'];

    $sql = $mysqli->prepare("INSERT INTO tb_exp VALUES (null,?,?,?,?)");
    $sql->execute(array($business_name, $business_role, $start_date, $start_end));

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
        <label for="">Business name:</label> <br>
        <input type="text" name="business_name">
    </div> <br>

    <div>
        <label for="">Business role:</label> <br>
        <input type="text" name="business_role">
    </div> <br>

    <div>
        <label for="">Start date:</label> 
        <input type="date" name="start_date">
    </div> <br>

    <div>
        <label for="">Start end:</label> 
        <input type="date" name="start_end">
    </div>
    
    <button type="submit" name="enviar">Enviar</button>
  </form>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">