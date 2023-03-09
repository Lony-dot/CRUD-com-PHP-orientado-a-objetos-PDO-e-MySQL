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
}