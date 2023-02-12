<?php
class Model {
    protected $connection = null;
    protected $username = '';
    protected $password = '';
    protected $databaseName = '';
    protected $host = '';

    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->host = '127.0.0.1';
        $this->username = 'root';
        $this->password = '';
        $this->databaseName = 'todo-list';
        //connect mysql
        $this->connect();
    }

    /**
     * Connect with mysql
     *
     * @return void
     */
    public function connect()
    {
        $this->connection = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->databaseName
        );
        if ($this->connection->connect_errno) {
            exit($this->connection->connect_error);
        }
    }

    /**
     * Set table name from database
     *
     * @param string $tableName
     * @return object
     */
    public function table($tableName)
    {
        $this->table = $tableName;
        return $this;
    }

    /**
     * Get all data by table from database
     *
     * @return array
     */
    public function get($select = '*')
    {
        $sql = "SELECT $select FROM $this->table";
        // Run sql
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        // Retrieves all of the rows of the result
        $resultSet = $statement->get_result();
        return $resultSet->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Create data to table
     *
     * @param array $data
     * @return bool
     */
    public function insert($data)
    {
        // Get field from key data insert
        $field = implode(',', array_keys($data));
        // query
        $sql = "INSERT INTO $this->table($field)
                   VALUES (?, ?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        // Get value array
        $values  = array_values($data);
        // Input data with bind param
        $statement->bind_param(str_repeat('s', count($data)), ...$values);

        return $statement->execute();
    }
}
