<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";

$matricula_aluno=$_POST['matricula_aluno'];
$prescricao=$_POST['prescricao'];
$data_inicio=$_POST['data_inicio'];
$reavaliacao=$_POST['reavaliacao'];
$sessoes=$_POST['sessoes'];
$codigo_funcionario=$_POST['codigo_funcionario'];
$objetivo=$_POST['objetivo'];
$observacao=$_POST['observacao'];

$select="select codigo_funcionario from funcionario where codigo_funcionario='$codigo_funcionario' and funcao='Professor' ";
$select2=mysqli_query($conn,$select);
$select3=mysqli_fetch_array($select2);
$cod_fun=$select3[0];

$sql="insert into treinos (matricula_aluno, prescricao, data_inicio, reavaliacao, sessoes, codigo_funcionario, objetivo, observacao) 
values ('$matricula_aluno','$prescricao','$data_inicio','$reavaliacao','$sessoes','$cod_fun','$objetivo','$observacao')";
if (!mysqli_query($conn,$sql))
{
//echo ("erro: ".mysqli_error($conn));
echo "<br>Codigo utilizado nao corresponde a nenhum professor e/ou aluno, favor inserir valor valido.";
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibirtreinos.php'>";
}
else
{ echo "<script type=\"text/javascript\">".
    "alert('Inserido com sucesso!');".
    "</script>"; }

mysqli_close($conn);

echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibirtreinos.php'>";


?>