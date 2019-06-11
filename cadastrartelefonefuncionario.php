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

$telefone=$_POST['telefone'];
$celular=$_POST['celular'];


$sql="insert into telefone (Telefone, celular, Codigo_Funcionario) 
values ('$telefone', '$celular', '$codigo_funcionario')";
if (!mysqli_query($conn,$sql))
{
die ("erro: ".mysqli_error($conn));
}
else
{ echo "<script type=\"text/javascript\">".
    "alert('Funcionario registrado com sucesso!');".
    "</script>"; }

// fecha conexao
mysqli_close($conn);

echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibirfuncionarios.php'>";
?>