<?php

include "conexao.php";
// executa consulta

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>";
echo "<link rel='stylesheet' type='text/css' href='style/style.css'>";

$codigo_turma=$_POST['codigo_turma'];
// mostra resultado
?>
    <meta charset="utf-8"/>

    <div id='header'>

        <h1>Sistema<span class='academia_titulo'>SCA<br>Adicionar Aluno</span></h1>    
        
    </div>
                
    <div id='conteudo'>

    <table align="center">

    <form method=post action=grava_adiconar_aluno_turma.php>
        
        <tr>
            <td><input type=hidden name=codigo_turma value="<?php echo $codigo_turma; ?>">
            Código da Turma: </td><td><?php echo $codigo_turma; ?></td>
        </tr>

        <tr>
            <td>Matricula do Aluno: </td><td><input type=text name=matricula_aluno required></td>
        </tr>
            
        <tr align="center"><td colspan="2"><input type=submit value="Enviar"></td></tr>

    </form>

    <form method=post action=exibirturmas.php>
        <tr align="center"><td colspan="2"><input type=submit value="Cancelar"></td></tr>
    </form>

    </table>

    </div>

<?php 
// fecha conexao
mysqli_close($conn);

?>