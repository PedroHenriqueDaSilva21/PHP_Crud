<?php
function mostrarDados()
{
    include("models/conexao.php");
    
    if (empty($_POST["buscar"])) {
        echo "Nenhum resultado";
    } else {
        $varBusca = $_POST["buscar"];

        echo "<table class='table table-dark table-striped table-bordered table-hover' border='1' width='450'><tr><td>Dados</td><td></td><td></td></tr>";

        $query = mysqli_query($conexao, "SELECT * FROM alunos WHERE nome LIKE '%$varBusca%'");
        while ($exibe = mysqli_fetch_array($query)) {
            $varSexo = ($exibe[3] == "m") ? "o" : "a";
            echo "<tr>" .
                "<td>" . strtoupper($varSexo) . " alun$varSexo <b>" . $exibe[1] . "</b> mora na cidade de " . $exibe[2] . ".</td>" .
                "<td><a class='btn btn-warning' href='views/cadastroAtualiza.php?ida=" . $exibe[0] . "'>Editar</a></td>" .
                "<td><a class='btn btn-danger' href='controllers/deletarAluno.php?ida=" . $exibe[0] . "'>Excluir</a></td>" .
                "</tr>";
        }

        echo "</table>";
    }

}
?>