<?php

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>";
echo "<link rel='stylesheet' type='text/css' href='style/style.css'>";

include "conexao.php";
// executa consulta

$codigo_funcionario=$_POST['codigo_funcionario'];
$sql = "SELECT * from telefone where Codigo_Funcionario='$codigo_funcionario'";
// mostra resultado
$result = mysqli_query($conn, $sql );
$linha = mysqli_fetch_assoc($result) ;
?>
    <meta charset="utf-8"/>
    
    <div id='header'>

        <h1>Sistema<span class='academia_titulo'>SCA<br>Editar Telefone</span></h1>    
        
    </div>
                
    <div id='conteudo'>

    <table align="center">

    <form method=post action=grava_altera_telefone_funcionario.php>

        <tr>
            <td>Telefone: </td><td><input type=text name=telefone value="<?php echo $linha['Telefone']; ?>"></td>
        </tr>

        <tr>
            <td>Celular: </td><td><input type=text name=celular value="<?php echo $linha['celular']; ?>">
            <input type=hidden name=codigo_funcionario value="<?php echo $linha['Codigo_Funcionario']; ?>"></td>
        </tr>

        <tr align="center">
            <td colspan="2"><br><input type=submit value="Enviar">
            <input type=reset value="Cancelar" onclick="window.location='exibirfuncionarios.php';"></td>
        <tr>

    </form>

    </table>

    </div>

<?php 
// fecha conexao
mysqli_close($conn);

?>