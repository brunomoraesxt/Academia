<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";

$sexo_turma=$_POST['sexo_turma'];
$codigo_funcionario=$_POST['codigo_funcionario'];

$select="select codigo_funcionario from funcionario where codigo_funcionario='$codigo_funcionario' and funcao='Professor' ";
$select2=mysqli_query($conn,$select);
$select3=mysqli_fetch_array($select2);
$cod_fun=$select3[0];

$sql="insert into turma (sexo, codigo_funcionario) values ('$sexo_turma','$cod_fun')";

if (!mysqli_query($conn,$sql))
{
//echo ("erro: ".mysqli_error($conn));
echo "<br>Codigo utilizado nao corresponde a nenhum professor, favor inserir valor valido.";
echo "<META HTTP-EQUIV='REFRESH' CONTENT='3; URL=exibirturmas.php'>";
}
else
{
echo "<form method=post action=Cadastrar Horario.php";
echo "<input type=hidden name=codigo_funcionario value='$cod_fun' >";
echo "</form>";
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=Cadastrar Horario.php'>";
}
mysqli_close($conn);

?>