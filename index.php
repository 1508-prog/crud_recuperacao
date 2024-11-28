<?php
// Configurações do banco de dados
$host = 'localhost'; // Servidor
$usuario = 'root'; // Usuário do banco de dados
$senha = ''; // Senha do banco de dados
$banco = 'crud_recuperacao'; // Nome do banco de dados

// Conectar ao banco de dados
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verificar conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar os dados do formulário
    $nome = $conexao->real_escape_string($_POST['nome']);
    $endereco = $conexao->real_escape_string($_POST['endereco']);
    $email = $conexao->real_escape_string($_POST['email']);
    $celular = $conexao->real_escape_string($_POST['celular']);

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO cliente (nome, endereco, email, celular) VALUES ('$nome', '$endereco', '$email', '$celular')";

    if ($conexao->query($sql) === TRUE) {
        echo "<h1>Cliente cadastrado com sucesso!</h1>";
    } else {
        echo "Erro ao cadastrar cliente: " . $conexao->error;
    }
}

// Fechar a conexão com o banco de dados
$conexao->close();
?>

