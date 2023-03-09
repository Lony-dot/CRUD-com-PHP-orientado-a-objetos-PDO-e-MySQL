<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Session\login;

//OBRIGA O USUÁRIO A NÃO ESTAR LOGADO
Login::requireLogout();

//MENSAGEM DE ALERTA DOS FORMULÁRIOS
$alertaLogin = '';
$alertaCadastro = '';

//VALIDAÇÃO DO POST
if(isset($_POST['acao']))
{
    switch($_POST['acao'])
    {
        case 'logar':

            //BUSCA USUÁRIO POR E-MAIL
            $obUsuario = Usuario::getUsuarioPorEmail($_POST['email']);

            //VALIDA A INSTÂNCIA E A SENHA
            if(!$obUsuario instanceof Usuario || !password_verify($_POST['senha'], $obUsuario->senha))
            {
                $alertaLogin = 'E-mail ou senha inválidos';
                break;
            }

            echo "<pre>";
                print_r($obUsuario);
                echo "</pre>"; exit;

            break;

        case 'cadastrar';

            //VALIDAÇÃO DOS CAMPOS OBRIGATÓRIOS
            if(isset($_POST['nome'],$_POST['email'],$_POST['senha']))
            {
                $obUsuario = new Usuario;
                $obUsuario->nome = $_POST['nome'];
                $obUsuario->email = $_POST['email'];
                $obUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                $obUsuario->cadastrar();
                
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