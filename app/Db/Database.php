<?php

namespace App\Db;


use \PDO;
use PDOException;

class Database{
    /**
     * Host de conexão com o Banco de dados
     * @var string
     */
    const HOST = 'localhost';

    /**
     * Nome do banco de dados
     * @var string
     */
    const NAME = 'vagas';

    /**
     *Usuário do banco
     * @var string
     */
    const USER = 'root';

    /**
     * Senha de acesso ao banco de dados
     * @var string
     */
    const PASS = '';

    /**
     * Nome da tabela a ser manipulada
     * @var string
     */
    private $table;

    /**
     * Instância de conexão com o banco de dados
     * @var PDO
     */
    private $connection;

    /**
     * Define a tabela, instância e conexão
     * @param string $table
     * 
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Método responsável por criar uma conexão com o banco de dados
     */
    private function setConnection()
    {
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';wdev_vagas'.self::NAME, SELF::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
         die('ERROR: '.$e->getMessage());
        }
    }
    /**
     * Método responsável por executar queries dentro do banco de dados
     * @param string $query
     * @param array $params
     * @return PDOStatement
     * 
     */
    public function execute($query, $params = [])
    {
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e){
         die('ERROR: '.$e->getMessage());
        }
    }

    /**
     * Método responsável por inseerir dados do banco
     * @param array $values [ field =>value ]
     * @return integer
     */

    public function insert ($values)
    {
        //DADOS DA QUERY
        $fields = array_keys($values);
        $binds = array_pad([],count($fields), '?');

        
        //echo "<pre>"; print_r($fields); echo "</pre>"; exit;

        /**
         * MONTA A QUERY
         * Query de inserção do Banco de dados.
         * Os valores de VALUES são passsados dessa maneira como medida protetiva do PDO.
         */
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

      
    }
}