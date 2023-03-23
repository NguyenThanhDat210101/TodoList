<?php
namespace App\Models;

use mysqli;
use App\Models\Config;

class Model
{
    protected $connection = null;
    protected $config = [];
    protected $table = null;

    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->config = Config::CONFIG_ENV;
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
            $this->config['host'],
            $this->config['username'],
            $this->config['password'],
            $this->config['databaseName'],
            $this->config['port'],
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

    /**
     * Find data detail table by id
     *
     * @param int $id
     * @return array
     */
    public function find($id)
    {
        $sql = "SELECT * FROM $this->table where id=?";
        $statement = $this->connection->prepare($sql);
        $statement->bind_param('i', $id);
        $statement->execute();
        // Retrieves all of the rows of the result
        $resultSet = $statement->get_result();
        return $resultSet->fetch_assoc();
    }

    /**
     * Update data table by id
     *
     * @param int $id
     * @param data $request
     * @return void
     */
    public function update($id, $request)
    {
        // Get name field from variable request
        $keyRequest = [];
        foreach ($request as $key => $values) {
            $keyRequest[] = $key . '=?';
        }
        $field = implode(',', $keyRequest);
        // Get value from variable request
        $data =  array_values($request);
        // Add id to the last array
        $data[] = $id;
        // Run sql
        $sql = "UPDATE $this->table set $field where id=? ";
        $statement = $this->connection->prepare($sql);
        $statement->bind_param(str_repeat('s', count($request)) . 'i', ...$data);
        $statement->execute();
        // Get the number of records affected
        return $statement->affected_rows;
    }

    /**
     * Delete data table by id
     *
     * @param int $id
     * @return int
     */
    public function delete($id)
    {
        $sql = "DELETE FROM $this->table where id =?";
        $statement = $this->connection->prepare($sql);
        $statement->bind_param('i', $id);
        $statement->execute();
        // Get the number of records affected
        return $statement->affected_rows;
    }
}
