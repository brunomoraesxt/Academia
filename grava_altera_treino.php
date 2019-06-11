<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";

$codigo_treino=$_POST['codigo_treino'];
$matricula_aluno=$_POST['matricula_aluno'];
$prescricao=$_POST['prescricao'];
$data_inicio=$_POST['data_inicio'];
$reavaliacao=$_POST['reavaliacao'];
$sessoes=$_POST['sessoes'];
$codigo_funcionario=$_POST['codigo_funcionario'];
$objetivo=$_POST['objetivo'];
$observacao=$_POST['observacao'];

$sql = "UPDATE treinos set prescricao='$prescricao', data_inicio='$data_inicio', reavaliacao='$reavaliacao', sessoes='$sessoes', codigo_funcionario='$codigo_funcionario',
objetivo='$objetivo', observacao='$observacao' where codigo_treino='$codigo_treino'";
$result = mysqli_query($conn, $sql ) or die(mysql_error());
$sucesso=mysqli_affected_rows($conn);

if ($sucesso==0)
{ echo "<script type=\"text/javascript\">".
    "alert('Nao encontrado.');".
    "</script>"; }
else
{ echo "<script type=\"text/javascript\">".
    "alert('Atualizado com sucesso!');".
    "</script>"; }
mysqli_close($conn);
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibirtreinos.php'>";
?>