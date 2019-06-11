<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";

$nome=$_POST['nome'];
$email=$_POST['email'];
$sexo=$_POST['sexo'];
$data_nasc=$_POST['data_nasc'];
$cpf=$_POST['cpf'];
$rg=$_POST['rg'];
$uf_identidade=$_POST['uf_identidade'];
$cref=$_POST['cref'];
$funcao=$_POST['funcao'];
$data_admissao=$_POST['data_admissao'];
$data_desligamento=$_POST['data_desligamento'];
$salario=$_POST['salario'];

$sql="insert into funcionario (nome, email, sexo, data_nasc, cpf, rg, uf_identidade, cref, funcao, data_admissao, data_desligamento, salario)
values ('$nome','$email','$sexo','$data_nasc','$cpf','$rg','$uf_identidade','$cref','$funcao','$data_admissao','$data_desligamento','$salario')";
if (!mysqli_query($conn,$sql))
{
die ("erro: ".mysqli_error($conn));
}
else

mysqli_close($conn);

echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=Cadastrar Endereco Funcionario.html'>";
?>