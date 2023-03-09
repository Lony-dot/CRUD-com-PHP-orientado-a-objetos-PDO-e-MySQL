<?php

namespace App\Session;

class login
{

    /** 
     * Método responsável por iniciar a sessão
    */
    private static function init()
    {
        //VERIFICA O STATUS DA SESSÃO
        if(session_status() !== PHP_SESSION_ACTIVE)
        {
            //INICIA A SESSÃO
            session_start();
        }
    }

    /**
     * Método responsável por logar o usuário
     * @param Usuario $obUsuario
     */
    public static function login($obUsuario)
    {
        //INICIA A SESSÃO
        self::init();

        //SESSÃO DE USUÁRIO
        $_SESSION['usuario'] = [
            'id' => $obUsuario->id,
            'nome' => $obUsuario->nome,
            'email' => $obUsuario->email
        ];

        //REDIRECIONA USUÁRIO PARA INDEX
        header('location: index.php');
        exit;
    }

    /**
     * Método responsável por verificar se o usuário está logado
     * @return boolean
     */
    public static function isLogged()
    {
         //INICIA A SESSÃO
         self::init();

        //VALIDAÇÃO DA SESSÃO
        return isset($_SESSION['usuario']['id']);
    }

    /**
     * Método responsável por obrigar o usuário a estar logado para acessar
     */
    public static function requireLogin()
    {
        if(!self::isLogged())
        {
            header('location: login.php');
            exit;
        }
    }

      /**
     * Método responsável por obrigar o usuário a estar deslogado para acessar
     */
    public static function requireLogout()
    {
        if(self::isLogged())
        {
            header('location: index.php');
            exit;
        }
    }

    
}