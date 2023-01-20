<?php include "./database/conexao.php"; ?>
<?php
$successMessage = $errorMessage = $name = $lastName = $email = "";


if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
  


    do {
        if (empty($name) || empty($lastName) || empty($email)) {
            $errorMessage = "Preencha todos os campos. ";
            break;
        }

        // adicionar ao data base

        $sql = "INSERT INTO usuarios (nome, sobrenome, email)" .
        "VALUES('$name','$lastName','$email')";
        $result = $conexao->query($sql);
       if (!$result){
     $errorMessage = "Invalid query: " . $conexao -> error;
     break;
       }


        $name = $lastName = $email = "";

        $successMessage = "Usuario inserido com";
    
    
   echo "<script>location.href='index.php';</script>";
       exit; 
    } while (false);
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

        <form method="POST">
            <div class="form-group">
                <label for="formGroupExampleInput">Nome</label>
                <input type="text" name="name" class="form-control" id="formGroupExampleInput" value="<?php $name ?>" placeholder="Digite o nome">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Sobrenome</label>
                <input type="text" name="lastName" class="form-control" id="formGroupExampleInput2" value="<?php $lastName ?>" placeholder="Digite o sobrenome">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">E-mail</label>
                <input type="email" name="email" class="form-control" id="formGroupExampleInput2" value="<?php $email ?>" placeholder="Digite um email valido">
            </div>
            
               <br>
               <br>
                <?php
                if (!empty($successMessage)) {
                    echo "
    <div class='row mb-3'>
        <div class='offset-sm-3 col-sm-6'>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    $successMessage <strong>Sucesso!!</strong> 
    
    <button type='button' class='btn btn-outline-success' data-bs-dismiss='alert' aria-label='Close' >Fechar</button>
        </div>
    </div>
  </div>
    ";
                }

                ?>

            </div>
            <button class="btn btn-secondary" data-dismiss="modal">Voltar</button>
            <button name="submit" class="btn btn-secondary">Inserir</button>
        </form>
    </div>
</body>