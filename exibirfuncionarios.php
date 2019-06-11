<?php

include "conexao.php";
// executa consulta

//$nome=$_POST['nome'];
$sql = "SELECT funcionario.codigo_funcionario, funcionario.nome, endereco.bairro from funcionario inner join endereco on funcionario.codigo_funcionario=endereco.codigo_funcionario";
// mostra resultado

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>";
echo "<link rel='stylesheet' type='text/css' href='style/style.css'>";
echo "<style>
    td{
        text-align: center;
        border-bottom: 1px solid #000;
    }
    </style>";
$result = mysqli_query($conn, $sql );
echo "<div id='header'>
<h1>Sistema<span class='academia_titulo'>SCA<br>Funcionarios</span></h1>    
</div>";
echo "<div id='conteudo'>";
echo "<div id='place1'>";
echo "<table>";
echo "<tr>";
echo "<td width='150'> Codigo do Funcionario";
echo "<td width='200'> Nome";
echo "<td width='200'> Bairro";
echo "<td colspan=2 align=center> Acao";
while ( $linha = mysqli_fetch_assoc($result) ) 
{
$cod_fun=$linha['codigo_funcionario'];
echo "<tr>";
echo "<td>".$linha['codigo_funcionario'];
echo "<td>".$linha['nome'];
echo "<td>".$linha['bairro'];
echo "<td><form method=post action=alterar_funcionario.php>";
echo "<input type=hidden name=codigo_funcionario value=$cod_fun>";
echo "<input type=submit value='Editar'>";
echo "</form>";
echo "<td><form method=post action=excluirfuncionario.php>";
echo "<input type=hidden name=codigo_funcionario value=$cod_fun>";
echo "<input type=submit value='Excluir'>";
echo "</form>";
echo "</tr>";
}
echo "</table><br>";
echo "</div>";

echo "<div id='place2'>";
echo "<table>";
echo "<tr>";
echo "<td><form method=post action=alterar_funcionario.php>";
echo "Pesquisar por Codigo: <input type=text name=codigo_funcionario>";
echo "<input type=submit value='Editar'>";
echo "</form>";
echo "</table>";
echo "</div>";

echo "<div id='bottom'>";
echo "<button class='link'><a href='Cadastrar Funcionario.php'>Cadastro de Funcionario</a></button>";
echo "<button class='link'><a href='index.html'>Voltar</a></button><br><br><br>";
echo "</div>";

// fecha conexao
mysqli_close($conn);

?>