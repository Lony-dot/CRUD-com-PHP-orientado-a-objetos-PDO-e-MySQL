<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE','Cadastrar vaga');

use \App\Entity\Vaga;

use \App\Session\login;

//OBRIGA O USUÁRIO A ESTAR LOGADO
Login::requireLogin();

//INSTÂNCIA DE VAGA
$obVaga = new Vaga;

//Validação do POST
if(isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])){

    $obVaga->titulo    = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo     = $_POST['ativo'];
    $obVaga->cadastrar();

    header('location: index.php?status=success');
    exit;
    //echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';