<?php include "./database/conexao.php"; ?>

<?php

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    

    $sql = "UPDATE usuarios SET nome='$name',sobrenome='$lastName',email='$email'
    WHERE id = '$id'";

    $rs = mysqli_query($conexao, $sql) or die("Erro ao execultar a consulta" . mysqli_error($conexao));
}
header("Location: index.php");
exit;

?>