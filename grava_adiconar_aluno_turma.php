<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";
// executa consulta

$codigo_turma=$_POST['codigo_turma'];
$matricula_aluno=$_POST['matricula_aluno'];
// mostra resultado

$sql="INSERT INTO alunos_turma (Codigo_Turma, Matricula_Aluno) VALUES ('$codigo_turma', '$matricula_aluno') ";
if (!mysqli_query($conn,$sql)){ 

    echo "<script type=\"text/javascript\">".
    "alert('Aluno ja cadastrado nessa turma e/ou o aluno ainda nao foi cadastrado no sistema.');".
    "</script>";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibirturmas.php'>";

}
else{

    echo "<script type=\"text/javascript\">".
    "alert('Aluno adicionado com sucesso!');".
    "</script>";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibirturmas.php'>";
}

mysqli_close($conn);

?>