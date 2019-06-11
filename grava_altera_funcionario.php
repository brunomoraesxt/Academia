<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";

$codigo_funcionario=$_POST['codigo_funcionario'];
$nome=$_POST['nome'];
$email=$_POST['email'];
$sexo=$_POST['sexo'];
$data_nasc=$_POST['data_nasc'];
$cpf=$_POST['cpf'];
$rg=$_POST['rg'];
$uf_identidade=$_POST['uf_identidade'];
$cref=$_POST['cref'];
$funcao=$_POST['funcao'];
$data_adm=$_POST['data_admissao'];
$data_desl=$_POST['data_desligamento'];
$salario=$_POST['salario'];

$sql = "update funcionario set nome='$nome', email='$email', sexo='$sexo', data_nasc='$data_nasc', cpf='$cpf', rg='$rg', uf_identidade='$uf_identidade', 
cref='$cref', funcao='$funcao', data_admissao='$data_adm', data_desligamento='$data_desl', salario='$salario' where codigo_funcionario='$codigo_funcionario' ";
$result = mysqli_query($conn, $sql ) or die(mysql_error());
$sucesso=mysqli_affected_rows($conn);

if ($sucesso==0)
{ echo "<script type=\"text/javascript\">".
    "alert('Nao encontrado');".
    "</script>"; }
else
{ echo "<script type=\"text/javascript\">".
    "alert('Atualizado com sucesso!');".
    "</script>"; }
mysqli_close($conn);
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibirfuncionarios.php'>";
?>