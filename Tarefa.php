<?php

require_once 'Connection.php';

class Tarefa
{
    public function cadastrarTarefa()
    {
        $db = new Connection('tarefas');
        $data = [
            'titulo'=> "'$this->titulo'",
            'descricao'=> "'$this->descricao'",
            'usuarioId'=> "'$this->usuarioId'",
            'data_finish'=> "'$this->data_finish'"
        ];

        return $db->insert($data);
    }

    public static function getAll()
    {
        return (new Connection('tarefas'))->select();
    }
}