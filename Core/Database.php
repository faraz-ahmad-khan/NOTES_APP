<?php
// Connect to the Database and execute a query.

class Database {
    private $connection;
    public $statement;
    public function __construct($config, $username = 'root', $password = '') {
        $dsn = "mysql:" . http_build_query($config, '', ';');
        $username = 'root';
        $password = '';

        $this->connection = new PDO($dsn, $username,$password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
    public function query($query, $params = []) {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }
    public function get() {
            return $this->statement->fetchAll();
    }
    public function find() {
            return $this->statement->fetch();
    }
    public function findOrFail() {
        $result = $this->find();
        if (!$result) {
            abort();
        }
        return $result;
    }
    public function fetchOrFail() {
        $result = $this->get();
        if (!$result) {
            abort();
        }
        return $result;
    }
}