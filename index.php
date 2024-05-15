<?php

if (@$_REQUEST['botao'] == "enviar") {
    $nome = $_POST['nome'];
    $mensalidade = $_POST['mensalidade'];
    $curso = $_POST['curso'];
    $parcela = $_POST['parcela'];
    $sexo = $_POST['sexo'];

    $handle = fopen('banco.txt', 'a');
    $exportacao = $nome . ';' . $mensalidade . ';' . $curso . ';' . $parcela . ';' . $sexo . "\n";
    fwrite($handle, $exportacao);
    fclose($handle);
}




?>

<form action="" method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="name"><br>
    <label for="mensalidade">Mensalidade</label>
    <input type="text" name="mensalidade" id="mensalidade"><br>
    <label for="curso">Curso</label>
    <input type="text" name="curso" id="curso"><br>
    <label for="parcela">Parcela</label>
    <input type="text" name="parcela" id="parcela"><br>
    <label for="sexo">Sexo</label>
    <input type="text" name="sexo" id="sexo"><br><br>
    <button type="submit" name="botao" value="enviar">
        Enviar Informações
    </button>
</form>