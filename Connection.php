<?php

class Connection 
{
    const SERVERNAME = 'localhost';
    const DBNAME = 'projetoSimplificado';
    const USERNAME = 'root';
    const PASS = '';
    const PORT = '3306';

    private $table;
    private $connection;

    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    public function setConnection()
    {
        $this->connection = new mysqli(self::SERVERNAME, self::USERNAME, self::PASS, self::DBNAME, self::PORT);
        if ($this->connection->connect_error) {
          die("Connection failed: " . $this->connection->connect_error);
        }
        return $this->connection;
    }

    public function insert($values)
    {
        $fields = array_keys($values);
        $binds  = array_pad($values, count($fields),'?');
    
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
        
        if ($this->connection->query($query) === TRUE) {
          return true;
        } else {
          return false;
        }
        $this->connection->close();
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        $result = $this->connection->query($query);
        $this->connection->close();
        return $result;
    }

    public function criarTriggerValidacaoUsuario()
    {
        $sql = "CREATE TRIGGER trigger_criar_tarefa BEFORE INSERT ON tarefas
                FOR EACH ROW
                BEGIN
                    IF NEW.usuarioId IS NULL THEN
                        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'É necessário inserir um usuário.';
                    END IF;
                END";

        if ($this->connection->query($sql)) {
            echo "Trigger criada com sucesso.";
        } else {
            echo "Erro ao criar a trigger: " . $this->connection->error;
        }
    }
}