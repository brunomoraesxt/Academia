<?php

include "conexao.php";
// executa consulta
echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";
$codigo_turma=$_POST['codigo_turma'];
$matricula_aluno=$_POST['matricula_aluno'];

$sql="delete from alunos_turma where matricula_aluno='$matricula_aluno' and codigo_turma='$codigo_turma' ";

/*if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}*/

$result = mysqli_query($conn, $sql ) or die(mysql_error());
$sucesso=mysqli_affected_rows($conn);

if ($sucesso==0)
{ echo "Nao encontrado"; }
else
{ echo "<script type=\"text/javascript\">".
    "alert('Aluno removido com sucesso!');".
    "</script>"; }

// fecha conexao
mysqli_close($conn);

echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibirturmas.php'>";
?>