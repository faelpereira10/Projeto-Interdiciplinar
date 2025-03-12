<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

include("adm/conexao.php");

$idMotorista = isset($_POST['idmotorista']) ? $_POST['idmotorista'] : '';
$Nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$CPF = isset($_POST['cpf']) ? $_POST['cpf'] : ''; 
$Email = isset($_POST['email']) ? $_POST['email'] : '';
$Senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$ConfSenha = isset($_POST['confsenha']) ? $_POST['confsenha'] : '';

// Consulta para verificar se o email já está cadastrado (tanto em contratante quanto em motorista)
$verificaEmail = "SELECT email FROM contratante WHERE email = '$Email' UNION SELECT email FROM motorista WHERE email = '$Email'";
$resultado = mysqli_query($con, $verificaEmail);

if (mysqli_num_rows($resultado) > 0) {
    // O email já está cadastrado, redirecione para a página inicial com uma mensagem de erro
    echo "<script>alert('Email já cadastrado. Tente novamente.'); window.location='Inicio/1tela.html'</script>";
} else {
    // O email não está cadastrado, insira os dados no banco de dados (em motorista)
    $sql = "INSERT INTO motorista (idmotorista, nome, cpf, email, senha, confsenha) 
            VALUES ('$idMotorista', '$Nome', '$CPF', '$Email', '$Senha', '$ConfSenha')";

    if (mysqli_query($con, $sql)) {
        // Inserção bem-sucedida, redirecione para a página inicial
        echo "<script>window.location='Inicio/1tela.html'</script>";
    } else {
        // Erro na inserção
        echo 'Não foi possível incluir os dados! Entre em contato com o administrador do sistema';
    }

    mysqli_close($con);
}
?>