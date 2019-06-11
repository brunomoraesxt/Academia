<?php

include "conexao.php";
// executa consulta

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>";
echo "<link rel='stylesheet' type='text/css' href='style/style.css'>";

$codigo_turma=$_POST['codigo_turma'];
$sql = "SELECT * from turma where codigo_turma='$codigo_turma'";
// mostra resultado
$result = mysqli_query($conn, $sql );
$linha = mysqli_fetch_assoc($result) ;
$codigo_turma=$linha['Codigo_Turma'];

if($codigo_turma<>0){
?>
    <meta charset="utf-8"/>

    <div id='header'>

        <h1>Sistema<span class='academia_titulo'>SCA<br>Editar Turma</span></h1>    
        
    </div>
                
    <div id='conteudo'>

    <table align="center">

    <form method=post action=grava_altera_turma.php>

        <tr>
            <td><input type=hidden name=codigo_turma value="<?php echo $linha['Codigo_Turma']; ?>">
            <input type=hidden name=codigo_horario value="<?php echo$linha['Codigo_Horario']; ?>">
            Código da Turma: </td><td><?php echo $linha['Codigo_Turma']; ?></td>
        </tr>

        <tr>
            <td>Sexo da Turma: </td><td><select name=sexo_turma required>
                <option value=<?php echo $linha['Sexo']; ?>><?php echo $linha['Sexo']; ?></option>
                <option value="Ambos">Ambos</option>
                <option value="Feminina">Feminina</option>
                <option value="Masculina">Masculina</option>
            </select></td>
        </tr>

        <tr>
            <td>Código do Professor: </td><td><input type=text name=codigo_funcionario value=<?php echo $linha['Codigo_Funcionario']; ?> required></td>
        </tr>

        <tr align="center"><td colspan="2"><input type=submit value="Enviar"></td></tr>

    </form>
    
    <form method=post action=exibirturmas.php>
        <tr align="center"> <td colspan="2"><input type=submit value="Cancelar"></td></tr>
    </form>

    <form method=post action=excluir_turma.php>
        <input type=hidden name=codigo_turma value="<?php echo $linha['Codigo_Turma']; ?>">
        <input type=hidden name=codigo_horario value="<?php echo$linha['Codigo_Horario']; ?>">
        <tr align="center"> <td colspan="2"><input type=submit value='Excluir Turma'></td></tr>
    </form>

    </table>

    </div>

<?php 
}
else{
    echo "<script type=\"text/javascript\">".
    "alert('Turma nao localizada.');".
    "</script>";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='3; URL=exibirturmas.php'>";
}
// fecha conexao
mysqli_close($conn);

?>