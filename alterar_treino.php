<?php

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>";
echo "<link rel='stylesheet' type='text/css' href='style/style.css'>";

include "conexao.php";
// executa consulta

$codigo_treino=$_POST['codigo_treino'];
$sql = "SELECT * from treinos where codigo_treino='$codigo_treino'";
// mostra resultado
$result = mysqli_query($conn, $sql );
$linha = mysqli_fetch_assoc($result) ;

if($linha['matricula_aluno']<>0){
?>
      <meta charset="utf-8"/>

      <div id='header'>

            <h1>Sistema<span class='academia_titulo'>SCA<br>Editar Treino</span></h1>    

      </div>

      <div id='conteudo'>

      <table align="center">

      <form method=post action=grava_altera_treino.php>
      
      <tr>
            <td><input type=hidden name=codigo_treino value="<?php echo $linha['codigo_treino']; ?>">
            <input type=hidden name=matricula_aluno value="<?php echo $linha['matricula_aluno']; ?>">
            Codigo do Treino: </td><td><?php echo $codigo_treino; ?></td>
      </tr>

      <tr>
            <td>Matricula do Aluno: </td><td><?php echo $linha['matricula_aluno']; ?></td>
      </tr>

      <tr>
            <td>Prescrição: </td><td><input type=text name=prescricao value="<?php echo $linha['prescricao']; ?>" required></td>
      </tr>

      <tr>
            <td>Data de Inicio: </td><td><input type=date name=data_inicio value="<?php echo $linha['data_inicio']; ?>" required></td>
      </tr>

      <tr>
            <td>Reavaliação: </td><td><input type=date name=reavaliacao value="<?php echo $linha['reavaliacao']; ?>"></td>
      </tr>

      <tr>
            <td>Sessões: </td><td><input type=text name=sessoes value="<?php echo $linha['sessoes']; ?>" required></td>
      </tr>

      <tr>
            <td>Professor: </td><td><input type=text name=codigo_funcionario value="<?php echo $linha['codigo_funcionario']; ?>" required></td>
      </tr>

      <tr>
            <td>Objetivo: </td><td><select name=objetivo required>
                  <option value="<?php echo $linha['objetivo']; ?>"><?php echo $linha['objetivo']; ?></option>
                  <option value="Condicionamento Fisico">Condicionamento Físico</option>
                  <option value="Emagrecimento">Emagrecimento</option>
                  <option value="Hipertrofia">Hipertrofia</option>
                  <option value="Reabilitacao Fisica">Reabilitação Física</option>
            </select></td>
      </tr>

      <tr>
            <td>Observação: </td><td><textarea name=observacao value="<?php echo $linha['observacao']; ?>"><?php echo $linha['observacao']; ?></textarea></td>
      </tr>

      <tr align="center">
            <td colspan="2"><br><input type=submit value="Enviar">
            <input type=reset value="Cancelar" onclick="window.location='exibirtreinos.php';"></td>
      </tr>

      </form>

      <tr align="center">
            <td colspan="2">
            <form method=post action=excluirtreino.php>
            <input type=hidden name=codigo_treino value="<?php echo $linha['codigo_treino']; ?>">
            <input type=submit value='Excluir'>
            </form
      </tr>

      </div>

      </table>

<?php 
}
else{
      echo "<script type=\"text/javascript\">".
      "alert('Aluno e/ou treino nao localizado.');".
      "</script>";
      echo "<META HTTP-EQUIV='REFRESH' CONTENT='3; URL=exibirtreinos.php'>";
}
// fecha conexao
mysqli_close($conn);

?>