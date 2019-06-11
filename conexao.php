<?php
// Conexao e selecao de banco
$conn =mysqli_connect('127.0.0.1','root','','Academia');
// verifica erro
if (mysqli_connect_errno())
{    echo "Erro para conectar ao banco: ",mysqli_connect_error(); }
?>