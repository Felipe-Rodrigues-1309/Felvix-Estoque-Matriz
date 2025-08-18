<?php
// Conectar ao banco
$host = "localhost";
$usuario = "root";
$senha = "52461309";
$banco = "cadastro_estoque";

$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Pegar dados do formulário
$codigo = $_POST['codigo'];
$produto = $_POST['produto'];
$fornecedor = $_POST['fornecedor'];
$marca = $_POST['marca'];
$valor = $_POST['valor'];
$qtd = $_POST['qtd'];
$entrada = $_POST['entrada'];
$fabricacao = $_POST['fabricacao'];
$validade = $_POST['validade'];
$quantidadeMaxima = $_POST['quantidadeMaxima'];
$quantidadeMinima = $_POST['quantidadeMinima'];

// Inserir no banco
$sql = "INSERT INTO produtos 
(codigo, nome, fornecedor, marca, valor, qtd, entrada, fabricacao, validade, quantidadeMaxima, quantidadeMinima)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "isssdiissii", 
    $codigo, $produto, $fornecedor, $marca, $valor, $qtd, $entrada, $fabricacao, $validade, $quantidadeMaxima, $quantidadeMinima
);

if ($stmt->execute()) {
    echo "Produto inserido com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

$conn->close();
?>
