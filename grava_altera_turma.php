<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";

$codigo_turma=$_POST['codigo_turma'];
$codigo_horario=$_POST['codigo_horario'];
$sexo=$_POST['sexo_turma'];
$codigo_funcionario=$_POST['codigo_funcionario'];

$select="select codigo_funcionario from funcionario where codigo_funcionario='$codigo_funcionario' and funcao='Professor' ";
$select2=mysqli_query($conn,$select);
$select3=mysqli_fetch_array($select2);
$cod_fun=$select3[0];

$sql = "update turma set Sexo='$sexo', Codigo_Funcionario='$cod_fun' where Codigo_Turma='$codigo_turma' and Codigo_Horario='$codigo_horario' ";
$result = mysqli_query($conn, $sql );
$sucesso=mysqli_affected_rows($conn);

if (mysqli_query($conn, $sql)) {
    echo "<script type=\"text/javascript\">".
    "alert('Atualizado com sucesso!');".
    "</script>";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibirturmas.php'>";
} else {
    //echo "Error deleting record: " . mysqli_error($conn);
    echo "<script type=\"text/javascript\">".
    "alert('Codigo utilizado nao corresponde a nenhum professor, favor inserir valor valido.');".
    "</script>";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibirturmas.php'>";
}

mysqli_close($conn);

?>