<?php include "./database/conexao.php"; ?>

<?php
$successMessage = $errorMessage = $name = $lastName = $email = "";


if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $rs = $conexao->query($sql);

    if ($rs->num_rows > 0) {

        while ($dados = mysqli_fetch_assoc($rs)) {

            $name = $dados['nome'];
            $lastName = $dados['sobrenome'];
            $email = $dados['email'];
         
           
        }

   
    } else {
        header("Location: index.php");
    }
}


?>





<body>
    <div class="container my-5">
        <h2>Adicionar novo usuario</h2>

        <?php

        if (!empty($errorMessage)) {
            echo "
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Erro!!</strong> $errorMessage
    
    <button type='button' class='btn btn-outline-danger' data-bs-dismiss='alert' aria-label='Close' >Fechar</button>
  </div>
    ";
        }



        ?>

        <form method="POST" action="saveEdit.php">
            <div class="form-group">
                <label for="formGroupExampleInput">Nome completo</label>
                <input type="text" name="name" class="form-control" id="formGroupExampleInput" value="<?php echo $name;?>" placeholder="Digite o nome">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Sobrenome</label>
                <input type="text" name="lastName" class="form-control" id="formGroupExampleInput2" value="<?php echo $lastName ;?>" placeholder="Digite o sobrenome">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">E-mail</label>
                <input type="email" name="email" class="form-control" id="formGroupExampleInput2" value="<?php echo $email ;?>" placeholder="Digite um email valido">
            </div>
           
                <br>
                <br>
             
                <input type="hidden" name="id" value="<?php echo $id ; ?>">

            </div>
            <button class="btn btn-secondary" data-dismiss="modal">Voltar</button>
            <button name="update" class="btn btn-secondary">Atualizar</button>
        </form>
    </div>
</body>
