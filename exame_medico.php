<?php
date_default_timezone_set('America/Sao_Paulo');
include "conexao.php";
// executa consulta

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>";
echo "<link rel='stylesheet' type='text/css' href='style/style.css'>";

$matricula=$_POST['matricula'];
$sql = "SELECT * from exame_medico where matricula_Aluno='$matricula'";
// mostra resultado
$result = mysqli_query($conn, $sql );
$linha = mysqli_fetch_assoc($result) ;
?>
    <meta charset="utf-8"/>

    <div id='header'>

        <h1>Sistema<span class='academia_titulo'>SCA<br>Exame Médico</span></h1>    

    </div>

    <div id='conteudo'>

    <table align="center">

    <form method=post action=grava_altera_exame_medico.php enctype="multipart/form-data">

    <tr>
        <td><input type=hidden name=Matricula_Aluno value="<?php echo $matricula; ?>">
        Data da Realização: </td><td><input type=date name=Data_Realizacao value="<?php echo $linha['Data_Realizacao']; ?>"></td>
    </tr>

    <tr>
        <td colspan="2">Data de Vencimento: <?php 
        if(!$linha['Data_Realizacao']){
        echo "";
        }
        else{
        echo date('d/m/Y', strtotime($linha['Data_Realizacao']. ' + '.$linha['Periodicidade_Validade'].' years')); 
        }
        ?></td>
    </tr>
    
    <tr>
        <td>Periodicidade de Validade: </td><td><input type=text name=Periodicidade_Validade value="<?php echo $linha['Periodicidade_Validade']; ?>"></td>
    </tr>

    <tr>
        <td>Observação: </td><td><input type=longtext size="30" style="height: 100px" name=Observacao value="<?php echo $linha['Observacao']; ?>"></td>
    </tr>

    <tr align="center"><br>
        <td colspan="2"><input type=submit value="Enviar">
        <input type=reset value="Cancelar" onclick="window.location='exibiralunos.php';"></td>
    </tr>

    </form>
    
    </table>
    
    <div id="bottom">
    <form method=post action=excluir_exame_medico_aluno.php>
        <input type=hidden name=Matricula_Aluno value="<?php echo $matricula; ?>">
        <input type=submit value='Excluir'>
    </form>
    </div>


<?php 
// fecha conexao
mysqli_close($conn);

?>