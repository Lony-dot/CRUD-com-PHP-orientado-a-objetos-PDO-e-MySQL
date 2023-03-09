<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Usuario
{
    /**
     * Identificar único do usuário
     * @var integer
     */
    public $id;

    /**
     * Nome do usuário
     * @var string
     */
    public $nome;

    /**
     * E-mail do usuário
     * @var string
     */
    public $email;

    /**
     * Hash da senha do usuário
     * @var string
     */
    public $senha;

    /**
     * Método responsável por cadastrar um novo usuário no Banco
     * @return boolean
     */
    public function cadastrar()
    {
        //DATABASE
        $obDatabase = new Database('usuarios');

        //INSERE UM NOVO USUÁRIO
        $this->id = $obDatabase->insert([
          'nome' =>  $this->nome,
          'email' => $this->email,
          'senha' => $this->senha,
        ]);

        //SUCESSO
        return true;
    }

    /**
     * Método responsável por retornar uma instância do usuário com base em seu e-mail
     * @param string $email
     * @return Usuario
     */
    public static function getUsuarioPorEmail($email)
    {
      return (new Database('usuarios'))->select('email = "'.$email.'"')->fetchObject(self::class);
    }
}