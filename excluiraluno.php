<?php

echo "<style> body{
    background-color:#F0F8FF; 
}
</style>";

include "conexao.php";
// executa consulta

$matricula=$_POST['matricula'];

$sql="delete from aluno where matricula='$matricula' ";

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
    "alert('Removido com sucesso!');".
    "</script>"; }

// fecha conexao
mysqli_close($conn);

echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=exibiralunos.php'>";
?>