<?php

//Os dados abaixo se encontram na aba MySql details no Infintyfree, logo abaixo do Control Panel :)

$hostname = 'localhost'; 
$user = 'root';
$password = ''; 
$database = 'nardy';

//Aqui é realizada a conexão com o banco de dados, o "or die" serve para se caso a conexão não seja realizada ele exiba algo, no caso aqui ele exibirá o erro

$con = mysqli_connect($hostname, $user, $password ,$database) or die ($con -> connect_errno);

?>