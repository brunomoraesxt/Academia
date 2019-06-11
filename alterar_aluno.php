<?php

include "conexao.php";
// executa consulta

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>";
echo "<link rel='stylesheet' type='text/css' href='style/style.css'>";

$matricula=$_POST['matricula'];
$sql = "SELECT * from aluno where matricula='$matricula'";
// mostra resultado
$result = mysqli_query($conn, $sql );
$linha = mysqli_fetch_assoc($result) ;

if($linha['Matricula']<>0){
?>
      <meta charset="utf-8"/>

      <div id='header'>

            <h1>Sistema<span class='academia_titulo'>SCA<br>Editar Dados Cadastrais</span></h1>    

      </div>

      <div id='conteudo'>

      <table align="center">

      <form method=post action=grava_altera_aluno.php>

            <tr>
                  <input type=hidden name=matricula value="<?php echo $linha['Matricula']; ?>">
                  <td>Nome: </td><td><input type=text name=nome required value="<?php echo $linha['nome']; ?>"></td>
            </tr>
            <tr>
                  <td>Email: </td><td><input type=email name=email required value="<?php echo $linha['email']; ?>"></td>
            </tr>
            <tr>
                  <td>Sexo: </td><td><select name=sexo required>
                        <option value="<?php echo $linha['sexo']; ?>"><?php echo $linha['sexo']; ?></option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                  </select></td>
            </tr>
            <tr>
                  <td>Data Nascimento: </td><td><input type=date name=data_nasc required value="<?php echo $linha['data_nasc']; ?>"></td>
            </tr>
            <tr>
                  <td>CPF: </td><td><input type=text name=cpf required value="<?php echo $linha['CPF']; ?>"></td>
            </tr>
            <tr>
                  <td>RG: </td><td><input type=text name=rg required value="<?php echo $linha['RG']; ?>"></td>
            </tr>
            <tr>
                  <td>UF Identidade: </td><td><input type=text name=uf_identidade required value="<?php echo $linha['UF_Identidade']; ?>"></td>
            </tr>

            <tr><td colspan=2><br>Adicionais do Aluno<td></tr>

            <tr>

                  <td>Estado Civil: </td><td><select name=estado_civil>
                        <option value="<?php echo $linha['Estado_civil']; ?>"><?php echo $linha['Estado_civil']; ?></option>
                        <option value="Solteiro">Solteiro</option>
                        <option value="Casado">Casado</option>
                        <option value="Separado">Separado</option>
                        <option value="Divorciado">Divorciado</option>
                        <option value="Viuvo">Viúvo</option>
                        <option value="Amasiado">Amasiado</option>
                  </select></td>
            </tr>
            <tr>
                  <td>Objetivo: </td><td><input type=text name=objetivo value="<?php echo $linha['Objetivo']; ?>"></td>
            </tr>
            <tr>
                  <td>Profissão: </td><td><input type=text name=profissao value="<?php echo $linha['Profissao']; ?>"></td>
            </tr>

            <tr align="center">
                  <td colspan=2><br><input type=submit value="Enviar">
                  <input type=reset value="Cancelar" onclick="window.location='exibiralunos.php';"></td>
            </tr>

      </form>

      </table>

      </div>

      <div id="bottom">
      <form method=post action=alterar_endereco_aluno.php>
            <input type=hidden name=matricula value="<?php echo $linha['Matricula']; ?>">
            <input type=submit value="Editar Endereço">
      </form>

      <form method=post action=alterar_telefone_aluno.php>
            <input type=hidden name=matricula value="<?php echo $linha['Matricula']; ?>">
            <input type=submit value="Editar Telefone">
      </form>

      <form method=post action=exame_medico.php>
            <input type=hidden name=matricula value="<?php echo $linha['Matricula']; ?>">
            <input type=submit value="Exame Médico">
      </form>

      <form method=post action=avaliacao_fisica.php>
            <input type=hidden name=matricula value="<?php echo $linha['Matricula']; ?>">
            <input type=submit value="Avaliação Física">
      </form>

      <form method=post action=excluiraluno.php>
            <input type=hidden name=matricula value="<?php echo $linha['Matricula']; ?>">
            <input type=submit value='Excluir Aluno'>
      </form>

      </div>
<?php 
}
else{
      echo "<script type=\"text/javascript\">".
      "alert('Aluno nao localizado!');".
      "</script>";
      echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibiralunos.php'>";
}
// fecha conexao
mysqli_close($conn);

?>