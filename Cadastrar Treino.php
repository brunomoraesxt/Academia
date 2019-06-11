<?php

include "conexao.php";

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>";
echo "<link rel='stylesheet' type='text/css' href='style/style.css'>";

$sql="SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'academia' AND TABLE_NAME = 'treinos'";

$resultado=mysqli_query($conn,$sql);
$consulta_resultado=mysqli_fetch_array($resultado);
$codigo_treino=$consulta_resultado[0];


?>
<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="utf-8"/>
    
    <title>Cadastrar Treino</title>

</head>

<body>

    <div id='header'>

        <h1>Sistema<span class='academia_titulo'>SCA<br>Cadastrar Treino</span></h1>    

    </div>

    <div id='conteudo'>

    <table align="center">

    <form method=post action=CadastrarTreino.php>

        <tr>
            <td>Codigo do Treino: </td><td><?php echo $codigo_treino; ?></td>
        </tr>

        <tr>
            <td>Matricula do Aluno: </td><td><input type=text name=matricula_aluno required></td>
        </tr>

        <tr>
            <td>Prescrição: </td><td><input type=text name=prescricao required></td>
        </tr>

        <tr>
            <td>Data de Inicio: </td><td><input type=date name=data_inicio required></td>
        </tr>

        <tr>
            <td>Reavaliação: </td><td><input type=date name=reavaliacao></td>
        </tr>

        <tr>
            <td>Sessões: </td><td><input type=text name=sessoes required></td>
        </tr>

        <tr>
            <td>Professor: </td><td><input type=text name=codigo_funcionario required></td>
        </tr>

        <tr>
            <td>Objetivo: </td><td><select name=objetivo required>
                <option value=""></option>
                <option value="Condicionamento Fisico">Condicionamento Físico</option>
                <option value="Emagrecimento">Emagrecimento</option>
                <option value="Hipertrofia">Hipertrofia</option>
                <option value="Reabilitacao Fisica">Reabilitação Física</option>
                </select></td>
        </tr>

        <tr>
            <td>Observação: </td><td><textarea name=observacao></textarea></td>
        </tr>
    
    

    <tr align="center">
        <td colspan="2"><br><input type=submit>
        <input type=reset></td>  
    </tr>

    </div>

    </table>

    </form>

    <div id="bottom">
    <button class='link'><a href='exibirtreinos.php'>Cancelar</a></button>
    </div>
    

</body>

</html>