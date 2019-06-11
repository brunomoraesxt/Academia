<?php

include "conexao.php";
// executa consulta

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>";
echo "<link rel='stylesheet' type='text/css' href='style/style.css'>";

$cod_fun=$_POST['codigo_funcionario'];
$sql = "SELECT * from endereco where codigo_funcionario='$cod_fun'";
// mostra resultado
$result = mysqli_query($conn, $sql );
$linha = mysqli_fetch_assoc($result) ;
?>
    <meta charset="utf-8"/>
    <div id='header'>

        <h1>Sistema<span class='academia_titulo'>SCA<br>Editar Endereço</span></h1>    

    </div>

    <div id='conteudo'>

    <table align="center">

    <form method=post action=grava_altera_endereco_funcionario.php>

        <tr>
            <td>Endereço: </td><td><input type=text name=endereco value="<?php echo $linha['endereco']; ?>"></td>
        </tr>
    
        <tr>
            <td>Bairro: </td><td><input type=text name=bairro value="<?php echo $linha['bairro']; ?>"></td>
        </tr>

        <tr>
            <td>CEP: </td><td><input type=text name=cep value="<?php echo $linha['CEP']; ?>"></td>
        </tr>

        <tr>
            <td>Cidade: </td><td><input type=text name=cidade value="<?php echo $linha['Cidade']; ?>"></td>
        </tr>

        <tr>
            <td>UF: </td><td><input type=text name=uf value="<?php echo $linha['UF']; ?>">   
            <input type=hidden name=codigo_funcionario value="<?php echo $linha['Codigo_Funcionario']; ?>"></td>
        </tr>            
            
        <tr align="center">
            <td colspan="2"><br><input type=submit value="Enviar">
            <input type=reset value="Cancelar" onclick="window.location='exibirfuncionarios.php';"></td>
        </tr>

    </table>

    </div>

    </form>

<?php 
// fecha conexao
mysqli_close($conn);

?>