<?php include "./database/conexao.php"; ?>
<?php
$successMessage = $errorMessage = $name = $lastName = $email = "";


if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $rs = $conexao->query($sql);

    if ($rs->num_rows > 0) {

       $sqlDelete = "DELETE FROM usuarios WHERE id ='$id'";
       $rsDelete = $conexao->query($sqlDelete);

   
    } 
        header("Location: index.php");
    
}


?>