<?php

echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>";
echo "<link rel='stylesheet' type='text/css' href='style/style.css'>";

include "conexao.php";

$sql="SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'academia' AND TABLE_NAME = 'funcionario'";

$resultado=mysqli_query($conn,$sql);
$consulta_resultado=mysqli_fetch_array($resultado);
$codigo_funcionario=$consulta_resultado[0];


?>
<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="utf-8"/>
    
    <title>Cadastrar Funcionario</title>

</head>

<body>
    
    <div id='header'>

        <h1>Sistema<span class='academia_titulo'>SCA<br>Cadastro de Funcionários</span></h1>    

    </div>

    <div id='conteudo'>

    <table align="center">

    <form method=post action=CadastrarFuncionario.php>

        <tr>
            <td>Codigo do Funcionário: </td><td><?php echo $codigo_funcionario; ?></td>
        </tr>

        <tr>
            <td>Nome: </td><td><input type=text name=nome required></td>
        </tr>

        <tr>
            <td>Email: </td><td><input type=email name=email required></td>
        </tr>

        <tr>
            <td>Sexo: </td><td><select name=sexo required>
                <option value=""></option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select></td>
        </tr>

        <tr>
            <td>Data Nascimento: </td><td><input type=date name=data_nasc required></td>
        </tr>

        <tr>
            <td>CPF: </td><td><input type=text name=cpf required></td>
        </tr>

        <tr>
            <td>RG: </td><td><input type=text name=rg required></td>
        </tr>

        <tr>
            <td>UF Identidade: </td><td><input type=text name=uf_identidade required></td>
        </tr>

        <tr>
            <td>CREF: </td><td><input type=text name=cref required></td>
        </tr>

        <tr><td colspan=2><br>Adicionais do Funcionário<td></tr>


        <tr>
            <td>Função: </td><td><input type=text name=funcao required></td>
        </tr>

        <tr>
            <td>Data Admissão: </td><td><input type=date name=data_admissao required></td>
        </tr>

        <tr>
            <td>Data Desligamento: </td><td><input type=date name=data_desligamento></td>
        </tr>

        <tr>
            <td>Salário: </td><td><input type=number step="0.01" name=salario required></td>
        </tr>

            <tr align="center">
                <td colspan=2><br>
                    <input type=submit>
                    <input type=reset>
                </td>
            </tr>

    </form>

    </table>

    </div>

    <div id="bottom">
        <button class='link'><a href='exibirfuncionarios.php'>Cancelar</a></button>
    </div>

     

</body>

</html>