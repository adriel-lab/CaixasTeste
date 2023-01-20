<?php include "./database/conexao.php"; ?>

<a class="btn btn-secondary" href="create.php" role="button">Adicionar novo usuario</a>

<div >
       
            <table id="example"  >
                <thead >
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">E-mail</th>
                    
                    </tr>
                </thead>
                <tbody>



                    <?php



                    $sql = "SELECT * FROM usuarios";
                    $rs = mysqli_query($conexao, $sql) or die("Erro ao execultar a consulta" . mysqli_error($conexao));
                    while ($dados = mysqli_fetch_assoc($rs)) {


                    ?>
                        <tr>
                            <td vertical-align:top><?php echo $dados["id"]       ?></td>
                            <td vertical-align:top><?php echo $dados["nome"]     ?></td>
                            <td vertical-align:top><?php echo $dados["sobrenome"]    ?></td>
                            <td vertical-align:top><?php echo $dados['email'] ?></td>
                        
                            <td vertical-align:top>
                            <div class="btn-group" role="group" aria-label="Basic example">
                            <?php echo "  <a class='btn btn-primary' href='edit.php?id=$dados[id] ' > Editar </a>" ?>
                            <?php echo "  <a class='btn btn-danger' href='delete.php?id=$dados[id] ' > Apagar </a>" ?>

                                
                                    
                                    
                                </div>

                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>


   
    </div>