<?php
session_start();

// Inicializa a variável de sessão se ainda não estiver definida
if (!isset($_SESSION['informacoes'])) {
    $_SESSION['informacoes'] = array();
}

// Adiciona as informações ao array de sessão quando o botão "Salvar informação" é clicado
if (@$_REQUEST['botao'] == "salvar") {
    $nome = $_POST['nome'];
    $mensalidade = $_POST['mensalidade'];
    $curso = $_POST['curso'];
    $parcela = $_POST['parcela'];
    $sexo = $_POST['sexo'];

    // Adiciona as informações ao array de sessão
    $_SESSION['informacoes'][] = array(
        'nome' => $nome,
        'mensalidade' => $mensalidade,
        'curso' => $curso,
        'parcela' => $parcela,
        'sexo' => $sexo
    );
}

// Processa e envia as informações quando o botão "Enviar informações" é clicado
if (@$_REQUEST['botao'] == "enviar") {
    // Cria uma string para exportação
    $exportacao = "";
    foreach ($_SESSION['informacoes'] as $informacao) {
        $exportacao .= implode(';', $informacao) . "\n";
    }

    // Limpa as informações da sessão
    $_SESSION['informacoes'] = array();

    // Cabeçalhos para forçar o download
    header('Content-Disposition: attachment; filename="informacoes.txt"');
    header('Content-Type: text/plain');
    header('Content-Length: ' . strlen($exportacao));

    // Imprime o conteúdo para o navegador
    echo $exportacao;

    // Encerra o script
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> | Formulário em PHP</title>
    <link rel="shortcut icon" href="assets/img/php.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <form action="" method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" autocomplete="off"><br>
        <label for="mensalidade">Mensalidade</label>
        <input type="text" name="mensalidade" id="mensalidade" autocomplete="off"><br>
        <label for="curso">Curso</label>
        <input type="text" name="curso" id="curso" autocomplete="off"><br>
        <label for="parcela">Parcela</label>
        <input type="text" name="parcela" id="parcela" autocomplete="off"><br>
        <label for="sexo">Sexo</label>
        <input type="text" name="sexo" id="sexo" autocomplete="off"><br><br>
        <button type="submit" name="botao" value="salvar">
            Guardar Informação
        </button>
        <button type="submit" name="botao" value="enviar">
            Baixar Informações
        </button>
    </form>
</body>

</html>