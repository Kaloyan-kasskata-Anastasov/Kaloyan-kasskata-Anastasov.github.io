<?php

namespace Models;

class Master_Model
{

    protected $table;
    protected $limit;
    protected $db;

    public function __construct($args = array())
    {
        $args = array(
            'limit' => 0
        );

        if (!isset($args['table'])) {
            die('Table not defined');
        }

        extract($args);

        $this->table = $table;
        $this->limit = $limit;

        $db_object = \Lib\Database::get_instance();
        $this->db = $db_object::get_db();
    }

    public function find($args = array())
    {
        $defaults = array(
            'table' => $this->table,
            'limit' => $this->limit,
            'where' => '',
            'columns' => '*'
        );

        $args = array_merge($defaults, $args);
        extract($args);
        $query = "SELECT {$columns} FROM {$table}";

        if (!empty($where)) {
            $query .= " WHERE $where";
        }
        if (!empty($limit)) {
            $query .= " LIMIT $limit";
        }

        $resultSet= $this->db->query($query);
    }
}