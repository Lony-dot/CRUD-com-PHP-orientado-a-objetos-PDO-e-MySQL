<?php

namespace App\Entity;

use \App\Db\Database;

class Vaga{
    /**
     * Identificador único da vaga
     * @var integer
     */
    public $id;

    /**
     * Título da vaga
     * @var string
     */
    public $titulo;

    /**
     * Descrição da vaga
     * @var string
     */
    public $descricao;

    /**
     * Define se a vaga está ativa
     * @var string(s/n)
     */
    public $ativo;

    /**
     * Data de publicação da vaga
     * @var string
     */
    public $data;

    /**
     * Método responsável por cadastrar uma nova vaga no banco.
     * @return boolean
     * 
     */
    public function cadastrar(){
        //Definir a data
        $this->data = date('Y-m-d H:i:s');

        //Inserir a vaga no banco
        $obDatabase = new Database('vagas');
        $obDatabase->insert([
                            'titulo'    => $this->titulo,
                            'descricao' => $this->descricao,
                            'ativo'     => $this->ativo,
                            'data'      =>$this->data
                        ]);
        //Atribuir o ID da vaga na instância

        //Retornar Sucesso

    }

}