<?php include("../models/conexao.php") ?>
<?php include("blades/header.php") ?>

    <?php
    $varIda = $_GET["ida"];
    $query = mysqli_query($conexao,"SELECT * FROM alunos WHERE codigo = $varIda");
    while($exibe = mysqli_fetch_array($query)){
    ?>
    <div class='container border rounded mt-5 bg-light'>
        <form action="../controllers/atualizarAluno.php" method="post">
            <div class='row'>
                <div class='col'>
                    <input type="hidden" name="alunoCodigo" value="<?php echo $exibe[0] ?>">
                    <label class="form-label mt-5">Nome</label>
                    <input class="form-control" type="text" name="alunoNome" value="<?php echo $exibe[1] ?>"><br>
                </div>

                <div class="col">
                    <label class="form-label mt-5">Cidade</label>
                    <input class="form-control" type="text" name="alunoCidade" value="<?php echo $exibe[2] ?>"><br>
                </div>
                
            </div>

            <input type="radio" value="m" name="alunoSexo" <?php echo ($exibe[3]=="m")?"checked":""?>>
            <label class="radio-inline"> Masculino </label> <br>

            <input class="radio-inline" type="radio" value="f" name="alunoSexo" <?php echo ($exibe[3]=="f")?"checked":""?>>
            <label class="radio-inline mb-3"> Feminino </label> <br>

            <input class="btn btn-success mb-3" type="submit" value="Atualizar">
        </form>
    </div>
    <?php } ?>

<?php include("blades/footer.php") ?>