<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";
// executa consulta

$select_codfun = "SELECT codigo_funcionario from funcionario order by codigo_funcionario desc limit 1";
$cod_fun = mysqli_query($conn,$select_codfun);
$cod_fun_s = mysqli_fetch_row($cod_fun);
$codigo_funcionario=$cod_fun_s[0];

$endereco=$_POST['endereco'];
$bairro=$_POST['bairro'];
$cep=$_POST['cep'];
$cidade=$_POST['cidade'];
$uf=$_POST['uf'];

$sql="insert into endereco (endereco, bairro, cep, cidade, uf, codigo_funcionario) 
values ('$endereco','$bairro','$cep','$cidade','$uf','$codigo_funcionario')";
if (!mysqli_query($conn,$sql))
{
die ("erro: ".mysqli_error($conn));
}
else

// fecha conexao
mysqli_close($conn);

echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=Cadastrar Telefone Funcionario.html'>";
?>