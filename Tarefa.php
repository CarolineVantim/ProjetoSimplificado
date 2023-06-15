<?php

require_once 'Connection.php';

class Tarefa
{
    public function cadastrarTarefa($titulo, $descricao, $data_finish, $usuarioId)
    {
        $db = new Connection('tarefas');
        $data = [
            'titulo' => "'$titulo'",
            'descricao' => "'$descricao'",
            'usuarioId' => "'$usuarioId'",
            'data_finish' => "'$data_finish'"
        ];

        return $db->insert($data);
    }


    public static function getAll()
    {
        return (new Connection('tarefas'))->select();
    }
}