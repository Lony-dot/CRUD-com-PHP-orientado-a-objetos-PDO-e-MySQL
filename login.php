<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Session\login;

//OBRIGA O USUÁRIO A NÃO ESTAR LOGADO
Login::requireLogout();

//VALIDAÇÃO DO POST
if(isset($_POST['acao']))
{
    switch($_POST['acao'])
    {
        case 'logar':
            die('logar');
            break;

        case 'cadastrar';

            //VALIDAÇÃO DOS CAMPOS OBRIGATÓRIOS
            if(isset($_POST['nome'],$_POST['email'],$_POST['senha']))
            {
                $obUsuario = new Usuario;
                $obUsuario->nome = $_POST['nome'];
                $obUsuario->email = $_POST['email'];
                $obUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                
                echo "<pre>";
                print_r($obUsuario);
                echo "</pre>"; exit;
            }


            break;
    }
} 


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario-login.php';
include __DIR__ . '/includes/footer.php';