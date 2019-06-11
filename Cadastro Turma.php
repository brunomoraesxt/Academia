<?php

include "conexao.php";

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>";
echo "<link rel='stylesheet' type='text/css' href='style/style.css'>";

$sql="SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'academia' AND TABLE_NAME = 'turma'";

$resultado=mysqli_query($conn,$sql);
$consulta_resultado=mysqli_fetch_array($resultado);
$codigo_turma=$consulta_resultado[0];


?>
<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="utf-8"/>
    
    <title>Cadastro de Turma</title>

</head>

<body>

    <div id='header'>

        <h1>Sistema<span class='academia_titulo'>SCA<br>Cadastro de Turma</span></h1>    

    </div>

    <div id='conteudo'>

    <table align="center">

    <form method=post action=CadastroTurma.php>

        <tr>
            <td>Código da Turma: </td><td><?php echo $codigo_turma; ?></td>
        </tr>

        <tr>
            <td>Sexo da Turma: </td><td><select name=sexo_turma required>
                <option value=""></option>
                <option value="Ambos">Ambos</option>
                <option value="Feminina">Feminina</option>
                <option value="Masculina">Masculina</option>
                </select></td>
        </tr>

        <tr>
            <td>Código do Professor: </td><td><input type=text name=codigo_funcionario required></td>
        </tr>            

        <tr align="center">
            <td colspan="2"><br><input type=submit>
            <input type=reset></td>  
        </tr>

    </div>

    </table>

    </form>

    <div id="bottom">
    <button class='link'><a href='exibirturmas.php'>Cancelar</a></button>
    </div>

</form>

</body>

</html>