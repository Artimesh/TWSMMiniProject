<?php
class Core {
    protected $db, $result;
    private $rows;
    /*Instanciate the mySQL eye object*/
    public function __construct()
    {
        $this->db = new mysqli('127.0.0.1', 'root', 'pw', 'chat_users');
    }

    /*Take an sql string and execute it as a query and store in results*/
    public function query($sql) {
        $this->result = $this->db->query($sql);
    }

    /*Loop through rows returned from the query and return it as an array*/
    public function rows() {
        for($x = 1; $x <= $this->db->affected_rows; $x++){
            $this->rows[] = $this->result->fetch_assoc();
        }
        return $this->rows;
    }
}