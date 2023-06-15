<?php

require_once 'Connection.php';

class Usuario extends Connection
{
    public function cadastrarUsuario()
    {
        $db = new Connection('usuario');
        $data = [
            'nome'=> "'$this->nome'",
            'data_inser'=> "'$this->data_inser'"
        ];

        return $db->insert($data);
    }

    public static function getUsuario()
    {
        return (new Connection('usuario'))->select();
    }
}
