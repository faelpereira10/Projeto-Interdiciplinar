<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE); // Suprimindo os erros de notificação (NOTICE)
ini_set('display_errors', 0);
include("adm/conexao.php");

session_start();

if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
    // Se o usuário não estiver logado, redirecione para a página de login
    header("Location: Inicio/login.html");
    exit();
}

$userId = $_SESSION['id'];

// Consulta SQL para buscar informações do usuário logado
$sql = "SELECT * FROM motorista WHERE idMotorista = '$userId'";
$result = $con->query($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil - Carga Facil</title>
    <link rel="stylesheet" href="perfil_cam.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<header>
        <a href="primeiratela.html"><button><img src="Imagens/voltar-fotor-20230628161115.png" alt="#"></button></a>
        <p>Perfil</p>
    </header>

    <div class="profile-image">
        <img src="Imagens/logo.png" alt="Imagem de Perfil">
        <!-- Você pode adicionar o link da imagem do banco de dados aqui -->
        <a href="#" class="change-image-link">Clique para trocar a imagem de perfil</a>
    </div>

    <table>
        <?php
        if ($result->num_rows > 0) {
            // Saída dos dados de cada linha
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td padding-top: 30px;><strong>Nome completo:</strong></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='color: #4E569D;'>" . $row["Nome"] . "</td>";
                echo "<td style='color: #4E569D;'>&#11166;</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='font-weight: bold; padding-top: 30px;'>Telefone de contato:</td>";
                echo "</tr>";
                echo "<tr></tr>";
                echo "<td style='color: #4E569D;'>" . $row["seu_telefone"] . "</td>";
                echo "<td style='color: #4E569D;'>&#11166;</td>";
                echo "<td style='color: red; font-size: 10px;'>Não verificado, clique para verificar</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='font-weight: bold; padding-top: 30px;'>Alterar e-mail:</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='color: #4E569D;'>" . $row["Email"] . "</td>";
                echo "<td style='color: #4E569D;'>&#11166;</td>";
                echo "<td style='color: red; font-size: 10px;'>Não verificado, clique para verificar</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='font-weight: bold; padding-top: 30px;'>Alterar senha:</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='color: #4E569D;'>" . $row["Senha"] . "</td>";
                echo "<td style='color: #4E569D;'>&#9673;</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='font-weight: bold; padding-top: 30px;'>Informações para verificação:</td>";
                echo "<td style='color: red; font-size: 10px; padding-top: 30px;'>Obrigatório a verificação para corridas</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='font-weight: bold; padding-top: 30px;'>Clique para adicionar:</td>";
                echo "<td style='font-weight: bold; padding-top: 30px;'>&#11166;</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum resultado encontrado.</td></tr>";
        }
        ?>
    </table>

    <div class="center-container">
        <a href="login.html">
            <button class="center-button">Excluir conta</button>
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

