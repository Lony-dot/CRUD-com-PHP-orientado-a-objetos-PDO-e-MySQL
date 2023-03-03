<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE','Editar vaga');

use \App\Entity\Vaga;

//VALIDAÇÃO DO ID
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$obVaga = Vaga::getVaga($_GET['id']);


//VALIDAÇÃO DA VAGA
if (!$obVaga instanceof Vaga) {
    header('location: index.php?status=error');
    exit;
}

//Validação do POST
if(isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])){

    $obVaga->titulo = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo = $_POST['ativo'];
    echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;
    //$obVaga->cadastrar();

    header('location: index.php?status=success');
    exit;
    //echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';