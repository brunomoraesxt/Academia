<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";

$periodicidade=$_POST['Periodicidade_Validade'];   
$data_realizacao=$_POST['Data_Realizacao'];
$matricula_aluno=$_POST['Matricula_Aluno'];
$observacao=$_POST['Observacao'];

$consulta = "select Matricula_Aluno from exame_medico where Matricula_Aluno='$matricula_aluno'";
$resultado=mysqli_query($conn,$consulta);;

$consulta_resultado=mysqli_num_rows($resultado);

if (!$consulta_resultado)
    {
    $sql = "insert into exame_medico (Periodicidade_Validade, Data_Realizacao, Matricula_Aluno, Observacao) values ('$periodicidade','$data_realizacao','$matricula_aluno','$observacao')";
    $resultado = mysqli_query($conn, $sql) or die(mysql_error());
    $sucesso=mysqli_affected_rows($conn);
    echo "<script type=\"text/javascript\">".
    "alert('Inserido com sucesso!');".
    "</script>"; 
}
else{
    $sql2 = "update exame_medico set Periodicidade_Validade='$periodicidade', Data_Realizacao='$data_realizacao', Observacao='$observacao' where Matricula_Aluno ='$matricula_aluno'";
    $resultado = mysqli_query($conn, $sql2) or die(mysql_error());
    $sucesso=mysqli_affected_rows($conn);
    echo "<script type=\"text/javascript\">".
    "alert('Atualizado com sucesso!');".
    "</script>"; 
}
/*
*/

mysqli_close($conn);
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibiralunos.php'>";
?>