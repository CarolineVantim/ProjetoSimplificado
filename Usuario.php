<?php

require_once(realpath(dirname(__FILE__) . 'Connection.php'));

class Usuario extends Connection
{
    public static function getAll()
    {
        $conn = Connection::setConnection();
        $sql = "SELECT * FROM usuario WHERE id = ".$id."";
        $result = $conn->query($sql);
        $return = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $return[0] = $row['id'];
                $return[1] = $row['nome'];
            }
        }

        return $return;
    }
}