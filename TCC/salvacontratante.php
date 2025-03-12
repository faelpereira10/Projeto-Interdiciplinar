<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

include("adm/conexao.php");

$idContratante = isset($_POST['idcontratante']) ? $_POST['idcontratante'] : '';
$Nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$CPF = isset($_POST['cpf']) ? $_POST['cpf'] : ''; 
$Email = isset($_POST['email']) ? $_POST['email'] : '';
$Senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$ConfSenha = isset($_POST['confsenha']) ? $_POST['confsenha'] : '';

// Consulta para verificar se o email já está cadastrado na tabela contratante
$verificaEmailContratante = "SELECT email FROM contratante WHERE email = '$Email'";
$resultadoEmailContratante = mysqli_query($con, $verificaEmailContratante);

if (mysqli_num_rows($resultadoEmailContratante) > 0) {
    // O email já está cadastrado, redirecione para a página inicial com uma mensagem de erro
    echo "<script>alert('Email já cadastrado. Tente novamente.'); window.location='Inicio/1tela.html'</script>";
} else {
    // O email não está cadastrado, agora verifique o CPF
    // Consulta para verificar se o CPF já está cadastrado na tabela contratante
    $verificaCPFContratante = "SELECT cpf FROM contratante WHERE cpf = '$CPF'";
    $resultadoCPFContratante = mysqli_query($con, $verificaCPFContratante);

    if (mysqli_num_rows($resultadoCPFContratante) > 0) {
        // O CPF já está cadastrado, redirecione para a página inicial com uma mensagem de erro
        echo "<script>alert('CPF já cadastrado. Tente novamente.'); window.location='Inicio/1tela.html'</script>";
    } else {
        // O email e o CPF não estão cadastrados, insira os dados na tabela contratante
        $sql = "INSERT INTO contratante (idcontratante, nome, cpf, email, senha, confsenha) 
                VALUES ('$idContratante', '$Nome', '$CPF', '$Email', '$Senha', '$ConfSenha')";

        if (mysqli_query($con, $sql)) {
            // Inserção bem-sucedida, redirecione para a página inicial
            echo "<script>window.location='Inicio/1tela.html'</script>";
        } else {
            // Erro na inserção
            echo 'Não foi possível incluir os dados! Entre em contato com o administrador do sistema';
        }
    }
    mysqli_close($con);
}
?>