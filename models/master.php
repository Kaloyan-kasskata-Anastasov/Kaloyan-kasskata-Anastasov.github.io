<?php

namespace Models;

class Master_Model
{

    protected $table;
    protected $limit;
    protected $db;

    public function __construct($args = array())
    {
        $default = array(
            'limit' => 0
        );

        $args = array_merge($default, $args);

        if (!isset($args['table'])) {
            die('Table not defined');
        }

        extract($args);

        $this->table = $table;
        $this->limit = $limit;

        $db_object = \Lib\Database::get_instance();
        $this->db = $db_object::get_db();
    }

    public function get_by_id($id)
    {
        return $this->find(array('where' => 'id=' . $id));
    }

    public function get_by_title($title)
    {
        return $this->find(array('where' => "title='" . $title ."'"));
    }

    public function delete_by_id($id)
    {
        return $this->find(array('where' => 'id=' . $id));
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

        $result_set = $this->db->query($query);

        $results = $this->process_results($result_set);

        return $results;
    }

    protected function process_results($result_set)
    {
        $results = array();

        if (!empty($result_set) && $result_set->num_rows > 0) {
            while ($row = $result_set->fetch_assoc()) {
                $results[] = $row;
            }
        }

        return $results;
    }
}