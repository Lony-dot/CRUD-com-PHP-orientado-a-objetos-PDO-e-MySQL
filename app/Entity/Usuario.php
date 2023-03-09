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
}