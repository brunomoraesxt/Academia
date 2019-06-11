<?php

include "conexao.php";

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>";
echo "<link rel='stylesheet' type='text/css' href='style/style.css'>";

$select_turma = "SELECT codigo_turma from turma order by codigo_turma desc limit 1";
$turma = mysqli_query($conn,$select_turma);
$turma_s = mysqli_fetch_row($turma);
$codigo_turma=$turma_s[0];

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="utf-8"/>
    
    <title>Cadastro de Horário</title>

</head>

<body>

    <div id='header'>

        <h1>Sistema<span class='academia_titulo'>SCA<br>Cadastro de Turma</span></h1>    

    </div>

    <div id='conteudo'>

    <table align="center">

    <form method=post action=CadastrarHorario.php>

        <tr>
            <td>Código Turma: </td><td><input type=text name=codigo_turma readonly=true value="<?php echo $codigo_turma; ?>" required></td>
        </tr>

        <tr>
            <td>Dia da Semana: </td><td><select name=dia_semana required>
                <option value=""></option>
                <option value="Domingo">Domingo</option>
                <option value="Segunda-Feira">Segunda-Feira</option>
                <option value="Terca-Feira">Terça-Feira</option>
                <option value="Quarta-Feira">Quarta-Feira</option>
                <option value="Quinta-Feira">Quinta-Feira</option>
                <option value="Sexta-Feira">Sexta-Feira</option>
                <option value="Sabado">Sábado</option>
            </select></td>
        </tr>

        <tr>
            <td>Hora de Inicio: </td><td><input type=time name=hora_inicio required></td>
        </tr>

        <tr>
            <td>Hora de Fim: </td><td><input type=time name=hora_fim required></td>
        </tr>

        <tr align="center">
            <td colspan="2"><br><input type=submit>
            <input type=reset></td>  
        </tr>

    </div>

    </table>

    </form>

</body>

</html>