<?php

include "conexao.php";
// executa consulta

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>";
echo "<link rel='stylesheet' type='text/css' href='style/style.css'>";
echo "<style>
    td{
        text-align: center;
        border-bottom: 1px solid #000;
    }
    </style>";
//$nome=$_POST['nome'];
$sql = "SELECT aluno.matricula, aluno.nome, treinos.objetivo, treinos.data_inicio, treinos.reavaliacao, treinos.sessoes, treinos.codigo_treino 
from aluno inner join treinos on aluno.matricula=treinos.matricula_aluno 
order by treinos.codigo_treino desc";

// mostra resultado

$result = mysqli_query($conn, $sql );
echo "<div id='header'>
<h1>Sistema<span class='academia_titulo'>SCA<br>Treinos</span></h1>    
</div>";
echo "<div id='conteudo'>";
echo "<div id='place1'>";
echo "<table align='center'>";
echo "<tr>";
echo "<td width='100'> Matricula do Aluno";
echo "<td width='150'> Nome";
echo "<td width='100'> Objetivo";
echo "<td width='100'> Data_Inicio";
echo "<td width='100'> Reavaliacao";
echo "<td width='100'> Sessoes";
echo "<td colspan=2 align=center> Acao";
while ( $linha = mysqli_fetch_assoc($result) ) 
{
$matricula=$linha['matricula'];
$codigo_treino=$linha['codigo_treino'];
echo "<tr>";
echo "<td>".$linha['matricula'];
echo "<td>".$linha['nome'];
echo "<td>".$linha['objetivo'];
echo "<td>".$linha['data_inicio'];
echo "<td>".$linha['reavaliacao'];
echo "<td>".$linha['sessoes'];
echo "<td><form method=post action=alterar_treino.php>";
echo "<input type=hidden name=codigo_treino value=$codigo_treino>";
echo "<input type=submit value='Editar'>";
echo "</form>";
echo "<td><form method=post action=excluirtreino.php>";
echo "<input type=hidden name=codigo_treino value=$codigo_treino>";
echo "<input type=submit value='Excluir'>";
echo "</form>";
echo "</tr>";
}
echo "</table><br>";
echo "</div>";

echo "<div id='place2'>";
echo "<table>";
echo "<tr>";
echo "<td><form method=post action=exibirtreinos_aluno.php>";
echo "<input type=hidden name=matricula value=$matricula>";
echo "Pesquisar por Matricula: <input type=text name=matricula required>";
echo "<input type=submit value='Editar'>";
echo "</form>";
echo "</table>";
echo "</div>";

echo "<div id='bottom'>";
echo "<button class='link'><a href='Cadastrar Treino.php'>Cadastro de Treino</a></button>";
echo "<button class='link'><a href='index.html'>Voltar</a></button><br><br><br>";

echo "</div>";

echo "</div>";

// fecha conexao
mysqli_close($conn);

?>