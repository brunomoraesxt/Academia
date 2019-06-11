<?php

include "conexao.php";
// executa consulta

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>";
echo "<link rel='stylesheet' type='text/css' href='style/style.css'>";

$cod_fun=$_POST['codigo_funcionario'];
$sql = "SELECT * from funcionario where codigo_funcionario='$cod_fun'";
// mostra resultado
$result = mysqli_query($conn, $sql );
$linha = mysqli_fetch_assoc($result) ;

if($linha['Codigo_Funcionario']<>0){
?>
      <meta charset="utf-8"/>

      <div id='header'>

            <h1>Sistema<span class='academia_titulo'>SCA<br>Editar Dados Cadastrais</span></h1>    

      </div>

      <div id='conteudo'>

      <table align="center">

      <form method=post action=grava_altera_funcionario.php>

            <tr>
                  <td><input type=hidden name=codigo_funcionario value="<?php echo $linha['Codigo_Funcionario']; ?>">
                  Nome: </td><td><input type=text name=nome value="<?php echo $linha['nome']; ?>"></td>
            </tr>

            <tr>
                  <td>Email: </td><td><input type=text name=email value="<?php echo $linha['email']; ?>"><br></td>
            </tr>

            <tr>
                  <td>Sexo: </td><td><select name=sexo required>
                        <option value="<?php echo $linha['sexo']; ?>"><?php echo $linha['sexo']; ?></option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                  </select></td>
            </tr>

            <tr>
                  <td>Data Nascimento: </td><td><input type=date name=data_nasc value="<?php echo $linha['data_nasc']; ?>"></td>
            </tr>

            <tr>
                  <td>CPF: </td><td><input type=text name=cpf value="<?php echo $linha['CPF']; ?>"></td>
            </tr>

            <tr>
                  <td>RG: </td><td><input type=text name=rg value="<?php echo $linha['RG']; ?>"></td>
            </tr>

            <tr>
                  <td>UF Identidade: </td><td><input type=text name=uf_identidade value="<?php echo $linha['UF_Identidade']; ?>"></td>
            </tr>

            <tr>
                  <td>CREF: </td><td><input type=text name=cref value="<?php echo $linha['CREF']; ?>"></td>
            </tr>

            <tr><td colspan=2><br>Adicionais do Aluno<td></tr>

            <tr>
                  <td>Função: </td><td><input type=text name=funcao checked value="<?php echo $linha['Funcao']; ?>"></td>
            </tr>

            <tr>
                  <td>Data de Admimissão: </td><td><input type=date name=data_admissao value="<?php echo $linha['Data_Admissao']; ?>"></td>
            </tr>

            <tr>
                  <td>Data de Desligamento: </td><td><input type=date name=data_desligamento value="<?php echo $linha['Data_Desligamento']; ?>"></td>
            </tr>

            <tr>
                  <td>Salario: </td><td><input type=number step="0.01" name=salario value="<?php echo $linha['Salario']; ?>"></td>
            </tr>  

            <tr align="center">
                  <td colspan="2"><br><input type=submit value="Enviar">
                  <input type=reset value="Cancelar" onclick="window.location='exibirfuncionarios.php';"></td>
            </tr>                  
         
      </form>     

      </table>

      </div>

      <div id="bottom">
      <form method=post action=alterar_endereco_funcionario.php>
            <input type=hidden name=codigo_funcionario value="<?php echo $linha['Codigo_Funcionario']; ?>">
            <input type=submit value="Editar Endereço">
      </form>

      <form method=post action=alterar_telefone_funcionario.php>
            <input type=hidden name=codigo_funcionario value="<?php echo $linha['Codigo_Funcionario']; ?>">
            <input type=submit value="Editar Telefone">
      </form>

      <form method=post action=excluirfuncionario.php>
            <input type=hidden name=codigo_funcionario value="<?php echo $linha['Codigo_Funcionario']; ?>">
            <input type=submit value='Excluir Funcionario'>
      </form>

      </div>

<?php 
}
else{
      echo "<script type=\"text/javascript\">".
      "alert('Funcionario nao localizado!');".
      "</script>";
      echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibirfuncionarios.php'>";
}
// fecha conexao
mysqli_close($conn);

?>