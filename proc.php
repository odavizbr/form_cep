<?php
// Aqui começa o seu código PHP

include("banco.php");

function limparEntrada($data) {
    return htmlspecialchars(trim($data));
}

$nome = limparEntrada($_POST["nome"]);
$email = limparEntrada($_POST["email"]);
$telefone = limparEntrada($_POST["telefone"]);
$cpf = limparEntrada($_POST["cpf"]);
$rg = limparEntrada($_POST["rg"]);
$data = limparEntrada($_POST["datanasc"]);
$assunto = limparEntrada($_POST["assunto"]);
$mensagem = limparEntrada($_POST["mensagem"]);
$senha = limparEntrada($_POST["senha"]);
$cep = limparEntrada($_POST["cep"]);
$rua = limparEntrada($_POST["endereco"]);
$cidade = limparEntrada($_POST["cidade"]);
$bairro = limparEntrada($_POST["bairro"]);
$numero = limparEntrada($_POST["nr"]);
$uf = limparEntrada($_POST["uf"]);
$complemento = limparEntrada($_POST["complemento"]);

$sql = "INSERT INTO usuarios (Nome, RG, CPF, DataNasc, Email, Celular, CEP, Rua, Comp, Bairro, Cidade, Numero, UF, Assunto, Mensagem, Senha) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $nome, $rg, $cpf, $data, $email, $telefone, $cep, $rua, $complemento, $bairro, $cidade, $numero, $uf, $assunto, $mensagem, $senha);

    if (mysqli_stmt_execute($stmt)) {
        echo "<div class='success'>Dados cadastrados com sucesso!</div>";
        echo "<div class='data-display'>";
        echo "<h3>Informações Cadastradas:</h3>";
        echo "<ul>";
        echo "<li><strong>Nome:</strong> $nome</li>";
        echo "<li><strong>Email:</strong> $email</li>";
        echo "<li><strong>Telefone:</strong> $telefone</li>";
        echo "<li><strong>CPF:</strong> $cpf</li>";
        echo "<li><strong>RG:</strong> $rg</li>";
        echo "<li><strong>Data de Nascimento:</strong> $data</li>";
        echo "<li><strong>Assunto:</strong> $assunto</li>";
        echo "<li><strong>Mensagem:</strong> $mensagem</li>";
        echo "<li><strong>CEP:</strong> $cep</li>";
        echo "<li><strong>Endereço:</strong> $rua</li>";
        echo "<li><strong>Complemento:</strong> $complemento</li>";
        echo "<li><strong>Bairro:</strong> $bairro</li>";
        echo "<li><strong>Cidade:</strong> $cidade</li>";
        echo "<li><strong>Número:</strong> $numero</li>";
        echo "<li><strong>UF:</strong> $uf</li>";
        echo "</ul>";
        echo "</div>";
    } else {
        echo "<div class='error'>Erro no cadastro: " . mysqli_error($conn) . "</div>";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "<div class='error'>Erro na preparação da consulta: " . mysqli_error($conn) . "</div>";
}

mysqli_close($conn);
?>

<!-- Botão de voltar -->
<div class="button-container">
    <button onclick="window.history.back()">Voltar</button>
</div>

<!-- Aqui está o CSS embutido -->
<style>
    body {
        background-color: #1e1e1e; /* Fundo escuro */
        color: white; /* Texto branco */
        font-family: Arial, sans-serif; /* Fonte Arial */
        padding: 20px;
    }
    .success {
        background-color: #27ae60;
        color: white;
        font-weight: bold;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    .error {
        background-color: #e74c3c;
        color: white;
        font-weight: bold;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    .data-display {
        background-color: #2c3e50;
        padding: 30px;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    .data-display h3 {
        color: #ecf0f1;
        border-bottom: 2px solid #3498db;
        padding-bottom: 10px;
    }
    .data-display ul {
        list-style-type: none;
        padding: 0;
    }
    .data-display li {
        margin-bottom: 10px;
    }
    .button-container {
        margin-top: 20px;
    }
    .button-container button {
        padding: 15px 30px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 16px;
    }
    .button-container button:hover {
        background-color: #2980b9;
    }
</style>
